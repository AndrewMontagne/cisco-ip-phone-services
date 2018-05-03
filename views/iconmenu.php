<CiscoIPPhoneIconMenu>
    <?php if(isset($title)):?><Title><?=$title;?></Title><?php endif; ?>
    <?php if(isset($prompt)):?><Prompt><?=$prompt;?></Prompt><?php endif; ?>
    <?php foreach($menuItems as $menuItem): ?>
    <MenuItem>
        <Name><?=$menuItem->label?></Name>
        <IconIndex>1</IconIndex>
        <URL><?=$menuItem->value?></URL>
    </MenuItem>
    <?php endforeach;
    $cipImage = new Cisco\Utils\CipImage(imagecreatefrompng('./resources/icons/unread-mail.png'));
    ?>
    <IconItem>
        <Index>1</Index>
        <Width><?=$cipImage->getWidth();?></Width>
        <Height><?=$cipImage->getHeight();?></Height>
        <Depth>2</Depth>
        <Data><?=$cipImage->getCipData();?></Data>
    </IconItem>
</CiscoIPPhoneIconMenu>