<?
$styleVersion = '?v=' . ($_SERVER['HTTP_HOST'] == 'wp.aviafox.local' ? time() : '5.9');
?>
<link href="<?php bloginfo('template_directory') ?>/assets/css/footer/layout.css<?= $styleVersion ?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?php bloginfo('template_directory') ?>/assets/css/footer/styles.css<?= $styleVersion ?>" media="all" rel="stylesheet" type="text/css"/>
<footer>
	<?php
	require_once MDLD . '/SN/View/Widget.php';
	$widget = new \SN\View\Widget;
	if (!is_front_page()) :
	    $widget->render();
	endif;
	?>

    <section class="footer-links">
        <ul>
			<?php if (!is_page('cities')) { ?>
                <li class="footer-cities"><a href="/cities/">Список городов</a></li>
			<?php } ?>
			<?php if (!is_page('countries')) { ?>
                <li class="footer-cities"><a href="/countries/">Список стран</a></li>
			<?php } ?>
			<?php if (!is_page('contacts')) { ?>
<!--                <li class="footer-cities"><a href="/contact/">Контакты</a></li>-->
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

<!-- Begin Me-Talk -->
<script type='text/javascript'>
    (function(d, w, m) {
        window.supportAPIMethod = m;
        var s = d.createElement('script');
        s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
        s.async = true;
        var id = '46595fd0e91a69890a344eecd9f71465';
        s.src = '//me-talk.ru/support/support.js?h='+id;
        var sc = d.getElementsByTagName('script')[0];
        w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
        if (sc) sc.parentNode.insertBefore(s, sc);
        else d.documentElement.firstChild.appendChild(s);
    })(document, window, 'MeTalk');
</script>
<!-- End Me-Talk -->

</body>
</html>
