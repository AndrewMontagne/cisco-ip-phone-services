<CiscoIPPhoneDirectory>
    <?php if(isset($title)):?><Title><?=$title;?></Title><?php endif; ?>
    <?php if(isset($prompt)):?><Prompt><?=$prompt;?></Prompt><?php endif; ?>
    <?php foreach($menuItems as $menuItem): ?>
    <DirectoryEntry>
        <Name><?=$menuItem->label?></Name>
        <Telephone><?=$menuItem->value?></Telephone>
    </DirectoryEntry>
    <?php endforeach; ?>
</CiscoIPPhoneDirectory>