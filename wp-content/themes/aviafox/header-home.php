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

$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '6.21');
$headerType = isset($_GET['ht']) ? $_GET['ht'] : null;

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ) ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title></title>

<meta name="yandex-verification" content="6ab1516b9435398d" />

<link href="/favicon.ico" rel="icon" type="image/x-icon" />
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/normalize.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/layout.css<?= $styleVersion ?>" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/styles.css<?= $styleVersion ?>" media="all" />

<? if ($headerType == 'old') { ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/header/old_layout.css<?= $styleVersion ?>" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/header/old_styles.css<?= $styleVersion ?>" media="all" />
<? } else { ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/header/layout.css<?= $styleVersion ?>" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/header/styles.css<?= $styleVersion ?>" media="all" />
<? } ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.js"></script>

<?php get_template_part('template-parts/searchform/head') ?>

<?php wp_head() ?>
</head>

<body>

<? if ($headerType == 'old') : ?>
    <?php get_template_part('template-parts/counter/all') ?>
    <header>
        <section class="top-bar">
            <h1>Поисковик авиабилетов</h1>
            <?php get_template_part('template-parts/header/logo') ?>
            <?php get_template_part('template-parts/header/image') ?>
        </section>
        <?php get_template_part('template-parts/searchform/container') ?>
    </header>
<? else : ?>
	<?php get_template_part('template-parts/header/standart') ?>
<? endif;