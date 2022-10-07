<?php 
/* Template Name: Home */
get_header();
$banner = get_field('banner');
if(!empty($banner)){
?>
<div class="bannerOuter">
	<div class="banner-slider">
		<?php 
		foreach ($banner as $key => $value) {
		 ?>
	        <div>
		        <div class="bannerInner" style="background-image: url(<?php echo $value['banner_image']; ?>);">
		        	
		        </div>
	    	</div>
	    <?php } ?>
	</div>
	<div class="container">
		<div class="searchForm">
			<h1 class="searchFormheading"><strong>Explore the Beauty</strong> <br> of the Beautiful World</h1>
			<span class="formError"></span>
			<form action="<?php echo site_url(); ?>/our-tour" method="get">
				<div class="form-group">
					<input type="text" id="tour_name" name="tour_name" class="form-control" placeholder="Tour Name">
				</div>
			   <?php 
				$page = get_page( get_the_ID() );
				if ($page->post_status == 'draft') { ?>
 
				<div class="form-group selectIcon">
                 <?php
                 $arg = array('post_type'=> array('land_tour','water_tour','activities_cpt'),
                     'posts_per_page' => -1,
                     'post_status' => 'publish' 
                 );
                 $country_list = new WP_Query($arg);
                 while ( $country_list->have_posts()) {
                 	$country_list->the_post();
                 	$country_name[] = get_field('country',get_the_ID());
                 	# code...
                 }
                 wp_reset_query();
                  ?>

				   <select id="country_name" name="country" class="form-control">
				   	 <option value="">View all Country's Tours</option>
					<?php
					foreach (array_unique($country_name) as $key => $value) {
					if(!empty($value)){	
					?>
					<option value="<?php echo $value; ?>"><?php echo $value; ?></option>

					<?php } } ?>
					</select>
				</div> <?php } ?>
				<div class="form-group selectIcon">
					<select id="location_name" name="location" class="form-control">
				<option value="">View our Locations</option>
                 <?php
                 $arg = array('post_type'=> 'location_cpt',
                     'posts_per_page' => -1,
                     'post_status' => 'publish' 
                 );
                 $location_list = new WP_Query($arg);
                 while ( $location_list->have_posts()) {
                 	$location_list->the_post();
                 	 ?>
                    
				<option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
					
                 	 <?php
                 }
                 wp_reset_query();
                  ?>
              </select>
				   
				</div>
				<button type="submit" id="searchBtn" class="commonButton fullWidth">Search</button>
			</form>
		</div>
	</div>
</div>
<?php } ?>
	<section>
		<?php
		$about_reserve = get_field('about_reserve');
		if(!empty($about_reserve)){ ?>
		<div class="section aboutouter">
			<div class="container">
				<?php if(!empty($about_reserve['section_title'])){ ?>
				<div class="commonHeading"><?php echo $about_reserve['section_title']; ?></div>
			    <?php } ?>
				<div class="row">
				<?php if(!empty($about_reserve['about_content'])){ ?>
					<div class="col-md-6 col-12 about__content">
						<?php echo $about_reserve['about_content']; ?>
					</div>
				<?php } ?>
					<div class="col-md-6 col-12">
						<div class="form-row">
							<div class="col-6">
						<?php if(!empty($about_reserve['about_image_first'])){ ?>
								<div class="about_img">
									<img src="<?php echo $about_reserve['about_image_first']; ?>" alt="About Image First" >
								</div>
							<?php } ?>	
							</div>
							<div class="col-6">
						<?php if(!empty($about_reserve['about_image_second'])){ ?>
								<div class="about_img">
									<img src="<?php echo $about_reserve['about_image_second']; ?>" alt="About Image Second" >
								</div>
							<?php } ?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
		<?php
        $parallax_outer = get_field('parallax_outer');
        if(!empty($parallax_outer)){
		 ?>
     
		<div class="section parallaxouter" style="background-image: url(<?php echo $parallax_outer['background_image']; ?>)">
			<div class="container">
				<div class="row">
					<?php 
                    foreach ($parallax_outer['section_repeater'] as $key => $value) {
                    
					?>
					<div class="col-md-3 col-sm-6 col-12">
						<div class="tag__inner">
							<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>">
							<div class="tag__title"><?php echo $value['title']; ?></div>
						</div>
					</div>
					<?php 
                    }
                    ?>
				</div>
			</div>
		</div>
	   <?php } ?>
	 
		<?php 
        $notice_outer = get_field('notice_outer');
        if(!empty($notice_outer)){
		?>
		<div class="section noticeouter">
			<div class="container">
				<div class="row">
			    <?php foreach ($notice_outer as $key => $value) { ?>
					<div class="col-md-6 col-12 notice_inner">
						<div class="notice__image">
							<img src="<?php echo $value['notice_image']; ?>" alt="<?php echo $value['notice_title']; ?>" >
						</div>
						<div class="notice__content">
							<h6><?php echo $value['notice_title']; ?></h6>
							<p><?php echo $value['notice_content']; ?></p>
						</div>
					</div>
				  <?php } ?>	
				</div>
			</div>
		</div>
	<?php } ?>

		<?php 
		$arg = array('post_type'=>'testimonial_cpt','posts_per_page'=>6,'post_status'=>'publish'); 
		$query_post = new WP_Query($arg);
		if($query_post->have_posts()){

		?>
		<div class="section testimonialouter">
			<div class="container">
				<div class="commonHeading"><strong>What Travellers</strong> Say About us</div>
				<div class="testimonial_slider">
				<?php
				while ( $query_post->have_posts()) {
				$query_post->the_post();
				$img = get_the_post_thumbnail_url(get_the_ID(),'full');
				?>
					<div>
						<div class="testimonial_inner">
							<div class="quote_box">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="17" height="15" viewBox="0 0 17 15">
									<defs>
									<style>
									  .cls-1 {
									    fill: #006;
									    fill-rule: evenodd;
									  }
									</style>
									</defs>
									<path d="M16.747,11.297 C16.277,12.927 14.731,14.066 12.988,14.066 C12.981,14.066 12.976,14.066 12.970,14.066 C11.557,14.013 10.459,13.477 9.706,12.475 C8.361,10.683 8.521,7.836 9.067,5.943 C9.997,2.716 12.202,0.463 14.428,0.463 C14.566,0.463 14.706,0.472 14.843,0.490 C14.969,0.506 15.081,0.576 15.151,0.679 C15.221,0.782 15.241,0.909 15.207,1.028 L14.802,2.434 C14.754,2.597 14.614,2.717 14.442,2.742 C12.587,3.009 11.656,5.384 11.269,6.760 C11.671,6.591 12.190,6.453 12.811,6.453 C13.213,6.453 13.627,6.512 14.040,6.628 C15.049,6.909 15.883,7.545 16.389,8.417 C16.901,9.300 17.028,10.322 16.747,11.297 ZM4.421,14.066 C4.415,14.066 4.410,14.066 4.404,14.066 C2.991,14.012 1.893,13.477 1.140,12.475 C-0.205,10.683 -0.045,7.836 0.501,5.943 C1.431,2.716 3.636,0.463 5.862,0.463 C6.000,0.463 6.140,0.472 6.277,0.490 C6.403,0.506 6.515,0.576 6.585,0.679 C6.655,0.782 6.675,0.909 6.641,1.028 L6.236,2.434 C6.189,2.597 6.048,2.717 5.876,2.742 C4.022,3.009 3.091,5.384 2.703,6.760 C3.105,6.591 3.624,6.453 4.245,6.453 C4.647,6.453 5.061,6.512 5.474,6.628 C6.483,6.909 7.317,7.545 7.823,8.417 C8.335,9.300 8.462,10.322 8.181,11.297 C7.711,12.927 6.165,14.066 4.421,14.066 Z" class="cls-1"/>
									</svg>
							</div>
							<div class="testimonial_content">
								 <?php the_content(); ?>

                                 <h5 class="heading"><?php the_title(); ?></h5>
                                 <p class="subheading"><?php echo get_field('designation',get_the_ID()); ?></p>
							</div>
							<div class="testimonial_image">
								<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" >
							</div>
						</div>
					</div>
                  <?php } wp_reset_query(); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php
    $newsletter = get_field('newsletter',get_the_ID());
	 ?>
        <div class="section newsletterOuter">
         	<div class="row">
         		<div class="col-md-6 col-12 newsletter_image">
         			<img src="<?php echo $newsletter['newsletter_image']; ?>" alt="" >
         		</div>
         		<div class="col-md-6 col-12">
         			<div class="row">
	         			<div class="col-md-8 col-12">
	         				<div class="newsletter_form">
		         				<?php echo $newsletter['newsletter_content']; ?>
			         			<form action="<?php echo site_url(); ?>/?na=s" method="post">
			         				<div class="form-group">
			         					<input class="form-control" type="email" name="ne" value="" placeholder="Enter your email Address" required>
			         				</div>
									<button type="submit" class="commonButton fullWidth subscribe-btn">Subscribe Now <img src="<?php echo get_template_directory_uri(); ?>/images/subscribe-btn-icon.png" alt="" > </button>
			         			</form>
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