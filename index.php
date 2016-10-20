<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='styles/estilo.css' />
        <meta charset="utf-8">
        <title>Recetas</title>
    </head>
    <body>
        <script type="text/javascript" src="scripts/validaranyo.js"></script>
        <?php
            require 'connect.php';

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

        <div>
            <form action="index.php" method="post" onsubmit="return validateAnyo(anyo);">
                <label>Nombre: </label><input type="text" name="nombre" /></br>
                <label>Año: </label><input type="text" name="anyo" id="anyo"/>
                <input type="submit" value="Confirmar" />
            </form><br/>
        </div>
        <table border="1">
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
