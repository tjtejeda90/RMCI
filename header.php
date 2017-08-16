<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RMCI
 */

 if ( ! defined( 'ABSPATH' ) ) {
	 exit; // Exit if accessed directly
 }

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rmci' ); ?></a>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_html_e( 'Skip to navigation', 'rmci' ); ?></a>

        <?php if ( has_nav_menu( 'secondary' ) ) { ?>

            <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'rmci' ); ?>">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'	=> 'secondary',
                            'fallback_cb'		=> '',
                            'container_class'   => 'secondary-menu-container clear'
                        )
                    );
                ?>
            </nav><!-- .secondary-navigation -->

        <?php } ?>

		<header id="masthead" class="site-header" role="banner">
			<div class="header-column clear">
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) :
						the_custom_logo();
					else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif;
					endif; ?>
				</div><!-- .site-branding -->
				<?php
				if ( rmci_is_woocommerce_activated() ) : ?>
					<div class="site-search">
						<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
					</div>
				<?php
				endif; ?>
			</div><!-- .header-column -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'rmci' ); ?></button>
                <div class="mobile-nav-overlay"></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu clear', 'container_class' => 'primary-menu-container' ) ); ?>
				<div class="mobile-menu-container">
					<span class="menu-title"><?php esc_html_e( 'Menu', 'rmci' ); ?></span>
					<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu', 'container' => 'none' ) ); ?>
				</div><!-- .mobile-menu-container -->
			</nav><!-- #site-navigation -->

            <?php if( is_front_page() )  {

                // echo rmci_do_shortcode( "huge_it_slider", array(
                //     'id' => 1,
                // ) );

                //wd_slider(1);

            } ?>

		</header><!-- #masthead -->

		<div id="content" class="site-content">
