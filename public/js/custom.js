$(document).ready(function () {
	$('.home-banner').slick({

		arrows: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		fade: true,
  		cssEase: 'linear',
		autoplay: true,
  		autoplaySpeed: 2000,
		pauseOnHover: true,
		 

	});
	
	
		$('.upload').on('change',function(event){
        var files = event.originalEvent.target.files;    
        $(this).parent().siblings('#uploadFile').val(files[0].name);
		$(this).parent().siblings('#uploadFile1').val(files[0].name);
  });
	
	
	
	 
	

});

 


$(document).ready(function () {
	new WOW().init();
});

	$(function() {
  $('.normal-list').select2();
});