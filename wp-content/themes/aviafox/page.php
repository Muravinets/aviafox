<?php

define('MDLD', __DIR__ . '/../../../models');

//$wp_query->query_vars['title'] = 'Aviafox.com - Согласие с рассылкой';
$wp_query->query_vars['pageTitle'] = 'Aviafox.com - ' . get_the_title();

$H1 = 'Согласие с рассылкой';

get_header('page');
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