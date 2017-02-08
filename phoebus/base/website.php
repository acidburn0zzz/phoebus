<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$strContentBasePath = './phoebus/base/content/';
$strSkinBasePath = './phoebus/skin/palemoon/';

$arraySmartyPaths = array(
    'cache' => $strApplicationPath . '.smarty/cache',
    'compile' => $strApplicationPath . '.smarty/compile',
    'config' => $strApplicationPath . '.smarty/config',
    'plugins' => $strApplicationPath . '.smarty/plugins',
    'templates' => $strApplicationPath . '.smarty/templates',
);

$arrayStaticPages = array(
    '/' => array(
        'title' => 'Your browser, your way!',
        'contentTemplate' => $strContentBasePath . 'frontpage.xhtml.tpl',
    ),
    '/search/' => array(
        'title' => 'Search',
        'contentTemplate' => $strContentBasePath . 'search.xhtml.tpl',
    ),
    '/incompatible/' => array(
        'title' => 'Known Incompatible Add-ons',
        'contentTemplate' => $strContentBasePath . 'incompatible.xhtml.tpl',
    ),
);

// ============================================================================

// == | funcGenerateStaticPage | ==============================================

function funcGeneratePage($_array) {
    // Get the required template files
    $_strSiteTemplate = file_get_contents($GLOBALS['strSkinBasePath'] . 'template.tpl');
    $_strStyleSheet = file_get_contents($GLOBALS['strSkinBasePath'] . 'stylesheet.tpl');
    $_strContentTemplate = file_get_contents($_array['contentTemplate']);

    // Merge the stylesheet and the content template into the site template
    $_arrayFilterSubstitute = array(
        '{%PAGE_CONTENT}' => $_strContentTemplate,
        '{%SITE_STYLESHEET}' => $_strStyleSheet,
    );

    foreach ($_arrayFilterSubstitute as $_key => $_value) {
        $_strSiteTemplate = str_replace($_key, $_value, $_strSiteTemplate);
    }

    unset($_strStyleSheet);
    unset($_strContentTemplate);

    // Load Smarty
    require_once($GLOBALS['arrayModules']['smarty']);
    $libSmarty = new Smarty();
    
    // Configure Smarty
    $libSmarty->caching = 0;
    $libSmarty->debugging = false;
    $libSmarty->setCacheDir($GLOBALS['arraySmartyPaths']['cache'])
        ->setCompileDir($GLOBALS['arraySmartyPaths']['compile'])
        ->setConfigDir($GLOBALS['arraySmartyPaths']['config'])
        ->addPluginsDir($GLOBALS['arraySmartyPaths']['plugins'])
        ->setTemplateDir($GLOBALS['arraySmartyPaths']['templates']);

    // Assign data to Smarty
    $libSmarty->assign('SITE_NAME', $GLOBALS['strPhoebusSiteName']);
    $libSmarty->assign('SITE_DOMAIN', '//' . $GLOBALS['strPhoebusURL']);
    $libSmarty->assign('PAGE_TITLE', $_array['title']);
    $libSmarty->assign('BASE_PATH', substr($GLOBALS['strSkinBasePath'], 1));
    $libSmarty->assign('MEMORY', memory_get_usage());
    
    if (array_key_exists('contentData', $_array)) {
        $libSmarty->assign('PAGE_DATA', $_array['contentData']);
    }
    
    if (array_key_exists('contentType', $_array)) {
        $libSmarty->assign('PAGE_TYPE', $_array['contentType']);
    }
    
    
    // Send html header and pass the final template to Smarty
    funcSendHeader('html');
    $libSmarty->display('string:' . $_strSiteTemplate, null, str_replace('/', '_', $GLOBALS['strRequestPath']));

    // We are done here...
    exit();
}

// ============================================================================

// == | Main | ================================================================

if (startsWith($strRequestPath, '/extensions/') == true ||
    startsWith($strRequestPath, '/themes/') == true ||
    startsWith($strRequestPath, '/search-plugins/') == true) {
    require_once('./phoebus/base/addons.php');
}
else {
    if (array_key_exists($strRequestPath, $arrayStaticPages)) {
        funcGeneratePage($arrayStaticPages[$strRequestPath]);
    }
    else {
        funcSendHeader('404');
    }
}

// ============================================================================
?>