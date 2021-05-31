<?php
if(!function_exists('imagecreatefromwebp')){
    function imagecreatefromwebp($filepath){
        $image=false;
        $fileInfo = pathinfo(realpath($filepath));
        if($fileInfo['extension']=="jpg" || $fileInfo['extension']=="jpeg")
            $image = imagecreatefromjpeg($filepath);
        return $image===false?null:$image;
    }
}

// Get Prefetch DNS from Optimize Rec
$GetOptRec_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'optimized' AND Rec_Page_ID = Page_ID";
$GetOptRec_Query = q($GetOptRec_Sel);
$GetOptRec = f($GetOptRec_Query);
if ($GetOptRec['Rec_TextArea1'] <> "") echo $GetOptRec['Rec_TextArea1']."\n";

$domain = $_SERVER['SERVER_NAME'];
// $domain=$_SERVER['HTTP_HOST'];
$scheme = $_SERVER['REQUEST_SCHEME'];
// EDITOR Description for use without Custom Social Description //
$sitePath=$GetVar['Rec_Title'];
if (($PageResults['Page_Meta_SocialDesc'] == "") AND ($PageResults['Page_Meta_Desc'] == "")) {
function getSocialDesc($Rec_ID,$Path_Texts,$ednum,$style,$path) {
	require_once $path."_cm_admin/core/initvars.php";
	$GetSocialText_Sel = "SELECT Rec_Text1,Rec_Text2 FROM records WHERE Rec_ID = $Rec_ID";
	$GetSocialText_Query = q($GetSocialText_Sel);
	$GetSocialText = f($GetSocialText_Query);
	$RecSocialText = "Rec_Text".$ednum;
	global $show;
	$FileName = $Path_Texts.$GetSocialText[$RecSocialText].".htm";
	if (strlen($GetSocialText[$RecSocialText]) > 0) {
	if (file_exists($FileName) & (filesize($FileName) > 0))
	{
		$handle = fopen($FileName, "r");
		$contents = file_get_contents($FileName, NULL, NULL, 0, 157);
		//var_dump($contents);
		fclose($handle);
		//echo $contents;

		function strip_html_tags( $contents )
		{
			$contents = preg_replace(
				array(
					// Remove invisible content
					'@<head[^>]*?>.*?</head>@siu',
					'@<style[^>]*?>.*?</style>@siu',
					'@<script[^>]*?.*?</script>@siu',
					'@<object[^>]*?.*?</object>@siu',
					'@<embed[^>]*?.*?</embed>@siu',
					'@<applet[^>]*?.*?</applet>@siu',
					'@<noframes[^>]*?.*?</noframes>@siu',
					'@<noscript[^>]*?.*?</noscript>@siu',
					'@<noembed[^>]*?.*?</noembed>@siu',


					// Add line breaks before & after blocks
					'@<((br)|(hr))@iu',
					'@</?((address)|(blockquote)|(center)|(del))@iu',
					'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
					'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
					'@</?((table)|(th)|(td)|(caption))@iu',
					'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
					'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
					'@</?((frameset)|(frame)|(iframe))@iu',
				),
				array(
					' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
					"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
					"\n\$0", "\n\$0",
				),
				$contents );

				// replace whitespace characters with a single space
				$contents = preg_replace('/\s+/', ' ', $contents);
			// Remove all remaining tags and comments and return.
			return strip_tags($contents);
		}


/* Get the file's character encoding from a <meta> tag */
preg_match( '@<meta\s+http-equiv="Content-Type"\s+content="([\w/]+)(;\s+charset=([^\s"]+))?@i',
    $contents, $matches );

/* Convert to UTF-8 before doing anything else */
// $utf8_text = iconv( $encoding, "utf-8", $contents );
$utf8_text = mb_convert_encoding( $encoding, "utf-8", $contents );

$utf8_text = strip_html_tags( $contents );
$utf8_text = html_entity_decode( $utf8_text, ENT_QUOTES, "UTF-8" );

	}
	}
	$show = $utf8_text; return $show;
}
$socialDesc = getSocialDesc($Rec_ID,$Path_Texts,$ednum,$style,$path);
#if($show <> '') {
#print "<meta name=\"description\" content='".$show."...'/>\n";
#print "<meta property='og:description' content='".$show."...'/>\n"; }
}
// END of EDITOR //

