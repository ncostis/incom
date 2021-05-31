<?php
$GetRec_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0  Limit 0,1";
$GetRec_Query = q($GetRec_Sel);
if (nr($GetRec_Query) > '0') {
    $GetRec = f($GetRec_Query);

    $Rec_ID = $GetRec['Rec_ID'];
    $RecView = $GetRec['Rec_View'];
    $Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
    if ($mobileMode == 1) $Page_Rec_Temp = $GetRec['Page_Rec_Mob'];
    if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
    if ($mobileMode == '1') { // Mobile Version
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }

    $pagename = $path . "views/page.php";
    require "$pagename";
    // print "<div class='top20'></div>";
}

print "<div style='clear:both;'></div>";

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


$GetPages_Sel = "SELECT * FROM pages, records WHERE Parent_Page_ID = '$Page_ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 Order by Page_Order";
$GetPages_Query = q($GetPages_Sel);

$num = 0;
$changeTemp = 0;
while ($GetRec = f($GetPages_Query)) {

    $num++;

    $Rec_ID = $GetRec['Rec_ID'];
    $pView = $GetRec['Page_View'];
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
			if ($PageResults["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $PageResults["Page_Lists_Mob2"]; else $Page_Lists_Temp2 = $PageResults["Page_Lists_Mob"];
        }
    }

	if (($mobileMode == '1') AND ($GetRec["Rec_Lists_View_Mob"] > 0)) {
		$Page_Lists_Temp = $GetRec["Rec_Lists_View_Mob"];
		$Page_Lists_Temp2 = $GetRec["Rec_Lists_View_Mob"];
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
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }

    // check if any 2nd record has a different Page_Lists_Temp2
    if ($Page_Lists_Temp2 <> $Page_Lists_Temp) {
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

// print "<div style='clear:both;'></div>";

// $GetRec_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0  Limit 0,1";
// $GetRec_Query = q($GetRec_Sel);
// if (nr($GetRec_Query) > '0') {
//     $GetRec = f($GetRec_Query);

//     $Rec_ID = $GetRec['Rec_ID'];
//     $RecView = $GetRec['Rec_View'];
//     $Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
//     if ($mobileMode == 1) $Page_Rec_Temp = $GetRec['Page_Rec_Mob'];
//     if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
//     if ($mobileMode == '1') { // Mobile Version
//         if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
//     }

//     $pagename = $path . "views/page.php";
//     require "$pagename";
// }
?>
