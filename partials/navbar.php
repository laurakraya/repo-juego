<nav class="navibar">
  <a class="navibar__home-link" href="index.php"><i class="fas fa-home fa-2x"></i></a>
  <?php if ($auth->usuarioLogueado()) : ?>
    <div class="navibar__user">
      <a class="navibar__user__pic" href="perfil.php" style="background-image: url('img/profile-placeholder.png')"></a>
      <p class="navibar__user__name"><?php echo $usuario->getName();  ?></p>
      <a class="navibar__user__btn" href=""><i class="fas fa-sort-down"></i></a>
      <ul class="navibar__user__options">
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  <?php else : ?>
    <ul class="navibar__list">
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#home">Inicio</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#descripcion">El Juego</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#login">Login</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#register">Registro</a></li>
    </ul>
  <?php endif; ?>
</nav>