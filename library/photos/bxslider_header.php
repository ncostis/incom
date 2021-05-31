<div class="homeHeader">
<?php
$TopPhotos_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND Rec_Page_Content = 1";
$TopPhotos_Query = q($TopPhotos_Sel);
$TopPhotos = f( $TopPhotos_Query );

$recImCatNR = $TopPhotos['Rec_NoResImg_Cat_ID'];
$dateModified = str_replace(['-', ',', ':'], '', $GetRec['Modify_Date']);
$SliderHeader_Sel = "Select * FROM noresize_images WHERE Nri_Cat_ID = $recImCatNR Order by Nri_Order, Nri_ID Asc";
$SliderHeader_Query = q($SliderHeader_Sel);
$durArray=[];//array for duration of each slide
$arrows="false";// change to true for navigation arrows
$pagination="true"; //change to true for pagination bullets
$video = "false"; //true if there is video (video url requires Rec_Field27 and for video duration Rec_Field26 on Header Content)
$fullScreen = false; //responsive fullScreen images
if($fullScreen){
    $fullScreenImgWidth = 1800;
    $fullScreenImgHeight = 800;
    $fullScreenImgRatio = $fullScreenImgWidth/$fullScreenImgHeight;
    $fullScreenWindowPercentage = 1; //100%
    if($mobileMode)
        $fullScreenWindowPercentage = 0.7;//70%
}

if(nr($SliderHeader_Query)>1){
    $startAuto="true";
    $infiniteloop="true";
}else{
    $startAuto="false";
    $infiniteloop="false";
    $arrows="false";
    $pagination="false";
}

if($mobileMode == 1){$arrows="false";$pagination="false";$video="false";}
if($video == "true"){$arrows="false";$pagination="false";}
print"<div class=\"relative headerArrows home\">";
print "<div class=\"bxHeaderArea\">";

if($video=="true" && $GetRec['Rec_Field27'] <> ""){
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $GetRec['Rec_Field27'], $matches);
    print"\n<div class=\"slide\">\n";
    print "<div class=\"video-background\"><div class=\"video-foreground\"><div id=\"iframeVideo\"></div></div><div class=\"videoBg\"></div></div>";
    print "\n</div>\n"; //close slide
    array_push($durArray,$GetRec['Rec_Field26']);
}

$slideNum = 0;
while($SliderHeader = f($SliderHeader_Query)) {


        $GetImgTitle_Sel = "Select * FROM noresize_images_text WHERE NRImgT_ImgID = $SliderHeader[Nri_ID]";
        $GetImgTitle_Query = q($GetImgTitle_Sel);
        $GetImgTitle = f( $GetImgTitle_Query );
        $imgTitle= $GetImgTitle['NRImgT_Name'];
        //array_push($durArray,$GetImgTitle['NRImgT_Desc']); //Enable for different durations

        //$slideImg = $path_nr_photos . $SliderHeader['Nri_ImageZoom'];
        $slideImg=getLargestPhotoAvail($path. "uploads/nr_photos/",$SliderHeader['Nri_ImageZoom']);

        $slideNum++;
        if($slideNum==1){
            $slideAtrr = "display:block;";
            $lazyClass = "";
            $lazyAttr = "srcset='".srcsetPaths($SliderHeader['Nri_ImageZoom'],"nr_photos",$path,$rootURL,$mobileMode)."'";
            $path_parts = pathinfo($slideImg);
            $ExtFile = $path_parts['extension'];
            $CreatedImage=generateImgForWidthnHeight($ExtFile,$slideImg);
            list($widthImg, $heightImg) = getImageDimensions($CreatedImage, $slideImg);
            $lazyAttr.= " width='$widthImg' height='$heightImg' ";
        }else{
            $slideAtrr = "display:none;";
            $lazyClass = "lazyload";
            $lazyAttr = "data-srcset='".srcsetPaths($SliderHeader['Nri_ImageZoom'],"nr_photos",$path,$rootURL,$mobileMode)."'";
        }




        print"\n<div class=\"slide\" style='$slideAtrr'>\n";
            print "<img class=\"$lazyClass\"  style=\"\" $lazyAttr alt=\"$imgTitle\" >\n";
            if (($mobileMode <> 1) AND ($_GET['ID']== '')){
            print "<div class=\"$GetImgTitle[NRImgT_Field1]\">";
                print "<div class=\"topTitle wow fadeInLeft\">";
                    echo $GetImgTitle['NRImgT_Name'];
                print "</div>";
                print "<div class=\"topDesc wow fadeInRight\">";
                    echo $GetImgTitle['NRImgT_Desc'];
                print "</div>";
            print "</div>";
            }
        print "\n</div>\n"; //close slide
}//end while

print "</div>";

