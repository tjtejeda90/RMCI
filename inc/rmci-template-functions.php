<?php
/**
 * RMCI Template Functions
 *
 * Functions used for rmci templates.
 *
 * @author 		Thomas Tejeda
 * @package 	RMCI/Templates
 * @version     1.0.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
     exit; // Exit if accessed directly
 }

 if ( ! function_exists( 'rmci_content_header_wrapper' ) ) {

   /**
    * Output content header wrapper.
    *
    */
    function rmci_content_header_wrapper() {

        echo '<header class="content-header">';

    }
}

if ( ! function_exists( 'rmci_content_header_wrapper_close' ) ) {

   /**
    * Output content header wrapper close.
    *
    */
   function rmci_content_header_wrapper_close() {

       echo '</header>';

   }
}

 if ( ! function_exists( 'rmci_show_page_title' ) ) {

 	/**
 	 * Output page title.
 	 *
 	 */
    function rmci_show_page_title() {

        ?>
        <div class="archive-info clear">
        <?php

        if ( apply_filters( 'woocommerce_show_page_title', true ) ) {

            ?>
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
            <?php

        }
    }
}

if ( ! function_exists( 'rmci_woof_top_panel' ) ) {

    /**
    * Output the WOOF products filter top panel.
    * Change the 'Hide woof top panel buttons' option to 'Yes' in WooCommerce > Settings > Products Fitler > Options.
    */
    function rmci_woof_top_panel() {

        if( rmci_is_product_archive() || is_product_tag()) {

           ?>
           <div class="woof_products_top_panel"></div>
           <?php

        }
    }
}


if ( ! function_exists( 'rmci_archive_info_end' ) ) {

    /**
    * Output closing div for archive-info
    *
    */
    function rmci_archive_info_end() {

        if( rmci_is_product_archive() || is_product_tag() ) {

           ?>
           </div><!-- .archive-info -->
           <?php

        }
    }
}




 // Change the default woocommerce_output_content_wrapper() function.
if ( ! function_exists( 'woocommerce_output_content_wrapper' ) ) {

	/**
	 * Output the start of the page wrapper.
	 *
	 */
	function woocommerce_output_content_wrapper() {
		?>
        <section id="primary" <?php if( ! rmci_is_product_archive() && ! is_product_tag() ) { echo 'class="full-width-content"'; } ?>>
        <?php
	}
}

 // Change the default woocommerce_output_content_wrapper_end() function.
if ( ! function_exists( 'woocommerce_output_content_wrapper_end' ) ) {

	/**
	 * Output the end of the page wrapper.
	 *
	 */
	function woocommerce_output_content_wrapper_end() {
		?>
        </section><!-- #primary -->
        <?php
	}
}


// Open container for WooSwipe image gallery.
if ( ! function_exists( 'rmci_product_summary_container' ) ) {

   /**
    * Output the start of the gallery wrapper.
    *
    */
    function rmci_product_summary_container() {

        ?>
        <div class="product-summary-container">
        <?php

    }
}

// Close container for WooSwipe image gallery.
if ( ! function_exists( 'rmci_product_summary_container_end' ) ) {

   /**
    * Output the end of the gallery wrapper.
    *
    */
    function rmci_product_summary_container_end() {

        ?>
        </div><!-- .product-summary-container -->
        <?php

    }
}

if ( ! function_exists( 'rmci_template_single_sku' ) ) {

	/**
	 * Output the product sku.
	 *
	 * @subpackage	Product
	 */
	function rmci_template_single_sku() {
		wc_get_template( 'single-product/sku.php' );
	}
}

// Make changes to the default woocommerce_catalog_orderby filter. See woocommerce_catalog_ordering() function.
function rmci_custom_catalog_orderby( $array ) {

    unset( $array['popularity'] );
    unset( $array['date'] );

    return $array;
}
add_filter( 'woocommerce_catalog_orderby', 'rmci_custom_catalog_orderby' );

// Change default loop_shop_columns to 3.
function rmci_loop_shop_columns( $int ) {
    return $int = 3;
}
add_filter( 'loop_shop_columns', 'rmci_loop_shop_columns' );

// Change the default WooCommerce home breadcrumb text to products.
function rmci_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['home'] = 'Products';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'rmci_change_breadcrumb_home_text' );

// Change the default WooCommerce breadcrumb home link to the product page link.
function rmci_custom_breadrumb_home_url() {
    return 'http://robinsonmfgcoinc.com/new-dev/products';
}
add_filter( 'woocommerce_breadcrumb_home_url', 'rmci_custom_breadrumb_home_url' );

// Remove the heading from the product description tag on the single product page.
add_filter( 'woocommerce_product_description_heading', '__return_false' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );


// Change the default WooSwipe zoomed product image size.
function rmci_wooswipe_zoomed_image_size( $zoomed_image_size ) {
    return $zoomed_image_size = array(1024, 1024);
}
add_filter( 'wooswipe_zoomed_image_size', 'rmci_wooswipe_zoomed_image_size' );
