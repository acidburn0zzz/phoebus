<?php
// == | funcReadManifest | ===============================================

function funcReadManifest($_addonScope, $_addonSlug) {
    
    $_addonPhoebusManifestFile = 'phoebus.manifest';
    $_addonPhoebusContentFile = 'phoebus.content';
    $_addonPhoebusLicenseFile = 'phoebus.license';
    $_strDatastoreBasePath = $GLOBALS['strPhoebusDatastore'] . 'addons/';
    
    if (file_exists($_strDatastoreBasePath . $_addonSlug . '/' . $_addonPhoebusManifestFile)) {
        $_addonBasePath = $_strDatastoreBasePath . $_addonSlug . '/';
        $_addonManifestINI = parse_ini_file($_addonBasePath . $_addonPhoebusManifestFile, true)
            or funcError('Could not parse manifest file for ' . $_addonSlug);
    }
    else {
        funcError('Could not find manifest file for ' . $_addonSlug);
    }
    
    // Define base manifest data structure
    $_addonManifestBase = array(
        'addon' => array(
            'type' => null,
            'id' => null,
            'release' => null
        ),
        'metadata' => array(
            'name' => null,
            'slug' => null,
            'author' => null,
            'shortDescription' => null,
            'homepageURL' => null,
            'supportURL' => null,
            'supportEmail' => null,
            'repository' => null,
            'license' => null, // preferred spelling
            'licence' => null
        ),
    );
    
    // Create a new array that will replace existing values from manifest ini onto the predefined data structure
    // then unset the base and ini-read arrays
    $_addonManifest = array_replace_recursive($_addonManifestBase, $_addonManifestINI);
    unset($_addonManifestINI);
    unset($_addonManifestBase);
    
    // Let's do some sanity checks
    if (funcCheckVar($_addonManifest['addon']['type']) == null ||
        funcCheckVar($_addonManifest['addon']['id']) == null ||
        funcCheckVar($_addonManifest['addon']['release']) == null ||
        funcCheckVar($_addonManifest['metadata']['name']) == null ||
        funcCheckVar($_addonManifest['metadata']['slug']) == null ||
        funcCheckVar($_addonManifest['metadata']['author']) == null ||
        funcCheckVar($_addonManifest['metadata']['shortDescription']) == null ||
        array_key_exists($_addonManifest['addon']['release'], $_addonManifest) == false) {
        funcError('Missing minimum required entries in manifest file for ' . $_addonSlug);
    }
    
    // If any value of a metadata subkey is 'none' replace it with null
    foreach ($_addonManifest['metadata'] as $_metadataKey => $_metadataValue) {
        if ($_metadataValue === 'none') {
            $_addonManifest['metadata'][$_metadataKey] = null;
        }
    }
    
    // INI has depth and identical section name issues so we need to mangle it
    // Create a temporary array that we can easily manipulate
    $_addonManifestVersions = $_addonManifest;
    
    // Drop the addon and metadata keys off the temporary array
    unset($_addonManifestVersions['addon']);
    unset($_addonManifestVersions['metadata']);
    
    // Reverse sort the keys
    krsort($_addonManifestVersions, SORT_NATURAL | SORT_FLAG_CASE);
    
    // mangle filename.xpi sections into a subkey
    // we are now working on the add-on manifest array
    foreach ($_addonManifestVersions as $_key => $_value) {
        unset($_addonManifest[$_key]);
        // Only AUS, DOWNLOAD, and PAGE care about XPIs
        if ($_addonScope == 'aus' || $_addonScope == 'download' || $_addonScope == 'page') {
            $_addonManifest['xpi'][$_key] = $_value;
        }
    }
    
    // clear the temporary array out of memory
    unset($_addonManifestVersions_);

    // Only CATEGORY and PAGE care about Metadata
    if ($_addonScope == 'category' || $_addonScope == 'page' || $_addonScope == 'license') {
        $_addonManifest['metadata']['url'] = '/addon/' . $_addonManifest['metadata']['slug'] . '/';
        
        if (file_exists($_addonBasePath . 'icon.png')) {
            $_addonManifest['metadata']['icon'] = substr($_addonBasePath . 'icon.png', 1);
        }
        else {
            $_addonManifest['metadata']['icon'] = substr($_strDatastoreBasePath . 'default/' . $_addonManifest['addon']['type'] . '.png', 1);
        }
        
        if (file_exists($_addonBasePath . 'preview.png')) {
            $_addonManifest['metadata']['preview'] = substr($_addonBasePath . 'preview.png', 1);;
            $_addonManifest['metadata']['hasPreview'] = true;
        }
        else {
            $_addonManifest['metadata']['preview'] = substr($_strDatastoreBasePath . 'default/preview.png', 1);
            $_addonManifest['metadata']['hasPreview'] = false;
        }
        
        // shortDescription should be html entity'd
        $_addonManifest['metadata']['shortDescription'] = htmlentities($_addonManifest['metadata']['shortDescription'], ENT_XHTML);
        $_addonFullShortDesc = $_addonManifest['metadata']['shortDescription'];
        if (strlen($_addonManifest['metadata']['shortDescription']) >= 205) {
            $_addonManifest['metadata']['shortDescription'] = substr($_addonManifest['metadata']['shortDescription'], 0, 200) . '...';
        }
        
        // Only PAGE cares about phoebus.content and extended metadata
        if ($_addonScope == 'page') {
            if ($_addonScope == 'page') {
                // Deal with phoebus.content
                require_once($GLOBALS['arrayModules']['processContent']);
                $_addonPhoebusContent = funcProcessContent($_addonBasePath . $_addonPhoebusContentFile);
                
                if ($_addonPhoebusContent != null) {
                    // Assign parsed phoebus.content to the add-on manifest array
                    $_addonManifest['metadata']['longDescription'] = $_addonPhoebusContent;
                }
                else {
                    // Since there is no phoebus.content use the short description
                    $_addonManifest['metadata']['longDescription'] = $_addonFullShortDesc;
                }

                // Hack for people using repositories as their homepage
                if ($_addonManifest['metadata']['repository'] == null && (
                    strpos($_addonManifest['metadata']['homepageURL'], 'github') > -1 ||
                    strpos($_addonManifest['metadata']['homepageURL'], 'bitbucket') > -1 ||
                    strpos($_addonManifest['metadata']['homepageURL'], 'gitlab') > -1)) {
                    $_addonManifest['metadata']['repository'] = $_addonManifest['metadata']['homepageURL'];
                    $_addonManifest['metadata']['homepageURL'] = null;
                }
            }
        }

        if ($_addonScope == 'page' || $_addonScope == 'license') {
            $arrayLicenses = array(
                'custom' => 'Custom License',
                'Apache-2.0' => 'Apache License 2.0',
                'Apache-1.1' => 'Apache License 1.1',
                'BSD-3-Clause' => 'BSD 3-Clause',
                'BSD-2-Clause' => 'BSD 2-Clause',
                'GPL-3.0' => 'GNU General Public License 3.0',
                'GPL-2.0' => 'GNU General Public License 2.0',
                'LGPL-3.0' => 'GNU Lesser General Public License 3.0',
                'LGPL-2.1' => 'GNU Lesser General Public License 2.1',
                'AGPL-3.0' => 'GNU Affero General Public License v3',
                'MIT' => 'MIT License',
                'MPL-2.0' => 'Mozilla Public License 2.0',
                'MPL-1.1' => 'Mozilla Public License 1.1',
                'PD' => 'Public Domain'
            );

            $arrayLicenses = array_change_key_case($arrayLicenses, CASE_LOWER);
            
            // Hack for license/licence
            if ($_addonManifest['metadata']['license'] == null && $_addonManifest['metadata']['licence'] != null) {
                $_addonManifest['metadata']['license'] = $_addonManifest['metadata']['licence'];
            }

            unset($_addonManifest['metadata']['licence']);
            
            if (file_exists($_addonBasePath . $_addonPhoebusLicenseFile)) {
                $_addonManifest['metadata']['license'] = 'custom';
            }
            
            if ($_addonManifest['metadata']['license'] != null) {
                $_addonManifest['metadata']['license'] = strtolower($_addonManifest['metadata']['license']);
                if (array_key_exists($_addonManifest['metadata']['license'], $arrayLicenses)) {
                    $_addonManifest['metadata']['licenseName'] = $arrayLicenses[$_addonManifest['metadata']['license']];
                }
                else {
                    $_addonManifest['metadata']['license'] = 'unknown';
                    $_addonManifest['metadata']['licenseName'] = 'Unknown License';
                }
            }
        }
        
        if ($_addonScope == 'license') {
            if ($_addonManifest['metadata']['license'] == 'custom' && file_exists($_addonBasePath . $_addonPhoebusLicenseFile)) {
                $_addonManifest['metadata']['licenseText'] = file_get_contents($_addonBasePath . $_addonPhoebusLicenseFile);
            }
            elseif ($_addonManifest['metadata']['license'] == 'unknown') {
                $_addonManifest['metadata']['license'] = null;
            }
            else {
                $_addonManifest['metadata']['licenseText'] = null;
            }
        }

    }
    else {
        unset($_addonManifest['metadata']);
    }

    // Only AUS cares about sha265
    if ($_addonScope == 'aus') {
        // Generate a sha256 hash on the fly for the add-on
        if (file_exists($_addonBasePath . $_addonManifest['addon']['release'])) {    
            $_addonManifest['addon']['hash'] = hash_file('sha256', $_addonBasePath . $_addonManifest['addon']['release']);
        }
        else {
            funcError('Could not find ' . $_addonManifest["xpi"]);
        }
    }

    $_addonManifest['addon']["baseURL"] = 'http://' . $GLOBALS['strPhoebusURL'] . '<![CDATA[/?component=download&id=]]>';

    // assign the basePath to the add-on manifest array
    $_addonManifest['addon']['basePath'] = $_addonBasePath;
    
    return $_addonManifest;
}

// ============================================================================
?>