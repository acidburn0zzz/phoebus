<?php
error_reporting(E_ERROR);
if(isset($_GET['apmoID'])) {
	$addonID = $_GET['apmoID'];
}
else {
	die('Error: You need to specify an id');
}

$addon_manifest = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/phoebus/datastore/' . $addonID . '/manifest.ini');
if ($addon_manifest == false) {
die('Error: Unable to read manifest ini file');
}
else {
$xpiHash = hash_file('sha256', $_SERVER["DOCUMENT_ROOT"] . '/phoebus/datastore/' . $addon_manifest["id"] . '/' . $addon_manifest["xpi"]);

$updateWriteOut ='<?xml version="1.0" encoding="UTF-8"?>

<RDF:RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:em="http://www.mozilla.org/2004/em-rdf#">

  <RDF:Description about="urn:mozilla:' . $addon_manifest["type"] . ':' . $addon_manifest["guid"] . '">
    <em:updates>
      <RDF:Seq>
        <RDF:li>
          <RDF:Description>
            <em:version>' . $addon_manifest["version"] . '</em:version>
            <em:targetApplication>
              <RDF:Description>
                <em:id>{8de7fcbb-c55c-4fbe-bfc5-fc555c87dbc4}</em:id>
                <em:minVersion>25.0</em:minVersion>
                <em:maxVersion>' . $addon_manifest["compat"] . '</em:maxVersion>
                <em:updateLink>https://addons.palemoon.org/phoebus/datastore/' . $addon_manifest["id"] . '/' . $addon_manifest["xpi"] . '</em:updateLink>
                <em:updateHash>sha256:' . $xpiHash . '</em:updateHash>
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
?>