<?
$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5.9');

?><meta charset="<?php bloginfo( 'charset' ) ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="/favicon.ico" rel="icon" type="image/x-icon" />
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/normalize.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/base/layout.css?v=1.0" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/base/styles.css?v=1.1" media="all" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/header/layout.css<?= $styleVersion ?>" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/header/styles.css<?= $styleVersion ?>" media="all" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/content-layout.css?v=5.1" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/content-styles.css?v=5.1" media="all" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<script src="<?php bloginfo('template_directory') ?>/assets/js/jquery.js"></script>