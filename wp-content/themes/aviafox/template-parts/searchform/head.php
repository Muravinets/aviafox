<?
$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5');
$stylesBaseUri = get_bloginfo('template_directory', 'display') . '/assets/css/search-form';

?><!--SF css files-->
<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.css" />

<link rel="stylesheet" type="text/css" href="<?= $stylesBaseUri ?>/layout.css<?= $styleVersion ?>" />
<link rel="stylesheet" type="text/css" href="<?= $stylesBaseUri ?>/style.css<?= $styleVersion ?>" />
<link rel="stylesheet" type="text/css" href="<?= $stylesBaseUri ?>/datepicker.css<?= $styleVersion ?>" />
<link rel="stylesheet" type="text/css" href="<?= $stylesBaseUri ?>/fonticons.css<?= $styleVersion ?>" />

<!--SF js files-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.twidget.js?v=4.2"></script>