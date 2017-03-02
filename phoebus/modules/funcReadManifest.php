<?php
// == | funcReadManifest | ===============================================

function funcReadManifest($_addonScope, $_addonSlug) {
    
    $_addonPhoebusManifestFile = 'phoebus.manifest';
    $_addonPhoebusContentFile = 'phoebus.content';
    
    if (file_exists($GLOBALS['strPhoebusDatastore'] . 'extensions/' . $_addonSlug . '/' . $_addonPhoebusManifestFile)) {
        $_addonBasePath = $GLOBALS['strPhoebusDatastore'] . 'extensions/' . $_addonSlug . '/';
    }
    elseif (file_exists($GLOBALS['strPhoebusDatastore'] . 'themes/' . $_addonSlug . '/' . $_addonPhoebusManifestFile)) {
        $_addonBasePath = $GLOBALS['strPhoebusDatastore'] . 'themes/' . $_addonSlug . '/';
    }
    else {
        funcError('Could not read manifest file');
    }
    
    $_addonManifest = parse_ini_file($_addonBasePath . $_addonPhoebusManifestFile, true);
   
    // INI has depth and identical section name issues so we need to mangle it
    // Create a temporary array that we can easily manipulate
    $_addonManifestVersions = $_addonManifest;
    
    // Drop the addon and metadata keys off the temporary array
    unset($_addonManifestVersions['addon']);
    unset($_addonManifestVersions['metadata']);
    
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
    if ($_addonScope == 'category' || $_addonScope == 'page') {
        if (file_exists($_addonBasePath . 'icon.png')) {
            $_addonManifest['metadata']['hasIcon'] = true;
        }
        else {
            $_addonManifest['metadata']['hasIcon'] = false;
        }
        
        if (file_exists($_addonBasePath . 'preview.png')) {
            $_addonManifest['metadata']['hasPreview'] = true;
        }
        else {
            $_addonManifest['metadata']['hasPreview'] = false;
        }
        
        // shortDescription should be html entity'd
        $_addonManifest['metadata']['shortDescription'] = htmlentities($_addonManifest['metadata']['shortDescription'], ENT_XHTML);
        $_addonFullShortDesc = $_addonManifest['metadata']['shortDescription'];
        if (strlen($_addonManifest['metadata']['shortDescription']) >= 205) {
            $_addonManifest['metadata']['shortDescription'] = substr($_addonManifest['metadata']['shortDescription'], 0, 200) . '...';
        }
        
        // Only PAGE cares about phoebus.content
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