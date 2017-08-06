<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 01/08/2017
 * Copyright 2017 Andrew O'Rourke
 */
require_once "vendor/autoload.php";

global $config;

/*$config = json_decode(file_get_contents('config.json'));

ORM::configure($config->orm->string);
ORM::configure('username', $config->orm->username);
ORM::configure('password', $config->orm->password);
Model::$short_table_names = true;*/

\Cisco\Controller\Idle::hookIn();

Flight::set('flight.views.path', 'views');

Flight::map('notFound', function(){
    http_response_code(404);
});

Flight::set('flight.log_errors', true);

Flight::start();