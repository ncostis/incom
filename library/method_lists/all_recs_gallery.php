<?php
$GetRecs_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND Page_Lang = '$Lang' Order by Rec_DateStart Desc, Rec_Order Asc";
$GetRecs_Query = q($GetRecs_Sel);

$num = 0;
while ($GetRec = f($GetRecs_Query)) {

    $Rec_ID = $GetRec['Rec_ID'];
    $RecView = $GetRec['Rec_View'];
    $recImCat = $GetRec['Rec_Img_Cat_ID'];
    $numphotosH = $GetRec['Num_HPhotos'];
    $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
    if (($numphotosH == "") OR ($numphotosH == 0)) $numphotosH = 100;
    $startat = $GetRec['StartAt_Photos'];
    $repeatrow = $GetRec['RepeatRow_Photos'];
    $ednum = 1; // editor number

    if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
    if ($mobileMode == '1') { // Mobile Version
        if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
    }

    $pagename = $path . "views/page.php";
    require "$pagename";

} // end of while
?>