// Basic Meta Tags
if ( $ID == "") { // Home Page
	if ($PageResults['Page_Meta_Title'] <> '') { print "<title>".$GetHome["Page_Meta_Title"]."</title>\n"; } elseif($GetHome['Rec_Title_Meta'] <> '') { print "<title>".$GetHome["Rec_Title_Meta"]."</title>\n"; } else { print "<title>".$GetHome["Page_Name"]."</title>\n"; }
	if ($PageResults['Page_Meta_Desc'] <> '') { print "<meta name=\"description\" content=\"".$GetHome["Page_Meta_Desc"]."\"/>\n"; } elseif($GetHome['Rec_Desc_Meta'] <> '') {
		print "<meta name=\"description\" content=\"".$GetHome["Rec_Desc_Meta"]."\"/>\n"; } elseif($GetHome['Rec_Desc'] <> '') { print "<meta name=\"description\" content=\"".$GetHome["Rec_Desc"]."\"/>\n"; }
} else { // Internal Pages
	if ($_GET['Rec_ID'] == "") { // None Records in Page
		if ($PageResults['Page_Meta_Title'] <> '') { print "<title>".$PageResults["Page_Meta_Title"]."</title>\n"; } elseif($PageResults['Page_Name'] <> '') { print "<title>".$PageResults["Page_Name"]."</title>\n"; }
		if ($PageResults['Page_Meta_Desc'] <> '') { print "<meta name=\"description\" content=\"".$PageResults["Page_Meta_Desc"]."\"/>\n"; } elseif($show <> '') { print "<meta name=\"description\" content='".$show."'/>\n"; }
	} else {
		if ($GetRec['Rec_Title_Meta'] == "") { print "<title>".$GetRec["Rec_Title"]."</title>\n";	} else { print "<title>".$GetRec["Rec_Title_Meta"]."</title>\n"; }
		if ($GetRec['Rec_Desc_Meta'] <> "") { print "<meta name=\"description\" content=\"".$GetRec["Rec_Desc_Meta"]."\"/>\n"; } elseif($show <> '') { print "<meta name=\"description\" content='".$show."'/>\n"; }
	}
}
if ($PageResults['Page_Meta_Keywords'] <> '') {	print "<meta name=\"keywords\" content=\"".$PageResults["Page_Meta_Keywords"]."\"/>\n"; }
// END Basic Meta Tags

// Social Media Meta Tags
if ( $ID == "") { // Home Page
	if ($PageResults['Page_Meta_Title'] <> '') { print "<meta property='og:title' content='".$GetHome["Page_Meta_Title"]."'/>\n"; } elseif($GetHome["Rec_Title_Meta"] <> '') { print "<meta property='og:title' content='".$GetHome["Rec_Title_Meta"]."'/>\n"; } else { print "<meta property='og:title' content='".$GetHome["Page_Name"]."'/>\n"; }
	if ($PageResults['Page_Meta_SocialDesc'] <> "") { print "<meta property='og:description' content=\"".$GetHome["Page_Meta_SocialDesc"]."\"/>\n"; } elseif ($PageResults['Page_Meta_Desc'] <> '') { print "<meta property='og:description' content=\"".$GetHome["Page_Meta_Desc"]."\"/>\n"; } elseif($GetHome["Rec_Desc_Meta"] <> '') {	print "<meta property='og:description' content=\"".$GetHome["Rec_Desc_Meta"]."\"/>\n"; } elseif($show <> '') { print "<meta property='og:description' content='".$show."'/>\n"; }
} else { // Internal Pages
	if ($_GET['Rec_ID'] == "") { // None Records in Page
		if ($PageResults['Page_Meta_Title'] <> '') { print "<meta property='og:title' content='".$PageResults["Page_Meta_Title"]."'/>\n"; } elseif($PageResults['Page_Name'] <> '') { print "<meta property='og:title' content='".$PageResults["Page_Name"]."'/>\n"; }
		if ($PageResults['Page_Meta_SocialDesc'] <> "") { print "<meta property='og:description' content='".$PageResults["Page_Meta_SocialDesc"]."'/>\n";} elseif ($PageResults['Page_Meta_Desc'] <> "") { print "<meta property='og:description' content='".$PageResults["Page_Meta_Desc"]."'/>\n"; } elseif($GetRec['Rec_Desc_Meta'] <> '') { print "<meta property='og:description' content=\"".$GetRec["Rec_Desc_Meta"]."\"/>\n"; } elseif($show <> '') { print "<meta property='og:description' content='".$show."'/>\n"; }
	} else {
		if ($GetRec['Rec_Title_Meta'] == "") {	print "<meta property='og:title' content='".$GetRec["Rec_Title"]."'/>\n"; } else { print "<meta property='og:title' content='".$GetRec["Rec_Title_Meta"]."'/>\n"; }
		if ($GetRec['Rec_Desc_Meta'] <> '') { print "<meta property='og:description' content=\"".$GetRec["Rec_Desc_Meta"]."\"/>\n"; } elseif($show <> '') { print "<meta property='og:description' content='".$show."'/>\n"; }
	}
}
print "<meta property='og:url' content='".$scheme."://".$domain."".$_SERVER['REQUEST_URI']."'/>\n";
$blog = $PageResults['Page_View'];
if ($_GET['ID'] == "") { print "<meta property='og:type' content='website'/>\n"; } elseif((strpos($blog, 'blog') !== false) AND ($_GET['Rec_ID'] == 0)) { print "<meta property='og:type' content='blog'/>\n"; } else { print "<meta property='og:type' content='article'/>\n"; }
// END Social Media Meta Tags

