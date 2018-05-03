<CiscoIPPhoneMenu>
    <?php if(isset($title)):?><Title><?=$title;?></Title><?php endif; ?>
    <?php if(isset($prompt)):?><Prompt><?=$prompt;?></Prompt><?php endif; ?>
    <?php foreach($menuItems as $menuItem): ?>
    <MenuItem>
        <Name><?=$menuItem->label?></Name>
        <URL><?=$menuItem->value?></URL>
    </MenuItem>
    <?php endforeach; ?>
</CiscoIPPhoneMenu>