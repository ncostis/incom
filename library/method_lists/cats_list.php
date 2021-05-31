<?php
$stringSearch = "";
if ($mobileMode == 1) $ntd = $ntdMob; // If Mobile Version
require "search_string_select.php";

$cp = $cp . "px";
$step = $initStep;
$orderString = "Order by Page_Order Asc";

// Counts numbers of pages per page and finds the number of pages. Then creates paging according to that number
$GetAll_Sel = "SELECT * FROM pages, records WHERE Page_Section = '$Page_GetFromSection' AND Parent_Page_ID = 0 AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Page_Active = 1 $orderString";
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


$GetPages_Sel = "SELECT * FROM pages, records WHERE Page_Section = '$Page_GetFromSection' AND Parent_Page_ID = 0 AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Page_Active = 1 $orderString Limit $start,$step";
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
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $PageResults['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }

    $pagename = $path . "views/lists_page.php";
    require "$pagename";

    if ($itemDivClass <> "") print "\n</div>";
    if ($listsDivClass <> "") print "\n</div>";

} // end of while

print "<div style=\"clear:both;\"></div>";

/*** SHOW DOWDN PANEL ***/
if (($DownNavig == 1) AND ($numpages >= 1)) {
    require $path . "library/method_lists/down_search_results.php";
}
?>