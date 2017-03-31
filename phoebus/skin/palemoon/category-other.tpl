<h1>{$PAGE_TITLE}</h1>

{if $PAGE_TYPE == 'cat-search-plugins'}
<p>
    A search plugin provides the ability to access a search engine from a web browser, without having to go to the engine's website first. Technically, a search plugin is a small xml file that tells the browser what information to send to a search engine and how the results are to be retrieved.
</p>
{elseif $PAGE_TYPE == 'cat-language-packs'}
<p>
    We are currently working as a community to bring you more languages for Pale Moon 27.<br />
    To be informed of progress (or to help out!), please go to the following <a href="https://forum.palemoon.org/viewtopic.php?f=30&t=13720">forum topic dedicated to localization</a>.<br />
    <br />
    If you prefer to have the Pale Moon user interface in your native language (not US-English), then these language packs can help you! They are originally based on the Mozilla Firefox language packs, with additional translations and improvements done by our community translators for Pale Moon. Pale Moon will not be released with installers in individual languages, but installing these language packs on top of the US-English browser will pretty much have the same effect.<br />
    <br />
    Please note the installation instructions, just installing the language pack and letting Pale Moon restart is not enough! Also keep in mind that these language packs are a convenience and that the browser is and remains an English language product at its heart, so something like the Safe Mode dialog, about box and default bookmarks folder names will be in English.
</p>

<div style="border: 2px solid rgb(204, 204, 255); padding: 5px 10px; background-color: rgb(240, 240, 255);">
    <h3>Installation instructions</h3>

    <p>
        A few simple steps is all that is needed to install these language packs. You have the choice of 2 different methods, either by installing the Zing extension or by using the instructions to perform a one-time preference change:
    </p>
    
    <p>
        <strong>Extension method:</strong>
    </p>

    <ol>
        <li>Download the language pack .xpi from this page (below). Choose to immediately "install" in the Pale Moon browser (the default when left-clicking), skipping the need to save it first.</li>
        <li>Install <a href="/addon/locale-switcher/">Pale Moon locale switcher from this site.</a></li>
        <li>Click the new globe icon with colored bubbles in your toolbar, and select the language you prefer from the drop-down.</li>
        <li>Let the browser restart when asked.</li>
    </ol>

    <p>
        <strong>Preference method:</strong>
    </p>

    <ol>
        <li>Download the language pack .xpi from this page (below). You may also choose to immediately "install" in the Pale Moon browser (the default when left-clicking), skipping the need to save it first (go to step 3). You do not have to restart Pale Moon yet.</li>
        <li>If you downloaded the .xpi first, double-click the .xpi in explorer/other file manager. Confirm that you want to install the .xpi in your browser. This will add the language pack to Pale Moon. You do not have to restart Pale Moon yet.</li>
        <li>To actually switch to the new language, you also have to make a configuration change. Go to the advanced configuration editor (type <a href="about:config">about:config</a> in the address bar and press enter).</li>
        <li>Find the setting general.useragent.locale which is set to "en-US" by default. Double-click it to change.</li>
        <li>Enter the language code for your locale, including region if applicable. E.g.: "fr" if you live in France, "ja" if you live in Japan, "es-MX" if you want Mexican Spanish. Use the same code as the file name of the language pack you downloaded.</li>
        <li>Close Pale Moon completely and restart it.</li>
    </ol>
</div>
<p>
    And that's it! You can now use Pale Moon in your native language.<br />
    <br />
    Note that these language packs only change the interface language. They don't change the language used for the spellchecker.<br />
    To download a spell checker dictionary of your choice, go to: <a href="https://addons.mozilla.org/en-US/firefox/language-tools/" target="_blank">https://addons.mozilla.org/en-US/firefox/language-tools/</a><br />
    Or right-click any normal text input field, and in the pop-up menu select Languages -&gt; Add Dictionaries...
</p>

<p>
    <strong>Important:</strong><br />
    These language packs are for the latest version of the browser (v27). They will not work on older versions. If you are using an older version of the browser, <strong>please update to the current version</strong> first. If you for whatever reason decide you need to use an older version of the browser, please go to the <a href="//www.palemoon.org/archived.shtml" target="_blank">archived versions</a> page and download the appropriate language pack for your browser version.<br />
    <br />
    As of version 27, we've had to re-do the language packs and will be adding more languages over time as they become available and supported by our community. We can only offer those languages that currently have active translators for them.
</p>
{/if}

{if $PAGE_TYPE == 'cat-search-plugins'}
<div style="-moz-column-count: 3; width: 100%;">
{foreach $PAGE_DATA as $key}
    <a onclick="window.external.AddSearchProvider('{$SITE_DOMAIN}/?component=download&id={$key.addon.id}');"
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
{elseif $PAGE_TYPE == 'cat-language-packs'}
<div style="-moz-column-count: 3; width: 100%;">
{foreach $PAGE_DATA as $key}
    <a href="{$key.url}" class="fake-table-row-search-plugin" style="height: 36px;">
        <img src="/datastore/langpacks/icons/{$key.locale}.png"
            class="alignleft"
            width="32px"
            height="32px">
        <p style="margin-top: 7px;">
            <strong>{$key.name}</strong>
            <small>[{$key.locale}]</small>
        </p>
    </a>
{/foreach}
</div>
{/if}

{if $PAGE_TYPE == 'cat-search-plugins'}
<p>
    The following search plugins are already included by default in Pale Moon and thus cannot be listed here as they would conflict: <strong>DuckDuckGo, Yahoo, Bing, Ecosia, Twitter, and Wikipedia</strong>.
    <br />
    <br />
    If you removed a default search plugin and want to get it back you can go into "Manage Search Engines" and Restore defaults. This will repopulate the list with all the default search engines but will NOT remove any that you have added.
</p>
{elseif $PAGE_TYPE == 'cat-language-packs'}
<p>
    <strong>Important note:</strong> These language packs are provided AS-IS. We, the authors of the actual Pale Moon browser, are not the authors of these language packs, and cannot provide support for the actual contents of them. This is a community effort! If you have any feedback on them, please either get involved on our <a href="https://crowdin.com/project/pale-moon" target="_blank">CrowdIn project</a> directly or go to the <a href="https://forum.palemoon.org/viewtopic.php?f=30&t=13720" target="_blank">forum</a>.<br />
    <br />
    Can't find your language?<br />
    We're sorry but these are the only languages that actually have a complete translation and have support from (near-)native speakers. We cannot support any other languages without a dedicated community translator for a language. Other languages are in the works but not complete yet.
</p>
{/if}