<? /* <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<title>Калькулятор </title>
</head>

<body>

<? */ //<pre>print_r($_SERVER);
//print dirname(__FILE__);
$url='https://'.$_SERVER['HTTP_HOST'].'/calkuliator_zch/';
?>


<link rel='stylesheet' id='colorbox-theme3-css'
      href="<?=$url ?>wp-content/plugins/jquery-colorbox/themes/theme3/colorbox.css-ver=4.6.css"
      tppabs="<?=$url ?>wp-content/plugins/jquery-colorbox/themes/theme3/colorbox.css?ver=4.6" type='text/css' media='screen'/>
<link rel='stylesheet' id='colorbox-css-css'
      href="<?=$url ?>wp-content/plugins/jquery-colorbox/css/jquery-colorbox-zoom.css-ver=1.3.21.css"
      tppabs="<?=$url ?>wp-content/plugins/jquery-colorbox/css/jquery-colorbox-zoom.css?ver=1.3.21" type='text/css'
      media='all'/>
<link rel='stylesheet' id='wp-customer-reviews-css'
      href="<?=$url ?>wp-content/plugins/wp-customer-reviews/wp-customer-reviews.css-ver=2.4.8.css"
      tppabs="<?=$url ?>wp-content/plugins/wp-customer-reviews/wp-customer-reviews.css?ver=2.4.8" type='text/css' media='all'/>
<link rel='stylesheet' id='ad-gallery-style-css'
      href="<?=$url ?>wp-content/plugins/wp-e-commerce-dynamic-gallery/assets/js/mygallery/jquery.ad-gallery.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/wp-e-commerce-dynamic-gallery/assets/js/mygallery/jquery.ad-gallery.css?ver=3.8.21"
      type='text/css' media='all'/>
<link rel='stylesheet' id='overlay-basic-css'
      href="<?=$url ?>wp-content/plugins/wsi/style/jqueryTools/overlay-basic.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/wsi/style/jqueryTools/overlay-basic.css?ver=3.8.21" type='text/css' media='all'/>
<link rel='stylesheet' id='contact-form-7-css'
      href="<?=$url ?>wp-content/plugins/contact-form-7/includes/css/styles.css-ver=3.5.2.css"
      tppabs="<?=$url ?>wp-content/plugins/contact-form-7/includes/css/styles.css?ver=3.5.2" type='text/css' media='all'/>
<link rel='stylesheet' id='file-manager__front-style-css'
      href="<?=$url ?>wp-content/plugins/file-manager/css/front-style.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/file-manager/css/front-style.css?ver=3.8.21" type='text/css' media='all'/>
<link rel='stylesheet' id='buttons-css' href="<?=$url ?>wp-includes/css/buttons.min.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-includes/css/buttons.min.css?ver=3.8.21" type='text/css' media='all'/>
<link rel='stylesheet' id='dashicons-css' href="<?=$url ?>wp-includes/css/dashicons.min.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-includes/css/dashicons.min.css?ver=3.8.21" type='text/css' media='all'/>
<link rel='stylesheet' id='media-views-css' href="<?=$url ?>wp-includes/css/media-views.min.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-includes/css/media-views.min.css?ver=3.8.21" type='text/css' media='all'/>
<link rel='stylesheet' id='rs-settings-css'
      href="<?=$url ?>wp-content/plugins/revslider/rs-plugin/css/settings.css-rev=4.1.3&ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/revslider/rs-plugin/css/settings.css?rev=4.1.3&ver=3.8.21" type='text/css'
      media='all'/>
<link rel='stylesheet' id='rs-captions-css'
      href="<?=$url ?>wp-content/plugins/revslider/rs-plugin/css/dynamic-captions.css-rev=4.1.3&ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/revslider/rs-plugin/css/dynamic-captions.css?rev=4.1.3&ver=3.8.21" type='text/css'
      media='all'/>
<link rel='stylesheet' id='rs-plugin-static-css'
      href="<?=$url ?>wp-content/plugins/revslider/rs-plugin/css/static-captions.css-rev=4.1.3&ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/revslider/rs-plugin/css/static-captions.css?rev=4.1.3&ver=3.8.21" type='text/css'
      media='all'/>

<link rel='stylesheet' id='igallery_css-css' href="<?=$url ?>wp-content/plugins/sk_igallery/css/igallery.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/sk_igallery/css/igallery.css?ver=3.8.21" type='text/css' media='all'/>

<meta name="generator" content="WordPress 3.8.21"/>

