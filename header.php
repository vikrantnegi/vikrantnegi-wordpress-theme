<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vikrantnegi2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vikrantnegi2' ); ?></a>

	<?php if ( get_header_image() ) { ?>
		<header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
	<?php } else { ?>
		<header id="masthead" class="site-header" role="banner">
	<?php } ?>

		<?php // Display site icon or first letter as logo ?>
		<div class="site-logo">
			<?php $site_title = get_bloginfo( 'name' ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div class="screen-reader-text">
					<?php printf( esc_html__('Go to the home page of %1$s', 'vikrantnegi'), $site_title ); ?>
				</div>

				<?php if ( has_custom_logo() ) {
					the_custom_logo();
				} else { ?>
					<div class="site-firstletter" aria-hidden="true">
						<?php echo substr($site_title, 0, 1); ?>
					</div>
				<?php } ?>
			</a>
		</div>

		<div class="site-branding<?php if( is_singular() ) { echo ' screen-reader-text'; } ?>">
			<div class="container">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation<?php if( is_singular() ) { echo ' screen-reader-text'; } ?>" role="navigation">
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text">Toggle navigation</span>
					<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
				</button>
				<div class="social-links">
					<a href="#">
						<i class="fa fa-twitter" aria-hidden="true"></i>
						<span class="screen-reader-text">Twitter</span>
					</a>

					<a href="#">
						<i class="fa fa-github" aria-hidden="true"></i>
						<span class="screen-reader-text">Github</span>
					</a>

					<a href="#">
						<i class="fa fa-codepen" aria-hidden="true"></i>
						<span class="screen-reader-text">Codepen</span>
					</a>

					<a href="#">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<span class="screen-reader-text">Facebook</span>
					</a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'site-menu' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
