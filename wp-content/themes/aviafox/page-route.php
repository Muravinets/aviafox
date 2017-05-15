<?php
/*
Template Name: Route
*/

define('MDLD', __DIR__ . '/../../../models');

require_once MDLD . '/City/Data.php';
$data = new City\Data();

$link = trim(get_page_link(get_the_ID()), "/");
$linkParts = explode('/', $link);

// Determine departure
$departureName = $linkParts[count($linkParts) - 2];
$departure = $data->findUri($departureName);

// Determine destination
$destinationName = $linkParts[count($linkParts) - 1];
$destination = $data->findUri($destinationName);

require_once MDLD . '/Route.php';
$route = new Route($departure, $destination);
$wp_query->query_vars['route'] = $route;

require_once MDLD . '/SearchForm.php';
$searchForm = new SearchForm();
$searchForm
    ->setOriginCode($departure->getCode())
    ->setDestinationCode($destination->getCode())
;
$wp_query->query_vars['searchForm'] = $searchForm;

$H1 = 'Направление ' . $route->getTitle();

get_header('route');
?>
<main class="route-page">
    <h1><?php echo $H1 ?></h1>

	<?php get_template_part('template-parts/route/content') ?>
	<?php get_template_part('template-parts/route/popular-destinations') ?>
	<?php get_template_part('template-parts/subscribe/form') ?>
	<?php get_template_part('template-parts/route/special-offers') ?>
	<?php get_template_part('template-parts/route/hotels') ?>

</main>

<?php get_footer();