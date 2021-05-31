<?php
if (isset($ImageCSS)) $imageStyle = "style='" . $ImageCSS . "'";

$le_id = $GetRec["Rec_ID"];

$image = $GetRec['Rec_Image5'];
$titleimg = $GetRec['Rec_Title'];
$dateModified = str_replace(['-', ',', ':'], '', $GetRec['Modify_Date']);
if (($image == "") AND ($GetRec['Rec_Rel_LangID'] > 0)) {
    $GetRelLangRec_Sel = "SELECT * FROM records WHERE Rec_ID = ".$GetRec["Rec_Rel_LangID"];
    $GetRelLangRec_Query = q($GetRelLangRec_Sel);
    $GetRelLangRec = f($GetRelLangRec_Query);
    $image = $GetRelLangRec['Rec_Image5'];
}

$ModPageID = getModPageID($ModPageID, $Lang);
if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
    if ($RecMod_ID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID AND Rec_Active = 0";
    } elseif ($ModPageID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0";
    }

    $GetModRec_Query = q($GetModRec_Sel);
    $GetModRec = f($GetModRec_Query);
    $image = $GetModRec['Rec_Image5'];
    $titleimg = $GetModRec['Rec_Title'];
    $le_id = $GetModRec["Rec_ID"];
    $dateModified = str_replace(['-', ',', ':'], '', $GetModRec['Modify_Date']);
    if (($image == "") AND ($GetModRec['Rec_Rel_LangID'] > 0)) {
        $GetRelLangRec_Sel = "SELECT Rec_Image5 FROM records WHERE Rec_ID = ".$GetModRec["Rec_Rel_LangID"];
        $GetRelLangRec_Query = q($GetRelLangRec_Sel);
        $GetRelLangRec = f($GetRelLangRec_Query);
        $image = $GetRelLangRec['Rec_Image5'];
    }
}

$pathimage=getLargestPhotoAvail("uploads/images/",$image);
$pathimage = $path.$pathimage;

if ((file_exists($pathimage)) AND ($image <> "")) {
    print "<div class='image3_$le_id";
    if($_GET["le"]=="1") print " incom_edit_container";
    print "'";
    if($_GET["le"]=="1") print " data-rec-id='$le_id' data-field='Rec_Image5'";
    print ">";

    $path_parts = pathinfo($pathimage);
    $ExtFile = $path_parts['extension'];
    $CreatedImage=generateImgForWidthnHeight($ExtFile,$pathimage);
    list($widthImg, $heightImg) = getImageDimensions($CreatedImage, $pathimage);


   if ($GetOptRec['Rec_Check1'] == 1) { // LazyLoad
        print "<img class=\"lazyload\" data-srcset=\""; echo srcsetPaths($image,"images",$path,$rootURL,$mobileMode); print "\" data-src=\"$rootURL$pathimage?v=$dateModified\" alt=\"$titleimg\" width=\"$widthImg\" height=\"$heightImg\" style=\"width:100%; vertical-align:middle; display: block;\">";
    } else {
        print "<img srcset=\"";echo srcsetPaths($image,"images",$path,$rootURL,$mobileMode); print "\" src=\"$rootURL$pathimage?v=$dateModified\" alt='$titleimg' width=\"$widthImg\" height=\"$heightImg\" style=\"width:100%; vertical-align:middle; display: block;\">";
    }

    print "</div>";
}
?>