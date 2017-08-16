<?php
/**
 * RMCI Template Hooks
 *
 * Action/filter hooks used for rmci templates.
 *
 * @author 		Thomas Tejeda
 * @package 	RMCI/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

 /**
  * woocommerce_before_main_content hook.
  *
  * @unhooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
  * @unhooked woocommerce_breadcrumb -             20
  *
  * @hooked woocommerce_breadcrumb -       10
  * @hooked woocommerce_result_count -     20
  * @hooked woocommerce_catalog_ordering - 30
  */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',             20 );

add_action( 'woocommerce_before_main_content', 'rmci_content_header_wrapper',        10 );
add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',             20 );
add_action( 'woocommerce_before_main_content', 'rmci_content_header_wrapper_close',  30 );
add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar',            40 );
add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 50 );

 /**
  * woocommerce_before_shop_loop hook.
  *
  * @hooked rmci_show_page_title -         10
  * @hooked woocommerce_result_count -     20
  * @hooked woocommerce_catalog_ordering - 30
  * @hooked rmci_woof_top_panel -          40
  */
add_action( 'woocommerce_before_shop_loop', 'rmci_show_page_title', 10 );
add_action( 'woocommerce_before_shop_loop', 'rmci_woof_top_panel',  40 );
add_action( 'woocommerce_before_shop_loop', 'rmci_archive_info_end',  50 );

/**
 * woocommerce_sidebar hook.
 *
 * @unhooked woocommerce_get_sidebar - 10
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * woocommerce_before_single_product_summary.
 *
 * @unhooked woocommerce_show_product_sale_flash - 10
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'rmci_product_summary_container', 10 );


/**
 * woocommerce_single_product_summary.
 *
 * @unhooked woocommerce_template_single_rating -      10
 * @unhooked woocommerce_template_single_add_to_cart - 30
 * @unhooked woocommerce_template_single_meta -        40
 * @hooked rmci_wooswipe_container -          10
 * @hooked woocommerce_template_single_meta - 15
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating',      10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta',        40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );


/**
 * woocommerce_after_single_product_summary.
 *
 * @unhooked woocommerce_upsell_display - 15
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'rmci_product_summary_container_end', 5 );


/**
 * wooswipe_before_main.
 *
 * @hooked rmci_wooswipe_container -         10
 */
//add_action( 'wooswipe_before_main', 'rmci_wooswipe_container', 10 );


/**
 * wooswipe_after_main.
 *
 * @hooked rmci_wooswipe_container -         10
 */
//add_action( 'wooswipe_after_main', 'rmci_wooswipe_container_end', 10 );
