<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | funcGenAddonContent | =================================================

function funcGenAddonContent($_isTheme, $_arrayAddonMetadata) {

    if ($_isTheme == true) {
        $strAddonContent = file_get_contents($GLOBALS['strContentBasePath'] . 'addons/single-page-theme.xhtml');
    }
    else {
        $strAddonContent = file_get_contents($GLOBALS['strContentBasePath'] . 'addons/single-page-extension.xhtml');
    }
    
    $_arrayFilterSubstitute = array(
        '@ADDON_TYPE@' => $_arrayAddonMetadata['addon']['type'],
        '@ADDON_ID@' => $_arrayAddonMetadata['addon']['id'],
        '@ADDON_SLUG@' => $_arrayAddonMetadata['metadata']['slug'],
        '@ADDON_NAME@' => $_arrayAddonMetadata['metadata']['name'],
        '@ADDON_AUTHOR@' => $_arrayAddonMetadata['metadata']['author'],
        '@ADDON_DESCRIPTION@' => $_arrayAddonMetadata['metadata']['longDescription'],
        '@ADDON_BASEPATH@' => substr($_arrayAddonMetadata['addon']['basePath'], 1),
        '@ADDON_XPI_FILE@' => $_arrayAddonMetadata['addon']['release'],
        '@ADDON_XPI_VERSION@' => $_arrayAddonMetadata['xpi'][$_arrayAddonMetadata['addon']['release']]['version'],
        '@ADDON_XPI_MINVERSION@' => $_arrayAddonMetadata['xpi'][$_arrayAddonMetadata['addon']['release']]['minAppVersion'],
        '@ADDON_XPI_MAXVERSION@' => $_arrayAddonMetadata['xpi'][$_arrayAddonMetadata['addon']['release']]['maxAppVersion'],
    );
    
    foreach ($_arrayFilterSubstitute as $_fkey => $_fvalue) {
        $strAddonContent = str_replace($_fkey, $_fvalue, $strAddonContent);
    }
    
    $arrayPage = array(
        'title' => $_arrayAddonMetadata['metadata']['name'],
        'content' => $strAddonContent,
    );
    
    return $arrayPage;
}

// ============================================================================

// == | funcGenAllExtensions | ================================================

function funcGenAllExtensions($_array) {
    $_strFinalSubContent = '';
    
    foreach ($_array as $_key => $_value) {
        $_arrayReturn = funcGenCategoryContent('extension', $_value);
        $_strFinalSubContent = $_strFinalSubContent . '<h3>' . $_arrayReturn['title'] . '</h3>' .
            "\n" . $_arrayReturn['subContent'] . "\n";
    }
    
    $arrayPage = array(
        'title' => 'All Extensions',
        'contentFile' => $GLOBALS['strContentBasePath'] . 'addons/category-page-extensions.xhtml',
        'subContent' => $_strFinalSubContent
    );
    
    return $arrayPage;
}

// ============================================================================

// == | funcGenCategoryContent | ==============================================

