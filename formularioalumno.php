<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <h1>Bienvenido joven Padawan</h1>
    <h2>Introduzca su nombre y veamos a donde nos lleva esta aventura.</h2>
    <form action="" method="post">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="submit" name="enviar" value="Enviar" class="btn btn-primary btn-sm">
    <input type="submit" name="volver" value="Volver" class="btn btn-secondary btn-sm">
    </form>
    <br>
    <?php
    
        if (isset($_POST["enviar"])) {
                header("Location: paginaalumno.php");
            } elseif (isset($_POST["volver"])) {
                header("Location: index.php");
        }
        
    ?>
</body>
</html>