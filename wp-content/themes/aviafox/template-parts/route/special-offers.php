<?php
/* @var $route Route */

require_once MDLD . '/TP/Widget/SpecialOffers.php';
$widget = new TP\Widget\SpecialOffers();
$widget
    ->setDeparture($route->getDeparture())
    ->setDestination($route->getDestination())
    ->setLimit(7)
    ->setWidgetType('brickwork')
;

?><section class="special-offers">
    <h2>Спецпредложения авиакомпаний</h2>
    <?php echo $widget->render() ?>
</section>