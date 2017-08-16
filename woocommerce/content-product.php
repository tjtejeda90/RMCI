<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<div class="product_image">
		<a href="<?php echo get_the_permalink( $product->get_id() ); ?>">
			<?php echo woocommerce_get_product_thumbnail(); ?>
		</a>
	</div>
	<div class="product_details">
		<h3 class="product_title"><a href="<?php echo get_the_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></h3>
		<!-- <div class="product_features"> -->
		<span class="product_sku">Product Number:&nbsp;<a href="<?php echo get_the_permalink( $product->get_id() ); ?>"><?php echo $product->get_sku(); ?></a></span>
		<?php wc_get_template( 'loop/price.php' ); ?>
			<?php //echo get_the_excerpt( $product->get_id() ); ?>
		<!-- </div> -->
	</div>
</li>
		<!-- <span><strong>Product Features:</strong></span> -->
