<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}
?>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - GanApp</title>

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="styles.css">

  <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  <!-- ELIMINAR -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>



<!-- CONTENIDO PRINCIPAL -->
<div class="main-content" style="padding: 40px; text-align: rigth;">
  <h2>Bienvenido a nuestro asistente virtual para la compra y venta de reses</h2>
<P>GanApp facilita la compra y venta de reses con información detallada y una búsqueda inteligente.</P>

<div class="text-center mt-3">
  <a href="publicar.php" class="btn btn-success">
    + Publicar nueva res
  </a>
</div>

</div>
<div class="container mt-5">
  <h2 class="text-center mb-4">Reses disponibles</h2>
  <div class="row">
    
  <div class="container text-center my-4">
  <h2 class="text-success">Búsqueda de Información Detallada de Reses</h2>
  <input type="text" id="busquedaReses" class="form-control w-50 mx-auto mt-3"
         placeholder="Buscar por edad, tratamientos, salud, alimentación, origen...">
</div>

    <?php
    include 'db.php';
    
    $reses = $conexion->query("SELECT r.*, u.nombre AS dueño
                           FROM reses r
                           JOIN usuarios u ON r.id_usuario = u.id
                           ORDER BY r.fecha_publicacion DESC");


    

    while ($res = $reses->fetch_assoc()):
    ?>
    <div class="col-md-4 mb-4 res-item"
     data-info="<?php echo strtolower($res['edad'] . ' ' . $res['vacunas'] . ' ' . $res['salud'] . ' ' . $res['peso'] . ' ' . $res['alimentacion'] . ' ' . $res['origen'] . ' ' . $res['ubicacion']); ?>">

      <div class="card h-100">
        <img src="<?php echo $res['imagen']; ?>" class="card-img-top" alt="Res" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Res publicada</h5>
          <p class="card-text"><strong>Edad:</strong> <?php echo $res['edad']; ?></p>
          <p class="card-text"><strong>Salud:</strong> <?php echo $res['salud']; ?></p>
          <p class="card-text"><strong>Peso:</strong> <?php echo $res['peso']; ?></p>
          <p class="card-text"><strong>Vacunas:</strong> <?php echo $res['vacunas']; ?></p>
          <p class="card-text"><strong>Alimentación:</strong> <?php echo $res['alimentacion']; ?></p>
          <p class="card-text"><strong>Origen:</strong> <?php echo $res['origen']; ?></p>
          <p class="card-text"><strong>Ubicación:</strong> <?php echo $res['ubicacion']; ?></p>
          <p class="card-text text-muted">
          <small>Publicado por: <?php echo htmlspecialchars($res['dueño']); ?></small>
          </p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>


<script>
  document.getElementById('busquedaReses').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    const reses = document.querySelectorAll('.res-item');

    reses.forEach(function (res) {
      const info = res.getAttribute('data-info');
      res.style.display = info.includes(query) ? 'block' : 'none';
    });
  });
</script>

</body>
</html>
