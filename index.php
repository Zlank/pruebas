<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recetas</title>
    </head>
    <body>
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
            }


            if(isset($_POST['nombre']) && isset($_POST['anyo'])) {
                $nombre = $_POST['nombre'];
                $anyo = $_POST['anyo'];

                // query using prepared statements

                $result = pg_query($db, "INSERT INTO personas (nombre,anyo) VALUES('$nombre', $anyo);");

                if (!$result) {
                    echo "Ocurrio un error.";
                } else {
                    echo "Se inserto correctamente.";
                }
            } ?>
        <h1>Recetas de cocina</h1><br/>
        <form action="index.php" method="post">
            <label>Nombre: </label><input type="text" name="nombre" /></br>
            <label>Año: </label><input type="text" name="anyo" />
            <input type="submit" value="Confirmar" />
        </form><br/>
        <table border="1" width="200">
            <tr>
                <th>Nombre</th>
                <th>Año</th>
            </tr>
            <?php
                $result = pg_query($db, "SELECT nombre, anyo FROM personas");
                if (!$result) {
                    echo "Ocurrió un error.\n";
                }

                while ($row = pg_fetch_row($result)) {?>
                <tr>
                    <td><?= $row[0]; ?></td>
                    <td><?= $row[1]; ?></td>
                </tr><?php
                } ?>
        </table>
    </body>
</html>
