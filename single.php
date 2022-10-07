<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();

$banner_img = get_field('banner_image',get_the_ID());
if(!empty($banner_img)){
$img = $banner_img;
}else{
	$img = get_template_directory_uri()."/images/blog-banner.jpg";
}

?>
<div class="innerpage--banner single-blog	" style="background-image: url(<?php echo $img; ?>);">
		<div class="container">
		    <h1 class="sing-blg-title"> <?php the_title(); ?> </h1>
		</div>
</div>
<section>
<div class="section single-block">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-12 news-block ">
            	<?php
            	 $img = get_the_post_thumbnail_url(get_the_ID(),'full'); 
            	 if(!empty($img)){
            	?>
                <div class="blog-detail-image">
                    <img src="<?php echo $img; ?>">
                </div>
                <?php } ?>
                <div class="single-category">
					<?php $c = get_the_category(); ?>
					<button type="button" class="category-button"><?php
					echo $c[0]->cat_name; ?></button>
                    <span class="bolg-publish"><?php echo get_the_date(); ?></span>
                </div>
                <div class="single-blog-title">
                    <h3><?php echo the_title(); ?></h3>
                </div>


                <div class="blog-single-text">
                    <!-- <h4>What is Lorem Ipsum?</h4> -->
                    <?php the_content(); ?>

                </div>
              <div class="CommentSec">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
					comments_template();
					}
					?>
              </div>

            </div>
            <div class="col-md-4 col-12 blog-sidebar">
				 	<div class="sidebar-widget category-widget">
				 		<div class="widget-title"><h3>Choose our Top Tours</h3></div>
				 		<div class="widget-content">
				 			<ul>
							<?php
							 $terms = get_terms( array(
							'taxonomy' => 'category',
							'hide_empty' => true,
							 'exclude'=>1
							) );
                             foreach ($terms as $key => $value) {
							?>
				 				<li><a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name; ?></a></li>
				 			<?php } ?>
				 			</ul>
				 		</div>
				 	</div>

				 	<div class="sidebar-widget post-widget">
				 		<div class="widget-title"><h3>Recent Posts</h3></div>
				 		<div class="post-inner">
						<?php 
						$arg = array('post_type'=>'post','post_status'=>'publish','posts_per_page'=>6,'category__not_in' => 1);
						$query = new WP_Query($arg);
						if($query->have_posts()){
						$i=1;	
						while ($query->have_posts()) {
						$query->the_post();
						$img = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						?>
				 		<div class="post">
				 			<?php if(!empty($img)){ ?>
				 			<div class="post-thumb">
				 				<a href="<?php echo get_the_permalink(); ?>">
				 					<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" height="70" width="70">
				 				</a>
				 			</div>
				 		    <?php } ?>
				 			<div class="post-content">
				 				<h6>
				 					<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
				 				</h6>
				 				<span class="post-date"><?php echo get_the_date(); ?></span>
				 			</div>
				 		</div>
				 	    <?php } } wp_reset_query(); ?>
				 		</div>
					</div> 	 
				</div>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>