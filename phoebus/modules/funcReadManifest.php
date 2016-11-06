<?php
// == | funcReadManifest | ===============================================

function funcReadManifest($_addonType, $_addonSlug, $_addonMetadata, $_addonContent, $_addonHash, $_addonBaseURL, $_addonBasePath) {
    $_addonDirectory = $_addonType . 's/' . $_addonSlug . '/';
    $_addonBasePath = './datastore/' . $_addonDirectory;
    $_addonManifestINIFile = 'manifest.ini';
    $_addonPhoebusManifestFile = 'phoebus.manifest';
    $_addonPhoebusContentFile = 'phoebus.content';
    
    if (file_exists($_addonBasePath . $_addonPhoebusManifestFile)) {
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
            $_addonManifest['xpi'][$_key] = $_value;
        }
        
        // clear the temporary array out of memory
        unset($_addonManifestVersions_);
        
        if ($_addonMetadata == true) {
            // shortDescription should be html entity'd
            $_addonManifest['metadata']['shortDescription'] = htmlentities($_addonManifest['metadata']['shortDescription'], ENT_XHTML);
        }
        else {
            unset($_addonManifest['metadata']);
        }

        if ($_addonMetadata == true && $_addonContent == true) {
            // Deal with phoebus.content
            include_once($GLOBALS['arrayModules']['processContent']);
            $_addonPhoebusContent = funcProcessContent($_addonBasePath . $_addonPhoebusContentFile);
            
            if ($_addonPhoebusContent != null) {
                // Assign parsed phoebus.content to the add-on manifest array
                $_addonManifest['metadata']['longDescription'] = $_addonPhoebusContent;
            }
            else {
                // Since there is no phoebus.content use the short description
                $_addonManifest['metadata']['longDescription'] = $_addonManifest['metadata']['shortDescription'];
            }
        }
        // Generate a sha256 hash on the fly for the add-on
        if ($_addonHash == true) {
            if (file_exists($_addonBasePath . $_addonManifest['addon']['release'])) {    
                $_addonManifest['addon']['hash'] = hash_file('sha256', $_addonBasePath . $_addonManifest['addon']['release']);
            }
            else {
                funcError('Could not find ' . $_addonManifest["xpi"]);
            }
        }

        // assign the baseURL to the add-on manifest array
        if ($_addonBaseURL == true) {
            if ($_SERVER["HTTP_X_FORWARDED_HOST"] = 'dev.addons.palemoon.org') {
                $_addonManifest['addon']["baseURL"] = 'http://dev.addons.palemoon.org/datastore/' . $_addonDirectory;
            }
            else {
                $_addonManifest['addon']["baseURL"] = 'https://addons.palemoon.org/phoebus/datastore/' . $_addonDirectory;
            }
        }

        // assign the basePath to the add-on manifest array
        if ($_addonBasePath == true) {
            $_addonManifest['addon']['basePath'] = $_addonBasePath;
        }
        
        return $_addonManifest;
    }
    else {
        funcError('Unable to read manifest file');
    }
}

// ============================================================================
?>