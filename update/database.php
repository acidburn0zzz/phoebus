<?php
	
	// Setup an array of add-on ids corresponding to their site ids
	// This and the second array will be replaced with sql calls in the fullness of time
	$arrayAddonDB = array(
		'{03c2ba51-52c3-4cb1-9309-229eb4bc8948}' => 'pm-101',		// Theme: Kempelton Reloaded
		'adblocklatitude@addons.palemoon.org' => 'pm-102',			// Extension: ABP Pseudo-Static / ABL Next Gen
		'{016acf6d-e5c0-4768-9376-3763d1ad1978}' => 'pm-118',		// Extension: Adblock Latitude
		'bluemoonlinux@addons.palemoon.org' => 'pm-119',			// Extension: Blue Moon Linux
		'{410b6160-ff00-11dc-95ff-0800200c9a66}' => 'pm-121',		// Theme: Winstripe Classic
		'{1ebc69c0-92ff-11dc-8314-0800200c9a66}' => 'pm-122',		// Theme: Gnome Classic
		'{1fa04079-1a64-4676-96b6-4222176d7a27}' => 'pm-123',		// Theme: Nautical Classic
		'{81c983b9-ebe4-4b2e-b98e-98e62085837f}' => 'pm-124',		// Theme: White Moon
		'{0c44653b-8ca4-4125-b98e-98e62085837f}' => 'pm-125',		// Theme: Qute 4 PM
		'{a53af763-1a44-4820-b98e-98e62085837f}' => 'pm-126',		// Theme: PMOpera
		'{87a59598-d2b6-45ba-b98e-98e62085837f}' => 'pm-127',		// Theme: PMChrome
		'{bbee9373-4135-47cb-b98e-98e62085837f}' => 'pm-128',		// Theme: Fox 2 The Moon
		'aviary-addons-manager@addons.palemoon.org' => 'pm-129',	// Extension: Aviary Add-ons Manager
		'{669920c8-3426-4071-b98e-98e62085837f}' => 'pm-130',		// Theme: Tangerinemoon
		'{d2da57e2-a0d3-4b59-b98e-98e62085837f}' => 'pm-131',		// Theme: Tangomoon
		'noia-theme@addons.palemoon.org' => 'pm-132',				// Theme: Noia Moon (Theme)
		'{434de990-fa69-4811-b98e-98e62085837f}' => 'pm-133',		// Theme: Darkness
		'{4b13c0da-55d5-44ce-b98e-98e62085837f}' => 'pm-134',		// Theme: DarkPitch
		'{cbb923ca-2954-426b-b98e-98e62085837f}' => 'pm-135',		// Theme: Maxi3
		'{20c00d0d-79a4-4af5-b98e-98e62085837f}' => 'pm-136',		// Theme: Maxi4
		'{0ed852bb-a216-42e9-b98e-98e62085837f' => 'pm-137',		// Theme: Moonfox3
		'{a3056aed-a93d-4c22-b98e-98e62085837f}' => 'pm-138',		// Theme: Qute Large
		'{8a13d488-8657-4dab-b98e-98e62085837f}' => 'pm-139',		// Theme: Qute Legacy
		'{4d457603-1613-4177-b98e-98e62085837f}' => 'pm-140',		// Theme: reinheit
		'{60e12e8a-8197-4391-b98e-98e62085837f}' => 'pm-141',		// Theme: XMoon
		'imagetoolbox@addons.palemoon.org' => 'pm-142',				// Extension: Image Toolbox
		'{4bf973fe-f2b7-43e1-b2ca-52f9c6f6fddf}' => 'pm-143'		// Extension: Encrypted Web
	);
	
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'commander@palemoon.org' => 'https://www.palemoon.org/extensions/pmc-update.xml',					// Extension: Pale Moon Commander
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'		// Extension: Pale Moon Tab Groups
	);
	
?>