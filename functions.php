<?php
/**
 * Base Theme functions and definitions
 *
 * @package Base Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 940; /* pixels */
}

if ( ! function_exists( 'hm_base_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hm_base_theme_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

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
		'primary' => 'Primary Menu',
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );
}
endif; // hm_base_theme_setup
add_action( 'after_setup_theme', 'hm_base_theme_setup' );



/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hm_base_theme_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Content',
		'id'            => 'footer-content',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
}
add_action( 'widgets_init', 'hm_base_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hm_base_theme_scripts() {
	$version = "20150317";

	wp_enqueue_style( 'hm-base-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.2', true );
	wp_enqueue_script( 'bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '3.3.2', true );
	wp_enqueue_script( 'slidebars', get_stylesheet_directory_uri() . '/js/slidebars.min.js', array('jquery'), '3.3.2', true );
	wp_enqueue_script( 'hm-base-theme-js', get_stylesheet_directory_uri() . '/js/main.js', array('bootstrap-js','jquery'), $version, true );

}
add_action( 'wp_enqueue_scripts', 'hm_base_theme_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Bootstrap nav walker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/* Meme Posts per page expander */

add_action( 'pre_get_posts', 'meme_posts' );

function meme_posts($query) {
	if ( is_category('memes') && $query->is_main_query() ) {
		$query->set( 'posts_per_page', 1000 );
	}
}

// Gravity Forms to NationBuilder

add_action('gform_after_submission_2', 'add_to_nb', 10, 2);

function add_to_nb($entry, $form) {

    // This is the URL of your NationBuilder script
	$post_url = (get_template_directory()."/inc/nb.php");

    // Put all the form fields (names and values) in this array
	$person = array(
		'person' => array(
			'first_name' => rgar($entry, '1'),
			'last_name' => rgar($entry, '2'),
			'email' => rgar($entry, '3'),
			'submitted_address' => rgar($entry, '4'),
			'signup_type' => 0,
			'tags' => array(
				'frackfeed'
				)
			)
		);

	$json = json_encode($person);

	$token = 'c1805350fe03a721230d39edc17d4a24a2bf1723ac0caa86895b2df7827e2d29';
	$url = "https://northtexansfornaturalgas.nationbuilder.com/api/v1/people?access_token=".$token;

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($ch, CURLOPT_TIMEOUT, '10'); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, 
		array("Content-Type: application/json","Accept: application/json"));

	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	$response = curl_exec($ch);
	curl_close($ch);

	$results = fopen(get_template_directory()."/results.txt","w") or die("Unable to open file!");
	fwrite($results, $response);
	fclose($results);
	

}


