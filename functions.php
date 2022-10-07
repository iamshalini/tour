<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own twentysixteen_setup() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	function twentysixteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'twentysixteen' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'twentysixteen' );

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
		 * Enable support for custom logo.
		 *
		 *  @since Twenty Sixteen 1.2
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'twentysixteen' ),
				'social'  => __( 'Social Links Menu', 'twentysixteen' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Dark Gray', 'twentysixteen' ),
					'slug'  => 'dark-gray',
					'color' => '#1a1a1a',
				),
				array(
					'name'  => __( 'Medium Gray', 'twentysixteen' ),
					'slug'  => 'medium-gray',
					'color' => '#686868',
				),
				array(
					'name'  => __( 'Light Gray', 'twentysixteen' ),
					'slug'  => 'light-gray',
					'color' => '#e5e5e5',
				),
				array(
					'name'  => __( 'White', 'twentysixteen' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Blue Gray', 'twentysixteen' ),
					'slug'  => 'blue-gray',
					'color' => '#4d545c',
				),
				array(
					'name'  => __( 'Bright Blue', 'twentysixteen' ),
					'slug'  => 'bright-blue',
					'color' => '#007acc',
				),
				array(
					'name'  => __( 'Light Blue', 'twentysixteen' ),
					'slug'  => 'light-blue',
					'color' => '#9adffd',
				),
				array(
					'name'  => __( 'Dark Brown', 'twentysixteen' ),
					'slug'  => 'dark-brown',
					'color' => '#402b30',
				),
				array(
					'name'  => __( 'Medium Brown', 'twentysixteen' ),
					'slug'  => 'medium-brown',
					'color' => '#774e24',
				),
				array(
					'name'  => __( 'Dark Red', 'twentysixteen' ),
					'slug'  => 'dark-red',
					'color' => '#640c1f',
				),
				array(
					'name'  => __( 'Bright Red', 'twentysixteen' ),
					'slug'  => 'bright-red',
					'color' => '#ff675f',
				),
				array(
					'name'  => __( 'Yellow', 'twentysixteen' ),
					'slug'  => 'yellow',
					'color' => '#ffef8e',
				),
			)
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );
	}
endif; // twentysixteen_setup()
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Sixteen 1.6
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentysixteen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentysixteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentysixteen_resource_hints', 10, 2 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'twentysixteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own twentysixteen_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function twentysixteen_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Merriweather, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Montserrat, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Montserrat:400,700';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Inconsolata:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family'  => urlencode( implode( '|', $fonts ) ),
					'subset'  => urlencode( $subsets ),
					'display' => urlencode( 'fallback' ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '20201208' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri(), array(), '20201208' );

	// Theme block stylesheet.
	wp_enqueue_style( 'twentysixteen-block-style', get_template_directory_uri() . '/css/blocks.css', array( 'twentysixteen-style' ), '20190102' );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20170530' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20170530' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20170530' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170530', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20170530' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20181217', true );

	wp_localize_script(
		'twentysixteen-script',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'twentysixteen' ),
			'collapse' => __( 'collapse child menu', 'twentysixteen' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Twenty Sixteen 1.6
 */
function twentysixteen_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'twentysixteen-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20201208' );
	// Add custom fonts.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'twentysixteen_block_editor_styles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Block Patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

/*** Custom Post Types **/
require get_template_directory() . '/inc/reservemytours-cpt.php';

/*** ***/

/** Option Page **/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
/*  */

function replace_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="dropdownMenu" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','replace_submenu_class');

// function add_file_types_to_uploads($file_types){
// $new_filetypes = array();
// $new_filetypes['svg'] = 'image/svg+xml';
// $file_types = array_merge($file_types, $new_filetypes );
// return $file_types;
// }
// add_filter('upload_mimes', 'add_file_types_to_uploads');


/*** Scroll Load More ***/

