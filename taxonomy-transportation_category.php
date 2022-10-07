<?php 
get_header();
$cat_id = get_queried_object_id();
$img = get_field('banner_image', 'transportation_category' . '_' . $cat_id);
if(!empty($img)){
	$img = $img;
}else{
$img = get_template_directory_uri()."/images/activities-&-sports-panner.jpg";
}
if(isset($_GET['hotel_id']) && !empty($_GET['hotel_id'])){
	$hotel_id = base64_decode($_GET['hotel_id']);
}else{
	$hotel_id = '';
}
?>
<div class="innerpage--banner" style="background-image: url(<?php echo $img; ?>);"></div>
<section>
	<div class="section packageouter">
		<div class="container">
			<div class="commonHeading"><strong>All</strong> <?php echo single_term_title(); ?></div>
			<?php 
		    global $wp_query;
			if(have_posts()){
			?>
			<div class="row posts-listing">
			<?php while ( have_posts()) {
             	the_post();
             	$img = get_the_post_thumbnail_url(get_the_ID(),'tour-list-img');
             	$flip_image = get_field('flip_image', get_the_ID());
              ?>
				<div class="col-md-4 col-12">
						<div class="package__box">
							<div class="image_box image_flip_box">
								<img class="main_front" src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>">
								<img class="main_back" src="<?php echo $flip_image['sizes']['tour-list-img']; ?>" alt="<?php echo get_the_title(); ?>">
							</div>
							<div class="content_box">
								
								<div class="package_title"><?php the_title(); ?></div>

								<div class="icon-with-text">
								<?php 
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
								?>
								<div class="book-icon-main">
								<div class="book-icon">
								<img src="<?php echo $image_ico; ?>">
								</div>
								<div class="book-text">
								<h4><?php if($value['label'] == 'Bag'){ echo $no_of_bag.' '.$value['label']; } else { echo $value['label']; } ?></h4>
								</div>
								</div>
								<?php } } ?>
								</div>
                                <?php 
                                /*$cancellation = get_field('cancellation_policy');
								if(!empty($cancellation)){
                                 ?>
                                <p><strong>Cancellation Policy:</strong> <?php echo $cancellation; ?></p>
                                <?php } */ ?>
                              
								<div class="link_box">

									<?php 
									$rentals_starting = get_field('rentals_starting',get_the_ID());
									if(!empty($rentals_starting)){
									?>
									<div class="pricing">Rentals starting<br> <strong><?php echo $rentals_starting; ?></strong></div>
                                    <?php } ?>
                                    
                                  


		                                <?php 
		                         $hotel_booking_links = get_field('hotel_booking_links');
		                        
		                        if(!empty($hotel_id)){
		                         foreach ($hotel_booking_links as $key => $value) {
		                         	if($value['hotel_id'] == $hotel_id){ ?>
		                               <a href="<?php echo $value['booking_url']; ?>" class="book_botton" target="_blank">Book Now</a>
		                         	<?php }
		                         }
		                        }else{
		                         $booking_link = get_field('booking_link',get_the_ID());
										if(!empty($booking_link)){
										?>
										<a href="<?php echo $booking_link; ?>" class="book_botton" target="_blank">Book Now</a>
									<?php 
								     }
		                         }
		                        ?>
								</div>
							</div>
						</div>
					</div>
			<?php }  ?>
			</div>
		<?php } ?>
		<?php if($wp_query->max_num_pages > 1){ ?>
		<div class="loader_main" style="margin-bottom:50px;">
		<input type="hidden" id="page_num" value="1">	
		<input type="hidden" id="total_page" value="<?php echo $wp_query->max_num_pages; ?>">
		<input type="hidden" id="current_query" value='<?php echo json_encode($wp_query->query_vars); ?>'>	
		<div class="book-now-pop"><button type="button" class="LoadmoreBtn commonButton">Load More <img class="loader_image1" src="<?php echo site_url(); ?>/wp-content/uploads/2021/08/loader-white.gif" alt="" width="20" height="20" style="display:none;"></button></div>
		</div>
	<?php } ?>
		</div>
	</div>
</section>
<?php 
get_footer();
?>