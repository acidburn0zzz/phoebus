<h1>{$PAGE_TITLE}</h1>

{if $PAGE_TYPE == 'cat-extensions'}
<p>
    Extensions expand the capabilities of the browser.
</p>
{elseif $PAGE_TYPE == 'cat-all-extensions'}
<p>
    This page lists all hosted and indexed external extensions on the Add-ons Site. It is provided as a temporary convenience to users until such time a search function is restored.
</p>
{elseif $PAGE_TYPE == 'cat-themes'}
<p>
    Themes allow you to change the look and feel of the user interface and personalize it to your tastes. A theme can simply change the colors of the UI or it can change every aspect of its appearance.
</p>
{elseif $PAGE_TYPE == 'cat-search-plugins'}
<p>
    A search plugin provides the ability to access a search engine from a web browser, without having to go to the engine's website first. Technically, a search plugin is a small xml file that tells the browser what information to send to a search engine and how the results are to be retrieved.
</p>
{/if}

{if $PAGE_TYPE == 'cat-extensions' || $PAGE_TYPE == 'cat-all-extensions' || $PAGE_TYPE == 'cat-themes'}
<div>
{foreach $PAGE_DATA as $key}
    <a
        class="PM-addon fake-table-row"
{if $key.addon.type == 'external'}
        href="{$key.metadata.url}"
        target="_blank"
{else}
        href="/{$key.addon.type}s/{$key.metadata.slug}"
{/if}
        style="width: 95%; height: 70px; display: inline-block; margin-left: 15px; margin-right: 20px; text-align: left; vertical-align: top; align: left; padding: 4px 8px; text-decoration: none; color: black;">

        <img
{if $key.addon.type == 'external'}
            src="/datastore/extensions/{$key.addon.id}/icon.png"
{else}
            src="/datastore/{$key.addon.type}s/{$key.metadata.slug}/icon.png"
{/if}
            style="padding-top: 8px; padding-bottom: 16px;" class="alignleft"
            width="32px"
            height="32px">

        <div
            class="alignright"
{if $key.addon.type == 'theme'}
            style="background: linear-gradient(to bottom, #f0f0f0 0%,#d4d9f7 100%); background-repeat: no-repeat; background-image: url('/datastore/{$key.addon.type}s/{$key.metadata.slug}/preview.png'); align: center; margin-top: 4px; width: 240px; height: 60px; border:1px solid #aaaaaa; overflow: hidden;">
{else}
            style="background: linear-gradient(to bottom, #f0f0f0 0%,#d4d9f7 100%); background-repeat: no-repeat; align: center; margin-top: 4px; width: 240px; height: 60px; border:1px solid #aaaaaa; overflow: hidden;">
{/if} 
 
{if $key.addon.type != 'theme'}
            <img
{if $key.addon.type == 'external'}
                src="/datastore/extensions/{$key.addon.id}/icon.png"
{else}
                src="/datastore/{$key.addon.type}s/{$key.metadata.slug}/icon.png"
{/if}
                style="display: block; opacity:0.25; margin-top: -16px; transform: rotate(-45deg);"
                class="aligncenter"
                width="96px"
                height="96px">
{/if}
        </div>
        
        <p style="margin-top: 6px;"><strong>{$key.metadata.name}</strong>
{if $key.addon.type == 'external'}
            <small>[External]</small>
{/if}
            <br />
            <small>{$key.metadata.shortDescription}</small>
        </p>
    </a>
{/foreach}
</div>
{/if}

{if $PAGE_TYPE == 'cat-search-plugins'}
<div>
{foreach $PAGE_DATA as $key}
<a onclick="window.external.AddSearchProvider('https://addons.palemoon.org/?component=download&id={$key.addon.id}');"
   href="#{$key.metadata.slug}"
   name="#{$key.metadata.slug}"
   class="fake-table-row-search-plugin">

    <img src="{$key.metadata.icon}"
        class="alignleft"
        width="16px"
        height="16px">
    <p style="margin-top: 0px;">
        <strong>
            {$key.metadata.name}
        </strong>
    </p>
</a>
{/foreach}
</div>
<p>
    The following search plugins are already included by default in Pale Moon and thus cannot be listed here as they would conflict: <strong>DuckDuckGo, Yahoo, Bing, Ecosia, Twitter, and Wikipedia</strong>.
    <br />
    <br />
    If you removed a default search plugin and want to get it back you can go into "Manage Search Engines" and Restore defaults. This will repopulate the list with all the default search engines but will NOT remove any that you have added.
</p>
{/if}