function scroll_loadmore(){
    ini_set('display_errors', 1);
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	if($args['post_type'] == 'post'){
	 $args['category__not_in'] = '1';
	}
	if(isset($_GET['hotel_id']) && !empty($_GET['hotel_id'])){
	$hotel_id = base64_decode($_GET['hotel_id']);
	}else{
	$hotel_id = '';
	}
	// echo "<pre>"; 
 //    print_r($args);
	// echo "</pre>";
	// exit;
	$query_post = new WP_Query($args);
  
	if( $query_post->have_posts() ) :
        $i = 1;
        $content = '';
		while( $query_post->have_posts() ): the_post();
         $query_post->the_post();
             if($args['post_type'] == 'post'){
          	$img = get_the_post_thumbnail_url(get_the_ID(),'full');   
				$content .='<div class="col-md-6 col-12">
					<div class="package__box news-block">';
						 if(!empty($img)){ 
						$content .='<div class="image_box">
							<img src="'.$img.'" alt="">
						</div>';
					    }
						$content .='<div class="content_box">';
						$c = get_the_category(); 
                        $content .='<a href="'.get_category_link($c[0]->term_id).'" class="category-button">'.$c[0]->cat_name.'</a>';
						$content .='<div class="package_title">'.get_the_title().'</div>';
							$pcontent = strip_shortcodes(get_the_content());
							$pcontent = wp_strip_all_tags($content);
							
							$content .='<p>'.wp_trim_words($pcontent , 20, "" ).'</p>
							<a href="'.get_the_permalink().'" class="blog_readmore_btn">Read More</a>
						</div>
					</div>
				</div>';
               }else if($args['taxonomy'] == 'transportation_category'){

               	$img = get_the_post_thumbnail_url(get_the_ID(),'tour-list-img');
             	$flip_image = get_field('flip_image', get_the_ID());
                $content .='<div class="col-md-4 col-12">
						<div class="package__box">
							<div class="image_box image_flip_box">
								<img class="main_front" src="'.$img.'" alt="'.get_the_title().'">
								<img class="main_back" src="'.$flip_image['sizes']['tour-list-img'].'" alt="'.get_the_title().'">
							</div>
							<div class="content_box">
								<div class="package_title">'.get_the_title().'</div>
								<div class="icon-with-text">';
								 
								$no_of_bag = get_field('no_of_bags',get_the_ID());
								$car_fetures = get_field('car_fetures',get_the_ID());
								if(!empty($car_fetures)){
								foreach ($car_fetures as $key => $value) {
								if($value['label'] == 'Bag'){
								$image_ico = get_template_directory_uri()."/images/bag.png";
								} elseif($value['label'] == 'AC'){
								$image_ico = get_template_directory_uri()."/images/air-conditioner.png";
								} elseif($value['label'] == 'CD'){
								$image_ico = get_template_directory_uri()."/images/cd.png";
								} elseif($value['label'] == 'AM/FM'){
								$image_ico = get_template_directory_uri()."/images/musical-notes.png";
								}
								
								$content .='<div class="book-icon-main">
								<div class="book-icon">
								<img src="'.$image_ico.'">
								</div>
								<div class="book-text">
								<h4>';
								if($value['label'] == 'Bag'){
								  $content .= $no_of_bag.' '.$value['label']; 
								} else { 
								  $content .= $value['label'];
								} 
								$content .='</h4>
								</div>
								</div>';
								} } 
								$content .='</div>
								<div class="link_box">';
								$rentals_starting = get_field('rentals_starting',get_the_ID());
								if(!empty($rentals_starting)){
								$content .='<div class="pricing">Rentals starting<br> <strong>'.$rentals_starting.'</strong></div>';
                                 } 
		                         $hotel_booking_links = get_field('hotel_booking_links');
		                        
		                       if(!empty($hotel_id)){
		                        foreach ($hotel_booking_links as $key => $value) {
		                         	if($value['hotel_id'] == $hotel_id){ 
		                         		$content .='<a href="'.$value['booking_url'].'" class="book_botton" target="_blank">Book Now</a>';
		                         	}
		                         }
		                        }else{
		                         $booking_link = get_field('booking_link',get_the_ID());
								if(!empty($booking_link)){
									$content .='<a href="'.$booking_link.'" class="book_botton" target="_blank">Book Now</a>';
									
								     }
		                         }
		                      
								$content .='</div>
							</div>
						</div>
					</div>';
               }
               else{
               	$img = get_the_post_thumbnail_url(get_the_ID(),'tour-list-img');
             	$flip_image = get_field('flip_image', get_the_ID());
               	$content .='<div class="col-md-4 col-12" data-id="'.get_field('country').'">
						<div class="package__box">
							<div class="image_box image_flip_box">
								<img class="main_front" src="'.$img.'" alt="'.get_the_title().'">
								<img class="main_back" src="'.$flip_image['sizes']['tour-list-img'].'" alt="'.get_the_title().'">
							</div>
							<div class="content_box">
								<div class="package_title">'.get_the_title().'</div>';
								
								$pcontent = strip_shortcodes(get_the_content());
								$pcontent = wp_strip_all_tags($content);
								
								$content .='<p>'.wp_trim_words($pcontent , 20, "" ).'</p>';
                               
                                $cancellation = get_field('cancellation',get_the_ID());
                                if(!empty($cancellation)){
                                 
                                $content .='<p><strong>Cancellation: </strong>'.$cancellation.'</p>';
                                 } 
                               
                                $days = get_field('days',get_the_ID());
                                if(!empty($days)){
                                 
                                $content .='<p><strong>Days: </strong>'.$days.'</p>';
                                }
                                $durations = get_field('durations',get_the_ID());
                                if(!empty($durations)){
                                 
                                $content .='<p><strong>Durations: </strong>'.$durations.'</p>';
                                }
                                $minimum_age = get_field('minimum_age',get_the_ID());
                                if(!empty($minimum_age)){
                                 
                                $content .='<p><strong>Minimum Age: </strong>'.$minimum_age.'</p>';
                                }
								
								$content .='<div class="link_box">';
								$price = get_field('price',get_the_ID());
								if(!empty($price)){
								$content .='<div class="pricing">From: <strong>'.$price.'</strong></div>';
                                }
								$book_button_link = get_field('book_button_link',get_the_ID());
								if(!empty($book_button_link)){
								$content .='<a href="'.$book_button_link.'" class="book_botton">Book Now</a>';
								} 
								$content .='</div>
							</div>
						</div>
					</div>';
               }
		  $i++; endwhile;
		  wp_reset_query();
	endif;
    echo json_encode(array('post_data'=>$content));
	die; 
}

