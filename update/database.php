<?php
	
	// Setup an array of add-on ids corresponding to their site ids
	// This and the second array will be replaced with sql calls in the fullness of time
	$arrayAddonDB = array(
		'{03c2ba51-52c3-4cb1-9309-229eb4bc8948}' => 'pm-101',		// Theme: Kempelton Reloaded
		'adblocklatitude@addons.palemoon.org' => 'pm-102',			// Extension: ABP Pseudo-Static / ABL Next Gen
		'commander@palemoon.org' => 'pm-113',						// Extension: Pale Moon Commander
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
		'{0ed852bb-a216-42e9-b98e-98e62085837f}' => 'pm-137',		// Theme: Moonfox3
		'{a3056aed-a93d-4c22-b98e-98e62085837f}' => 'pm-138',		// Theme: Qute Large
		'{8a13d488-8657-4dab-b98e-98e62085837f}' => 'pm-139',		// Theme: Qute Legacy
		'{4d457603-1613-4177-b98e-98e62085837f}' => 'pm-140',		// Theme: reinheit
		'{60e12e8a-8197-4391-b98e-98e62085837f}' => 'pm-141',		// Theme: XMoon
		'imagetoolbox@addons.palemoon.org' => 'pm-142',				// Extension: Image Toolbox
		'{4bf973fe-f2b7-43e1-b2ca-52f9c6f6fddf}' => 'pm-143',		// Extension: Encrypted Web
		'past-modern-revisited@lootyhoof-pm' => 'pm-144',			// Theme: Past Modern Revisited
		'{626cf6f3-deae-4cf8-b98e-98e62085837f}' => 'pm-145',		// Theme: Opresto
		'noia-options@addons.palemoon.org' => 'pm-146',				// Extension: Noia Moon (Options)
		'{6e1d3ac8-6069-4b8a-b98e-98e62085837f}' => 'pm-147',		// Theme: Compact Moon
		'{ff497972-c067-44d8-b98e-98e62085837f}' => 'pm-148',		// Extension: Compact Moon (Options)
		'{6593fe23-6af4-4e1e-b98e-98e62085837f}' => 'pm-149',		// Theme: Moonola
		'macmoon@lootyhoof-pm' => 'pm-150',							// Theme: MacMoon
		'{854a7ddc-f008-4263-b98e-98e62085837f}' => 'pm-151',		// Theme: LittleMoon
		'{6a2ffbbc-4f20-42f0-b98e-98e62085837f}' => 'pm-152',		// Theme: Australium
		'modoki@lootyhoof-pm' => 'pm-153',							// Theme: Modoki Moon
        'mozext_zinglocale@gooeysoftware.com' => 'pm-156'		    // Extension: Zing! Locale Switcher
	);
	
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'		// Extension: Pale Moon Tab Groups
	);
	
	// Setup a multidimensional array to deal with all data regarding language packs
	$arrayLangPackDB = array(
		'langpack-ar@palemoon.org' => array( 'locale' => 'ar', 'version' => '25.6', 'hash' => '01faae72bf5988ff51845ac2deef8bc0d2932e7682e23138474c9ae4039d6a44'),
		'langpack-bg@palemoon.org' => array( 'locale' => 'bg', 'version' => '25.6', 'hash' => 'd1adfd7cb1b4b71e42041df48affab7ee275108933026b2a3eb77298478ae113'),
		'langpack-cs@palemoon.org' => array( 'locale' => 'cs', 'version' => '25.6', 'hash' => '03a8093afc61ce9c4ff856c2b9b745368a7025c5bff073114e073b8822e91b17'),
		'langpack-da@palemoon.org' => array( 'locale' => 'da', 'version' => '25.6', 'hash' => '39e9737c715c614c9e1951b0f13682a10a3e740ec278e3a123c20d6ba77d73dc'),
		'langpack-de@palemoon.org' => array( 'locale' => 'de', 'version' => '25.6', 'hash' => '53b4247fd0513c1a94bc0cb96b4f40aae7891685fc7ca51bef36baea6eaca75c' ),
		'langpack-en-GB@palemoon.org' => array( 'locale' => 'en-GB', 'version' => '25.6', 'hash' => '3228bfa343283e295d961f6fc0b7bb79244cb6b16784c6da849de18d09871f3d' ),
		'langpack-es-AR@palemoon.org' => array( 'locale' => 'es-AR', 'version' => '25.6', 'hash' => 'cb6a5283fa8409516d6d57c1fa42a74048d365d63e0a5663050eb662a9c8d533'),
		'langpack-es-ES@palemoon.org' => array( 'locale' => 'es-ES', 'version' => '25.6', 'hash' => '11ffa1ae89a68c27ee7b9688bbff0ed1e33c1fba2f04e117b887620a7827861c'),
		'langpack-es-MX@palemoon.org' => array( 'locale' => 'es-MX', 'version' => '25.6', 'hash' => '0a745b8bf9221129b296169c9a56355344adf394a0035a3608feaea070681b84'),
		'langpack-fi@palemoon.org' => array( 'locale' => 'fi', 'version' => '25.6', 'hash' => '58032224fa99d5a6458b3fd8668e51909698a6da53b970add35a612539de3398'),
		'langpack-fr@palemoon.org' => array( 'locale' => 'fr', 'version' => '25.6', 'hash' => '4097d448876144e4e930b2f74c0724e5cbba8481999764fafe73a32ef027a794'),
		'langpack-gl-ES@palemoon.org' => array( 'locale' => 'gl-ES', 'version' => '25.6', 'hash' => 'b7a2e2e48e78369b234549d37dd49fe73845112811fb64242a0d8947af5822d2'),
		'langpack-hr@palemoon.org' => array( 'locale' => 'hr', 'version' => '25.6', 'hash' => '3282728293155a8b72c0bccda1872f5c5e50f90137d3713e22a946fa20304d17'),
		'langpack-hu@palemoon.org' => array( 'locale' => 'hu', 'version' => '25.6', 'hash' => '614e2ded6ff59514517ff801d0f08a39885a010dcacfd6909c4464f3b3819f41'),
		'langpack-is@palemoon.org' => array( 'locale' => 'is', 'version' => '25.6', 'hash' => '937085c929a3efe980b5327ad8c5a73e803cee915401b1412e6a0adc1e2ff540'),
		'langpack-it@palemoon.org' => array( 'locale' => 'it', 'version' => '25.6', 'hash' => 'e79689ea9c51b6407f9dc2bc1f8373efdf1086b5a20fe108d336168ce61475f9'),
		'langpack-ja@palemoon.org' => array( 'locale' => 'ja', 'version' => '25.6', 'hash' => 'f91e30b05a784fc40c9af2827fad733e77e69a5ded08b48c74306f7cd7f90ac9'),
		'langpack-kn@palemoon.org' => array( 'locale' => 'kn', 'version' => '25.6', 'hash' => 'bb6a4140f149553dea7d69649e2295e78c6a730c3c40d556c89519ca7562d2e4'),
		'langpack-ko@palemoon.org' => array( 'locale' => 'ko', 'version' => '25.6', 'hash' => '90e00a5584ae693863d1f06e2adedcd270b6042fa58647d0159620f78e19a833'),
		'langpack-nl@palemoon.org' => array( 'locale' => 'nl', 'version' => '25.6', 'hash' => '0543ee601c8219bc85bef05d7b74e8ffed263bde25286f4bfdab8d97fbd5e060'),
		'langpack-pl@palemoon.org' => array( 'locale' => 'pl', 'version' => '25.6', 'hash' => '1bbff99cb536d7291739a25824ccf2da5fa0db9fab790e85e380728e4150f341'),
		'langpack-pt-BR@palemoon.org' => array( 'locale' => 'pt-BR', 'version' => '25.6', 'hash' => '1d9c5512913f827a0ddf0efd81f8c4cd972319f04afeeab0d17ef2f26ba031c3'),
		'langpack-pt-PT@palemoon.org' => array( 'locale' => 'pt-PT', 'version' => '25.6', 'hash' => '0f4bbb92ab3750ae166d819a88dcc9eb4aa55f4c7d632002ee065bf3ef0068c2'),
		'langpack-ro@palemoon.org' => array( 'locale' => 'ro', 'version' => '25.6', 'hash' => '9cf5c4c326186284e186593c1b6bb9c9b24621f92fec3f787fd68c09988d6aa8'),
		'langpack-ru@palemoon.org' => array( 'locale' => 'ru', 'version' => '25.6', 'hash' => 'd87d61272f20e86022cc3fccd56a1bb96b784b496fc573127951f6de3a51912f'),
		'langpack-sl@palemoon.org' => array( 'locale' => 'sl', 'version' => '25.6', 'hash' => 'c4a1dc5a91c9bca721abfaea0ddc07e8da366328e56b6db9e6097a11022d5863'),
		'langpack-sr@palemoon.org' => array( 'locale' => 'sr', 'version' => '25.6', 'hash' => '8ebb62141a38755f18c206844deba27751edc7d756762e239537845f8a289e58'),
		'langpack-sv-SE@palemoon.org' => array( 'locale' => 'sv-SE', 'version' => '25.6', 'hash' => '92258ab10375d4f37cbb7fe5312a8a39410afd4fdf16bf7892e538ec469c4b19'),
		'langpack-tr@palemoon.org' => array( 'locale' => 'tr', 'version' => '25.6', 'hash' => 'a9f81bc577f628f2535fe89f97665fb7a8e1c6366544169af0f2ea4cd23cc1f6'),
		'langpack-zh-CN@palemoon.org' => array( 'locale' => 'zh-CN', 'version' => '25.6', 'hash' => '727bbaf6c45e9c5fb30210d8c3313641a68851e6fdd10ebd7ee74ee935fd48e3'),
		'langpack-zh-TW@palemoon.org' => array( 'locale' => 'zh-TW', 'version' => '25.6', 'hash' => '00f574b1d909a75770aabecea93e072bf95b91cfa6d84a378933d2f501f57586')
	);
	
?>
