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
    $host="localhost";
    $user="root";
    $passwd="";
    $link=mysqli_connect($host, $user, $passwd);
    $bd="cine";
    session_start();
    echo "Bienvenid@ " . $_SESSION['nombre'];
    ?>
    <br>
    <form action="" method="post">
    <div class="d-grid gap-2 col-6 mx-auto">
    <input type="submit" value="Buscar director" name="director" class="btn btn-primary btn-sm">
    <input type="submit" value="Buscar intérprete" name="interprete" class="btn btn-primary btn-sm">
    <input type="submit" value="Buscar película" name="pelicula" class="btn btn-primary btn-sm">
    <input type="submit" value="Volver" name="volver" class="btn btn-secondary btn-sm">
    <br>
    </div>
    <?php
        if (isset($_POST["director"])) {
            ?>
            <p>Código del director:</p>
            <select name="coddir">
            <?php
            $select="SELECT id_director, nombre FROM director"; 
            mysqli_select_db($link, $bd);
            $resul=mysqli_query($link, $select);
            while($tupla= mysqli_fetch_array($resul)){
            echo "<option  value='".$tupla['id_director']."'>".$tupla['id_director']."-".$tupla['nombre']. "</option>";
            }
            ?>
            </select>
            <input type="submit" name="busqdir" value="Buscar" class="btn btn-primary btn-sm">
            <?php
        }elseif (isset($_POST["busqdir"])) {
            $codigo=$_POST["coddir"];
            mysqli_select_db($link, $bd);
            $select="SELECT * FROM director WHERE id_director =$codigo";
            $resul=mysqli_query($link, $select);
            while($tupla=mysqli_fetch_array($resul)){
            echo "**********Nombre del director: ".$tupla['1']. "************<br>";                    
            echo "Código: ". $tupla['0']. "<br>";
            echo "***** <br>";
            echo "Nacionalidad: ".$tupla['2']. "<br>";
            }
        }

        if (isset($_POST["interprete"])) {
            ?>
            <p>Código del intérprete:</p>
            <select name="codint">
            <?php
            $select="SELECT id_interprete, nombre FROM interprete"; 
            mysqli_select_db($link, $bd);
            $resul=mysqli_query($link, $select);
            while($tupla= mysqli_fetch_array($resul)){
            echo "<option  value='".$tupla['id_interprete']."'>".$tupla['id_interprete']."-".$tupla['nombre']. "</option>";
            }
            ?>
            </select>
            <input type="submit" name="busqint" value="Buscar" class="btn btn-primary btn-sm">
            <?php
        } elseif (isset($_POST["busqint"])) {
            $codigo=$_POST["codint"];
            mysqli_select_db($link, $bd);
            $select="SELECT * FROM interprete WHERE id_interprete =$codigo";
            $resul=mysqli_query($link, $select);
            while($tupla=mysqli_fetch_array($resul)){
            echo "**********Nombre del intérprete: ".$tupla['1']. "************<br>";                    
            echo "Código: ". $tupla['0']. "<br>";
            echo "***** <br>";
            echo "Nacionalidad: ".$tupla['2']. "<br>";
            }
        }

        if (isset($_POST["pelicula"])) {
            ?>
            <input type="text" name="nombre" placeholder="Título de la película">
            <input type="submit" name="busqueda" value="Buscar" class="btn btn-primary btn-sm">
            <?php
        } elseif (isset($_POST["busqueda"])) {
            $titulo=$_POST["nombre"];
            mysqli_select_db($link, $bd);
            $select="SELECT * FROM pelicula WHERE titulo like '%$titulo%'";
            $resul=mysqli_query($link, $select);
            if(!mysqli_num_rows($resul)){
            echo "Película no encontrada, asegúrese de introducir una ya registrada";
                } else {
            while($tupla=mysqli_fetch_array($resul)){
            echo "**********Título: ".$tupla['1']. "************<br>";                    
            echo "Código: ". $tupla['0']. "<br>";
            echo "***** <br>";
            echo "Género: ".$tupla['2']. "<br>";
            echo "***** <br>";
            echo "Director: ".$tupla['3']. "<br>";
            echo "***** <br>";
            echo "Protagonista: ". $tupla['4']. "<br>";
            echo "***** <br>";
            echo "Duración: ".$tupla['5']. "<br>";
            echo "***** <br>";
            echo "Estreno: ". $tupla['6']. "<br>";
            echo "***** <br>";
            echo "Sinopsis: ".$tupla['7']. "<br>";
        }
            }
        }

        if (isset($_POST["volver"])) {
            header("Location: index.php");
        }
    ?>
</body>
</html>