add_action('wp_ajax_scroll_loadmore', 'scroll_loadmore'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_scroll_loadmore', 'scroll_loadmore'); 




add_action('init', function() {
$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
$exp = explode('/',$url_path);
$end_set = end($exp);
/***redirect Url***/
if($end_set === 'our-tour') {
$hostedpage = locate_template('template/our-tour.php', true);
if ($hostedpage) {
exit();
}
}
});

add_image_size( 'tour-list-img', 449, 244, true );

/** Location Data Get **/
function get_location_data(){
 $post_id = $_POST['post_id'];
 $key = $_POST['key'];
 $content='';
 $location_lists = get_field('location_lists',$post_id);
  $content.= ' <div class="detialPopup">';
 if(!empty($location_lists[$key]['popup_description'])){
 	if(!empty($location_lists[$key]['location_slider'])){

                $content.= '<div class="detialPopup__slider">

                    <div class="slider-for-detial slider">';
						foreach ($location_lists[$key]['location_slider'] as $skey => $value) {
						$content.= '<div><img src="'.$value['image'].'"></div>';
						}
                        
    
                    $content.= '</div> 
                    
                    <div class="slider-nav-detial slider">';
                        foreach ($location_lists[$key]['location_slider'] as $skey => $value) {
						$content.= '<div><img src="'.$value['image'].'"></div>';
						}
                        
   
                    $content.= '</div>';  

                
            }
            $content.= '</div>';
              if(empty($location_lists[$key]['location_slider'])){
               $class = 'detialPopup--fullwidth';
              }else{
              	$class = '';
              }
                $content.= '<div class="detialPopup__info '.$class.'" >
                    <div class="detialPopup__btn">
                        <a class="btn blue-btn" href="'.$location_lists[$key]['direction_link'].'" target="_blank">Get Directions <span></span></a>
                    </div>';
               if($location_lists[$key]['location_details']){
                    $content.= '<div class="detialPopup__btn">                               
							<a id="showhideDiv" class="btn grey-btn" href="javascript:void(0);">Location Details <span> </span></a>
							<div id="showhideDetail" style="display: none;">
							'.$location_lists[$key]['location_details'].'
							</div>
                    </div>';
                  }
                  $content.='<div class="descriptionBox">';
                    $content.=  $location_lists[$key]['popup_description'];

                $content.='</div></div>
            </div>';
 }else{
  $content.= '<h3 style="text-align:center;color:red">No Data Found</h3>';
 }
 echo json_encode(array('content'=>$content));
 exit;
}
add_action('wp_ajax_get_location_data', 'get_location_data'); 
add_action('wp_ajax_nopriv_get_location_data', 'get_location_data'); 

function add_custom_js_file_to_admin()
{
    // Register and enqueue the script we need for load more
    
    
wp_register_script('datatable-script', 'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', array(
    'jquery'
));
wp_enqueue_script('datatable-script');

    wp_register_script('datatable-button', 'https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js', array(
        'jquery'
    ));
	 wp_enqueue_script('datatable-button');

	  wp_register_script('datatable-jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array(
        'jquery'
    ));
	 wp_enqueue_script('datatable-jszip');

	  wp_register_script('datatable-pdf', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', array(
        'jquery'
    ));
	 wp_enqueue_script('datatable-pdf');

	  wp_register_script('datatable-font', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js', array(
        'jquery'
    ));
	 wp_enqueue_script('datatable-font');

	  wp_register_script('datatable-html5', 'https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js', array(
        'jquery'
    ));
	 wp_enqueue_script('datatable-html5');

 

	  
	 wp_enqueue_style('dataTables-style', 'https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css');
    wp_enqueue_style('font-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css');
    wp_enqueue_style('button-style', 'https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css');
 
}

add_action('admin_enqueue_scripts', 'add_custom_js_file_to_admin');

/** Get activity popup data **/
function get_activity_post_data(){
 
    $post_id = $_POST['post_id'];
    $data_post_link = $_POST['data_post_link'];
	 
 $content .= ' <span class="close-hotel">X</span>
        <div class="choose-popup-txt">
      
         <h3>'.get_the_title($post_id).'</h3>
        </div>
        <div class="main-popup-inner">
          <div id="loading"></div>
            <div class="activity-sports posts-listing">';
            
       
                //$hotel = get_field('hotel',get_the_ID());
                 $content .= '<div class="agency-credit">
                          <div class="agencybooking_form">';
							 
					$content .='<form id="booking_form" action="">
					<input type="hidden" class="redirect_hotal_link" value="'.$data_post_link.'">
					<input type="text" id="fname" name="fname" placeholder="First Name">
					<input type="text" id="mname" name="mname" placeholder="Middle Name">
					<input type="text" id="lname" name="lname" placeholder="Last Name">
					<input type="email" id="email" placeholder="email" name="email">
                     
					<div class="g-recaptcha" data-sitekey="6LeFaSEUAAAAANl7JovITcgR6cZ5yfAwyAnyfFZo"></div>
					<script src="https://www.google.com/recaptcha/api.js" async defer></script>
					<div class="book-now-pop ">
					<span class="commonButton" id="submit_tour" >Book Now</span>  <span class="errormsg" style="display:none;color: #ed2020;">All fields are mandatory </span>
					</div> </form> ';

				 
					  $content .='</div>';
	           
                $content .='</div>';
			     
         
        echo json_encode(array('content'=>$content));
        wp_reset_query();
        exit;
}
add_action('wp_ajax_get_activity_post_data', 'get_activity_post_data'); 
add_action('wp_ajax_nopriv_get_activity_post_data', 'get_activity_post_data'); 