function funcGenCategoryContent($_type, $_array) {
    $strCategoryContent = array();
    
    if ($_type == 'extension') {
        $strAddonCatList = file_get_contents($GLOBALS['strContentBasePath'] . 'addons/category-list-extensions.xhtml');
        $strExternalCatList = file_get_contents($GLOBALS['strContentBasePath'] . 'addons/category-list-externals.xhtml');
    }
    elseif ($_type == 'theme') {
        $strAddonCatList = file_get_contents($GLOBALS['strContentBasePath'] . 'addons/category-list-themes.xhtml');
    }
    elseif ($_type == 'search-plugin') {
        $strAddonCatList = file_get_contents($GLOBALS['strContentBasePath'] . 'addons/category-list-search-plugins.xhtml');
    }
 
    foreach ($_array as $_key => $_value) {
        if (($_type == 'extension' && is_int($_key)) || $_type == 'theme' || $_type == 'search-plugin') {
            $_strAddonCatList = $strAddonCatList;
            if ($_type == 'extension' || $_type == 'theme') {
                $_arrayAddonMetadata = funcReadManifest($_type, $_value, true, false, false, false, false);
                $_arrayFilterSubstitute = array(
                    '@ADDON_SLUG@' => $_arrayAddonMetadata['metadata']['slug'],
                    '@ADDON_NAME@' => $_arrayAddonMetadata['metadata']['name'],
                    '@ADDON_AUTHOR@' => $_arrayAddonMetadata['metadata']['author'],
                    '@ADDON_SHORTDESCRIPTION@' => $_arrayAddonMetadata['metadata']['shortDescription'],
                );
            }
            elseif ($_type == 'search-plugin') {
                $_arrayFilterSubstitute = array(
                    '@ADDON_ID@' => $_key,
                    '@ADDON_SLUG@' => $_value['slug'],
                    '@ADDON_NAME@' => $_value['name'],
                );
            }
            foreach ($_arrayFilterSubstitute as $_fkey => $_fvalue) {
                $_strAddonCatList = str_replace($_fkey, $_fvalue, $_strAddonCatList);
            }
            array_push($strCategoryContent, $_strAddonCatList);
        }
        elseif ($_type == 'extension' && $_key == 'externals') {
            foreach($_array['externals'] as $_key2 => $_value2) {
                $_strAddonCatList = $strExternalCatList;
                $_arrayFilterSubstitute = array(
                    '@ADDON_SLUG@' => $_key2,
                    '@ADDON_ID@' => $_value2['id'],
                    '@ADDON_NAME@' => $_value2['name'],
                    '@ADDON_URL@' => $_value2['url'],
                    '@ADDON_SHORTDESCRIPTION@' => $_value2['shortDescription'],
                );
                foreach ($_arrayFilterSubstitute as $_fkey => $_fvalue) {
                    $_strAddonCatList = str_replace($_fkey, $_fvalue, $_strAddonCatList);
                }
                array_push($strCategoryContent, $_strAddonCatList);
            }
        }
    }

    asort($strCategoryContent);
    $strCategoryContent = implode($strCategoryContent);
    
    if ($_type == 'extension') {
        $arrayPage = array(
            'title' => $_array['title'],
            'contentFile' => $GLOBALS['strContentBasePath'] . 'addons/category-page-extensions.xhtml',
            'subContent' => $strCategoryContent
        );
    }
    elseif ($_type == 'theme') {
        $arrayPage = array(
            'title' => 'Themes',
            'contentFile' => $GLOBALS['strContentBasePath'] . 'addons/category-page-themes.xhtml',
            'subContent' => $strCategoryContent
        );
    }
    elseif ($_type == 'search-plugin') {
        $arrayPage = array(
            'title' => 'Search Plugins',
            'contentFile' => $GLOBALS['strContentBasePath'] . 'addons/category-page-search-plugins.xhtml',
            'subContent' => $strCategoryContent
        );
    }
    
    return $arrayPage;
}

// ============================================================================

// == | Main | ================================================================

require_once($arrayModules['readManifest']);

if (startsWith($strRequestPath, '/extensions/')) {
    require_once($arrayModules['dbExtensions']);
    if ($strRequestPath == '/extensions/') {
        funcSendHeader('404');
    }
    elseif ($strRequestPath == '/extensions/category/all/') {
        require_once($arrayModules['dbExtCategories']);
        funcGeneratePage(funcGenAllExtensions($arrayExtensionCategoriesDB));
    }
    elseif (startsWith($strRequestPath, '/extensions/category/')) {
        require_once($arrayModules['dbExtCategories']);
        $strStrippedPath = str_replace('/', '', str_replace('/extensions/category/', '', $strRequestPath));
        
        if (array_key_exists($strStrippedPath,$arrayExtensionCategoriesDB)) {
            funcGeneratePage(funcGenCategoryContent('extension', $arrayExtensionCategoriesDB[$strStrippedPath]));
        }
        else {
            funcSendHeader('404');
        }
    }
    else {
        $strStrippedPath = str_replace('/', '', str_replace('/extensions/', '', $strRequestPath));
        $ArrayDBFlip = array_flip($arrayExtensionsDB);

        if (array_key_exists($strStrippedPath,$ArrayDBFlip)) {
            funcGeneratePage(funcGenAddonContent(false, funcReadManifest('extension', $strStrippedPath, true, true, false, false, false)));
        }
        else {
            funcSendHeader('404');
        }
    }
}
elseif (startsWith($strRequestPath, '/themes/')) {
    require_once($arrayModules['dbThemes']);
    if ($strRequestPath == '/themes/') {
        funcGeneratePage(funcGenCategoryContent('theme', $arrayThemesDB));
    }
    else {
        $strStrippedPath = str_replace('/', '', str_replace('/themes/', '', $strRequestPath));
        $ArrayDBFlip = array_flip($arrayThemesDB);

        if (array_key_exists($strStrippedPath,$ArrayDBFlip)) {
            funcGeneratePage(funcGenAddonContent(true, funcReadManifest('theme', $strStrippedPath, true, true, false, false, false)));
        }
        else {
            funcSendHeader('404');
        }
    }
}
elseif ($strRequestPath == '/search-plugins/') {
    require_once($arrayModules['dbSearchPlugins']);
    funcGeneratePage(funcGenCategoryContent('search-plugin', $arraySearchPluginsDB));
}
else {
    funcSendHeader('404');
}

// ============================================================================
?>