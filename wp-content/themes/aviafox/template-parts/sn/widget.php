<?php

require_once MDLD . '/SN/View/Widget.php';
$widget = new \SN\View\Widget;
if (is_front_page()) :
	$widget->setTitle('Понравился сервис? Расскажи о нас друзьям.');
endif;

$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5');
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/sn.css<?= $styleVersion ?>" media="all" />
<? $widget->render();
