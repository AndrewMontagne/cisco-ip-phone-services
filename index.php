<?php
$img = imagecreatefrompng('./static/fogs.png');

imagefilter($img, IMG_FILTER_GRAYSCALE);
imagepalettetotruecolor($img);

$width = imagesx($img);
$height = imagesy($img);

$imageData = '';
$currentBlock = '';

for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        $rgb = imagecolorat($img, $x, $y);
        $b = $rgb & 0xFF;
        $blue = $rgb & 0xFF;

        if ($blue <= 64)
            $color = '11';
        else if ($blue <= 128)
            $color = '10';
        else if ($blue <= 192)
            $color = '01';
        else
            $color = '00';

        $currentBlock = $color . $currentBlock;
        if(strlen($currentBlock) >= 8) {
            $value = bindec($currentBlock);
            $hex = dechex($value);
            $hex = str_pad($hex, 2, '0', STR_PAD_LEFT);
            $hex .= '';
            $imageData .= $hex;
            $currentBlock = '';
        }
    }
}

if (strlen($currentBlock) > 0) {
    $imageData .= dechex(bindec(strrev($currentBlock)));
}

header('Content-Type: text/xml')
?><CiscoIPPhoneImage>
    <Title>Image Object</Title>
    <LocationX>-1</LocationX>
    <LocationY>-1</LocationY>
    <Width><?=$width;?></Width>
    <Height><?=$height;?></Height>
    <Depth>2</Depth>
    <Data><?=$imageData;?></Data>
</CiscoIPPhoneImage>