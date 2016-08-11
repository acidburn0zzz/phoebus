<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */
 
 // == | Debug |================================================================

// Uncomment to enable
 error_reporting(E_ALL);
 ini_set("display_errors", "off");

// ============================================================================

// == | Vars |=================================================================

$varHardcode_palemoonID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';

// ============================================================================

// == | Sanity Checks |========================================================

if (array_key_exists('scope', $_GET)) {
    $varRequest_scope = $_GET['scope'];
    if (($varRequest_scope != 'download') && ($varRequest_scope != 'permaxpi')) {
        die('Invalid Scope: ' . $varRequest_scope);
    }
}
else {
    die('Scope not set');
}

if (array_key_exists('id', $_GET)) {
    $varRequest_id = $_GET['id'];
}
else {
    die('ID not set');
}
// ============================================================================

// == | Main |=================================================================

include_once('../aus/database.php');

if ($varRequest_scope == 'download') {
    if (array_key_exists($varRequest_id, $arrayExtensionsDB)) {
        funcGetXPI('extension', $arrayExtensionsDB[$varRequest_id]);
    }
    elseif (array_key_exists($varRequest_id, $arrayThemesDB)) {
        funcGetXPI('theme', $arrayThemesDB[$varRequest_id]);
    }
}
elseif ($varRequest_scope == 'permaxpi') {
    $arrayPermaXPI = array(
        'abl' => '{016acf6d-e5c0-4768-9376-3763d1ad1978}'
    );
    
    if (array_key_exists($varRequest_id, $arrayPermaXPI)) {
       $varSearchID = $arrayPermaXPI[$varRequest_id];
    }
    else {
        die('We cannot find permaxpi ' . $varRequest_id);
    }
}
else {
    die('An unknown error has occurred');
}
// ============================================================================

// == | Get XPI |==============================================================

function funcGetXPI($varAddonType, $varAddonData) {
		
    if (($varAddonType == 'extension') || ($varAddonType == 'theme')) {
    
        if ($varAddonType == 'extension') {
            $_varAddonType = 'extensions';
        }
        elseif ($varAddonType == 'theme') {
            $_varAddonType = 'themes';
        }
        
        $addonPathPrefix = '../../datastore/' . $_varAddonType . '/' . $varAddonData . '/';
        $addonManifestFile = $addonPathPrefix . 'manifest.ini';
        
        $addonManifest = parse_ini_file($addonManifestFile);
        if (!$addonManifest) {
            die('Error: Unable to read manifest ini file');
        }
        else {
            $addonFile = $addonPathPrefix . $addonManifest["xpi"];
        }
        
        if (file_exists($addonFile)) {
            header('Content-Type: application/x-xpinstall');
            header('Content-Length: ' . filesize($addonFile));
            header('Cache-Control: no-cache');
            
            readfile($addonFile);
        }
        else {
            die('Error: File not found');
        }
    }
}

// ============================================================================
?>