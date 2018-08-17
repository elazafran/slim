<?php

// es necesario variable de sessión para el uso de flash  messages
session_start();

require 'vendor/autoload.php';
$config = require 'app/config/config.php';

// cookies encriptadas
$app = new \Slim\Slim($config);

require 'app/routes/notepad.php';



$app->run();