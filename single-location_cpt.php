<?php 
get_header();
if(have_posts()){
while(have_posts()){
the_post();
$banner_img = get_the_post_thumbnail_url(get_the_ID(),'full');
if(!empty($banner_img)){
$banner_img = $banner_img;
}else{
$banner_img = get_template_directory_uri().'/images/island-of-jamaica-banner.jpg';
}

?>
<div class="innerpage--banner" style="background-image: url(<?php echo $banner_img; ?>);"></div>
	<section>
		<div class="section aboutouter">
			<div class="container">
				<div class="commonHeading"><strong>Islands </strong>of <?php echo get_field('country'); ?></div>
				<div class="row">
					<?php 
					$pageContent = get_the_content();
					if(!empty($pageContent)){
					?>
					<div class="col-md-6 col-12 about__content">
						<?php the_content(); ?>
					</div>
				<?php } ?>
					<div class="<?php if(!empty($pageContent)){  echo 'col-md-6 col-12'; }else{ echo 'col-md-12 col-12'; } ?>">
						<div class="form-row">
							<div class="col-6">
								<?php
								$first_img = get_field('first_image');
								if(!empty($first_img)){
								 ?>
								<div class="about_img">
									<img src="<?php echo $first_img; ?>" alt="" >
								</div>
							<?php } ?>
							</div>
							<div class="col-6">
									<?php
								$second_image = get_field('second_image');
								if(!empty($second_image)){
								 ?>
								<div class="about_img">
									<img src="<?php echo $second_image; ?>" alt="" >
								</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
         
         	<?php 
        $about_packages = get_field('about_packages');
        if(!empty($about_packages)){
		?>
		<div class="section">
			<div class="container">

				<div class="commonHeading"><strong>Explore</strong> <?php echo get_field('country',get_the_ID()); ?> </div>
			
				<div class="row">
                <?php
                 
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
					
				<div class="col-md-3 col-12">
					<div class="about_packages" data-id="<?php echo get_the_ID(); ?>" data-post-type="<?php echo $post_type; ?>" data-meta-key="location" style="cursor: pointer;">
						<img src="<?php echo $value['image']; ?>" alt="" >
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
	<?php } ?>


			<?php 
		$post_id = get_the_ID();	
		$arg = array(
		'post_type'=>'activities_cpt',
		'posts_per_page'=>6,
		'post_status'=>'publish',
		'meta_query' => array(
		'relation' => 'AND',	
		array(
			'key'     => 'popular',
			'value'   => 'yes',
			'compare' => 'LIKE',
		),
		array(
		'key' => 'location',
		'value' => '"'.$post_id.'"',
		'compare' => 'LIKE'
		)
		)
		); 
	$query_post = new WP_Query($arg);
	// echo "<pre>";
 //    print_r($query_post);
	// echo "</pre>";
	if($query_post->have_posts()){

	?>
		<div class="section packageouter">
			<div class="container">
				<div class="commonHeading"><strong>Popular</strong> ACTIVITIES & SPORTS</div>
				<div class="row">
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
                                <p><strong>Cancellation:</strong> <?php echo $cancellation; ?></p>
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
				<?php } wp_reset_query(); ?>
				</div>
			</div>
		</div>
       <?php } ?>
       <!--- Land & Water Tours --->
       
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
		array(
		'key' => 'location',
		'value' => '"'.$post_id.'"',
		'compare' => 'LIKE'
		)
		)
		); 
		$query_post = new WP_Query($arg);
		if($query_post->have_posts()){

		?>
		<div class="section packageouter choose-top-tours">
			<div class="container">
				<div class="commonHeading"><strong>Choose our</strong> Top Tours</div>
				<div class="row">
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
                                <p><strong>Cancellation:</strong> <?php echo $cancellation; ?></p>
                                <?php } ?>
                                <?php 
                                $days = get_field('days',get_the_ID());
                                if(!empty($days)){
                                 ?>
                                <p><strong>Days:</strong> <?php echo $days; ?></p>
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
				<?php } wp_reset_query(); ?>
				</div>
			</div>
		</div>
	<?php } ?>

       <!--- End ---->
       <!--- TRANSPORTATION --->
        	<?php 
		$terms = get_terms( array(
		'taxonomy' => 'transportation_category',
		'hide_empty' => false,
		'meta_query' => array(array(
		'key' => 'location',
		'value' => get_the_ID(),
		'type' => 'NUMERIC',
		)),
		) );
          if(!empty($terms)){  
		?>
		<div class="section packageouter">
			<div class="container">
				<div class="commonHeading"><strong>TRANSPORTATION</strong> RENTALS</div>
				<?php
		

			?>
			<div class="row">
			<?php 
			  
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
			<?php }  ?>
			</div>
			</div>
		</div>
	    <?php } ?>

      <!--- End --->
		<div class="section jamaicaMap-outer">
			<div class="commonHeading"><strong>OUR INTERACTIVE</strong> MAP OF <?php echo get_field('country',get_the_ID()); ?></div>
			<div class="jamaicaMap" id="map"></div>
		</div>
		<?php
		 $location_lists = get_field('location_lists'); 
		 if(!empty($location_lists)){
		?>
		<div class="direction--outer">
			<div class="container">
				<div class="direction_inner">
					<div class="direction_heading">
						<button type="button" id="defaultView_btn" class="defaultView_btn">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="18" height="23" viewBox="0 0 18 23">
							<defs>
							<style>
							  .cls-1 {
							    fill-rule: evenodd;
							  }
							</style>
							</defs>
							<path d="M0.040,12.270 C-0.094,11.106 0.018,9.982 0.322,8.943 C1.333,5.490 4.506,2.951 8.270,2.906 L8.270,0.649 C8.270,0.524 8.427,0.457 8.530,0.533 L13.171,3.945 C13.247,4.003 13.247,4.120 13.171,4.173 L8.534,7.586 C8.427,7.662 8.275,7.595 8.275,7.469 L8.275,5.217 C5.800,5.257 3.687,6.784 2.779,8.943 C2.434,9.758 2.260,10.658 2.309,11.603 C2.376,12.902 2.864,14.097 3.634,15.064 C4.045,15.579 3.947,16.332 3.414,16.721 C2.909,17.093 2.202,16.990 1.812,16.497 C0.859,15.306 0.223,13.855 0.040,12.270 ZM13.439,7.935 C14.213,8.898 14.701,10.098 14.764,11.397 C14.813,12.346 14.634,13.246 14.294,14.057 C13.385,16.215 11.273,17.747 8.798,17.782 L8.798,15.530 C8.798,15.405 8.642,15.338 8.539,15.414 L3.898,18.826 C3.822,18.884 3.822,19.001 3.898,19.055 L8.534,22.467 C8.642,22.543 8.794,22.476 8.794,22.350 L8.794,20.093 C12.558,20.053 15.735,17.514 16.742,14.057 C17.046,13.018 17.154,11.894 17.024,10.730 C16.845,9.144 16.209,7.693 15.256,6.502 C14.862,6.010 14.160,5.907 13.654,6.278 C13.126,6.668 13.028,7.420 13.439,7.935 Z"/>
						</svg> Default View</button>
					</div>
					<ul>
                    <?php 
                    
                    foreach ($location_lists as $key => $value) {
                    $arrayData[] = array('info'=>$value['short_description'],'lat'=>$value['lat'],'long'=>$value['long'],'label'=>$value['location_title']);
                    ?>
						<li class="direction_listing">
							<div class="direction_content">
								<i class="fas fa-map-marker-alt"></i>
								<strong><?php echo $value['location_title']; ?></strong>
							</div>
							<div class="button_area">
								<button type="button" class="direction_btn yellow moreDetails" data-postId="<?php echo get_the_ID(); ?>" data-key="<?php echo $key; ?>" >More Details</button>
								<a href="<?php echo $value['direction_link']; ?>" class="direction_btn" target="_blank">Get Directions</a>
							</div>
						</li>
                       <?php } ?>
						
					</ul>
				</div>
			</div>
		</div>
	<?php } ?>
	</section>
	<!-- Popup Modal -->



