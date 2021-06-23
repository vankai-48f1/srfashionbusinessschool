<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>
    <?php if (is_home()) : ?>
      <?php bloginfo('name') ?>
    <?php elseif (is_single()) : ?>
      <?php echo wp_title(); ?>
    <?php else : ?>
      <?php wp_title('', true, ''); ?>
    <?php endif ?>
  </title>

  <?php if (is_home()) : ?>
    <!-- Khi ở trang chủ -->
    <meta name="description" content="<?php bloginfo('description') ?>" />
  <?php elseif (is_single()) : ?>
    <!-- Khi ở trang bài viết -->
    <meta name="description" content="<?php echo get_field('seo_description'); ?>" />
    <meta name="keywords" content="<?php echo get_field('seo_keywords'); ?>" />
  <?php endif ?>
	<?php
      if (is_front_page()) { ?>
	<meta property="og:image" content="/wp-content/uploads/2020/10/SR-Banner-new-min.jpg" />
	<?php } ?> 

  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reset-css.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/slick/slick.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/slick/slick-theme.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/font-srfashion.css">
  <!--<link crossorigin="anonymous" rel='stylesheet' id='wi-fonts-css'  href='https://fonts.googleapis.com/css?family=Merriweather%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic%7COswald%3A300%2Cregular%2C700&#038;subset=cyrillic%2Ccyrillic-ext%2Clatin%2Clatin-ext&#038;ver=7227ff9b29d56eb13ecd1e9b2935bc17' type='text/css' media='all' />-->

  <!-- jQuery library -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/slick/slick.js"></script>

  <?php if (!is_front_page()) {
  ?>
    <style>
      @media (min-width: 1200px) {
        #toggle-bar {
          display: none !important;
        }

        .header .logo {
          display: none;
        }

        .nav__list {
          transform: translateX(0%) !important;
        }
      }
    </style>

  <?php } ?>
  <?php wp_head() ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-183663019-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-183663019-1');
</script>


</head>

<body <?php
      if (is_front_page()) { ?> style="background-color:#2d2d2e;" <?php } else { ?> style="background-color: #f4f4f5;" <?php } ?>>

  <header>
    <div class=" header">
      <?php $logo_home = get_theme_mod('Logo_menu'); ?>

      <div class="logo">
        <a class="logo-top" href="<?php echo home_url() ?>">
          <?php if (!empty($logo_home)) { ?>
            <img src="<?php echo $logo_home; ?><?php } ?>" alt="logo" width="100%" />
        </a>
      </div>


      <div id="toggle-bar" class="toggle-bar">
        <div class="toggle-bar__button">
          <span class="toggle-bar__icon">&nbsp;</span>
        </div>
      </div>

      <nav class="nav">
        <div class="nav__white"></div>
        <ul class="nav__list">
          <div class="nav__div-logo">
            <a href="<?php echo home_url() ?>" class="nav__logo-menu">
              <?php if (!empty($logo_home)) { ?><img src="<?php echo $logo_home; ?><?php } ?>" alt="logo" width="100%" />
            </a>
            <span class="nav__close-navbar" id="close-navbar"><i class="fas fa-times"></i></span>
          </div>
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'header-menu', // Gọi menu đã đăng ký trong function
            'depth'           => 3,     // Cấu hình dropdown 2 cấp
            'container'       => false, // header-menuThẻ div bọc menu
            'menu_class'      => 'menu-class', // Class của nav bootstrap
          ));
          ?>
        </ul>
      </nav>
    </div>

  </header>