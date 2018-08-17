<?php
$app->get('/',function() use($app)
{
   echo "hello world ";
   /*$notes = \DB\NotasQuery::create()->find();
   var_dump($notes->count());*/
});