import $ from 'jquery'
import 'readmore-js'
import '../../scss/blocks/read_more.scss'

$('.read-more-block').readmore({
	speed: 75,
	collapsedHeight:350,
	moreLink: '<div class="read-more-button-wrapper"><div class="primary_button">Читать далее</div></div>',
	lessLink: '<div class="read-more-button-wrapper"><div class="primary_button">Свернуть</div></div>',
});

$('.read-more-models').readmore({
	speed: 75,
	collapsedHeight:320,
	moreLink: '<div class="read-more-models-button-wrapper"><div class="primary_button">Показать все</div></div>',
	lessLink: '<div class="read-more-models-button-wrapper"><div class="primary_button">Свернуть</div></div>',
});