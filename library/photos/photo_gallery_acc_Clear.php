<?php
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
    $recImCat = $GetModRec['Rec_Img_Cat_ID'];
    $startat = $GetModRec['StartAt_Photos'];
    if ($GetModRec['RepeatRow_Photos'] > 1) $initMaxPhotos = $GetModRec['RepeatRow_Photos'];
} else {
    //if there is module page reset $recImCat
    $recImCat = $GetRec['Rec_Img_Cat_ID'];
    $numphotosH = $GetRec['Num_HPhotos'];
    $startat = $GetRec['StartAt_Photos'];
    if ($GetRec['RepeatRow_Photos'] > 1) $initMaxPhotos = $GetRec['RepeatRow_Photos'];
}

$startat = 0;
if (isset($mobileMode) && $mobileMode == 1) { $maxPhotos = $initMobMaxPhotos; } else { $maxPhotos = $initMaxPhotos; }
if (!isset($divGridGallery)) $divGridGallery = "gridGallery"; // Get Class From Category Settings
if (!isset($divGridGalleryItem)) $divGridGalleryItem = "gridGalleryItem"; // Get Class From Category Settings
?>


<?php
$select_query = "Select * FROM images WHERE Img_Cat_ID = $recImCat Order by Img_Order Asc"; // LIMIT $startat, 100
$Photos_Query = q($select_query);

if (nr($Photos_Query) > 0) {
    $numPhotos = 0;
    $numshow = 0;

    while ($PhotosQ = f($Photos_Query)) {

        $GetImgTitle_Sel = "Select * FROM images_text WHERE ImgT_ImgID = ".$PhotosQ["Img_ID"];
        $GetImgTitle_Query = q($GetImgTitle_Sel);
        $GetImgTitle = f($GetImgTitle_Query);
        $imgTitle = $GetImgTitle['ImgT_Name'];

        $numPhotos++;
        $numshow++;

        $imgzoom=getLargestPhotoAvail($path. "uploads/photos/",$PhotosQ['Img_Ext']);
        $imagepath="uploads/photos/600/".$PhotosQ['Img_Ext'];


        if ($numshow <= $maxPhotos) {
            if($numshow <= 5){
                if($numshow ==1){print"<div class=\"gridGal4\">";}
                 print "<a class=\"fancybox\" data-fancybox=\"gallery$recImCat\" data-thumb=\"$rootURL$imagepath\" href=\"$rootURL$imgzoom\"  title=\"$imgTitle\">\n";
                   if ($numshow==1) { print "<div class=\"gridGalleryLarge\">\n"; $imageArea="imageAreaHor";}else{ print "<div class=\"gridGallerySmall\">\n"; $imageArea="imageAreaVert";}
                    print"<div class=\"$imageArea\" style=\"background-image: url($rootURL$imagepath); background-size: cover;\"><span class=\" photoshover\"></span></div>\n";
                    print"</div>";
                    if ($numshow==2 && !$mobileMode) { print "<div style=\"clear:both;\"></div>\n";}
                    print "</a>\n";
                if($numshow ==5){print"</div>";}
            }else{
                print "<div class=\"gridGal5\">\n";
                print "<a class=\"fancybox\" data-fancybox=\"gallery$recImCat\" data-thumb=\"$rootURL$imagepath\" href=\"$rootURL$imgzoom\"  title=\"$imgTitle\">\n";
                print"<div class=\"imageAreaGal5\" style=\"background-image: url($rootURL$imagepath); background-size: cover;\"><span class=\" photoshover\"></span></div>\n";
                print "</a>\n";
                print "</div>\n";
            }
        } // $numshow
        else{
            print "<a class=\"fancybox\" data-fancybox=\"gallery$recImCat\" data-thumb=\"$rootURL$imagepath\" href=\"$rootURL$imgzoom\"  title=\"$imgTitle\"></a>";
        }

    } // while
    print"<div style=\"clear:both;\"></div>";
} // if there are photos?>