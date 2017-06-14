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

$cities = [
    $route->getDeparture()->getCode(),
	$route->getDestination()->getCode(),
] + $cities;

/* @var $wp_query WP_Query */
$wp_query->query_vars['popularDestinationsCities'] = $cities;
$wp_query->query_vars['popularDestinationsTitle'] = 'Популярные направления';

get_template_part('template-parts/popular-destinations');