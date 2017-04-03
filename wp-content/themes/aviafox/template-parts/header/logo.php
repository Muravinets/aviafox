<div class="logo">
<?php if (is_front_page()) : ?>
    <?php get_template_part('template-parts/header/logo', 'image') ?>
<?php else : ?>
    <a href="<?php echo esc_url(home_url('/')) ?>"><?php get_template_part('template-parts/header/logo', 'image') ?></a>
<?php endif ?>
</div>