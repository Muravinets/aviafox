<?
$styleVersion = $_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? '?v=' . time() : '';

?><!--SF css files-->
<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/search-form/layout.css<?= $styleVersion ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/search-form/style.css<?= $styleVersion ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/search-form/datepicker.css<?= $styleVersion ?>" />

<!--SF js files-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.twidget.js?v=4.2"></script>