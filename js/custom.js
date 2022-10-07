jQuery(document).ready(function ($) {
 $( ".dropdownMenu" ).before( '<span class="navbar__menuCarot"><svg xmlns="http://www.w3.org/2000/svg" width="11.061" height="6.061" viewBox="0 0 11.061 6.061"><path id="arrow" d="M0,0,5,5l5-5" transform="translate(0.53 0.53)" fill="none" stroke="#003e6a" stroke-linejoin="bevel" stroke-miterlimit="10" stroke-width="1.5" /></svg></span>');
wow = new WOW({
	boxClass: 'wow', // default
	animateClass: 'animate__animated', // default
	offset: 0, // default
	mobile: true, // default
	live: true // default
	})
	wow.init();

	//Menu Icon

	$(".menuIcon").click(function () {
		$(this).toggleClass("active");
		$('body').toggleClass("scroll");
		$('.navbar__inner').toggleClass("toggle");
		$('.navbar__menu').toggleClass("navanimate");
	});

	$(".navbar__menuCarot").click(function () {
		$(this).parent().siblings().find(".navbar__menuCarot").removeClass("active");
		$(this).parent().siblings().find(".dropdownMenu").slideUp(350);
		$(this).parent().find(".dropdownMenu").slideToggle(350);
		$(this).toggleClass("active")
	})



$(window).scroll(function () {
  var navhldr = $('.navbar');
  var top = 20;
  if ($(window).scrollTop() >= top) {
    navhldr.addClass('navbar__fixed');

  } else {
    navhldr.removeClass('navbar__fixed');
  }
});

 //Banner slider

	$('.banner-slider').slick({
        autoplay: true,
		speed: 800,
		lazyLoad: 'progressive',
		arrows: false,
		dots: false,
		draggable: true,
		fade: true,
		cssEase: 'linear',
	}).slickAnimation();

//Testimonials slider
$('.testimonial_slider').slick({
	autoplay:false,
	slidesToShow: 3,
	centerMode: true,
	centerPadding: "0px",
	speed: 500,
	arrows: false,
	dots: false,
	margin:15,
	responsive: [
  {
      breakpoint: 768,
      settings: {
          arrows: false,
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 1
      }
    },
    {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: false,
          centerPadding: '0px',
          slidesToShow: 1
        }
    }
  ]
	});

/* Ajax Scroll Pagination */

   
    /*$(window).scroll(function() {
        //if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        if ($(window).scrollTop() + 1 >= $(document).height() - $(window).height()){
            getPostData();
        }
    });*/

   // $(document).on('click','#load_more_btn',function(){
   //   getPostData();
   // });
   
    /*var section = $(".overlay-hotel");
    section.bind('scroll', function ()
    {
    	
        if (Math.ceil($(this).scrollTop() + $(this).innerHeight()) >= $(this)[0].scrollHeight)
        {
            getPostData();
        }
    })*/
   
   $(document).on('click','.LoadmoreBtn',function(){
     getPostData();
   });

  
    function getPostData() {

		    var listing_grid = $('#listing_grid').val();
		    console.log(listing_grid);
		    var posts_query = $('#current_query').val();
			var page_num = $('#page_num').val();
			var total_page = $('#total_page').val();
			$('#page_num').val(parseInt(page_num)+1);
			
		   // if(page_num <= total_page){
		    //alert('here');
		    $('.loader_image1').show();
            if(listing_grid == 'popup'){
            
                 $.ajax({
					url :ajaxurl,
					data:{'action': 'get_hotel_load_more_post_data','query': posts_query,'page' : page_num},
					type:'POST',
					dataType: 'json',
					success:function(data){
						$('.loader_image1').hide();
						if( data.content != null ) {
							$('.posts-listing').append( data.content);
						}else{
							$('.LoadmoreBtn').remove();
						}

					}
				});
		    }
		    else{

				$.ajax({
					url :ajaxurl,
					data:{'action': 'scroll_loadmore','query': posts_query,'page' : page_num},
					type:'POST',
					dataType: 'json',
					success:function(data){
						$('.loader_image1').hide();
						if( data.post_data != null ) {
							$('.posts-listing').append( data.post_data);
						}else{
							$('.LoadmoreBtn').remove();
						}

					}
				});
			  }
		  // }
    }




/** Search Form Validation **/
$(document).on('click','#searchBtn',function(){
	//alert();
	var tour_name = $('#tour_name').val();
	var country_name = $('#country_name').val();
	var location = $('#location_name').val();
	if(tour_name == '' && country_name == ''){
	
	if(location !=''){
		return true;
	}else{
		$('.formError').text("Please choose atleast one field").css('color','red');
		return false;
	}
	
	}else{
		return true;
	}
	
})
	
setTimeout(function(){
if ($(window).width() < 600) {
$('#qlwapp').find('.qlwapp-text').remove();
$('#qlwapp').find('.qlwapp-toggle .qlwapp-icon').css('margin', '0');
}
}, 1000);	


$('.selected_form').val();

$(document).on('click','#submit_tour',function(e){
     var form = $(this).parents('form:first');
     var agency_id = $("#agency_id").val();
    var fname = $("#fname", form).val();
	var mname = $("#mname", form).val();
	var lname = $("#lname", form).val();
    var email = $("#email", form).val();
    var booking_url = $(".redirect_hotal_link", form).val();
 

    var flag = 0;
    var status = false;
	
	var captcha = grecaptcha.getResponse();
    
    if (captcha == '') {
		 flag = 1;
		alert("please Select CAPTCHA !!");
    } 
    if (flag == 1) 
    {	
        return status;
    } 

 if (fname != '' &&  email != '' && lname != '') {
 	 
 if (validateEmail(email)) {
 	 
	   	 $.ajax({
		    url: ajaxurl,
		    type:'post',
		    data:{ action: 'booking_from_activity',fname:fname,mname:mname,lname:lname,email:email,agency_id:agency_id },
		     beforeSend: function() {$("#loading").fadeIn('slow');},
		    success:function(data){
		    	$("#loading").fadeOut('slow');
		    	$("#booking_form")[0].reset();
                  window.location = booking_url;
		       
		   }
		   
		});
}
else{
  
		alert('Invalid Email Address');
		e.preventDefault();
}
}
else {
 $('.errormsg', form).show();
 
                    setTimeout(function() {
                       $('.errormsg', form).fadeOut('slow');
                    }, 3000);  
}
 
  });


function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
 
    // $.cookie('externalRefer' );
    // $('#refersource').val($.cookie('externalRefer'));









});