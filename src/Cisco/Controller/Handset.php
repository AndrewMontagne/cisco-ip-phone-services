<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 06/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

use Cisco\Utils\CipImage;

class Handset extends Base
{
    public static function hookIn() {
        static::route('GET /handset/idle', 'idleImage');
        static::route('GET /handset/info', 'info');
        static::route('POST /handset/auth', 'auth');
    }

    public static function idleImage() {

        $cipImage = new CipImage(imagecreatefrompng('./static/fogs.png'));

        header('Refresh: 900');
        header('Content-Type: text/xml');
        \Flight::render('idle', ['cipImage' => $cipImage]);
    }

    public static function info() {
        foreach ($_SERVER as $key => $value) {
            echo $key . ' = ' . $value . PHP_EOL;
        }
    }

    public static function auth() {
        echo "AUTHORIZED";
    }
}