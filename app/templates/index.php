<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Mis Notas</title>
</head>
<body>
    <section class="container-fluid">
        <nav>
            <a href="<?= $newUrl ?>">Nueva nota</a>
        </nav>
        <h1>Mis Notas</h1>
        <?php foreach ($notes as $note): ?>
            <article>
                <h2><?= $note->getTitle()?></h2>
                <p>
                    <?= $note->getPost()?>
                </p>
                <a href="/slim/edit/<?= $note->getId()?>">Editar Nota</a>
    <!--            aunque se use el metodo delete es necesario poner method post-->
                <form action="delete/<?= $note->getId()?>" method="post">
                    <input type="hidden" name="_METHOD" value="DELETE" />
                    <input type="submit" value="eliminar" />
                </form>

            </article>
        <?php endforeach; ?>
    </section>
</body>
</html>
