<?php
    $host="localhost";
    $user="root";
    $passwd="";

    $link=mysqli_connect($host, $user, $passwd);

    if ($link) {
        echo "exito";
    }

    $bd="cine";
    $crearbd="CREATE DATABASE $bd";
    mysqli_query($link, $crearbd);
    mysqli_select_db($link, $bd);
    $tablainterprete="CREATE TABLE interprete (
                id_interprete int(12),
                nombre varchar(50),
                nacionalidad varchar(100),
                primary key (nombre)
    )";

    
    mysqli_query($link, $tablainterprete);

    $insertinterprete="INSERT INTO interprete VALUES (1111, 'Timothée Chalamet', 'Canada')";
    $insertinterprete2="INSERT INTO interprete VALUES (2222, 'Charlize theron', 'Sudafrica')";
    $insertinterprete3="INSERT INTO interprete VALUES (3333, 'Samuel L Jackson', 'Estados Unidos')";
    mysqli_select_db($link, $bd);
    mysqli_query($link, $insertinterprete);
    mysqli_query($link, $insertinterprete2);
    mysqli_query($link, $insertinterprete3);
    

    

    $tabladirector="CREATE TABLE director (
                        id_director int(11),
                        nombre varchar(50),
                        nacionalidad varchar(20),
                        primary key (nombre)
    )";

    mysqli_select_db($link, $bd);
    mysqli_query($link, $tabladirector);

    $insertdirector="INSERT INTO director VALUES (111, 'Dennis Villeneuve', 'Canada')";
    $insertdirector2="INSERT INTO director VALUES (112, 'Tarantino', 'Estados Unidos')";
    $insertdirector3="INSERT INTO director VALUES (113, 'George Lucas', 'Estados Unidos')";
    
    mysqli_query($link, $insertdirector);
    mysqli_query($link, $insertdirector2);
    mysqli_query($link, $insertdirector3);
    
    
    
    $peli="CREATE TABLE pelicula (
        id_pelicula int(11) primary key,
        titulo varchar(20),
        genero varchar (20),
        director varchar(50),
        protagonista varchar(50),
        duracion int(11),
        estreno date,
        sinopsis varchar(500),
        FOREIGN KEY (director) REFERENCES director (nombre),
        FOREIGN KEY (protagonista) REFERENCES interprete (nombre)
        )";

        mysqli_select_db($link, $bd);
        mysqli_query($link, $peli);

        $tablagenero="CREATE TABLE generos (
            genero varchar(50),
            primary key (genero)
        )";
        mysqli_select_db($link, $bd);
        mysqli_query($link, $tablagenero);

        $insertgenero1="insert into generos values('Ciencia Ficcion')";
        $insertgenero2="insert into generos values('Drama')";
        $insertgenero3="insert into generos values('Thriller')";
        $insertgenero4="insert into generos values('Accion')";
        $insertgenero5="insert into generos values('Aventura')";
        $insertgenero6="insert into generos values('Animacion')";
        $insertgenero7="insert into generos values('Comedia')";
        $insertgenero8="insert into generos values('Fantasia')";
        $insertgenero9="insert into generos values('Terror')";
        $insertgenero10="insert into generos values('Independiente')";

        mysqli_query($link, $insertgenero1);
        mysqli_query($link, $insertgenero2);
        mysqli_query($link, $insertgenero3);
        mysqli_query($link, $insertgenero4);
        mysqli_query($link, $insertgenero5);
        mysqli_query($link, $insertgenero6);
        mysqli_query($link, $insertgenero7);
        mysqli_query($link, $insertgenero8);
        mysqli_query($link, $insertgenero9);
        mysqli_query($link, $insertgenero10);
?>
