<?php
if (isset($ImageCSS)) $imageStyle = "style='" . $ImageCSS . "'";

$image = $GetRec['Rec_Image2'];
$titleimg = $GetRec['Rec_Title'];
$dateModified = str_replace(['-', ',', ':'], '', $GetRec['Modify_Date']);
if (($image == "") AND ($GetRec['Rec_Rel_LangID'] > 0)) {
    $GetRelLangRec_Sel = "SELECT * FROM records WHERE Rec_ID = ".$GetRec["Rec_Rel_LangID"];
    $GetRelLangRec_Query = q($GetRelLangRec_Sel);
    $GetRelLangRec = f($GetRelLangRec_Query);
    $image = $GetRelLangRec['Rec_Image2'];
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
    $image = $GetModRec['Rec_Image2'];
    $titleimg = $GetModRec['Rec_Title'];
    $dateModified = str_replace(['-', ',', ':'], '', $GetModRec['Modify_Date']);
    if (($image == "") AND ($GetModRec['Rec_Rel_LangID'] > 0)) {
        $GetRelLangRec_Sel = "SELECT Rec_Image2 FROM records WHERE Rec_ID = ".$GetModRec["Rec_Rel_LangID"];
        $GetRelLangRec_Query = q($GetRelLangRec_Sel);
        $GetRelLangRec = f($GetRelLangRec_Query);
        $image = $GetRelLangRec['Rec_Image2'];
    }
}

$pathimage=getLargestPhotoAvail($path. "./uploads/images/",$image);
if ((file_exists($pathimage)) AND ($image <> "")) {
        print "<div class='img' style='background-image:url(\"$pathimage?v=$dateModified\");'></div>";
}
?>