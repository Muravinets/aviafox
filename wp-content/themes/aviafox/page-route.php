<?php
/*
Template Name: Route
*/
/* @var $wp_query WP_Query */

require 'app.php';

require_once MDLD . '/City/Data.php';
$data = new City\Data();

//		echo '<pre>';
//		var_dump($wp_query->query_vars);
//		echo '</pre>';
//		exit;

if (isset($wp_query->query_vars['WP_Route']) && $wp_query->query_vars['WP_Route'] == 'wp-router-pageroute')
{
    $departureName = $wp_query->query_vars['route_departure_name'];
    $destinationName = $wp_query->query_vars['route_destination_name'];
}
else
{
	$link          = trim( get_page_link( get_the_ID() ), "/" );
	$linkParts     = explode( '/', $link );
	$departureName = $linkParts[ count( $linkParts ) - 2 ];
    $destinationName = $linkParts[count($linkParts) - 1];
}

// Determine departure
$departure = $data->findUri($departureName);
// Determine destination
$destination = $data->findUri($destinationName);

require_once MDLD . '/Route.php';
$route = new Route($departure, $destination);
$wp_query->query_vars['route'] = $route;

add_shortcode('ROUTE_TITLE', function() {
    global $wp_query;
    /* @var $route Route */
	$route = $wp_query->query_vars['route'];
	return $route->getTitle();
});

add_filter( 'aioseop_title', 'do_shortcode' );
add_filter( 'aioseop_description', 'do_shortcode');
add_filter( 'aioseop_canonical_url', function ($url)
{
	global $wp_query;
	/* @var $route Route */
	$route = $wp_query->query_vars['route'];

    $url = str_replace('route-page', 'routes', $url);
    return rtrim($url, "/") . '/' . $route->getDeparture()->getUriName() . '/' . $route->getDestination()->getUriName();
} );

require_once MDLD . '/SearchForm.php';
$searchForm = new SearchForm();
$searchForm
    ->setOriginCode($departure->getCode())
    ->setDestinationCode($destination->getCode())
;
$wp_query->query_vars['searchForm'] = $searchForm;

$H1 = 'Направление ' . $route->getTitle();

add_action('wp_head', function()
{
	$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5.1');
    ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/route/layout.css?v=<?= $styleVersion ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/route/styles.css?v=<?= $styleVersion ?>" />
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