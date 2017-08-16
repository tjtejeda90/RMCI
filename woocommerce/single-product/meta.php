<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<div class="sku_wrapper">
			<span class="sku_label"><?php _e( 'Part Number: ', 'woocommerce' ); ?></span>
			<span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>
		</div>

	<?php endif; ?>

	<div class="categories_wrapper">
		<span class="categories_label"><?php echo _n( 'Category: ', 'Categories: ', $cat_count, 'woocommerce' ); ?></span>
		<span class="categories_list"><?php echo $product->get_categories( ', ' ); ?></span>
	</div><!-- .categories_wrapper -->

	<div class="tags_wrapper">
		<span class="tags_label"><?php echo _n( 'Tag: ', 'Tags: ', $tag_count, 'woocommerce' ); ?></span>
		<span class="tags_list"><?php echo $product->get_tags( ', ' ); ?></span>
	</div><!-- .tags_wrapper -->

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
