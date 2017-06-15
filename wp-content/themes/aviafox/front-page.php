<?php
define('MDLD', __DIR__ . '/../../../models');

get_header('home');
?>

<main>

    <? get_template_part('template-parts/home/popular-destinations') ?>
    <? get_template_part('template-parts/sn/widget') ?>
	<? get_template_part('template-parts/subscribe/form') ?>

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

	<? get_template_part('template-parts/home/content') ?>

	<? get_template_part('template-parts/home/avia', 'partners') ?>
</main>

<? get_footer();