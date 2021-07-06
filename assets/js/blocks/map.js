import $ from 'jquery'
//Переменная для включения/отключения индикатора загрузки
var spinner = $('.ymap-container').children('.loader');
//Переменная для определения была ли хоть раз загружена Яндекс.Карта (чтобы избежать повторной загрузки при наведении)
var check_if_load = false;
//Необходимые переменные для того, чтобы задать координаты на Яндекс.Карте
var map, myPlacemarkTemp;

//Функция создания карты сайта и затем вставки ее в блок с идентификатором "map-yandex"
function init() {
	var map = new ymaps.Map("map-yandex", {
			center: [55.775695, 37.613371],
			zoom: 10,
			controls: ['zoomControl', 'fullscreenControl']
		}),
		MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
			'<div class="map-baloon">' +
			'<a class="close" href="#">&times;</a>' +
			'<div class="arrow"></div>' +
			'$[[options.contentLayout observeSize minWidth=235 maxWidth=235 maxHeight=350]]' +
			'</div>', {
				build: function () {
					this.constructor.superclass.build.call(this);
					
					this._$element = $('.map-baloon', this.getParentElement());
					
					this.applyElementOffset();
					
					this._$element.find('.close')
						.on('click', $.proxy(this.onCloseClick, this));
				},
				clear: function () {
					this._$element.find('.close')
						.off('click');
					
					this.constructor.superclass.clear.call(this);
				},
				onSublayoutSizeChange: function () {
					MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);
					
					if (!this._isElement(this._$element)) {
						return;
					}
					
					this.events.fire('shapechange');
				},
				applyElementOffset: function () {
					this._$element.css({
						left: -(this._$element[0].offsetWidth / 2),
						top: -(this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight)
					});
				},
				onCloseClick: function (e) {
					e.preventDefault();
					this.events.fire('userclose');
				},
				getShape: function () {
					if (!this._isElement(this._$element)) {
						return MyBalloonLayout.superclass.getShape.call(this);
					}
					
					var position = this._$element.position();
					
					return new ymaps.shape.Rectangle(new ymaps.geometry.pixel.Rectangle([
						[position.left, position.top], [
							position.left + this._$element[0].offsetWidth,
							position.top + this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight
						]
					]));
				},
				_isElement: function (element) {
					return element && element[0] && element.find('.arrow')[0];
				}
			}
		),
		MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
			'<div>$[properties.balloonContent]</div>'
		),
		lob = window.myPlacemark = new ymaps.Placemark([55.892138, 37.524166], {
			hintContent: 'Лобненская',
			balloonContent: '<div class="map-info">' +
			'<div class="map-info__title">Лобненская</div>' +
			'<div class="map-info__phone">Телефон</div>' +
			'<div class="map-info__phone-number"><a href="tel:+74951507078">+7(495) 150-70-78</a></div>' +
			'<div class="map-info__adress">Адрес</div>' +
			'<div class="map-info__adress-info">ул. Лобненская, 17 стр.1</div>' +
			'<div class="map-info__btn map-info__btn-links">Проложить маршрут' +
			'<div class="map-info__btn__content">\n' +
			'<a href="https://yandex.ru/maps/213/moscow/?ll=37.522588%2C55.891251&mode=routes&rtext=~55.892138%2C37.524166&rtt=auto&sll=37.726797%2C55.657246&sspn=0.889206%2C0.284548&text=%D1%83%D0%BB.%20%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%20%D1%81%D1%82%D1%80.1&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=15" target="_blank"  data-name="Лобненская" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' +
			'<a href="yandexnavi://build_route_on_map?lat_to=55.892138&lon_to=37.524166" target="_blank"  data-name="Лобненская" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' +
			'<a href="https://www.google.ru/maps/dir//%D1%83%D0%BB.+%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F,+17,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127644/@55.8918798,37.5189218,15.75z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46b539cffbd294dd:0x35fa4f70919e3ab5!2m2!1d37.5241599!2d55.892144" target="_blank"  data-name="Лобненская" data-map="гугл карты" class="marsh">Google Maps</a>\n' +
			'</div>' +
			'</div>' +
			'<div class="map-info__btn popup-trigger">Записаться</div>' +
			'</div>',
			iconCaption: 'Лобненская'
		}, {
			iconLayout: 'default#imageWithContent',
			iconImageHref: '/img/map/map-baloon.png',
			iconImageSize: [40, 56],
			iconImageOffset: [0, -38],
			balloonShadow: false,
			balloonLayout: MyBalloonLayout,
			balloonContentLayout: MyBalloonContentLayout,
			balloonPanelMaxMapArea: 0
		}),
		nizh = window.myPlacemark = new ymaps.Placemark([55.730036, 37.725280], {
			hintContent: 'Нижегородская',
			balloonContent: '<div class="map-info">' +
			'<div class="map-info__title">Нижегородская</div>' +
			'<div class="map-info__phone">Телефон</div>' +
			'<div class="map-info__phone-number"><a href="tel:+74950232190">+7 (495) 023-21-90</a></div>' +
			'<div class="map-info__adress">Адрес</div>' +
			'<div class="map-info__adress-info">Нижегородская 102 стр.3А</div>' +
			'<div class="map-info__btn map-info__btn-links">Проложить маршрут' +
			'<div class="map-info__btn__content">\n' +
			'<a href="https://yandex.ru/maps/213/moscow/?ll=37.725280%2C55.730036&mode=routes&rtext=~55.730036%2C37.725280&rtt=auto&sll=37.726797%2C55.657246&sspn=1.009369%2C0.319486&text=%D0%9D%D0%B8%D0%B6%D0%B5%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D1%8F%20102%20%D1%81%D1%82%D1%80.3%D0%90&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=17" target="_blank" data-name="Нижегородская" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' +
			'<a href="yandexnavi://build_route_on_map?lat_to=55.730036&lon_to=37.725280" target="_blank" data-name="Нижегородская" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' +
			'<a href="https://www.google.ru/maps/dir//%D0%9D%D0%B8%D0%B6%D0%B5%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+102,+3%D0%90,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+109052/@55.7300721,37.7138392,14.25z/data=!4m8!4m7!1m0!1m5!1m1!1s0x414ab547e4c38c61:0x28780ebee25c0df!2m2!1d37.7249284!2d55.7305072" target="_blank" data-name="Нижегородская" data-map="гугл карты" class="marsh">Google Maps</a>\n' +
			'</div>' +
			'</div>' +
			'<div class="map-info__btn popup-trigger">Записаться</div>' +
			'</div>',
			iconCaption: 'Нижегородская'
		}, {
			iconLayout: 'default#imageWithContent',
			iconImageHref: '',
			iconImageSize: [0, 0],
			iconContent: '',
			iconImageOffset: [0, 0],
			balloonShadow: false,
			balloonLayout: MyBalloonLayout,
			balloonContentLayout: MyBalloonContentLayout,
			balloonPanelMaxMapArea: 0
			
		}),
		udal = window.myPlacemark = new ymaps.Placemark([55.687766, 37.488125], {
			hintContent: 'Удальцова',
			balloonContent: '<div class="map-info">' +
			'<div class="map-info__title">Удальцова</div>' +
			'<div class="map-info__phone">Телефон</div>' +
			'<div class="map-info__phone-number"><a href="tel:+74953748856">+7(495) 374-88-56</a></div>' +
			'<div class="map-info__adress">Адрес</div>' +
			'<div class="map-info__adress-info">ул. Удальцова, 60</div>' +
			'<div class="map-info__btn map-info__btn-links">Проложить маршрут' +
			'<div class="map-info__btn__content">\n' +
			'<a href="https://yandex.ru/maps/213/moscow/?ll=37.488125%2C55.687766&mode=routes&rtext=~55.687766%2C37.488125&rtt=auto&sll=37.725280%2C55.730036&sspn=0.015771%2C0.004983&text=%D1%83%D0%BB.%20%D0%A3%D0%B4%D0%B0%D0%BB%D1%8C%D1%86%D0%BE%D0%B2%D0%B0%2C%2060&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=17" target="_blank" data-name="Удальцова" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' +
			'<a href="yandexnavi://build_route_on_map?lat_to=55.730036&lon_to=37.725280" target="_blank" data-name="Удальцова" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' +
			'<a href="https://www.google.ru/maps/dir//%D1%83%D0%BB.+%D0%A3%D0%B4%D0%B0%D0%BB%D1%8C%D1%86%D0%BE%D0%B2%D0%B0,+60,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+119607/@55.6877711,37.4831173,15.75z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46b54c4c6219af57:0xad55ab00c4c7519d!2m2!1d37.4880468!2d55.6877346" target="_blank" data-name="Удальцова" data-map="гугл карты" class="marsh">Google Maps</a>\n' +
			'</div>' +
			'</div>' +
			'<div class="map-info__btn popup-trigger">Записаться</div>' +
			'</div>',
			iconCaption: 'Удальцова'
		}, {
			iconLayout: 'default#imageWithContent',
			iconImageHref: '/img/map/map-baloon.png',
			iconImageSize: [40, 56],
			iconContent: 'Удальцова',
			iconImageOffset: [0, -38],
			balloonShadow: false,
			balloonLayout: MyBalloonLayout,
			balloonContentLayout: MyBalloonContentLayout,
			balloonPanelMaxMapArea: 0
			
		}),
		sevastop = window.myPlacemark = new ymaps.Placemark([55.635345, 37.543578], {
			hintContent: 'Севастопольский',
			balloonContent: '<div class="map-info">' +
			'<div class="map-info__title">Севастопольский</div>' +
			'<div class="map-info__phone">Телефон</div>' +
			'<div class="map-info__phone-number"><a href="tel:+74953747712">+7(495) 374-77-12</a></div>' +
			'<div class="map-info__adress">Адрес</div>' +
			'<div class="map-info__adress-info">Севастопольский пр-т, 95б</div>' +
			'<div class="map-info__btn map-info__btn-links">Проложить маршрут' +
			'<div class="map-info__btn__content">\n' +
			'<a href="https://yandex.ru/maps/213/moscow/?ll=37.543972%2C55.635318&mode=routes&rtext=~55.635345%2C37.543578&rtt=auto&sll=37.488125%2C55.687766&sspn=0.015771%2C0.005206&text=%D0%A1%D0%B5%D0%B2%D0%B0%D1%81%D1%82%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9%20%D0%BF%D1%80-%D1%82%2C%2095%D0%B1&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=18" target="_blank" data-name="Севастопольский" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' +
			'<a href="yandexnavi://build_route_on_map?lat_to=55.635345&lon_to=37.543578" target="_blank"  data-name="Севастопольский" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' +
			'<a href="https://www.google.ru/maps/dir//%D0%A1%D0%B5%D0%B2%D0%B0%D1%81%D1%82%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9+%D0%BF%D1%80.,+95%D0%91,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+117342/@55.6353295,37.5393014,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x414ab2b520b9d46b:0x2a38af8b6d18744d!2m2!1d37.5436788!2d55.6353296" target="_blank" data-name="Севастопольский" data-map="гугл карты" class="marsh">Google Maps</a>\n' +
			'</div>' +
			'</div>' +
			'<div class="map-info__btn popup-trigger">Записаться</div>' +
			'</div>',
			iconCaption: 'Севастопольский'
		}, {
			iconLayout: 'default#imageWithContent',
			iconImageHref: '/img/map/map-baloon.png',
			iconImageSize: [40, 56],
			iconContent: 'Севастопольский',
			iconImageOffset: [0, -38],
			balloonShadow: false,
			balloonLayout: MyBalloonLayout,
			balloonContentLayout: MyBalloonContentLayout,
			balloonPanelMaxMapArea: 0
			
		});
	
	map.geoObjects
		.add(sevastop)
		.add(lob);
	if (!is_detejling) {
		map.geoObjects
			.add(udal);
	}
	
	if ($(window).width() < 768) {
		map.behaviors.disable('scrollZoom');
		map.behaviors.disable('drag');
	}
	
	// Получаем первый экземпляр коллекции слоев, потом первый слой коллекции
	var layer = map.layers.get(0).get(0);
	
	// Решение по callback-у для определния полной загрузки карты
	waitForTilesLoad(layer).then(function () {
		// Скрываем индикатор загрузки после полной загрузки карты
		spinner.removeClass('is-active');
	});
}

