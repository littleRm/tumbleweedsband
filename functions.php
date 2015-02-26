<?php
/**
 * tumbleweeds2015 functions and definitions
 *
 * @package tumbleweeds2015
 */


if ( ! function_exists( 'tumbleweeds2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tumbleweeds2015_setup() {
	
	// Define theme path constants
	define( '_HOME_URI', home_url() );
	define( '_THEME_URI', get_stylesheet_directory_uri() );
	define( '_THEME_IMAGES', _THEME_URI . '/img' );
	define( '_THEME_JS', _THEME_URI . '/js' );
	define( '_THEME_CSS', _THEME_URI . '/css' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tumbleweeds2015' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tumbleweeds2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_shortcode('subscribe', 'subscribe_shortcode');
	
	add_filter( 'cpsh_load_styles', '__return_false' );
}
endif; // tumbleweeds2015_setup
add_action( 'after_setup_theme', 'tumbleweeds2015_setup' );

/**
 * Remove unwanted admin menus
 */
function tumbleweeds2015_remove_menus(){
  
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'tumbleweeds2015_remove_menus' );

/**
 * Enqueue scripts and styles.
 */
function tumbleweeds2015_scripts() {
	wp_enqueue_style( 'tumbleweeds2015-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style', _THEME_CSS . '/style.css' );
	wp_enqueue_style( 'theme-style', _THEME_CSS . '/theme.css' );
	wp_enqueue_script( 'tumbleweeds2015-scripts', _THEME_JS . '/scripts.js', array('jquery'), '20150122', true );
	wp_enqueue_script( 'cssslidy', _THEME_JS . '/cssslidy.js', array(), '20150122', true );
}
add_action( 'wp_enqueue_scripts', 'tumbleweeds2015_scripts' );

/**
 * Custom shortcode for mailing list subscribe box
 */
function subscribe_shortcode(){
	
	return '
<div id="mc_embed_signup">
	<form action="//facebook.us7.list-manage.com/subscribe/post?u=b9b21bbc31f6b726fe9e56861&amp;id=4f9cece208" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<div id="mc_embed_signup_scroll">
		<label for="mce-EMAIL">Sign up for our e-mail list:</label>
		<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
		<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		<div style="position: absolute; left: -5000px;"><input type="text" name="b_b9b21bbc31f6b726fe9e56861_4f9cece208" tabindex="-1" value=""></div>
		<div class="clear"><input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		</div>
	</form>
</div>';

}


function tumbleweeds2015_404(){
	if (!headers_sent())
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");	
?>
<HEAD>
<meta name=viewport content="width=device-width, initial-scale=1">
<TITLE>404 Not Found</TITLE>
</HEAD>
<BODY>
<H1>Not Found</H1>
The requested document was not found on the tumbleweeds server.
<P>
<HR>
<ADDRESS>
Web Server at tumbleweedsband.com
</ADDRESS>
</BODY>
</HTML>

<!--
   - Unfortunately, Microsoft has added a clever new
   - \"feature\" to Internet Explorer. If the text of
   - an error's message is \"too small\", specifically
   - less than 512 bytes, Internet Explorer returns
   - its own error message. You can turn that off,
   - but it's pretty tricky to find switch called
   - \"smart error messages\". That means, of course,
   - that short error messages are censored by default.
   - IIS always returns error messages that are long
   - enough to make Internet Explorer happy. The
   - workaround is pretty simple: pad the error
   - message with a big comment like this to push it
   - over the five hundred and twelve bytes minimum.
   - Of course, that's exactly what you're reading
   - right now.
-->
<?
}

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
 * Load Meta Box setup file.
 */
require get_template_directory() . '/inc/meta-box.php';

