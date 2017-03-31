<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$boolAMOKillSwitch = false;
$boolAMOWhiteList = false;

$arrayIncludes = array(
    $arrayModules['dbAddons'],
    $arrayModules['dbLangPacks'],
    $arrayModules['dbAUSExternals'],
    $arrayModules['readManifest'],
    $arrayModules['vc']
);

$strRequestAddonID = funcHTTPGetValue('id');
$strRequestAddonVersion = funcHTTPGetValue('version');
$strRequestAppID = funcHTTPGetValue('appID');
$strRequestAppVersion = funcHTTPGetValue('appVersion');
$strRequestCompatMode = funcHTTPGetValue('compatMode');

// ============================================================================

// == | funcGenerateUpdateXML | ===============================================

function funcGenerateUpdateXML($_addonManifest) {
    $_strUpdateXMLHead = '<?xml version="1.0"?>' . "\n" . '<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:em="http://www.mozilla.org/2004/em-rdf#">';
    $_strUpdateXMLTail = '</RDF:RDF>';

    header('Content-Type: text/xml');

    print($_strUpdateXMLHead);

    if ($_addonManifest != null) {
            print("\n");
            
            $_strUpdateXMLBody = file_get_contents('./phoebus/components/aus/content/update-body.xml');
            
            $_arrayFilterSubstitute = array(
                '@ADDON_TYPE@' => $_addonManifest['addon']['type'],
                '@ADDON_ID@' => $_addonManifest['addon']['id'],
                '@ADDON_VERSION@' => $_addonManifest['xpi'][$_addonManifest['addon']['release']]['version'],
                '@APPLICATION_ID@' => $GLOBALS['strApplicationID'],
                '@ADDON_MINVERSION@' => $_addonManifest['xpi'][$_addonManifest['addon']['release']]['minAppVersion'],
                '@ADDON_MAXVERSION@' => $_addonManifest['xpi'][$_addonManifest['addon']['release']]['maxAppVersion'],
                '@ADDON_XPI@' => $_addonManifest['addon']['baseURL'] . $_addonManifest['addon']['id'],
                '@ADDON_HASH@' => $_addonManifest['addon']['hash']
            );
            
            foreach ($_arrayFilterSubstitute as $_key => $_value) {
                $_strUpdateXMLBody = str_replace($_key, $_value, $_strUpdateXMLBody);
            }
            
            print("\n");
            print($_strUpdateXMLBody);
    }
    
    print($_strUpdateXMLTail);
    
    // We are done here...
    exit();
}

// ============================================================================

// == | Main | ================================================================

// Sanity
if ($strRequestAddonID == null || $strRequestAddonVersion == null ||
    $strRequestAppID == null || $strRequestAppVersion == null ||
    $strRequestCompatMode == null) {
    funcError('Missing minimum required arguments.');
}

if ($strRequestAppID == $strPaleMoonID) {
    // Include modules
    foreach($arrayIncludes as $_value) {
        require_once($_value);
    }
    unset($arrayIncludes);

    // Search for add-ons in our database
    if (array_key_exists($strRequestAddonID, $arrayAddonsDB)) {
        funcGenerateUpdateXML(funcReadManifest('aus', $arrayAddonsDB[$strRequestAddonID]));
    }
    // Language Packs
    elseif (array_key_exists($strRequestAddonID, $arrayLangPackDB)) {
        $arrayLangPack = array(
            'addon' => array(
                        'type' => 'item',
                        'id' => $strRequestAddonID,
                        'release' => $arrayLangPackDB[$strRequestAddonID]['locale'] . '.xpi',
                        'baseURL' => $strLangPackBaseURL,
                        'hash' => $arrayLangPackDB[$strRequestAddonID]['hash']),
            'xpi' => array(
                        $arrayLangPackDB[$strRequestAddonID]['locale'] . '.xpi' => array(
                            'version' => $arrayLangPackDB[$strRequestAddonID]['version'],
                            'minAppVersion' => '27.0.0a1',
                            'maxAppVersion' => '27.*'))
        );
        
        funcGenerateUpdateXML($arrayLangPack);
    }
    // Externals
    elseif (array_key_exists($strRequestAddonID, $arrayExternalsDB)) {
        funcRedirect($arrayExternalsDB[$strRequestAddonID]);
    }
    // Unknown - Send to AMO or to 'bad' update xml
    else {
        if ($boolAMOKillSwitch == false) {
            $intVcResult = ToolkitVersionComparator::compare($strRequestAppVersion, $strMinimumApplicationVersion);
            $_strFirefoxVersion = $strFirefoxVersion;
            
            if ($intVcResult < 0) {
                $_strFirefoxVersion = $strFirefoxOldVersion;
            }
            
            $strAMOLink = 'https://versioncheck.addons.mozilla.org/update/VersionCheck.php?reqVersion=2' .
            '&id=' . $strRequestAddonID .
            '&version=' . $strRequestAddonVersion .
            '&appID=' . $strFirefoxID .
            '&appVersion=' . $_strFirefoxVersion .
            '&compatMode=' . $strRequestCompatMode;
            
            funcRedirect($strAMOLink);
        }
        else {
            funcGenerateUpdateXML(null);
        }
    }
}
elseif ($strRequestAppID == $strFossaMailID) {
    $strApplicationID = $strFossaMailID;

    $arrayBadFossaMailDB = array(
        '{a62ef8ec-5fdc-40c2-873c-223b8a6925cc}' => 'gdata',
        '{e2fda1a4-762b-4020-b5ad-a41df1933103}' => 'lightning'
    );

    if (array_key_exists($strRequestAddonID, $arrayBadFossaMailDB)) {
        funcGenerateUpdateXML(null);
    }
    else {
        if ($boolAMOKillSwitch == false) {           
            $strAMOLink = 'https://versioncheck.addons.mozilla.org/update/VersionCheck.php?reqVersion=2' .
            '&id=' . $strRequestAddonID .
            '&version=' . $strRequestAddonVersion .
            '&appID=' . $strThunderbirdID .
            '&appVersion=' . '38.9' .
            '&compatMode=' . $strRequestCompatMode;
            
            funcRedirect($strAMOLink);
        }
        else {
            funcGenerateUpdateXML(null);
        }
    }
}
else {
    funcError('Invalid Application ID');
}

// ============================================================================
?>
