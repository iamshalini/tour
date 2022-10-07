<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="images/fevicon.png" type="<?php echo get_template_directory_uri(); ?>/image/png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
   
	<?php endif; ?>
     <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
    </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main>
	<header>
		<nav class="navbar">
            <div class="container">
                <div class="navbar__Holder">
                    <?php 
                    $theme_option = get_field('theme_option','options');
                   
                    if(!empty($theme_option['header_logo'])){
                    ?>
                    <a href="<?php echo site_url(); ?>" class="navbar__logo"><img src="<?php echo $theme_option['header_logo']; ?>" alt=""></a>
                    <?php } ?>
                    <div class="menuIcon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                        <?php
                        $arg = array('menu'=>'Header Menu',
                                     'menu_class'=>'navbar__menu',
                                      'container_class'=>'navbar__inner'); 
                        echo wp_nav_menu($arg);
                        ?>
                    </div>
                </div>
            </div>
        </nav>
	</header>
