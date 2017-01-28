<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$arrayIncludes = array(
    $arrayModules['dbExtensions'],
    $arrayModules['dbThemes'],
    $arrayModules['dbLangPacks'],
    $arrayModules['dbSearchPlugins'],
    $arrayModules['readManifest'],
);

$strRequestAddonID = funcHTTPGetValue('id');

// ============================================================================

// == | funcDownloadXPI | ===============================================

function funcDownloadXPI($_addonManifest) {
    $_addonFile = $_addonManifest['addon']['basePath'] . $_addonManifest['addon']['release'];
    
    if (file_exists($_addonFile)) {
        header('Content-Type: application/x-xpinstall');
        header('Content-Disposition: inline; filename="' . $_addonManifest['addon']['release'] .'"');
        header('Content-Length: ' . filesize($_addonFile));
        header('Cache-Control: no-cache');
        
        readfile($_addonFile);
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
    $_SearchPluginFile = './datastore/searchplugins/' . $_searchPluginName . '.xml';
    
    if (file_exists($_SearchPluginFile)) {
        header('Content-Type: text/xml');
        header('Content-Disposition: inline; filename="' . $_searchPluginName . '.xml' .'"');
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

// Includes
foreach($arrayIncludes as $_value) {
    require_once($_value);
}
unset($arrayIncludes);

// Search for add-ons in our databases
// Extensions
if (array_key_exists($strRequestAddonID, $arrayExtensionsDB)) {
    funcDownloadXPI(funcReadManifest('extension', $arrayExtensionsDB[$strRequestAddonID], false, false, false, false, true));
}
// Themes
elseif (array_key_exists($strRequestAddonID, $arrayThemesDB)) {
    funcDownloadXPI(funcReadManifest('theme', $arrayThemesDB[$strRequestAddonID], false, false, false, false, true));
}
// Search Plugins
elseif (array_key_exists($strRequestAddonID, $arraySearchPluginsDB)) {
    funcDownloadSearchPlugin($arraySearchPluginsDB[$strRequestAddonID]['slug']);
}
else {
    funcError('Add-on could not be found in our database');
}

// ============================================================================
?>