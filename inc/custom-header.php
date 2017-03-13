<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package vikrantnegi2
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses vikrantnegi2_header_style()
 */
function vikrantnegi2_custom_header_setup() {
	add_theme_support( 'custom-logo', array(
		'width' => 96,
		'height' => 96,
		'flex-width' => false,
		'flex-height' => false,
	) );

	add_theme_support( 'custom-header', apply_filters( 'vikrantnegi2_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'vikrantnegi2_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vikrantnegi2_custom_header_setup' );

if ( ! function_exists( 'vikrantnegi2_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see vikrantnegi2_custom_header_setup().
 */
function vikrantnegi2_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
