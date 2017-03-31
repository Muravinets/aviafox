/*
 *  jquery-boilerplate - v4.0.0
 *  A jump-start for jQuery plugins development.
 *  http://jqueryboilerplate.com
 *
 *  Made by Zeno Rocha
 *  Under MIT License
 */
// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;( function( $, window, document, undefined ) {

    "use strict";

    // undefined is used here as the undefined global variable in ECMAScript 3 is
    // mutable (ie. it can be changed by someone else). undefined isn't really being
    // passed in so we can ensure the value of it is truly undefined. In ES5, undefined
    // can no longer be modified.

    // window and document are passed through as local variable rather than global
    // as this (slightly) quickens the resolution process and can be more efficiently
    // minified (especially when both are regularly referenced in your plugin).

    // Create the defaults once
    var pluginName = "twidget",
        dataKey = "plugin_" + pluginName,
        defaults = {
            locale: "en",
            type: 'avia_hotel',
            default_origin: '',
            default_destination: '',
            default_hotel_location: '',
            localization: {
                hotels_count_caption_1: 'hotel',
                hotels_count_caption_2: 'hotels',
                hotels_count_caption_5: 'hotels',
                avia_passengers_caption_1: 'passenger',
                avia_passengers_caption_2: 'passengers',
                avia_passengers_caption_5: 'passengers',
                hotel_guests_caption_1: 'guest',
                hotel_guests_caption_2: 'guests',
                hotel_guests_caption_5: 'guests',
                hotel_guests_select_children_age: 'Age',
                avia_passengers_economy_class: 'economy class',
                avia_passengers_business_class: 'business class',
                avia_all_airports_caption: 'All airports',
                datepicker_language: 'en',
                datepicker_return_ticket_caption: 'Return ticket not needed',
                weekdays_short: ["su", "mo", "tu", "we", "th", "fr", "sa"],
                month_names: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            }
        },
        // globals
        date = new Date(),
        dateOneWeekLater = new Date(),
        dateTwoWeekLater = new Date();

    dateOneWeekLater.setDate(date.getDate() + 7);
    dateTwoWeekLater.setDate(date.getDate() + 14);

    // The actual plugin constructor
    var Plugin = function (element, options) {
        this.element = element;

        // jQuery has an extend method which merges the contents of two or
        // more objects, storing the result in the first object. The first object
        // is generally empty as we don't want to alter the default options for
        // future instances of the plugin
        this.settings = $.extend( {}, defaults, options );

        if(this.settings.locale == 'ru'){
            this.settings.localization = {
                hotels_count_caption_1: 'отель',
                hotels_count_caption_2: 'отеля',
                hotels_count_caption_5: 'отелей',
                avia_passengers_caption_1: 'пассажир',
                avia_passengers_caption_2: 'пассажира',
                avia_passengers_caption_5: 'пассажиров',
                hotel_guests_caption_1: 'гость',
                hotel_guests_caption_2: 'гостя',
                hotel_guests_caption_5: 'гостей',
                hotel_guests_select_children_age: 'Возраст',
                avia_passengers_economy_class: 'эконом',
                avia_passengers_business_class: 'бизнес-класс',
                avia_all_airports_caption: 'Все аэропорты',
                datepicker_language: 'ru',
                datepicker_return_ticket_caption: 'Обратный билет не нужен',
                weekdays_short: ["вс", "пн", "вт", "ср", "чт", "пт", "сб"],
                month_names: ["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря"],
            };
        }

        this._defaults = defaults;
        this._name = pluginName;
        this.init();

    };

    Plugin.prototype = {
    	setOrigin: function(country, city, code)
    	{
    		var container = $( this.element);

            container.find('#twidget-origin').val(city);
            container.find('.twidget-origin-iata').text(code);
            container.find(".twidget-origin .twidget-pseudo-name").text(city);
            container.find(".twidget-origin .twidget-pseudo-country-name").text(', ' + country);
            container.find('input[name="origin_iata"]').val(code);
    	},
    	setDestination: function(country, city, code)
    	{
    		var container = $( this.element);
    		
    		container.find('#twidget-destination').val(city);
    		container.find('.twidget-destination-iata').text(code);
    		container.find(".twidget-destination .twidget-pseudo-name").text(city);
    		container.find(".twidget-destination .twidget-pseudo-country-name").text(', ' + country);
    		container.find('input[name="destination_iata"]').val(code);
    	},
    	exchangeDestinations: function() 
    	{
    		var container = $( this.element);
    		
    		var countryO = container.find('.twidget-origin .twidget-pseudo-country-name').text().substr(2);
        	var cityO = container.find('#twidget-origin').val();
        	var codeO = container.find('input[name="origin_iata"]').val();
        	
        	var countryD = container.find('.twidget-destination .twidget-pseudo-country-name').text().substr(2);
        	var cityD = container.find('#twidget-destination').val();
        	var codeD = container.find('input[name="destination_iata"]').val();
        	
        	this.setOrigin(countryD, cityD, codeD);
        	this.setDestination(countryO, cityO, codeO);
    	},
        qBtnHandler: function (button)
        {
            var
                _this               = this,
                container           = $(this.element),
                adults_pas_input    = container.find('#twidget-passenger-form input[name="adults"]'),
                children_pas_input  = container.find('#twidget-passenger-form input[name="children"]'),
                infants_pas_input   = container.find('input[name="infants"]'),
                pas_count_label     = container.find('#twidget-pas'),
                guests_count_label  = container.find('#twidget-g-no')
            ;

            var input = button.parent().find("input"),
                newVal = parseFloat(input.val()),
                adults_pas_count = parseFloat(adults_pas_input.val()),
                children_pas_count = parseFloat(children_pas_input.val()),
                infants_pas_count = parseFloat(infants_pas_input.val());

            if (button.text() == "+")
            {
                if ((button.attr('data-age') == 'adults' || button.attr('data-age') == 'children') &&
                    (adults_pas_count + children_pas_count + infants_pas_count ) < 9)
                {
                    // max 9 passengers (adults+children)
                    newVal++;
                }
                if (button.attr('data-age') == 'infants' && newVal < adults_pas_count &&
                    (adults_pas_count + children_pas_count + infants_pas_count ) < 9)
                {
                    // max infants = current adults
                    newVal++;
                }
                if (button.attr('data-age') == 'adults-g' && newVal < 4)
                {
                    // max 4 adult guests
                    newVal++;
                }
                if (button.attr('data-age') == 'children-g' && newVal < 3)
                {
                    // max 3 children guests
                    newVal++;
                    _this.addHotelGuestsKidAge(container, newVal);
                    container.find('#twidget-guest-form .twidget-pas-class').show();
                }
                if (button.attr('data-age') == 'one-child' && newVal < 17)
                {
                    // children guests max age = 17
                    newVal++;
                }
            } else {
                // Don't allow decrementing below zero
                if (input.val() > 0)
                {
                    // Don't allow decrementing adultrs below 1
                    if ((button.attr('data-age') == 'adults' || button.attr('data-age') == 'adults-g') && input.val() == 1)
                    {
                        return false;
                    }
                    newVal--;
                    if (button.attr('data-age') == 'adults' && infants_pas_count > newVal )
                    {
                        // correct infants count when decrementing adults count
                        infants_pas_input.val(newVal);
                    }
                    if (button.attr('data-age') == 'children-g')
                    {
                        // remove children age selectors when decrementing children count
                        container.find('#twidget-guest-form .twidget-pas-class li:last-child').remove();
                        if (newVal == 0) {
                            container.find('#twidget-guest-form .twidget-pas-class').hide();
                        }
                    }
                } else {
                    newVal = 0;
                }
            }
            input.val(newVal);
            pas_count_label.html(0);
            container.find('#twidget-passenger-form input[name="adults"], #twidget-passenger-form input[name="children"], input[name="infants"]').trigger('change');
            guests_count_label.html(0);
            container.find('#twidget-guest-form input[name="adults"], #twidget-guest-form input[name="children_sum"]').trigger('change');
        },
        addHotelGuestsKidAge: function (container, kidNumber)
        {
            var _this = this;

            container.find('#twidget-guest-form .twidget-pas-class ul').append( // add +1 child guest age selection
                '<li>' +
                '<div class="twidget-cell twidget-age-name">' + _this.settings.localization.hotel_guests_select_children_age + '</div>' +
                '<div class="twidget-cell twidget-age-select">' +
                '<span class="twidget-dec twidget-q-btn" data-age="one-child">-</span><span class="twidget-num"><input type="text" name="children['+kidNumber+']" value="8"></span><span class="twidget-inc twidget-q-btn" data-age="one-child">+</span>' +
                '</div>' +
                '</li>'
            );

            container.find('#twidget-guest-form .twidget-pas-class ul li').last().find('.twidget-q-btn').click(function () {
                _this.qBtnHandler($(this));
            });
        },
        init: function() {
            // Place initialization logic here
            // You already have access to the DOM element and
            // the options via the instance, e.g. this.element
            // and this.settings
            // you can add more functions like the one below and
            // call them like the example bellow
            //this.yourOtherFunction( "jQuery Boilerplate" );

            this.widget_html();

            var container = $( this.element),
                _this = this;

            /* hide tab-changing buttons respectively to settings.type */
            switch(this.settings.type) {
                case 'hotel': {
                    container.find('.twidget-tab-links').remove();
                    container.find('#twidget-tab1').remove();
                    container.find('#twidget-tab2').show();
                } break;
                case 'avia':{
                    container.find('.twidget-tab-links').remove();
                    container.find('#twidget-tab2').remove();
                }
            }

            /* remove with_request input from jetradar form */
            if (this.settings.locale == 'en') {
                container.find('input[name="with_request"]').remove();
                container.find('input[name="oneway"]').remove();
            }

            /* flight vars */
            var origin_iata_input       = container.find('input[name="origin_iata"]'),
                destination_iata_input  = container.find('input[name="destination_iata"]'),
                oneway_input            = container.find('input[name="oneway"]'),
                trip_class_input        = container.find('input[name="trip_class"]'),
                pas_count_label         = container.find('#twidget-pas'),
            /* hotel vars */
                destination_hotel_input = container.find('input[name="destination"]'),
                guests_count_label      = container.find('#twidget-g-no');

            container.find('.twidget-tab-links a').on('click', function(e)  {
                var currentAttrValue = $(this).attr('href'),
                    currentTabContentHeight = container.find('.twidget-tab-content').height()+20;

                // Show/Hide Tabs
                container.find('.twidget-tab-content').css({height: currentTabContentHeight});
                container.find('.twidget-tabs ' + currentAttrValue).siblings().fadeOut(200);
                setTimeout(function(){container.find('.twidget-tabs ' + currentAttrValue).fadeIn(200);container.find('.twidget-tab-content').css({height: 'auto'});}, 250);


                // Change/remove current tab to active
                $(this).parent('li').addClass('active').siblings().removeClass('active');

                e.preventDefault();
            });

            /* Exchange destinations @author Igor Muravinets */
            container.find('.twidget-form-list li.twidget-origin .fa-exchange').click(function() 
            {
            	_this.exchangeDestinations();
            });
            
            /*passenger details toggle*/
            container.find('.twidget-passengers-detail').click(function(){
                $(this).toggleClass('active');
                container.find('#twidget-passenger-form').fadeToggle(65);
            });

            /* passengers details ready button */
            container.find('.twidget-passengers-ready-button').click(function(){
                container.find('.twidget-passengers-detail').trigger('click');
            });

            /*hotel guest details toggle*/
            container.find('.twidget-guest-detail').click(function(){
                $(this).toggleClass('active');
                container.find('#twidget-guest-form').fadeToggle(65);
            });

            /* quantity increment */
            container.find('.twidget-q-btn').click(function()
            {
                _this.qBtnHandler($(this));
            });

            /* calculate passengers count label */
            container.find('#twidget-passenger-form input[name="adults"], #twidget-passenger-form input[name="children"], input[name="infants"]').on('change', function() {
                var current_count = parseFloat(pas_count_label.html()),
                    input_count = parseFloat($(this).val());
                pas_count_label.html(current_count+input_count);
                if(current_count+input_count >= 5) {
                    container.find('.twidget-pas-caption').text(_this.settings.localization.avia_passengers_caption_5);
                } else if(current_count+input_count != 1){
                    container.find('.twidget-pas-caption').text(_this.settings.localization.avia_passengers_caption_2);
                } else {
                    container.find('.twidget-pas-caption').text(_this.settings.localization.avia_passengers_caption_1);
                }
            });

            /* calculate guests count label */
            container.find('#twidget-guest-form input[name="adults"], #twidget-guest-form input[name="children_sum"]').on('change', function() {
                var current_count = parseFloat(guests_count_label.html()),
                    input_count = parseFloat($(this).val());
                guests_count_label.html(current_count+input_count);
                if(current_count+input_count >= 5){
                    container.find('.twidget-guest-caption').text(_this.settings.localization.hotel_guests_caption_5);
                }else if(current_count+input_count != 1){
                    container.find('.twidget-guest-caption').text(_this.settings.localization.hotel_guests_caption_2);
                } else {
                    container.find('.twidget-guest-caption').text(_this.settings.localization.hotel_guests_caption_1);
                }
            });

            /*passenger flight class selection*/
            container.find('.twidget-pass-class+label').click(function(){
                container.find(".twidget-pass-class").trigger('click');
            });
            container.find(".twidget-pass-class").change(function() {
                if(this.checked) {
                    container.find('.twidget-form-list li .twidget-passengers-detail .twidget-class').html(_this.settings.localization.avia_passengers_business_class);
                    trip_class_input.val(1);
                }
                else{
                    container.find('.twidget-form-list li .twidget-passengers-detail .twidget-class').html(_this.settings.localization.avia_passengers_economy_class);
                    trip_class_input.val(0);
                }
            });

            /*datepicker flight*/
            var dateSelect     = container.find('#twidget-flight-datepicker'),
                dateDepart     = container.find('input[name="depart_date"]'),
                dateReturn     = container.find('input[name="return_date"]'),
                iconReturnCal  = container.find('.twidget-return-date .twidget-icon-cal'),
                iconReturnDel  = container.find('.twidget-return-date .twidget-icon-delete'),
                spanDepart     = container.find('.twidget-date-depart'),
                spanReturn     = container.find('.twidget-date-return'),
                spanDateFormat = 'MMMM D';

            /* @author Igor Muravinets Fill default dates */
            var
                dateOneWeekLaterString = dateOneWeekLater.getFullYear() + '-' + (dateOneWeekLater.getMonth()+1) + '-' + dateOneWeekLater.getDate(),
                dateTwoWeekLaterString = dateTwoWeekLater.getFullYear() + '-' + (dateTwoWeekLater.getMonth()+1) + '-' + dateTwoWeekLater.getDate()
                ;

            dateDepart.val(dateOneWeekLaterString);
            dateReturn.val(dateTwoWeekLaterString);

            $.fn.datepicker.dates['en'].daysMin = ["<span style='color: red;'>Su</span>","Mo","Tu","We","Th","Fr","<span style='color: red;'>Sa</span>"];

            $.fn.datepicker.dates['ru'] = {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin:["<span style='color: red;'>Вс</span>","Пн","Вт","Ср","Чт","Пт","<span style='color: red;'>Сб</span>"],
                months:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                today: "Today",
                clear: "Clear",
                format: "mm/dd/yyyy",
                titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                weekStart: 1
            };
            var yearFromNow = new Date(new Date().setFullYear(new Date().getFullYear() + 1));
            dateSelect.datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                maxViewMode: 0,
                startDate: "now",
                endDate: yearFromNow,
                disableTouchKeyboard: true,
                language: _this.settings.localization.datepicker_language
            }).on('change', function() {
                if(dateDepart.val()){
                    var start = dateDepart.datepicker('getDate').getDate() + ' ' + _this.settings.localization.month_names[dateDepart.datepicker('getDate').getMonth()] + ', ' + _this.settings.localization.weekdays_short[dateDepart.datepicker('getDate').getDay()];
                    spanDepart.text(start.toLowerCase());
                }
                if(dateReturn.val()){
                    var end = dateReturn.datepicker('getDate').getDate() + ' ' + _this.settings.localization.month_names[dateReturn.datepicker('getDate').getMonth()] + ', ' + _this.settings.localization.weekdays_short[dateReturn.datepicker('getDate').getDay()];
                    spanReturn.text(end.toLowerCase());
                    iconReturnCal.hide();
                    iconReturnDel.show();
                    
                    /* Fix IOS Safari zoom on focus bug by Igor Muravinets */
                    //dateReturn.css('font-size', '0');
                    
                    oneway_input.val(0);
                }
                $(document).find('.datepicker tbody').removeClass('with-return-button');
            }).on('click', function() {
                if(container.find('.twidget-passengers-detail').hasClass('active')){
                    container.find('.twidget-passengers-detail').trigger('click');
                }
            });
            dateSelect.trigger('change');

            dateDepart.change(function(){
                dateReturn.focus();
            });

            /* datepicker flight - cancel return date*/
            iconReturnDel.click(function() {
                $(document).find('.datepicker').hide();
                $(this).hide();
                iconReturnCal.show();
                dateReturn.val('').css('font-size', '14px');
                spanReturn.text('');
                oneway_input.val(1);
                oneway_input.removeAttr('disabled');
            });
            dateReturn.focus(function(){
                setTimeout(function(){
                    if(!$(document).find('.datepicker tbody').hasClass('with-return-button')){
                            $(document).find('.datepicker tbody .datepicker-cancel-return-date').parent().remove();
                            $(document).find('.datepicker tbody').append('<tr><td class="datepicker-cancel-return-date">'+_this.settings.localization.datepicker_return_ticket_caption+'</td></tr>');
                            $(document).find('.datepicker tbody').addClass('with-return-button');
                            $(document).find('.datepicker-cancel-return-date').click(function(){
                                iconReturnDel.click()
                            });
                            dateReturn.datepicker('show');
                        }
                    }, 1);
            });
            dateReturn.datepicker()
                .on('changeMonth', function() {
                    setTimeout(function(){
                        $(document).find('.datepicker tbody').removeClass('with-return-button');
                        //dateReturn.focus();
                        $(document).find('.datepicker tbody .datepicker-cancel-return-date').parent().remove();
                        $(document).find('.datepicker tbody').append('<tr><td class="datepicker-cancel-return-date">'+_this.settings.localization.datepicker_return_ticket_caption+'</td></tr>');
                        $(document).find('.datepicker tbody').addClass('with-return-button');
                        $(document).find('.datepicker-cancel-return-date').click(function(){
                            iconReturnDel.click()
                        });
                    }, 1);
                });


            /*datepicker hotel*/
            var dateSelect1     = container.find('#twidget-hotel-datepicker');
            var dateDepart1     = container.find('input[name="checkIn"]');
            var dateReturn1     = container.find('input[name="checkOut"]');
            var spanDepart1     = container.find('.twidget-date-checkin');
            var spanReturn1     = container.find('.twidget-date-checkout');
            var spanDateFormat1 = 'MMMM d';

            /* @author Igor Muravinets Fill default dates */
            dateDepart1.val(dateOneWeekLaterString);
            dateReturn1.val(dateTwoWeekLaterString);

            dateSelect1.datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                maxViewMode: 0,
                startDate: "now",
                disableTouchKeyboard: true,
                language: _this.settings.localization.datepicker_language
            }).on('change', function() {
                if(dateDepart1.val() && dateReturn1.val()){
                    var start = dateDepart1.datepicker('getDate').getDate() + ' ' + _this.settings.localization.month_names[dateDepart1.datepicker('getDate').getMonth()] + ', ' + _this.settings.localization.weekdays_short[dateDepart1.datepicker('getDate').getDay()];
                    var end = dateReturn1.datepicker('getDate').getDate() + ' ' + _this.settings.localization.month_names[dateReturn1.datepicker('getDate').getMonth()] + ', ' + _this.settings.localization.weekdays_short[dateReturn1.datepicker('getDate').getDay()];
                    spanDepart1.text(start.toLowerCase());
                    spanReturn1.text(end.toLowerCase());
                }
            }).on('click', function() {
                if(container.find('.twidget-guest-detail').hasClass('active')){
                    container.find('.twidget-guest-detail').trigger('click');
                }
            });
            dateSelect1.trigger('change');

            dateDepart1.change(function(){
                dateReturn1.focus();
            });

            /* datepicker inner buttons */
            $('.twidget-icon-cal, .twidget-date-text').click(function(){
                $(this).parent().find('input').trigger('focus');
            });

            /* origin city from parameters */
            if (_this.settings.default_origin) 
            {
            	// Fix https
                $.getJSON("https://autocomplete.travelpayouts.com/jravia?locale="+_this.settings.locale+"&with_countries=false&q="+_this.settings.default_origin, function (data) {
                    /* input focusout update */
                    if(data){
                        container.find("#twidget-origin").off('focusout').on('focusout', function() {
                        	_this.setOrigin(data[0].country_name, data[0].city_name, data[0].code);
                        });
                        container.find('#twidget-origin').trigger('focusout');
                    }
                });
            } else {
            /* or getting user origin city from whereami */
            	// Fix https
                $.getJSON("https://www.travelpayouts.com/whereami?locale="+_this.settings.locale, function (data) {
                    /* input focusout update */
                    if(data){
                        container.find("#twidget-origin").off('focusout').on('focusout', function() {
                        	_this.setOrigin(data.country_name, data.name, data.iata);
                        });
                        container.find('#twidget-origin').trigger('focusout');
                    }
                });
            }


            /* origin city auto complete */
            container.find("#twidget-origin").keydown(function() {
                container.find(".twidget-origin .twidget-pseudo-name").html('');
                container.find(".twidget-origin .twidget-pseudo-country-name").html('');
                origin_iata_input.val('');
                container.find('.twidget-origin-iata').text('');
            });
            container.find("#twidget-origin").keyup(function(){
                var v = $(this).val(),
                    this_input = $(this),
                    citiesSortedArr = [],
                    citiesOrigSort = [];
                // Fix https
                $.getJSON("https://autocomplete.travelpayouts.com/jravia?locale="+_this.settings.locale+"&with_countries=false&q="+v, function (data) {
                    container.find(".twidget-origin .twidget-auto-fill-wrapper ul li").remove();
                    $.each(data, function(key, value){
                        if(value.city_name) {
                            if(!citiesSortedArr[value.city_code]){
                                citiesSortedArr[value.city_code] = [];
                            }
                            if(!value.name){
                                citiesSortedArr[value.city_code].main = value;
                            } else {
                                citiesSortedArr[value.city_code].push(value);
                            }
                            citiesOrigSort.push(value.city_code);
                        }
                    });
                    citiesOrigSort = $.grep(citiesOrigSort, function(v, k){
                        return $.inArray(v ,citiesOrigSort) === k;
                    });
                    $.each(citiesOrigSort, function(key, value){
                        if(citiesSortedArr[value].main) {
                            container.find(".twidget-origin .twidget-auto-fill-wrapper ul").append(
                                '<li class="clearfix">' +
                                '<span class="twidget-city-name" data-name="' + citiesSortedArr[value].main.city_name + '" data-country="' + citiesSortedArr[value].main.country_name + '">' + citiesSortedArr[value].main.city_name + ', <span>' + citiesSortedArr[value].main.country_name + '</span></span>' +
                                '<span class="twidget-num-hotel">' + citiesSortedArr[value].main.code + '</span><br>' +
                                '<span class="twidget-city-airport-name">' +  _this.settings.localization.avia_all_airports_caption + '</span></li>'
                            );
                        }
                        $.each(citiesSortedArr[value], function(childKey, childValue){
                            container.find(".twidget-origin .twidget-auto-fill-wrapper ul").append(
                               '<li class="clearfix" ' + (citiesSortedArr[value].main && childKey != 'main' ? 'style="padding-left:30px;"' : '') + '>' +
                               '<span class="twidget-city-name" data-name="' + childValue.city_name + '" data-country="' + childValue.country_name + '">' + childValue.city_name + (citiesSortedArr[value].main && childKey != 'main' ? '' : ', <span>' + childValue.country_name + '</span>') + '</span>' +
                               '<span class="twidget-num-hotel">' + childValue.code + '</span><br>' +
                               '<span class="twidget-city-airport-name">' + (childValue.name ? childValue.name : _this.settings.localization.avia_all_airports_caption ) + '</span></li>'
                            );
                        });
                    });
                    /* input focusout update start */
                    var focus_timeout = 0;
                    if(data[0]){
                        container.find("#twidget-origin").off('focusout').on('focusout', function(){
                            focus_timeout = setTimeout(function(){
                                this_input.val(data[0].city_name);
                                container.find('.twidget-origin-iata').text(data[0].code);
                                origin_iata_input.val(data[0].code);
                                this_input.parent().find('.twidget-pseudo-name').text(data[0].city_name);
                                this_input.parent().find('.twidget-pseudo-country-name').text(', '+data[0].country_name);
                                container.find(".twidget-origin .twidget-auto-fill-wrapper ul li").remove();
                                container.find(".twidget-origin .twidget-auto-fill-wrapper").removeClass('active');
                            }, 200);
                        });
                    }
                    /* input focusout update end */
                    container.find(".twidget-origin .twidget-auto-fill-wrapper").removeClass('active');
                    container.find(".twidget-origin .twidget-auto-fill-wrapper ul li").each(function(){
                        $(this).parent().parent().addClass('active');
                        $(this).click(function(){
                            clearTimeout(focus_timeout);
                            var city = $(this).find('.twidget-city-name').attr('data-name'),
                                country = $(this).find('.twidget-city-name').attr('data-country'),
                                iata = $(this).find('.twidget-num-hotel').text();
                            this_input.val(city);
                            container.find('.twidget-origin-iata').text(iata);
                            origin_iata_input.val(iata);
                            this_input.parent().find('.twidget-pseudo-name').text(city);
                            this_input.parent().find('.twidget-pseudo-country-name').text(', '+country);
                            /* input focusout update start */
                            container.find("#twidget-origin").off('focusout').on('focusout', function(){
                                this_input.val(city);
                                container.find('.twidget-origin-iata').text(iata);
                                origin_iata_input.val(iata);
                                this_input.parent().find('.twidget-pseudo-name').text(city);
                                this_input.parent().find('.twidget-pseudo-country-name').text(', '+country);
                            });
                            /* input focusout update end */
                            container.find(".twidget-origin .twidget-auto-fill-wrapper ul li").remove();
                            container.find(".twidget-origin .twidget-auto-fill-wrapper").removeClass('active');
                        });
                    });
                    if(!container.find("#twidget-origin").is(':focus')){
                        container.find("#twidget-origin").trigger('focusout');
                    }
                });

            });

            /* destination from parameters */
            if(_this.settings.default_destination) {
            	// Fix https
                $.getJSON("https://autocomplete.travelpayouts.com/jravia?locale="+_this.settings.locale+"&with_countries=false&q="+_this.settings.default_destination, function (data) {
                    /* input focusout update start */
                    if(data){
                        container.find("#twidget-destination").off('focusout').on('focusout', function(){
                            container.find('#twidget-destination').val(data[0].city_name);
                            container.find('.twidget-destination-iata').text(data[0].code);
                            container.find(".twidget-destination .twidget-pseudo-name").text(data[0].city_name);
                            container.find(".twidget-destination .twidget-pseudo-country-name").text(', '+data[0].country_name);
                            destination_iata_input.val(data[0].code);
                        });
                    }
                    /* input focusout update end */
                    container.find('#twidget-destination').trigger('focusout');
                });
            }

            /* destination city auto complete */
            container.find("#twidget-destination").keydown(function() {
                container.find(".twidget-destination .twidget-pseudo-name").text('');
                container.find(".twidget-destination .twidget-pseudo-country-name").text('');
                destination_iata_input.val('');
                container.find('.twidget-destination-iata').text('');
            });
            container.find("#twidget-destination").keyup(function(){
                var v = $(this).val(),
                    this_input = $(this),
                    citiesSortedArr = [],
                    citiesOrigSort = [];
                // Fix https
                $.getJSON("https://autocomplete.travelpayouts.com/jravia?locale="+_this.settings.locale+"&with_countries=false&q="+v, function (data) {
                    container.find(".twidget-destination .twidget-auto-fill-wrapper ul li").remove();
                    $.each(data, function(key, value){
                        if(value.city_name) {
                            if(!citiesSortedArr[value.city_code]){
                                citiesSortedArr[value.city_code] = [];
                            }
                            if(!value.name){
                                citiesSortedArr[value.city_code].main = value;
                            } else {
                                citiesSortedArr[value.city_code].push(value);
                            }
                            citiesOrigSort.push(value.city_code);
                        }
                    });
                    citiesOrigSort = $.grep(citiesOrigSort, function(v, k){
                        return $.inArray(v ,citiesOrigSort) === k;
                    });
                    $.each(citiesOrigSort, function(key, value){
                        if(citiesSortedArr[value].main) {
                            container.find(".twidget-destination .twidget-auto-fill-wrapper ul").append(
                                '<li class="clearfix">' +
                                '<span class="twidget-city-name" data-name="' + citiesSortedArr[value].main.city_name + '" data-country="' + citiesSortedArr[value].main.country_name + '">' + citiesSortedArr[value].main.city_name + ', <span>' + citiesSortedArr[value].main.country_name + '</span></span>' +
                                '<span class="twidget-num-hotel">' + citiesSortedArr[value].main.code + '</span><br>' +
                                '<span class="twidget-city-airport-name">' +  _this.settings.localization.avia_all_airports_caption + '</span></li>'
                            );
                        }
                        $.each(citiesSortedArr[value], function(childKey, childValue){
                            container.find(".twidget-destination .twidget-auto-fill-wrapper ul").append(
                                '<li class="clearfix" ' + (citiesSortedArr[value].main && childKey != 'main' ? 'style="padding-left:30px;"' : '') + '>' +
                                '<span class="twidget-city-name" data-name="' + childValue.city_name + '" data-country="' + childValue.country_name + '">' + childValue.city_name + (citiesSortedArr[value].main && childKey != 'main' ? '' : ', <span>' + childValue.country_name + '</span>') + '</span>' +
                                '<span class="twidget-num-hotel">' + childValue.code + '</span><br>' +
                                '<span class="twidget-city-airport-name">' + (childValue.name ? childValue.name : _this.settings.localization.avia_all_airports_caption ) + '</span></li>'
                            );
                        });
                    });
                    /* input focusout update start */
                    var focus_timeout = 0;
                    if(data[0]){
                        container.find("#twidget-destination").off('focusout').on('focusout', function(){
                            focus_timeout = setTimeout(function(){
                                this_input.val(data[0].city_name);
                                container.find('.twidget-destination-iata').text(data[0].code);
                                destination_iata_input.val(data[0].code);
                                this_input.parent().find('.twidget-pseudo-name').text(data[0].city_name);
                                this_input.parent().find('.twidget-pseudo-country-name').text(', '+data[0].country_name);
                                container.find(".twidget-destination .twidget-auto-fill-wrapper ul li").remove();
                                container.find(".twidget-destination .twidget-auto-fill-wrapper").removeClass('active');
                            }, 200);
                        });
                    }
                    /* input focusout update end */
                    container.find(".twidget-destination .twidget-auto-fill-wrapper").removeClass('active');
                    container.find(".twidget-destination .twidget-auto-fill-wrapper ul li").each(function(){
                        $(this).parent().parent().addClass('active');
                        $(this).click(function(){
                            clearTimeout(focus_timeout);
                            var city = $(this).find('.twidget-city-name').attr('data-name'),
                                country = $(this).find('.twidget-city-name').attr('data-country'),
                                iata = $(this).find('.twidget-num-hotel').text();
                            container.find('#twidget-destination').val(city);
                            container.find('.twidget-destination-iata').text(iata);
                            destination_iata_input.val(iata);
                            this_input.parent().find('.twidget-pseudo-name').text(city);
                            this_input.parent().find('.twidget-pseudo-country-name').text(', '+country);
                            /* input focusout update start */
                            container.find("#twidget-destination").off('focusout').on('focusout', function(){
                                container.find('#twidget-destination').val(city);
                                container.find('.twidget-destination-iata').text(iata);
                                destination_iata_input.val(iata);
                                this_input.parent().find('.twidget-pseudo-name').text(city);
                                this_input.parent().find('.twidget-pseudo-country-name').text(', '+country);
                            });
                            /* input focusout update end */
                            container.find(".twidget-destination .twidget-auto-fill-wrapper ul li").remove();
                            container.find(".twidget-destination .twidget-auto-fill-wrapper").removeClass('active');
                        });
                    });
                    if(!container.find("#twidget-destination").is(':focus')){
                        container.find("#twidget-destination").trigger('focusout');
                    }
                });
            });


            /* hotel location from parameters */
            if(_this.settings.default_destination) {
            	// Fix https
                $.getJSON("https://engine.hotellook.com/api/v2/lookup.json?query="+_this.settings.default_hotel_location+"&lang="+_this.settings.locale+"&limit=4", function (data) {
                    /* input focusout update start */
                    var focus_destination = '',
                        focus_country = '';
                    if(data.results.hotels[0]) {
                        focus_destination = data.results.hotels[0].label;
                        focus_country = data.results.hotels[0].locationName;
                    }
                    if(data.results.locations[0]) {
                        focus_destination = data.results.locations[0].cityName;
                        focus_country = data.results.locations[0].countryName;
                    }
                    if(focus_destination){
                        container.find("#twidget-city-hotel").off('focusout').on('focusout', function(){
                            container.find("#twidget-city-hotel").val(focus_destination);
                            destination_hotel_input.val(focus_destination);
                            container.find(".twidget-city-hotel .twidget-pseudo-name").text(focus_destination);
                            container.find(".twidget-city-hotel .twidget-pseudo-country-name").text(', '+focus_country);
                            container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul li").remove();
                            container.find(".twidget-city-hotel .twidget-auto-fill-wrapper").removeClass('active');
                        });
                        container.find('#twidget-city-hotel').trigger('focusout');
                    }
                });
            }

            /* hotel auto fill */
            container.find("#twidget-city-hotel").keydown(function() {
                container.find(".twidget-city-hotel .twidget-pseudo-name").text('');
                container.find(".twidget-city-hotel .twidget-pseudo-country-name").text('');
                destination_hotel_input.val('');
            });
            container.find("#twidget-city-hotel").keyup(function(){
                var v = $(this).val(),
                    this_input = $(this);
                // Fix https
                $.getJSON("https://engine.hotellook.com/api/v2/lookup.json?query="+v+"&lang="+_this.settings.locale+"&limit=4", function (data) {
                    container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul li").remove();
                    /* append cities */
                    $.each(data.results.locations, function(key, value){
                        container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul").append(
                            '<li class="clearfix ' + (key == 0 ? 'main-city' : '') + '">'+
                            '<span class="twidget-city-name" data-destination="'+value.cityName+'" data-country="'+value.countryName+'">'+value.cityName+', <span>'+value.countryName+'</span></span>'+
                            '<span class="twidget-num-hotel">'+value.hotelsCount+' ' + (value.hotelsCount > 5 || value.hotelsCount < 1 ? _this.settings.localization.hotels_count_caption_5 : (value.hotelsCount == 1 ? _this.settings.localization.hotels_count_caption_1 : _this.settings.localization.hotels_count_caption_2)) + '</span></li>'
                        );
                    });
                    /* append hotels */
                    $.each(data.results.hotels, function(key, value){
                        container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul").append(
                            '<li class="clearfix ' + (key == 0 ? 'main-hotel' : '') + '">'+
                            '<span class="twidget-city-name" data-destination="'+value.label+'" data-country="'+value.locationName+'">'+value.label+', <span>'+value.locationName+'</span></span>'+
                            '<span class="twidget-num-hotel"></span></li>'
                        );
                    });
                    /* input focusout update start */
                    var focus_destination = '',
                        focus_country = '',
                        focus_timeout = 0;
                    if(data.results.hotels[0]) {
                        focus_destination = data.results.hotels[0].label;
                        focus_country = data.results.hotels[0].locationName;
                    }
                    if(data.results.locations[0]) {
                        focus_destination = data.results.locations[0].cityName;
                        focus_country = data.results.locations[0].countryName;
                    }
                    if(focus_destination){
                        container.find("#twidget-city-hotel").off('focusout').on('focusout', function(){
                            focus_timeout = setTimeout(function(){
                                container.find("#twidget-city-hotel").val(focus_destination);
                                destination_hotel_input.val(focus_destination);
                                container.find(".twidget-city-hotel .twidget-pseudo-name").text(focus_destination);
                                container.find(".twidget-city-hotel .twidget-pseudo-country-name").text(', '+focus_country);
                                container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul li").remove();
                                container.find(".twidget-city-hotel .twidget-auto-fill-wrapper").removeClass('active');
                            }, 200);
                        });
                    }
                    container.find(".twidget-city-hotel .twidget-auto-fill-wrapper").removeClass('active');
                    container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul li").each(function(){
                        $(this).parent().parent().addClass('active');
                        $(this).click(function(){
                            clearTimeout(focus_timeout);
                            var destination = $(this).find('.twidget-city-name').attr('data-destination'),
                                country = $(this).find('.twidget-city-name').attr('data-country');
                            container.find("#twidget-city-hotel").val(destination);
                            destination_hotel_input.val(destination);
                            container.find(".twidget-city-hotel .twidget-pseudo-name").text(destination);
                            container.find(".twidget-city-hotel .twidget-pseudo-country-name").text(', '+country);
                            /* input focusout update start */
                            container.find("#twidget-city-hotel").off('focusout').on('focusout', function(){
                                container.find("#twidget-city-hotel").val(destination);
                                destination_hotel_input.val(destination);
                                container.find(".twidget-city-hotel .twidget-pseudo-name").text(destination);
                                container.find(".twidget-city-hotel .twidget-pseudo-country-name").text(', '+country);
                            });
                            /* input focusout update end */
                            container.find(".twidget-city-hotel .twidget-auto-fill-wrapper ul li").hide();
                            container.find(".twidget-city-hotel .twidget-auto-fill-wrapper").removeClass('active');
                        });
                    });
                    if(!container.find("#twidget-city-hotel").is(':focus')){
                        container.find("#twidget-city-hotel").trigger('focusout');
                    }
                });
            });


            /* pseudo-inputs */
            container.find('.twidget-pseudo-input').click(function(){
                $(this).parent().find('input[type="text"]').select();
            });
            $('#twidget-origin, #twidget-destination, #twidget-city-hotel').click(function(){
                $(this).select();
            });

        },
        widget_html: function() {
            var _this = this;
            // $(this.element).html();
        }
    };

    /*
     * Plugin wrapper, preventing against multiple instantiations and
     * return plugin instance.
     */
    $.fn[pluginName] = function (options) {

        var plugin = this.data(dataKey);

        // has plugin instantiated ?
        if (plugin instanceof Plugin) {
            // if have options arguments, call plugin.init() again
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }

        return plugin;
    };

    /* handler for clicks outside active autofill */
    // $('html').click(function(){
    //     $('.twidget-auto-fill-wrapper.active ul li:first-child').trigger('click');
    // });

} )( jQuery, window, document );