# IMAGES
# Social Image
if ($GetRec['Rec_Image_Social'] <> '') {
	$pathimageSocial = $domain.$Path_Image.$GetRec['Rec_Image_Social'];
	print "<meta property='og:image' content='".$scheme."://$pathimageSocial'/>\n";
	if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimageSocial'/>\n"; }
	$URLsocial = "".$_SERVER['DOCUMENT_ROOT']."".$Path_Image."".$GetRec['Rec_Image_Social']."";
	list($widthsoc, $heightsoc) = getImageDimensions(null, $URLsocial);
	if($widthsoc!=null && $heightsoc!=null){
	   print "<meta property='og:image:width' content='$widthsoc'/>\n";
	   print "<meta property='og:image:height' content='$heightsoc'/>\n";
	}
}
# END Social Image

# Responsive Rec Content Gallery
if ($GetRec['Rec_Image_Social'] == '') { // social image field missing
$recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
$FadeImg_Sel = "Select * FROM noresize_images WHERE Nri_Cat_ID = $recImCatNR Order by Nri_Order, Nri_ID Asc";
$FadeImg_Query = q($FadeImg_Sel);
while($FadeImg = f( $FadeImg_Query ))  {
$imgzoom=getLargestPhotoAvail($path. "uploads/nr_photos/",$FadeImg['Nri_ImageZoom']);
print "<meta property='og:image' content='".$scheme."://".$domain."/".$sitePath.$imgzoom."'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://".$domain."/".$sitePath.$imgzoom."'/>\n"; }
$ExtFile = substr($imgzoom, strrpos($imgzoom, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$imgzoom);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $imgzoom);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
# END Responsive Rec Content Gallery

# Responsive Cat Content Gallery
$recImCatNRCAT = $CatCont['Rec_NoResImg_Cat_ID'];
$FadeImgCAT_Sel = "Select * FROM noresize_images WHERE Nri_Cat_ID = $recImCatNRCAT Order by Nri_Order, Nri_ID Asc";
$FadeImgCAT_Query = q($FadeImgCAT_Sel);
while($FadeImgCAT = f( $FadeImgCAT_Query ))  {
$imgzoomCAT=getLargestPhotoAvail($path. "uploads/nr_photos/",$FadeImgCAT['Nri_ImageZoom']);
print "<meta property='og:image' content='".$scheme."://".$domain."/".$sitePath.$imgzoomCAT."'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://".$domain."/".$sitePath.$imgzoomCAT."'/>\n"; }
$ExtFile = substr($imgzoomCAT, strrpos($imgzoomCAT, '.') + 1);
$CreatedImage = generateImgForWidthnHeight($ExtFile,$imgzoomCAT);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $imgzoomCAT);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
# END Responsive Cat Content Gallery

