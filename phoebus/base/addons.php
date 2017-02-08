<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | funcGenAddonContent | =================================================

function funcGenAddonContent($_isTheme, $_strAddonSlug) {

    if ($_isTheme == true) {
        $_arrayAddonMetadata = funcReadManifest('theme', $_strAddonSlug, true, true, false, false, false);
    }
    else {
        $_arrayAddonMetadata = funcReadManifest('extension', $_strAddonSlug, true, true, false, false, false);
    }
    
    $_arrayAddonMetadata['addon']['basePath'] = substr($_arrayAddonMetadata['addon']['basePath'], 1);
    
    $arrayPage = array(
        'title' => $_arrayAddonMetadata['metadata']['name'],
        'contentTemplate' => $GLOBALS['strSkinBasePath'] . 'single.tpl',
        'contentData' => $_arrayAddonMetadata
    );
    
    return $arrayPage;
}

// ============================================================================

// == | funcGenAllExtensions | ================================================

function funcGenAllExtensions($_array) {
    $arrayCategory = array();
    
    foreach ($_array as $_key => $_value) {
        $_arraySingleCategory = funcGenCategoryContent('extension', $_value);
        foreach ($_arraySingleCategory["contentData"] as $_key2 => $_value2) {
            $arrayCategory[$_key2] = $_value2;
        }
    }
    
    ksort($arrayCategory);
    
    $arrayPage = array(
        'title' => 'All Extensions',
        'contentType' => 'cat-all-extensions',
        'contentTemplate' => $GLOBALS['strSkinBasePath'] . 'category.tpl',
        'contentData' => $arrayCategory
    );

    return $arrayPage;
}

// ============================================================================

// == | funcGenCategoryContent | ==============================================

function funcGenCategoryContent($_type, $_array) {
    $arrayCategory = array();
    
    foreach ($_array as $_key => $_value) {
        if (($_type == 'extension' && is_int($_key)) || $_type == 'theme' || $_type == 'search-plugin') {
            if ($_type == 'extension' || $_type == 'theme') {
                $_arrayAddonMetadata = funcReadManifest($_type, $_value, true, false, false, false, false);
                unset($_arrayAddonMetadata['xpi']);
                $arrayCategory[$_arrayAddonMetadata['metadata']['name']] = $_arrayAddonMetadata;
                unset($_arrayAddonMetadata);
            }
            elseif ($_type == 'search-plugin') {
                $_arrayAddonMetadata = simplexml_load_file('./datastore/searchplugins/' . $_value);
                $arrayCategory[(string)$_arrayAddonMetadata->ShortName]['addon']['type'] = 'search-plugin';
                $arrayCategory[(string)$_arrayAddonMetadata->ShortName]['addon']['id'] = $_key;
                $arrayCategory[(string)$_arrayAddonMetadata->ShortName]['metadata']['name'] = (string)$_arrayAddonMetadata->ShortName;
                $arrayCategory[(string)$_arrayAddonMetadata->ShortName]['metadata']['slug'] = substr($_value, 0, -4);
                $arrayCategory[(string)$_arrayAddonMetadata->ShortName]['metadata']['icon'] = (string)$_arrayAddonMetadata->Image;
                unset($_arrayAddonMetadata);
            }
        }
        elseif ($_type == 'extension' && $_key == 'externals') {
            foreach($_array['externals'] as $_key2 => $_value2) {
                $arrayCategory[$_value2['name']]['addon']['type'] = 'external';
                $arrayCategory[$_value2['name']]['addon']['id'] = $_value2['id'];
                $arrayCategory[$_value2['name']]['metadata']['name'] = $_value2['name'];
                $arrayCategory[$_value2['name']]['metadata']['url'] = $_value2['url'];
                $arrayCategory[$_value2['name']]['metadata']['shortDescription'] = $_value2['shortDescription'];
            }
        }
    }
    ksort($arrayCategory, SORT_NATURAL | SORT_FLAG_CASE);
    
    $arrayPage = array(
        'contentTemplate' => $GLOBALS['strSkinBasePath'] . 'category.tpl',
        'contentData' => $arrayCategory
    );
    
    if ($_type == 'extension') {
        $arrayPage['title'] = $_array['title'];
        $arrayPage['contentType'] = 'cat-extensions';
    }
    elseif ($_type == 'theme') {
        $arrayPage['title'] = 'Themes';
        $arrayPage['contentType'] = 'cat-themes';
    }
    elseif ($_type == 'search-plugin') {
        $arrayPage['title'] = 'Search Plugins';
        $arrayPage['contentType'] = 'cat-search-plugins';
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
            funcGeneratePage(funcGenAddonContent(false, $strStrippedPath));
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
            funcGeneratePage(funcGenAddonContent(true, $strStrippedPath));
        }
        else {
            funcSendHeader('404');
        }
    }
}
elseif ($strRequestPath == '/search-plugins/') {
    require_once($arrayModules['dbSearchPlugins']);
    funcGeneratePage(funcGenCategoryContent('search-plugin', $arraySearchPluginsDB));
    //funcSendHeader('501');
}
else {
    funcSendHeader('404');
}

// ============================================================================
?>