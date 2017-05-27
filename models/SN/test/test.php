<?
include 'config.php';
/* @var $title string */
/* @var $ogTitle string */
/* @var $description string */
/* @var $ogDescription string */

?><!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $title ?></title>
	<meta name="description" content="<?= $description ?>" />

	<link href="/favicon.ico" rel="icon" type="image/x-icon" />
	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<meta property="og:title" content="<?= $ogTitle ?>"/>
    <meta property="og:description" content="<?= $description ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="https://www.aviafox.com/models/SN/test/index.php"/>
	<meta property="og:site_name" content="Aviafox.com"/>
<!--	<meta property="fb:admins" content="USER_ID"/>-->

	<? $logoName = isset($_GET['logo_name']) ? $_GET['logo_name'] : 'logo-bg.jpg' ?>
    <meta property="og:image" content="https://www.aviafox.com/web/images/<?= $logoName ?>"/>

<!--    <meta property="og:image" content="https://www.aviafox.com/web/images/logo-square_256.jpg"/> <!-- для Viber -->-->
<!--    <meta property="og:image" content="https://www.aviafox.com/web/images/logo-rectangle.jpg"/>-->
<!--    <meta property="og:image" content="https://www.aviafox.com/web/images/logo-square_256.jpg"/> <!--Last. Telegram, WhatsApp-->-->

</head>
<body>
	<h1>Test Social Networks Content</h1>
</body>
</html>