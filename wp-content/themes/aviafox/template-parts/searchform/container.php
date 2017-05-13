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