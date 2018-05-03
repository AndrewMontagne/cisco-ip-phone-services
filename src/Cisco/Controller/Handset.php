<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 06/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

use Cisco\Utils\CipImage;
use Cisco\Utils\HandsetCapabilities;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Handset extends Base
{
    public static function hookIn() {
        static::route('GET /handset/idle', 'idle');
        static::route('GET /handset/info', 'info');
        static::route('POST /handset/auth', 'auth');
        static::route('GET /handset/messages', 'messages');
        static::route('GET /handset/services', 'directory');
    }

    public static function idle() {
        //$cipImage = new CipImage(imagecreatefrompng('./static/fogs.png'));
        //header('Refresh: 900');
        //header('Content-Type: text/xml');
        //\Flight::render('idle', ['cipImage' => $cipImage]);
    }

    public static function info() {
        $capabilities = new HandsetCapabilities();
        echo $capabilities->getModelName() . PHP_EOL;
        echo $capabilities->getDisplayWidth() . 'x' . $capabilities->getDisplayHeight() . ' ' . $capabilities->getDisplaySpace() . ' Display';
    }

    public static function auth() {
        echo "AUTHORIZED";
    }

    public static function messages() {
        $items = [];

        $items[] = (object)['label' => '07:57 Jane Doe', 'value'=>'http://10.13.37.2/handset/messages'];
        $items[] = (object)['label' => '09:28 John Appleseed', 'value'=>'http://10.13.37.2/handset/messages'];

        header('Content-Type: text/xml');
        \Flight::render('iconmenu', ['menuItems' => $items]);
    }

    public static function directory() {
        $items = [];

        $items[] = (object)['label' => 'Departments', 'value'=>'http://10.13.37.2/handset/messages'];
        $items[] = (object)['label' => 'Staff', 'value'=>'http://10.13.37.2/handset/messages'];

        header('Content-Type: text/xml');
        \Flight::render('menu', ['menuItems' => $items]);
    }
}