<?php
}
}
get_footer();
?>
 <!-- Popup Modal -->
  <div class="overlay-hotel">
<section class="choose-hotel-popup tourPopup">
    <div class="hotelPostLists">
      </div>
</section>

<section class="choose-hotel-popup locationPopup">
	<span class="close-hotel">X</span>
	<div class="main-popup-inner">
		<div class="activity-sports">
		</div>
	</div>
</section>
</div>


<?php
$address = get_field('country',get_the_ID()); // Address
$apiKey = 'AIzaSyADlk166150RMLLGby78Ayq9kUKyAdHtp0'; // Google maps now requires an API key.
// Get JSON results from this request
$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
$geo = json_decode($geo, true); // Convert the JSON to an array

if (isset($geo['status']) && ($geo['status'] == 'OK')) {
   $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
   $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
}
?>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADlk166150RMLLGby78Ayq9kUKyAdHtp0&callback=initMap"></script>
<script type="text/javascript">

function initMap() {
  var centerLat = '<?php echo $latitude; ?>';
  var centerlong = '<?php echo $longitude; ?>';
  var locations = <?php echo json_encode($arrayData); ?>;
  
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(centerLat, centerlong),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  })

  var infowindow = new google.maps.InfoWindow({})
  var marker, i
  for (i = 0; i < locations.length; i++) {
  	var markerLabel = i+1;
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i].lat, locations[i].long),
      //icon: '<?php //echo site_url(); ?>/wp-content/themes/searsol/images/map-marker.svg',
    label: {
      text: ''+markerLabel+'',
      color: "#fff",
      fontSize: "16px",
      fontWeight: "bold"
    },
      map: map,
    })
    google.maps.event.addListener(marker,'click',(function(marker, i) {
        return function() {
          infowindow.setContent(locations[i].info)
          infowindow.open(map, marker)
          
        }
      })(marker, i)
    )
  }

	google.maps.event.addDomListener(document.getElementById('defaultView_btn'), 'click', function () {
	  map.setCenter(new google.maps.LatLng(centerLat, centerlong));
	  map.setZoom(10);
	});
}



