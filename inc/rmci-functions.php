<?php
/**
 * rmci functions.
 *
 * @package rmci
 */

if ( ! function_exists( 'rmci_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function rmci_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.0.0
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function rmci_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

// Remove category count.
function rmci_subcategory_count_html() {
	return '';
}
add_filter( 'woocommerce_subcategory_count_html', 'rmci_subcategory_count_html' );


if( ! function_exists( 'rmci_is_product_subcategory' ) ) {
    /*
     * Custom function to check if the product archive is showing subcategories.
     *
     * @since 1.0.0
     */

    function rmci_is_product_archive() {

        if( is_product_category() ) {
            $category_id = get_queried_object_id();
            $subcategories = get_term_children( $category_id, 'product_cat' );
            if( empty($subcategories) ) {
                return true;
            }

            return false;

        }
    }
}
