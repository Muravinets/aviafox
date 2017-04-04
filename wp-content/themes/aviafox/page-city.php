<?php
/*
Template Name: City
*/

define('MDLD', __DIR__ . '/../../../models');

require_once MDLD . '/City/Data/Russians.php';
$data = new City\Data\Russians();

$link = trim(get_page_link(get_the_ID()), "/");
$linkParts = explode('/', $link);
$cityName = $linkParts[count($linkParts) - 1];

$object = $data->findUri($cityName);
$object->loadData();

$wp_query->query_vars['city'] = $object;

$H1 = 'Дешевые авиабилеты. Город ' . $object->getTitle() . '.';

get_header('city');
?>
<main class="city-page">
    <h1><?php echo $H1 ?></h1>

    <section class="intro">
        <section class="city-content">
	        <?php
	        while ( have_posts() ) : the_post();
		        get_template_part( 'template-parts/page/content', 'page' );
	        endwhile; // End of the loop.
	        ?>
        </section>
    </section>

    <?php //if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') get_template_part('template-parts/city/cheaptickets') ?>
    <?php //locate_template('template-parts/city/cheaptickets.php', true); ?>

	<?php get_template_part('template-parts/city/special-offers') ?>

    <section class="city-hotels-map">
        <h2>Карта отелей <?php echo $object->titleFrom ?></h2>
        <iframe src="//maps.avs.io/hotels?color=%2300b1dd&locale=ru&marker=65544.hotelsmap&changeflag=0&draggable=true&map_styled=false&map_color=%2300b1dd&contrast_color=%23FFFFFF&disable_zoom=false&base_diameter=16&scrollwheel=false&host=hotellook.ru&zoom=12&city_iata=<?php echo $object->getCode() ?>" height="400px" width="100%"  scrolling="no" frameborder="0"></iframe>
    </section>

</main>

<?php get_footer();