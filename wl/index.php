<!DOCTYPE html>
<html lang="ru">
<head>

	<meta charset="utf-8"/>
	<title>Поисковик авиабилетов</title>
	
	<link rel="stylesheet" type="text/css" href="http://fresh.aviafox.com/main.css?r=0.22104153468856458" />
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style-tpwl.css" />
	<link rel="stylesheet" type="text/css" href="css/head-style-id.css" />
	<link rel="stylesheet" type="text/css" href="//www.travelpayouts.com/mewtwo_a/styles.css" />
	<link rel="stylesheet" type="text/css" href="css/head-style.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	
</head>
<body>

<header>
    <section class="image">
    	<img src="//aviafox.com/web/images/img-05.jpg" />
    </section>
	<section class="top-bar">
        <section class="logo">
        	<img src="//aviafox.com/web/images/logo-320x154.png" alt="Afiafox logo" />
        </section>	
		<section class="subtitle">Поисковик авиабилетов</section>
    </section>	
</header>

<div class="TPWL-widget">
	<div class="TPWL-wl_content TPWL_widget--m TPWL_sticky_informer--over660 TPWL_sticky_informer--over500" style="position: relative;"> 
    	<div class="TPWL-template-wrapper">
            <div class="TPWL-template-header js-header" style="top: inherit;">
	            <div class="TPWL-template-header-content">
	            	<div id="tpwl-main-form">
						<div class="mewtwo-flights--l mewtwo-hotels--l" style="position: relative;">
							<div class="mewtwo-widget mewtwo-widget--whitelabel_ru">
							
	<nav class="mewtwo-tabs ">
		<ul class="mewtwo-tabs_list">
			<li class="mewtwo-tabs-tabs_list__item mewtwo-tabs-tabs_list__item--count2 mewtwo-tabs-tabs_list__item--flights mewtwo-tabs-tabs_list__item--active">
				<span>Авиабилеты</span>
			</li>
			<li class="mewtwo-tabs-tabs_list__item mewtwo-tabs-tabs_list__item--count2 mewtwo-tabs-tabs_list__item--hotels">
				<span>Отели</span>
			</li>
		</ul>
	</nav>
	
    <section class="mewtwo-flights mewtwo-tabs-container">
    	<div class="mewtwo-flights-container">
    		<form accept-charset="utf-8" id="flights-form-whitelabel_ru" action="http://fresh.aviafox.com/flights" target="_self">
    			<div>
    				<input type="hidden" name="marker" value="65544.$13">
    			</div>
				<div class="mewtwo-flights-origin">
					<label for="flights-origin-prepop-whitelabel_ru">Город вылета</label>
					<input type="text" name="origin_name" class="mewtwo-filled" required="" id="flights-origin-prepop-whitelabel_ru">
							
					<input type="hidden" name="origin_iata" id="flights-origin-whitelabel_ru" value="SVO">
					<div class="mewtwo-flights-origin-country" style="visibility: visible;">
						<span class="mewtwo-flights-origin-country__pseudo">Москва</span>
						<span class="mewtwo-flights-origin-country__name">,&nbsp;Россия</span>
					</div>
					<div class="mewtwo-flights-origin__iata">SVO</div>
					<div class="mewtwo-autocomplete-spinner"><div></div><div></div><div></div></div>
				</div>
            	<!--PlaceInput-->
            	<div class="mewtwo-flights-destination">
            		<label for="flights-destination-prepop-whitelabel_ru">Город прибытия</label>
            		<input type="text" name="destination_name"
            			autocomplete="off" required=""
            			id="flights-destination-prepop-whitelabel_ru"
            			placeholder="Название города или код аэропорта"
            			data-label="Город прибытия" role="flights-destination"
            			data-modal-modifier="whitelabel_ru"
            			data-placeholder-initialized="true" class="mewtwo-filled">
            		<input type="hidden" name="destination_iata" id="flights-destination-whitelabel_ru" value="SVX">
            		<div class="mewtwo-flights-destination-country" style="visibility: visible;">
            			<span class="mewtwo-flights-destination-country__pseudo">Екатеринбург</span>
            			<span class="mewtwo-flights-destination-country__name">,&nbsp;Россия</span>
            		</div>
            		<div class="mewtwo-flights-destination__iata">SVX</div>
            		<div class="mewtwo-autocomplete-spinner"><div></div><div></div><div></div></div>
            	</div>
            	<!--PlaceInput-->
            	<div class="mewtwo-flights-dates">
            		<div class="mewtwo-flights-dates-depart ">
            			<label for="flights-dates-depart-prepop-whitelabel_ru">Туда</label><input
            				type="text" placeholder="Туда" data-label="Туда"
            				id="flights-dates-depart-prepop-whitelabel_ru"
            				data-datepicker-sameday="false"
            				data-modal-modifier="whitelabel_ru"
            				role="flights-dates-depart" data-popup-max-height="246"
            				data-popup-min-height="184"
            				data-linked-id="flights-dates-return-prepop-whitelabel_ru"
            				class="mewtwo-datepicker-trigger mewtwo-filled"
            				readonly="true" data-placeholder-initialized="true"><input
            				type="hidden" role="flights-dates-depart-value"
            				value="2016-12-20"
            				id="flights-dates-depart-whitelabel_ru"
            				name="depart_date">
            			<div class="mewtwo-flights-dates-depart-weekday"
            				role="flights-dates-depart-weekday">
            				<span class="mewtwo-flights-dates-depart-weekday__pseudo">20
            					декабря</span><span
            					class="mewtwo-flights-dates-depart-weekday__name">,&nbsp;вт</span>
            			</div>
            			<!--if-->
            			<div class="mewtwo-flights-dates-depart-icon"></div>
            		</div>
            		<!--DatepickerInput-->
            		<div
            			class="mewtwo-flights-dates-return mewtwo-flights-dates-return--filled ">
            			<label for="flights-dates-return-prepop-whitelabel_ru">Обратно</label><input
            				type="text" placeholder="—" data-label="Обратно"
            				id="flights-dates-return-prepop-whitelabel_ru"
            				data-datepicker-sameday="true"
            				data-modal-modifier="whitelabel_ru"
            				role="flights-dates-return" data-popup-max-height="311"
            				data-popup-min-height="224"
            				data-linked-id="flights-dates-depart-prepop-whitelabel_ru"
            				class="mewtwo-datepicker-trigger mewtwo-filled">
            				<input
            				type="hidden" role="flights-dates-return-value"
            				value="2016-12-27"
            				id="flights-dates-return-whitelabel_ru"
            				name="return_date">
            			<div class="mewtwo-flights-dates-return-weekday"
            				role="flights-dates-return-weekday">
            				<span class="mewtwo-flights-dates-return-weekday__pseudo">27
            					декабря</span><span
            					class="mewtwo-flights-dates-return-weekday__name">,&nbsp;вт</span>
            			</div>
            			<div class="mewtwo-flights-dates-return-iconx"
            				role="flights-dates-return-clear"></div>
            			<!--if-->
            			<div class="mewtwo-flights-dates-return-icon"></div>
            		</div>
            		<!--DatepickerInput-->
            	</div>
    			<div class="mewtwo-flights-trip_class" role="passengers"
    				data-modal-modifier="whitelabel_ru">
    				<label
    					for="input-with-placeholder-0__handle--whitelabel_ru">Пассажиры/Класс</label>
    					<input type="hidden" placeholder="Пассажиры/Класс"
    					class="mewtwo-flights-trip_class__passengers"
    					role="passengers_amount"
    					data-placeholder-initialized="true"
    					id="input-with-placeholder-0__handle--whitelabel_ru">
    				<div class="mewtwo-flights-trip_class-wrapper">
    					<div class="mewtwo-flights-trip_class__passengers">1 пассажир</div>
    					<div class="mewtwo-flights-trip_class__class">эконом</div>
    				</div>
    			</div>
				<div class="mewtwo-flights-submit_button">
					<button role="flights_submit" type="submit">Найти билеты</button>
				</div>
				<div class="mewtwo-flights-link_to_multi">Сложный маршрут</div>
			</form>
		</div>
									</section>
								</div>
							</div>
							<script src="//www.travelpayouts.com/widgets/whitelabel_ru.js" initialized="true"></script>
						</div>
	            </div>
	        </div>
	    </div>
	</div>            
</div>

<footer>
	<div class="footer-copyright">AviaFox © 2016</div>
    <div class="footer-description">Поиск и бронирование дешёвых авиабилетов и отелей</div>    	
</footer>

</body>
</html>