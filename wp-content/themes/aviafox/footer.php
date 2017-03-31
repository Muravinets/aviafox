<footer>
    <section class="footer-links">
        <ul>
			<?php if (!isset($isPageCities)) { ?>
                <li class="footer-cities"><a href="/cities/">Список городов</a></li>
			<?php } ?>
			<?php if (!isset($isPageCountries)) { ?>
                <li class="footer-cities"><a href="/countries/">Список стран</a></li>
			<?php } ?>
			<?php if (!isset($isPageContact)) { ?>
                <li class="footer-cities"><a href="/contact/">Контакты</a></li>
			<?php } ?>
        </ul>
        <ul>
            <li><a href="/soglasie-s-rassilkoj/" rel="nofollow" target="_blank">Согласие с рассылкой</a></li>
            <li><a href="/politika-konfidenczialnosti/" rel="nofollow" target="_blank">Политика конфиденциальности</a></li>
            <li><a href="/otkaz-ot-otvetstvennosti/" rel="nofollow" target="_blank">Отказ от ответственности</a></li>
        </ul>
    </section>
    <section class="footer-copyright-container">
        <div class="footer-copyright">AviaFox © 2016</div>
        <div class="footer-description">Поиск и бронирование дешёвых авиабилетов и отелей</div>
    </section>
</footer>
<?php wp_footer() ?>

</body>
</html>
