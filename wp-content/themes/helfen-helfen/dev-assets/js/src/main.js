(function($) {
	'use strict';

	/* Bilder per LazyLoad laden */
	var lazyLoadInstance = new LazyLoad({
		elements_selector: ".lazy"

	});

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

	/* In den Full-Image Block den ScrollDown Pfeil einfügen */
	$('.wp-block-cover.fullpage').append(global_vars.txt.arrow_bottom);

	/* 100vh herunterscrollen nach Klick auf das Scroll Down Icon */
	$(document).on('click', '.fullpageArrowBottom', function() {
		scrollDown();
	});

	/* Resize Funktion für 100 vh und 100 vw Relationen */
	function resize() {
		var vheight = $(window).height();
		var vwidth = $(window).width();
		$('.wp-block-cover.fullpage').css({
		  'height': vheight,
		  'width': vwidth 
		});
	};
	resize();

	/* Beim Scrollen die Sizes jeweils neu berechnen */
	$(window).resize(function() {
		resize();
	});

	// Scroll Down Funktion für Button auf fullpage Bild
	function scrollDown() {
		var vheight = $(window).height();
		$('html, body').animate({
		scrollTop: (Math.floor($(window).scrollTop() / vheight)+1) * vheight
		}, 500);  
	};

	/* Prüfen ob auf der Seite einen Countdown angezeigt werden muss, falls ja CountDown ausgeben */
	if($('div[data-countdownto]').length) {
		$('div[data-countdownto]').each(function() {
			var countdownContainer = $(this);
			var countdownDateTime = countdownContainer.data('countdownto');
			// Set the date we're counting down to
			var countDownDate = new Date(countdownDateTime).getTime();
			// Update the count down every 1 second
			var x = setInterval(function() {
				var now = new Date().getTime();

				// Find the distance between now and the count down date
				var distance = countDownDate - now;

				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				/* Counter ausgeben */
				$('.countdownValue.days').text(days);
				$('.countdownValue.hours').text(hours);
				$('.countdownValue.minutes').text(minutes);
				$('.countdownValue.seconds').text(seconds);
			}, 1000);
		});
	}

	/* Bei einem Block wo es die Klasse "inline-columns" gibt müssen die Container Klassen entfernt werden */
	var inline_columns = $('.inline-columns');
	if(inline_columns.length) {
		inline_columns.find('.container').removeClass('container').find('.row').removeClass('row justify-content-center').find('.col-12').removeClass('col-12 col-lg-9');
	}

})(jQuery);