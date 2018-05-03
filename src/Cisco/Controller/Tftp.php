<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 06/09/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

use Cisco\Utils\CipImage;
use Cisco\Utils\HandsetCapabilities;

class Tftp extends Base
{
    public static function hookIn() {
        static::route('GET /tftp', 'handleTftp');
    }

    public static function handleTftp() {
        $filename = filter_input(INPUT_SERVER, 'HTTP_X_TFTP_FILE');

        $matches = [];

        if (file_exists('resource/tftp/' . $filename)) {
            readfile('resource/tftp/' . $filename);
            error_log('TFTP: READING ' . $filename);
        }
        elseif (preg_match('/^SEP([A-F0-9]{12})\.cnf\.xml$/', $filename, $matches) === 1)
        {
            global $config;
            \Flight::render('sep', [
                'macAddress' => $matches[1],
                'serviceHost' => $config->serviceHost,
                'pbxHost' => $config->pbxHost]);
            error_log('TFTP: GENERATING CONFIG FOR ' . $matches[1]);
        }
        else
        {
            error_log('TFTP: COULD NOT FIND ' . $filename);
            \Flight::halt(404);
        }
    }
}