<!-- All in One SEO Pack - Pro Version 1.72 by Michael Torbert of Semper Fi Web Design[230,309] -->
<link rel="canonical" href="<?=$url ?>calculator/"/>
<!-- /all in one seo pack Pro Version-->
<link type="text/css" rel="stylesheet" href="<?=$url ?>wp-content/plugins/jbreadcrumb-aink/css/jbreadcrumb-aink.css"
      tppabs="<?=$url ?>wp-content/plugins/jbreadcrumb-aink/css/jbreadcrumb-aink.css">
<!-- <meta name="NextGEN" version="1.9.16" /> -->
<link rel="stylesheet"
      href="<?=$url ?>wp-content/plugins/wordpress-23-related-posts-plugin/static/themes/pinterest.css-version=3.3.css"
      tppabs="<?=$url ?>wp-content/plugins/wordpress-23-related-posts-plugin/static/themes/pinterest.css?version=3.3"/>
<style type="text/css">
	.related_post_title {
	}
	
	ul.related_post {
	}
	
	ul.related_post li {
	}
	
	ul.related_post li a {
	}
	
	ul.related_post li img {
	}</style>
<style type="text/css">.recentcomments a {
		display: inline !important;
		padding: 0 !important;
		margin: 0 !important;
	}</style>
<?php /* <link rel='stylesheet' id='daves-wordpress-live-search-css'
      href="<?=$url ?>wp-content/plugins/daves-wordpress-live-search/css/daves-wordpress-live-search_default_gray.css-ver=3.8.21.css"
      tppabs="<?=$url ?>wp-content/plugins/daves-wordpress-live-search/css/daves-wordpress-live-search_default_gray.css?ver=3.8.21"
      type='text/css' media='all'/>

<!-- Google Tag Manager for WordPress by DuracellTomi -->

<link href="<?=$url ?>wp-content/themes/krasandko/css/materialdesignicons.min.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/css/materialdesignicons.min.css" media="all" rel="stylesheet"
      type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=$url ?>wp-content/themes/krasandko/js/jquery.ad-gallery.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery.ad-gallery.css">
<link rel="stylesheet" type="text/css" href="<?=$url ?>wp-content/themes/krasandko/css/style_common.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/css/style_common.css"/>
<link rel="stylesheet" type="text/css" href="<?=$url ?>wp-content/themes/krasandko/css/style1.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/css/style1.css"/>
<link rel="stylesheet" type="text/css" href="<?=$url ?>wp-content/themes/krasandko/jquery-ui.min.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/jquery-ui.min.css"/>
<link id="page_favicon" href="/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="all" href="<?=$url ?>wp-content/themes/krasandko/style.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/style.css"/>

<link rel='stylesheet' href="<?=$url ?>css/style_to.css" tppabs="<?=$url ?>css/style_to.css">
<link rel='stylesheet' href="<?=$url ?>css/smart-forms.css" tppabs="<?=$url ?>css/smart-forms.css">
<link rel="stylesheet" type="text/css" media="all" href="<?=$url ?>fancybox/jquery.fancybox.css"
      tppabs="<?=$url ?>fancybox/jquery.fancybox.css">


<!-- ###################################################FORM################################################### -->

<script type='text/javascript' src="<?=$url ?>wp-includes/js/jquery/jquery.js-ver=1.10.2"
        tppabs="<?=$url ?>wp-includes/js/jquery/jquery.js?ver=1.10.2"></script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/jquery/jquery-migrate.min.js-ver=1.2.1"
        tppabs="<?=$url ?>wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1"></script>
<script type='text/javascript' src="<?=$url ?>wp-content/plugins/wp-customer-reviews/wp-customer-reviews.js-ver=2.4.8"
        tppabs="<?=$url ?>wp-content/plugins/wp-customer-reviews/wp-customer-reviews.js?ver=2.4.8"></script>
<script type='text/javascript' src="<?=$url ?>wp-content/plugins/wsi/js/jQueryTools/jquery.tools.min.wp-front.v2.js-ver=3.8.21"
        tppabs="<?=$url ?>wp-content/plugins/wsi/js/jQueryTools/jquery.tools.min.wp-front.v2.js?ver=3.8.21"></script>
<script type='text/javascript'>

</script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/utils.min.js-ver=3.8.21"
        tppabs="<?=$url ?>wp-includes/js/utils.min.js?ver=3.8.21"></script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/plupload/plupload.js-ver=1.5.7"
        tppabs="<?=$url ?>wp-includes/js/plupload/plupload.js?ver=1.5.7"></script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/plupload/plupload.html5.js-ver=1.5.7"
        tppabs="<?=$url ?>wp-includes/js/plupload/plupload.html5.js?ver=1.5.7"></script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/plupload/plupload.silverlight.js-ver=1.5.7"
        tppabs="<?=$url ?>wp-includes/js/plupload/plupload.silverlight.js?ver=1.5.7"></script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/plupload/plupload.html4.js-ver=1.5.7"
        tppabs="<?=$url ?>wp-includes/js/plupload/plupload.html4.js?ver=1.5.7"></script>
<script type='text/javascript' src="<?=$url ?>wp-includes/js/json2.min.js-ver=2011-02-23"
        tppabs="<?=$url ?>wp-includes/js/json2.min.js?ver=2011-02-23"></script>
<script type='text/javascript'
        src="<?=$url ?>wp-content/plugins/nextcellent-gallery-nextgen-legacy/js/jquery.cycle.all.min.js-ver=2.9995"
        tppabs="<?=$url ?>wp-content/plugins/nextcellent-gallery-nextgen-legacy/js/jquery.cycle.all.min.js?ver=2.9995"></script>
<script type='text/javascript'
        src="<?=$url ?>wp-content/plugins/nextcellent-gallery-nextgen-legacy/js/ngg.slideshow.min.js-ver=1.06"
        tppabs="<?=$url ?>wp-content/plugins/nextcellent-gallery-nextgen-legacy/js/ngg.slideshow.min.js?ver=1.06"></script>
<script type='text/javascript'
        src="<?=$url ?>wp-content/plugins/sk_igallery/com/sakurapixel/js/tween/CSSPlugin.min.js-ver=3.8.21"
        tppabs="<?=$url ?>wp-content/plugins/sk_igallery/com/sakurapixel/js/tween/CSSPlugin.min.js?ver=3.8.21"></script>
<script type='text/javascript'
        src="<?=$url ?>wp-content/plugins/sk_igallery/com/sakurapixel/js/tween/easing/EasePack.min.js-ver=3.8.21"
        tppabs="<?=$url ?>wp-content/plugins/sk_igallery/com/sakurapixel/js/tween/easing/EasePack.min.js?ver=3.8.21"></script>
<script type='text/javascript'
        src="<?=$url ?>wp-content/plugins/sk_igallery/com/sakurapixel/js/tween/TweenMax.min.js-ver=3.8.21"
        tppabs="<?=$url ?>wp-content/plugins/sk_igallery/com/sakurapixel/js/tween/TweenMax.min.js?ver=3.8.21"></script>
<script type='text/javascript'>
 
	//ссылка
</script>
<script type='text/javascript' src="<?=$url ?>wp-content/plugins/sk_igallery/js/igallery.js-ver=3.8.21"
        tppabs="<?=$url ?>wp-content/plugins/sk_igallery/js/igallery.js?ver=3.8.21"></script>
        
        

<script type="text/javascript">
    window._wp_rp_static_base_url = 'http://wprp.zemanta.com/static/';
    window._wp_rp_wp_ajax_url = "<?=$url ?>wp-admin/admin-ajax.php";
    window._wp_rp_plugin_version = '3.3';
    window._wp_rp_post_id = '8082';
    window._wp_rp_num_rel_posts = '5';
</script>

<script type="text/javascript">
    dataLayer.push({"pagePostType": "page", "pagePostType2": "single-page", "pagePostAuthor": "\u0411\u0435\u043b\u0430\u044f \u041f\u043e\u043b\u043e\u0441\u0430"});
</script>
<script src="<?=$url ?><?=$url ?>ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"
        tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>


<script src="<?=$url ?>wp-content/themes/krasandko/js/jquery.simplemodal.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/jquery.ad-gallery.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery.ad-gallery.js"></script>



<script src="<?=$url ?>wp-content/themes/krasandko/js/jquery.min.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery.min.js"></script>
<script src="<?=$url ?>wp-content/themes/krasandko/js/jquery-ui.min.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery-ui.min.js"></script>
<script src="<?=$url ?>wp-content/themes/krasandko/js/jwplayer.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jwplayer.js"></script>
<!-- Smagin -->
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/scroll-animation.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/scroll-animation.js"></script>
<!-- CALCULATOR-IFRAME PART  -->
<link rel="stylesheet" href="<?=$url ?>wp-content/themes/krasandko/magnific-popup/dist/magnific-popup.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/magnific-popup/dist/magnific-popup.css">
<script src="<?=$url ?>wp-content/themes/krasandko/magnific-popup/dist/jquery.magnific-popup.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/magnific-popup/dist/jquery.magnific-popup.js"></script>
<!-- CALCULATOR-IFRAME PART  -->
*/?>
<?php /* <script>
    $(document).ready(function () {
        $('.sub-menu .current-menu-item').parent().show();
        $('.sub-menu').parent('.current-menu-item').children('.sub-menu').show();
        $('.sub-menu').parent('.current-menu-item').children('.sub-menu').parent().addClass('has-sub-menu');
        $('.sub-menu .current-menu-item').parent().parent().addClass('has-sub-menu');
    });
    $(document).ready(function () {

        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;

        if (footerTop < docHeight) {
            $('#footer').css('margin-top', (docHeight - footerTop) + 'px');
        }
    });
    $(document).ready(function () {
        var move = -15;
        var zoom = 1.2;
        $('.projblock').click(function () {
            window.location = $(this).children('a').attr('href');
        });
        $('.projblock').hover(function () {
                    width = $('.projblock').width() * zoom;
                    height = $('.projblock').height() * zoom;
                    $(this).find('img').stop(false, true).animate({'width': width, 'height': height, 'top': move, 'left': move}, {duration: 200});
                    $(this).find('div.caption').stop(false, true).fadeIn(200);
                },
                function () {
                    $(this).find('img').stop(false, true).animate({'width': $('.projblock').width(), 'height': $('.projblock').height(), 'top': '0', 'left': '0'}, {duration: 100});
                    $(this).find('div.caption').stop(false, true).fadeOut(200);
                });
    });
    //CALCULATOR-IFRAME PART OF SCRIPT

    window.close_popup = function () {
        $(document.elementFromPoint(0, 0)).click();
    }
    $(document).ready(function () {
        iframe: {
            markup: '<div class="mfp-iframe-scaler" style="background: ffffff">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
            '</div>' // HTML markup of popup, `mfp-close` will be replaced by the close button
        }

        $('#ajax-popup-link').magnificPopup({
            type: 'iframe',
            closeOnContentClick: false,
            closeOnBgClick: true,
            mainClass: 'mfp-fade'
        });
    });


    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();

    //CALCULATOR-IFRAME PART OF SCRIPT

</script>
<script type="text/javascript">$(function () {
    var galleries = $('.ad-gallery').adGallery({loader_image: '<?=$url ?>wp-content/themes/krasandko/js/loader.gif', display_next_and_prev: false });
});</script>


<!-- Smagin -->
<script type="text/javascript">
    $(function () {
        //jwplayer.key = "Y5Z/sAb8A7nY9knyoyNlw1HN/z5SfXZpiO5HyA==";
        $('.sys-video-row').each(function () {
            var row = $(this),
                    dialogBox = $('.sys-player-wrap', row),
                    playerBox = $('.sys-player-box', row);

            // Инициализация видео
            playerBox.each(function () {
                var $this = $(this);
                $this.attr('id', 'video_box_' + Math.floor(Math.random() * 10000000));

                jwplayer($this.attr('id')).setup({
                    file: row.attr('data-video'),
                    height: '480',
                    width: '640',
                    image: $('.sys-preview', row).attr('src')
                });
            });

            // Инициализация кнопки просмотра
            $('.sys-video-open', row).click(function () {
                dialogBox.dialog("open");
            });

            // Инициализация модалки
            dialogBox.dialog({
                dialogClass: "video-dealog-box",
                title: "Просмотр видеоролика...",
                //draggable: false,
                width: 670,
                height: 540,
                modal: true,
                autoOpen: false,
                buttonsOFF: [
                    {
                        text: "OK",
                        click: function () {
                            $(this).dialog("close");
                        }
                    }
                ],
                close: function (event, ui) {
                    jwplayer(playerBox.attr('id')).pause(true);
                },
                open: function (event, ui) {
                    jwplayer(playerBox.attr('id')).play(true);
                }
            });

        });

    });
</script>
<?php /*
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/jquery.waterwheelCarousel.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery.waterwheelCarousel.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#carousel").waterwheelCarousel({
            startingItem: 1, // номер изображения в центре при открытии галереи
            separation: 105, // расстояние между изображениями карусели
            separationMultiplier: 0.8, // коэффициент изменения расстояния для дальних от центра картинок
            horizonOffset: 0, // расхождение крайних изображений по вертикали
            horizonOffsetMultiplier: 1, // перекрытие крайних изображений по вертикали
            sizeMultiplier: 0.85, // размер изображений по краям
            opacityMultiplier: 0.8, // прозрачность изображений по краям
            horizon: 0, // выравнивание изображений по вертикали. О для авто
            flankingItems: 4, // количество изображений, выводимых по обе стороны от главного

// анимация
            speed: 1000, // скорость ротации изображений в миллисекундах
            animationEasing: 'linear', // эффекты анимации
            quickerForFurther: true, // true - ускорение движения в центр при клике по боковым картинкам

// misc
            linkHandling: 2, // 0 - переход кликом по ссылке c любого изображения, 1 - запрет перехода, 2 - переход кликом по ссылке только c центрального изображения
            autoPlay: 1000, // время в миллисекундах между ротацией, 0 - только по клику, oтрицательное значение - смена направления ротации
            orientation: 'horizontal', // расположение карусели 'horizontal' или 'vertical'
            imageNav: true, // клик по любому изображению перемещает его в центр

// preloader
            preloadImages: true, // предварительная подготовка изображений да/нет
            forcedImageWidth: 0, // выравнивание ширины
            forcedImageHeight: 0, // выравнивание высоты
        });
    });
</script>
*/?>
<script type="text/javascript" src="<?=$url ?>fancybox/jquery.fancybox.js" tppabs="<?=$url ?>fancybox/jquery.fancybox.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".modalbox").fancybox();
	});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".extLink").fancybox({
			'width': '50%',
			'height': '85%',
			'autoScale': false,
			'transitionIn': 'none',
			'transitionOut': 'none',
			'type': 'iframe'
		});
		
	});
