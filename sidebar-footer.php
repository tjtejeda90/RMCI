<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RMCI
 */

 if ( ! defined( 'ABSPATH' ) ) {
	 exit; // Exit if accessed directly
 }

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="footer-widget-area" class="footer-widgets" role="complementary">
    <div class="footer-widget-container">
	    <?php dynamic_sidebar( 'footer-1' ); ?>
    </div>
</aside><!-- #secondary -->
