<?php

/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */

require 'vendor/autoload.php';

// cookies encriptadas
$app = new \Slim\Slim([
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'encriptacion de la cookie'
]);

$app->map('/',function () use ($app){

   if($app->request->isGet()){
        // creamos la cookie
       $app->setCookie('user_id','1234','5 minutes');
       // borramos la cookie
       //$app->deleteCookie('user_id');
       // accedemos a la cookie de 2 formas
       // 1ª manera
       echo $app->request->cookies('user_id');
       echo "<br>";
       // 2ª forma
       echo $app->getCookie('user_id');
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