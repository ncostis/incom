<?php
$protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
require_once $path."library/geo_location.php";

$timestamp = time();
$offset = 3*60*60;
$timestamp = $timestamp + $offset;							
$currentDateTime = gmdate("YmdHi",$timestamp);

$getgeoloc = ip_info("Visitor", "Country Code");
if ($getgeoloc <> "") { // if geo loc works

// if find POP UP banner from selected Language - show it
if (($path == "../") AND (strlen(substr(dirname($_SERVER['PHP_SELF']), -2)) == 2)) $LangPop = substr(dirname($_SERVER['PHP_SELF']), -2);
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

if (nr($OffersPopup_Query) > 0) {
	$OffersPopup = f( $OffersPopup_Query );
	$starttime = $OffersPopup['Rec_DateStart'];
	$endtime = $OffersPopup['Rec_DateStop'];
	$flagHour = 0;
	$flagDay = 0;

	$clientHour = substr(showclienttime(), 0, 4);  
	$clientDay = substr(showclienttime(), 4, 20); 

	$pos = strpos($OffersPopup['Rec_Field4'], $clientDay);
	if (!isset($clientDay) OR (isset($clientDay) AND ($pos !== false))) $flagDay = 1;  // Day (Monday, Tuesday ...
	if (($OffersPopup['Rec_Field2'] == "") OR (($clientHour > $OffersPopup['Rec_Field2']) AND ($clientHour < $OffersPopup['Rec_Field3']))) $flagHour = 1;   // Cliend Hour by GeoLoc > banner hour

	if (($starttime <= $currentDateTime) AND ($currentDateTime < $endtime)) { // start-end date
		if (($flagHour == 1) AND ($flagDay == 1) AND (($OffersPopup['Rec_TextArea3'] <> '') OR ($OffersPopup['Rec_Image1'] <> ''))) { // if content exist

			// PRINT BANNER
			// ************
			$popupwidth = $OffersPopup['Rec_Field27'];
			$popupheight = $OffersPopup['Rec_Field28'];
			$hrefPop = $protocol . $domain . $rootURL . "popup_content.php?LangPop=". $LangPop;
			?>
			<script type="text/javascript">
				function openColorBox() {
				  $.colorbox({
					innerWidth: '<?php echo $popupwidth; ?>',
					innerHeight: '<?php echo $popupheight; ?>',
					transition: "elastic", //elastic, fade, none
					scrolling: false,
					className: 'popupinitial', // changes in css
					speed: 350,
					fadeOut: 300,
					iframe:false,
					overlayClose:true,
					closeButton: true,
					fastIframe: true,
					fixed: true,
					opacity: 0.65,
					href: "<?php echo $hrefPop; ?>",
				  });
				}
				setTimeout(openColorBox, 5000);				
			</script>
			<?php
		} // main script

	} // start-end date
} // nr($OffersPopup_Query)

} // end if geoloc works
?>