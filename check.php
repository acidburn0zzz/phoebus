<?php
// Debugging.. uncomment to enable it
// error_reporting(E_ALL);
// ini_set("display_errors", "on");

// Essentially main()
funcCheckClientID();

// This function is a sanity and pseudo-security check to make sure that we only process requests from a particular client ID
// Currently this is ONLY Pale Moon 25+
function funcCheckClientID() {
	//Get Client ID from the url request
	$varRequest_clientID = $_GET['appID'];
	
	// Actually do the check
	if ($varRequest_clientID == '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}') {
		funcCheckAddonID();
	}
	else {
		print('Unknown Client ID');
	}
}

// This function is what checks the ID against what we actually know
function funcCheckAddonID() {
	// Get Add-on ID from the url request
	$varRequest_addonID = $_GET['id'];
	
	// Setup an array of add-on ids corresponding to their site ids
	// This and the second array will be replaced with sql calls in the fullness of time
	$arrayAddonDB = array(
		'{016acf6d-e5c0-4768-9376-3763d1ad1978}' => 'pm-118',
		'bluemoonlinux@addons.palemoon.org' => 'pm-119',
		'aviary-addons-manager@addons.palemoon.org' => 'pm-129'
	);
	
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'commander@palemoon.org' => 'https://www.palemoon.org/extensions/pmc-update.xml',
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'
	);
	
	// Check if the Add-on ID matches any of the databases or if we should send it off to AMO
	if (array_key_exists($varRequest_addonID, $arrayAddonDB)){
		// Pass the Add-ons Site ID to build the url and redirect 
		funcPass2UpdateXML($arrayAddonDB[$varRequest_addonID]);
	}
	elseif (array_key_exists($varRequest_addonID, $arrayExternalsDB)){
		// Pass the URL and redirect
		funcPass2External($arrayExternalsDB[$varRequest_addonID]);
	}
	else {
		// Since the add-on ID does not match either list of known add-ons we send it off to AMO
		funcPass2AMO();
	}
}

// This function simply 302s to an update.xml file on the local server
function funcPass2UpdateXML($varAddonID) {
	// Build and redirect the url
	header('Location: https://addons.palemoon.org/phoebus/datastore/' . $varAddonID . '/update.xml', true, 302);
}

// This function simply 302s to an external's update.xml
function funcPass2External($varExternalURL) {
	// Redirect the url
	header('Location: ' . $varExternalURL , true, 302);
}

// This function is very important as it allows us to pass any unknown add-ons on to AMO
function funcPass2AMO() {
	// Get argument values that AMO cares about from the request and set them to vars
	$varRequest_addonID = $_GET['id']; 
	$varRequest_reqVersion = $_GET['reqVersion']; // This seems to always be '2'
	$varRequest_addonCompatMode = $_GET['compatMode']; // This is almost always 'normal' but it can be 'strict' for things like langpacks

	// We send Firefox GUID and a specific version number to AMO which is 24.9
	// $varRequest_clientID = $_GET['appID'];
	// $varRequest_clientVersion = $_GET['appVersion'];
	$varHardcode_firefoxID = '{ec8030f7-c20a-464f-9b0e-13a3a9e97384}';
	$varHardcode_firefoxVersion = '24.9';

	// *** These vars do not have any material effect on the generated update xml file from AMO so we are no longer passing them ***
	// $varRequest_updateType = $_GET['updateType']; // This seems to always be 112
	// $varRequest_addonVersion = $_GET['version'];
	// $varRequest_addonMaxVersion = $_GET['maxAppVersion'];
	// $varRequest_clientOS = $_GET['appOS'];
	// $varRequest_clientABI = $_GET['appABI'];
	// $varRequest_clientLocale = $_GET['locale'];
	// $varRequest_addonStatus = $_GET['status']; // This can be 'userEnabled' or 'userDisabled'
	// $varRequest_clientCurrentVersion = $_GET['currentAppVersion'];
	
	// Build and redirect the url
	header('Location: https://versioncheck.addons.mozilla.org/update/VersionCheck.php?reqVersion=' . $varRequest_reqVersion . '&id=' . $varRequest_addonID . '&appID=' . $varHardcode_firefoxID . '&appVersion=' . $varHardcode_firefoxVersion . '&compatMode=' . $varRequest_addonCompatMode, true, 302);
}

?>