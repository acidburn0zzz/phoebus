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
	
	// Include the databases
	include './database.php';
	
	// Check if the Add-on ID matches any of the databases or if we should send it off to AMO
	if (array_key_exists($varRequest_addonID, $arrayAddonDB)) {
		// Pass the Add-ons Site ID to build the url and redirect 
		funcPass2UpdateXML($arrayAddonDB[$varRequest_addonID]);
	}
	elseif (array_key_exists($varRequest_addonID, $arrayExternalsDB)) {
		// Pass the URL and redirect
		funcPass2External($arrayExternalsDB[$varRequest_addonID]);
	}
	elseif (array_key_exists($varRequest_addonID, $arrayLangPackDB)) {
		// Can't be bothered to send everything through a function right now.. So just do it here!
		
		// Set some static vars
		$varLangPackVersion = '25.4';
		$varMinVersion = '25.4.0a1';
		$varMaxVersion = '25.*';
		$varBaseURL = 'http://relmirror.palemoon.org/langpacks/25.4/';
		$varXPIextension = '.xpi';
		$varClientGUID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';
		
		// Generate Update XML on the fly for Langpacks
		$updateWriteOut ='<?xml version="1.0" encoding="UTF-8"?>

<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:em="http://www.mozilla.org/2004/em-rdf#">

  <RDF:Description about="urn:mozilla:item:langpack-' . $arrayLangPackDB[$varRequest_addonID]['locale'] . '@palemoon.org">
    <em:updates>
      <RDF:Seq>
        <RDF:li>
          <RDF:Description>
            <em:version>' . $arrayLangPackDB[$varRequest_addonID]['version'] . '</em:version>
            <em:targetApplication>
              <RDF:Description>
                <em:id>' . $varClientGUID . '</em:id>
                <em:minVersion>' . $varMinVersion . '</em:minVersion>
                <em:maxVersion>' . $varMaxVersion . '</em:maxVersion>
                <em:updateLink>' . $varBaseURL . $arrayLangPackDB[$varRequest_addonID]['locale'] . $varXPIextension . '</em:updateLink>
                <em:updateHash>sha256:' . $arrayLangPackDB[$varRequest_addonID]['hash'] . '</em:updateHash>
              </RDF:Description>
            </em:targetApplication>
          </RDF:Description>
        </RDF:li>
      </RDF:Seq>
    </em:updates>
  </RDF:Description>
</RDF:RDF>';

		header('Content-Type: text/xml');
		echo($updateWriteOut);
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
	// Get our current client version
	$varRequest_clientVersion = $_GET['appVersion'];
	if (($varRequest_clientVersion == '25.3.2') ||
	($varRequest_clientVersion == '25.4.0') ||
	($varRequest_clientVersion == '99.9.9')
	) {
		// Get argument values that AMO cares about from the request and set them to vars
		$varRequest_addonID = $_GET['id']; 
		$varRequest_reqVersion = $_GET['reqVersion']; // This seems to always be '2'
		$varRequest_addonCompatMode = $_GET['compatMode']; // This is almost always 'normal' but it can be 'strict' for things like langpacks

		// We send Firefox GUID and a specific version number to AMO which is 24.9
		$varHardcode_firefoxID = '{ec8030f7-c20a-464f-9b0e-13a3a9e97384}';
		$varHardcode_firefoxVersion = '24.9';
	
		// Build and redirect the url
		header('Location: https://versioncheck.addons.mozilla.org/update/VersionCheck.php?reqVersion=' . $varRequest_reqVersion . '&id=' . $varRequest_addonID . '&appID=' . $varHardcode_firefoxID . '&appVersion=' . $varHardcode_firefoxVersion . '&compatMode=' . $varRequest_addonCompatMode, true, 302);
	}
	else {
		$updateWriteOut ='<?xml version="1.0"?>
<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
xmlns:em="http://www.mozilla.org/2004/em-rdf#">
</RDF:RDF>';	
		header('Content-Type: text/xml');
		print($updateWriteOut);
	}
}

?>