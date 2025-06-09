<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="../css/estilo_tabla_elimicacion.css">
</head>
<body>

    <h1>Eliminar Usuario del Zodiaco</h1>

    <div class="form-container">
        <form method="POST" action="">
            <label for="c1">ID del Usuario:</label>
            <input type="text" id="c1" name="c1" required>
            <input type="submit" name="Eliminar" id="Eliminar" value="Eliminar">
        </form>

        <?php
        include('conexion.php');
        if (isset($_POST['Eliminar'])) {
            $id = $_POST['c1'];
            $seleccion = mysqli_query($conexion, "SELECT no_registro FROM zodiaco_usuarios WHERE no_registro='$id'") or die(mysqli_error($conexion));
            if ($variable = mysqli_fetch_array($seleccion)) {
                mysqli_query($conexion, "DELETE FROM zodiaco_usuarios WHERE no_registro='$id'") or die(mysqli_error($conexion));
                echo '<p class="message">✅ Se eliminó correctamente el dato.</p>';
            } else {
                echo '<p class="message error">❌ No se encontró el dato.</p>';
            }
            echo '<p style="text-align:center;"><a href="consulta.php">Volver a la consulta</a></p>';
        }
        ?>
    </div>

    <?php
    $res = mysqli_query($conexion, "SELECT no_registro, nombre_c, signo_z FROM zodiaco_usuarios");
    ?>

    <table>
        <tr>
            <th>Número de usuario</th>
            <th>Nombre</th>
            <th>Signo zodiacal</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>
                    <td>{$row['no_registro']}</td>
                    <td>{$row['nombre_c']}</td>
                    <td>{$row['signo_z']}</td>
                </tr>";
        }
        mysqli_free_result($res);
        ?>
    </table>

</body>
</html>



