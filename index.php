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

$app->get('/user/javier_aliaga',function () use($app){
    // $url = $app->urlFor('user.name',['name'=>'dani']);
    // echo $url;
    // $app->redirect($url);

    echo "hola";
    // el método pass permite pasar a la siguiente ruta que cumpla el patron
    //$app->pass();
    // es como poner un exit en un bucle
    $app->stop();
    echo "prueba";

    // http://localhost/slim/user/javier_aliaga

});
$app->get('/user/:name',function ($name) use($app){
    echo $name;
})->name('user.name');

$app->run();