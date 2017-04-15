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
$pageTitle = single_post_title('', false);

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

    <title><?php echo $pageTitle ?></title>

	<?php get_template_part('template-parts/head/standart') ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/page-catalog.css?v=1.0">

	<?php get_template_part('template-parts/head/sf') ?>
	<?php get_template_part('template-parts/head/footer') ?>

	<?php wp_head() ?>
</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>