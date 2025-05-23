<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Publicar Res - GanApp</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5" style="max-width: 600px;">
  <h2 class="mb-4 text-center">Publicar Nueva Res</h2>
  <form action="guardar-res.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Imagen:</label>
      <input type="file" name="imagen" accept="image/*" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Edad:</label>
      <input type="text" name="edad" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Vacunas:</label>
      <input type="text" name="vacunas" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Estado de Salud:</label>
      <input type="text" name="salud" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Peso:</label>
      <input type="text" name="peso" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Alimentación:</label>
      <input type="text" name="alimentacion" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Origen:</label>
      <input type="text" name="origen" class="form-control" required>
    </div>
    
    <div class="mb-3">
     <label>Ubicación actual:</label>
     <input type="text" name="ubicacion" class="form-control" required>
    </div>


    <div class="text-center">
      <button type="submit" class="btn btn-success">Publicar</button>
    </div>
  </form>
</div>

</body>
</html>
