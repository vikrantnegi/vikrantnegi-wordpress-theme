<?php
/**
 * vikrantnegi2 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vikrantnegi2
 */

if ( ! function_exists( 'vikrantnegi2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vikrantnegi2_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vikrantnegi2, use a find and replace
	 * to change 'vikrantnegi2' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vikrantnegi2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'vikrantnegi2' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vikrantnegi2_custom_background_args', array(
		'default-color' => '#fafafa',
		'default-image' => '',
	) ) );

	/* Add editor style sheets */
	add_editor_style( array( 'inc/editor-styles.css', 'https://fonts.googleapis.com/css?family=Roboto:400,700|Raleway:300,400,500,700', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' ) );
}
endif;
add_action( 'after_setup_theme', 'vikrantnegi2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vikrantnegi2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vikrantnegi2_content_width', 640 );
}
add_action( 'after_setup_theme', 'vikrantnegi2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vikrantnegi2_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vikrantnegi2' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vikrantnegi2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vikrantnegi2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vikrantnegi2_scripts() {
	wp_enqueue_style( 'vikrantnegi2-style', get_stylesheet_uri() );

	// Add Font Awesome icons (http://fontawesome.io)
	wp_enqueue_style( 'popperscores-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

	//Add Google Fonts: Roboto
	wp_enqueue_style( 'vikrantnegi2-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,700|Raleway:300,400,500,700' );

	wp_enqueue_script( 'vikrantnegi2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'vikrantnegi2-prism', get_template_directory_uri() . '/js/prism.js', array(), '20151215', true );

	wp_enqueue_script( 'vikrantnegi2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vikrantnegi2_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom social link menu
 */
function custom_settings_add_menu() {
  add_menu_page( 'Social Settings', 'Social Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Custom Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields( 'section' );
           do_settings_sections( 'theme-options' );
           submit_button();
       ?>
    </form>
  </div>
<?php }

// Twitter
function setting_twitter() { ?>
  <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

function setting_github() { ?>
  <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

function setting_codepen() { ?>
  <input type="text" name="codepen" id="codepen" value="<?php echo get_option('codepen'); ?>" />
<?php }

function setting_stackoverflow() { ?>
  <input type="text" name="stackoverflow" id="stackoverflow" value="<?php echo get_option('stackoverflow'); ?>" />
<?php }

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
	add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );
	add_settings_field( 'codepen', 'Codepen URL', 'setting_codepen', 'theme-options', 'section' );
	add_settings_field( 'stackoverflow', 'Stackoverflow URL', 'setting_stackoverflow', 'theme-options', 'section' );

  register_setting('section', 'twitter');
	register_setting('section', 'github');
	register_setting('section', 'codepen');
	register_setting('section', 'stackoverflow');

}
add_action( 'admin_init', 'custom_settings_page_setup' );