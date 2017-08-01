<section class="route-content">
	<?php
	add_filter('the_content', function ($content)
    {
        global $wp_query;

        /* @var $route Route */
		$route = $wp_query->query_vars['route'];

		$content = str_replace('[ROUTE_TITLE]', $route->getTitle(), $content);

	    return $content;
    });

	while ( have_posts() ) : the_post();
		get_template_part('template-parts/page/content', 'page');
	endwhile;
	?>
</section>