<?php
require_once MDLD . '/Ticket.php';
require_once MDLD . '/TP/API/TicketPrices/Request.php';

use TP\API\TicketPrices\Request;

/* @var $city \City\Object */

$request = new Request();
$request
	->setOrigin($city->getCode())
;
/* @var $pricesResponse \TP\API\TicketPrices\Response */
$pricesResponse = $request->send();
$pricesOrigin = $pricesResponse->list;

$request = new Request();
$request->setDestination($city->code);
/* @var $pricesResponse \TP\API\TicketPrices\Response */
$pricesResponse = $request->send();
$pricesDestination = $pricesResponse->list;

?>
<section class="city-cheapest">
	<h2>Самые дешевые авиабилеты за последние 2-е суток</h2>
	<ul class="cols">
		<li>
			<h3>В <?php echo $city->getTitle() ?></h3>
			<ul class="tickets-list">
				<?php
				$counter = 0;
				/* @var $ticket Ticket */
				foreach ($pricesDestination as $ticket) {
					if (!$ticket->origin->isRussian())
					{
						continue;
					}
					?>
					<li>Из <?php echo $ticket->origin->getTitle() ?> от <?php echo $ticket->value ?> рублей (прямой рейс)</li>
					<?php
					$counter++;
					if ($counter > 9) {
						break;
					}
				} ?>
			</ul>
		</li>
		<li>
			<h3>Из <?php echo $city->getTitle() ?></h3>
			<ul class="tickets-list">
				<?php
				$counter = 0;
				/* @var $ticket Ticket */
				foreach ($pricesOrigin as $ticket)
				{
					if (!$ticket->destination->isRussian())
					{
						continue;
					}?>
					<li>В <?php echo $ticket->destination->getTitle() ?> от <?php echo $ticket->value ?> рублей (прямой рейс)</li>
					<?php
					$counter++;
					if ($counter > 9) {
						break;
					}
				} ?>
			</ul>
		</li>
	</ul>
</section>