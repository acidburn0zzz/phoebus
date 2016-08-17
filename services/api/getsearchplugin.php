<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */
 
 // == | Debug |================================================================

// Uncomment to enable
 error_reporting(E_ALL);
 ini_set("display_errors", "on");

// ============================================================================

// == | Vars |=================================================================

$varHardcode_palemoonID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';

$arraySearchPlugins = array(
    '100' => 'google',
    '101' => 'youtube',
    '102' => 'google-play',
    '103' => 'ask',
    '104' => 'merriam-webster',
    '105' => 'facebook',
    '106' => 'abbreviations-com',
    '107' => 'accuweather',
    '108' => 'amazon-com',
    '109' => 'amazon-co-uk',
    '110' => 'baidu',
    '111' => 'dictionary-com',
    '112' => 'dogpile',
    '113' => 'ebay',
    '114' => 'unbubble',
    '115' => 'imdb',
    '116' => 'imgur',
    '117' => 'ixquick',
    '118' => 'openstreetmap',
    '119' => 'pale-moon-add-ons-site',
    '120' => 'pale-moon-forum',
    '121' => 'pcnet',
    '122' => 'qwant',
    '123' => 'reference-com',
    '124' => 'searx',
    '125' => 'startpage',
    '126' => 'the-online-slang-dictionary',
    '127' => 'the-weather-channel',
    '128' => 'tumblr',
    '129' => 'urban-dictionary',
    '130' => 'webopedia',
    '131' => 'wiktionary',
    '132' => 'yandex'
);

// ============================================================================

// == | Sanity Checks |========================================================

if (array_key_exists('id', $_GET)) {
    $varRequest_id = $_GET['id'];
}
else {
    die('ID not set');
}
// ============================================================================

// == | Main |=================================================================

if (array_key_exists($varRequest_id, $arraySearchPlugins)) {
    funcPrintSearchPlugin($arraySearchPlugins[$varRequest_id]);
}

// ============================================================================

// == | funcPrintSearchPlugin |================================================

// ../../datastore/searchplugins/

function funcPrintSearchPlugin($_varID) {
    $_filenameSearchPlugin = '../../datastore/searchplugins/' . $_varID . '.xml';
    
    if (file_exists($_filenameSearchPlugin)) {
        $_stringSearchPlugin = file_get_contents($_filenameSearchPlugin);
        
        if (!$_stringSearchPlugin) {
            die('The file could not be read properly');
        }
        
        header('Content-Type: text/xml');
        print($_stringSearchPlugin);
    }
    else {
        die('File does not exist');
    }
}

// ============================================================================
?>