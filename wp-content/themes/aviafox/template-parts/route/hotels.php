<?php
/* @var $route Route */

require_once MDLD . '/TP/Widget/Hotels.php';
?>
<section class="hotels">
	<h2>Подборка отелей</h2>
	<?php echo (new TP\Widget\Hotels($route->getDestination()->getCode()))->render() ?>
</section>