add_action('init', function() {
   if(isset($_SERVER['HTTP_REFERER'])) {
    setcookie("externalRefer", $_SERVER['HTTP_REFERER'], time()+3600);
}

});


function my_admin_menu()
{
    add_menu_page(__('Agency Booking Records', 'my-textdomain') , __('Agency Booking Records', 'my-textdomain') , 'manage_options', 'agency_booking_redcord', 'my_admin_page_contents', 'dashicons-schedule',12);
    }

add_action('admin_menu', 'my_admin_menu');

function my_admin_page_contents()
{ ?>
  <div class="main_div">
  	<div class="main-head-agency"> booking from agency </div>
<table id="all_agencybooking" class="cell-border" style="width:100%">
	<thead>

    <tr>
		<th>Sr.No</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Agency Name</th>
        <th>Agency Link</th>
		<th>Action</th>
    </tr>
	 </thead>
	 <tbody>
<?php
    global $wpdb, $table_prefix;
     $results = $wpdb->get_results('SELECT * FROM '.$table_prefix.'agency_data ORDER BY id DESC');
      if (!empty($results))
    {
        $srnb ='1' ;
		  // echo  $wpdb->last_query ;
        foreach ($results as $row)
        {
			$fname = $row->first_name;
			$mname = $row->middle_name;
			$lname = $row->last_name;
           	$email = $row->email;
             $agency_name = get_the_title($row->agency_id);
            $agency_url =get_post_field('post_name', $row->agency_id);
 
?>
  <tr>
		<td><?php echo $srnb++ ;?></td>
		<td> <?php echo $fname; ?> </td>
		<td> <?php echo $mname; ?>  </td>
		<td> <?php  echo $lname;?> </td>
		<td> <?php echo $email; ?> </td>
		<td> <?php echo $agency_name; ?> </td>
		<td> <a href="<?php echo $agency_url; ?>" target="_blank">View</a></td>
		<td> <a class="deletebooking" href="javascript:void(0);" data-id="<?php echo $row->id; ?>">Delete</a></td>
   
      
  </tr>
  
    
    
 <?php
        }
    }
?>    
	</tbody>
</table>
 </div>
 <script type="text/javascript">
	(function($){
$(document).ready(function(){
	$(document).on('click','.deletebooking',function(e){
            if (confirm("Are you sure to delete this booking record?") == true) {
				var bookingid = $(this).attr('data-id');
                
				var data = {
					'action': 'deletebooking_records',
					'bookingid': bookingid
				};
				jQuery.post(ajaxurl, data, function(response) {
				//alert('Got this from the server: ' + response);
				location.reload();
		});
            } else {
                return false;
            }
        });
	});
})(jQuery);
 </script>
<?php
}
function deletebooking_records(){
	global $wpdb, $table_prefix;
	$bookingid = intval( $_POST['bookingid'] );
	$table = $table_prefix.'agency_data';
	$wpdb->delete( $table, array( 'id' => $bookingid ) );
   echo "sucess";
	wp_die();
}
add_action( 'wp_ajax_deletebooking_records', 'deletebooking_records' );
add_action( 'wp_ajax_nopriv_deletebooking_records', 'deletebooking_records' );




//Add activity data
function booking_from_activity()
{
 global $wpdb;
        
 $tablename = $wpdb->prefix . 'agency_data';	
  $data = array(
 
'first_name' => $_POST['fname'],
'middle_name' => $_POST['mname'],
'last_name' => $_POST['lname'],
'email' => $_POST['email'],
'agency_id' => $_POST['agency_id'],
 
 
        );
        
     $wpdb->insert($tablename, $data);
			  $success = "<p class='sucess_msg'>  submit successfully</p>";
    //           echo  $success ;
			 // echo  $wpdb->last_query ; 
			 
         
}
add_action('wp_ajax_booking_from_activity', 'booking_from_activity');
add_action('wp_ajax_nopriv_booking_from_activity', 'booking_from_activity');

//Add activity data






