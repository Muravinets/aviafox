<?php
$cities = [
    'SIP', // Симферополь
    'AER', // Сочи
    'MOW', // Москва
    'DXB', // Дубай
    'CAN', // Гуанчжоу
    'KUL', // Куала-Лумпур
];

/* @var $wp_query WP_Query */
$wp_query->query_vars['popularDestinationsCities'] = $cities;

get_template_part('template-parts/popular-destinations');