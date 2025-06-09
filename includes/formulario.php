<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Zodiaco</title>
    <link rel="stylesheet" href="../css/estilo_formulario.css"> 
</head>
<body>
<?php
include("conexion.php");
$res = mysqli_query($conexion, "SELECT MAX(no_registro)+1 AS no_registro FROM zodiaco_usuarios");
mysqli_data_seek($res, 0);
$dato = mysqli_fetch_array($res);

if ($_POST) {
    $a = $_POST["num"];
    $b = $_POST["nom"];
    $c = $_POST["sigz"];
    $insert = mysqli_query($conexion, "INSERT INTO zodiaco_usuarios(no_registro,nombre_c,signo_z) VALUES('$a','$b','$c')") or die(mysqli_error());
    echo "<script> alert('Dato guardado'); window.location='../index.html'</script>";
}
?>

<div class="container">
    <h3>¿Qué signo zodiacal eres?</h3>
    <form onsubmit="return validarFormulario()" action="../index.html" method="post">
        <label for="num">Número de registro:</label>
        <input type="text" name="num" value="<?php echo $dato['no_registro']; ?>" readonly>

        <label for="nom">Nombre:</label>
        <input type="text" name="nom" id="nombre" required>

        <label>Selecciona tu signo zodiacal:</label>
        <div class="signos">
            <?php
            $signos = ["Aries", "Tauro", "Geminis", "Cancer", "Leo", "Virgo", "Libra", "Escorpio", "Sagitario", "Capricornio", "Acuario", "Picis"];
            foreach ($signos as $signo) {
                echo "<label><input type='radio' name='sigz' value='$signo' required> $signo</label>";
            }
            ?>
        </div>

        <input type="submit" value="Registrar">
    </form>
</div>

<script>
    function validarFormulario() {
        let nombre = document.getElementById('nombre').value.trim();
        if (nombre.length < 3) {
            alert("El nombre debe tener al menos 3 caracteres.");
            return false;
        }
        return true;
    }
</script>
</body>
</html>
