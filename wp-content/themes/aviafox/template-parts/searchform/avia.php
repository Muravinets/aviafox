<?php
/* @var $form SearchForm */

?><!--flight tab content-->
<div id="twidget-tab1" class="twidget-tab active">
    <div class="clearfix"></div>
    <form action="https://wl.aviafox.com/flights" method="get" autocomplete="off" target="_blank">
        <ul class="twidget-form-list clearfix">
            <!-- origin input -->
            <li class="twidget-origin">
                <div class="twidget-input-box">
                    <label for="twidget-origin">Город вылета</label>
                    <input type="text" id="twidget-origin" placeholder="Город вылета" required>
                    <input type="hidden" name="origin_iata">
                    <div class="twidget-pseudo-input">
                       <span class="twidget-pseudo-name"></span><span class="twidget-pseudo-country-name"></span>
                    </div>
                </div>
                <div class="twidget-origin-iata"></div>
                <!-- Exchange icon -->
                <i class="fa fa-exchange"></i>
                <div class="twidget-auto-fill-wrapper" data-type="avia">
                    <ul></ul>
                </div>
            </li>
            <!-- destination input -->
            <li class="twidget-destination">
                <div class="twidget-input-box">
                    <label for="twidget-origin">Город прибытия</label>
                    <input type="text" id="twidget-destination" placeholder="Город прибытия" required>
                    <input type="hidden" name="destination_iata">
                    <div class="twidget-pseudo-input">
                        <span class="twidget-pseudo-name"></span><span class="twidget-pseudo-country-name"></span>
                    </div>
                </div>
                <div class="twidget-destination-iata"></div>
                <div class="twidget-auto-fill-wrapper" data-type="avia"><ul></ul></div>
            </li>
            <!-- flight datepicker -->
            <li id="twidget-flight-datepicker" class="twidget-flight-dates input-daterange input-group clearfix">
                <div class="twidget-dep-date twidget-form-item">
                    <div class="twidget-input-box">
                        <label for="twidget-origin">Туда</label>
                        <input type="text" name="depart_date" size="10" placeholder="Туда" required>
                        <div class="twidget-icon-cal"></div>
                        <span class="twidget-date-text twidget-date-depart"></span>
                    </div>
                </div>
                <div class="twidget-return-date twidget-form-item">
                    <div class="twidget-input-box">
                        <label for="twidget-origin">Обратно</label>
                        <input type="text" name="return_date" size="10" placeholder="Обратно">
                        <div class="twidget-icon-cal"></div>
                        <div class="twidget-icon-delete" style="display: none;"></div>
                        <span class="twidget-date-text twidget-date-return"></span>
                    </div>
                </div>
            </li>
            <!-- one_way flag -->
            <input type="hidden" name="one_way" disabled value="0">
            <!-- flight passengers -->
            <li class="twidget-passengers">
                <label for="twidget-passengers-detail">Пассажиры/Класс</label>
                <div class="twidget-passengers-detail">
                    <div class="twidget-pas-no"><span id="twidget-pas">1</span> <span class="twidget-pas-caption">пассажир</span></div>
                    <div class="twidget-class">эконом</div>
                </div>
                <!--start passenger selection-->
                <div id="twidget-passenger-form" style="display: none;">
                    <div class="twidget-passenger-form-wrapper">
                        <ul class="twidget-age-group">
                            <li>
                                <div class="twidget-cell twidget-age-name">Взрослые</div>
                                <div class="twidget-cell twidget-age-select">
                                    <span class="twidget-dec twidget-q-btn" data-age="adults">-</span><span class="twidget-num"><input type="text" name="adults" value="1" /></span><span class="twidget-inc twidget-q-btn" data-age="adults">+</span>
                                </div>
                            </li>
                            <li>
                                <div class="twidget-cell twidget-age-name">Дети до 12 лет</div>
                                <div class="twidget-cell twidget-age-select">
                                    <span class="twidget-dec twidget-q-btn" data-age="children">-</span><span class="twidget-num"><input type="text" name="children" value="0"></span><span class="twidget-inc twidget-q-btn" data-age="children">+</span>
                                </div>
                            </li>
                            <li>
                                <div class="twidget-cell twidget-age-name">Дети до 2 лет</div>
                                <div class="twidget-cell twidget-age-select">
                                    <span class="twidget-dec twidget-q-btn" data-age="infants">-</span><span class="twidget-num"><input type="text" name="infants" value="0"></span><span class="twidget-inc twidget-q-btn" data-age="infants">+</span>
                                </div>
                            </li>
                        </ul>
                        <div class="twidget-pas-class">
                            <div class="twidget-pass-check">
                                <input type="checkbox" class="twidget-pass-class">
                                <label>Перелет бизнес-классом</label>
                                <input type="hidden" name="trip_class" value="0">
                            </div>
                        </div>
                        <ul class="twidget-age-group">
                            <li class="twidget-passengers-ready-button-wrapper">
                                <div class="twidget-passengers-ready-button">Готово</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end passenger selection-->
            </li>
            <!-- partner marker -->
            <input type="hidden" name="marker" value="<?= $form->getMarker() ?>">
            <!-- with_request flag -->
            <input type="hidden" name="with_request" value="1">
            <!-- submit button -->
            <li class="twidget-submit-button">
                <button type="submit">Найти билеты</button>
            </li>
        </ul>
    </form>
    <div class="twidget-tab-bottom"></div>
</div>
<!--end flight tab-->