<?php
/***************************************
 *	 CREATE GLOBAL VARIABLES
 ***************************************/
define( 'HOME_URI', home_url() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMAGES', THEME_URI . '/dist-assets/images' );
define( 'DEV_CSS', THEME_URI . '/dev-assets/css' );
define( 'DEV_JS', THEME_URI . '/dev-assets/js' );
define( 'DIST_CSS', THEME_URI . '/dist-assets/css' );
define( 'DIST_JS', THEME_URI . '/dist-assets/js' );
define( 'FILES_DIR', THEME_URI . '/dist-assets/files' );


/***************************************
 * Include helpers
 ***************************************/
require_once 'inc/custom-gutenberg-blocks.php';

/***************************************
 * 		Theme Support and Options
 ***************************************/
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'responsive-embeds' );
add_filter('show_admin_bar', '__return_false');

/***************************************
 * Custom Image Size
 ***************************************/
add_image_size( 'imgsize-1920', 1920, 9999, false );
add_image_size( 'kopf', 635, 9999, false );
add_image_size( 'kopf2x', 1270, 9999, false );
add_image_size( 'presse', 768, 9999, false );
add_image_size( 'presse2x', 1536, 9999, false );

/***************************************
 * Add Wordpress Menus
 ***************************************/
function register_hh_menu() {
	register_nav_menu( 'main-menu', 'Hauptmenü' );
	register_nav_menu( 'sub-menu', 'Untermenü' );
	register_nav_menu( 'socialmedia-menu', 'Social Media Menü' );
}
add_action( 'after_setup_theme', 'register_hh_menu' );

/***************************************
 * 		Enqueue scripts and styles.
 ***************************************/
function hh_startup_scripts() {
	wp_enqueue_style( 'hh-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap', null, false );
	wp_enqueue_script( 'hh-counterup', DIST_JS . '/jquery.rcounterup.min.js', array('jquery'), '1.0', true );
	if (WP_DEBUG) {
		$modificated_css = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dev-assets/css/theme.css' ) );
		$modificated_js = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dev-assets/js/theme.js' ) );
		wp_register_style( 'hh-style', DEV_CSS . '/theme.css', array('hh-fonts'), $modificated_css );
		wp_register_script( 'hh-script', DEV_JS . '/theme.js', array('jquery', 'hh-counterup'), $modificated_js, true );
	} else {
		$modificated_css = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dist-assets/css/theme.min.css' ) );
		$modificated_js = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dist-assets/js/theme.min.js' ) );
		wp_register_style( 'hh-style', DIST_CSS . '/theme.min.css', array('hh-fonts'), $modificated_css );
		wp_register_script( 'hh-script', DIST_JS . '/theme.min.js', array('jquery', 'hh-counterup'), $modificated_js, true );
	}
	$global_vars = array(
		'home_url' => HOME_URI,
		'ajax_url' => admin_url('admin-ajax.php'),
		'ajax_secure' => wp_create_nonce('jtidb-check-ajax-secure'),
		'txt' => array(
			'arrow_bottom' => '<div class="fullpageArrowBottom"><i class="fas fa-angle-down fa-3x"></i></div>'
		)
	);
	wp_localize_script( 'hh-script', 'global_vars', $global_vars );
	wp_enqueue_style( 'hh-style' );
	wp_enqueue_script( 'hh-script' );
}
add_action( "wp_enqueue_scripts", "hh_startup_scripts" );

/***************************************
 * 	CSS und JS Dateien für den Administrationsbereich hinzufügen
 ***************************************/
function hh_admin_style_and_script() {
	$modificated_css = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dist-assets/css/admin.css' ) );
	wp_enqueue_style('hh-admin-style', DIST_CSS . '/admin.css', null, $modificated_css);
}
 add_action('admin_enqueue_scripts', 'hh_admin_style_and_script');

/***************************************
 * 		jtidb ACF Init
 ***************************************/
function hh_acf_init() {
	/* SMTP Einstellungen */
	 $args = array(
		'page_title' => 'SMTP Einstellungen',
		'menu_title' => 'SMTP',
		'menu_slug' => 'hh-smtp-settings',
		'parent_slug' => 'options-general.php',
	);
	acf_add_options_sub_page($args);
	/* Footer Einstellungen */
	$args = array(
		'page_title' => 'Menü Footer Inhalte',
		'menu_title' => 'Footer',
		'menu_slug' => 'hh-footer-settings',
		'parent_slug' => 'themes.php',
	);
	acf_add_options_sub_page($args);
	/* Error 404 Seite Einstellungen */
	$args = array(
		'page_title' => 'Error 404: Einstellungen',
		'menu_title' => '404',
		'menu_slug' => 'hh-404-settings',
		'parent_slug' => 'options-general.php',
	);
	acf_add_options_sub_page($args);
}
add_action( 'acf/init', 'hh_acf_init' );

/***************************************
 * ACF Menüpunkt verstecken - wenn Webseite im "nicht Debug Modus" läuft
 ***************************************/
if(!WP_DEBUG) {
	add_filter('acf/settings/show_admin', '__return_false');
}

/***************************************
 * Remove Menus from Backend
 ***************************************/
function hh_remove_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'hh_remove_menus' );


/***************************************
 * 	 E-Mails per SMTP senden
 ***************************************/
function hh_send_smtp( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host = get_field( 'sys_smtp_host', 'option' );
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = get_field( 'sys_smtp_port', 'option' );
	$phpmailer->Username = get_field( 'sys_smtp_username', 'option' );
	$phpmailer->Password = get_field( 'sys_smtp_password', 'option' );
	$phpmailer->SMTPSecure = get_field( 'sys_smtp_secure', 'option' );
	$phpmailer->From = get_field( 'sys_smtp_frommail', 'option' );
	$phpmailer->FromName = get_field( 'sys_smtp_fromname', 'option' );
	$phpmailer->CharSet = 'utf-8';
}
//add_action( 'phpmailer_init', 'hh_send_smtp' );


/***************************************
 * 	 Gutenberg Custom Farben hinterlegen
 ***************************************/
function hh_gutenberg_colors() {
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'Primary', 'theme-slug' ),
			'slug'  => 'primary',
			'color' => '#0061ab',
		),
		array(
			'name'  => esc_html__( 'Secondary', 'theme-slug' ),
			'slug'  => 'secondary',
			'color' => '#ffd500',
		)
	) );
}
add_action( 'after_setup_theme', 'hh_gutenberg_colors', 11 );

/***************************************
*	Gutenberg Blöcke auf Startseite mit Container rendern
***************************************/
add_filter( 'render_block', function( $block_content, $block ) {
	if(!is_front_page() && !is_page('presse')) {
		// Target core/* and core-embed/* blocks.
		if ( preg_match( '~^core/|core-embed/~', $block['blockName'] ) && $block['blockName'] != 'core/cover' && $block['blockName'] != 'core/gallery' && $block['blockName'] != 'core/column' && $block['blockName'] != 'core/columns'  ) {
			$block_content = sprintf( '<div class="container"><div class="row justify-content-center"><div class="col-12 col-lg-9">%s</div></div></div>', $block_content );
		} elseif ($block['blockName'] == 'core/gallery') {
			$block_content = sprintf( '<div class="container-fluid"><div class="row justify-content-center"><div class="col-12 col-lg-9">%s</div></div></div>', $block_content );
		}
		return $block_content;
	} else {
		return $block_content;
	}
}, PHP_INT_MAX - 1, 2 );