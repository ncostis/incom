<?php

$le_id = $GetRatRec["Rat_ID"];
$image = $GetRatRec['Rat_Image_Resize2'];
$titleimg = $GetRatRec['Rat_Title'];
$dateModified = str_replace(['-', ',', ':'], '', $GetRatRec['Modify_Date']);
$ModPageID = getModPageID($ModPageID, $Lang);

$pathimage=getLargestPhotoAvail("uploads/images_resize_rat/",$image);
$pathimage = $path.$pathimage;
if ((file_exists($pathimage)) AND ($image <> "")) {
    print "<div class='image_rat2_$le_id";
    if($_GET["le"]=="1") print " incom_edit_container";
    print "'";
    if($_GET["le"]=="1") print " data-rec-id='$le_id' data-field='Rat_Image_Resize2' data-rat-rec='true'";
    print ">";

    if ($GetOptRec['Rec_Check1'] == 1) { // LazyLoad
        print "<img class=\"lazyload\" data-srcset=\""; echo srcsetPaths($image,"images_resize_rat",$path,$rootURL,$mobileMode); print "\" data-src=\"$rootURL$pathimage?v=$dateModified\" src=\"$rootURL$pathimage?v=$dateModified\" alt=\"$titleimg\" width=\"auto\" height=\"auto\" style=\"width:100%; vertical-align:middle; display: block;\">";
    } else {
        print "<img srcset=\"";echo srcsetPaths($image,"images_resize_rat",$path,$rootURL,$mobileMode); print "\" src=\"$rootURL$pathimage?v=$dateModified\" alt='$titleimg' width=\"auto\" height=\"auto\" style=\"width:100%; vertical-align:middle; display: block;\">";
    }

    print "</div>";
}
?>