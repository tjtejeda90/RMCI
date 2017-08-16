/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
 (function( $ ) {
 	var masthead, menuToggle, siteNavContain, siteNavigation;

 	function initMainNavigation( container ) {

 		// Add dropdown toggle that displays child menu items.
 		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
 			.append( $( '<span />', { 'class': 'screen-reader-text', text: rmciScreenReaderText.expand }) );

 		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

 		container.find( '.dropdown-toggle' ).click( function( e ) {
 			var _this = $( this ),
 				screenReaderSpan = _this.find( '.screen-reader-text' ),
                siblingToggles = _this.parent( 'li' ).siblings( '.menu-item-has-children').children( '.dropdown-toggle' );

 			e.preventDefault();
 			_this.toggleClass( 'toggled' );
 			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled' );

 			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

 			screenReaderSpan.text( screenReaderSpan.text() === rmciScreenReaderText.expand ? rmciScreenReaderText.collapse : rmciScreenReaderText.expand );

            if ( ! _this.hasClass( 'toggled' ) && _this.parent( 'li' ).parent( 'ul' ).hasClass( 'menu' ) ) {
                container.find( '.dropdown-toggle' ).removeClass( 'toggled' );
                container.find( '.dropdown-toggle' ).attr( 'aria-expanded', 'false' );
                container.find( '.dropdown-toggle' ).children( '.screen-reader-text' ).text( rmciScreenReaderText.expand );
                container.find( '.dropdown-toggle' ).next( '.children, .sub-menu' ).removeClass( 'toggled' );
            }

            // Close sibling child menus when a new one is opened.
            if ( siblingToggles.hasClass( 'toggled' ) ) {
                siblingToggles.removeClass( 'toggled' );
                siblingToggles.attr( 'aria-expanded', 'false' );
                siblingToggles.children( '.screen-reader-text' ).text( rmciScreenReaderText.expand );
                siblingToggles.next( '.children, .sub-menu' ).removeClass( 'toggled' );
            }
 		});
 	}

 	initMainNavigation( $( '.main-navigation' ) );

    // Close all dropdown toggles when clicking outside of the primary menu.
    (function() {
        $(document).click( function( e ) {
            var primaryMenu = $( 'ul#primary-menu > li.menu-item-has-children, ul#primary-menu > li.page_item_has_children' );
            if ( ! primaryMenu.is( e.target ) && primaryMenu.has( e.target ).length === 0 ) {
                primaryMenu.find( 'ul, .dropdown-toggle' ).removeClass( 'toggled' );
                primaryMenu.find( '.dropdown-toggle' ).attr( 'aria-expanded', 'false' );
            }
        } );
    })();

 	masthead       = $( '#masthead' );
 	menuToggle     = masthead.find( '.menu-toggle' );
 	siteNavContain = masthead.find( '.main-navigation' );
 	siteNavigation = masthead.find( '.main-navigation > div > ul' );

 	// Enable menuToggle.
 	(function() {

 		// Return early if menuToggle is missing.
 		if ( ! menuToggle.length ) {
 			return;
 		}

 		// Add an initial value for the attribute.
 		menuToggle.attr( 'aria-expanded', 'false' );

 		menuToggle.on( 'click.rmci', function() {
 			siteNavContain.toggleClass( 'toggled' );

            $( this ).toggleClass( 'toggled' );
 			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled' ) );

            // Set body position to fixed when menu is open so the user can't scroll.
            $( 'html, body' ).toggleClass( 'fixed' );
            //document.body.style.overflow = ( document.body.style.overflow === 'hidden' ? '' : 'hidden' );
 		});
 	})();

 	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
 	(function() {
 		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
 			return;
 		}

 		// Toggle `focus` class to allow submenu access on tablets.
 		function toggleFocusClassTouchScreen() {
 			if ( 'none' === $( '.menu-toggle' ).css( 'display' ) ) {

 				$( document.body ).on( 'touchstart.rmci', function( e ) {
 					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
 						$( '.main-navigation li' ).removeClass( 'focus' );
 					}
 				});

 				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
 					.on( 'touchstart.rmci', function( e ) {
 						var el = $( this ).parent( 'li' );

 						if ( ! el.hasClass( 'focus' ) ) {
 							e.preventDefault();
 							el.toggleClass( 'focus' );
 							el.siblings( '.focus' ).removeClass( 'focus' );
 						}
 					});

 			} else {
 				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.rmci' );
 			}
 		}

 		if ( 'ontouchstart' in window ) {
 			$( window ).on( 'resize.rmci', toggleFocusClassTouchScreen );
 			toggleFocusClassTouchScreen();
 		}

 		siteNavigation.find( 'a' ).on( 'focus.rmci blur.rmci', function() {
 			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
 		});
 	})();
 })( jQuery );
