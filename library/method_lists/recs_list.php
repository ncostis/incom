<?php
$stringSearch = "";
if ($mobileMode == 1) $ntd = $ntdMob; // If Mobile Version
require "search_string_select.php";

$cp = isset($cp) ? $cp . "px" : '';
$step = $initStep;
if ($PageResults["Page_OrderBy"] == "") {
    $orderString = "Order by Rec_DateStart Desc";
} else {
    $orderString = "order by " . $PageResults["Page_OrderBy"] . " " . $PageResults["Page_SortBy"];
}

// Counts numbers of records per page and finds the number of records. Then creates paging according to that number
$GetAll_Sel = "SELECT records.* FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $stringSearch UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 $stringSearch GROUP BY Rec_ID $orderString";
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


$GetPages_Sel = "SELECT records.*,pages.* FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $stringSearch UNION SELECT records.*,pages.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 $stringSearch GROUP BY Rec_ID $orderString Limit $start,$step";
$GetPages_Query = q($GetPages_Sel);

if ($ShowTopRes == 1) {
    print "<div style='padding-bottom:12px;'>$selida $page $apo $intnumpages</div>";
}
$num = 0;
$changeTemp = 0;
while ($GetRec = f($GetPages_Query)) {

    $num++;

    $Rec_ID = $GetRec['Rec_ID'];
    $RecView = $GetRec['Rec_View'];
	
	// check if record has different Lists View
    if ($GetRec["Rec_Lists_View"] > 0) {
        $Page_Lists_Temp = $GetRec["Rec_Lists_View"];
		$Page_Lists_Temp2 = $GetRec["Rec_Lists_View"];
    } else {
        $Page_Lists_Temp = $PageResults["Page_Lists_Temp"];
		if ($PageResults["Page_Lists_Temp2"] > 0) $Page_Lists_Temp2 = $PageResults["Page_Lists_Temp2"]; else $Page_Lists_Temp2 = $PageResults["Page_Lists_Temp"];
		if ($mobileMode == '1') {
            $Page_Lists_Temp = $PageResults["Page_Lists_Mob"];
            if ($PageResults["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $PageResults["Page_Lists_Mob2"];
        }
    }
	
	if (($mobileMode == '1') AND ($GetRec["Rec_Lists_View_Mob"] > 0)) {
		$Page_Lists_Temp = $GetRec["Rec_Lists_View_Mob"];
		$Page_Lists_Temp2 = $GetRec["Rec_Lists_View_Mob2"];
	}
	
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

    // check if any 2nd record has a different Page_Lists_Temp2
    if (($Page_Lists_Temp2 <> $Page_Lists_Temp) AND ($Page_Lists_Temp2 > 0)) {
        if ($changeTemp == 0) {
            $changeTemp++;
        } else {
            $Page_Lists_Temp = $Page_Lists_Temp2;
            $changeTemp = 0;
        }
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