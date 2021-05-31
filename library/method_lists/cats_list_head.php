<?php
$stringSearch = "";
if ($mobileMode == 1) $ntd = $ntdMob; // If Mobile Version
require "search_string_select.php";

$cp = $cp . "px";
$step = $initStep;
$orderString = "Order by Page_Order Asc";

// Counts numbers of pages per page and finds the number of pages. Then creates paging according to that number
$GetAll_Sel = "SELECT * FROM pages, records WHERE Page_Section = '$Page_GetFromSection' AND Parent_Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Page_Content = 1 AND Page_Content <> 0 AND Page_Active = 1 $orderString";
$GetAll_Query = q($GetAll_Sel);
// variables $step & $ntd is defined by setting vars
$numpages = (nr($GetAll_Query) / $step);

$intnumpages = (int)$numpages;
if ($intnumpages < $numpages) {
    $intnumpages = $intnumpages + 1;
}
if ($numpages > $intnumpages) {
    $numpages = $intnumpages + 1;
} else {
    $numpages = $intnumpages;
}
$numpages = $numpages - 1; // Because $pages starts from 0,  the forth page is basically $page=3, so this is to fix that issue.

// if by choosing category it should appear only 1st record then directly on page Limit 0,1
$page = getparamvalue('var1');
if ($page == "") {
    $page = 1;
}
$start = ($page * $step) - $step; // Fix the issue that variable  $start starts from 1st page meaning 0


$GetPages_Sel = "SELECT * FROM pages, records WHERE Page_Section = '$Page_GetFromSection' AND Parent_Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 1 AND Page_Content <> 0 AND Page_Active = 1 $orderString Limit $start,$step";
$GetPages_Query = q($GetPages_Sel);

if ($ShowTopRes == 1) {
    print "<div style='padding-bottom:12px;'>$selida $page $apo $intnumpages</div>";
}
$num = 0;
while ($GetRec = f($GetPages_Query)) {

    $num = $num + 1;

    $Rec_ID = $GetRec['Rec_ID'];
    $pView = $GetRec['Page_View'];
    $RecView = $GetRec['Rec_View'];
    $recImCat = $GetRec['Rec_Img_Cat_ID'];
    $numphotosH = $GetRec['Num_HPhotos'];
    $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
    if (($numphotosH == "") OR ($numphotosH == 0)) $numphotosH = 100;
    $startat = $GetRec['StartAt_Photos'];
    $repeatrow = $GetRec['RepeatRow_Photos'];
    $ednum = 1; // editor number
    if ($num == 1) {
        $left = "float:left;";
    } else {
        $left = "float:left; margin-left:$leftmarginCol;";
    }

    // RESPONSIVE DESIGN
    if ($listsDivClass <> "") {
        print "\n<div class=\"$listsDivClass\"";
        if (($leftmarginCol <> 0) AND ($num > 1)) print " style=\"margin-left:$leftmarginCol;\"";
        print ">\n";
    } else {
        print "<div style='$left'>";
    }

    if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
    if ($mobileMode == '1') { // Mobile Version
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $PageResults['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }
    $pagename = $path . "views/lists_page.php";
    require "$pagename";

    print "</div>";
    if ($num == $ntd) {
        $num = 0;
        if ($listsDivClass == "") print "<div style=\"clear:both;\"></div>";
    }
} // end of while

if ($num <> $ntd) print "<div style=\"clear:both;\"></div>";

/*** SHOW DOWDN PANEL ***/
if (($DownNavig == 1) AND ($numpages >= 1)) {
    require $path . "library/method_lists/down_search_results.php";
}
?>