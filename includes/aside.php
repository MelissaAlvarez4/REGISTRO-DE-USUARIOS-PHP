<?php require_once 'includes/helpers.php' ?>
<!-- SIDEBAR -->
<aside id="sidebar">
  <div id="login" class="block-aside">
    <h3>Ingresar</h3>
    <form action="login.php" method="POST">
      <label for="email">Email</label>
      <input type="email" name="email">

      <label for="password">Contraseña</label>
      <input type="password" name="password">

      <input type="submit" value="Entrar">
    </form>
  </div>

  <div id="register" class="block-aside">
    <h3>Registrarte</h3>
    <form action="register.php" method="POST">
      <label for="name">Nombre</label>
      <input type="text" name="name">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'): ''; ?>

      <label for="apellidos">Apellidos</label>
      <input type="text" name="apellidos" >
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'): ''; ?>

      <label for="email">Email</label>
      <input type="email" name="email">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'): ''; ?>

      <label for="password">Contraseña</label>
      <input type="password" name="password">
      <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'): ''; ?>

      <input type="submit" value="Entrar" name"submit">
    </form>
    <?php borrarErrores(); ?>
  </div>
</aside>
