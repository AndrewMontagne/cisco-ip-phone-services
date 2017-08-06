<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 06/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Controller;

abstract class Base
{
    public static function route($pattern, $function) {
        \Flight::route($pattern, [get_called_class(), $function]);
    }
    public abstract static function hookIn();
}