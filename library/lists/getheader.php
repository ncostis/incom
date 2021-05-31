<?php
// Get $ModPageID by current Lang
$ModPageID = getModPageID($ModPageID, $Lang);
if ($ModPageID == "") {
    $PageMod_Sel = "SELECT * FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Rec_Page_Content = 1 AND Page_Content <> 0";
} else {
    $PageMod_Sel = "SELECT * FROM pages, records WHERE Page_ID = $ModPageID AND Rec_Page_ID = $ModPageID AND Rec_Page_Content = 1 AND Page_Content <> 0";
}

// GET CATEGORY CONTENT
$PageMod_Query = q($PageMod_Sel);
$GetRecMod = f($PageMod_Query);
if (nr($PageMod_Query) > 0) {

    $RecMod_ID = $GetRecMod['Rec_ID'];
    $RecView = $GetRecMod['Rec_View'];
    $recImCat = $GetRecMod['Rec_Img_Cat_ID'];
    $numphotosH = $GetRecMod['Num_HPhotos'];
    $Page_Rec_Temp = $GetRecMod['Page_Rec_Temp'];
    if ($mobileMode == 1) $Page_Rec_Temp = $GetRecMod['Page_Rec_Mob']; // If Mobile Version
    $recImCatNR = $GetRecMod['Rec_NoResImg_Cat_ID'];
    $startat = $GetRec['StartAt_Photos'];
    $repeatrow = $GetRec['RepeatRow_Photos'];
    $ednum = 1; // editor number
    $RecText = "Rec_Text" . $ednum;
    $FileName = $Path_Texts . $GetRec[$RecText] . ".htm";

    if (file_exists($FileName) & (filesize($FileName) > 0)) {
        //print "<div style=\"max-width:980px; padding-bottom:30px; margin:auto;\"><h1>";
        //if ($GetRecMod['Page_Name_Print'] <> "") echo $GetRecMod['Page_Name_Print']; else echo $GetRecMod['Page_Name'];
        //print "</h1></div>";
        print "<div style=\"max-width:980px; padding-top:30px; padding-bottom:30px; margin:auto;\">";
        $pagename = $path . "views/module_page.php";
        require "$pagename";
        $flagModList = 0;
        print "</div>";
    }

} // if
?>
<div class="top30"></div>
