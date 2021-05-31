<?php
$path = "";
require $path . "library/init.php";
$siteURL = $rootURL;
$LangPop = $_GET['LangPop'];
?>

<meta name="robots" content="noindex, follow"/>
<?php
$getgeoloc = ip_info("Visitor", "Country Code");

// if find POP UP banner from selected Language - show it
if ($LangPop <> "") {
	$OffersPopup_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = 'offers-popup' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND Rec_Check1 = 1 AND FIND_IN_SET('$LangPop',Rec_Field1) > 0";
	$OffersPopup_Query = q($OffersPopup_Sel);
}

if (nr($OffersPopup_Query) == 0) { // if no Lang popup exists then get from GEO Location
	// SELECT GEO LOCATION BANNERS
	$OffersPopup_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = 'offers-popup' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND Rec_Check1 = 0 AND FIND_IN_SET('$getgeoloc',Rec_Field1) > 0";
	$OffersPopup_Query = q($OffersPopup_Sel);
	if (nr($OffersPopup_Query) == 0) {
		$OffersPopup_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = 'offers-popup' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND Rec_Field1 = 'all'";
		$OffersPopup_Query = q($OffersPopup_Sel);
	}
}

$GetRecMod = f($OffersPopup_Query);
$RecMod_ID = $GetRecMod['Rec_ID'];
$RecView = $GetRecMod['Rec_View'];
$recImCat = $GetRecMod['Rec_Img_Cat_ID'];
$Page_Rec_Temp = $GetRecMod['Page_Rec_Temp'];
if ($GetRecMod['Rec_Check1'] == 0) $target = "_blank"; else $target = "_parent";

// PRINT BANNER
// ************
print "<a href=\"".$GetRecMod["Rec_Field26"]."\" target=\"$target\">";
	$pagename = $path . "views/module_list_page.php";
	require "$pagename";
print "</a>";
?>

