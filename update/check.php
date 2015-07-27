<?php
// == | Debug |================================================================

// Uncomment to enable
// error_reporting(E_ALL);
// ini_set("display_errors", "on");

// ============================================================================

// == | Vars |=================================================================

$varHardcode_palemoonID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';
$varHardcode_firefoxID = '{ec8030f7-c20a-464f-9b0e-13a3a9e97384}';
$varHardcode_firefoxVersion = '24.9';
$varAMOKillSwitch = false;
$varAMOWhitelist = false;

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

// Client Version Check
if (array_key_exists('appVersion', $_GET)) {
	$varRequest_clientVersion = $_GET['appVersion'];
}
else {
	die('Client Version not set');
}

// Add-on ID Check
if (array_key_exists('id', $_GET)) {
	$varRequest_addonID = $_GET['id'];
}
else {
	die('Add-on ID not set');
}

// ============================================================================

// == | Main |=================================================================

// Include the databases
include_once './database.php';

// Check if the Add-on ID matches any of the databases or if we should send it off to AMO
if (array_key_exists($varRequest_addonID, $arrayAddonDB)) {
	funcRedirect2UpdateXML('internal', $arrayAddonDB[$varRequest_addonID]);
}
elseif (array_key_exists($varRequest_addonID, $arrayExternalsDB)) {
	funcRedirect2UpdateXML('external', $arrayExternalsDB[$varRequest_addonID]);
}
elseif (array_key_exists($varRequest_addonID, $arrayLangPackDB)) {
	funcGenerateUpdateXML(
		'langpack',
		$varRequest_clientID,
		$varRequest_addonID,
		$arrayLangPackDB[$varRequest_addonID]['version'],
		$arrayLangPackDB[$varRequest_addonID]['hash'],
		$arrayLangPackDB[$varRequest_addonID]['locale']
	);
}
else {
	$arrayAllowedAMOVersionDB = array( '25.3.2', '25.4.0', '25.4.1', '99.9.9');
	if ($varRequest_clientID == $varHardcode_palemoonID) {
		if (($varAMOKillSwitch == false) && ($varAMOWhitelist == false || in_array($varRequest_clientVersion, $arrayAllowedAMOVersionDB) == true)) {
			$varRequest_reqVersion = $_GET['reqVersion']; // This seems to always be '2'
			$varRequest_addonCompatMode = $_GET['compatMode']; // This is almost always 'normal' but it can be 'strict' for things like langpacks
			$varAMOLink = 'https://versioncheck.addons.mozilla.org/update/VersionCheck.php?reqVersion=' . $varRequest_reqVersion . '&id=' . $varRequest_addonID . '&appID=' . $varHardcode_firefoxID . '&appVersion=' . $varHardcode_firefoxVersion . '&compatMode=' . $varRequest_addonCompatMode;
			
			funcRedirect2UpdateXML('external', $varAMOLink);
		}
		else {
			funcGenerateUpdateXML('bad', null, null, null, null, null);
		}
	}
	else {
		die('How did you even make it this far?!');
	}
    
}
// ============================================================================

// == | Redirect to Update XML |===============================================

function funcRedirect2UpdateXML($varXMLType, $varAddonData) {
	if ($varXMLType == 'internal') {
		header('Location: https://addons.palemoon.org/phoebus/datastore/' . $varAddonData . '/update.xml', true, 302);
	}
	elseif ($varXMLType == 'external') {
		header('Location: ' . $varAddonData , true, 302);
	}
	else {
		die('funcRedirect2UpdateXML: Unknown XML type');
	}
}

// ============================================================================

// == | Generate Update XML |==================================================

function funcGenerateUpdateXML($varXMLType, $varClientID, $varAddonID, $varAddonVersion, $varAddonHash, $varAddonData) {
	if ($varXMLType == 'langpack') {
		$varMinVersion = '25.6.0a1';
		$varMaxVersion = '25.*';
		$varBaseURL = 'http://relmirror.palemoon.org/langpacks/25.6/';
		$varXPIextension = '.xpi';
		
		// Generate Update XML on the fly for Langpacks
		$updateWriteOutLangpack ='<?xml version="1.0" encoding="UTF-8"?>

<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:em="http://www.mozilla.org/2004/em-rdf#">

  <RDF:Description about="urn:mozilla:item:' . $varAddonID . '">
    <em:updates>
      <RDF:Seq>
        <RDF:li>
          <RDF:Description>
            <em:version>' . $varAddonVersion . '</em:version>
            <em:targetApplication>
              <RDF:Description>
                <em:id>' . $varClientID . '</em:id>
                <em:minVersion>' . $varMinVersion . '</em:minVersion>
                <em:maxVersion>' . $varMaxVersion . '</em:maxVersion>
                <em:updateLink>' . $varBaseURL . $varAddonData . $varXPIextension . '</em:updateLink>
                <em:updateHash>sha256:' . $varAddonHash . '</em:updateHash>
              </RDF:Description>
            </em:targetApplication>
          </RDF:Description>
        </RDF:li>
      </RDF:Seq>
    </em:updates>
  </RDF:Description>
</RDF:RDF>';
		header('Content-Type: text/xml');
		print($updateWriteOutLangpack);
	}
	elseif ($varXMLType == 'bad') {
		$updateWriteOutBad ='<?xml version="1.0"?>
<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns:em="http://www.mozilla.org/2004/em-rdf#">
</RDF:RDF>';	
		header('Content-Type: text/xml');
		print($updateWriteOutBad);
	}
	else {
		die('funcGenerateUpdateXML: Unknown XML type');
	}
}

// ============================================================================
?>