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

$app->map('/',function () use ($app){

   if($app->request->isGet()){
       $app -> render('form.php');
   }elseif ($app->request->isPost()){
       $name = $app->request->post('name');
       $comment = $app->request->post('comment');
       echo "$name : <em>$comment</em>";
   } else {
       echo $app->request->put('name');
   }



    // http://localhost/slim/inicio
})->via(['GET','POST','PUT']);

$app->run();