/*** Popup Slider ***/
// function showhideDiv() {
//   var x = document.getElementById("showhideDetail");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     x.style.display = "none";
//   }
// }

$(document).on('click','#showhideDiv',function(){
	$(this).toggleClass('active');
    $('#showhideDetail').toggle();
})


function applyslider(){
$('.slider-for-detial').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav-detial'

});
$('.slider-nav-detial').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for-detial',
  arrows: false,
  dots: false,
  centerMode: true,
  focusOnSelect: true,
  responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
       {
        breakpoint: 970,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
        breakpoint: 768,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 650,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, 
          {
            breakpoint: 530,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1, 
            }
        },   
        {
            breakpoint: 430,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                 centerMode: false,
            }
        },      
        {
            breakpoint: 380,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                 centerMode: true,
            }
        }

  ]
});


}
$(document).on('click','.close-hotel',function() {
    $(".choose-hotel-popup").hide();
    $("body").removeClass("intro");
});

$(document).on('click','.moreDetails',function() {
   
    var post_id = $(this).attr('data-postId');
    var key = $(this).attr('data-key');
	$.ajax({
	type: "POST",
	url: ajaxurl,
	data: {action: 'get_location_data',post_id:post_id,key:key },
	dataType:'json',
	success: function(data){
	 $(".activity-sports").html(data.content);
	$("body").addClass("intro");
	$(".locationPopup").show();
	applyslider();
	}
	});
});


/** **/

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
			$(".tourPopup").show();
			$(".hotelPostLists").html(data.content);
			
			}


		});
	//}
    });
</script>