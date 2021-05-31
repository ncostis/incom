<!-- // Show/Hide DIV -->
<script type="text/javascript">$(document).ready(function(){$(".moreButton").click(function(){$(this).next(".moreText").slideDown(400),$(this).slideUp(400);if($(".css-select").length){$(".css-select").chosen("destroy");$(".css-select").chosen({search_contains:true,no_results_text:"No Results"})}}),$(".showLessButton").click(function(){$(this).parent().slideUp(400),$(this).parent().prev(".moreButton").slideDown(400)})});
</script>

<!-- FANCYBOX -->
<script type="text/javascript" src="<?php echo $rootPath; ?>js/fancybox3/dist/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="<?php echo $rootPath; ?>js/fancybox3/dist/jquery.fancybox.min.css" type="text/css" media="screen" />
<script>
    $(document).ready(function() {
        $("a.popUpWindow").not(".cmspopup a.popUpWindow").each(function(){
            $(this).fancybox({
                type:'iframe',
                width: $(this).data("width"),
                height: $(this).data("height"),
                animationDuration: 0,
                afterLoad: function( instance, slide ) {timetoLogout();},
                helpers : {
                    overlay : {
                        css : {
                            'background' : "rgba(0,0,0,0,1)"
                        }
                    }
                },
                iframe : {
                    css : {
                        width : $(this).data("width"),
                        height : $(this).data("height")
                    }
                }
            });
        });
         $(".cmspopup a.popUpWindow").each(function(){
          $(this).on("click", function(e){
              e.preventDefault();
              if($(this).attr("href").indexOf("welcome")===-1)
              		var href = window.location.href.substring(0, window.location.href.lastIndexOf('/')) + "/" + $(this).attr("href")
	          else var href = $(this).attr("href")
	          	console.log(href);
              parent.$.fancybox.open({
                  type:'iframe',
                  src  : href, //absolute path
                  width: $(this).data("width"),
                  height: $(this).data("height"),
                  animationDuration: 0,
                  afterLoad: function( instance, slide ) {timetoLogout();},
                  helpers : {
                      overlay : {
                          css : {
                              'background' : "rgba(0,0,0,0,1)"
                          }
                      }
                  },
                  iframe : {
                      css : {
                          width : $(this).data("width"),
                          height : $(this).data("height")
                      }
                  }
              });
           })
          })
         $("a.popUpImage").each(function(){
          $(this).on("click", function(e){
              e.preventDefault();
              parent.$.fancybox.open({
                  type:'image',
                  src  : $(this).attr("href"),
                  width: $(this).data("width"),
                  height: $(this).data("height"),
                  afterLoad: function( instance, slide ) {timetoLogout();},
                  helpers : {
                      overlay : {
                          css : {
                              'background' : "rgba(0,0,0,0,1)"
                          }
                      }
                  },
              });
           })
          })
    });
</script>


<script>
<!-- // COUNT CHARS IN A FIELD // -->
  function countCharTitle(val) {
	var len = val.value.length;
	$('#charNumTitle').text(len);
  };
  function countChar(val) {
	var len = val.value.length;
	$('#charNum').text(len);
  };
</script>


<script type="text/javascript">
<!-- // SHOW LAYER ON CLICK // -->
	function elem(ent){return document.getElementById(ent);}

	function toggle_layer(id)
	{

		if (typeof(id) !== 'undefined') {
			if (elem(id).style.display == 'none')
			{
				elem(id).style.display = 'block';
			}
			else
			{
				elem(id).style.display = 'none';
			}
		}
	}
</script>


<script type="text/javascript">
$(document).ready(function(){

  $(".languageSelector").click(function(a){
    a.preventDefault();
    $(".languages").is(":hidden")? $(".languages").slideDown("fast") : $(".languages").slideUp("fast");
  });

  $(document).mouseup(function(a){
    var b=$(".langWrapper");
    b.is(a.target)||0!==b.has(a.target).length||$(".languages").slideUp("fast")
  })

  // Top tabs menu, category settings tabs
  $(".menuTabs a").click(function(a){
    a.preventDefault();
    tabsContainer = $(this).parent(".menuTabs").next(".menuTabsCont");
    $(this).parent(".menuTabs").find("a").removeClass("active");
    $(this).addClass("active");
    tabsContainer.find(".menuTabCont").fadeOut(0);
    tabsContainer.find(".menuTabCont[data-tabname='"+$(this).data("tab")+"']").fadeIn(0);
  });

  $(document).mouseup(function(a){
    var b=$(".langWrapper");
    b.is(a.target)||0!==b.has(a.target).length||$(".languages").slideUp("fast")
  })

  $("a.showCatDetails").on("click", function(){
    $(".categoryDetails").is(":hidden")? $(".categoryDetails").slideDown("fast") : $(".categoryDetails").slideUp("fast");
  })

  $(".recordColumns input[type=checkbox]").on("click", function(){
    if($(this).is(":checked")){
      $(this).parents(".recordRowContainer").addClass("active");
    }else{
      $(this).parents(".recordRowContainer").removeClass("active");
    }
  })

  timetoLogout();

  $(".expandHandler").on("click", function(){
    $(this).next(".expandCont").slideToggle(0);
  })

  $(".moreToggleBtn").on("click", function(){
    $(this).next("section").slideToggle(0);
  })

})

// Logout Timer
function timetoLogout(secondsToLogout = <?php echo Auth::timeToLogout()?>){
  var minutesToLogout = secondsToLogout/60;
  $(".timeToLogout").html(minutesToLogout+" min");
  clearInterval(window.logoutInterval);
  window.logoutInterval = setInterval(function(){
      minutesToLogout--;
      if(minutesToLogout<=0){
          $(".timeToLogout").html("logged out").addClass("cRed");
      }else $(".timeToLogout").html(minutesToLogout+" min").removeClass("cRed");
  }, 60000)
}
</script>

<script type="text/javascript">
$(document).ready(function() {

    if($('.adminNav').length>0){
        var el = $('.adminNav');
        window.stickyNavTop = el.first().offset().top+el.outerHeight();
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();
            if ((scrollTop+$(window).height()) < window.stickyNavTop) {
                el.first().addClass('stickyAdmin');
            } else {
                el.first().removeClass('stickyAdmin');
            }
        }

        stickyNav();

        $(window).scroll(function() {
            stickyNav();
        })

        if(typeof(CKEDITOR)!=="undefined"){
            CKEDITOR.on("instanceReady", function(event)
            {
                el.first().removeClass('stickyAdmin');
                window.stickyNavTop = el.first().offset().top+el.outerHeight();
                stickyNav();
            });
        }

        $(document).on('click', ".categorySelector", function(a){
            el = $(this).find(".categorySelection")
            $(".categorySelection").not(el).slideUp("fast");
            el.is(":hidden")? el.slideDown("fast") : el.slideUp("fast");
          });
    }
});
</script>