</script>

<script src="<?=$url ?><?=$url ?>cloud.github.com/downloads/digitalBush/jquery.maskedinput/jquery.maskedinput-1.3.min.js"
        tppabs="https://cloud.github.com/downloads/digitalBush/jquery.maskedinput/jquery.maskedinput-1.3.min.js"></script>
<script src="<?=$url ?>js/script.js" tppabs="<?=$url ?>js/script.js"></script>


<!-- #######################################FORM######################################################### -->



<!-- ##################################################################### --><!--<div style=""


<!-- ###################################################################### -->



<!-- ########################################################################## -->

<link rel="stylesheet" type="text/css" href="<?=$url ?>wp-content/themes/krasandko/css/style_popup.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/css/style_popup.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?=$url ?>wp-content/themes/krasandko/css/divs_popup.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/css/divs_popup.css" media="screen"/>
<link rel="stylesheet" href="<?=$url ?>wp-content/themes/krasandko/js/lightbox/themes/facebook/jquery.lightbox.css"
      tppabs="<?=$url ?>wp-content/themes/krasandko/js/lightbox/themes/facebook/jquery.lightbox.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"
        tppabs="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/raphael-min.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko//js/raphael-min.js"></script>
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/jquery.plugins-min.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko//js/jquery.plugins-min.js"></script>
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/smk-framework-min.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko//js/smk-framework-min.js"></script>
<?php      include "calculator_prices.js.php";
/* <script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/calculator_prices.js"
       tppabs="<?=$url ?>wp-content/themes/krasandko//calculator_prices.js"></script> */?>
