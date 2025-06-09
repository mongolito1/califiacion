<?php
include("conexion.php");
$result=mysqli_query($conexion, "SELECT no_registro, nombre_c, signo_z FROM zodiaco_usuarios");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consulta</title>
    <link rel="stylesheet" href="../css/estilo_tabla.css">
</head>

<body>
	
	<h1><center><i>REGISTROS</i></center></h1>
	<div style="display: flex; gap: 20px; margin-bottom: 20px;">
    <ul><li><a href="../index.html"><</a></li></ul>
    <ul><li><a href="eliminación.php">Eliminar</a></li></ul>
    <ul><li><a href="actualizar.php">Modificar</a></li></ul>
    <ul><li><a href="eleccion_registro_inicio.php">BD</a></li></ul>
</div>
	<div style="text-align: center;">
    <table id="tabla" border="1" style="margin: 0 auto;">
        <tr>
            <td>N_CTRL</td>
            <td>Nombre</td>
            <td>Correo Electrónico</td>
        </tr>
        <?php
        while($row = mysqli_fetch_array($result)){
            echo "<tr><td>".$row["no_registro"]."</td>";
            echo "<td>".$row["nombre_c"]."</td>";
            echo "<td>".$row["signo_z"]."</td></tr>";
        }
        mysqli_free_result($result);
        ?>
    </table>
</div>



</body>
</html>