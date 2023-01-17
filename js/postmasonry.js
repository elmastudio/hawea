/* global screenReaderText */
/**
 * Posts Masonry file.
 *
 */

( function( $ ) {

	/*
	 * Resize post-wrapper for full width on small screens.
	 */

	$( window ).load( function() {

		var post_wrapper = $( '#masonry-wrap' );

		post_wrapper.imagesLoaded( function() {
	
			if ( $( 'body' ).hasClass( 'rtl' ) ) {
				post_wrapper.masonry( {
					columnWidth: 10,
					itemSelector: '.product-category',
					isOriginLeft: false
				} );
			} else {
				post_wrapper.masonry( {
					columnWidth: 10,
					itemSelector: '.product-category',
				} );
			}

			// Show the blocks
			$( '.product-category' ).animate( {
				'opacity' : 1
			}, 250 );
	
		} );

	} );
	
	$( window ).load( function() {

		var post_wrapper = $( '#post-container' );

		post_wrapper.imagesLoaded( function() {
	
			if ( $( 'body' ).hasClass( 'rtl' ) ) {
				post_wrapper.masonry( {
					columnWidth: '.grid-sizer',
					itemSelector: 'article',
					isOriginLeft: false
				} );
			} else {
				post_wrapper.masonry( {
					columnWidth: '.grid-sizer',
					itemSelector: 'article',
				} );
			}

			// Show the blocks
			$( 'article' ).animate( {
				'opacity' : 1
			}, 250 );
	
		} );

	} );

} )( jQuery );
