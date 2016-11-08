<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$strPaleMoonID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';
$strFirefoxID = '{ec8030f7-c20a-464f-9b0e-13a3a9e97384}';
$strFirefoxVersion = '28.9';

$strRequestComponent = funcHTTPGetValue('component');
$arrayArgsComponent = preg_grep('/^component=(.*)/', explode('&', parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY)));
$strRequestPath = funcHTTPGetValue('path');

$strApplicationPath = './phoebus/';
$strComponentsPath = $strApplicationPath . 'components/';
$strModulesPath = $strApplicationPath . 'modules/';

$arrayComponents = array(
    'site' => $strApplicationPath . 'base/website.php',
    'aus' => $strComponentsPath . 'aus/aus.php',
    'download' => $strComponentsPath . 'download.php',
    'integration' => $strComponentsPath . 'integration/integration.php',
    'discover' => $strComponentsPath . 'discover/discover.php',
);

$arrayModules = array(
    'dbExtensions' => $strModulesPath . 'db/extensions.php',
    'dbThemes' => $strModulesPath . 'db/themes.php',
    'dbLangPacks' => $strModulesPath . 'db/langPacks.php',
    'dbSearchPlugins' => $strModulesPath . 'db/searchPlugins.php',
    'dbAUSExternals' => $strModulesPath . 'db/ausExternals.php',
    'dbSiteExternals' => $strModulesPath . 'db/siteExternals.php',
    'dbExtCategories' => $strModulesPath . 'db/extCategories.php',
    'readManifest' => $strModulesPath . 'funcReadManifest.php',
    'processContent' => $strModulesPath . 'funcProcessContent.php',
    'vc' => $strModulesPath . 'nsIVersionComparator.php'
);

// ============================================================================

// == | Main | ================================================================

// Deal with unwanted entry points
if ($_SERVER['REQUEST_URI'] == '/') {
    $strRequestComponent = 'site';
    $strRequestPath = '/';
}
elseif ((count($arrayArgsComponent) > 1) || ($strRequestComponent != 'site' && $strRequestPath != null)) {
    header("HTTP/1.0 404 Not Found");
    exit();
}

// Load component based on strRequestComponent
if ($strRequestComponent != null) {
    if (array_key_exists($strRequestComponent, $arrayComponents)) {
        include_once($arrayComponents[$strRequestComponent]);
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