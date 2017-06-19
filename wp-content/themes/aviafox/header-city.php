<?php
/* @var $city \City\Object */
/* @var $pageTitle string */
/* @var $pageDescription string */

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?= isset($pageTitle) ? $pageTitle : '' ?></title>
<meta name="description" content="<?= isset($pageDescription) ? $pageDescription : '' ?>" />

<?php get_template_part('template-parts/head/standart') ?>
<?php get_template_part('template-parts/searchform/head') ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/layout.css?v=5.0" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/styles.css?v=5.0" />


<?php wp_head() ?>
</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>