// Функция для определения полной загрузки карты (на самом деле проверяется загрузка тайлов) 
function waitForTilesLoad(layer) {
	return new ymaps.vow.Promise(function (resolve, reject) {
		var tc = getTileContainer(layer), readyAll = true;
		tc.tiles.each(function (tile, number) {
			if (!tile.isReady()) {
				readyAll = false;
			}
		});
		if (readyAll) {
			resolve();
		} else {
			tc.events.once("ready", function () {
				resolve();
			});
		}
	});
}

function getTileContainer(layer) {
	for (var k in layer) {
		if (layer.hasOwnProperty(k)) {
			if (
				layer[k] instanceof ymaps.layer.tileContainer.CanvasContainer
				|| layer[k] instanceof ymaps.layer.tileContainer.DomContainer
			) {
				return layer[k];
			}
		}
	}
	return null;
}

// Функция загрузки API Яндекс.Карт по требованию (в нашем случае при наведении)
function loadScript(url, callback) {
	var script = document.createElement("script");
	
	if (script.readyState) {  // IE
		script.onreadystatechange = function () {
			if (script.readyState == "loaded" ||
				script.readyState == "complete") {
				script.onreadystatechange = null;
				callback();
			}
		};
	} else {  // Другие браузеры
		script.onload = function () {
			callback();
		};
	}
	
	script.src = url;
	document.getElementsByTagName("head")[0].appendChild(script);
}

// Основная функция, которая проверяет когда мы навели на блок с классом "ymap-container"
var ymap = function () {
	$('.ymap-container').mouseenter(function () {
			if (!check_if_load) { // проверяем первый ли раз загружается Яндекс.Карта, если да, то загружаем
				
				// Чтобы не было повторной загрузки карты, мы изменяем значение переменной
				check_if_load = true;
				
				// Показываем индикатор загрузки до тех пор, пока карта не загрузится
				spinner.addClass('is-active');
				
				// Загружаем API Яндекс.Карт
				loadScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;loadByRequire=1", function () {
					// Как только API Яндекс.Карт загрузились, сразу формируем карту и помещаем в блок с идентификатором "map-yandex"
					ymaps.load(init);
				});
			}
		}
	);
}

$(function () {
	
	//Запускаем основную функцию
	ymap();
	
});