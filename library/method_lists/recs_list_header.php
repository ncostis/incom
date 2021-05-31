<?php
$stringSearch = "";
if ($mobileMode == 1) $ntd = $ntdMob; // If Mobile Version

$distPercentRecs = 0.6;

$GetHeadCont_Sel = "SELECT * FROM pages, records WHERE Parent_Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 1 AND Page_Content <> 0 Order by Page_Order";
$GetHeadCont_Query = q($GetHeadCont_Sel);

$num = 0;
while ($GetRec = f($GetHeadCont_Query)) {

    $num = $num + 1;

    $Rec_ID = $GetRec['Rec_ID'];
    $RecView = $GetRec['Rec_View'];
    $recImCat = $GetRec['Rec_Img_Cat_ID'];
    $numphotosH = $GetRec['Num_HPhotos'];
    $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];

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
?>