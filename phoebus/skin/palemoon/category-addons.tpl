<h1>{$PAGE_TITLE}</h1>

{if $PAGE_TYPE == 'cat-extensions' || $PAGE_TYPE == 'cat-all-extensions'}
<p>
    Extensions are small add-ons that add new functionality to Pale Moon, from a simple toolbar button to a completely new feature. They allow you to customize the browser to fit your own needs and preferences, while letting us keep the core itself light and lean.
</p>
{elseif $PAGE_TYPE == 'cat-themes'}
<p>
    Themes allow you to change the look and feel of the user interface and personalize it to your tastes. A theme can simply change the colors of the UI or it can change every aspect of its appearance.
</p>
{/if}

{if $PAGE_TYPE == 'cat-extensions' || $PAGE_TYPE == 'cat-all-extensions' || $PAGE_TYPE == 'cat-themes'}
<div>
{foreach $PAGE_DATA as $key}
    <a
        class="PM-addon fake-table-row"
        href="{$key.metadata.url}"
{if $key.addon.type == 'external'}
        target="_blank"
{if strstr($key.metadata.url, 'addons.mozilla.org')}
        title="This add-on is hosted on Mozilla's Add-ons Site"
{else}
        title="This add-on is hosted independently"
{/if}
{/if}
        style="width: 95%; height: 64px; 
        display: inline-block; margin-left: 15px; margin-right: 20px; text-align: left; vertical-align: top; align: left; padding: 4px 8px; text-decoration: none; color: black;">

        <img
            src="{$key.metadata.icon}"
            style="padding-top: 8px; padding-bottom: 16px;" class="alignleft"
            width="32px"
            height="32px">

{if $PAGE_TYPE == 'cat-themes'}
        <div
            class="alignright"
            style="background: linear-gradient(to bottom, #f0f0f0 0%,#d4d9f7 100%); background-repeat: no-repeat; background-image: url('{$key.metadata.preview}'); align: center; margin-top: 4px; width: 240px; height: 60px; border:1px solid #aaaaaa; overflow: hidden;">
        </div>
{/if}
        
        <p style="margin-top: 6px;"><strong>{$key.metadata.name}</strong>
{if $key.addon.type == 'external'}
{if strstr($key.metadata.url, 'addons.mozilla.org')}
            <small>[AMO]</small>
{else}
            <small>[External]</small>
{/if}
{/if}
            <br />
            <small>{$key.metadata.shortDescription}</small>
        </p>
    </a>
{/foreach}
</div>
{/if}

{if $PAGE_TYPE == 'cat-extensions' || $PAGE_TYPE == 'cat-all-extensions'}
</div> <!-- END DIV ID PM-Content-Body -->
<div id="PM-Content-Sidebar"> <!-- START PM-Content-Sidebar -->
    <div>
        <h1>Categories</h1>
        <a href="/extensions/alerts-and-updates/">Alerts &amp; Updates</a><br />
        <a href="/extensions/appearance/">Appearance</a><br />
        <a href="/extensions/download-management/">Download Management</a><br />
        <a href="/extensions/feeds-news-and-blogging/">Feeds, News, &amp; Blogging</a><br />
        <a href="/extensions/privacy-and-security/">Privacy &amp; Security</a><br />
        <a href="/extensions/search-tools/">Search Tools</a><br />
        <a href="/extensions/social-and-communication/">Social &amp; Communication</a><br />
        <a href="/extensions/tools-and-utilities/">Tools &amp; Utilities</a><br />
        <a href="/extensions/web-development/">Web Development</a><br />
        <a href="/extensions/other/">Other</a><br />
    </div>
    <div class="clearfix"></div>
{/if}
{$key = null}