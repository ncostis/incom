
$(document).ready(function() {
    var el = $('.menuCont');
    var el2 = $('.nav2');
    //var stickyNavTop = el.first().offset().top;
    var clone = $("<div class='navPlaceHolder'></div>");
    var stickyNavTop = 0;
    if($(window).width()<=680) stickyNavTop = el.first().offset().top;
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop(); 

        if (scrollTop > stickyNavTop) {
            clone.css('height', el.outerHeight()+'px')
            clone.prependTo(el.parent());
            el.first().addClass('sticky');
           el2.first().addClass('sticky2');
        } else {
            clone.detach();
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
                $('#toTop').fadeIn();   
            } else {
                $('#toTop').fadeOut();
           }
        });
 
        $( '<a href="#" id="toTop" class="toTopButton" style="display:none"><i class="fas fa-chevron-up"></i></a>' ).appendTo( "body" );

       $("#toTop").click(function(e) {
           e.preventDefault();
            $('body,html').animate({scrollTop:0},800);
       });
      });

    window.FontAwesome.config.searchPseudoElements = true; //:before, :after
    window.FontAwesome.config.observeMutations = true; // search on DOM update // speed issue
    $(window).load(function(){
        window.FontAwesome.config.observeMutations = false
    })
