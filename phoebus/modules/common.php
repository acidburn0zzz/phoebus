<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Function: funcError |==================================================

function funcError($_value) {
    die('Error: ' . $_value);
    
    // We are done here
    exit();
}

// ============================================================================

// == | Function: funcHTTPGetValue |===========================================

function funcHTTPGetValue($_value) {
    $_arrayGET = array_unique($_GET);
    if (!isset($_GET[$_value]) || $_GET[$_value] === '' || $_GET[$_value] === null || empty($_GET[$_value])) {
        return null;
    }
    else {    
        $_finalValue = preg_replace('/[^-a-zA-Z0-9_\-\/\{\}\@\.]/', '', $_GET[$_value]);
        return $_finalValue;
    }
}

// ============================================================================

// == | funcSendHeader | ======================================================

function funcSendHeader($_value) {
    $_arrayHeaders = array(
        '404' => 'HTTP/1.0 404 Not Found',
        'html' => 'Content-Type: text/html',
        'text' => 'Content-Type: text/plain',
        'xml' => 'Content-Type: text/xml',
        'phoebus' => 'X-Phoebus: https://github.com/Pale-Moon-Addons-Team/phoebus/',
    );
    
    if (array_key_exists($_value, $_arrayHeaders)) {
        header($_arrayHeaders['phoebus']);
        header($_arrayHeaders[$_value]);
        
        if ($_value == '404') {
            // We are done here
            exit();
        }
    }
}

// ============================================================================

// == | Function: funcRedirect |===============================================

function funcRedirect($_strURL) {
	header('Location: ' . $_strURL , true, 302);
    
    // We are done here
    exit();
}

// ============================================================================

// == | Functions: startsWith & endsWith |=====================================
function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

// ============================================================================
?>