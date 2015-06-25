<?php
error_reporting(E_ALL);

$amoGUID = $_GET['guid'];

$amoUpdateXML = 'https://versioncheck.addons.mozilla.org/update/VersionCheck.php?reqVersion=2&id=' . $amoGUID . '&appID={ec8030f7-c20a-464f-9b0e-13a3a9e97384}&appVersion=99.9&compatMode=normal';

$RDF = file_get_contents($amoUpdateXML);
$RDF = str_replace('<RDF:', '<RDF_', $RDF);
$RDF = str_replace('<em:', '<em_', $RDF);
$RDF = str_replace('</RDF:', '</RDF_', $RDF);
$RDF = str_replace('</em:', '</em_', $RDF);

function xml_to_array($xml,$main_heading = '') {
    $deXml = simplexml_load_string($xml);
    $deJson = json_encode($deXml);
    $xml_array = json_decode($deJson,TRUE);
    if (! empty($main_heading)) {
        $returned = $xml_array[$main_heading];
        return $returned;
    } else {
        return $xml_array;
    }
}

$amoUpdateXML_array = xml_to_array($RDF);

$updateLink = $amoUpdateXML_array['RDF_Description'][1]['em_targetApplication']['RDF_Description']['em_updateLink'];
     
preg_match('/https:\\/\\/addons\\.cdn\\.mozilla\\.net\\/user-media\\/addons\\/(.*)\\//', $updateLink, $matches);

$amoSiteID = $matches[1];

$amoAPIXML = file_get_contents('https://services.addons.mozilla.org/en-US/firefox/api/1.5/addon/' . $amoSiteID);

$amoAPIXML_array = xml_to_array($amoAPIXML);

echo '<a href="https://addons.mozilla.org/en-US/firefox/addon/' . $amoAPIXML_array['slug'] . '" target="_blank">' . $amoAPIXML_array['name'] . '</a>';

echo '<br /><br />'



?>