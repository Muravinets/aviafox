<?php
require_once MDLD . '/TP/Widget/PopularDestinations.php';

?>
<section class="country-popular-destinations">
    <h2>Популярные направления</h2>
    <ul>
        <li>
            <?php echo (new TP\Widget\PopularDestinations('MOW'))->render() ?>
        </li>
        <li>
            <?php echo (new TP\Widget\PopularDestinations('LED'))->render() ?>
        </li>
        <li>
            <?php echo (new TP\Widget\PopularDestinations('SIP'))->render() ?>
        </li>
    </ul>
</section>
