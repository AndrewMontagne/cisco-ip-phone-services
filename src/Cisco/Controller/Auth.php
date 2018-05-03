<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 07/09/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

use Cisco\Utils\CipImage;
use Cisco\Utils\HandsetCapabilities;

class Auth extends Base
{
    public static function hookIn()
    {
        static::route('/auth/login', 'handleLogin');
        static::route('/auth/loginPoll', 'handleLoginPoll');
        static::route('/auth/logout', 'handleLogout');
    }

    public static function handleLogin()
    {
        \Flight::redirect('http://10.13.37.2/auth/loginPoll');
    }

    public static function handleLoginPoll()
    {
        $img = imagecreatefrompng('./static/google-login.png');

        $white = imagecolorallocate($img, 255, 255, 255);

        $code = "ABCD-EFGH";

        imagestring($img, 4, 11, 34, $code, 1);
        imagestring($img, 4, 12, 34, $code, 1);

        $cipImage = new CipImage($img);

        header('Refresh: 5');
        header('Content-Type: text/xml');

        \Flight::render('login', ['cipImage' => $cipImage]);
    }

    public static function handleLogout()
    {
        //
    }
}