if (($mobileMode <> 1) AND ($_GET[ID]== '')){
    //print "<div class=\"topTextMargin\">";
    //include($path."library/footer/logo_footer.php");
    // print "<div class=\"topTitle\">";
    // echo $CatCont['Rec_Field1'];
    // print "</div>";
    // print "<div class=\"topSubTitle\">";
    // echo $CatCont['Rec_Desc'];
    // print "</div>";
    //print "</div>";
}

if($arrows=="true"){
print"<a href=\"#\" class=\"header-prev\"><i class='fa fa-chevron-left' aria-hidden='true'></i></a>";
print"<a href=\"#\" class=\"header-next\"><i class='fa fa-chevron-right' aria-hidden='true'></i></a>";
}
print"</div>";
?>
<script>
$(document).ready(function(){

var headerSlider = $('.bxHeaderArea').bxSlider({
    controlsphotos: false,
    pager: <?php echo $pagination; ?>,
    mode : 'fade',
    controls: <?php echo $arrows; ?>,
    minSlides: 1,
    maxSlides: 1,
    infiniteLoop:<?php echo $infiniteloop; ?>,
    autoStart: <?php echo $startAuto; ?>,
    auto:<?php echo $startAuto; ?>,
    video:<?php echo $video; ?>,
    easing: 'ease-in-out',
    pause: 4000,
    startSlide: 0,
    slideMargin: 0,
   <?php if($durArray[0] != "" && $video =="false"){ ?>
    onSliderLoad: function(index){
        console.log(index);
        if (index === 0) {
            setTimeout(function () {
                headerSlider.goToNextSlide();
                headerSlider.startAuto();
            }, <?php echo $durArray[0]; ?>);
        }
  },
  <?php } ?>
        onSlideAfter: function (slide, oldIndex, newIndex) {
           <?php foreach ($durArray as $index=>$duration) {
               if($duration != ""){ ?>
                  if (newIndex === <?php echo $index; ?>){
                        headerSlider.stopAuto();
                        <?php if($index==0 && $video=="true"){ ?> player.stopVideo(); $('.videoBg').fadeIn(0); <?php } ?>
                         <?php if($index==$durArray.length && $video=="true"){ ?>   setTimeout(function(){ $('.videoBg').fadeOut(1500); }, 4000); player.seekTo(0);player.playVideo(); <?php } ?>
                        setTimeout(function () {
                            headerSlider.goToNextSlide();
                            headerSlider.startAuto();
                        }, <?php echo $duration; ?>);
                  }
            <?php   }
            }?>
            ;
        }
});

window.headerSlider = headerSlider;

<?php if($fullScreen){?>
$(window).load(function(){
    fullscreen()
    $(window).resize(function(){
        fullscreen();
    })

    function fullscreen(){
        var windowH = $(window).height();
        var windowW = $(window).width();
        var ratio = windowW/windowH;
        console.log(ratio+"< "+'<?=$fullScreenImgRatio?>');
        if(ratio < <?=$fullScreenImgRatio?>){
            newWidth = (<?=$fullScreenImgWidth?> * windowH*<?=$fullScreenWindowPercentage?>)/<?=$fullScreenImgHeight?>;
            console.log('new width:'+newWidth+'px');
            $(".homeHeader .bx-viewport .slide").css("width", newWidth+"px");
        }
    }
})
<?php }?>

<?php if($arrows=="true"){ ?>
    $(".header-prev").click(function(e){
        e.preventDefault();
        headerSlider.goToPrevSlide();
    });
    $(".header-next").click(function(e){
        e.preventDefault();
        headerSlider.goToNextSlide();
    });
    <?php } ?>
<?php if($video=="true"){ ?>
    window.player;
window.onYouTubeIframeAPIReady = function() {
    player = new YT.Player('iframeVideo', {
        width: $(window).width(),
        videoId: "<?php echo $matches[0]; ?>",
        playerVars: {
            controls: 0,
            showinfo: 0,
            modestbranding: 1,
            wmode: 'transparent'
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}
window.onPlayerReady = function(e) {
    e.target.seekTo(0);
    setTimeout(function(){ $('.videoBg').fadeOut(1500); }, 5000);
    e.target.playVideo();
}
window.onPlayerStateChange = function(state) {
    if(state.data === 1){
        setTimeout(function () {
                headerSlider.goToNextSlide();
                headerSlider.startAuto();
                player.stopVideo();
                $('.videoBg').fadeIn(0);
            }, <?php echo $durArray[0]; ?>);
    }
}
<?php } ?>
});
</script>
<?php if($fullScreen){?>
<style>
.homeHeader .bx-wrapper,.homeHeader .bxHeaderArea{height:100vh;overflow:hidden;}
.homeHeader .bx-viewport{height:100vh !important;}
.homeHeader .bx-viewport .slide{position:absolute !important;top:50%;left:50%;-ms-transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}
@media all and (max-width: 680px) {.homeHeader .bx-wrapper, .homeHeader .bxHeaderArea { height:70vh; }.homeHeader .bx-viewport { height: 70vh !important; }}
</style>
<?php }?>
</div>