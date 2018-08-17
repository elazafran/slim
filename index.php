<?php

/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */
require 'vendor/autoload.php';
//registramos el autoloader

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/******************** Ruteador 4 condiciones ******************/
function mw1()
{
    echo "hola ";
}

function mw2()
{
    $app =\Slim\Slim::getInstance();//nos devuelve la instacia de ap que ya está creada
    $app->redirect('/slim/inicio');
}

$app->get('/inicio',function (){
    echo "<h1>inicio</h1>";
    // http://localhost/slim/inicio
});

$app->get('/hola/:firstName(/:lastName)','mw1','mw2', function($firstName,$lastName="mohamed") use ($app){

    if($app->request->isGet()){
        echo "Hola $firstName $lastName ";
    }
    // http://localhost/slim/hola/javier/aliaga

})->via(['GET','POST'])->conditions(array('lastName' => '[a-zA-Z]{3,}'))->name('blog.index');





$app->run();