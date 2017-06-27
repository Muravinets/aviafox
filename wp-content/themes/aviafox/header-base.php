<?php
/* @var $pageTitle string */
/* @var $pageDescription string */

?><!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>

<title><?= isset($pageTitle) ? $pageTitle : '' ?></title>
<? if (isset($pageDescription)) : ?><meta name="description" content="<?= $pageDescription ?>" /><? endif; ?>

<? get_template_part('template-parts/head/standart') ?>
<? if (!isset($noSearchForm)) :
    get_template_part('template-parts/searchform/head');
endif;
?>

<? wp_head() ?>
</head>

<body>

<? get_template_part('template-parts/header/standart') ?>