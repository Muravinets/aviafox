<?php

define('MDLD', __DIR__ . '/../../../models');

/* @var $wp_query WP_Query */
$wp_query->query_vars['noSearchForm'] = true;

get_header('base');
?>
<main>
    <h1><?php the_title() ?></h1>

    <?php
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/page/content', 'page' );
    endwhile; // End of the loop.
    ?>
</main>

<?php get_footer();