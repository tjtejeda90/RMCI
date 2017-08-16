/**
 * File woof-products-filter.js.
 *
 * Handles toggling of the WOOF products filter form.
 */

 (function( $ ) {
     var button = $( '.widget-title' );

     button.click( function( e ) {
         $( '.woof_sid_widget' ).toggleClass( 'toggled' );
     });

 })( jQuery );
