<?php
/*
Template Name: Country
*/
/* @var $wp_query WP_Query */

require 'app.php';

require_once MDLD . '/Country/Data.php';

$data = new \Country\Data;

$link = trim(get_page_link(get_the_ID()), "/");
$linkParts = explode('/', $link);
$countryName = $linkParts[count($linkParts) - 1];

$object = $data->findUri($countryName);
$object->loadData();

$wp_query->query_vars['object'] = $object;

$H1 = 'Купить билет на самолет в ' . $object->getTitleDestination();

add_action('wp_head', function(){ ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/country/layout.css?v=5.0" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/assets/css/country/styles.css?v=5.0" />
<? });

get_header('base');
?>
<main class="page-country">
    <h1><?php echo $H1 ?></h1>

    <section class="content">
    <?php
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/page/content', 'page' );
    endwhile; // End of the loop.
    ?>
    </section>

    <?php get_template_part('template-parts/country/popular-destinations') ?>

    <section class="content">
        <h2>Аэропорты</h2>
        <p>
            Купить авиабилет в Россию – просто, ведь в стране действует более 1200 аэропортов, из которых 70 – международные. Шереметьево в Москве – это один из самых крупных аэропортов России, также Пулково в Санкт-Петербурге и Домодедово в Москве. В пятерку крупнейших аэропортов также входят Храброво в Калининграде и Кольцово в Екатеринбурге.
        </p>
    </section>
    <section class="content" style="background-color: white;">
        <h2>Авиакомпании</h2>
        <p>
            В России действуют более ста национальных авиакомпаний. Самыми крупными авиакомпаниями являются Аэрофлот, Трансаэро, ЮТэйр, Сибирь (S7 Airlines), Уральские авиалинии, Россия. Помимо национальных авиакомпаний, существуют и иностранные авиакомпании, предлагающие дешевые перелеты и авиабилеты из и в Россию. Наиболее популярными являются авиакомпании Air Berlin, Turkish Airlines, Alitalia, Air France,  Qatar Airlines, British Airlines и другие. Авиаперевозчики часто предлагают акции, скидки и специальные предложения на рейсы в зависимости от сезона.
        </p>
    </section>
    <section class="content">
        <h2>Транспорт</h2>
        <p>
            По всей России действует система общественного транспорта. Из любого аэропорта вы можете добраться на автобусе, маршрутке или такси. В Москве циркулирует аэроэкспресс, который доставляет пассажиров из аэропорта в центр города.
        </p>
    </section>
    <section class="content" style="background-color: white;">
        <h2>Связь</h2>
        <p>
            В России действует мобильная система связи. Наиболее популярные операторы связи – МТС и Билайн. Международные и туристические SIM-карты – GlobalSim, Goodline. Между различными регионами действует роуминг. Средняя цена SIM- карты – 500 рублей. Во всех густонаселенных районах действует покрытие 3-G и 4-G мобильного интернета.
        </p>
    </section>
    <section class="content">
        <h2>Виза</h2>
        <p>
            Для путешествия по России иностранным гражданам нужна виза. Виза с однократным или двукратным въездом выдается для путешествий до 30 дней. Для получения визы иностранному гражданину следует получить туристическое приглашение из России и с ним обратиться в Консульство РФ за рубежом. Иностранному туристу могут понадобиться следующие документы:
        </p>
        <ul>
            <li>Туристическое приглашение в Россию</li>
            <li>Паспорт (документ, подтверждающий личность)</li>
            <li>2 Фотографии на визу</li>
            <li>Медицинская страховка</li>
            <li>Заполненная анкета консульства</li>
        </ul>
    </section>
    <section class="content" style="background-color: white;">
        <h2>Деньги</h2>
        <p>
            По всей России действует единая валюта – российский рубль (RUB), расплатиться другой валютой турист сможет только в крупных туристических центрах, но для покупок все же лучше обменять валюту. Обратите внимание, в России в ходу карты Master Card и VISA. Остальные популярностью не пользуются.
        </p>
    </section>

</main>

<?php get_footer();