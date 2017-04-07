<?php
$wp_query->query_vars['noSearchForm'] = true;

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?php echo $pageTitle ?></title>

<?php get_template_part('template-parts/head/standart') ?>

<?php get_template_part('template-parts/head/footer') ?>

</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>