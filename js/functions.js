/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 *
 * @version 1.0.1
 */

( function( $ ) {
	var $body, $window, $sidebar, adminbarOffset, top = false,
			bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
			topOffset = 0, bodyHeight, sidebarHeight, resizeTimer,
		secondary, button;


	// Mobile Main Menu.
		$('#site-navigation').hide();
	$('#menu-main-toggle').on( 'click', function () {
		$('#site-navigation').slideToggle('fast');
		$('body').toggleClass('nav-open');
		});

	// Slider Header Front Page
	$(document).ready(function(){
		$('.front-slider-content').slick({
			dots: false,
			slidesToShow: 1,
			adaptiveHeight: true,
			arrows: false,
			autoplay: true,
			speed: 2100,
			cssEase: 'ease',
			autoplaySpeed: 6000,
			draggable: true,
			pauseOnHover: false,
			fade: true,
			infinite: true
			});
	});


	// Elements FadeIn Effect
	$(document).ready(function() {
		$('.type-product').addClass("hidden").viewportChecker({
				classToAdd: 'visible animated fadeIn',
				offset: 100,
				removeClassAfterAnimation: false
			 });
	});

	//Smooth Scroll
		$(function() {
		$('.smooth').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});


	// DropDown Menu for Mobile
	// Add dropdown toggle that display child menu items.
	$( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

	$( '.dropdown-toggle' ).click( function( e ) {
		var _this = $( this );
		e.preventDefault();
		_this.toggleClass( 'toggle-on' );
		_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
		_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
	} );

	secondary = $( '#secondary' );
	button = $( '.site-branding' ).find( '.secondary-toggle' );

	// Enable menu toggle for small screens.
	( function() {
		var menu, widgets, social;
		if ( ! secondary || ! button ) {
			return;
		}

		// Hide button if there are no widgets and the menus are missing or empty.
		menu    = secondary.find( '.nav-menu' );
		widgets = secondary.find( '#widget-area' );
		social  = secondary.find( '#social-navigation' );
		if ( ! widgets.length && ! social.length && ( ! menu || ! menu.children().length ) ) {
			button.hide();
			return;
		}

		button.on( 'click.weta', function() {
			secondary.toggleClass( 'toggled-on' );
			secondary.trigger( 'resize' );
			$( this ).toggleClass( 'toggled-on' );
			if ( $( this, secondary ).hasClass( 'toggled-on' ) ) {
				$( this ).attr( 'aria-expanded', 'true' );
				secondary.attr( 'aria-expanded', 'true' );
			} else {
				$( this ).attr( 'aria-expanded', 'false' );
				secondary.attr( 'aria-expanded', 'false' );
			}
		} );
	} )();

	/**
	 * @summary Add or remove ARIA attributes.
	 * Uses jQuery's width() function to determine the size of the window and add
	 * the default ARIA attributes for the menu toggle if it's visible.
	 * @since Twenty Fifteen 1.1
	 */
	function onResizeARIA() {
		if ( 1022 > $window.width() ) {
			button.attr( 'aria-expanded', 'false' );
			secondary.attr( 'aria-expanded', 'false' );
			button.attr( 'aria-controls', 'secondary' );
		} else {
			button.removeAttr( 'aria-expanded' );
			secondary.removeAttr( 'aria-expanded' );
			button.removeAttr( 'aria-controls' );
		}
	}




} )( jQuery );