<script type="text/javascript" src="<?=$url ?>wp-content/themes/krasandko/js/my_popup_script.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko//js/my_popup_script.js"></script>
<script src="<?=$url ?>wp-content/themes/krasandko/js/jquery.hyphen.ru.js"
        tppabs="<?=$url ?>wp-content/themes/krasandko/js/jquery.hyphen.ru.js"></script>
<script>
	$(function () {
		$('li').hyphenate();
	});
</script>



<div id="container" >
	<div class="body-wrapper">
		<!--ЗАГОЛОВОК-->
		<p style="text-align: center;"></p>
		
		<p style="text-align: center;"><span style="font-size: x-large;"><strong><span style="color: #ff0000;">ДетейлингофЪ:</span> <span style="font-size: x-large;"><strong><span style="color: #ff0000;">Он-Лайн Калькулятор</span> Малярно-Кузовных
    Работ</strong></span></p>
		
		<p style="text-align: center;"> </p>
		<!--ЗАГОЛОВОК-->
		
		<!-----------------------------RULER------------------------>
		<div class="ul_block">
			
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_01.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_01.png">
				<li><span style="color: #ff0000;"><b>Выбрать</b></span> в он-лайн каталоге поврежденную деталь.</li>
			</ul>
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_02.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_02.png">
				<li><span style="color: #ff0000;"><b>Кликнуть</b></span> на деталь, до появления окна выбора работ.</li>
			</ul>
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_03.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_03.png">
				<li><span style="color: #ff0000;"><b>Выбрать</b></span> сторону расположения детали и вид ремонта.</li>
			</ul>
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_04.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_04.png">
				<li><span style="color: #ff0000;"><b>Повторить</b></span> выбор для поврежденных деталей.</li>
			</ul>
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_05.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_05.png">
				<li><span style="color: #ff0000;"><b>Ознакомиться</b></span> с результатом расчетов в таблице.</li>
			</ul>
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_06.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_06.png">
				<li><span style="color: #ff0000;"><b>Отредактировать</b></span> в таблице тип ремонта и расположение.</li>
			</ul>
			<ul>
				<img src="<?=$url ?>wp-content/themes/krasandko/images/icon_07.png"
				     tppabs="<?=$url ?>wp-content/themes/krasandko/images/icon_07.png">
				<li><span style="color: #ff0000;"><b>Отправить</b></span> заявку на ремонт, заполнив поля формы.</li>
			</ul>
		</div>
		<!-----------------------------RULER------------------------>
		<div class="container">
			
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /*
<div class="div0"></div>

<a rel="lightbox" class="lightbox" href="#inline_div1">
    <div class="div1" onclick="work_selected(1)"></div>
</a>

<div id="inline_div1" class="works" style="display:none; ">
    <form action="" name="FormWork_01" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/001.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/001.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Пол <br>салона</p>
        </div>
        <div class="storona">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div2">
				<div class="div2" onclick="work_selected(2)"></div>
			</a>
			
			<div id="inline_div2" class="works" style="display:none; ">
				<form action="" name="FormWork_02" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/002.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/002.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Стекло<br>ветровое
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div3">
				<div class="div3" onclick="work_selected(3)"></div>
			</a>
			
			<div id="inline_div3" class="works" style="display:none; ">
				<form action="" name="FormWork_03" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/003.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/003.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Панель<br>крыши
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()" href="#close">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div4">
    <div class="div4" onclick="work_selected(4)"></div>
</a>

<div id="inline_div4" class="works" style="display:none; ">
    <form action="" name="FormWork_04" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/004.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/004.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Пол<br>багажника
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div>
<!--------------- LIGHTBOX WORK ----------------------------->
<!--------------- LIGHTBOX WORK ----------------------------->
<a rel="lightbox" class="lightbox" href="#inline_div5">
    <div class="div5" onclick="work_selected(5)"></div>
</a>

<div id="inline_div5" class="works" style="display:none; ">
    <form action="" name="FormWork_05" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/005.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/005.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Арка<br>внутренняя
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div6">
				<div class="div6" onclick="work_selected(6)"></div>
			</a>
			
			<div id="inline_div6" class="works" style="display:none; ">
				<form action="" name="FormWork_06" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/006.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/006.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Стекло<br>заднее
						</p>
					</div>
					<div class="storona">
						<p>
							
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div7">
    <div class="div7" onclick="work_selected(7)"></div>
</a>

<div id="inline_div7" class="works" style="display:none; ">
    <form action="" name="FormWork_07" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/007.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/007.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Арка<br>наружная
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div8">
				<div class="div8" onclick="work_selected(8)"></div>
			</a>
			
			<div id="inline_div8" class="works" style="display:none; ">
				<form action="" name="FormWork_08" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/008.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/008.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Крышка<br>багажника
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div9">
    <div class="div9" onclick="work_selected(9)"></div>
</a>

<div id="inline_div9" class="works" style="display:none; ">
    <form action="" name="FormWork_09" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/009.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/009.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Панель<br>задняя
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div10">
				<div class="div10" onclick="work_selected(10)"></div>
			</a>
			
			<div id="inline_div10" class="works" style="display:none; ">
				<form action="" name="FormWork_10" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/010.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/010.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Бампер<br>задний
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div11">
				<div class="div11" onclick="work_selected(11)"></div>
			</a>
			
			<div id="inline_div11" class="works" style="display:none; ">
				<form action="" name="FormWork_11" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/011.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/011.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Фонарь<br>задний
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div12">
    <div class="div12" onclick="work_selected(12)"></div>
</a>

<div id="inline_div12" class="works" style="display:none; ">
    <form action="" name="FormWork_12" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/012.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/012.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Лонжерон<br>задний
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div13">
				<div class="div13" onclick="work_selected(13)"></div>
			</a>
			
			<div id="inline_div13" class="works" style="display:none; ">
				<form action="" name="FormWork_13" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/013.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/013.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Крыло<br>заднее
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div14">
				<div class="div14" onclick="work_selected(14)"></div>
			</a>
			
			<div id="inline_div14" class="works" style="display:none; ">
				<form action="" name="FormWork_14" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/014.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/014.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Ручка<br>зад. двери
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div15">
				<div class="div15" onclick="work_selected(15)"></div>
			</a>
			
			<div id="inline_div15" class="works" style="display:none; ">
				<form action="" name="FormWork_15" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/015.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/015.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Дверь<br>задняя
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div16">
				<div class="div16" onclick="work_selected(16)"></div>
			</a>
			
			<div id="inline_div16" class="works" style="display:none; ">
				<form action="" name="FormWork_16" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/016.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/016.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Молдинг<br>зад. двери
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div17">
				<div class="div17" onclick="work_selected(17)"></div>
			</a>
			
			<div id="inline_div17" class="works" style="display:none; ">
				<form action="" name="FormWork_17" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/017.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/017.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Ручка<br>пер. двери
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div18">
				<div class="div18" onclick="work_selected(18)"></div>
			</a>
			
			<div id="inline_div18" class="works" style="display:none; ">
				<form action="" name="FormWork_18" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/018.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/018.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Дверь<br>передняя
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div19">
				<div class="div19" onclick="work_selected(19)"></div>
			</a>
			
			<div id="inline_div19" class="works" style="display:none; ">
				<form action="" name="FormWork_19" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/019.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/019.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Молдинг<br>пер. двери
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div20">
				<div class="div20" onclick="work_selected(20)"></div>
			</a>
			
			<div id="inline_div20" class="works" style="display:none; ">
				<form action="" name="FormWork_20" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/020.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/020.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Зеркало<br>наружное
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div21">
    <div class="div21" onclick="work_selected(21)"></div>
</a>

<div id="inline_div21" class="works" style="display:none; ">
    <form action="" name="FormWork_21" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/021.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/021.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Молдинг<br>крыла
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div22">
				<div class="div22" onclick="work_selected(22)"></div>
			</a>
			
			<div id="inline_div22" class="works" style="display:none; ">
				<form action="" name="FormWork_22" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/022.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/022.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Крыло<br>переднее
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div23">
				<div class="div23" onclick="work_selected(23)"></div>
			</a>
			
			<div id="inline_div23" class="works" style="display:none; ">
				<form action="" name="FormWork_23" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/023.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/023.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Порог<br>двери
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div24">
    <div class="div24" onclick="work_selected(24)"></div>
</a> 

<div id="inline_div24" class="works" style="display:none; ">
    <form action="" name="FormWork_24" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/024.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/024.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Стойка<br>центральная
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div>
<!--------------- LIGHTBOX WORK ----------------------------->
<!--------------- LIGHTBOX WORK ----------------------------->
<a rel="lightbox" class="lightbox" href="#inline_div25">
    <div class="div25" onclick="work_selected(25)"></div>
</a>

<div id="inline_div25" class="works" style="display:none; ">
    <form action="" name="FormWork_25" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/025.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/025.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Лонжерон<br>передний
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" disabled id="r1" type="radio" name="radio2"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div26">
				<div class="div26" onclick="work_selected(26)"></div>
			</a>
			
			<div id="inline_div26" class="works" style="display:none; ">
				<form action="" name="FormWork_26" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/026.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/026.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Бампер<br>передний
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div27">
				<div class="div27" onclick="work_selected(27)"></div>
			</a>
			
			<div id="inline_div27" class="works" style="display:none; ">
				<form action="" name="FormWork_27" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/027.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/027.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Блок-фара
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio2"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div28">
				<div class="div28" onclick="work_selected(28)"></div>
			</a>
			
			<div id="inline_div28" class="works" style="display:none; ">
				<form action="" name="FormWork_28" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/028.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/028.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Решётка<br>радиатора
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div29">
				<div class="div29" onclick="work_selected(29)"></div>
			</a>
			
			<div id="inline_div29" class="works" style="display:none; ">
				<form action="" name="FormWork_29" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/029.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/029.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Панель<br>передняя
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
			<a rel="lightbox" class="lightbox" href="#inline_div30">
				<div class="div30" onclick="work_selected(30)"></div>
			</a>
			
			<div id="inline_div30" class="works" style="display:none; ">
				<form action="" name="FormWork_30" method="post">
					<div class="image_b">
						<img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/030.png"
						     tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/030.png">
					</div>
					
					<div class="name_d">
						<p style="font-weight:bold; font-size:16px;">Капот
						</p>
					</div>
					<div class="storona">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
							<label class="point" for="r1">Слева</label>
							<br>
							<input class="point" disabled id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
							<label class="point" for="r1">Справа</label>
						</p>
					</div>
					<div class="remont">
						<hr id="a">
						<p>
							<input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
							<label class="point" for="r1">Замена без окраски</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
							<label class="point" for="r1">Замена с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
							<label class="point" for="r1">Лёгкий ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
							<label class="point" for="r1">Сложный ремонт с окраской</label>
							<br>
							<input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
							<label class="point" for="r1">Окраска без ремонта</label>
						</p>
						
						<div class="submit">
							<button type="button" onclick="add_to_table()">Выбрать</button>
							<button type="reset">Отмена</button>
						</div>
					</div>
				</form>
			</div>
			<!--------------- LIGHTBOX WORK ----------------------------->
			<!--------------- LIGHTBOX WORK ----------------------------->
            <?php /* <a rel="lightbox" class="lightbox" href="#inline_div31">
    <div class="div31" onclick="work_selected(31)"></div>
</a>

<div id="inline_div31" class="works" style="display:none; ">
    <form action="" name="FormWork_31" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/031.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/031.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Брызговик
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div>
<!--------------- LIGHTBOX WORK ----------------------------->
<!--------------- LIGHTBOX WORK ----------------------------->
<a rel="lightbox" class="lightbox" href="#inline_div32">
    <div class="div32" onclick="work_selected(32)"></div>
</a>

<div id="inline_div32" class="works" style="display:none; ">
    <form action="" name="FormWork_32" method="post">
        <div class="image_b">
            <img style="float:right;" src="<?=$url ?>wp-content/themes/krasandko/images/big/032.png"
                 tppabs="<?=$url ?>wp-content/themes/krasandko/images/big/032.png">
        </div>

        <div class="name_d">
            <p style="font-weight:bold; font-size:16px;">Стойка<br>передняя
            </p>
        </div>
        <div class="storona">
            <p>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('1')"/>
                <label class="point" for="r1">Слева</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio1" onchange="side_selected('2')"/>
                <label class="point" for="r1">Справа</label>
            </p>
        </div>
        <div class="remont">
            <hr id="a">
            <p>
                <input class="point" disabled id="r1" type="radio" name="radio2" onchange="check_selected('1')"/>
                <label class="point" for="r1">Замена без окраски</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('2')"/>
                <label class="point" for="r1">Замена с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('3')"/>
                <label class="point" for="r1">Лёгкий ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('4')"/>
                <label class="point" for="r1">Сложный ремонт с окраской</label>
                <br>
                <input class="point" id="r1" type="radio" name="radio2" onchange="check_selected('5')"/>
                <label class="point" for="r1">Окраска без ремонта</label>
            </p>

            <div class="submit">
                <button type="button" onclick="add_to_table()">Выбрать</button>
                <button type="reset">Отмена</button>
            </div>
        </div>
    </form>
</div> */?>
			<!--------------- LIGHTBOX WORK ----------------------------->
		</div>
		<form action="" name="kalk_form" id="kalk_form" method="post" class='contact-form'>
			<style>
				
				#price_table td {
					
					padding-left: 8px;
					padding-right: 8px;
					border: 1px solid #ccc;
					border-collapse: collapse;
					
				}
			</style>
			<table width="990" border="1" cellpadding="2" cellspacing="2" id="price_table" style="border-collapse: separate;">
				<tr >
					<th width="32" scope="col">№</th>
					<th width="372" scope="col">Наименование детали</th>
					<th width="126" scope="col">Лев./Прав.</th>
					<th width="257" scope="col">Выбор работ</th>
					<th width="169" scope="col">Стоимость, руб.</th>
					<th width="34" scope="col">Уд.</th>
				</tr>
			
			</table>
			<div class="itog" id="bitog"><p id="itog">0 руб.</p></div>
			<div class="itogo"><p>Итого:</p></div>
			<div class="clear"></div>
            <?php include 'form.php';?>
		
		
		</form>
		</p></p>
		<!--
        </body>
        </html>-->
		
		<!-- конец этих дивов <div id="container" >
        <div class="body-wrapper">--></strong>
		<script>
			$(document).ready(function() {
				
				console.log($('.jquery-lightbox-move').get())
			});
			
			$(window).on('scroll', function() {
				console.log($('body').scrollTop());
			});
		
		</script>

