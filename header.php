<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav id="mainNav">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="b online — inicio">
    <div class="logo-s" id="logoB" title="Haz clic para que salte">
      <div class="logo-st"></div>
      <div class="logo-bw"></div>
      <div class="logo-dt"></div>
    </div>
    <div class="logo-tx">
      <span class="logo-bb">b</span>
      <span class="logo-on">online</span>
    </div>
  </a>

  <ul class="nl" id="mainMenu">
    <li><a href="#precios">Precios</a></li>
    <li><a href="#servicios">Servicios</a></li>
    <li><a href="#equipo">Equipo</a></li>
    <li><a href="#proyectos">Proyectos</a></li>
    <li><a href="#contacto" class="nc">Impulsa tu negocio</a></li>
  </ul>

  <button class="ham" id="hamBtn" aria-label="Abrir menú" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- Mobile menu -->
<div class="mob-menu" id="mobMenu" aria-hidden="true">
  <a href="#precios">Precios</a>
  <a href="#servicios">Servicios</a>
  <a href="#equipo">Equipo</a>
  <a href="#proyectos">Proyectos</a>
  <a href="#contacto" class="mob-cta">Impulsa tu negocio</a>
</div>
