<?php

/**
 * Project: cisco-ip-phone-services
 * Created: 06/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Utils;

class CipImage
{
    private $cipData = "";
    private $width = 0;
    private $height = 0;

    /**
     * CipImage constructor.
     * @param resource $imageResource The GD image resource to render
     * @param bool $dither Dither the image?
     */
    public function __construct($imageResource, $dither = false)
    {
        imagefilter($imageResource, IMG_FILTER_GRAYSCALE);
        if ($dither) {
            imagetruecolortopalette($imageResource, true, 4);
        }
        imagepalettetotruecolor($imageResource);

        $width = imagesx($imageResource);
        $height = imagesy($imageResource);

        $imageData = '';
        $currentBlock = '';

        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $rgb = imagecolorat($imageResource, $x, $y);
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

        $this->cipData = $imageData;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Returns the CIP data
     * @return string
     */
    public function getCipData()
    {
        return $this->cipData;
    }

    /**
     * Returns the image width
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Returns the image height
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}