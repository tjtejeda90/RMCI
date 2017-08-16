<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RMCI
 */

 if ( ! defined( 'ABSPATH' ) ) {
     exit; // Exit if accessed directly
 }

?>

	</div><!-- #content -->

    <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rmci' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'rmci' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'rmci' ), 'rmci', '<a href="https://automattic.com/" rel="designer">Thomas Tejeda</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
