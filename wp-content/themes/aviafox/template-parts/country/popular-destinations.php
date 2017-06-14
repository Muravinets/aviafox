<?php
$cities = [
	'MOW',
	'LED',
	'SIP',
];

/* @var $wp_query WP_Query */
$wp_query->query_vars['popularDestinationsCities'] = $cities;
$wp_query->query_vars['popularDestinationsTitle'] = 'Популярные направления';

get_template_part('template-parts/popular-destinations');