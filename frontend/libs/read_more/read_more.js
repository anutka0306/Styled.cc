import $ from 'jquery'
import 'readmore-js'

$('.read-more-block').readmore({
    speed: 75,
    collapsedHeight: 350,
    moreLink: '<div class="read-more-button-wrapper"><div class="seo-box__more">Читать далее</div></div>',
    lessLink: '<div class="read-more-button-wrapper"><div class="seo-box__more is-show">Свернуть</div></div>',
});

$('.read-more-models').readmore({
    speed: 75,
    collapsedHeight: 320,
    moreLink: '<div class="read-more-models-button-wrapper"><div class="seo-box__more">Показать все</div></div>',
    lessLink: '<div class="read-more-models-button-wrapper"><div class="seo-box__more is-show">Свернуть</div></div>',
});