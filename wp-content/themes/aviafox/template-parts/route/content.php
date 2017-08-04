<section class="route-content">
	<?php
	while ( have_posts() ) : the_post();
		get_template_part('template-parts/page/content', 'page');
	endwhile;
	?>
</section>