<?php namespace DB;
use Cocur\Slugify\Slugify;


$app->get('/', function() use($app)
{

   $notes = NoteQuery::create()->find();
   $newUrl = $app->urlFor('note.new');
   $app->render('index.php',compact('notes','newUrl'));

})->name('note.index');


$app->map('/new',function() use($app)
{
    if($app->request->isGet()){
        return $app->render('new.php');

    }

    $slugify = new Slugify();

    $input = $app->request->post();
    $slug = $slugify->slugify($input['title']);


    $note = new Note();
    $note->setTitle($input['title']);
    $note->setSlug($slug);
    $note->setPost($input['post']);
    $note->setCreated(date('Y-m-d H:i:s'));

    $note->save();

    $app->redirect(
        $app->urlFor('note.view',['slug'=> $slug])
    );


})->via(['GET','POST'])->name('note.new');

$app->get('/note/:slug', function($slug) use($app){
    $note = NoteQuery::create()->filterBySlug($slug)->findOne();
    $url = $app->urlFor('note.index');
    $app->render('note.php',compact('note','url'));

})->name('note.view');

$app->map('/edit/:id', function($id) use($app){

    if($app->request->isGet()){
        $note = NoteQuery::create()->filterById($id)->findOne();
        return $app->render('edit.php',compact('note'));
    }

    $slugify = new Slugify();
    $input   = $app->request->put();
    $slug    = $slugify->slugify($input['title']);

    $note = NoteQuery::create()
            ->filterById($id)
            ->update([
                //las colummnas han de empezar por mayusculas cuando hagamos update
                'Title' => $input['title'],
                'Slug'  => $slug,
                'Post'  => $input['post']

            ]);

    return $app->redirect(
        $app->urlFor('note.view', [ 'slug' => $slug ])
    );

})->via(['GET','PUT']);