$(document).ready(function() {
	if($(window).width()>680){
		if(localStorage.getItem('widgetState')=='closed'){
			$(".hotelPrice-wrapper").css({right: '-300px'});
			$(".hotelPrice-buttonWrapper").animate({right: '50px'});
		}else{
			$(".hotelPrice-wrapper").animate({right: '75px'});
		}
		$(".hPClose").click(function(){
			$(".hotelPrice-wrapper").animate({right: '-300px'});
			$(".hotelPrice-buttonWrapper").delay(300).animate({right: '50px'});
			localStorage.setItem('widgetState', 'closed');
		})
		$(".hotelPrice-buttonWrapper").click(function(){
			$(".hotelPrice-buttonWrapper").animate({right: '-150px'});
			$(".hotelPrice-wrapper").delay(300).animate({right: '75px'});
			localStorage.setItem('widgetState', 'open');
		})
	}
})