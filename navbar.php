<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<nav class="navbar-custom">
  <div class="navbar-container">
    
    <!-- IZQUIERDA: Logo + Nombre -->
    <div class="navbar-left">
      <img src="img/logo.png" alt="GanApp Logo">
      <a href="index.php" class="brand-text">GanApp</a>
    </div>

    <!-- CENTRO: Menú de navegación centrado -->
    <div class="navbar-center">
      <ul class="navbar-menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="#funciones">Funciones</a></li>
        <li><a href="#beneficios">Beneficios</a></li>
        <li><a href="#objetivo">Objetivo</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ul>
    </div>

    <!-- DERECHA: Menú de usuario -->
    <?php if (isset($_SESSION['usuario_id'])): ?>
    <div class="user-menu">
      <span class="user-name">Hola, <?php echo $_SESSION['nombre']; ?> ▾</span>
      <div class="dropdown">
        <a href="perfil.php">Mi Perfil</a>
        <a href="logout.php">Cerrar Sesión</a>
      </div>
    </div>
    <?php endif; ?>
    
  </div>
</nav>
