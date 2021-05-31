<script>
    var img = document.images[0];
    img.onclick = function () {
        var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
        location.href = url;
    };
</script>

<?php
//********* SHOW DOC **********/

$file = $Path_File . $GetRec['Rec_File1'];
$fileCheck = $Path_FileCheck . $GetRec['Rec_File1'];
$icon = getDocIcon($GetRec['Rec_File1']);
$filename = $GetRec['Rec_File1'];
$image = $GetRec['Rec_Image_Resize'];


$ModPageID = getModPageID($ModPageID, $Lang);
if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
    if ($RecMod_ID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID AND Rec_Active = 0";
    } // Get content from module Dynamically
    elseif ($ModPageID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0";
    } // Get content directly from module
    $GetModRec_Query = q($GetModRec_Sel);
    $GetModRec = f($GetModRec_Query);

    $file = $Path_File . $GetModRec['Rec_File1'];
    $fileCheck = $Path_FileCheck . $GetModRec['Rec_File1'];
    $icon = getDocIcon($GetModRec['Rec_File1']);
    $filename = $GetModRec['Rec_File1'];
    $image = $GetModRec['Rec_Image_Resize'];
}

$pathimage = $Path_ImageRes_Thumb . $image;
$imageResCheck = $Path_ImageResCheck . $image;
$imgzoom = $Path_ImageRes . $image;


if ((file_exists($imageResCheck)) AND ($image <> "")) {
    $photoArea = "width:" . $sw . "px; height:" . $sh . "px;";
    $marginTopThumb = (($thumb_height - $sh) / 2) . "px"; // vertical align into overflow div, for vertical images
    if (isset($ImageCSS)) $imageStyle = "style='" . $ImageCSS . "'";
    list($w, $h) = getimagesize($Path_ImageResCheck . $image);

    print"<div class='left' style='padding:$cp;'>";
    print"<div $imageStyle>";
    print"<div style='$photoArea position:relative; overflow:hidden;'>";
    print"<div style='position:absolute; width:{$sw}px; padding-top:12px; bottom:0;'>";
    print "&nbsp; <div align=right><a href=\"$file\" target='_blank'><img src=\"$LibraryImages/download.png\" title='download file' border=0 ></a></div>";
    print "</div>";
    if ($h > $w) {
        print "<div style='margin-top:-$marginTopThumb'><img src=\"$pathimage\" width=$sw  alt='' border=0></div>";
    } else {
        print "<img src=\"$pathimage\" style='$photoArea' alt='' border=0>";
    }
    print "</div>";
    print "</div>";
    print "</div>";
    print"<div style=\"clear:both;\"></div>";
}
?>