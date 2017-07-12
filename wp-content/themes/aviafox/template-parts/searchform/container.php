<?php
require_once __DIR__ . '/../../../../../models/SearchForm.php';

if (isset($searchForm)) {
	$form = $searchForm;
} else {
	$form = new SearchForm();
}

$markerParam = 'shmarker=' . $form->getMarker();

?><div class="search-form">
    <div class="twidget-container" id="twidget-container">
        <!-- start widget-->
        <div class="twidget-tabs">
            <!--select tabs-->
            <nav class="twidget-tab-links">
                <ul class="clearfix">
                    <li id="twidget-flight-li" class="active">
                        <a href="#twidget-tab1"><i class="fa fa-plane"></i><span>Авиабилеты</span></a>
                    </li>
                    <li id="twidget-hotel-li">
                        <a href="#twidget-tab2"><i class="fa fa-hotel"></i><span>Отели</span></a>
                    </li>
                    <li id="twidget-insurance-li">
                        <a target="_blank"
                           href="http://c24.travelpayouts.com/click?<?= $markerParam ?>&promo_id=519&source_type=link&type=click"
                            ><i class="fa fa-i-insurance"></i><span>Страховка</span></a>
                    </li>
                    <li id="twidget-rentacar-li">
                        <a target="_blank"
                           href="http://c13.travelpayouts.com/click?<?= $markerParam ?>&promo_id=153&source_type=link&type=click"
                            ><i class="fa fa-i-rent-a-car"></i><span>Авто</span></a>
                    </li>
                    <li id="twidget-tours-li">
                        <a target="_blank"
                           href="http://c26.travelpayouts.com/click?<?= $markerParam ?>&promo_id=554&source_type=link&type=click"
                            ><i class="fa fa-i-suitcase"></i><span>Туры</span></a>
                    </li>
                    <li id="twidget-excursions-li">
                        <a target="_blank"
                           href="http://c14.travelpayouts.com/click?<?= $markerParam ?>&promo_id=199&source_type=link&type=click"
                            ><i class="fa fa-i-travel-23-512"></i><span>Экскурсии</span></a>
                    </li>
                    <li id="twidget-excursions-li">
                        <a target="_blank"
                           href="http://c1.travelpayouts.com/click?<?= $markerParam ?>&promo_id=647&source_type=customlink&type=click&custom_url=https%3A%2F%2Fkiwitaxi.ru"
                           title="Автомобильные трансферы по всему миру"
                            ><i class="fa fa-i-taxi"></i><span>Трансферы</span></a>
                    </li>
                </ul>
            </nav>
            <!-- tabs -->
            <div class="twidget-tab-content">
				<?php include 'avia.php' ?>
				<?php include 'hotel.php' ?>
            </div>
            <!--end tab content-->
        </div>
        <!--end widget -->
    </div>
    <script>
        $('#twidget-container').twidget(<?php echo json_encode($form->getJSParams()) ?>);
    </script>

	<?php
//	require_once MDLD . '/Ticker/View/Widget.php';
//
//	$widget = new \Ticker\View\Widget;
//	$widget->render();
	?>

</div>