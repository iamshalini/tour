<?php
/* Template Name: Blog */
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
			<div class="commonHeading"><strong>Our</strong> <?php the_title(); ?></div>
			<div class="row">
				<div class="col-md-8 col-12">
					<div class="packageouter blog-grid-content">
						<div class="row posts-listing">
                        <?php 
                        $arg = array('post_type'=>'post','category__not_in' => 1 ,'post_status'=>'publish','posts_per_page'=>5);
                        $query = new WP_Query($arg);
                       
                        if($query->have_posts()){
                        $i=1;	
                        while ($query->have_posts()) {
                        $query->the_post();
                        $img = get_the_post_thumbnail_url(get_the_ID(),'full');
                        ?>
							<div class="<?php if($i==1){echo 'col-12'; }else{ echo 'col-md-6 col-12'; } ?>">
								<div class="package__box news-block">
									<?php if(!empty($img)){ ?>
									<div class="image_box">
										<img src="<?php echo $img; ?>" alt="">
									</div>
								<?php } ?>
									<div class="content_box">
									<?php $c = get_the_category(); 
                                  
									?>
									 
										<a href="<?php echo get_category_link($c[0]->term_id); ?>" class="category-button"><?php
									echo $c[0]->cat_name; ?></a>
										<div class="package_title"><?php the_title(); ?></div>
										<?php 
										$content = strip_shortcodes(get_the_content());
										$content = wp_strip_all_tags($content);
										?>
										<p><?php
										echo wp_trim_words($content , 20, "" ); ?>
										</p>
										<a href="<?php echo get_the_permalink(); ?>" class="blog_readmore_btn">Read More</a>
									</div>
								</div>
							</div>
                           <?php $i++; } ?>
							
						<?php }else{ ?>
                        <h3 style="text-align: center; color:red;">No Posts Found</h3>
						<?php } ?>

						</div>
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
				<div class="col-md-4 col-12 blog-sidebar">
				 	<div class="sidebar-widget category-widget">
				 		<div class="widget-title"><h3>Choose our Top Tours</h3></div>
				 		<div class="widget-content">
				 			<ul>
							<?php
							$arg = array('post_type'=>array('land_tour', 'water_tour'),
							'posts_per_page'=>6,
							'post_status'=>'publish',
							'meta_query' => array(
							array(
							'key'     => 'popular',
							'value'   => 'yes',
							'compare' => 'LIKE',
							),
							)
							); 
							$query_post = new WP_Query($arg);
							if($query_post->have_posts()){
							while ( $query_post->have_posts()) {
							$query_post->the_post();
							$book_button_link = get_field('book_button_link',get_the_ID());
									
							?>
				 				<li><a href="<?php echo $book_button_link; ?>" target="_blank"><?php the_title(); ?></a></li>
				 			<?php } }?>
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
 <?php
get_footer();

 ?>