<?php
require_once __DIR__ . '/../../../../../models/SearchForm.php';

if (isset($searchForm)) {
	$form = $searchForm;
} else {
	$form = new SearchForm();
}

?><div class="search-form">
    <div class="twidget-container" id="twidget-container">
        <!-- start widget-->
        <div class="twidget-tabs">
            <!--select tabs-->
            <nav class="twidget-tab-links">
                <ul class="clearfix">
                    <li id="twidget-flight-li" class="active">
                        <a href="#twidget-tab1"><i class="fa fa-plane"></i>Авиабилеты</a>
                    </li>
                    <li id="twidget-hotel-li">
                        <a href="#twidget-tab2"><i class="fa fa-hotel"></i>Отели</a>
                    </li>
                    <li id="twidget-insurance-li">
                        <a target="_blank"
                           href="http://c24.travelpayouts.com/click?shmarker=65544&promo_id=519&source_type=link&type=click"
                            >Страховка</a>
                    </li>
                    <li id="twidget-rentacar-li">
                        <a target="_blank"
                           href="http://c13.travelpayouts.com/click?shmarker=65544&promo_id=153&source_type=link&type=click"
                            >Авто</a>
                    </li>
                    <li id="twidget-rentacar-li">
                        <a target="_blank"
                           href="http://c26.travelpayouts.com/click?shmarker=65544&promo_id=554&source_type=link&type=click"
                            >Туры</a>
                    </li>
                    <li id="twidget-rentacar-li">
                        <a target="_blank"
                           href="http://c14.travelpayouts.com/click?shmarker=65544&promo_id=199&source_type=link&type=click"
                            >Экскурсии</a>
                    </li>
                </ul>
            </nav>
            <!-- tabs -->
            <div class="twidget-tab-content">
				<?php get_template_part( 'template-parts/searchform/avia') ?>
				<?php get_template_part( 'template-parts/searchform/hotel') ?>
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