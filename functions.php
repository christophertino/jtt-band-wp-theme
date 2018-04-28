<?php
/**
 * WordPress Functions file
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

/**************** ADD SUPPORT FOR POST THUMBS ***************/
add_theme_support( 'post-thumbnails' );
add_image_size( 'hero_xlarge', 1440, 600, true ); //for use on xlarge hero images (homepage)
add_image_size( 'hero_large', 1440, 400, true ); //for use on large hero images
add_image_size( 'hero_medium', 1024, 400, true ); //for use on medium hero images
add_image_size( 'hero_small', 640, 300, true ); //for use on small hero images

//Show custom image sizes on WP image embed page
function my_insert_custom_image_sizes( $sizes ) {
	global $_wp_additional_image_sizes;
	if ( empty($_wp_additional_image_sizes) )
		return $sizes;

	foreach ( $_wp_additional_image_sizes as $id => $data ) {
		if ( !isset($sizes[$id]) )
			$sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
	}

	return $sizes;
}
add_filter( 'image_size_names_choose', 'my_insert_custom_image_sizes' );

/******************** JAVASCRIPT LOADER *********************/
function deregister_native_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
	}
}
add_action('init', 'deregister_native_jquery');

function load_scripts() {
	wp_register_script('bundle', get_template_directory_uri() . '/dist/bundle.js', false, '1.0.0', true);

	if (is_page('Contact') && function_exists('wpcf7_enqueue_scripts')) :
		wpcf7_enqueue_scripts();
	endif;

	wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Load JS Module code here - Will load after enqueued scripts since wp_head hook has lower priority then wp_enqueue_scripts
function load_js_modules() {
	$output = '<script type="text/javascript">jQuery(document).ready(function($) {';

	$output .= 'JustTheTip.init();';

	if (is_front_page('home')) {
		$output .= 'JustTheTip.pages.homepage();';
	}

	$output .= '});</script>';
	echo $output;
}
add_action('wp_head', 'load_js_modules');

/******************** CUSTOM MENUS **************************/
function register_menus() {
	register_nav_menu('menu_left',__( 'Header Menu Left' ));
	register_nav_menu('menu_right',__( 'Header Menu Right' ));
}
add_action( 'init', 'register_menus' );

// Register custom navigation walkers
require_once('includes/menus/topbar-walker-menu.php');

/****************** SIDEBARS & WIDGETS  *********************/
function jtt_widgets_init() {
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}
add_action( 'widgets_init', 'jtt_widgets_init' );

/******************** ADMIN SETTINGS  ***********************/
//Change Posts labels in sidebar admin menu
function custom_post_menu_label() {
	global $menu, $submenu;
	$menu[5][0] = 'Blog Posts';
	$menu[5][6] = 'dashicons-media-text'; //change post icon to news document
}
add_action( 'admin_menu', 'custom_post_menu_label' );

//Change labels for default post object and taxonomy
function custom_post_object_label() {
	global $wp_post_types, $wp_taxonomies;

	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Blog Posts';
	$labels->singular_name = 'Blog Post';
	$labels->add_new = 'Add Blog Post';
	$labels->add_new_item = 'Add Blog Post';
	$labels->edit_item = 'Edit Blog Post';
	$labels->new_item = 'Blog Posts';
	$labels->view_item = 'View Blog Post';
	$labels->search_items = 'Search Blog Posts';
	$labels->not_found = 'No results in Blog Posts';
	$labels->not_found_in_trash = 'No Blog Posts in Trash';
	$labels->name_admin_bar = 'Blog Post';

	$wp_taxonomies['post_tag']->labels = (object)array(
		'name' => 'Blog Tags',
		'singular_name' => 'Blog Tag',
		'menu_name' => 'Blog Tags',
		'all_items' => 'All Blog Tags',
		'edit_item' => 'Edit Blog Tag',
		'update_item' => 'Update Blog Tag',
		'add_new_item' => 'Add New Blog Tag',
		'new_item_name' => 'New Blog Tag Name',
		'parent_item' => null, // Tags aren't hierarchical
		'parent_item_colon' => null,
		'search_items' => 'Search Blog Tags',
		'popular_items' => 'Popular Blog Tags',
		'separate_items_with_commas' => 'Separate Blog Tags with commas',
		'add_or_remove_items' => 'Add or remove Blog Tags',
		'choose_from_most_used' => 'Choose from the most used Blog Tags',
		'not_found' => 'No Blog Tags Found'
	);
	$wp_taxonomies['post_tag']->label = 'Blog Tags';

	$wp_taxonomies['category']->labels = (object)array(
		'name' => 'Blog Categories',
		'singular_name' => 'Blog Category',
		'menu_name' => 'Blog Categories',
		'all_items' => 'All Blog Categories',
		'edit_item' => 'Edit Blog Category',
		'update_item' => 'Update Blog Category',
		'add_new_item' => 'Add New Blog Category',
		'new_item_name' => 'New Blog Category Name',
		'parent_item' => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'search_items' => 'Search Blog Categories',
		'popular_items' => 'Popular Blog Categories',
		'separate_items_with_commas' => 'Separate Blog Categories with commas',
		'add_or_remove_items' => 'Add or remove Blog Categories',
		'choose_from_most_used' => 'Choose from the most used Blog Categories',
		'not_found' => 'No Blog Categories Found'
	);
	$wp_taxonomies['category']->label = 'Blog Categories';
}
add_action( 'init', 'custom_post_object_label' );

// Remove Widgets from Admin Dashboard
function remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); // Plugins
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); // Other WordPress News
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

