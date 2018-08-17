<?php

// es necesario variable de sessión para el uso de flash  messages
session_start();

require 'vendor/autoload.php';

// cookies encriptadas
$app = new \Slim\Slim([
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'encriptacion de la cookie'
]);

$app->map('/',function () use ($app){

   if($app->request->isGet()){

       $app->render('form.php');

   }elseif ($app->request->isPost()){

       $name = $app->request->post('name');
       $comment = $app->request->post('comment');
       echo "$name : <em>$comment</em>";

   } else {

       echo $app->request->put('name');

   }


})->via(['GET','POST','PUT']);

$app->get('/flash',function () use($app){

    // $app->flash('info','hello from flash messages!');

    //Es igual que el anterior contenido pero sin tener que ser almacenado previamente
    $app->flashNow('warning','this is a warning messages!');

    // Si queremos retener el mensaje en variables del sistema
    $app->flashKeep();

    var_dump($app->flashData());

    $app->render('form.php');

});

$app->run();