<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$theme_option = get_field('theme_option','options');

?>
<footer class="footerouter">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12 footer_inner">
					<?php 
                    if(!empty($theme_option['footer_logo'])){
					?>
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo $theme_option['footer_logo']; ?>" class="footerLogo" alt="footer-logo" >
					</a>
				    <?php } ?>
				    <?php 
                    if(!empty($theme_option['footer_text'])){
					?>
					<p><?php echo $theme_option['footer_text']; ?></p>
					<?php } ?>
				    <ul class="contact_information">
						<?php 
						if(!empty($theme_option['phone_number'])){
						?>
				    	<li><a href="tel:<?php echo str_replace(array('+', ' '), '', $theme_option['phone_number']) ?>"><i class="fas fa-phone-alt"></i><?php echo $theme_option['phone_number']; ?></a></li>
				        <?php } ?>
				        <?php 
						if(!empty($theme_option['email_address'])){
						?>
				    	<li><a href="mailto:<?php echo $theme_option['email_address']; ?>"><i class="fas fa-envelope"></i> <?php echo $theme_option['email_address']; ?></a></li>
				    	<?php } ?>
				    </ul>
				</div>
				<div class="col-lg-3 col-md-6 col-12 footer_inner">
					<h6>Link</h6>
					<?php
					$arg = array('menu'=>'footer Menu'); 
					echo wp_nav_menu($arg);
					?>
				</div>
				<div class="col-lg-3 col-md-6 col-12 footer_inner">
					<h6>Social links</h6>
                    <?php 
                     if(!empty($theme_option['social_links'])){

                    ?>
					<ul>
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
						<li><a href="<?php echo $value['link']; ?>" target="_blank"><i class="fab <?php echo $class; ?>"></i> <?php echo $value['title']; ?></a></li>
					    <?php } ?>
					</ul>
				<?php } ?>
				</div>
				<div class="col-lg-3 col-md-6 col-12 footer_inner">
					<h6> Latest From Blog</h6>
					<?php 
					$arg = array('post_type'=>'post','posts_per_page'=>2,'post_status'=>'publish','category__not_in' => 1); 
					$query_post = new WP_Query($arg);
					if($query_post->have_posts()){
					?>
					<ul>
						<?php while ( $query_post->have_posts()) {
						$query_post->the_post();
						$img = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						?>
						<li class="latest_blog">
							<a href="<?php echo get_the_permalink(); ?>" class="blog_inner">
								<?php if(!empty($img)){ ?>
								<div class="blog_image">
									<img src="<?php echo $img; ?>" height="70" width="70">
								</div>
							<?php } ?>
								<div class="blog_content">
									<?php 
									$content = strip_shortcodes(get_the_content());
									$content = wp_strip_all_tags($content);
									?>
									<p><?php
									echo wp_trim_words($content , 10, "" ); ?>
									</p>
									<strong><?php echo get_the_date(); ?></strong>
								</div>
							</a>
						</li>
					<?php } wp_reset_query(); ?>
						</ul>
					<?php } ?>
						
					
				</div>
			</div>
		</div>
		<div class="copyRight-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-12 copyRight_content">
						<p>	&#169; Copyright <?php echo date('Y'); ?> Reserve My Tours.All Right Reseved.</p>
					</div>
					<div class="col-md-6 col-12 payment_cards">
						<strong>Ways You Can Pay</strong>
						<img src="<?php echo get_template_directory_uri(); ?>/images/cards-icon.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</footer>
</main>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>    
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>    
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick-animation.min.js"></script>       
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>   
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>   
<?php wp_footer(); ?>
</body>
</html>