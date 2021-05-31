<script>
$(window).load(function(){
    var slides=1;
    if($(window).width()<1200) slides=1;
    if($(window).width()<1000) slides=1;
var bxRecsHome = $('.bxRecsHome').bxSlider({
    controlsphotos: <?php if($mobileMode==1){echo "false";}else{echo "true";} ?>,
    pager:<?php if($mobileMode==1){echo "true";}else{echo "false";} ?>,
    controls: false,
    minSlides: slides,
    maxSlides: slides,
    slideWidth: 1800,
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
    $(".homeRecsPager .recsHome-prev").click(function(e){
        e.preventDefault();
        bxRecsHome.goToPrevSlide();
    });
    $(".homeRecsPager .recsHome-next").click(function(e){
        e.preventDefault();
        bxRecsHome.goToNextSlide();
    });
<?php } ?>
});
</script>

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

if($_GET["ID"] <>  '' ){
print"<div class=\"subCatMainTitle\">$moreRooms</div>";
}
// Get records per page
$PageMod_Sel = "SELECT * FROM pages, records WHERE Page_ID = Rec_Page_ID AND Rec_Page_Content = $modHeadCont AND Rec_Active = 0 AND Page_Special_Group = 1 $orderString LIMIT $StartAt,$limitRecs";
// echo $PageMod_Sel;
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
print"<div class=\"relative customPager homeRecsPager\">";
    print "<div class=\"bxRecsHome\">";


        //Display Dynamic Module (dynamic appearance)
$flagModList = 1; // When display is through list, it is possible to carry out temporarily another Module for example image1. This second module should be according to ModPageID and not to reset ModPageΙD (meaning module_page)
require $path . "library/method_lists/module_list_slider.php";
$flagModList = 0;


print "</div>";
 if($mobileMode<>1){
print"<a href=\"#\" class=\"recsHome-prev\"></a>";
print"<a href=\"#\" class=\"recsHome-next\"></a>";
}
print"</div>";
?>