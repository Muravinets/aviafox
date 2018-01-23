<!DOCTYPE html>
<html lang="ru">
<head>
    <? $rand = rand(10000, 1000000); $randSfx = '?r='.$rand ?>
	<meta charset="utf-8"/>
	<title>Поисковик авиабилетов</title>

    <link rel="stylesheet" href="https://tickets.aviafox.com/main.css?r=0.8934457344161988" as="style" onload="this.rel='stylesheet'">
<!--	<link rel="stylesheet" type="text/css" href="https://wl.aviafox.com/main.css?r=0.8934457344161988" />-->
    <link rel="stylesheet" href="https://www.travelpayouts.com/mewtwo/styles.css" as="style" onload="this.rel='stylesheet'">
<!--	<link rel="stylesheet" type="text/css" href="//www.travelpayouts.com/mewtwo_a/styles.css--><?//= $randSfx ?><!--" />-->

	<link rel="stylesheet" type="text/css" href="css/layout-stars.css<?= $randSfx ?>" />
	<link rel="stylesheet" type="text/css" href="css/style-stars.css<?= $randSfx ?>" />

    <link href="https://www.aviafox.com/favicon.ico?v=2" rel="icon" type="image/x-icon">
    <link href="https://www.aviafox.com/favicon.ico?v=2" rel="shortcut icon" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="css/style-tpwl.css<?= $randSfx ?>" />
	<link rel="stylesheet" type="text/css" href="css/colors.css<?= $randSfx ?>" />

    <link href="https://www.travelpayouts.com/mewtwo/styles.css" rel="stylesheet" type="text/css">

<!--	<link rel="stylesheet" type="text/css" href="css/head-style-id.css--><?//= $randSfx ?><!--" />-->
    <style id="tpwl-css-header" type="text/css">body .TPWL-template-header{background:#92cad8;}body .TPWL-header-content{background:#92cad8;}body .TPWL-header-content__descrition{color:#fff;}body .TPWL-header-content .TPWL-header-content__label{color:#fff;}</style>

	<link rel="stylesheet" type="text/css" href="css/head-style.css<?= $randSfx ?>" />
	<link rel="stylesheet" type="text/css" href="css/form.css<?= $randSfx ?>" />

    <style type="text/css">
        .TPWL-widget .expired-search-plate {
            display: <?= isset($_GET['expired_results']) ? 'inherit' : 'none' ?>;
        }
    </style>

</head>
<body>

<div class="image">
    <img src="/wl/img/sky-stars.jpg" />
</div>

<header>
    <section class="top-bar">
        <div class="logo">
            <a href="https://www.aviafox.com"><img src="/wl/img/logo-320x154.png" alt="Aviafox.com logo" title="Aviafox.com - поисковик авиабилетов" /></a>
        </div>
        <div class="site-title">ПОИСКОВИК АВИАБИЛЕТОВ</div>
    </section>
</header>

<? include 'content.php' ?>

<footer>
	<div class="footer-copyright">AviaFox © 2016</div>
    <div class="footer-description">Поиск и бронирование дешёвых авиабилетов и отелей</div>    	
</footer>

</body>
</html>