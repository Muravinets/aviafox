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

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.js"></script>

<?php get_template_part('template-parts/head/sf') ?>

<?php get_template_part('template-parts/head/footer') ?>

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