/** Get hotel popup data **/
function get_hotel_post_data(){

    $post_type = $_POST['post_type'];
    $post_id = $_POST['post_id'];
    $meta_key = $_POST['meta_key'];

	$args = array(
	'posts_per_page'   => 10,
	'post_type' => $post_type,
	'post_status' => 'publish',
	'meta_query' => array(
	'relation' => 'AND',
	array(
	'meta_key' => $meta_key,
	'value' => '"'.$post_id.'"',
	'compare' => 'LIKE'
	),
	),
	);
	
   
 $posts = new wp_Query($args);
if($post_type == 'activities_cpt'){
$tour_title = 'Activities & Sports';
}elseif ($post_type == 'land_tour') {
$tour_title = 'Land Tour';
}elseif ($post_type == 'water_tour') {
$tour_title = 'Water Tour';	
}else{
$tour_title = 'TRANSPORTATION & RENTALS';	
} 
 $content .= ' <span class="close-hotel">X</span>
        <div class="choose-popup-txt">
            <h3>'.$tour_title.' of '.get_the_title($post_id).'</h3>
        </div>
        <div class="main-popup-inner">
            <div class="activity-sports posts-listing">';
            	if($posts->have_posts()){
                while ( $posts->have_posts()) {
                //$hotel = get_field('hotel',get_the_ID());

                $posts->the_post();
                $img = get_the_post_thumbnail_url(get_the_id(),'tour-list-img');
                $content .= '<div class="hotel-credit">
                    <div class="hotel-pimage">
                        <img src="'.$img.'" alt="'.get_the_title().'">
                    </div>
                    <div class="hotel-pop-text">
                        <h5>'.get_the_title().'</h5>';
						$contentp = strip_shortcodes(get_the_content());
						$contentp = wp_strip_all_tags($contentp);
						$content .= '<p>'.wp_trim_words($contentp , 20, "" ).'</p>';
                       
                       $content .= ' <div class="hotel-description">';
                       if($post_type == 'transportation_cpt'){
							$cancellation = get_field('cancellation_policy',get_the_ID());
							if(!empty($cancellation)){
							$content .= '<div class="pop-hotel-overview">
							<p><strong>Cancellation:</strong>'.$cancellation.'</p>
							</div>';
							} 
							$price = get_field('rentals_starting',get_the_ID());
							if(!empty($price)){
							$content .= '<div class="pop-hotel-overview">
							<p>From <strong class="usd-price">'.$price.'</strong></p>
							</div>';
							}  
							$content .= '</div>';


						if($meta_key == 'hotel') {
						$hotel_book_links = get_field('hotel_booking_links',get_the_ID());

						foreach ($hotel_book_links as $key => $value) {
						if($value['hotel_id'] == $post_id){
							$bookinglink = $value['booking_url'];
							if(!empty($bookinglink)){
							$content .= '<div class="book-now-pop">
							<a class="commonButton" href="'.$bookinglink.'" target="_blank">Book Now</a>
							</div>';
							}
						}
						}
						}else{
						$book_button_link = get_field('booking_link',get_the_ID());

						if(!empty($book_button_link)){
						$content .= '<div class="book-now-pop">
						<a class="commonButton" href="'.$book_button_link.'" target="_blank">Book Now</a>
						</div>';
						}
						}

					     $content .='</div>';
                       }else{
                        $cancellation = get_field('cancellation',get_the_ID());
                        if(!empty($cancellation)){
                            $content .= '<div class="pop-hotel-overview">
                                <p><strong>Cancellation:</strong>'.$cancellation.'</p>
                            </div>';
                         } 
						$price = get_field('price',get_the_ID());
							if(!empty($price)){
							$content .= '<div class="pop-hotel-overview">
							<p>From <strong class="usd-price">'.$price.'</strong></p>
							</div>';
						}   
						$days = get_field('days',get_the_ID());
							if(!empty($days)){ 
                        $content .= '<div class="pop-hotel-overview">
                                <p><strong>Days:</strong> '.$days.'</p>
                            </div>';
                           }
                        $content .= '</div>';

							if($meta_key == 'hotel') {
                        $hotel_book_links = get_field('hotel_booking_links',get_the_ID());

                        foreach ($hotel_book_links as $key => $value) {
							if($value['hotel_id'] == $post_id){
								$bookinglink = $value['booking_url'];
								if(!empty($bookinglink)){
								$content .= '<div class="book-now-pop">
								<a class="commonButton" href="'.$bookinglink.'" target="_blank">Book Now</a>
								</div>';
								}
                        	}
                        }
						}else{
						$book_button_link = get_field('book_button_link',get_the_ID());

						if(!empty($book_button_link)){
						$content .= '<div class="book-now-pop">
						<a class="commonButton" href="'.$book_button_link.'" target="_blank">Book Now</a>
						</div>';
						}
					}
                    $content .='</div>';
                  } 
                $content .='</div>';
			     
                }
			
				}else{
				$content .= '<h3 style="color:red;">No Tour Found</h3>';
				}
                




            $content .='</div> ';
        	if($posts->max_num_pages > 1){ 
			$content .='<div class="loader_main">
			<input type="hidden" id="page_num" value="1">	
			<input type="hidden" id="listing_grid" value="popup">	
			<input type="hidden" id="total_page" value="'.$posts->max_num_pages.'">';
			$content .= "<input type='hidden' id='current_query' value='".json_encode($posts->query_vars)."'>";	
            
			$content .= '<div class="book-now-pop"><button type="button" class="LoadmoreBtn commonButton">Load More <img class="loader_image1" src="'.site_url().'/wp-content/uploads/2021/08/loader-white.gif" alt="" width="20" height="20" style="display:none;"></button></div>
			</div>';
			} 
        echo json_encode(array('content'=>$content));
        wp_reset_query();
        exit;
}
add_action('wp_ajax_get_hotel_post_data', 'get_hotel_post_data'); 
add_action('wp_ajax_nopriv_get_hotel_post_data', 'get_hotel_post_data'); 


/* pop up Load more */

