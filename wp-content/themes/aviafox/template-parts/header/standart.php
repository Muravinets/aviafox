<?php get_template_part('template-parts/counter/all') ?>
<?php get_template_part('template-parts/header/image') ?>

<header>
	<section class="top-bar">
		<?php get_template_part('template-parts/header/logo') ?>
		<div class="site-title">ПОИСКОВИК АВИАБИЛЕТОВ</div>
	</section>
</header>

<? if (!isset($noSearchForm)) :
    get_template_part('template-parts/searchform/container');
endif;