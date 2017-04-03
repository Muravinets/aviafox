<?php
/* @var $city \City\Object */

require_once MDLD . '/TP/Widget/SpecialOffers.php';
$widget = new TP\Widget\SpecialOffers();
$widget
    ->setDeparture($city)
    ->setLimit(9)
;

?><section class="special-offers">
    <h2>Спецпредложения авиакомпаний</h2>
    <?php echo $widget->render() ?>
</section>