function get_hotel_load_more_post_data(){
ini_set('display_errors', 1);

$args = json_decode( stripslashes( $_POST['query'] ), true );
$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
$args['post_status'] = 'publish';
$post_type = $args['post_type'];
if(isset($args['meta_query'])){
$meta_key = $args['meta_query'][0]['meta_key'];
$hotel_id =  str_replace('"', '', $args['meta_query'][0]['value']);;
}else{
	$meta_key = '';
	$hotel_id = '';
}
$postsData = new WP_Query($args);

if($postsData->have_posts()){
while ( $postsData->have_posts()) {
//$hotel = get_field('hotel',get_the_ID());

$postsData->the_post();
$img = get_the_post_thumbnail_url(get_the_id(),'tour-list-img');
$content .= '<div class="hotel-credit">
    <div class="hotel-pimage">
        <img src="'.$img.'" alt="'.get_the_title().'">
    </div>
    <div class="hotel-pop-text">
        <h5>'.get_the_title().'</h5>';
		$contentp = strip_shortcodes(get_the_content());
		$contentp = wp_strip_all_tags($contentp);
		$content .= '<p>'.wp_trim_words($contentp , 20, "" ).'</p>';
       
       $content .= ' <div class="hotel-description">';
       if($post_type == 'transportation_cpt'){
			$cancellation = get_field('cancellation_policy',get_the_ID());
			if(!empty($cancellation)){
			$content .= '<div class="pop-hotel-overview">
			<p><strong>Cancellation:</strong>'.$cancellation.'</p>
			</div>';
			} 
			$price = get_field('rentals_starting',get_the_ID());
			if(!empty($price)){
			$content .= '<div class="pop-hotel-overview">
			<p>From <strong class="usd-price">'.$price.'</strong></p>
			</div>';
			}  
			$content .= '</div>';

			 if($meta_key == 'hotel') {
			$hotel_book_links = get_field('hotel_booking_links',get_the_ID());

			foreach ($hotel_book_links as $key => $value) {
				if($value['hotel_id'] == $hotel_id){
					$bookinglink = $value['booking_url'];
					if(!empty($bookinglink)){
					$content .= '<div class="book-now-pop">
					<a class="commonButton" href="'.$bookinglink.'" target="_blank">Book Now</a>
					</div>';
					}
				}
			}
			}else{
			$book_button_link = get_field('book_button_link',get_the_ID());

			if(!empty($book_button_link)){
			$content .= '<div class="book-now-pop">
			<a class="commonButton" href="'.$book_button_link.'" target="_blank">Book Now</a>
			</div>';
			}
			}
	     $content .='</div>';
       }else{
        $cancellation = get_field('cancellation',get_the_ID());
        if(!empty($cancellation)){
            $content .= '<div class="pop-hotel-overview">
                <p><strong>Cancellation:</strong>'.$cancellation.'</p>
            </div>';
         } 
		$price = get_field('price',get_the_ID());
			if(!empty($price)){
			$content .= '<div class="pop-hotel-overview">
			<p>From <strong class="usd-price">'.$price.'</strong></p>
			</div>';
		}   
		$days = get_field('days',get_the_ID());
			if(!empty($days)){ 
        $content .= '<div class="pop-hotel-overview">
                <p><strong>Days:</strong> '.$days.'</p>
            </div>';
           }
        $content .= '</div>';

		if($meta_key == 'hotel') {
		    $hotel_book_links = get_field('hotel_booking_links',get_the_ID());

		    foreach ($hotel_book_links as $key => $value) {
				if($value['hotel_id'] == $hotel_id){
					$bookinglink = $value['booking_url'];
					if(!empty($bookinglink)){
					$content .= '<div class="book-now-pop">
					<a class="commonButton" href="'.$bookinglink.'" target="_blank">Book Now</a>
					</div>';
					}
		    	}
		    }
			}else{
			$book_button_link = get_field('book_button_link',get_the_ID());

			if(!empty($book_button_link)){
			$content .= '<div class="book-now-pop">
			<a class="commonButton" href="'.$book_button_link.'" target="_blank">Book Now</a>
			</div>';
			}
		}
    $content .='</div>';
  } 
$content .='</div>';
 
}
}
  echo json_encode(array('content'=>$content));       
  exit;
}
add_action('wp_ajax_get_hotel_load_more_post_data', 'get_hotel_load_more_post_data'); 
add_action('wp_ajax_nopriv_get_hotel_load_more_post_data', 'get_hotel_load_more_post_data'); 
/* */



add_filter('comment_form_default_fields', 'website_remove');
function website_remove($fields)
{
if(isset($fields['url']))
unset($fields['url']);
return $fields;
}

add_filter('comment_form_default_fields', 'cumulus_contact_custom_fields');
function cumulus_contact_custom_fields($fields) {

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : ’ );


    $fields[ 'author' ] = '<div class="row"><div class="col-sm-12 col-md-6"><div class="form-group"><input name="author" type="text" class="form-control with-grey-bg" placeholder="Name (required)" required="required" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '></div></div>';
   

    $fields[ 'email' ] = '<div class="col-sm-12 col-md-6"><div class="form-group"><input name="email" type="text" placeholder="Email (required)" required="required" class="form-control with-grey-bg" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . '></div></div></div>';

 

  return $fields;
}
/*** End ***/


add_filter( 'comment_form_defaults', 'cumulus_contact_remove_textarea' );
add_action( 'comment_form_top', 'cumulus_contact_add_textarea' );

function cumulus_contact_remove_textarea($defaults)
{
    $defaults['comment_field'] = '';
    return $defaults;
}

