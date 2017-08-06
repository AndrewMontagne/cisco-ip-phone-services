<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 06/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

use Cisco\Utils\CipImage;

class Idle extends Base
{
    public static function hookIn() {
        static::route('GET /handset/idle', 'idleImage');
    }

    public static function idleImage() {
        $cipImage = new CipImage(imagecreatefrompng('./static/fogs.png'));

        header('Refresh: 60');
        header('Content-Type: text/xml');
        \Flight::render('idle', ['cipImage' => $cipImage]);
    }
}