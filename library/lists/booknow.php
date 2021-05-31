<?php
if ($mobileMode == '1') {
	$classmob = "bookNowMobile";
	$bookTitle = $GetHome['Rec_Field27'];
	$getbookURL = $GetHome["Rec_Field28"];
} else {
	// DESKTOP VERSION
	$classmob = "bookNow";
	$pageview = "offers_popup";
	$GeoOffers_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = '$pageview' AND Rec_Page_ID = Page_ID AND Rec_Active='0' AND ((FIND_IN_SET('$getgeoloc',Rec_Field1) > 0) OR (Rec_Field1 = 'all'))";

	$GeoOffers_Query = q($GeoOffers_Sel);
	$GeoOffers = f($GeoOffers_Query);
	$numGeoOffers = nr($GeoOffers_Query);
	$bookTitle = $GetHome['Rec_Field25'];

	if (($numGeoOffers > '0') AND ($getgeoloc <> "GR")) {
		$getbookURL = $GeoOffers['Rec_Field26'];
	} else {
		$getbookURL = $GetHome['Rec_Field26'];
	}
}

print "<a href=\"$getbookURL\" class=\"$classmob\" target=\"_blank\" rel=\"noopener\">$bookTitle</a>";
?>