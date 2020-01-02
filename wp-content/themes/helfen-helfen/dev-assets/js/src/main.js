(function($) {
	'use strict';

	/* Slick Full Page Carousel laden */
	var fullSlider = $('.hh-full-carousel');
	fullSlider.slick({
		infinite: false,
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-arrow-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-arrow-right"></i></button>',
		responsive: [
			{
				breakpoint: 769,
				settings: {
					slidesToShow: 1,
					arrows: false,
					dots: true
				}
			}
		]
	});

	/* Slick Slider über das Mausrad steuern */
	fullSlider.on('wheel', (function(e) {
		e.preventDefault();
		if (e.originalEvent.deltaY < 0) {
		  $(this).slick('slickNext');
		} else {
		  $(this).slick('slickPrev');
		}
	}));

	/* Aktionen ausführen wenn auf den Hamburger Button gedrückt wird */
	var hamburger = $('.hamburger');
	hamburger.on('click', function() {
		hamburger.toggleClass('is-active');
		$('#mainMenu').toggleClass('active');
		invertBTNs();
	});

	/* Funktion die Menübutton und Logo invertiert / bzw wieder normal darstellt */
	function invertBTNs() {
		/* Logo invertieren */
		$('#logoContainer').toggleClass('invert');
		$('.logo-normal').toggleClass('d-none');
		$('.logo-invert').toggleClass('d-none');
		/* Menübutton invertieren */
		$('#menuButton').toggleClass('invert');
	}

	/* Im Menü Inhalt mit dynamischen Content füllen */
	$('.menu-item.menu-item-has-children:not(.hovered-menu)').on('mouseover', function () {
		$('.menu-item a').removeClass('underline');
		var dynamicContent = $('.dynamic-menu-content');
		//dynamicContent.removeClass('active');
		//dynamicContent.html('');
		var $this = $(this);
		$this.find('a').addClass('underline');
		var subMenu;
		//$this.addClass('hovered-menu');
		setTimeout(function() {
			/* Untermenü finden */
			subMenu = $this.find('.sub-menu').html();
			/* Inhalt im dynamischen Content zeichnen */
			dynamicContent.html('<ul class="list-unstyled custom-sub-menu">'+subMenu+'</ul>');
			dynamicContent.addClass('active');
		}, 500);
	});

	/* News in den dynamischen Inhalt füllen */
	$('.menu-news').on('mouseover', function() {
		setTimeout(function() {
			var dynamicContent = $('.dynamic-menu-content');
			var newsContent = $('#menuNewsContent').html();
			dynamicContent.html('');
			dynamicContent.removeClass('active');
			dynamicContent.html(newsContent);
			dynamicContent.addClass('active');
		}, 150);
	});

	/* Dynamischer Content leeren, wenn nichts relevantes selektiert wird */
	$('.menu-item:not(.menu-item-has-children)').on('mouseover', function () {
		var dynamicContent = $('.dynamic-menu-content');
		dynamicContent.removeClass('active');
		dynamicContent.html('');
		$('.menu-item a').removeClass('underline');
		setTimeout(function() {
			dynamicContent.html('');
			dynamicContent.removeClass('active');
			$('.menu-item a').removeClass('underline');
		}, 100);
	});

	/* Counter Block: Counter aktivieren */
	$('.js_counter').rCounter({
		duration: 40
	});



})(jQuery);