# Other Social Images
$recImCat = $GetRec['Rec_Img_Cat_ID'];
$ModPageID = getModPageID($ModPageID,$Lang);

if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
	if ($RecMod_ID <> "") { $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID AND Rec_Active = 0"; } // Get content from module Dynamically
	elseif ($ModPageID <> "") { $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0"; } // Get content directly from module

	$GetModRec_Query = q($GetModRec_Sel);
	$GetModRec = f( $GetModRec_Query );
	$recImCat = $GetModRec['Rec_Img_Cat_ID'];
}

	$select_query = "Select * FROM images WHERE Img_Cat_ID = $recImCat Order by Img_Order Limit 0,1";
	$Photos_Query = q($select_query);

	while($PhotosQ = f( $Photos_Query )) {
		$img=getLargestPhotoAvail($path. "uploads/photos/",$PhotosQ['Img_Ext']);
		print "<meta property='og:image' content='".$scheme."://".$domain."/".$sitePath.$img."'/>\n";
		if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://".$domain."/".$sitePath.$img."'/>\n"; }
		$ExtFile = substr($img, strrpos($img, '.') + 1);
		$CreatedImage=generateImgForWidthnHeight($ExtFile,$img);
		list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $img);
      	if($widthsoc!=null && $heightsoc!=null){
      		print "<meta property='og:image:width' content='$widthsoc'/>\n";
      		print "<meta property='og:image:height' content='$heightsoc'/>\n";
      	}
	}
$image=getLargestPhotoAvail($path. "uploads/images/",$GetRec['Rec_Image1']);
$image2=getLargestPhotoAvail($path. "uploads/images/",$GetRec['Rec_Image2']);
$image3=getLargestPhotoAvail($path. "uploads/images/",$GetRec['Rec_Image3']);
$image4=getLargestPhotoAvail($path. "uploads/images/",$GetRec['Rec_Image4']);
$image5=getLargestPhotoAvail($path. "uploads/images/",$GetRec['Rec_Image5']);
$image6=getLargestPhotoAvail($path. "uploads/images/",$GetRec['Rec_Image6']);

#$ModPageID = getModPageID($ModPageID,$Lang);
if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
	if ($RecMod_ID <> "") { $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID AND Rec_Active = 0"; } // Get content from module Dynamically
	elseif ($ModPageID <> "") { $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0"; } // Get content directly from module

	$GetModRec_Query = q($GetModRec_Sel);
	$GetModRec = f( $GetModRec_Query );
	$image=getLargestPhotoAvail($path. "uploads/images/",$GetModRec['Rec_Image1']);
	$image2=getLargestPhotoAvail($path. "uploads/images/",$GetModRec['Rec_Image2']);
	$image3=getLargestPhotoAvail($path. "uploads/images/",$GetModRec['Rec_Image3']);
	$image4=getLargestPhotoAvail($path. "uploads/images/",$GetModRec['Rec_Image4']);
	$image5=getLargestPhotoAvail($path. "uploads/images/",$GetModRec['Rec_Image5']);
	$image6=getLargestPhotoAvail($path. "uploads/images/",$GetModRec['Rec_Image6']);
}

$pathimage = $domain."/".$sitePath.$image;
$pathimage2 = $domain."/".$sitePath.$image2;
$pathimage3 = $domain."/".$sitePath.$image3;
$pathimage4 = $domain."/".$sitePath.$image4;
$pathimage5 = $domain."/".$sitePath.$image5;
$pathimage6 = $domain."/".$sitePath.$image6;

if (strlen($ID)>"1") {
if ($image <> "") {
print "<meta property='og:image' content='".$scheme."://$pathimage'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimage'/>\n"; }
$ExtFile = substr($image, strrpos($image, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$image);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $image);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
if ($image2 <> "") {
print "<meta property='og:image' content='".$scheme."://$pathimage2'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimage2'/>\n"; }
$ExtFile = substr($image, strrpos($image2, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$image2);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $image2);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
if ($image3 <> "") {
print "<meta property='og:image' content='".$scheme."://$pathimage3'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimage3'/>\n"; }
$ExtFile = substr($image, strrpos($image3, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$image3);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $image3);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
if ($image4 <> "") {
print "<meta property='og:image' content='".$scheme."://$pathimage4'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimage4'/>\n"; }
$ExtFile = substr($image, strrpos($image4, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$image4);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $image4);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
if ($image5 <> "") {
print "<meta property='og:image' content='".$scheme."://$pathimage5'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimage5'/>\n"; }
$ExtFile = substr($image, strrpos($image, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$image);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $image5);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
if ($image6 <> "") {
print "<meta property='og:image' content='".$scheme."://$pathimage6'/>\n";
if ($scheme == 'http') { print "<meta property='og:image:secure_url' content='https://$pathimage6'/>\n"; }
$ExtFile = substr($image, strrpos($image, '.') + 1);
$CreatedImage=generateImgForWidthnHeight($ExtFile,$image);
list($widthsoc, $heightsoc) = getImageDimensions($CreatedImage, $image6);
if($widthsoc!=null && $heightsoc!=null){
	print "<meta property='og:image:width' content='$widthsoc'/>\n";
	print "<meta property='og:image:height' content='$heightsoc'/>\n";
}
}
}
} // END social image field missing
# END Other Social Images
# END IMAGES

