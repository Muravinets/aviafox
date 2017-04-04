<?php
/*
Template Name: Countries
*/

define('MDLD', __DIR__ . '/../../../models');

require_once MDLD . '/Country/Data.php';

use \Country\Data;
use \Country\Object;

$list = Data::getInstance()->getAll();

// Alphabetical sorting
uasort($list, function (Object $a, Object $b) {
	return strcmp($a->getTitle(), $b->getTitle());
});

get_header('countries');
?>

<main>
    <h1>Все страны</h1>

	<section class="catalog">
        <p>
            На этой странице указаны страны, в которые Вы можете отправиться в любой день недели, в любое время года. Мы поможем Вам найти любой авиа перелет, если он существует. Aviafox.com – ищет все варианты перелетов, включая дешевые авиабилеты по акции, скидки, чартерные рейсы, если они есть в продаже.
        </p>
		<ul>
			<?php
			/* @var $object \Country\Object */
			foreach ($list as $object) : ?>
            <li><?php
                echo $object->hasData() ? '<a href="' . $object->getUri() . '">' . $object->getTitle() . '</a>' : $object->getTitle();
            ?></li>
			<?php endforeach ?>
		</ul>
	</section>
</main>

<?php get_footer();