<?php
/* @var $popularDestinationsCities string[] */
$cities = $popularDestinationsCities;

/* @var $popularDestinationsTitle string */
//if (!isset($popularDestinationsTitle)) {
//	$popularDestinationsTitle = 'Популярные направления';
//}

$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5');

require_once MDLD . '/TP/Widget/PopularDestinations.php';
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/popular-destinations.css<?= $styleVersion ?>" media="all" />
<section class="popular-destinations">
	<? if (isset($popularDestinationsTitle)) : ?>
	<h2><?= $popularDestinationsTitle ?></h2>
	<? endif; ?>
	<ul>
	<? foreach ($cities as $cityCode) : ?>
		<li>
			<?= (new TP\Widget\PopularDestinations($cityCode))->render() ?>
		</li>
	<? endforeach ?>
	</ul>
</section>