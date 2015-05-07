<?php
	// Set up some static vars
	$varLangPackVersion = '25.4';
	$varMinVersion = '25.4.0a1';
	$varMaxVersion = '25.*';
	$varBaseURL = 'http://relmirror.palemoon.org/langpacks/25.4/';
	$varXPIextension = '.xpi';
	$varClientGUID = '{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}';
	
	// Setup a multidimensional array to deal with all data regarding language packs
	$arrayLangPackDB = array(
		'langpack-en-GB@palemoon.org' => array( 'locale' => 'en-GB', 'hash' => '5272da545642770ee81f0b653fc1a94d40434a54c01fa62133aded388a0a7acf' ),
		'langpack-de@palemoon.org' => array( 'locale' => 'de', 'hash' => 'fc63a7b865c5a3cc27bb9e3ff77e31453344a45f4342cce04d1b24ba7ca983be' )
	);

	if (array_key_exists($_GET['langpackID'], $arrayLangPackDB)){
		$updateWriteOut ='<?xml version="1.0" encoding="UTF-8"?>

<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:em="http://www.mozilla.org/2004/em-rdf#">

  <RDF:Description about="urn:mozilla:item:langpack-' . $arrayLangPackDB[$_GET['langpackID']]['locale'] . '@palemoon.org">
    <em:updates>
      <RDF:Seq>
        <RDF:li>
          <RDF:Description>
            <em:version>' . $varLangPackVersion . '</em:version>
            <em:targetApplication>
              <RDF:Description>
                <em:id>' . $varClientGUID . '</em:id>
                <em:minVersion>' . $varMinVersion . '</em:minVersion>
                <em:maxVersion>' . $varMaxVersion . '</em:maxVersion>
                <em:updateLink>' . $varBaseURL . $arrayLangPackDB[$_GET['langpackID']]['locale'] . $varXPIextension . '</em:updateLink>
                <em:updateHash>sha256:' . $arrayLangPackDB[$_GET['langpackID']]['hash'] . '</em:updateHash>
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
		print 'You really are a moron..';
	}
	
?>