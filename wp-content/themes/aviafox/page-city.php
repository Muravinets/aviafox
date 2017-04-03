<?php
/*
Template Name: City
*/
?>
<?php
define('MDLD', __DIR__ . '/../../../models');

require_once MDLD . '/City/Data/Russians.php';
$data = new City\Data\Russians();

$object = $data->findUri('moscow');
$wp_query->query_vars['city'] = $object;

$H1 = 'Дешевые авиабилеты. Город ' . $object->getTitle() . '.';
?>
<?php get_header('city') ?>
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

    <?php if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') get_template_part('template-parts/city/cheaptickets') ?>
    <?php //locate_template('template-parts/city/cheaptickets.php', true); ?>

</main>

<?php get_footer();