<?php

define('MDLD', __DIR__ . '/../../../models');

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