// Twitter Social Tags
$SocialMedia_SelTw = "SELECT * FROM pages, records WHERE Page_Section = 'socialmedia' AND Page_Lang = '$Lang' AND Page_Name = 'Social Media' AND Rec_Title = 'Twitter' AND Rec_Page_ID = Page_ID";
$SocialMedia_QueryTw = q($SocialMedia_SelTw);
$SocialMediaTw = f( $SocialMedia_QueryTw );
if ($SocialMediaTw['Rec_Field7'] != '') {
print "<meta name='twitter:card' content='summary_large_image'/>\n";
print "<meta name='twitter:card' content='summary'/>\n";
print "<meta name='twitter:site' content='@".$SocialMediaTw["Rec_Field7"]."'/>\n"; }
// END Twitter Social Tags

// Canonical
$CanonicalURL = "".$scheme."://".$domain.strtok($_SERVER["REQUEST_URI"], '?')."";
if ($PageResults['Page_Canonical_URL'] <> "") $CanonicalURL = $PageResults['Page_Canonical_URL'];
if (($_GET['Rec_ID'] <> "") AND ($GetRec['Rec_Canonical_URL'] <> "")) $CanonicalURL = $GetRec['Rec_Canonical_URL'];
print "<link rel=\"canonical\" href=\"$CanonicalURL\"/>\n";

// alternate hreflang pages
$defaulthreflang = $PageResults['Page_StartLangID'];

$LangMeta_Sel = "SELECT * FROM lang WHERE Lang_XML_Export ='1' Order By Lang_ID Asc";
$LangMeta_Query = q($LangMeta_Sel);

