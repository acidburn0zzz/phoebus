<h1>{$PAGE_TITLE}</h1>

<h3>Why aren&rsquo;t all Firefox add-ons compatible with Pale Moon?</h3>

<p>While we have strived for compatibility with Firefox add-ons, Pale Moon and Firefox are separate products. There are many possible reasons why an add-on is or has become incompatible with Pale Moon:</p>

<ul>
    <li><strong>The change in the Pale Moon globally unique identifier (GUID)</strong><br />In Pale Moon 25, the GUID was changed to reflect the continuing divergence between the browser and its sibling. Most of the time a modification to chrome.manifest or bootstrap.js to add/change the hard-coded GUID is a simple solution to issues with add-ons. The Pale Moon add-ons team will do this for some of the most used add-ons where a developer has chosen not to support Pale Moon, thus creating a pseudo-static version of the add-on as a Pale Moon-specific one.</li>
    <li><strong>Australis</strong><br />In Firefox 29, Mozilla adopted a nearly completely rewritten user interface and theme as well as some technologies that Pale Moon has chosen not to implement. Add-ons targeting these features without fall-backs to the more time-tested and more commonly used features in all Mozilla-based programs will not be supported.</li>
    <li><strong>Jetpack/SDK</strong><br />In Pale Moon 27.0, support for the Add-On SDK (AKA Jetpack) was dropped as a framework for extensions, making multiple extensions incompatible with Pale Moon. If this is the case, then the Add-On Manager inside the browser will inform you of it with an explanatory text. In Pale Moon 27.1, <strong>PMKit</strong> was added as a compatibility layer, to allow SDK add-ons that choose to support Pale Moon to work correctly. For those that have not been converted, but have been built with JPM (i.e. compatible with Firefox 38.0a1), the extension <a href="https://addons.palemoon.org/extensions/moon-tester-tool/">Moon Tester Tool</a> can be used to force installation. This type of installation is unsupported however, and may result in instability. Use with caution!</li>
    <li><strong>WebExtensions</strong><br />From Firefox 57 onwards, WebExtensions will be the only supported extension framework in Firefox. This framework is not and will not be supported in Pale Moon, therefore anything using it will not be compatible.</li>
    <li><strong>Complete Themes</strong><br />With changes to the user interface in Pale Moon over time, themes specifically written for Firefox have largely become incompatible. While these will continue to work, issues such as doubled text in the address bar can impede usage. Please see if the theme exists in our <a href="/themes/">themes catalog</a>, either as a fork or original work; if it is not, please try installing the <a href="/extensions/theme-shim/">Theme Compatibility Provider</a> to solve most issues.</li>
</ul>

<h3>I found an add-on that has issues, where can I report it?</h3>

<p>We have set up a <a href="https://forum.palemoon.org/viewforum.php?f=16">section</a> on the Pale Moon forums where you can report it. This will allow us to at the very least identify it and add it to this page. As well as, determine the cause and a course of action so that we can resolve the incompatibility.</p>

<h3>List of add-ons with known compatibility issues</h3>

<p><strong>Last updated: 2017-03-24</strong> (compatible with Pale Moon 27.1+, released 2017-02-09)</p>

<p><strong>PENDING</strong></p>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>AutoPager</li>
                    <li>cliget</li>
                    <li>Emoji Cheatsheet</li>
                    <li>Enjoy Reading</li>
                    <li>Enter Selects</li>
                    <li>Fastest Search - Browse/Shop Faster!</li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Flash Killer</li>
                    <li>fx-statistics</li>
                    <li>GNotifier</li>
                    <li>Hoxx VPN Proxy</li>
                    <li>HttpFox</li>
                    <li>Keybinder</li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>mpv-youtube-dl-binding</li>
                    <li>Private Tab</li>
                    <li>Random Bookmark</li>
                    <li>Scroll To Top</li>
                    <li>Simple YouTube MP3 Button</li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>

