<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$arrayIncludes = array(
    $arrayModules['dbAddons'],
    $arrayModules['dbLangPacks'],
    $arrayModules['dbSearchPlugins'],
    $arrayModules['readManifest'],
);

$strRequestAddonID = funcHTTPGetValue('id');
$strRequestAddonVersion = funcHTTPGetValue('version');

// ============================================================================

// == | funcDownloadXPI | ===============================================

function funcDownloadXPI($_addonManifest, $_addonVersion) {
    $_versionXPI = null;
    
    if ($_addonVersion == 'latest') {
        $_versionXPI = $_addonManifest['addon']['release'];
        $_addonFile = $_addonManifest['addon']['basePath'] . $_versionXPI;
    }
    else {
        $_versionMatch = false;
        foreach ($_addonManifest['xpi'] as $_key => $_value) {
            if (in_array($_addonVersion, $_value)) {
                $_versionMatch = true;
                $_versionXPI = $_key;
                break;
            }
        }
        
        if ($_versionMatch == true) { 
            $_addonFile = $_addonManifest['addon']['basePath'] . $_versionXPI;
        }
        else {
            funcError('Unknown XPI version');
        }
    }
    
    if (file_exists($_addonFile)) {
        header('Content-Type: application/x-xpinstall');
        header('Content-Disposition: inline; filename="' . $_versionXPI . '"');
        header('Content-Length: ' . filesize($_addonFile));
        header('Cache-Control: no-cache');
        header('X-Accel-Redirect: ' . ltrim($_addonFile, '.'));
    }
    else {
        funcError('XPI file not found');
    }

    // We are done here
    exit();
}

// ============================================================================

// == | funcDownloadSearchPlugin | ============================================

function funcDownloadSearchPlugin($_searchPluginName) {
    $_SearchPluginFile = './datastore/searchplugins/' . $_searchPluginName;
    
    if (file_exists($_SearchPluginFile)) {
        header('Content-Type: text/xml');
        header('Content-Disposition: inline; filename="' . $_searchPluginName .'"');
        header('Cache-Control: no-cache');
        
        readfile($_SearchPluginFile);
    }
    else {
        funcError('Search Plugin XML file not found');
    }
    
    // We are done here
    exit();
}

// ============================================================================

// == | Main | ================================================================

// Sanity
if ($strRequestAddonID == null) {
    funcError('Missing minimum required arguments.');
}

if ($strRequestAddonVersion == null) {
    $strRequestAddonVersion = 'latest';
} 

// Includes
foreach($arrayIncludes as $_value) {
    require_once($_value);
}
unset($arrayIncludes);

// Search for add-ons in our databases
// Add-ons
if (array_key_exists($strRequestAddonID, $arrayAddonsDB)) {
    funcDownloadXPI(funcReadManifest('download', $arrayAddonsDB[$strRequestAddonID]), $strRequestAddonVersion);
}
// Search Plugins
elseif (array_key_exists($strRequestAddonID, $arraySearchPluginsDB)) {
    funcDownloadSearchPlugin($arraySearchPluginsDB[$strRequestAddonID]);
}
else {
    funcError('Add-on could not be found in our database');
}

// ============================================================================
?>