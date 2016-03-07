<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */
 
 // == | Debug |================================================================

// Uncomment to enable
// error_reporting(E_ALL);
// ini_set("display_errors", "on");

// ============================================================================

// == | Vars |=================================================================

$varHardcode_palemoonID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';
$varAMOServicesURL = 'https://services.addons.mozilla.org/';
$varAMOServicesAPIPath = '/firefox/api/1.5/';

// ============================================================================

// == | Sanity Checks |========================================================

// Client ID Check
if (array_key_exists('appID', $_GET)) {
	$varRequest_clientID = $_GET['appID'];
	if ($varRequest_clientID != $varHardcode_palemoonID) {
		die('Invalid Client ID');
	}
}
else {
	die('Client ID not set');
}

if (array_key_exists('scope', $_GET)) {
	$varRequest_scope = $_GET['scope'];
	if (($varRequest_scope != 'internal') || ($varRequest_scope != 'external')) {
		die('Invalid Scope');
	}
}
else {
	die('Scope not set');
}

if (array_key_exists('request', $_GET)) {
	$varRequest_req = $_GET['request'];
	if (($varRequest_req != 'get') || ($varRequest_req != 'search') || ($varRequest_reqq != 'recommended') || ($varRequest_rwq != 'themes')) {
		die('Invalid request');
	}
}
else {
	die('request not set');
}
// ============================================================================

// == | Main |=================================================================

if ($varRequest_scope == 'internal') {
	if ($varRequest_req == 'get') {
		$varRequest_locale = $_GET['locale'];
		$varRequest_addonID = $_GET['addonguid'];
		$varRequest_OS = $_GET['os'];
		funcRedirect($varAMOServicesURL . $varRequest_locale . $varAMOServicesAPIPath . 'search/guid:' . $varRequest_addonID . '?src=firefox&appOS=' . $varRequest_OS . '&appVersion=24.9');
	}
	elseif ($varRequest_req == 'search') {
		$varRequest_locale = $_GET['locale'];
		$varRequest_SearchQuery = $_GET['q'];
		$varRequest_OS = $_GET['os'];
		funcRedirect($varAMOServicesURL . $varRequest_locale . $varAMOServicesAPIPath . 'search/' . $varRequest_SearchQuery . '/all/10/' . $varRequest_OS . '/24.9');
	}
	elseif ($varRequest_req == 'recommended') {
		$varRequest_locale = $_GET['locale'];
		$varRequest_OS = $_GET['os'];
		funcRedirect($varAMOServicesURL . $varRequest_locale . $varAMOServicesAPIPath . 'list/featured/all/10/' . $varRequest_OS . '/24.9');
	}
	else {
		die('An unknown error has occurred');
	}
}
elseif ($varRequest_scope == 'external') {
	if ($varRequest_req == 'search') {
		$varRequest_SearchQuery = $_GET['q'];
		funcRedirect('https://addons.mozilla.org/firefox/search?q=' . $varRequest_SearchQuery);
	}
	elseif ($varRequest_req == 'recommended') {
		funcRedirect('https://addons.palemoon.org/extensions/all-extensions/');
	}
	elseif ($varRequest_req == 'themes') {
		funcRedirect('https://addons.palemoon.org/themes/complete/');
	}
	else {
		die('An unknown error has occurred');
	}
}
else {
	die('An unknown error has occurred');
}
// ============================================================================

// == | Redirect to URL |======================================================

function funcRedirect($varURL) {
	header('Location: ' . $varURL , true, 302);
}

// ============================================================================
?>