<?php
namespace DB;
$app->get('/',function() use($app)
{

   $notes = NotasQuery::create()->find();

   $newUrl = $app->urlFor('note.new');
   $app->render('index.php',compact('notes','newUrl'));

})->name('note.index');


$app->get('/new',function() use($app)
{
    echo "new note";


})->name('note.new');