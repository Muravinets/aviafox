<?php
require 'app.php';

get_header('home');
?>
<main>
    <? get_template_part('template-parts/home/popular-destinations') ?>
    <? get_template_part('template-parts/sn/widget') ?>
	<? get_template_part('template-parts/subscribe/form') ?>
	<? get_template_part('template-parts/home/recommendations') ?>
	<? get_template_part('template-parts/home/content') ?>
	<? get_template_part('template-parts/home/avia', 'partners') ?>
</main>

<? get_footer();