<p><strong>WORKAROUNDS</strong></p>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>1Password<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Archive.is Now<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Blacken<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/blacken/versions/?page=1#version-2.1.14.1-signed" target="_blank">2.1.14</a></small></li>
                    <li>Blur<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/donottrackplus/versions/?page=1#version-4.5.1334.1-signed" target="_blank">4.5.1334.1</a></small></li>
                    <li>CacheViewer<br /><small>Use CacheViewer2 version <a href="https://addons.mozilla.org/firefox/addon/cacheviewer2/versions/?page=1#version-1.6.1-signed.1-signed" target="_blank">1.6</a></small></li>
                    <li>Clippings<br /><small>Install version <a href="https://addons.mozilla.org/firefox/addon/clippings/versions/5.0.2" target="_blank">5.0.2</a> using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Color That Site!<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/color-that-site/versions/?page=1#version-0.16.1-signed.1-signed" target="_blank">0.16.1</a></small></li>
                    <li>CoLT<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/colt/versions/2.6.5.1-signed" target="_blank">2.6.5.1</a></small></li>
                    <li>Cookie Monster<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/cookie-monster/versions/?page=1#version-1.2.0.1-signed" target="_blank">1.2.0.1</a></small></li>
                    <li>CookieCuller<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/cookiekeeper/" target="_blank">CookieKeeper</a></small></li>
                    <li>Copy goo.gl URL<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/googl-lite/" target="_blank">goo.gl lite</a></small></li>
                    <li>Customize Titlebar<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/customize_titlebar_v2/" target="_blank">customize_titlebar_v2</a></small></li>
                    <li>Dashlane<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/lastpass-password-manager/" target="_blank">LastPass Password Manager</a></small></li>
                    <li>Disconnect Search<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Download Status Bar<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/s3download-statusbar/" target="_blank">Download Manager (S3)</a></small></li>
                    <li>DownThemAll!<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/downthemall/versions/?page=1#version-2.0.18.1-signed.1-let-fixed" target="_blank">2.0.18</a></small></li>
                    <li>DragIt (formerly Drag de Go)<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/dragit-formerly-drag-de-go/versions/?page=1#version-3.2.1.1-signed" target="_blank">3.2.1.1</a></small></li>
                    <li>DuckDuckGo Plus<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Element Hiding Helper for Adblock Plus<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/elemhidehelper/versions/?page=2#version-1.3.2.1-signed" target="_blank">1.3.2</a> in combination with <a href="/extensions/adblock-latitude/">Adblock Latitude</a></small></li>
                    <li>Element Inspector<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/element-inspector/versions/?page=1#version-0.0.8.1" target="_blank">0.0.8.1</a></small></li>
                    <li>Enhanced Steam<br /><small>Install <a href="https://addons.mozilla.org/firefox/addon/supersteam/" target="_blank">SuperSteam</a> using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>External Application<br />Buttons 2<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/external-application-button/versions/?page=1#version-0.11.1-signed" target="_blank">0.11.1</a></small></li>
                    <li>Feedly Notifier<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>FireGestures<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/firegestures/versions/?page=1#version-1.8.7.1-signed" target="_blank">1.8.7.1</a></small></li>
                    <li>Google Privacy<br /><small>Use Google search link fix<br />version <a href="https://addons.mozilla.org/firefox/addon/google-search-link-fix/versions/?page=1#version-1.4.9.1-signed" target="_blank">1.4.9.1</a> or <a href="https://addons.mozilla.org/firefox/addon/clean-links/" target="_blank">Clean Links</a></small></li>
                    <li>gTranslate<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/s3google-translator/" target="_blank">S3.Google Translator</a></small></li>
                    <li>Hide Caption Titlebar Plus<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/hide-caption-titlebar-plus-sma/versions/?page=2#version-2.8.7rc" target="_blank">2.8.7rc</a></small></li>
                    <li>HTitle<br /><small>Use Hide Caption Titlebar Plus version <a href="https://addons.mozilla.org/firefox/addon/hide-caption-titlebar-plus-sma/versions/?page=1#version-2.8.7rc" target="_blank">2.8.7rc</a></small></li>
                    <li>iMacros for Firefox<br /><small>Install version <a href="https://addons.mozilla.org/firefox/addon/imacros-for-firefox/versions/8.9.7" target="_blank">8.9.7</a> using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>LiveClick<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/liveclick/versions/?page=1#version-1.0.0.1-signed" target="_blank">1.0.0.1</a></small></li>
                    <li>Lucifox<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/lucifox/versions/?page=1#version-0.9.7.1-signed" target="_blank">0.9.7.1</a></small></li>
                    <li>Multiple Tab Handler<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/multiple-tab-handler/versions/?page=1#version-0.7.2014050101.1-signed" target="_blank">0.7.2014050101.1</a></small></li>
                    <li>OmniSidebar<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/omnisidebar/versions/?page=1#version-1.4.7.1-signed" target="_blank">1.4.7.1</a></small></li>
                    <li>Open Bookmarks in New Tab<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/open-bookmarks-in-new-tab/versions/?page=1#version-0.1.2012122901.1-signed" target="_blank">0.1.2012122901.1</a></small></li>
                    <li>Personas Rotator<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/personas-rotator/versions/47.1" target="_blank">47.1</a></small></li>
                    <li>PrefBar<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/prefbar/versions/?page=1#version-6.5.0.1-signed" target="_blank">6.5.0.1</a></small></li>
                    <li>Pure URL<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/clean-links/" target="_blank">Clean Links</a></small></li>
                    <li>QuickJava<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/quickjava/versions/?page=1#version-2.0.4.1-signed" target="_blank">2.0.4.1</a></small></li>
                    <li>Random Agent Spoofer<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/random-agent-spoofer/versions/?page=1#version-0.9.3.1.1-signed" target="_blank">0.9.3.1.1</a></small></li>
                    <li>RedirectCleaner<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/clean-links/" target="_blank">Clean Links</a></small></li>
                    <li>Redirector<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/redirector/versions/?page=1#version-2.9.3" target="_blank">2.9.3</a></small></li>
                    <li>Reddit Enhancement Suite<br /><small>Install version <a href="https://addons.mozilla.org/firefox/addon/reddit-enhancement-suite/versions/4.6.1" target="_blank">4.6.1</a> using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>ReloadEvery<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/reloadevery/versions/?page=1#version-28.0.2.1-signed" target="_blank">28.0.2</a></small></li>
                    <li>Re-Pagination<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/re-pagination/" target="_blank">RE-Pagination</a></small></li>
                    <li>RoboForm Toolbar<br /><small>After installing the RoboForm desktop application, manually install 'roboform.xpi' from 'C:\Program Files (x86)\Siber Systems\AI RoboForm\Firefox' (64-bit Windows)</small></li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Scientific Calculator<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/scientific-calculator/versions/?page=1#version-5.0.2.1-signed" target="_blank">5.0.2.1</a></small></li>
                    <li>Self-Destructing Cookies<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/cookies-exterminator/" target="_blank">Cookies Exterminator</a> or <a href="/extensions/crush-those-cookies/">Crush Those Cookies</a></small></li>
                    <li>Session Manager<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/session-manager/versions/?page=1#version-0.8.1.7" target="_blank">0.8.1.7</a></small></li>
                    <li>Share on Twitter (FKA TweetRight)<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/tweetright/versions/?page=1#version-0.43.1.1-signed" target="_blank">0.43.1.1</a></small></li>
                    <li>ShowIP<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/alertip/" target="_blank">AlertIP</a></small></li>
                    <li>Simple Clocks<br /><small>Use <a href="/extensions/foxclocks/">FoxClocks (Pseudo-Static)</a></small></li>
                    <li>Social Fixer<br /><small>Use <a href="https://socialfixer.com/download.html" target="_blank">GreaseMonkey version</a></small></li>
                    <li>Stay-Open Menu<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/stay-open-menu/versions/?page=1#version-2.2.2rc" target="_blank">2.2.2rc</a></small></li>
                    <li>Sticky Notes<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/sticky-notes/versions/?page=1#version-0.4.6.1-signed" target="_blank">0.4.6.1</a></small></li>
                    <li>StylRRR<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Super Start<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/super-start/versions/?page=1#version-7.2.1-signed" target="_blank">7.2.1</a></small></li>
                    <li>Tab Groups Manager<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/tabgroups-manager-revived/" target="_blank">TabGroups Manager revived</a></small></li>
                    <li>Tab Scope<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/tab-scope/versions/?page=1#version-1.6.1.1-signed" target="_blank">1.6.1.1</a></small></li>
                    <li>Thumbnail Zoom Plus<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/thumbnail-zoom-plus/versions/?page=1#version-3.7" target="_blank">3.7</a></small></li>
                    <li>Twitch Now<br /><small>Install version <a href=https://addons.mozilla.org/firefox/addon/twitch-now/versions/1.1.187 target="_blank">1.1.187</a> using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Toggle Document Colors<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/toggledocumentcolors-198916/" target="_blank">ToggleDocumentColors_</a><br />or <a href="https://addons.mozilla.org/firefox/addon/page-colors-fonts-buttons/" target="_blank">Page Colors & Fonts Buttons</a></small></li>
                    <li>Toggle Document Fonts<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/page-colors-fonts-buttons/" target="_blank">Page Colors & Fonts Buttons</a></small></li>
                    <li>Toggle Javascript<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/js-switch/" target="_blank">JS Switch</a> or <a href="https://addons.mozilla.org/firefox/addon/quickjs/" target="_blank">QuickJS</a></small></li>
                    <li>Update Scanner<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/update-scanner/versions/?page=1#version-3.1.13.1-signed" target="_blank">3.1.13.1</a></small></li>
                    <li>User Agent Overrider<br /><small>Use version <a href="https://addons.mozilla.org/firefox/addon/user-agent-overrider/versions/?page=1#version-0.2.4.1-signed" target="_blank">0.2.4.1</a></small></li>
                    <li>Video DownloadHelper<br /><small>Use <a href="/extensions/complete-yt-saver/">Complete YouTube Saver</a></small></li>
                    <li>Watch with MPV<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                    <li>Yet Another Remove It Permanently<br /><small>Use <a href="https://addons.mozilla.org/firefox/addon/remove-it-permanently/" target="_blank">Remove It Permanently</a></small></li>
                    <li>YouTube Video and Audio Downloader<br /><small>Install using <a href="/extensions/moon-tester-tool/">Moon Tester Tool</a></small></li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>

