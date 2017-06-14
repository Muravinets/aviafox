<?php
$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5');

/* @var $route Route */
$pageTitle = 'Найти дешевые авиабилеты по направлению ' . $route->getTitle() . ' поможет aviafox.com';

$pageDescription =
    'Aviafox.com находит самые дешевые варианты перелета по направлению ' . $route->getTitle() . '.' .
    ' Удобный поиск находит скидки и льготные авиабилеты.'
;

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?php echo $pageTitle ?></title>
<meta name="description" content="<?php echo $pageDescription ?>" />

<?php get_template_part('template-parts/head/standart') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/route/layout.css"<?= $styleVersion ?> />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/route/styles.css"<?= $styleVersion ?> />

<?php get_template_part('template-parts/searchform/head') ?>
<?php get_template_part('template-parts/head/footer') ?>

<?php wp_head() ?>
</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>