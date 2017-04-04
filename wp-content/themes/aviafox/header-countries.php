<?php
$pageTitle = 'Авиабилеты по самым низким ценам, список стран в алфавитном порядке.';
$pageDescription = 'Aviafox.com - поиск дешевых авиабилетов во все странам мира. Акции, скидки, спецпредложения.';

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?php echo $pageTitle ?></title>
<meta name="description" content="<?php echo $pageDescription ?>" />

<?php get_template_part('template-parts/head/standart') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/page-catalog.css?v=1.0">

<?php get_template_part('template-parts/head/sf') ?>
<?php get_template_part('template-parts/head/footer') ?>

<?php //wp_head() ?>
</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>