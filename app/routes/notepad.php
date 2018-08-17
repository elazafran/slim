<?php
namespace DB;
$app->get('/',function() use($app)
{

   $notes = NotasQuery::create()->find();

   $newUrl = $app->urlFor('note.new');
   $app->render('index.php',compact('notes','newUrl'));

})->name('note.index');


$app->map('/new',function() use($app)
{
    if($app->request->isGet()){
        return $app->render('new.php');

    }
    $input = $app->request->post();
    $slug = $input['title'];
    //var_dump($input);

    $note = new Notas();
    $note->setTitle($input['title']);
    $note->setSlug();
    $note->setPost($input['post']);
    $note->setCreated(date('Y-m-d H:i:s'));

    $note->save();

    $app->redirect(
        $app->urlFor('note.view',['slug'=> $slug])
    );


})->via(['GET','POST'])->name('note.new');

$app->get('/note/:slug', function($slug) use($app){



})->name('note.view');