<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	 <link rel="stylesheet" href="../css/estilo_tabla_modificar.css">
</head>
<body>
<form method="POST" action="actualizar.php">
	ID DEL USUARIO:<input type="text" id="c" name="c">
	<input type="submit" name="N" id="N" value="Buscar">
</form>

<?php
include("conexion.php");
if(isset($_POST['N'])){
	$id=$_POST['c'];
	$modificar=mysqli_query($conexion, "select * from zodiaco_usuarios where no_registro=$id")or die(mysqli_error($conexion));
	if($var=mysqli_fetch_array($modificar)){
		?>

<form action="actualizar.php" method="POST">
	<p>Numero de registro:<input type="text"  name="c2" readonly value="<?php echo $var['no_registro']?>"></p>
	<p>Nombre<input type="text"  name="c3"  value="<?php echo $var['nombre_c']?>"></p>
	<p>Signo zodiacal<input type="text"  name="c4"  value="<?php echo $var['signo_z']?>"></p>
	<p><input type="submit" value="MODIFICAR" name="btn3"></p>
</form><br>

<?php
}
}
else{
    echo '<center><br><p><a href=actualizar.php>'.'</a></p></center>';
}
?>
<?php
include("conexion.php");
if(isset($_POST['btn3'])){
	
	$c=$_POST['c2'];
	$n=$_POST['c3'];
	$co=$_POST['c4'];
	
	mysqli_query($conexion, "update zodiaco_usuarios set nombre_c='$n',signo_z='$co' where no_registro='$c'")or die(mysqli_error($conexion));
	echo '<center>MODIFICACIÓN EXITOSA</center>';
echo '<br><center><a href="../includes/consulta.php" style="text-decoration:none; color:#007bff; font-weight:bold;">⟵ Volver a la página anterior</a></center>';

}
?>

<?php
include("conexion.php");
$res=mysqli_query($conexion, "SELECT no_registro, nombre_c, signo_z FROM zodiaco_usuarios");
?>
<table border="2">
	<tr><th>Numero de registro:</th>
	<th>Nombre:</th>
	<th>Signo zodiacal:</th>
	</tr>
	<?php
	while($row=mysqli_fetch_array($res)){
		echo "<tr><td>".$row["no_registro"]."</td>";
		echo "<td>".$row["nombre_c"]."</td>";
		echo "<td>".$row["signo_z"]."</td></tr>";
	}
	mysqli_free_result($res);
	?>
</table>
	
</body>
</html>



