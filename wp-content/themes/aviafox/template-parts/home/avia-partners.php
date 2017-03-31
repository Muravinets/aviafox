<?php
require __DIR__ . '/../../../../../models/AviaPartner/Data.php';
$dataPartners = new AviaPartner\Data();
?>
<section class="partners">
    <h2>Авиакомпании</h2>
    <ul>
<?php
    /* @var $partner AviaPartner\Object */
    foreach ($dataPartners->getAll() as $partner) { ?>
        <li><?php echo $partner->getLogoHtml()?></li>
<?php } ?>
    </ul>
</section>