function cumulus_contact_add_textarea()
{
    echo '<div class="row"><div class="col-sm-12 col-md-12"><div class="form-group"><textarea name="comment" rows="5" placeholder="Comments" required="required" class="form-control with-grey-bg"></textarea></div></div></div>';
}


function cumulus_init() {
	add_filter('comment_form_defaults','cumulus_comments_form_defaults');
}
add_action('after_setup_theme','cumulus_init');
 
function cumulus_comments_form_defaults($default) {
	unset($default['comment_notes_after']);
	return $default;
}

function my_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
   
    ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div class="comment-body">
		<div class="comment-avartar"> 
		    <img alt="" src="<?php echo get_avatar_url($comment->comment_author_email); ?>" height="60" width="60" >
		</div>
		<div class="comment-context">
		    <div class="comment-head"> 
		        <span class="comment-author"><?php echo $comment->comment_author; ?>:</span> 
		       
		        <span class="comment-reply">
		            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply ', 'twentysixteen' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> </span>
		    </div>
		    <div class="comment-content">
		    	<p><?php echo $comment->comment_content; ?></p>
		    	 <span class="comment-date"><?php echo date('F d, Y',strtotime($comment->comment_date)); ?></span>
		    </div>
		</div>
		</div>
	</li>
<?php
}

/** Remove custom Post slug **/
function reservemytours_remove_cpt_slug( $post_link, $post ) {
    if ( 'landing' === $post->post_type && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }
    return $post_link;
}
add_filter( 'post_type_link', 'reservemytours_remove_cpt_slug', 10, 2 );

function reservemytours_cpt_post_names_to_main_query( $query ) {

    // Return if this is not the main query.
    if ( ! $query->is_main_query() ) {
        return;
        
    }
    // Return if this query doesn't match our very specific rewrite rule.
    if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
        return;
    }
    // Return if we're not querying based on the post name.
    if ( empty( $query->query['name'] ) ) {
        return;
    }
    // Add CPT to the list of post types WP will include when it queries based on the post name.
    $query->set( 'post_type', array( 'post', 'page', 'location_cpt','hotel_cpt','agency_cpt' ) );
}
add_action( 'pre_get_posts', 'reservemytours_cpt_post_names_to_main_query' );


/*** Create Hotel Booking Links ***/
function my_acf_input_admin_footer() {

?>
<script type="text/javascript">
(function($) {

$('.hotel_set').find('.acf-actions a').hide();
var ajax_url  = '<?php echo admin_url('admin-ajax.php'); ?>';
var post_type = '<?php echo get_post_type(); ?>';
$('.hotel_set table').find('.hotel_name_input input').prop('readonly', true);

$('.select_hotel select').on('change', function() {
	
	var sin = $(this).length;
	var data_id = $(this).val();
	var input_length = $('.hotel_name_input input').length;
 
	if(data_id.length >= input_length ){
	  	for (let i = 0; i < sin; i++) {

	 	  $('.hotel_set').find('.acf-actions a').trigger('click');
		}
	}
	 $('.hotel_name_input input').each(function (i) {
	 $(this).val(data_id[i]);	
	 if($(this).val() == '') {
      $(this).parents('.acf-row[data-id="row-'+i+'"]').remove();
	 }
	 });
})


 $('.agency_set').find('.acf-actions a').hide();
  var ajax_url  = '<?php echo admin_url('admin-ajax.php'); ?>';
  var post_type = '<?php echo get_post_type(); ?>';
   $('.agency_set table').find('.agency_name_input input').prop('readonly', true);

  $('.select_agency select').on('change', function() {
	
	 	var sin = $(this).length;
	 		var data_id = $(this).val();
	 	 	var input_length = $('.agency_name_input input').length;
 

	if(data_id.length >= input_length ){

	  	for (let i = 0; i < sin; i++) {


	 	  $('.agency_set').find('.acf-actions a').trigger('click');

		}

	}

	 $('.agency_name_input input').each(function (i) {

	 $(this).val(data_id[i]);	

	 if($(this).val() == '') {

      $(this).parents('.acf-row[data-id="row-'+i+'"]').remove();

	 }

	 });

})	
  
})(jQuery);	
</script>
<?php
		
}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');



// Function to render LiveChat JS code
function add_agency_js() {
?>
    <!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
  jQuery(document).ready(function ($) {
 
     $('#all_agencybooking').DataTable( {
        dom: 'Bfrtip',
       "pageLength": 20,
         buttons: [
           'csv' 
        ]
    } );
 
   
      	 
});
    </script>
     <style>
     	.dt-buttons::before {
    content: "Expoert as ";
    font-size: 17px;
    font-weight: 900;
    padding: 0 12px 0 0;
}
.notice-info {
   
    display: none;
}
.updated {
    display: none;
}
.notice.notice-error {
    display: none;
}
.main_div {
    padding: 0 24px 0 0;
}
.main-head-agency {
    font-size: 29px;
    margin: 31px 0px;
    text-transform: capitalize;
    font-weight: 600;
}
     </style>
    <!-- End of LiveChat code -->
<?php
}
add_action( 'admin_footer', 'add_agency_js' ); // For back-end
 


