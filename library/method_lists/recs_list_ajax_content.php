<?php
$path = "../../";
require $path . "library/init.php";

$Page_ID = getparamvalue('Page_ID');
$PageResults_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
$PageResults_Query = q($PageResults_Sel);
$PageResults = f($PageResults_Query);
$ID = $PageResults['Page_View'];
$Page_ID = $PageResults["Page_ID"];
$pView = $PageResults["Page_View"];
$Parent_Page_ID = $PageResults["Parent_Page_ID"];
$Page_Type = $PageResults["Page_Type"];
if ($mobileMode == 1) $Page_Type = $PageResults['Page_Type_Mob']; // If Mobile Version
$Page_GenVar = $PageResults["Page_GenVar"];
$Page_GetFromSection = $PageResults["Page_GetFromSection"];
$Page_Rec_Temp = $PageResults["Page_Rec_Temp"];
if ($mobileMode == 1) $Page_Rec_Temp = $PageResults['Page_Rec_Mob']; // If Mobile Version
$Page_HeadLists_Flag = $PageResults["Page_HeadLists_Flag"];
$Page_Lists_Temp = $PageResults["Page_Lists_Temp"];
if ($mobileMode == 1) $Page_Lists_Temp = $PageResults['Page_Lists_Mob']; // Mobile Version
$Page_Rec_Temp = $PageResults["Page_Rec_Temp"];
$Page_List_ID = $PageResults["Page_List_ID"];
$Page_Section = $PageResults["Page_Section"];
$Page_Header_Flag = $PageResults["Page_Header_Flag"];

$op = $PageResults["Page_ImgOP"];  // Open Page Style of Images
if (($Page_Header_Flag == 1) OR ($Parent_Page_ID == 0)) {
    $pageHeader = pageHeader($Page_ID);
    $headerPageID = $Page_ID;
} else {
    $headerPageID = headerPageID($Page_ID);
    $pageHeader = pageHeader($headerPageID);
}

$Settings_Sel = "SELECT * FROM pages WHERE Page_ID = $headerPageID";
$Settings_Query = q($Settings_Sel);
$GetSettings = f($Settings_Query);
$LayoutID = $GetSettings['Page_Temp_ID'];
$SetPageID = $GetSettings['Page_ID'];
$headerPageLayoutID = $GetSettings['Page_Style_ID'];
$headerPageStylesLinksID = $GetSettings["Page_Styles_Links"];

$GetList_Sel = "SELECT * FROM lists WHERE List_ID = $Page_List_ID";
$GetList_Query = q($GetList_Sel);
$GetList = f($GetList_Query);

require $path . "_cm_admin/settingsvars.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php require $path . "views/build_styles.php"; ?>
</head>
<body>

<?php
for ($x = 1; $x < 11; $x++) {
    $filter[$x] = getparamvalue('filter' . $x);

    if ($GetList['List_MultTable' . $x] <> "") {
        $varFilter = "Rat_MultipleSel" . $x;
        if ($filter[$x] <> 0) $stringSearch .= " AND $varFilter like '%,$filter[$x],%'";
        $filterURL .= "&filter$x=" . $filter[$x];
    } // if ($GetList
} // for
$pagePath = "?Page_ID=" . $Page_ID . $filterURL;

$cp = $cp . "px";
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
$page = getparamvalue('startAt');
if ($page == 0) {
    $page = 1;
}
$start = ($page * $step) - $step; // Fix the issue that variable  $start starts from 1st page meaning 0


$GetPages_Sel = "SELECT records.*,pages.* FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $stringSearch UNION SELECT records.*,pages.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 $stringSearch GROUP BY Rec_ID $orderString Limit $start,$step";
$GetPages_Query = q($GetPages_Sel);

if ($ShowTopRes == 1) {
    print "<div style='padding-bottom:12px;'>$selida $page $apo $intnumpages</div>";
}
print "<div>";
$num = 0;
while ($GetRec = f($GetPages_Query)) {
    $num = $num + 1;

    $Rec_ID = $GetRec['Rec_ID'];
    $RecView = $GetRec['Rec_View'];
    $recImCat = $GetRec['Rec_Img_Cat_ID'];
    $numphotosH = $GetRec['Num_HPhotos'];
    $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
    if (($numphotosH == "") OR ($numphotosH == 0)) $numphotosH = 100;
    $startat = $GetRec['StartAt_Photos'];
    $repeatrow = $GetRec['RepeatRow_Photos'];
    $ednum = 1; // editor number
    if ($num == 1) {
        $left = "left";
    } else {
        $left = "left25";
    }

    print "<div class='$left'>";
    if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
    if ($mobileMode == '1') { // Mobile Version
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }
    $pagename = $path . "views/lists_page.php";
    require "$pagename";

    print "</div>";
    if ($num == $ntd) {
        $num = 0;
        print "<div style='clear:both;'></div>";
    }
} // end of while

if ($num <> $ntd) print "<div style='clear:both;'></div>";
print"</div>";

/*** SHOW DOWDN PANEL ***/

if (($DownNavig == 1) AND ($numpages >= 1)) {
    require $path . "library/method_lists/down_search_results_ajax.php";
}
?>


<?php
function BuildStyle($StyleID)
{
    $Style_Sel = "SELECT * FROM styles WHERE css_ID = $StyleID";
    $Style_Query = q($Style_Sel);
    $GetStyle = f($Style_Query);
    $style = $GetStyle['css_Name'];
    return $style;
}

?>
</body>
</html>

