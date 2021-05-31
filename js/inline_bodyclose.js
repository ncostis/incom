
$(document).ready(function() {
    var el = $('.menuCont');
    var el2 = $('.nav2');
    var stickyNavTop = el.first().offset().top;
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop(); 

        if (scrollTop > stickyNavTop) {
            el.first().addClass('sticky');
           el2.first().addClass('sticky2');
        } else {
            el.first().removeClass('sticky');
            el2.first().removeClass('sticky2');
        }
    }

    stickyNav();

    $(window).scroll(function() {
        stickyNav();
    })
});

 $(window).load(function() {
 $(window).scroll(function() {
 if($(this).scrollTop() > 100) {
 $('#toTop').stop().fadeIn(); 
 } else {
 $('#toTop').stop().fadeOut();
 }
 });
 
 $( '<a href="#" id="toTop" class="toTopButton" style="display:none"><i class="fas fa-chevron-up"></i></a>' ).appendTo( "body" );

 $("#toTop").click(function(e) {
 e.preventDefault();
 $('body,html').animate({scrollTop:0},600);
 });
 });

$(document).ready(function() {
 $(".fancybox").fancybox({
 toolbar : true,
 buttons : ['share', 'zoom', 'slideShow', 'thumbs', 'close'],
 thumbs: {
 autoStart: true,
 axis: 'x'
 },
 });
});
