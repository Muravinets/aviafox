<?php
/* @var $route Route */

$cities = [
    'MOW' => 'MOW',
    'LED' => 'LED',
    'KZN' => 'KZN',
    'AER' => 'AER',
    'KRR' => 'KRR',
    'SVX' => 'SVX',
];

unset($cities[$route->getDeparture()->getCode()]);
unset($cities[$route->getDestination()->getCode()]);

while (count($cities) > 2) {
	array_pop($cities);
}

require_once MDLD . '/TP/Widget/PopularDestinations.php';
?>
<section class="popular-destinations">
	<h2>Популярные направления</h2>
	<ul>
		<li>
			<?php echo (new TP\Widget\PopularDestinations($route->getDeparture()->getCode()))->render() ?>
		</li>
		<li>
			<?php echo (new TP\Widget\PopularDestinations($route->getDestination()->getCode()))->render() ?>
		</li>
        <? foreach ($cities as $cityCode) : ?>
		<li>
			<?php echo (new TP\Widget\PopularDestinations($cityCode))->render() ?>
		</li>
        <? endforeach ?>
	</ul>
</section>
