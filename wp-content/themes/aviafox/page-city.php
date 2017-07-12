<?php
/*
Template Name: City
*/
/* @var $wp_query WP_Query */

require 'app.php';

require_once MDLD . '/City/Data/Russians.php';
$data = new City\Data\Russians();

$link = trim(get_page_link(get_the_ID()), "/");
$linkParts = explode('/', $link);
$cityName = $linkParts[count($linkParts) - 1];

$object = $data->findUri($cityName);
$object->loadData();

$wp_query->query_vars['city'] = $object;
$wp_query->query_vars['pageTitle'] = 'Купить авиабилеты дешево в город ' . $object->getTitle() . ' на сайте aviafox.com';
$wp_query->query_vars['pageDescription'] = 'Мы поможем Вам найти самые дешевые авиабилеты в город ' . $object->getTitle()
                                         . '. Предложения от всех авиакомпаний.';

$H1 = 'Дешевые авиабилеты. Город ' . $object->getTitle() . '.';

add_action('wp_head', function(){ ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/layout.css?v=5.0" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/city/styles.css?v=5.0" />
<? });

get_header('base');
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
        <?php
        require_once MDLD . '/TP/Widget/HotelsMap.php';
        $widget = new TP\Widget\HotelsMap($object->getCode());
        echo $widget->render();
        ?>
    </section>

</main>

<?php get_footer();