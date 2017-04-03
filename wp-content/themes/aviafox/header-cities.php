<?php
$pageTitle = 'Список городов в котрые мы можем найти авиабилеты онлайн.';
$pageDescription = 'Поможем найти самую низкую цену на авиабилет в любой город в несколько кликов.';

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