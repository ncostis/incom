<script>
    var slides=3;
    if($(window).width()<1200) slides=2;
    if($(window).width()<=768) slides=1;
$(window).load(function(){
var subcatsSlider = $('.bxSubcats').bxSlider({
    controlsphotos: <?php if($mobileMode==1){echo "false";}else{echo "true";} ?>,
    pager:<?php if($mobileMode==1){echo "true";}else{echo "false";} ?>,
    controls: false,
    minSlides: slides,
    maxSlides: slides,
    slideWidth: 1000,
    infiniteLoop: true,
    autoStart: false,
    auto:true,
    pause: 4000,
    easing: 'ease-in-out',
    speed: 1200,
    startSlide: 0,
    slideMargin: 30
});
<?php if($mobileMode<>1){ ?>
    $(".subcats-prev").click(function(e){
        e.preventDefault();
        subcatsSlider.goToPrevSlide();
    });
    $(".subcats-next").click(function(e){
        e.preventDefault();
        subcatsSlider.goToNextSlide();
    });
<?php } ?>
});
</script>
<style>
    /* create styles to INCOM - delete the below one */
    .homeBXTextArea { position:absolute; width:100%; bottom:30px; margin:auto; }
    .homeBXText { text-align:center; }
    .customPager .bx-wrapper .bx-pager{bottom: -30px;left:0;right:0;}
    .customPager .bx-wrapper .bx-pager.bx-default-pager a{border-radius:0px;width:50px;height:20px;background-color:#282726;}
    .customPager .bx-wrapper .bx-pager.bx-default-pager a.active{background-color:#b8a57d;}
</style>
<?php
// ΠΡΟΣΟΧΗ: χρειάζεται 100% στο width / admin template
// This page is valid only when no list is selected (at show by list field)
// Get $ModPageID by current Lang
if (($ModPageID == "") AND ($dModPageID <> "")) $ModPageID = $dModPageID; // if var comes from att dynamic (module_att_templates)
$ModPageID = getModPageID($ModPageID, $Lang);
if ($ModPageID == "") $ModPageID = $Page_ID;

// Show Category Title as Header above all records
$PageModID_Sel = "SELECT * FROM pages WHERE Page_ID = $ModPageID";
$PageModID_Query = q($PageModID_Sel);
$PageModID = f($PageModID_Query);
if ($ModShowPageTitle == 1) {
    print "<div style='padding-bottom:6px;'><h3>".$PageModID["Page_Name"]."</h3></div>";
}

if ($PageModID["Page_OrderBy"] == "") {
    $orderString = "Order by Rec_DateStart Desc";
} else {
    $orderString = "order by " . $PageModID["Page_OrderBy"] . " " . $PageModID["Page_SortBy"];
}


//print"<div class=\"internalTitle\">$moreRooms</div>";
print"<div class=\"top40\"></div>";

// Get records per page
$PageMod_Sel = "SELECT * FROM pages,records WHERE Parent_Page_ID = $ModPageID AND Page_ID=Rec_Page_ID AND Page_ID <> ".$GetRec["Page_ID"]." AND Rec_Page_Content=0 Order by Page_Order Asc LIMIT $StartAt,$limitRecs";
$PageMod_Query = q($PageMod_Sel);

// Calculate the number of records per page
$step = $stepsize;
$numpages = (nr($PageMod_Query) / $step);
$intpages = (int)$numpages;
if ($intpages < $numpages) {
    $numpages = $intpages + 1;
}

$nodivMenu = 0;
$numTD = 0;
$numRec = 0;
$nodivTab = 0;
print"<div class=\"relative customPager\">";
    print "<div class=\"bxSubcats\">";


        //Display Dynamic Module (dynamic appearance)
$flagModList = 1; // When display is through list, it is possible to carry out temporarily another Module for example image1. This second module should be according to ModPageID and not to reset ModPageΙD (meaning module_page)
require $path . "library/method_lists/module_list_slider.php";
$flagModList = 0;


print "</div>";
 if($mobileMode<>1){
print"<a href=\"#\" class=\"subcats-prev\"></a>";
print"<a href=\"#\" class=\"subcats-next\"></a>";
}
print"</div>";
?>