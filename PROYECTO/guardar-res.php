<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';

// Subir imagen
$directorio = "img/reses/";
$archivo = $directorio . basename($_FILES["imagen"]["name"]);
move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);

// Datos del formulario
$edad = $_POST['edad'];
$vacunas = $_POST['vacunas'];
$salud = $_POST['salud'];
$peso = $_POST['peso'];
$alimentacion = $_POST['alimentacion'];
$origen = $_POST['origen'];
$ubicacion = $_POST['ubicacion'];
$usuario_id = $_SESSION['usuario_id'];

$sql = "INSERT INTO reses (imagen, edad, vacunas, salud, peso, alimentacion, origen, ubicacion, id_usuario)
        VALUES ('$archivo', '$edad', '$vacunas', '$salud', '$peso', '$alimentacion', '$origen', '$ubicacion', $usuario_id)";


if ($conexion->query($sql)) {
    header("Location: index.php?publicado=ok");
} else {
    echo "Error al guardar: " . $conexion->error;
}
?>
