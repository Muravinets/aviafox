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

		        // If comments are open or we have at least one comment, load up the comment template.
		        if ( comments_open() || get_comments_number() ) :
			        comments_template();
		        endif;

	        endwhile; // End of the loop.
	        ?>
        </section>
    </section>

</main>

<?php get_footer();