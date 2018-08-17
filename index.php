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
/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */
/*$app->get('/', function ($request, $response, $args) {
    $response->write("Welcome to Slim!");
    return $response;
});*/


/******************** Ruteador ******************/


$app->map('/p/:id(/:slug)', function ($id, $slug="por defecto") use ($app) {
    if ($app->request->isGet()){
        echo " Get ";
        echo " $id $slug ";
        // http://localhost/slim/p/123/asd
        // http://localhost/slim/p/123/
    }else {
        echo " post ";
    }

    // http://localhost/slim/p/123/el%20se%C3%B1or%20de%20los%20a%C3%B1illos

})->via(['GET','POST'])->conditions(['id' => '\d+'])->name('blog.index');

// curl -X POST http://localhost/slimp/123/el%20se%C3%B1or%20de%20los%20a%C3%B1illos

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 *
 * php -S localhost:8888 -t slim slim/index.php
 *
 */

$app->run();
