<?php
/* @var $form SearchForm */

?><!-- hotel tab content -->
<div id="twidget-tab2" class="twidget-tab">
    <form action="https://search.hotellook.com/" method="get" autocomplete="off" target="_blank">
    <ul class="twidget-form-list clearfix">
        <!-- hotel city input -->
        <li class="twidget-city-hotel">
            <div class="twidget-input-box">
                <label for="twidget-city-hotel">Город или отель</label>
                <input type="text" id="twidget-city-hotel" placeholder="Город или отель" required>
                <span class="twidget-icon-hotel"></span>
                <input type="hidden" name="destination">
                <div class="twidget-pseudo-input">
                   <span class="twidget-pseudo-name"></span><span class="twidget-pseudo-country-name"></span>
                </div>
            </div>
            <div class="twidget-auto-fill-wrapper"><ul></ul></div>
        </li>
        <!-- hotel datepicker -->
        <li id="twidget-hotel-datepicker" class="twidget-hotel-dates input-daterange input-group clearfix">
            <div class="twidget-start-date twidget-form-item">
                <div class="twidget-input-box">
                    <label for="checkIn">Прибытие</label>
                    <input type="text" name="checkIn" placeholder="Прибытие">
                    <div class="twidget-icon-cal"></div>
                    <span class="twidget-date-text twidget-date-checkin"></span>
                </div>
            </div>
            <div class="twidget-end-date twidget-form-item">
                <div class="twidget-input-box">
                    <label for="checkOut">Выезд</label>
                    <input type="text" name="checkOut" placeholder="Выезд">
                    <div class="twidget-icon-cal"></div>
                    <span class="twidget-date-text twidget-date-checkout"></span>
                </div>
           </div>
        </li>
        <!-- hotel guests selection -->
        <li class="twidget-hotel-guest">
            <label for="twidget-guest-detail">Гости</label>
            <div class="twidget-guest-detail">
                <div class="twidget-guest-no"><span id="twidget-g-no">1</span> <span class="twidget-guest-caption">гость</span></div>
            </div>
            <div id="twidget-guest-form" style="display: none;">
                <div class="twidget-passenger-form-wrapper">
                    <ul class="twidget-age-group">
                        <li>
                            <div class="twidget-cell twidget-age-name">Взрослые</div>
                            <div class="twidget-cell twidget-age-select">
                                <span class="twidget-dec twidget-q-btn" data-age="adults-g">-</span><span class="twidget-num"><input type="text" name="adults" value="1"></span><span class="twidget-inc twidget-q-btn" data-age="adults-g">+</span>
                            </div>
                        </li>
                        <li>
                            <div class="twidget-cell twidget-age-name">Дети до 17 лет</div>
                            <div class="twidget-cell twidget-age-select">
                                <span class="twidget-dec twidget-q-btn" data-age="children-g">-</span><span class="twidget-num"><input type="text" name="children_sum" value="0"></span><span class="twidget-inc twidget-q-btn" data-age="children-g">+</span>
                            </div>
                        </li>
                    </ul>
                    <div class="twidget-pas-class" style="display: none;">
                        <ul class="twidget-age-group">
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <!-- partner marker -->
        <input type="hidden" name="marker" value="<?= $form->getMarker() ?>">
        <!-- hotel search language -->
        <input type="hidden" name="language" value="ru">
        <!-- submit button -->
        <li class="twidget-submit-button">
            <button type="submit">Узнать цены</button>
        </li>
    </ul>
    </form>
    <div class="twidget-tab-bottom">
    </div>
</div>
<!--end hotel tab-->