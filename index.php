<?php

/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */
require 'vendor/autoload.php';
//registramos el autoloader

$app = new \Slim\Slim();

$app->get('/',function () use ($app){

    // opcion 1 para pasar parametros
   // $app -> render('index.php',['name'=>'javier aliaga']);

    // opcion 2 para pasar parametros
    $name = "javier";
    $surname = "aliaga";
    $app -> render('index.php',compact('name','surname'), 404);

    // http://localhost/slim/inicio
});

$app->run();