<?php
    $host        = "host=localhost";
    $port        = "port=5432";
    $dbname      = "dbname=recetas";
    $credentials = "user=recetas password=recetas";

    $db = pg_connect( "$host $port $dbname $credentials" );

    if(!$db){
        echo "Error : No se pudo conectar con la base de datos. \n";
    } else {
        echo "Se ha conectado con la base de datos. \n";
    } ?>
