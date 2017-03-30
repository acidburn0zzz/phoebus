<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{$SITE_NAME} - {$PAGE_TITLE}</title>
        <link rel="icon" href="/favicon.ico" />
        <style type="text/css">
            {%SITE_STYLESHEET}
        </style>
    </head>
    <body>
        <div id="PM-Wrapper">
            <div id="PM-Header" class="PM-Wrapper-Width">
                <img src="{$BASE_PATH}logo.png" class="alignleft" />
                <img src="{$BASE_PATH}wordmark-palemoon.png" class="alignright" />
            </div>
            <div id="PM-Menubar" class="mainmenu">
            <span class="alignleft">
                <ul>
                    <li class="li_hc">
                        <a href="#" target="_self">Main</a>
                        <ul class="ul_ch">
                            <li class="li_nc"><a href="http://www.palemoon.org/" target="_self">Pale Moon homepage</a></li>
                            <li class="li_nc"><a href="http://start.palemoon.org/" target="_self">Pale Moon Start page</a></li>
                            <li class="li_nc"><a href="/" target="_self">Pale Moon add-ons site</a></li>
                        </ul>
                    </li>
                    <li class="li_nc"><a href="/extensions/">Extensions</a></li>
                    <li class="li_nc"><a href="/themes/">Themes</a></li>
                    <li class="li_nc"><a href="/language-packs/">Language Packs</a></li>
                    <li class="li_nc"><a href="/search-plugins/">Search Plugins</a></li>
                    <li class="li_nc"><a href="#">More&hellip;</a>
                        <ul class="ul_ch">
                            <li class="li_nc"><a href="/incompatible/">Incompatible Extensions</a></li>
                            <li class="li_nc"><a href="http://developer.palemoon.org/" target="_blank">Add-on Development</a></li>
                            <li class="li_nc"><a href="https://addons.mozilla.org/firefox/" target="_blank">Mozilla's Add-ons Site</a></li>
                        </ul>
                    </li>
                </ul>
            </span>
            <span class="alignright" style="margin-top: 2px; margin-right: 15px;">
            </span>
            </div>
            <div id="PM-Content">
                <div id="PM-Content-Body">
                    {%PAGE_CONTENT}
                </div>
            </div>
            <div style="text-align: center; margin-top: 8px;">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Addons site leaderboard -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:728px;height:90px"
                     data-ad-client="ca-pub-4490583218014683"
                     data-ad-slot="4318962855"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div style="margin-top: 10px; text-align: center; line-height: 13px; font-size: 10px;">
                <p><span style="color: rgb(102, 102, 102);">
                    Site design and Branding &copy; {'Y'|date} <a href="http://www.moonchildproductions.info/" target="_blank">Moonchild Productions</a> - All rights reserved
                </span><br />
                <span style="color: rgb(102, 102, 102);">
                    Any other content, brand names or logos are copyright or trademark to their respective owners.
                </span><br />
                <span style="color: rgb(102, 102, 102);">
                    Policies: <a href="//www.palemoon.org/cookies.shtml">Cookies</a> - <a href="//www.palemoon.org/usercontent.shtml">User Content</a>
                    - <a href="//www.palemoon.org/privacy.shtml">Privacy</a>.
                </span></p>
                <p><span style="color: rgb(102, 102, 102);">
                    The Pale Moon Add-ons Site is powered by <a href="https://github.com/Pale-Moon-Addons-Team/phoebus/" target="_blank">Project Phoebus</a> {$PHOEBUS_VERSION}.
                </span></p>
            </div>
        </div>
    </body>
</html>
