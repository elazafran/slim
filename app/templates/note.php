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
    <h1><?= $note->getTitle()?></h1>
    <p><?= nl2br($note->getPost());?></p>
</section>
<footer>
    <a href="<?= $url ?>">Volver</a>
</footer>
</body>
</html>
