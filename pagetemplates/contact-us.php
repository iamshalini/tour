<?php 
/* Template Name: Contact US */
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(),'full');
if(!empty($img)){
    $img = $img;
}else{
	$img = get_template_directory_uri()."/images/contact-banner.jpg";
}
?>
<div class="innerpage--banner" style="background-image: url(<?php echo $img; ?>);"></div>
<section>
	<div class="section">
		<div class="container">
			<?php 
			$sectionTitle = get_field('section_title',get_the_ID()); 
			if(!empty($sectionTitle)){
			?>
			<div class="commonHeading"><?php echo $sectionTitle; ?></div>
		     <?php } ?>
		     <?php 
			$section_content = get_field('section_content',get_the_ID()); 
			if(!empty($section_content)){
			?>
			<div class="section_content"><?php echo $section_content; ?></div>
		     <?php } ?>
			<div class="row">
				<div class="col-md-7 col-12 contactform-outer">
					<?php echo do_shortcode('[contact-form-7 id="6158" title="Contact Form New"]'); ?>
				</div>
				<div class="col-md-5 col-12">
					<div class="getIntouch_outer">
						<h3 class="getIntouch_title">Want to get in touch with us? </h3>
						<?php 
						$theme_option = get_field('theme_option','options'); ?>
						<ul>
						<?php if(!empty($theme_option['phone_number'])){ ?>
							<li class="getIntouch_listing">
								<a class="getIntouch_list_item" href="tel:<?php echo str_replace(array('+', ' '), '', $theme_option['phone_number']) ?>">
									<div class="contact_icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="23" height="23" viewBox="0 0 23 23">
										<defs>
										<style>
										  .cls-1 {
										    fill: #000;
										    fill-rule: evenodd;
										  }
										</style>
										</defs>
										<path d="M21.629,11.122 C21.227,11.122 20.901,10.796 20.901,10.394 C20.901,5.576 16.983,1.658 12.165,1.658 C11.764,1.658 11.437,1.332 11.437,0.930 C11.437,0.528 11.764,0.202 12.165,0.202 C17.784,0.202 22.357,4.774 22.357,10.394 C22.357,10.796 22.031,11.122 21.629,11.122 ZM12.165,6.026 C14.574,6.026 16.533,7.986 16.533,10.394 C16.533,10.796 16.207,11.122 15.805,11.122 C15.404,11.122 15.077,10.796 15.077,10.394 C15.077,8.788 13.771,7.482 12.165,7.482 C11.764,7.482 11.437,7.156 11.437,6.754 C11.437,6.352 11.764,6.026 12.165,6.026 ZM12.165,3.114 C16.180,3.114 19.445,6.380 19.445,10.394 C19.445,10.796 19.119,11.122 18.717,11.122 C18.316,11.122 17.989,10.796 17.989,10.394 C17.989,7.182 15.377,4.570 12.165,4.570 C11.764,4.570 11.437,4.244 11.437,3.842 C11.437,3.440 11.764,3.114 12.165,3.114 ZM12.069,17.557 L13.214,15.188 C13.298,15.015 13.448,14.881 13.632,14.817 C13.814,14.753 14.015,14.763 14.189,14.851 C16.046,15.758 18.059,16.218 20.173,16.218 C20.575,16.218 20.901,16.544 20.901,16.946 L20.901,21.314 C20.901,21.716 20.575,22.042 20.173,22.042 C9.335,22.042 0.517,13.224 0.517,2.386 C0.517,1.984 0.844,1.658 1.245,1.658 L5.613,1.658 C6.015,1.658 6.341,1.984 6.341,2.386 C6.341,4.500 6.802,6.514 7.709,8.370 C7.795,8.545 7.806,8.746 7.743,8.928 C7.680,9.111 7.547,9.261 7.372,9.346 L5.005,10.493 C6.656,13.454 9.108,15.905 12.069,17.557 Z"/>
										</svg>
									</div>
									<div class="contact_info">
										<h4>Call us on</h4>
										<p>Give us a Call: <?php echo $theme_option['phone_number']; ?></p>
									</div>
								</a>
							</li>
						<?php } ?>
						<?php if(!empty($theme_option['email_address'])){ ?>
							<li class="getIntouch_listing">
								<a class="getIntouch_list_item" href="mailto:<?php echo $theme_option['email_address']; ?>">
									<div class="contact_icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="26" height="25" viewBox="0 0 26 25">
										<defs>
										<style>
										.cls-1 {
										    fill: #000;
										    fill-rule: evenodd;
										}
										</style>
										</defs>
										<path d="M22.932,20.301 C22.898,20.528 22.764,20.731 22.566,20.852 C22.443,20.927 22.302,20.965 22.161,20.965 C22.076,20.965 21.990,20.951 21.909,20.924 L11.013,17.196 L21.728,4.275 L7.881,16.125 L1.380,13.901 C1.086,13.800 0.879,13.534 0.855,13.221 C0.832,12.910 0.995,12.615 1.272,12.470 L24.659,0.245 C24.918,0.109 25.232,0.132 25.471,0.302 C25.711,0.472 25.833,0.761 25.791,1.053 L22.932,20.301 ZM11.355,23.768 C11.206,23.972 10.971,24.087 10.727,24.087 C10.646,24.087 10.564,24.074 10.484,24.048 C10.164,23.942 9.948,23.643 9.948,23.306 L9.948,18.481 L14.175,19.927 L11.355,23.768 Z"/>
										</svg>
									</div>
									<div class="contact_info">
										<h4>Email Address</h4>
										<p><?php echo $theme_option['email_address']; ?></p>
									</div>
								</a>
							</li>
						<?php } ?>
						</ul>
						<?php 
						$address_logo = get_field('address_logo',get_the_ID()); 
						if(!empty($address_logo)){
						?>
                        <div class="timeTotravel_logo">
							<img src="<?php echo $address_logo; ?>" alt="Address Logo" >
						</div>
                       <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	$about_packages = get_field('about_packages',get_the_ID());
	if(!empty($about_packages)){
	?>
	<div class="section aboutTourspackages_sace">
		<div class="container">
			<div class="row">
			<?php foreach ($about_packages as $key => $value) {
				?>
				<div class="col-md-3 col-12">
					<div class="about_packages">
						<a href="<?php echo $value['link']; ?>">
						<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" >
						<div class="packages_overlay">
							<div class="packages_title">
								<p><?php echo $value['title']; ?></p>
							</div>
						</div>
					</a>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
</section>
<?php 
get_footer();
?>