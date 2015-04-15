<?php
	
	// Setup an array of add-on ids corresponding to their site ids
	// This and the second array will be replaced with sql calls in the fullness of time
	$arrayAddonDB = array(
		'{03c2ba51-52c3-4cb1-9309-229eb4bc8948}' => 'pm-101',
		'{adblocklatitude@addons.palemoon.org}' => 'pm-102',
		'{016acf6d-e5c0-4768-9376-3763d1ad1978}' => 'pm-118',
		'bluemoonlinux@addons.palemoon.org' => 'pm-119',
		'{410b6160-ff00-11dc-95ff-0800200c9a66}' => 'pm-121',
		'{1ebc69c0-92ff-11dc-8314-0800200c9a66}' => 'pm-122',
		'{1fa04079-1a64-4676-96b6-4222176d7a27}' => 'pm-123',
		'{81c983b9-ebe4-4b2e-b98e-98e62085837f}' => 'pm-124',
		'{0c44653b-8ca4-4125-b98e-98e62085837f}' => 'pm-125',
		'{a53af763-1a44-4820-b98e-98e62085837f}' => 'pm-126',
		'{87a59598-d2b6-45ba-b98e-98e62085837f}' => 'pm-127',
		'{bbee9373-4135-47cb-b98e-98e62085837f}' => 'pm-128',
		'aviary-addons-manager@addons.palemoon.org' => 'pm-129',
		'{669920c8-3426-4071-b98e-98e62085837f}' => 'pm-130',
		'{d2da57e2-a0d3-4b59-b98e-98e62085837f}' => 'pm-131',
		'noia-theme@addons.palemoon.org' => 'pm-132'
	);
	
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'commander@palemoon.org' => 'https://www.palemoon.org/extensions/pmc-update.xml',
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'
	);
	
?>