//Remove fields from Page and Post edit screens
function remove_page_fields() {
	//Pages
	remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status
	remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments
	//remove_meta_box( 'authordiv' , 'page' , 'normal' ); //removes author
	remove_meta_box( 'slugdiv' , 'page' , 'normal' ); //removes slug
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); //removes custom fields
	remove_meta_box( 'revisionsdiv' , 'page' , 'normal' ); //removes revision
	remove_meta_box( 'sharing_meta' , 'page' , 'normal' ); //removes jetpack sharing
}
add_action( 'admin_menu' , 'remove_page_fields' );

//Kill welcome panel
remove_action( 'welcome_panel', 'wp_welcome_panel' );

//Disable Theme Editor
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

//Custom admin CSS
function add_admin_css() {
	echo '<style>#slugdiv #post_name {width:400px;}</style>';
}
add_action('admin_head', 'add_admin_css');

// Custom WordPress Footer
function remove_footer_admin () {
	echo '&copy; ' . date('Y') . ' ' . get_bloginfo( 'name' ) . ' All rights reserved.';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/**************** FRONT END HOOKS *************************/
//remove default text from 'get_archive_title'
function update_archive_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'update_archive_title');

//remove wp admin bar on front end
function remove_admin_bar(){
	return false;
}
add_filter( 'show_admin_bar' , 'remove_admin_bar');

//remove wp-emoji
function disable_wp_emojicons() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', function($plugins) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	});
	add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

//remove Contact Form 7 CSS and JS. Load the JS on page-
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

//Add custom wp-login CSS
function jtt_login_stylesheet() { ?>
	<link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/css/login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'jtt_login_stylesheet' );

function jtt_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'jtt_login_logo_url' );

function jtt_login_logo_url_title() {
	return 'Just the Tip Band';
}
add_filter( 'login_headertitle', 'jtt_login_logo_url_title' );

/********************* ACF **********************************/
// Setup ACF Admin settings area
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' => 'Global Content',
		'position'	=> 20,
		'icon_url' => 'dashicons-tagcloud'
	));
}

//Extend WordPress search to include custom fields
function cf_search_join( $join ) {
	global $wpdb;
	if ( is_search() ) {
		$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}
	return $join;
}
add_filter('posts_join', 'cf_search_join' );

// Modify the search query with posts_where
function cf_search_where( $where ) {
	global $pagenow, $wpdb;
	if ( is_search() ) {
		$where = preg_replace(
			"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	}
	return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

// Prevent search duplicates
function cf_search_distinct( $where ) {
	global $wpdb;
	if ( is_search() ) {
		return "DISTINCT";
	}
	return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

/******************* YOAST SEO  **********************/
//lower position priority of Yoast SEO meta box
add_filter('wpseo_metabox_prio', function() { return 'low';});

/******************* CUSTOM FUNCTIONS  **********************/
//Pull content teaser text
function the_content_limit($max_char) {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags($content);

	if ((strlen($content)>$max_char) && ($space = strpos($content, " ", $max_char ))) {
		$content = substr($content, 0, $space);
		$content = $content;
		echo $content;
		echo "...";
	} else {
		echo $content;
	}
}

// Add Page Slug to Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Filter to hide protected posts
function exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}
// Decide where to display them
function exclude_protected_action($query) {
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'exclude_protected' );
	}
}
// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

// Remove WP Generator for security reasons
remove_action('wp_head', 'wp_generator');

?>
