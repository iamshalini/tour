<?php 
/* Template Name: Transportation Rentals */
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
			<div class="commonHeading"><strong>All</strong> Transportation Rentals</div>
			<?php
			$terms = get_terms( array(
			'taxonomy' => 'transportation_category',
			'hide_empty' => false,
			) );
            

			?>
			<div class="row posts-listing">
			<?php 
			  if(!empty($terms)){
			  	foreach ($terms as $key => $value) {
			  	$img = get_field('transportation_image', $value->taxonomy . '_' . $value->term_id);
			  	$flip_image = get_field('flip_image',  $value->taxonomy . '_' . $value->term_id);
			  	$rentals_price = get_field('rentals_price', $value->taxonomy . '_' . $value->term_id);
			  	$cancellation_policy = get_field('cancellation_policy', $value->taxonomy . '_' . $value->term_id);
              ?>
				<div class="col-md-6 col-12">
						<div class="package__box">
							<div class="image_box image_flip_box">
								<img class="main_front" src="<?php echo $img['sizes']['tour-list-img']; ?>">
								<img class="main_back" src="<?php echo $flip_image['sizes']['tour-list-img']; ?>">
							</div>
							<div class="content_box">
								<div class="package_title"><?php $value->name; ?></div>
								<p><?php echo $value->description; ?></p>
                                <?php 
                               
								if(!empty($cancellation_policy)){
                                 ?>
                                <p><strong>Cancellation Policy:</strong> <?php echo $cancellation_policy; ?></p>
                                <?php } ?>

								<div class="link_box">
									<?php 
									if(!empty($rentals_price)){
									?>
									<div class="pricing">Rentals starting from:: <strong><?php echo $rentals_price; ?></strong></div>
                                    <?php } ?>
                                    
                                    
									<a href="<?php echo get_category_link($value->term_id); ?>" class="book_botton">Book Now</a>
								
								</div> 
							</div>
						</div>
					</div>
			<?php } } ?>
			</div>
		</div>
	</div>
</section>
<?php 
get_footer();
?>