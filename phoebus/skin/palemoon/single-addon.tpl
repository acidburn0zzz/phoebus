<h1>
    <img src="{$PAGE_DATA.addon.basePath}icon.png" style="height: 32px; width: 32px;" class="alignright">
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
<img src="{$PAGE_DATA.addon.basePath}preview.png" class="aligncenter"/>
{/if}

<h3>
    Compatibility
</h3>

<p>
    {$PAGE_DATA['metadata']['name']} version {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['version']} works on Pale Moon {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['minAppVersion']} to {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['maxAppVersion']}
</p>

<p style="text-align: center; padding: 10px;">
    <a class="dllink_green" href="/?component=download&id={$PAGE_DATA.addon.id}">
        <img border="0" src="{$BASE_PATH}download.png" alt="" style="width: 24px; height: 24px; position: relative; top: 7px; right: 4px;" />
        Install {$PAGE_DATA.metadata.name} {$PAGE_DATA['xpi'][$PAGE_DATA['addon']['release']]['version']}
    </a>
</p>