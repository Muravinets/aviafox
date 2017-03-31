<?php
/*
Template Name: Cities
*/
?>
<?php
define('MDLD', __DIR__ . '/../../../models');
$isPageCities = true;

require_once MDLD . '/City/Data/Russians.php';
$data = new City\Data\Russians();

$cities = $data->getList('title');
ksort($cities);

?>
<?php
get_header('cities'); ?>

<main>
	<section class="catalog">
		<h2>Список городов</h2>
		<p>
			На этой странице указаны города, в которые Вы можете отправиться в любой день недели, в любое время года. Мы поможем Вам найти любой авиа перелет, если он существует. Aviafox.com – ищет все варианты перелетов, включая дешевые авиабилеты по акции, скидки, чартерные рейсы, если они есть в продаже.
		</p>
		<ul>
			<?php
			/* @var $object \City\Object */
			foreach ($cities as $object) {
				?>
				<li><?php
					echo $object->hasData() ? '<a href="' . $object->getUri() . '">' . $object->getTitle() . '</a>' : $object->getTitle();
					?></li>
			<?php } ?>
		</ul>
	</section>
</main>

<?php get_footer();