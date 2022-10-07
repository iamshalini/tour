<?php 
/* Template Name: About */
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
	<?php
     $about_reserve = get_field('about_reserve',get_the_ID());
     if(!empty($about_reserve)){
	 ?>
	<div class="section aboutouter">
		<div class="container">
			<div class="commonHeading"><strong>About</strong> <?php echo $about_reserve['section_title']; ?></div>
			<div class="row">
				<div class="col-md-6 col-12 about__content">
					<?php echo $about_reserve['section_content']; ?>
				</div>
				<div class="col-md-6 col-12">
					<div class="form-row">
							<?php if(!empty($about_reserve['first_image'])){ ?>
						<div class="col-6">
							<div class="about_img">
								<img src="<?php echo $about_reserve['first_image']; ?>" alt="" >
							</div>
						</div>
					<?php } ?>
					<?php if(!empty($about_reserve['second_image'])){ ?>
						<div class="col-6">
							<div class="about_img">
								<img src="<?php echo $about_reserve['second_image']; ?>" alt="" >
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php 
			$about_center_text  = get_field('about_center_text',get_the_ID());
			if(!empty($about_center_text)){ ?>
			<p class="aboutText-margin"><?php echo $about_center_text; ?></p>
		   <?php } ?>
		</div>
	</div>
   <?php } ?>
	<?php
	$about_tours_packages = get_field('about_tours_packages',get_the_ID());
	if(!empty($about_tours_packages)){
	?>
	<div class="section aboutTours-packages">
		<div class="container">
			<div class="row">
				<?php foreach ($about_tours_packages as $key => $value) {
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
    <?php
	$ticket_purchase = get_field('ticket_purchase',get_the_ID());
	if(!empty($ticket_purchase)){
	?>
	<div class="section disclaimerouter">
		<div class="container">
			<div class="disclaimer_content">
				<div class="commonHeading"><strong>Ticket</strong> <?php echo $ticket_purchase['section_title']; ?></div>

				   <?php
				    echo $ticket_purchase['content'];
				    $read_more = $ticket_purchase['read_more_button'];
				    if(!empty($read_more)){
				    ?>
				   <a href="<?php echo $read_more['url']; ?>" class="readmore_btn"><?php echo $read_more['title']; ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
</section>
<?php get_footer(); ?>