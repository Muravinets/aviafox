<?php
/* @var $city \City\Object */
$pageTitle = 'Купить авиабилеты дешево в город ' . $city->getTitle() . ' на сайте aviafox.com';
$pageDescription = 'Мы поможем Вам найти самые дешевые авиабилеты в город ' . $city->getTitle() . '. Предложения от всех авиакомпаний.';

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?php echo $pageTitle ?></title>
<meta name="description" content="<?php echo $pageDescription ?>" />

<?php get_template_part('template-parts/head/standart') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/layout.css?v=5.0" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/styles.css?v=5.0" />

<?php get_template_part('template-parts/head/sf') ?>
<?php get_template_part('template-parts/head/footer') ?>

</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>