if(nr($LangMeta_Query) > '1') { // if there are ACTIVE langs

// if inside RECORD Page
		if ($_GET['Rec_ID'] <> "") {
			if($defaulthreflang == '') { // if start lang
				$DefaultPageURL = "".$scheme."://".$domain.$_SERVER['REQUEST_URI']."";
				$MatchRecs_Sel = "SELECT * FROM pages, records WHERE  Rec_Page_ID = Page_ID AND Rec_Rel_LangID = '".$_GET["Rec_ID"]."'";
				$MatchRecs_Query = q($MatchRecs_Sel);
			} else { // if other languages
				$DefaultRec_Sel = "SELECT * FROM pages, records WHERE Rec_Page_ID = Page_ID AND Rec_ID = '".$GetRec["Rec_Rel_LangID"]."'";
				$DefaultRec_Query = q($DefaultRec_Sel);
				if (nr($DefaultRec_Query) <> '0') {
					$DefaultRec = f($DefaultRec_Query);
					$DefPView = $DefaultRec["Page_View"];
					$StartLangRID = $DefaultRec["Rec_ID"];
					if($DefPView <> '') { $DefaultPageView = "".$DefPView."/"; } else { $DefaultPageView = "$DefPView"; }
					$friendlyURL = friendly($DefaultRec['Rec_Title'])."/";
					$DefaultPageURL = "".$scheme."://".$domain."".$rootURL."".$DefaultPageView."".$StartLangRID."/".$friendlyURL."";
					$MatchRecs_Sel = "SELECT * FROM pages, records WHERE Rec_Page_ID = Page_ID AND Rec_Rel_LangID = '".$GetRec["Rec_Rel_LangID"]."'";
					$MatchRecs_Query = q($MatchRecs_Sel);
				}
		   }
			$numlangact = 0;

			while($MatchRecs = f($MatchRecs_Query)) {
				$MatchRecID = $MatchRecs['Rec_ID'];
				$MatchPView = $MatchRecs['Page_View'];
				$MatchLang = $MatchRecs['Page_Lang'];
				$PageCanonical = $GetRec['Rec_Canonical_URL'];

				$LangMetaAct_Sel = "SELECT * FROM lang WHERE Lang_Title ='$MatchLang' AND Lang_XML_Export ='1' Order By Lang_ID Asc";
				$LangMetaAct_Query = q($LangMetaAct_Sel);
				if(($PageCanonical =='') AND (nr($LangMetaAct_Query)> '0')) {
					$numlangact= $numlangact + 1;
					if($numlangact =='1') { 	print"<link rel=\"alternate\" hreflang=\"$StartLang\" href=\"$DefaultPageURL\"/>\n";  }
					if($MatchPView <> '') { $MatchPagesView = "".$MatchPView."/"; } else { $MatchPagesView = "$MatchPView"; }
					$friendlyURL = friendly($MatchRecs['Rec_Title'])."/";
					$matchURL = "".$scheme."://".$domain."".$rootURL."".$MatchLang."/".$MatchPagesView."".$MatchRecID."/".$friendlyURL."";
					print"<link rel=\"alternate\" hreflang=\"$MatchLang\" href=\"$matchURL\"/>\n";
				} // end if this lang is active
			}	// end while records

// if inside CATEGORY PAGE
		} else {
			if($defaulthreflang == '') {   // if start lang
				$DefaultPageURL = "".$scheme."://".$domain.$_SERVER['REQUEST_URI']."";
				$MatchPages_Sel = "SELECT * FROM pages WHERE Page_StartLangID = '".$PageResults["Page_ID"]."'";
			} else { // if other languages
				$DefaultPage_Sel = "SELECT * FROM pages WHERE Page_ID = '$defaulthreflang'";
				$DefaultPage_Query = q($DefaultPage_Sel);
				$DefaultPage = f($DefaultPage_Query);
				$DefPView = $DefaultPage['Page_View'];
				if($DefPView <> '') { $DefaultPageView = "".$DefPView."/"; } else { $DefaultPageView = "$DefPView"; }
				$DefaultPageURL = "".$scheme."://".$domain."".$rootURL."".$DefaultPageView."";
				$MatchPages_Sel = "SELECT * FROM pages WHERE Page_StartLangID = '$defaulthreflang'";
		   }
			$MatchPages_Query = q($MatchPages_Sel);
			$numlangact = 0;
			while($MatchPages = f($MatchPages_Query)) {
				$MatchPView = $MatchPages['Page_View'];
				$MatchLang = $MatchPages['Page_Lang'];
				$PageCanonical = $PageResults["Page_Canonical_URL"];

				$LangMetaAct_Sel = "SELECT * FROM lang WHERE Lang_Title ='$MatchLang' AND Lang_XML_Export ='1' Order By Lang_ID Asc";
				$LangMetaAct_Query = q($LangMetaAct_Sel);
				if(($PageCanonical =='') AND (nr($LangMetaAct_Query)> '0')) {
					$numlangact= $numlangact + 1;
					if($numlangact =='1') { 	print"<link rel=\"alternate\" hreflang=\"$StartLang\" href=\"$DefaultPageURL\"/>\n";  }
					if($MatchPView <> '') { $MatchPagesView = "".$MatchPView."/"; } else { $MatchPagesView = "$MatchPView"; }
					$matchURL = "".$scheme."://".$domain."".$rootURL."".$MatchLang."/".$MatchPagesView."";
					print"<link rel=\"alternate\" hreflang=\"$MatchLang\" href=\"$matchURL\"/>\n";
				}	// end if this lang is active
			}
		} // end if record / page
} // end if if there are ACTIVE langs

?>