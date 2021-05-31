<?php
$stringSearch = "";
if ($mobileMode == 1) $ntd = $ntdMob; // If Mobile Version
require "search_string_select.php";

$cp = $cp . "px";
if ($PageResults["Page_OrderBy"] == "") {
    $orderString = "Order by Rec_DateStart Desc";
} else {
    $orderString = "order by " . $PageResults["Page_OrderBy"] . " " . $PageResults["Page_SortBy"];
}

// GET ALL RECORDS FROM CATEGORY
$GetPages_Sel = "SELECT records.* FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $stringSearch UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 $stringSearch GROUP BY Rec_ID $orderString";
$GetPages_Query = q($GetPages_Sel);

// variables $step & $ntd are defined in setting vars
$step = $initStep;
$numpages = (nr($GetPages_Query) / $step);
$getSumRecs = $step * $numpages;
$intpages = (int)$numpages;
if ($intpages < $numpages) {
    $numpages = $intpages + 1;
}

$nodivMenu = 0;
$numTD = 0;
$numRec = 0;
$nodivTab = 0;

while ($GetRec = f($GetPages_Query)) {

    if ($numRec == 0) { ?>
    <div id="divPaging<?php echo $nodivTab; ?>" <?php if ($nodivTab == 0) {
        print "style='display:block; position:relative;'";
    } else {
        print "style='display:none; position:relative;'";
    } ?>>
        <?php $nodivTab = $nodivTab + 1;
    }

    $numRec = $numRec + 1;
    $numTD = $numTD + 1;

    $Rec_ID = $GetRec['Rec_ID'];
    $RecView = $GetRec['Rec_View'];
    $recImCat = $GetRec['Rec_Img_Cat_ID'];
    $numphotosH = $GetRec['Num_HPhotos'];
    $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
    $startat = $GetRec['StartAt_Photos'];
    $repeatrow = $GetRec['RepeatRow_Photos'];
    $ednum = 1; // editor number

    // RESPONSIVE DESIGN
    if ($listsDivClass <> "") {
        print "\n<div class=\"$listsDivClass\">\n";
        if ($itemDivClass <> "") print "\n<div class=\"$itemDivClass\">\n";
    }

    if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
    if ($mobileMode == '1') { // Mobile Version
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }
    $pagename = $path . "views/lists_page.php";
    require "$pagename";

    if ($itemDivClass <> "") print "\n</div>";
    if ($listsDivClass <> "") print "\n</div>";

} // end of WHILE

print "<div style=\"clear:both;\"></div>";

if ($DownNavig == 1) {
    print "<div class='top15'>";
    require $path . "library/method_lists/down_search_results_preload.php";
    print "</div>";
}
?>