<p>
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tbody>
            <tr>
                <td style="vertical-align:top; width:33%"><strong>FIXED</strong></td>
                <td style="vertical-align:top; width:33%"><strong>FORKED</strong></td>
                <td style="vertical-align:top; width:33%"><strong>PSEUDO-STATIC&#39;D</strong></td>
            </tr>
        </tbody>
    </table>
</p>

<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Add URL to Window Title</li>
                    <li><a href="/extensions/auto-sort-bookmarks/">Auto-Sort Bookmarks</a></li>
                    <li>Bamboo Feed Reader</li>
                    <li><a href="/extensions/complete-yt-saver/">Complete YouTube Saver</a></li>
                    <li>Context Search X</li>
                    <li>CookieKeeper</li>
                    <li><a href="/extensions/decentraleyes/">Decentraleyes</a></li>
                    <li>DOM Inspector</li>
                    <li>EPUBReader</li>
                    <li>FireFTP</li>
                    <li>Fire IE</li>
                    <li>FlashDisable</li>
                    <li>Forecastfox (fix version)</li>
                    <li><a href="/extensions/foxclocks/">FoxClocks</a></li>
                    <li>FoxyProxy (All SKUs)</li>
                    <li><a href="/extensions/i-dont-care-about-cookies/">I don't care about cookies</a></li>
                    <li>NewsFox</li>
                    <li>Open With</li>
                    <li>Play/Pause</li>
                    <li><a href="/extensions/print-pages-to-pdf/">Print pages to PDF</a></li>
                    <li>QuickPasswords</li>
                    <li>Reload Plus</li>
                    <li>ScreenGrab (fix version)</li>
                    <li>Secret Agent</li>
                    <li>Stylish</li>
                    <li>Tab Groups Helper</li>
                    <li><a href="/extensions/tab-mix-plus">Tab Mix Plus</a></li>
                    <li>Who stole my pictures?</li>
                    <li>YesScript</li>
                    <li>YouTube ALL HTML5</li>
                    <li>Zombie Keys (Multilanguage Keyboard)</li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Add Bookmark Here &sup2;<br /><small>As <a href="/extensions/add-bookmark-here-2-me/">Add Bookmark Here &sup2; (Moon Edition)</a></small></li>
                    <li>Adblock Plus<br /><small>As <a href="/extensions/adblock-latitude/">Adblock Latitude</a></small></li>
                    <li>Change Referer Button<br /><small>As <a href="/extensions/change-referer-button/">Change Referer Button</a></small></li>
                    <li>Console&sup2;<br /><small>As <a href="/extensions/error-console2/">Error Console&sup2;</a></small></li>
                    <li>Dark Background and Light Text<br /><small>As <a href="/extensions/advanced-night-mode/">Advanced Night Mode</a></small></li>
                    <li>Extension Options Menu<br /><small>As <a href="/extensions/extension-preferences-menu/">Extension Preferences Menu</a></small></li>
                    <li>FindBar Tweak<br /><small>As <a href="/extensions/finderbar-tweak/">FinderBar Tweak</a></small></li>
                    <li>Firebug<br /><small>As <a href="/extensions/devtools/">Developer Tools</a></small></li>
                    <li>Greasemonkey<br /><small>As <a href="https://github.com/janekptacijarabaci/greasemonkey/releases" target="_blank">Greasemonkey ("Fork" branch)</a></small></li>
                    <li>HTTPS Everywhere<br /><small>As <a href="/extensions/encrypted-web/">Encrypted Web</a></small></li>
                    <li>Image Toolbar<br /><small>As <a href="/extensions/image-toolbox/">Image Toolbox</a></small></li>
                    <li>Integrated Authentication for Firefox<br /><small>As <a href="/extensions/integrated-authentication/">Integrated Authentication for SeaMonkey and Pale Moon</a></small></li>
                    <li>JSView<br /><small>As <a href="/extensions/jsview-revive/">JSView Revive</a></small></li>
                    <li>Mozilla Archive Format<br /><small>As <a href="/extensions/mozarchiver/">MozArchiver</a></small></li>
                    <li>Pentadactyl<br /><small>As <a href="/extensions/pentadactyl/">Pentadactyl</a></small></li>
                    <li>PDF.js<br /><small>As <a href="/extensions/moon-pdf-viewer/">Moon PDF Viewer</a></small></li>
                    <li>Quick Locale Switcher<br /><small>As <a href="/extensions/rosetta-qls/">Rosetta Quick Locale Switcher</a></small></li>
                    <li>Send Tab to Device<br /><small>As <a href="/extensions/send-tab-to-device/">Send Tab to Device (Moon Edition)</a></small></li>
                    <li>Space Next<br /><small>As <a href="/extensions/space-advance/">Space Advance</a></small></li>
                    <li>Tree Style Tab<br /><small>As <a href="/extensions/treestyletabforpm/">Tree Style Tab for Pale Moon</a></small></li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li><a href="/extensions/add-to-search-bar/">Add to Search Bar</a></li>
                    <li><a href="/extensions/chatzilla/">ChatZilla</a></li>
                    <li><a href="/extensions/date-picker/">Date Picker</a></li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>

