<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$strPhoebusLiveURL = 'addons.palemoon.org';
$strPhoebusDevURL = 'dev.addons.palemoon.org';
$strPhoebusURL = $strPhoebusLiveURL;
$strPhoebusSiteName = 'Pale Moon - Add-ons';
$strPhoebusVersion = '1.5.0';
$strPhoebusDatastore = './datastore/';
$boolDebugMode = false;

$strPaleMoonID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';
$strFossaMailID = '{3550f703-e582-4d05-9a08-453d09bdfdc6}';
$strFirefoxID = '{ec8030f7-c20a-464f-9b0e-13a3a9e97384}';
$strThunderbirdID = $strFossaMailID; // {3550f703-e582-4d05-9a08-453d09bdfdc6}
$strSeaMonkeyID = '{92650c4d-4b8e-4d2a-b7eb-24ecf4f6b63a}';
$strApplicationID = $strPaleMoonID;

$strMinimumApplicationVersion = '27.0.0';
$strFirefoxVersion = '27.9';
$strFirefoxOldVersion = '24.9';

$strLangPackBaseURL = 'http://relmirror.palemoon.org/langpacks/27.x/';

$strRequestComponent = funcHTTPGetValue('component');
$arrayArgsComponent = preg_grep('/^component=(.*)/', explode('&', parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)));
$strRequestPath = funcHTTPGetValue('path');

$strApplicationPath = $_SERVER['DOCUMENT_ROOT'] . '/phoebus/';
$strComponentsPath = $strApplicationPath . 'components/';
$strModulesPath = $strApplicationPath . 'modules/';
$strGlobalLibPath = $_SERVER['DOCUMENT_ROOT'] . '/lib/';

$arrayComponents = array(
    'site' => $strComponentsPath . 'site/site.php',
    'aus' => $strComponentsPath . 'aus/aus.php',
    'download' => $strComponentsPath . 'download/download.php',
    'integration' => $strComponentsPath . 'integration/integration.php',
    'discover' => $strComponentsPath . 'discover/discover.php',
    'license' => $strComponentsPath . 'license/license.php',
    '43893' => $strComponentsPath . 'special/special.php'
);

$arrayModules = array(
    'dbAddons' => $strModulesPath . 'db/addons.php',
    'dbLangPacks' => $strModulesPath . 'db/langPacks.php',
    'dbSearchPlugins' => $strModulesPath . 'db/searchPlugins.php',
    'dbAUSExternals' => $strModulesPath . 'db/ausExternals.php',
    'dbCategories' => $strModulesPath . 'db/categories.php',
    'readManifest' => $strModulesPath . 'funcReadManifest.php',
    'processContent' => $strModulesPath . 'funcProcessContent.php',
    'vc' => $strGlobalLibPath . 'nsIVersionComparator.php',
    'smarty' => $strGlobalLibPath . 'smarty/Smarty.class.php'
);

// ============================================================================

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

// == | Function: funcCheckVar | ==============================================

function funcCheckVar($_value) {
    if ($_value === '' || $_value === 'none' || $_value === null || empty($_value)) {
        return null;
    }
    else {
        return $_value;
    }
}

// ============================================================================

// == | funcSendHeader | ======================================================

function funcSendHeader($_value) {
    $_arrayHeaders = array(
        '404' => 'HTTP/1.0 404 Not Found',
        '501' => 'HTTP/1.0 501 Not Implemented',
        'html' => 'Content-Type: text/html',
        'text' => 'Content-Type: text/plain',
        'xml' => 'Content-Type: text/xml',
        'css' => 'Content-Type: text/css',
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

// == | Main | ================================================================

if ($_SERVER['SERVER_NAME'] == $strPhoebusDevURL) {
    $boolDebugMode = true;
    $strPhoebusURL = $strPhoebusDevURL;
    if (file_exists('./.git/HEAD')) {
        $_strGitHead = file_get_contents('./.git/HEAD');
        $_strGitSHA1 = file_get_contents('./.git/' . substr($_strGitHead, 5, -1));
        $_strGitBranch = substr($_strGitHead, 16, -1);
        $strPhoebusSiteName = 'Phoebus Development - Version: ' . $strPhoebusVersion . ' - ' .
            'Branch: ' . $_strGitBranch . ' - ' .
            'Commit: ' . $_strGitSHA1;
    }
    else {
        $strPhoebusSiteName = 'Phoebus Development - Version: ' . $strPhoebusVersion;
    }
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
}

// Deal with unwanted entry points
if ($_SERVER['REQUEST_URI'] == '/') {
    $strRequestComponent = 'site';
    $strRequestPath = '/';
}
elseif ((count($arrayArgsComponent) > 1) || ($strRequestComponent != 'site' && $strRequestPath != null)) {
    funcSendHeader('404');
    exit();
}

// Load component based on strRequestComponent
if ($strRequestComponent != null) {
    if (array_key_exists($strRequestComponent, $arrayComponents)) {
        require_once($arrayComponents[$strRequestComponent]);
    }
    else {
        funcError($strRequestComponent . ' is an unknown component');
    }
}
else {
    funcError('You did not specify a component');
}

// ============================================================================
?>