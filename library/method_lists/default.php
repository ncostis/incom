<?php
$GetRec_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND Page_Lang = '$Lang' Order by Rec_DateStart Desc, Rec_Order Limit 0,1";
$GetRec_Query = q($GetRec_Sel);
$GetRec = f($GetRec_Query);

$Rec_ID = $GetRec['Rec_ID'];
$RecView = $GetRec['Rec_View'];
$Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
if ($mobileMode == 1) $Page_Rec_Temp = $GetRec['Page_Rec_Mob']; // If Mobile Version
$recImCat = $GetRec['Rec_Img_Cat_ID'];
$recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
$numphotosH = $GetRec['Num_HPhotos'];
if ($numphotosH == "") $numphotosH = 100;
$startat = $GetRec['StartAt_Photos'];
$repeatrow = $GetRec['RepeatRow_Photos'];

if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
if ($mobileMode == '1') { // Mobile Version
    if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
}

$pagename = $path . "views/page.php";
require "$pagename";
?>