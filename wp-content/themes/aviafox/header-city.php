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

<?php get_template_part('template-parts/head/standart') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/page-catalog.css?v=1.0">

<?php get_template_part('template-parts/head/sf') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/layout.css?v=5.0" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/styles.css?v=5.0" />

<?php get_template_part('template-parts/head/footer') ?>

<?php wp_head() ?>
</head>

<body <?php body_class() ?>>

<?php get_template_part( 'template-parts/header/header', 'image' ) ?>

<header>
    <section class="top-bar">
	    <?php get_template_part( 'template-parts/header/header', 'logo' ) ?>
        <div class="site-title">ПОИСКОВИК АВИАБИЛЕТОВ</div>
		<?php if (isset($headerH1)) { ?>
            <h1><?php echo $headerH1 ?></h1>
		<?php } ?>
    </section>
</header>

<?php get_template_part( 'template-parts/searchform/container' ) ?>