<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 06/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

use Cisco\Utils\CipImage;
use Cisco\Utils\HandsetCapabilities;

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
        $capabilities = new HandsetCapabilities();
        echo $capabilities->getModelName() . PHP_EOL;
        echo $capabilities->getDisplayWidth() . 'x' . $capabilities->getDisplayHeight() . ' ' . $capabilities->getDisplaySpace() . ' Display';
    }

    public static function auth() {
        echo "AUTHORIZED";
    }
}