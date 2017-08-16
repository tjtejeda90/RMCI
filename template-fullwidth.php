<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package rmci
 */

 if ( ! defined( 'ABSPATH' ) ) {
	 exit; // Exit if accessed directly
 }

get_header(); ?>

	<div id="primary" class="content-area full-width-content">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
