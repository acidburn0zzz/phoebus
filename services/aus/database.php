<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */
 
	// Setup an array of add-on ids corresponding to their site ids
	// This and the second array will be replaced with sql calls in the fullness of time
	$arrayExtensionsDB = array(
		'adblocklatitude@addons.palemoon.org' => 'adblock-latitude-nextgen',
		'commander@palemoon.org' => 'pm-commander',
		'{016acf6d-e5c0-4768-9376-3763d1ad1978}' => 'adblock-latitude',
		'bluemoonlinux@addons.palemoon.org' => 'blue-moon-linux',
		'aviary-addons-manager@addons.palemoon.org' => 'aviary-addons-manager',
		'imagetoolbox@addons.palemoon.org' => 'image-toolbox',
		'{4bf973fe-f2b7-43e1-b2ca-52f9c6f6fddf}' => 'encrypted-web',
		'noia-options@addons.palemoon.org' => 'noia-moon-options',
		'{ff497972-c067-44d8-b98e-98e62085837f}' => 'compact-moon-options',
		'mozext_zinglocale@gooeysoftware.com' => 'zing-locale-switcher',
		'guerilla@ketmar.no-ip.org' => 'guerilla-scripting',
		'colormytabs@jetpack' => 'color-my-tabs',
		'{d49bc111-8359-4a82-8738-db3f9a411f58}' => 'history-menu-button',
		'{302dd086-df72-4fbf-835f-dc1f296049eb}' => 'extension-preferences-menu',
		'{2db74bf0-e2ce-4412-a47c-ec6de1449db1}' => 'space-advance',
		'{f60dcfb5-358d-498e-9f2e-1b53eba4dde7}' => 'searchload-options-revived',
		'jid1-IDCACPalemoon@jetpack' => 'i-dont-care-about-cookies',
		'jid1-KKzOGWgsW3Ao4Q@jetpack' => 'i-dont-care-about-cookies',
		'mozarchiver@lootyhoof-pm' => 'mozarchiver',
		'{98a2ae55-3a75-4354-a460-9176594d05c3}' => 'open-about-config',
		'printPages2Pdf@reinhold.ripper' => 'print-pages-to-pdf',
		'printPages2Pdf4AtomWinXP@reinhold.ripper' => 'print-pages-to-pdf-for-atom-winxp'
	);
	
	$arrayThemesDB = array(
		'{03c2ba51-52c3-4cb1-9309-229eb4bc8948}' => 'kempelton-reloaded',
		'{81c983b9-ebe4-4b2e-b98e-98e62085837f}' => 'white-moon',
		'{0c44653b-8ca4-4125-b98e-98e62085837f}' => 'qute-4-pm',
		'{a53af763-1a44-4820-b98e-98e62085837f}' => 'pmopera',
		'{87a59598-d2b6-45ba-b98e-98e62085837f}' => 'pmchrome',
		'{bbee9373-4135-47cb-b98e-98e62085837f}' => 'fox-2-the-moon',
		'{669920c8-3426-4071-b98e-98e62085837f}' => 'tangerinemoon',
		'{d2da57e2-a0d3-4b59-b98e-98e62085837f}' => 'tangomoon',
		'noia-theme@addons.palemoon.org' => 'noia-moon-theme',
		'{434de990-fa69-4811-b98e-98e62085837f}' => 'darkness',
		'{4b13c0da-55d5-44ce-b98e-98e62085837f}' => 'darkpitch',
		'{cbb923ca-2954-426b-b98e-98e62085837f}' => 'maxi3',
		'{20c00d0d-79a4-4af5-b98e-98e62085837f}' => 'maxi4',
		'{0ed852bb-a216-42e9-b98e-98e62085837f}' => 'moonfox3',
		'{a3056aed-a93d-4c22-b98e-98e62085837f}' => 'qute-large',
		'{8a13d488-8657-4dab-b98e-98e62085837f}' => 'qute-legacy',
		'{4d457603-1613-4177-b98e-98e62085837f}' => 'reinheit',
		'{60e12e8a-8197-4391-b98e-98e62085837f}' => 'xmoon',
		'{626cf6f3-deae-4cf8-b98e-98e62085837f}' => 'opresto',
		'past-modern-revisited@lootyhoof-pm' => 'past-modern-revisited',
		'{6e1d3ac8-6069-4b8a-b98e-98e62085837f}' => 'compact-moon-theme',
		'{6593fe23-6af4-4e1e-b98e-98e62085837f}' => 'moonola',
		'macmoon@lootyhoof-pm' => 'macmoon',
		'{854a7ddc-f008-4263-b98e-98e62085837f}' => 'littlemoon',
		'{6a2ffbbc-4f20-42f0-b98e-98e62085837f}' => 'australium',
		'modoki@lootyhoof-pm' => 'modoki-moon',
		'{edbb972f-e557-4870-b98e-98e62085837f}' => 'aeromoon',
		'{e3e77d59-b01e-4381-b98e-98e62085837f}' => 'nauticalia',
		'camimoon@lootyhoof-pm' => 'camimoon',
		'{03e0a23d-1be6-4040-b98e-98e62085837f}' => 'micromoon',
		'darkmoon@lootyhoof-pm' => 'darkmoon',
		'phoenity-rebirth@lootyhoof-pm' => 'phoenity-rebirth'
	);
    
	// Setup an array of add-on ids corresponding to location of the external update xml url
	$arrayExternalsDB = array(
		'firefox-tabgroups@mozilla.com' => 'https://www.palemoon.org/extensions/tabgroups-update.xml'
	);
	
	// Setup a multidimensional array to deal with all data regarding language packs
	$arrayLangPackDB = array(
		'langpack-ar@palemoon.org' => array( 'locale' => 'ar', 'version' => '26.0', 'hash' => 'fcb38f0715262f7a1887f7619e5d6b4ffed5b868e6dbcb2083af4150c47040b6'),
		'langpack-cs@palemoon.org' => array( 'locale' => 'cs', 'version' => '26.1', 'hash' => 'eaeaab3d76d2aadc6694e45ec85ee9615136ffaa594196ee351b53bdab947273'),
		'langpack-da@palemoon.org' => array( 'locale' => 'da', 'version' => '26.1', 'hash' => '5c0bb9530cda753b43ddb988ad3257d3943fc3d0f6407a9bb946ea10e81487b1'),
		'langpack-de@palemoon.org' => array( 'locale' => 'de', 'version' => '26.1', 'hash' => 'a270d3c268c8368b5f33c7f4fd5cdee36ecf04c95a51a2d83ecde54de2fae536'),
		'langpack-el@palemoon.org' => array( 'locale' => 'el', 'version' => '26.0', 'hash' => 'e63797044bbe2656e02263826aeff8bef62f80fe729102f0da738eaa5b682dda'),
		'langpack-en-GB@palemoon.org' => array( 'locale' => 'en-GB', 'version' => '26.0', 'hash' => 'd8ebe057a31814638fbb910cc5d697426550448636bd62910296e7c358a97066'),
		'langpack-es-AR@palemoon.org' => array( 'locale' => 'es-AR', 'version' => '26.1', 'hash' => '5f6a4cdad2c690eb8cf457fc39581a4c566bbb6b6f388c335a4d73ab995ee043'),
		'langpack-es-ES@palemoon.org' => array( 'locale' => 'es-ES', 'version' => '26.0', 'hash' => 'ddd1fa0156c4855684f217df6f6389ee96d5511c4e0c816e620c911c766a7be6'),
		'langpack-es-MX@palemoon.org' => array( 'locale' => 'es-MX', 'version' => '26.1', 'hash' => '05cf2bf22d652d3516ec092392c87c5c578f01f58821971d1b55548457788134'),
		'langpack-fi@palemoon.org' => array( 'locale' => 'fi', 'version' => '26.0', 'hash' => '3c679e30fee49780fa6d8522e8e690964a0d7724d175164afd45f68edb1a361d'),
		'langpack-fr@palemoon.org' => array( 'locale' => 'fr', 'version' => '26.0', 'hash' => '7b5dc1e42143eb387a54cd494cf1da756592d470ab2ea94d389bfed6b37ca77a'),
		'langpack-gl-ES@palemoon.org' => array( 'locale' => 'gl-ES', 'version' => '26.0', 'hash' => '0a748005c4b53a1a59bd87269d20be03405e7a6854cf03f983977d315b83a860'),
		'langpack-hr@palemoon.org' => array( 'locale' => 'hr', 'version' => '26.0', 'hash' => 'a10c88bb7859b56e0dee3d24589def0df1f4d0abbf0093f982d32383bef32d9f'),
		'langpack-hu@palemoon.org' => array( 'locale' => 'hu', 'version' => '26.0', 'hash' => 'e7b18c2c41c637c6b2bf634d21e561e514e2f7ad55fbe5a00fea5b9364f9bc2f'),
		'langpack-is@palemoon.org' => array( 'locale' => 'is', 'version' => '26.0', 'hash' => '00a714a0a3c97ef5d298e3108e6b35244f53e3773008c7e04178a1985b1f86fb'),
		'langpack-it@palemoon.org' => array( 'locale' => 'it', 'version' => '26.2', 'hash' => '3b0ffc793617f7f04cece96acdadeff5eae4e27fefce4294c82b740fceb67ffb'),
		'langpack-ja@palemoon.org' => array( 'locale' => 'ja', 'version' => '26.0', 'hash' => 'ca513cc3e9dc02666f8889cb2ddd85628de76e74ab50643173fc2a8513f07303'),
		'langpack-kn@palemoon.org' => array( 'locale' => 'kn', 'version' => '26.0', 'hash' => '08f4843f2ea5907e83421d97c0deb0fabfa349c9a584e4fd734239aa42635cde'),
		'langpack-ko@palemoon.org' => array( 'locale' => 'ko', 'version' => '26.0', 'hash' => '51f833ac9af1930688574c9985a7984ecf824be47189dcad78d843dd0dfe15fc'),
		'langpack-nl@palemoon.org' => array( 'locale' => 'nl', 'version' => '26.1', 'hash' => '319c7deee69930772b873f0a37c8e888a43ab703dde41f466b712e4d12db27e0'),
		'langpack-pl@palemoon.org' => array( 'locale' => 'pl', 'version' => '26.0', 'hash' => 'd1e1bba7137d9fcea82999887077b378add8f2c8954780b3e37d0db2f0e14ee4'),
		'langpack-pt-BR@palemoon.org' => array( 'locale' => 'pt-BR', 'version' => '26.0', 'hash' => 'c6779e7a40469e2f15b28822405c86c5c46fdfb1603b5d980a6cd010237bbc17'),
		'langpack-pt-PT@palemoon.org' => array( 'locale' => 'pt-PT', 'version' => '26.0', 'hash' => '57533ee17fd6eada0989f4c71e427e0038a3e6f852fe270299a9959370fbaddc'),
		'langpack-ro@palemoon.org' => array( 'locale' => 'ro', 'version' => '26.0', 'hash' => 'd3ce1e5a5524305b7f5817855b5c4dac82ecee16d43a58b4bfc0e2ca398b31f1'),
		'langpack-ru@palemoon.org' => array( 'locale' => 'ru', 'version' => '26.0', 'hash' => '6f65632a62d1ad1b0f51d9b723aceb87a940fb7fd19bbe36261de8d51da4bc3e'),
		'langpack-sk@palemoon.org' => array( 'locale' => 'sk', 'version' => '26.0', 'hash' => 'c4051a9894e3039c3620880be2a3c142fec3a88d5f5b7b791a8c084b0ddf96ab'),
		'langpack-sl@palemoon.org' => array( 'locale' => 'sl', 'version' => '26.0', 'hash' => '2830bf5f98625e1769201579fb69219c47069cec8810498528b5cc643c1b9012'),
		'langpack-sr@palemoon.org' => array( 'locale' => 'sr', 'version' => '26.0', 'hash' => '12162239b11f8a81a4bf680b477e884a29ce364b1e98fd71f8b67fb7a2d660e6'),
		'langpack-sv-SE@palemoon.org' => array( 'locale' => 'sv-SE', 'version' => '26.0', 'hash' => '560ba83b3e585d57591f53dd07e914f4bf287b2a05a30783ad7f87ac06854d93'),
		'langpack-tr@palemoon.org' => array( 'locale' => 'tr', 'version' => '26.0', 'hash' => '30cccf4a0304af81d235ba35c06edca9d18b9b3d49af81076906c365f12ff655'),
		'langpack-vi@palemoon.org' => array( 'locale' => 'vi', 'version' => '26.0', 'hash' => '99372204714297d4988fa9bed4e919cc8c3bb2921eb5492a6594338dc76f5d3f'),
		'langpack-zh-CN@palemoon.org' => array( 'locale' => 'zh-CN', 'version' => '26.0', 'hash' => 'ea2cb8bc5b2a4af9e6451c08a0f87f3c214dcb8ada20b5d72c44e2f69c313359'),
		'langpack-zh-TW@palemoon.org' => array( 'locale' => 'zh-TW', 'version' => '26.0', 'hash' => '75f9e08f0ddd4969bfeebc6ea96bcd21b62f3b1d56ad23b3d9c87c7c9b1cbb49')
	);
	
?>
