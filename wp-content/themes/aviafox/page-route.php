<?php
/*
Template Name: Route
*/
/* @var $wp_query WP_Query */
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

$wp_query->query_vars['pageTitle'] =
    'Найти дешевые авиабилеты по направлению ' . $route->getTitle() . ' поможет aviafox.com';
$wp_query->query_vars['pageDescription'] =
	'Aviafox.com находит самые дешевые варианты перелета по направлению ' . $route->getTitle() . '.' .
	' Удобный поиск находит скидки и льготные авиабилеты.'
;

$H1 = 'Направление ' . $route->getTitle();

add_action('wp_head', function(){ ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/route/layout.css?v=5.0" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/route/styles.css?v=5.0" />
<? });

get_header('base');
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