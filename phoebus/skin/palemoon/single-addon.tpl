<img src="{$PAGE_DATA.metadata.icon}" style="height: 48px; width: 48px; margin-top: 22px;" class="alignright">
<h1>
    {$PAGE_DATA.metadata.name}
</h1>

<p style="margin-top: -18px">
    By: {$PAGE_DATA.metadata.author}
</p>

<h3>
    About this {$PAGE_DATA.addon.type}
</h3>

<p>
    {$PAGE_DATA.metadata.longDescription}
</p>

{if $PAGE_DATA.metadata.hasPreview == true}
    <img src="{$PAGE_DATA.metadata.preview}" class="aligncenter"/>
{/if}

<p style="text-align: center; padding: 10px;">
    <a class="dllink_green" href="/?component=download&id={$PAGE_DATA.addon.id}&version=latest">
        <img border="0" src="{$BASE_PATH}download.png" alt="" style="width: 24px; height: 24px; position: relative; top: 7px; right: 4px;" />
        Install {$PAGE_DATA.metadata.name} {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['version']}
    </a>
</p>

</div> <!-- END DIV ID PM-Content-Body -->
<div id="PM-Content-Sidebar"> <!-- START PM-Content-Sidebar -->
    <div style="margin-top: 22px;">
        <h3>
            Compatibility
        </h3>

        <p>
           Pale Moon {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['minAppVersion']} to {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['maxAppVersion']}
        </p>
{if $PAGE_DATA.xpi|@count > 1}
        <h3>
            Previous Releases
        </h3>
        
{foreach $PAGE_DATA.xpi as $key}
{if $key != $PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]}
            <p><a href="/?component=download&id={$PAGE_DATA.addon.id}&version={$key.version}">Version {$key.version}</a><br />
            <small>Works with Pale Moon {$key.minAppVersion} to {$key.maxAppVersion}</small></p>
{/if}
{/foreach}
{/if}
    </div>
    <div class="clearfix"></div>
