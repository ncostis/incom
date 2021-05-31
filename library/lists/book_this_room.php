<?php
$recURL = $GetRec['Rec_Field1'];
// Home Page

if (getparamvalue('ID') == "" || isset($GetRecMod) ){
	//echo $GetRecMod['Rec_ID'];
	$recURL = $GetRecMod['Rec_Field1'];
}

$le_field = 'Rec_Field24';

if ($mobileMode == '1') {
	$classmob = "bookSmall";
	if((getparamvalue('ID') != "")) $classmob = "bookSmall bookSmallInt";
	
	$bookTitle = $GetHome['Rec_Field24'];
	$getbookURL = $recURL."&voucher=targeted";
	$getbookURL = $recURL;
} else {

	// DESKTOP VERSION
	$pageview = "offers-popup";
	$GeoOffers_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = '$pageview' AND Rec_Page_ID = Page_ID AND Rec_Active='0' AND ((FIND_IN_SET('$getgeoloc',Rec_Field1) > 0) OR (Rec_Field1 = 'all'))";
	$GeoOffers_Query = q($GeoOffers_Sel);
	$GeoOffers = f($GeoOffers_Query);
	$numGeoOffers = nr($GeoOffers_Query);

	if (($GetTitle["Parent_Page_ID"] == 0) OR (getparamvalue('ID') == "")) { // List Accommodation, if Parent_Page_ID = 0 (queries.php) OR List Home Page
		$classmob = "bookSmall"; 
		$bookTitle = $GetHome['Rec_Field24'];
	} else { // ROOM
		$classmob = "bookSmall bookSmallInt";  
		$bookTitle = $GetHome['Rec_Field23'];
		$le_field = 'Rec_Field23';
	}

	if (($numGeoOffers > '0') AND ($getgeoloc <> "GR")) {
		$getbookURL = $recURL."&voucher=targeted";
		$getbookURL = $recURL;
	} else {
		$getbookURL = $recURL;
	}
}

$le_class = "";
$le_fields = "";
if($_GET["le"]=="1"){
	$le_class="incom_edit_container";
	$le_fields = " data-rec-id='".$GetHome['Rec_ID']."' data-field='$le_field'";
}
?>
<a href="<?=$getbookURL?>" class="<?=$classmob." ".$le_class?>" target="_blank" rel="noopener" <?=$le_fields?>><?=$bookTitle?></a>