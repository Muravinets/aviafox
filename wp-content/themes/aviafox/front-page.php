<?php
define('MDLD', __DIR__ . '/../../../models');

get_header('home');
?>

<main>
    <section class="recomendations">
        <h2>Чтобы найти самые дешевые авиабилеты, Вам нужно:</h2>
        <div class="row">
            <div class="flex-item">
                <div class="col-content">Ввести город вылета&nbsp;/&nbsp;прибытия</div>
            </div>

            <div><i class="fa"></i></div>
            <div class="flex-item">
                <div class="col-content">Желаемые даты вылета туда; туда&nbsp;/&nbsp;обратно</div>
            </div>

            <div><i class="fa"></i></div>
            <div class="flex-item">
                <div class="col-content">Выбрать количество пассажиров</div>
            </div>

            <div><i class="fa"></i></div>
            <div class="flex-item">
                <div class="col-content">Нажать кнопку <span style="font-weight: bold; ">НАЙТИ&nbsp;БИЛЕТЫ</span></div>
            </div>
        </div>
    </section>

	<?php get_template_part('template-parts/home/content') ?>
	<?php get_template_part('template-parts/home/avia', 'partners') ?>
</main>

<?php get_footer();