function get_policy_data(){
   
 $content .= ' <span class="close-hotel">X</span>
        
        <div class="main-popup-inner">
          <div class ="posts-listing">';
            
           $content .= '<div class="policy-credit">';
		 
			 $content .= do_shortcode('[policy_bio]'); 
				  $content .='</div>';
			     
         
        echo json_encode(array('content'=>$content));
        wp_reset_query();
        exit;
}
add_action('wp_ajax_get_policy_data', 'get_policy_data'); 
add_action('wp_ajax_nopriv_get_policy_data', 'get_policy_data'); 




 add_action( 'init', 'policy_shortcode_init', 11 );
function policy_shortcode_init()
{
    add_shortcode( 'policy_bio', 'policy_bio_shortcode' );
}

function policy_bio_shortcode( $atts )
{
    $page_id = 6710; // the ID of the Bio page
    $page_data = get_page( $page_id );
    $return = '';
    $return .= '<h2 style="text-align:center">' . $page_data->post_title . '</h2>';

    $return .= wpautop(  $page_data->post_content );
    return $return;
}

/*  Land-Tour Post submenu item */
add_action('admin_menu', 'land_tour_submenu');

function land_tour_submenu(){
 add_submenu_page('edit.php?post_type=land_tour','Import CSV', 'Import CSV', 'manage_options', 'import-land-tour','update_hotelbooking_csv');

}
add_action('admin_menu', 'water_tour_submenu');

function water_tour_submenu(){
 add_submenu_page('edit.php?post_type=water_tour','Import CSV', 'Import CSV', 'manage_options', 'import-water-tour','update_hotelbooking_csv');

}
 add_action('admin_menu', 'transportation_submenu');

function transportation_submenu(){
 add_submenu_page('edit.php?post_type=transportation_cpt','Import CSV', 'Import CSV', 'manage_options', 'import-transportation','update_hotelbooking_csv');

}
 add_action('admin_menu', 'activities_submenu');

function activities_submenu(){
 add_submenu_page('edit.php?post_type=activities_cpt','Import CSV', 'Import CSV', 'manage_options', 'import-activities','update_hotelbooking_csv');

}


 function update_hotelbooking_csv() {
?>
    <div class="wrap import-csv">
    <h2>Import CSV</h2>
     <?php if (!empty($_FILES['csv_file']['name'])) { ?>
     <?php } else { ?>
        <p>Choose a CSV (.csv) file to upload, then click Update button.</p>
     <?php } ?>
     <?php
        if ( isset( $_POST['description-text'] ) ) {
        check_admin_referer( 'description-content', 'description-text' );
        ini_set("auto_detect_line_endings", true);
        if (!empty($_FILES['csv_file']['name'])) {
          
            $filename = $_FILES['csv_file']['tmp_name'];
            $file_handle = fopen($filename,"r");
            $i=0;
            $data = 0;
            $failedusers = array();
            $successusers = array();
            echo '<ol>';
            while (!feof($file_handle) ) {
                $block = 0;
                $check = 0;
                $column_data = fgetcsv($file_handle, 1024);
            if(!empty($column_data[0])) {
                    $i++;
                    if($i > 1 && $i < 302) {
                    $data++;            
                        $postID = sanitize_text_field($column_data[0]);
                        $bookingURL = sanitize_text_field($column_data[1]);
                        $hotel = sanitize_text_field($column_data[2]);
                        $refpost = 'Post_id' . $postID;
                        $old_value = get_field('hotel', $postID);
                        $new_value = array($hotel); 
                        //$values=array_merge($old_value, $new_value); 
                        if(!empty($old_value)){
                                $values=array_merge($old_value, $new_value);    
                            }else{
                                $values=$new_value;    
                            }
                        // print_r($values);
                         //echo $postID;
                       
                        update_field( 'hotel', $values, $postID );   
                        // exit();
                        $found = false;
                        if( have_rows('hotel_booking_links' , $postID) ): 
                        while( have_rows('hotel_booking_links', $postID) ): the_row(); 
                        $select = get_sub_field_object('hotel_id', $postID);
                        $value = $select['value'];
                        if ($value == $hotel) {
                            update_sub_field('hotel_id', $hotel, $postID);
                          update_sub_field('booking_url', $bookingURL, $postID);
                        $found = true;
                        }
                        endwhile;
                        endif;
                        if (!$found) {  
                        $row = array(
                        'hotel_id' => $hotel,
                        'booking_url' => $bookingURL,
                        );
                        add_row('hotel_booking_links', $row, $postID); 
                        } else {
                        }
                        echo '<li>';
                        echo ' Updated Post - ' . get_the_title($postID) . '<br />';   
                        echo '</li>';       
                    }
                }
            }
            echo '</ol>';
        fclose($file_handle);
        echo '<br />';         
        echo 'Updated ' . $data . ' posts';
        } else {
            echo 'Fail';
        }
    }
    ?>
  
    <form method="post" action="" enctype="multipart/form-data">
        <?php if (!empty($_FILES['csv_file']['name'])) { ?>
        <?php }  else { ?>
        <input type="file" id="users_csv" name="csv_file" value="" accept=".csv" class="all-options" />
  <?php } ?>
        <?php wp_nonce_field( 'description-content', 'description-text' ); ?>
        <?php if (!empty($_FILES['csv_file']['name'])) { ?>
        <h3> All Done. </h3>
        <?php }  else { ?>
        <p class="submit">
        <input type="submit" class="button-primary" value="Update Posts" />
        </p>
    <?php } ?>
    </form>
<?php }