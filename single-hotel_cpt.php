<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reserve My Tour | Hotel Partners</title>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/fevicon.png" type="image/png"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
<link rel='stylesheet' id='newsletter-css'  href='<?php echo site_url(); ?>/wp-content/plugins/newsletter/style.css?ver=7.2.0' media='all' />
<?php wp_head(); ?>
</head>
<body class="SingleHotelPage">
<main>
<?php 

$img = get_the_post_thumbnail_url(get_the_ID(),'full');
if(!empty($img)){
    $img = $img;
}else{
	$img = get_template_directory_uri()."/images/hotel-partners-banner.jpg";
}
?>
<div class="hotelpartnerspage--banner" style="background-image: url(<?php echo $img; ?>);">
	<div class="innerCaption">
		<h6><?php echo get_field('banner_title'); ?></h6>
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<section>
	<div class="section glleyBayHotel-outer">
		<div class="container">
			<div class="commonHeading">
			<?php
			/*$str = get_the_title();
			$Words = explode(" ",get_the_title());
			
			$WordCount = count($Words);
			$NewSentence = '';
			for ($i = 0; $i < $WordCount; ++$i) {
			if ($i < 1) {
			$NewSentence .= '<strong>' . $Words[$i] . '</strong> ';
			} else {
			$NewSentence .= $Words[$i] . ' ';
			}
			}*/
			echo get_the_title();
			?></div>
			<div class="row">
				<div class="col-md-6 col-12 about__content">
					<?php 
					
					$content_post = get_post(get_the_ID());
					$content = $content_post->post_content;
					echo $content = apply_filters('the_content', $content);
                     ?>
					<div class="button_box">
						<!-- <a href="#reserve-now" class="commonButton" style="text-align: center;">Reserve Now</a> -->
						<a href="mailto:<?php echo get_field('mail_to'); ?>" class="commonButton" style="text-align: center;">Contact us</a>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="form-row">
						<div class="col-6">
							<?php 
							$hotel_image_one = get_field('hotel_image_one'); 
							if(!empty($hotel_image_one)){
							?>
							<div class="about_img">
								<img src="<?php echo $hotel_image_one; ?>" alt="Image One" >
							</div>
						<?php } ?>
						</div>
						<div class="col-6">
							<?php 
							$hotel_image_two = get_field('hotel_image_two'); 
							if(!empty($hotel_image_two)){
							?>
							<div class="about_img">
								<img src="<?php echo $hotel_image_two; ?>" alt="Image Two" >
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section aboutTourspackages_sace" id="reserve-now">
		<div class="container">
			<div class="row">
				<?php 
                $about_packages = get_field('about_packages');
                foreach ($about_packages as $key => $value) {
                	if($key == 0)
                		$post_type = 'activities_cpt';
                	elseif($key == 1)
                		$post_type = 'land_tour';
                	elseif($key == 2)
                		$post_type = 'water_tour';
                	elseif($key == 3)
                		$post_type = 'transportation_cpt';
				?>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="about_packages" data-id="<?php echo get_the_ID(); ?>" data-post-type="<?php echo $post_type; ?>" data-meta-key="hotel" style="cursor: pointer;">
						<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" >
						<div class="packages_overlay">
							<div class="packages_title">
								<p><?php echo $value['title']; ?></p>
							</div>
						</div>
					</div>
				</div>
			  <?php } ?>
			
			</div>
		</div>
	</div>
</section>
<footer class="footerouter">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10 col-12">
					<!--div class="newsletter_area">
						<p>To receive our best monthly deals</p>
						<h1>Subscribe to our newsletter</h1>
						<form action="<?php //echo site_url(); ?>/?na=s" class="newsletter__form">
							<input type="email" name="ne" class="in_field" placeholder="Enter your email Address" required>
							<button type="submit" class="subscribe_button">Subscribe Now <img src="<?php //echo get_template_directory_uri(); ?>/images/subscribe-bluebtn-icon.png" alt=""></button>
						</form>
					</div-->
                    <div class="awards--accolades" >
                    	<p>Awards & Accolades</p>
                    <?php $awardsFooter = get_field('awards_&_accolades_images') ?>
                    	<?php if(!empty($awardsFooter)){ ?>
                    	<ul>
                    		<?php
                    		 foreach ($awardsFooter as $key => $value) {
                    		 ?>
                    		<li><img src="<?php echo $value['image']; ?>"></li>
                    		<?php 
                    		}
                    		?>
                    	</ul>
                    <?php } ?>
				
				</div>
				
			</div>
						<div class="col-12 footer-top">
			  <h2> Your Privacy: </h2> 
							<p>We will collect and store your email address during this process. Your email is solely used for interaction and reporting with your Travel Agent/Agency.</p>
<p>We will not use your personal information to solicit or send any marketing or promotional material. We respect your privacy!</p>
<p>Disclaimer: While we take all reasonable precautions to secure you and your data, the internet is as a whole has risk to data and data use. Data security beyond what is reasonable and practical therefore cannot be guaranteed.</p>

				</div>
		</div>
		<div class="copyRight-bottom">
			<div class="container">
				<div class="popupPpolicy" >
				    	<span class="policypop" style="text-align: center;">Terms of Use </span> 
					</div>
				<?php if(!empty($theme_option['social_links'])){ ?>
				<ul class="social_links">
					<li class="social_links-title">Social links:</li>
					<?php foreach ($theme_option['social_links'] as $key => $value) {
					if($key == 0)
					$class = 'fa-facebook-f';
					else if($key == 1)
					$class = 'fa-twitter';
					else if($key == 2)
					$class = 'fa-google-plus-g';
					else if($key == 3)
					$class = 'fa-youtube';
					else if($key == 4)
					$class = 'fa-instagram';
					 ?>
					<li><a target="_blank" href="<?php echo $value['link']; ?>"><i class="fab <?php echo $class; ?>"></i> <?php echo $value['title']; ?></a></li>
					<?php 
					}
					?>
				</ul>
			<?php } ?>
			</div>
		</div>
	</div>
	</footer>
 <!-- Popup Modal -->
  <div class="overlay-hotel">
  <section class="choose-hotel-popup">
    <div class="hotelPostLists">
       

      </div>
    </section>
</div>
	<div class="overlay-policy">
	<section class="choose-policy-popup">
		<div class="policycontent">


		</div>
	</section>
</div>
</main>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>    
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>    
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick-animation.min.js"></script>       
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>   
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script> 
<script>
	var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
    $(document).on('click','.close-hotel',function() {
        $(".choose-hotel-popup").hide();
        $("body").removeClass("intro");
		 $("body").removeClass("policy"); 
    });
	
	
    $(document).on('click','.about_packages',function() {
	var post_id = $(this).attr('data-id');
	var post_type = $(this).attr('data-post-type');
	var meta_key = $(this).attr('data-meta-key');
	// if(post_type == 'transportation_cpt'){
 //     window.location.href = '<?php echo site_url(); ?>/transportation-rentals';
	// }else{ 
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: {action: 'get_hotel_post_data',post_id:post_id,post_type:post_type,meta_key:meta_key},
			dataType:'json',
			success: function(data){
			$("body").addClass("intro");
			$(".choose-hotel-popup").show();
			$(".hotelPostLists").html(data.content);
			
			}
		});
	//}
    });
  $(document).on('click','.popupPpolicy .policypop',function() {
  		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: {action: 'get_policy_data'},
			dataType:'json',
			   
			success: function(data){
			$("body").addClass("policy");
		 	$(".choose-policy-popup").show();
			$(".policycontent").html(data.content);
			
			}
		});
	 
    });
</script> 
<?php wp_footer(); ?>
</body>
</html>