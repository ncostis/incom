<?php
// if by choosing category it should appear only 1st record then directly on page Limit 0,1
$GetRec_Sel = "SELECT * FROM pages, records WHERE Page_ID = Rec_page_ID AND Parent_Page_ID = 0 AND Rec_Page_Content = 0 AND Page_Section = 'general' AND Page_Lang = '$Lang' Order by Page_Order Asc Limit 0,1";
$GetRec_Query = q($GetRec_Sel);
$GetRec = f($GetRec_Query);

$Rec_ID = $GetRec['Rec_ID'];
$RecView = $GetRec['Rec_View'];
$Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
$recImCat = $GetRec['Rec_Img_Cat_ID'];
$recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
$numphotosH = $GetRec['Num_HPhotos'];
if ($numphotosH == "") $numphotosH = 100;
$startat = $GetRec['StartAt_Photos'];
$repeatrow = $GetRec['RepeatRow_Photos'];
if ($RecView == '1') {
    $RecTempID = $Page_Rec_Temp;
} else {
    $RecTempID = $RecView;
}
if ($mobileMode == 1) $RecTempID = $GetRec['Page_Rec_Mob']; // Mobile Version

// Show Record 
$pagename = $path . "views/page.php";
require "$pagename";
?>

