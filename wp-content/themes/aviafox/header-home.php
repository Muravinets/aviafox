<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Aviafox
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/normalize.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/layout.css?v=5.7" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/styles.css?v=5.7" media="all" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<!--SF css files-->
<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/search-form/layout.css?v=3.9" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/search-form/style.css?v=3.1" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/search-form/datepicker.css?v=2" />

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.js"></script>

<!--SF js files-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.twidget.js?v=4.0"></script>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/footer/layout.css?v=3.1" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/footer/styles.css?v=3.3.3" media="all" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <section class="top-bar">
        <h1>Поисковик авиабилетов</h1>

	    <?php get_template_part( 'template-parts/header/header', 'logo' ) ?>
	    <?php get_template_part( 'template-parts/header/header', 'image' ) ?>
    </section>
	<?php get_template_part( 'template-parts/searchform/container' ) ?>
</header>