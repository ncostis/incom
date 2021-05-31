<?php
$startat = 0;
$maxPhotos = $initMaxPhotos; // Get From Category Settings
if (!isset($divGridGallery)) $divGridGallery = "gridGallery"; // Get Class From Category Settings
if (!isset($divGridGalleryItem)) $divGridGalleryItem = "gridGalleryItem"; // Get Class From Category Settings

$GetRec_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 Order by Rec_Order Asc";
$GetRec_Query = q($GetRec_Sel);

	$num= 0;
	while ($GetRec = f( $GetRec_Query )) {
$recImCat = $GetRec['Rec_Img_Cat_ID'];

	$select_query = "Select * FROM images WHERE Img_Cat_ID = $recImCat Order by Img_Order Asc"; // LIMIT $startat, 100
	$Photos_Query = q($select_query);

if (nr($Photos_Query) > 0) {

					print "<div class=\"$divGridGallery\"><div class=\"$divGridGalleryItem\">\n";

	$numPhotos = 0;
	$numshow = 0;

	while($PhotosQ = f( $Photos_Query ))   {

		$GetImgTitle_Sel = "Select * FROM images_text WHERE ImgT_ImgID = ".$PhotosQ["Img_ID"];
		$GetImgTitle_Query = q($GetImgTitle_Sel);
		$GetImgTitle = f( $GetImgTitle_Query );
		$imgTitle= $GetImgTitle['ImgT_Name'];

		$numPhotos ++;
		$numshow ++;
		$imgzoom = $Path_Photo.$PhotosQ['Img_Ext'];
		$imagepath = $Path_Photo_mobile.$PhotosQ['Img_Ext'];

         if($mobileMode <> 1){
			print "<a class=\"fancybox\" rel=\"gallery$recImCat\" href=\"$imgzoom\"  title=\"$imgTitle\">\n";
			if($numshow <= 1){

				print"<div class=\"imageArea opacity8\" style=\"background-image: url($imagepath); background-size: cover;\"><span class=\"imageArea \"></span></div>\n";

			} // $numshow
			print "</a>\n";
		}else{
                      if($numshow <= $initMobMaxPhotos){
				print"<img src=\"$imagepath\" alt=\"$imgTitle\" style=\"width:100%;height:auto;\">\n";
                     }
                }

	} // while
	print"<div style=\"clear:both;\"></div>";
	print"<div class=\"galleryCatTitle\">".$GetRec["Rec_Title"]."</div>";
} // if there are photos
				print "</div></div>\n";
	} // end while
	print"<div style='clear:both;'></div>";

?>