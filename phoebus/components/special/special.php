<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL/2.0/.
 
// == | Vars | ================================================================

// Main Entry Points
$strRequestFunction = funcHTTPGetValue('function');

 // ============================================================================

// == | Main | ================================================================

// Sanity
if ($strRequestFunction == null) {
    funcError('Missing function request');
}

if ($strRequestFunction == 'phpvars') {
    funcSendHeader('html');
    phpinfo(32);
}
elseif ($strRequestFunction == 'checkdup') {
    funcSendHeader('text');
    $arrayFile = file_get_contents($arrayModules['dbAddons']);
    $arrayFile = str_replace(');', '', $arrayFile);
    $arrayFile = str_replace(',', '', $arrayFile);
    $arrayFile = str_replace('$arrayAddonsDB = array(', '', $arrayFile);
    
    $arrayConplex = array(
        "\/\/ (.*)\n" => "",
        "\<\?php\n" => "",
        "\?\>" => "",
        "^\n" => "",
        "^    \'(.*)\' \=\> \'(.*)'" => "$1\n$2",
    );

    foreach ($arrayConplex as $_key => $_value) {
        $arrayFile = preg_replace('/' . $_key . '/iUm', $_value, $arrayFile);
    }

    $arrayFile = explode("\n", $arrayFile);
    $intArrayEnd = array_search('$arrayAddonsOverrideDB = array(', $arrayFile);
    $arrayFile = array_slice($arrayFile, null, $intArrayEnd, true);
    $arrayDups = array_diff_key($arrayFile, array_unique($arrayFile));   
    
    print('This is by no means perfect detection for the main addons array as improper formatting could throw the initial regex for a loop.. Just don\'t make mistakes!' . "\n\n");
    
    if (!$arrayDups) {
        print('No duplicates were detected');
    }
    else {
        foreach ($arrayDups as $dupKey => $dupValue) {
            print('Duplicate key or value: ' . $dupValue . "\n");
        }
    }
}
else {
    funcError('Incorrect function request');
}
?>