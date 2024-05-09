<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta
    name="viewport"
    content="width=device-width" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
  <div class="hfeed">
    <header class="header" role="banner">
      <div class="header__inner">
        <div class="header__primary">
          <?php
	          if(is_front_page() || is_home() || is_front_page() && is_home()) {
		          echo '<span class="header__location-text">Our Gutters availale in 28205</span>'; // TODO: dynamically output location
	          }
          ?>
        </div>
        <div class="header__secondary">
          <nav
            id="menu"
            class="navigation"
            role="navigation"
            itemscope
            itemtype="https://schema.org/SiteNavigationElement">
		        <?php wp_nav_menu([
			        'theme_location' => 'main-menu',
              'menu_class' => 'navigation__list',
		        ]); ?>
          </nav>
        </div>
      </div>
    </header>
    <div id="container">
      <main
        id="content"
        role="main">
