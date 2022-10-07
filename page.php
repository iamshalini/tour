<?php
get_header();

$img = get_the_post_thumbnail_url(get_the_ID(),'full');
if(!empty($img)){
    $img = $img;
}else{
	$img = get_template_directory_uri()."/images/about-page-banner.jpg";
}
?>
<div class="innerpage--banner" style="background-image: url(<?php echo $img; ?>);"></div>
<section>
	<div class="section">
		<div class="container">
		    <div class="commonHeading"><strong></strong> <?php the_title(); ?></div>
			<div class="row">

			<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php
			// Start the loop.
			while ( have_posts() ) :
			the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
			comments_template();
			}

			// End the loop.
			endwhile;
			?>

			</main><!-- .site-main -->


			</div><!-- .content-area -->
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
