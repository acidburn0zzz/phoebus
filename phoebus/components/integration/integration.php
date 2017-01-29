<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$strAMOServicesURL = 'https://services.addons.mozilla.org/';
$strAMOServicesAPIPath = '/firefox/api/1.5/';

// Main Entry Points
$strRequestType = funcHTTPGetValue('type');
$strRequestReq = funcHTTPGetValue('request');

// Possible arguments directly passed from the Browser
$strRequestAddonID = funcHTTPGetValue('addonguid');
$strRequestSearchQuery = funcHTTPGetValue('q');
$strRequestLocale = funcHTTPGetValue('locale');
$strRequestOS = funcHTTPGetValue('os');
$strRequestVersion = funcHTTPGetValue('version')

$_strFirefoxVersion = $strFirefoxVersion;

// ============================================================================

// == | Main | ================================================================

// Sanity
if ($strRequestType == null || $strRequestReq == null) {
    funcError('Missing minimum arguments (type or request)');
}

// Maintain Pale Moon <26 Compatibility
if ($strRequestAppVersion != null) {
    require_once($arrayModules['vc']);
    $intVcResult = ToolkitVersionComparator::compare($strRequestVersion, '27.0.0');

    if ($intVcResult < 0) {
        $_strFirefoxVersion = '24.9';
    }
}

// Start the logic to fulfill the request
if ($strRequestType == 'internal') {
    if ($strRequestReq == 'get') {
        // For the moment we are sending a 'blank' xml response
        funcSendHeader('xml');
        print(
            '<?xml version="1.0" encoding="utf-8" ?>' .
            "\n" .
            '<searchresults total_results="0">' .
            "\n" .
            '</searchresults>'
        );
        exit();
    }
    elseif ($strRequestReq == 'search') {
        funcRedirect(
            $strAMOServicesURL .
            $strRequestLocale .
            $strAMOServicesAPIPath .
            'search/' .
            $strRequestSearchQuery .
            '/all/10/' .
            $strRequestOS .
            '/' . $_strFirefoxVersion
        );
    }
    elseif ($strRequestReq == 'recommended') {
        funcRedirect(
            $strAMOServicesURL .
            $strRequestLocale .
            $strAMOServicesAPIPath .
            'list/featured/all/10/' .
            $strRequestOS .
            '/' . $_strFirefoxVersion
        );
    }
    else {
        funcError('Unknown Internal Request');
    }
}
elseif ($strRequestType == 'external') {
    if ($strRequestReq == 'search') {
        funcRedirect(
            'https://addons.mozilla.org/firefox/search?q=' .
            $strRequestSearchQuery .
            '&appver=' . $_strFirefoxVersion
        );
    }
    elseif ($strRequestReq == 'recommended') {
        funcRedirect('/');
    }
    elseif ($strRequestReq == 'themes') {
        funcRedirect('/themes/');
    }
    elseif ($strRequestReq == 'searchplugins') {
        funcRedirect('/search-plugins/');
    }
    elseif ($strRequestReq == 'devtools') {
        funcRedirect('/extensions/category/web-development/');
    }
    else {
        funcError('Unknown External Request');
    }
}
else {
    funcError('Unknown scope'); 
}

// ============================================================================
?>