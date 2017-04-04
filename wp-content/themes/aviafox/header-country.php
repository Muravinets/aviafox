<?php
/* @var $object \Country\Object */

$pageTitle = 'Авиабилеты онлайн в ' . $object->getTitleDestination() . ' по самым низким ценам из существующих.';
$pageDescription = 'Сайт дешевых авиабилетов - aviafox.com. Поможем найти авиабилеты во все страны мира. Удобный поиск.';

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?php echo $pageTitle ?></title>
<meta name="description" content="<?php echo $pageDescription ?>" />

<?php get_template_part('template-parts/head/standart') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/country/layout.css?v=5.0" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/country/styles.css?v=5.0" />

<?php get_template_part('template-parts/head/sf') ?>
<?php get_template_part('template-parts/head/footer') ?>

</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>