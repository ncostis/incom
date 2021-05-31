document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';
$(document).ready(function() {
	var stickyNavTop = $('.nav').offset().top;
	 
	var stickyNav = function(){
	var scrollTop = $(window).scrollTop();
		  
	if (scrollTop > stickyNavTop) { 
		$('.nav').addClass('sticky');
	   $('.nav2').addClass('sticky2');
	} else {
		$('.nav').removeClass('sticky');
		$('.nav2').removeClass('sticky2');
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
});

		$(window).load(function() {
    			$(window).scroll(function() {
        		if($(this).scrollTop() > 100) {
           		 $('#toTop').fadeIn();   
       		 } else {
         		   $('#toTop').fadeOut();
      		  }
   		 });
 
   		 $( '<a href="#" id="toTop" class="toTopButton" style="display:none"></a>' ).appendTo( "body" );

   		 $("#toTop").click(function(e) {
     		   e.preventDefault();
      		  $('body,html').animate({scrollTop:0},800);
   		 });
			});
		$(document).ready(function() { $(".fancybox").fancybox({
				helpers    : {
					thumbs    : {
						width    : 80,
						height    : 60
					}
				}
			});
		});
		