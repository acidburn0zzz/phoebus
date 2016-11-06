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

// ============================================================================

// == | Main | ================================================================

// Sanity
if ($strRequestType == null || $strRequestReq == null) {
    funcError('Missing minimum arguments (type or request)');
}

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
            '/24.9'
        );
    }
    elseif ($strRequestReq == 'recommended') {
        funcRedirect(
            $strAMOServicesURL .
            $strRequestLocale .
            $strAMOServicesAPIPath .
            'list/featured/all/10/' .
            $strRequestOS .
            '/24.9'
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
            '&appver=24.9'
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