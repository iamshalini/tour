<?php 
/* Template Name: Activities & Sports */
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(),'full');
if(!empty($img)){
    $img = $img;
}else{
	$img = get_template_directory_uri()."/images/activities-&-sports-panner.jpg";
}
?>
<div class="innerpage--banner" style="background-image: url(<?php echo $img; ?>);"></div>
<section>
	<div class="section packageouter">
		<div class="container">
			<div class="commonHeading"><strong>All</strong> Activities & Sports</div>
			<?php 
			$arg = array('post_type'=>'activities_cpt','posts_per_page'=>get_option('posts_per_page'),'post_status'=>'publish'); 
			$query_post = new WP_Query($arg);
			if($query_post->have_posts()){
			?>
			<div class="row posts-listing">
			<?php while ( $query_post->have_posts()) {
             	$query_post->the_post();
             	$img = get_the_post_thumbnail_url(get_the_ID(),'tour-list-img');
             	$flip_image = get_field('flip_image', get_the_ID());
              ?>
				<div class="col-md-4 col-12">
						<div class="package__box">
							<div class="image_box image_flip_box">
								<img class="main_front" src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
								<img class="main_back" src="<?php echo $flip_image['sizes']['tour-list-img']; ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="content_box">
								<div class="package_title"><?php the_title(); ?></div>
								<?php 
								$content = strip_shortcodes(get_the_content());
								$content = wp_strip_all_tags($content);
								?>
								<p><?php
								echo wp_trim_words($content , 20, "" ); ?>
								</p>
                                <?php 
                                $cancellation = get_field('cancellation',get_the_ID());
                                if(!empty($cancellation)){
                                 ?>
                                <p><strong>Cancellation: </strong> <?php echo $cancellation; ?></p>
                                <?php } ?>
                                <?php 
                                $days = get_field('days',get_the_ID());
                                if(!empty($days)){
                                 ?>
                                <p><strong>Days: </strong> <?php echo $days; ?></p>
                                <?php } 
								  $durations = get_field('durations',get_the_ID());
                                if(!empty($durations)){
                                 ?>
                                <p><strong>Durations: </strong> <?php echo $durations; ?></p>
                                <?php } 
                                $minimum_age = get_field('minimum_age',get_the_ID());
                                if(!empty($minimum_age)){
                                 ?>
                                <p><strong>Minimum Age: </strong> <?php echo $minimum_age; ?></p>
                                <?php } ?>
								<div class="link_box">
									<?php 
									$price = get_field('price',get_the_ID());
									if(!empty($price)){
									?>
									<div class="pricing">From: <strong><?php echo $price; ?></strong></div>
                                    <?php } ?>
                                    <?php 
									$book_button_link = get_field('book_button_link',get_the_ID());
									if(!empty($book_button_link)){
									?>
									<a href="<?php echo $book_button_link; ?>" class="book_botton" target="_blank">Book Now</a>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
			<?php }  ?>
			</div>
		<?php } ?>
		<?php if($query->max_num_pages > 1){ ?>
		<div class="loader_main" style="display:none;">
		<input type="hidden" id="page_num" value="1">	
		<input type="hidden" id="total_page" value="<?php echo $query->max_num_pages; ?>">
		<input type="hidden" id="current_query" value='<?php echo json_encode($query->query_vars); ?>'>	
		<img class="loader_image" src="<?php echo get_template_directory_uri(); ?>/images/loader.png" alt="" width="64" height="64">
		</div>
	<?php } ?>
		</div>
	</div>
</section>
<?php 
get_footer();
?>