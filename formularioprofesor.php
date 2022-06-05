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
    <h1>Bienvenido profesor</h1>
    <h2>Introduzca su nombre, contraseña, y veamos a donde nos lleva.</h2>
    <div class="mb-3">
    <form action="" method="post">
    <input type="text" name="nombre" placeholder="nombre">
    <input type="password" name="contraseña" placeholder="contraseña">
    <br>
    <input type="radio" name="aceptar" value="aceptar">Aceptar
    <input type="radio" name="rechazar" value="rechazar">Rechazar
    <br>
    <input type="submit" name="enviar" value="enviar" class="btn btn-primary btn-sm">
    <input type="submit" name="volver" value="volver" class="btn btn-secondary btn-sm">
    <br>
    
    <?php
        if (isset($_POST["enviar"])) {
            if ($_POST["contraseña"]=="contraseña" && isset($_POST["aceptar"])) {
                $_SESSION["nombre"]=$_POST["nombre"];
                header("Location: paginaprofesor.php");
            } else {
                ?>
                <br>
                <img src="gandalf.jpg" alt="gandalf">

        
                <?php
            }
        } elseif (isset($_POST["volver"])) {
            header("Location: index.php");
        }
        
    ?>
    </form>
    </div>
</body>
</html>