<p><strong>WONTFIX</strong></p>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Adblock Edge<br /><small>(Not needed because of<br /><a href="/extensions/adblock-latitude/">Adblock Latitude</a>)</small></li>
                    <li>Add-on Update Checker<br /><small>(We have this functionality built-in)</small></li>
                    <li>Baixou Agora<br /><small>(Was never compatible with Pale Moon)</small></li>
                    <li>Bazzacuda Image Saver Plus</li>
                    <li>Blender</li>
                    <li>Classic Theme Restorer<br /><small>(There is no Australis to change)</small></li>
                    <li>Compact Menu 2<br /><small>(Problematic add-on, use<br /><a href="/extensions/tiny-menu/">Tiny Menu</a> or <a href="https://addons.mozilla.org/firefox/addon/all-menus-button/" target="_blank">All Menus Button</a> instead)</small></li>
                    <li>Download Manager Tweak</li><small>(Uses old downloads API)</small>
                    <li>Download Status</li><small>(Uses old downloads API)</small>
                    <li>DVD Video Soft YouTube Downloader</li>
                    <li>EmojiT<br /><small>(Was never compatible with Pale Moon)</small></li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Fasterfox Lite<br /><small>(This is considered harmful to Pale Moon)</small></li>
                    <li>Find In Numbers<br /><small>(We have this functionality built-in)</small></li>
                    <li>Flash Video Downloader</li>
                    <li>Lightbeam for Firefox<br /><small>(Mozilla Service Experiments are not supported in Pale Moon)</small></li>
                    <li>Mouse Gestures Redox<br /><small>(Doesn&#39;t exist anymore)</small></li>
                    <li>Nightly Tester Tools<br /><small>(We are not Firefox and we do not offer &quot;Nightlies&quot;)</small></li>
                    <li>Nimbus Screen Capture</li>
                    <li>Privacy Badger<br /><small>(Problematic add-on, use <a href="https://addons.mozilla.org/firefox/addon/ublock-origin/" target="_blank">uBlock Origin</a> instead)</small></li>
                    <li>Quick Translator<br /><small>(Problematic add-on, use <a href="https://addons.mozilla.org/firefox/addon/s3google-translator/" target="_blank">S3.Google Translator</a> instead)</small></li>
                </ul>
            </td>

            <td style="vertical-align:top; width:33%">
                <ul>
                    <li>Search by Image for Google</li>
                    <li>Shorten URL (Bit.ly)<br /><small>(Doesn&#39;t exist anymore)</small></li>
                    <li>Simple Timer<br /><small>(Doesn&#39;t exist anymore)</small></li>
                    <li>SoundCloud Player<br /><small>(Uses Australis-specific code)</small></li>
                    <li>Strict Pop-up Blocker<br /><small>(Australis-only add-on, never supported Pale Moon)</small></li>
                    <li>Text2Link<br /><small>(Duplicates built-in functionality: highlight any link -&gt; right-click -&gt; open link)</small></li>
                    <li>UnPlug</li>
                    <li>YouTube Unblocker</li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>
