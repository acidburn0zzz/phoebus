<?php
	
	// Setup an array of add-on ids corresponding to their site ids
	// This and the second array will be replaced with sql calls in the fullness of time
	$arrayAddonDB = array(
		'{03c2ba51-52c3-4cb1-9309-229eb4bc8948}' => 'pm-101',
		'{016acf6d-e5c0-4768-9376-3763d1ad1978}' => 'pm-118',
		'bluemoonlinux@addons.palemoon.org' => 'pm-119',
		'aviary-addons-manager@addons.palemoon.org' => 'pm-129'
	);
	
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'commander@palemoon.org' => 'https://www.palemoon.org/extensions/pmc-update.xml',
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'
	);
	
?>