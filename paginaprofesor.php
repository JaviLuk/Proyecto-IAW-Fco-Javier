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
    <input type="submit" value="Director" name="director" class="btn btn-primary btn-sm">
    <input type="submit" value="Intérprete" name="interprete" class="btn btn-primary btn-sm">
    <input type="submit" value="Película" name="pelicula" class="btn btn-primary btn-sm">
    <input type="submit" value="Volver" name="volver" class="btn btn-secondary btn-sm">
    </div>
    <br>
    <?php
        if (isset($_POST["director"])) {
            ?>
            <br>
                <input type="submit" value="Instertar director" name="insertardir" class="btn btn-primary btn-sm">
                <input type="submit" value="Modificar director" name="modificardir" class="btn btn-primary btn-sm">
                <input type="submit" value="Eliminar director" name="eliminardir" class="btn btn-primary btn-sm">
                <input type="submit" value="Buscar director" name="buscardir" class="btn btn-primary btn-sm">
                <br>
                <br>
            <?php
                } elseif (isset($_POST["insertardir"])) {
                    ?>
                        <form action="" method="post">
                        <input type="number" name="codir" placeholder="Código de director">
                        <input type="text" name="nomdir" placeholder="Nombre del director">
                        <input type="text" name="nacdir" placeholder="Nacionalidad del director">
                        <input type="submit" value="Insertar" name="insdir" class="btn btn-primary btn-sm">
                        <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
                        </form>
                    <?php
                    }elseif (isset($_POST["insdir"])) {
                        $codir=$_POST["codir"];
                        $nomdir=$_POST["nomdir"];
                        $nacdir=$_POST["nacdir"];
                        mysqli_select_db($link, $bd);
                        $insertdirector="INSERT INTO director VALUES ($codir, '$nomdir', '$nacdir')";
                        mysqli_query($link, $insertdirector);
                    }elseif (isset($_POST["modificardir"])) {
                       ?>
                            <p>Código del director:</p>
                            <select name="nom">
                            <?php
                            $select="SELECT id_director, nombre FROM director"; 
                            mysqli_select_db($link, $bd);
                            $resul=mysqli_query($link, $select);
                            while($tupla= mysqli_fetch_array($resul)){
                            echo "<option  value='".$tupla['id_director']."'>".$tupla['id_director']."-".$tupla['nombre']. "</option>";
                            }
                            ?>
                            </select>
                            <input type="text" name="nomdir" placeholder="Nombre del director">
                            <input type="text" name="nacdir" placeholder="Nacionalidad del director">
                            <input type="submit" value="Modificar" name="moddir" class="btn btn-primary btn-sm"">
                            <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
                       <?php
                    }elseif (isset($_POST["moddir"])) {
                             $codir=$_POST["nom"];
                             $nomdir=$_POST["nomdir"];
                             $nacdir=$_POST["nacdir"];
                             mysqli_select_db($link, $bd);
                             $updatedirector="UPDATE director SET nombre='$nomdir', nacionalidad='$nacdir' WHERE id_director=$codir";
                             mysqli_query($link, $updatedirector);
                    }elseif (isset($_POST["eliminardir"])) {
                        ?>
                        <p>Código del director:</p>
                        <select name="nom">
                        <?php
                        $select="SELECT id_director, nombre FROM director"; 
                        mysqli_select_db($link, $bd);
                        $resul=mysqli_query($link, $select);
                        while($tupla= mysqli_fetch_array($resul)){
                        echo "<option  value='".$tupla['id_director']."'>".$tupla['id_director']."-".$tupla['nombre']. "</option>";
                        }
                        ?>
                        </select>
                        <input type="submit" value="Eliminar" name="deldir" class="btn btn-primary btn-sm">
                        <?php
                    } elseif (isset($_POST["deldir"])) {
                        $codir=$_POST["nom"];
                        mysqli_select_db($link, $bd);
                        $borrardir="DELETE FROM director WHERE id_director=$codir";
                        mysqli_query($link, $borrardir);
                    }elseif (isset($_POST["buscardir"])) {
                        ?>
                        <input type="text" name="nomdir" placeholder="Nombre del director">
                        <input type="submit" value="Buscar" name="buscdir" class="btn btn-primary btn-sm">
                        <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
                        <?php
                    }elseif (isset($_POST["buscdir"])) {
                        $nomdir=$_POST["nomdir"];
                        mysqli_select_db($link, $bd);
                        $select="SELECT * FROM director WHERE nombre like '%$nomdir%'";
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
                <input type="submit" value="Instertar intérprete" name="inserint" class="btn btn-primary btn-sm">
                <input type="submit" value="Modificar intérprete" name="modificarint" class="btn btn-primary btn-sm">
                <input type="submit" value="Eliminar intérprete" name="eliminarint" class="btn btn-primary btn-sm">
                <input type="submit" value="Buscar intérprete" name="buscarint" class="btn btn-primary btn-sm">
                <br>
                <br>
            <?php
        }elseif (isset($_POST["inserint"])) {
            ?>
                <input type="number" name="codint" placeholder="Código de intérprete">
                <input type="text" name="nomint" placeholder="Nombre del intérprete">
                <input type="text" name="nacint" placeholder="Nacionalidad del intéprete">
                <input type="submit" value="Insertar" name="insint" class="btn btn-primary btn-sm">
                <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">     
            <?php
        }elseif (isset($_POST["insint"])) {
            $codint=$_POST["codint"];
            $nomint=$_POST["nomint"];
            $nacint=$_POST["nacint"];
            mysqli_select_db($link, $bd);
            $insertdirector="INSERT INTO interprete VALUES ($codint, '$nomint', '$nacint')";
            mysqli_query($link, $insertdirector);
        }elseif (isset($_POST["modificarint"])) {
            ?>
                <p>Código del intérprete:</p>
                <select name="nom">
                <?php
                $select="SELECT id_interprete, nombre FROM interprete"; 
                mysqli_select_db($link, $bd);
                $resul=mysqli_query($link, $select);
                while($tupla= mysqli_fetch_array($resul)){
                echo "<option  value='".$tupla['id_interprete']."'>".$tupla['id_interprete']."-".$tupla['nombre']. "</option>";
                }
                ?>
                </select>
                <input type="text" name="nomint" placeholder="Nombre del interprete">
                <input type="text" name="nacint" placeholder="Nacionalidad del interprete">
                <input type="submit" value="Modificar" name="modint" class="btn btn-primary btn-sm">
                <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
            <?php
        } elseif (isset($_POST["modint"])) {
            $codint=$_POST["nom"];
            $nomint=$_POST["nomint"];
            $nacint=$_POST["nacint"];
            mysqli_select_db($link, $bd);
            $updatedirector="UPDATE interprete SET nombre='$nomint', nacionalidad='$nacint' WHERE id_interprete=$codint";
            mysqli_query($link, $updatedirector);
        } elseif (isset($_POST["eliminarint"])) {
            ?>
            <p>Código del intérprete:</p>
            <select name="nom">
            <?php
            $select="SELECT id_interprete, nombre FROM interprete"; 
            mysqli_select_db($link, $bd);
            $resul=mysqli_query($link, $select);
            while($tupla= mysqli_fetch_array($resul)){
            echo "<option  value='".$tupla['id_interprete']."'>".$tupla['id_interprete']."-".$tupla['nombre']. "</option>";
            }
            ?>
            </select>
            <input type="submit" value="Eliminar" name="delint" class="btn btn-primary btn-sm">
            <?php
        } elseif (isset($_POST["delint"])) {
            $codint=$_POST["nom"];
            mysqli_select_db($link, $bd);
            $borrarint="DELETE FROM interprete WHERE id_interprete=$codint";
            mysqli_query($link, $borrarint);
        } elseif (isset($_POST["buscarint"])) {
            ?>
                <input type="text" name="nomint" placeholder="Nombre del intérprete">
                <input type="submit" value="Buscar" name="buscint" class="btn btn-primary btn-sm">
                <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">
            <?php
        } elseif (isset($_POST["buscint"])) {
            $nomint=$_POST["nomint"];
            mysqli_select_db($link, $bd);
            $select="SELECT * FROM interprete WHERE nombre like '%$nomint%'";
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
                <input type="submit" value="Instertar película" name="inserpel" class="btn btn-primary btn-sm">
                <input type="submit" value="Modificar película" name="modificarpel" class="btn btn-primary btn-sm">
                <input type="submit" value="Eliminar película" name="eliminarpel" class="btn btn-primary btn-sm">
                <input type="submit" value="Buscar película" name="buscarpel" class="btn btn-primary btn-sm">
                <br>
            <?php
        } elseif (isset($_POST["inserpel"])) {
            ?>
                <input type="number" name="codpel" placeholder="Código de la película"><br>
                <input type="text" name="titulo" placeholder="Título"><br>
                <p>Género:</p>
                <?php
                $select="SELECT * FROM generos"; 
                mysqli_select_db($link, $bd);
                $resul=mysqli_query($link, $select);
                while($tupla= mysqli_fetch_array($resul)){
                echo "<input type='checkbox' name='genero' value='".$tupla['genero']."'>".$tupla['genero'];
                }
                ?>
                <br>
                <p>Director:</p>
                <select name="nomdir">
                <?php
                $select="SELECT id_director, nombre FROM director"; 
                mysqli_select_db($link, $bd);
                $resul=mysqli_query($link, $select);
                while($tupla= mysqli_fetch_array($resul)){
                echo "<option  value='".$tupla['nombre']."'>".$tupla['id_director']."-".$tupla['nombre']. "</option>";
                }
                ?>
                </select>
                <br>
                <p>Protagonista:</p>
                <select name="nomint">
                <?php
                $select="SELECT id_interprete, nombre FROM interprete"; 
                mysqli_select_db($link, $bd);
                $resul=mysqli_query($link, $select);
                while($tupla= mysqli_fetch_array($resul)){
                echo "<option  value='".$tupla['nombre']."'>".$tupla['id_interprete']."-".$tupla['nombre']. "</option>";
                }
                ?>
                </select>
                <br>
                <input type="number" name="duracion" placeholder="Duración"><br>
                Fecha de estreno: <input type="date" name="estreno"><br>
                Sinopsis: <textarea name="sinopsis" placeholder="Sinopsis"></textarea><br>
                <input type="submit" value="Insertar" name="inspel" class="btn btn-primary btn-sm">
                <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">     
            <?php
        } elseif (isset($_POST["inspel"])) {
            $codpel=$_POST["codpel"];
            $titulo=$_POST["titulo"];
            $genero=$_POST["genero"];
            $nomdir=$_POST["nomdir"];
            $nomint=$_POST["nomint"];
            $duracion=$_POST["duracion"];
            $estreno=$_POST['estreno'];
            $sinopsis=$_POST["sinopsis"];
            mysqli_select_db($link, $bd);
            $insertpelicula="INSERT INTO pelicula VALUES ($codpel, '$titulo', '$genero', '$nomdir', '$nomint', $duracion, '$estreno', '$sinopsis')";
            mysqli_query($link, $insertpelicula);
            
        } elseif (isset($_POST["modificarpel"])) {
            ?>
            <input type="text" name="titulo" placeholder="Título"><br>
            <input type="number" name="duracion" placeholder="Duración"><br>
            Fecha de estreno: <input type="date" name="estreno"><br>
            Sinopsis: <textarea name="sinopsis" placeholder="Sinopsis"></textarea><br>
            <input type="submit" value="Modificar" name="modpel" class="btn btn-primary btn-sm">
            <input type="reset" value="Limpiar" class="btn btn-secondary btn-sm">     
            <?php
        } elseif (isset($_POST["modpel"])) {
            $titulo=$_POST["titulo"];
            $duracion=$_POST["duracion"];
            $estreno=$_POST['estreno'];
            $sinopsis=$_POST["sinopsis"];
            mysqli_select_db($link, $bd);
            $select="SELECT * FROM pelicula WHERE titulo like '%$titulo%'";
            $resul=mysqli_query($link, $select);
            if(!mysqli_num_rows($resul)){
            echo "Esta película no se puede modificar ya que no se encuentra en nuestra base de datos";
                } else {
                    $modpelicula="UPDATE pelicula SET duracion=$duracion, estreno='$estreno', sinopsis='$sinopsis' where titulo like '%$titulo%'";
                    mysqli_select_db($link, $bd);
                    mysqli_query($link,$modpelicula);
        }
            }
            
         elseif (isset($_POST["eliminarpel"])){
            ?>
                <p>Código de película:</p>
                <select name="codpel">
                <?php
                $select="SELECT id_pelicula, titulo FROM pelicula"; 
                mysqli_select_db($link, $bd);
                $resul=mysqli_query($link, $select);
                while($tupla= mysqli_fetch_array($resul)){
                echo "<option  value='".$tupla['id_pelicula']."'>".$tupla['id_pelicula']."-".$tupla['titulo']. "</option>";
                }
                ?>
                </select>
                <input type="submit" value="Eliminar" name="eliminar" class="btn btn-primary btn-sm">
            <?php
        } elseif (isset($_POST["eliminar"])) {
            $codigo=$_POST["codpel"];
            $eliminarpel="DELETE FROM pelicula WHERE id_pelicula=$codigo";
            mysqli_select_db($link, $bd);
            mysqli_query($link,$eliminarpel);
        } elseif (isset($_POST["buscarpel"])) {
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
    </form>
</body>
</html>