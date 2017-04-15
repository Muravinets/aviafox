<?php
$wp_query->query_vars['noSearchForm'] = true;

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <title></title>

    <?php get_template_part('template-parts/head/standart') ?>
    <?php get_template_part('template-parts/head/footer') ?>

    <?php wp_head() ?>
</head>

<body>

<?php get_template_part('template-parts/header/standart') ?>