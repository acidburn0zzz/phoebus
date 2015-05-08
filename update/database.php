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
		'{4bf973fe-f2b7-43e1-b2ca-52f9c6f6fddf}' => 'pm-143',		// Extension: Encrypted Web
		'past-modern-revisited@lootyhoof-pm' => 'pm-144',		// Theme: Past Modern Revisited
		'{626cf6f3-deae-4cf8-b98e-98e62085837f}' => 'pm-145'		// Theme: Opresto
	);
	
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'commander@palemoon.org' => 'https://www.palemoon.org/extensions/pmc-update.xml',					// Extension: Pale Moon Commander
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'		// Extension: Pale Moon Tab Groups
	);
	
	// Setup a multidimensional array to deal with all data regarding language packs
	$arrayLangPackDB = array(
		'langpack-ar@palemoon.org' => array( 'locale' => 'ar', 'version' =>'25.4', 'hash' => '719e1269cc005a9a2a0b25f29b48337e4d88d593d914dd5a8c0acecac84a773e'),
		'langpack-bg@palemoon.org' => array( 'locale' => 'bg', 'version' =>'25.4', 'hash' => 'e3ba2eaa1befaa2776e2be5133982014100f5ee7ba0252a75ce1b07c324fb5d4'),
		'langpack-cs@palemoon.org' => array( 'locale' => 'cs', 'version' =>'25.4', 'hash' => '54867cb7d4f6bf42486b3c36499884cfa48fe30b8277e0ad0cf459d92c5e2cf9'),
		'langpack-da@palemoon.org' => array( 'locale' => 'da', 'version' =>'25.4', 'hash' => '8d89fdfd25108a26756bafeb1047e1ccd4622811eac1edf59aa89c116d48488e'),
		'langpack-de@palemoon.org' => array( 'locale' => 'de', 'version' => '25.4', 'hash' => '66aff2925a9cd7b3b3c0689ca62e33b65c8d113dede8b51deff41828abbfd7be' ),
		'langpack-en-GB@palemoon.org' => array( 'locale' => 'en-GB', 'version' => '25.4', 'hash' => '5272da545642770ee81f0b653fc1a94d40434a54c01fa62133aded388a0a7acf' ),
		'langpack-es-AR@palemoon.org' => array( 'locale' => 'es-AR', 'version' =>'25.4', 'hash' => '110ca385a69a555e6104ab406e8013a551a4a0d276481cc4491e5d7cd130abf1'),
		'langpack-es-ES@palemoon.org' => array( 'locale' => 'es-ES', 'version' =>'25.4', 'hash' => '0ac69860377082643bd98c9f669045e32ac60ed8c3eef6103445472158d82379'),
		'langpack-es-MX@palemoon.org' => array( 'locale' => 'es-MX', 'version' =>'25.4', 'hash' => 'cd80283d7e154b7f5e0457fab4a6806a5fc7b8dddbc5e629c9227891ed01269e'),
		'langpack-fi@palemoon.org' => array( 'locale' => 'fi', 'version' =>'25.4', 'hash' => 'bde0501297e3382d951f74c81ff94d8ebfc3cfe2891981c7278de35d9e945c30'),
		'langpack-fr@palemoon.org' => array( 'locale' => 'fr', 'version' =>'25.4', 'hash' => 'ef129ef1c10e44c064cbd8853ba1d95a837cb88d520e402100ee8c4ddc36019a'),
		'langpack-gl-ES@palemoon.org' => array( 'locale' => 'gl-ES', 'version' =>'25.4', 'hash' => '6b753c3d44a3b7faba0fbe91032c34476245e09b093ece698b01f4407ca52dd0'),
		'langpack-hr@palemoon.org' => array( 'locale' => 'hr', 'version' =>'25.4', 'hash' => '8b846d778cefc1dc76f2988dfe565bb894febaddbbc8f654f602d0ed75cce207'),
		'langpack-hu@palemoon.org' => array( 'locale' => 'hu', 'version' =>'25.4', 'hash' => '184cbc28b5d62d57eaffb23f6903c7fec964f605f56defffc4f29efb5541858a'),
		'langpack-is@palemoon.org' => array( 'locale' => 'is', 'version' =>'25.4', 'hash' => '8b6376ac96e13586475c713b1ea63f97e8657858810a5178e53013c26d9136ca'),
		'langpack-it@palemoon.org' => array( 'locale' => 'it', 'version' =>'25.4', 'hash' => '05f9679118cd335ae40014e385967d146dfa7abf2fb40b5d23f002111e6d815a'),
		'langpack-ja@palemoon.org' => array( 'locale' => 'ja', 'version' =>'25.4', 'hash' => 'af370d3a8010da34d5f6341ebd8800273c45a7529725ae2e5d00ed60884c36dc'),
		'langpack-kn@palemoon.org' => array( 'locale' => 'kn', 'version' =>'25.4', 'hash' => 'b0bf90ab51e13e5f91032568d2d626ba1f97743004e70e1dbff48a93acd3ad86'),
		'langpack-ko@palemoon.org' => array( 'locale' => 'ko', 'version' =>'25.4', 'hash' => '2ccf0c515746ba1268bb35132547bca12029a11a900bca82dc9f41bab2a23b25'),
		'langpack-nl@palemoon.org' => array( 'locale' => 'nl', 'version' =>'25.4', 'hash' => 'd72f86db0a9bf618c0ff9d507dd6fa25946c5af8a53c19a3ae24f88270c8c87a'),
		'langpack-pl@palemoon.org' => array( 'locale' => 'pl', 'version' =>'25.4', 'hash' => '5087cebe22a6317b2a176d1ff2892c42a15c01e490f43aee10d247ed655bb54a'),
		'langpack-pt-BR@palemoon.org' => array( 'locale' => 'pt-BR', 'version' =>'25.4', 'hash' => '24a30d82fba93caac927acee77131048f7a630cda42b4c1906ac48e6c497ded3'),
		'langpack-pt-PT@palemoon.org' => array( 'locale' => 'pt-PT', 'version' =>'25.4', 'hash' => '5aaf54f5f042cf4fe7f1e6a053860404712b39cc56e22027e6cf4c89b7fe165b'),
		'langpack-ro@palemoon.org' => array( 'locale' => 'ro', 'version' =>'25.4', 'hash' => '89a88a8a2e2d0cc44383b4bd04d019547477ea18f9941c1a2f47d9f32631a375'),
		'langpack-ru@palemoon.org' => array( 'locale' => 'ru', 'version' =>'25.4', 'hash' => '61d334e202ef843fa69c059d570c0b1c42190732422e8cac6c332762c32743a5'),
		'langpack-sl@palemoon.org' => array( 'locale' => 'sl', 'version' =>'25.4', 'hash' => 'd95f6789f2a8babb3fa0ece1a224b4ac4bdc1a46963b83d690540a36904d5604'),
		'langpack-sr@palemoon.org' => array( 'locale' => 'sr', 'version' =>'25.4', 'hash' => '85640793a1882f9aa802e0c3e3cdc535e94e2ec10c83e6454a52705607f58bf2'),
		'langpack-sv-SE@palemoon.org' => array( 'locale' => 'sv-SE', 'version' =>'25.4', 'hash' => 'df5c12a1000d7580adc3169a84bdff86e85ebb626ae17ecca89f986f7e447fc6'),
		'langpack-tr@palemoon.org' => array( 'locale' => 'tr', 'version' =>'25.4', 'hash' => '5c317d55e2ec8e8a431a4d7ea0a8197aeb2401f3031c4e8894dac4293417a099'),
		'langpack-zh-CN@palemoon.org' => array( 'locale' => 'zh-CN', 'version' =>'25.4', 'hash' => '59b2ccb2cfd3213a62390553f58325aafa9ad89eaffd808134ed7b4bbffb8387'),
		'langpack-zh-TW@palemoon.org' => array( 'locale' => 'zh-TW', 'version' =>'25.4', 'hash' => 'd591c565b61c745094eae333c22f60c88ddd2d733e05eed8ce0ed7f0b602299a')


	);
	
?>
