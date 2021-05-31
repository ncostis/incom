<?php
require_once $path."library/geo_location.php";

$dateTimeZone = new DateTimeZone("Europe/Athens");
$dateTime = new DateTime("now", $dateTimeZone);
$offset = $dateTimeZone->getOffset($dateTime)/3600;

$timestamp = time();
// $offset = 3*60*60;
$offset = $offset*60*60;
$timestamp = $timestamp + $offset;
$currentDateTime = gmdate("YmdHi",$timestamp);


$currency = "EUR";
$getgeoloc = ip_info("Visitor", "Currency Code", $currency);

if ( empty($getgeoloc['currency_converter'])) $getgeoloc['currency_symbol'] = "€";

// SELECT GEO LOCATION PRICE WIDGET REC
$HotelPriceWidget_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = 'hotel-price-widget' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND ((Rec_Field1 like '%".$getgeoloc["country_code"]."%') OR (Rec_Field1 = 'all'))";
$HotelPriceWidget_Query = q($HotelPriceWidget_Sel);

if ((nr($HotelPriceWidget_Query) == '0') OR ($getgeoloc['country_code'] == "GR")) {  // IF THERE IS NO GEO LOCATION PRICE WIDGET REC - GET GLOBAL PRICE WIDGET REC
	$HotelPriceWidget_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'offerspopup' AND Page_View = 'hotel-price-widget' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 AND Rec_Field1 = 'GR'";
	$HotelPriceWidget_Query = q($HotelPriceWidget_Sel);
}

$GetHotelPriceWidget = f($HotelPriceWidget_Query);

$starttime = $GetHotelPriceWidget['Rec_DateStart'];
$endtime = $GetHotelPriceWidget['Rec_DateStop'];
$flagHour = 0;
$flagDay = 0;

$clientHour = substr(showclienttime(), 0, 4);
$clientDay = substr(showclienttime(), 4, 20);

$pos = strpos($GetHotelPriceWidget['Rec_Field4'], $clientDay);
if (!isset($clientDay) OR (isset($clientDay) AND ($pos !== false))) $flagDay = 1;  // Day (Monday, Tuesday ...
if (($GetHotelPriceWidget['Rec_Field2'] == "") OR (($clientHour > $GetHotelPriceWidget['Rec_Field2']) AND ($clientHour < $GetHotelPriceWidget['Rec_Field3']))) $flagHour = 1;   // Client Hour by GeoLoc > Widget hour

if (($starttime <= $currentDateTime) AND ($currentDateTime < $endtime)) { // start-end date
	if (($flagHour == 1) AND ($flagDay == 1)) { // if day and time is within the limits
		if(nr($HotelPriceWidget_Query) > 0){
			$daysCounted=0;
			$lowestPrice=999999;
			$hotelIsOpen = false;
			if($GetHotelPriceWidget['Rec_Field7'] <> ""){ //if there is an opening date set
				$openingDate = strtotime($GetHotelPriceWidget['Rec_Field7'])+ $offset;
				if($timestamp < $openingDate){ //if current date is prior to the opening date
					$jsonDate = date_format(date_create($GetHotelPriceWidget['Rec_Field7']),"Y-m-d");
					$hotelIsOpen = true;
				}else{$jsonDate = "today";}
			}else{
				$jsonDate = "today";
			}

			while ($daysCounted <= 7 AND $lowestPrice==999999) {
				if($daysCounted==0){ $plusDate=""; }else{ if($hotelIsOpen){ $plusDate=""; $jsonDate=date('Y-m-d', strtotime(date_format(date_create($GetHotelPriceWidget['Rec_Field7']),"Y-m-d") . ' + '.$daysCounted.' day')); }else{ $plusDate="+".$daysCounted.""; }}
				$jsonurl = "https://rest.reserve-online.net/bar/".$GetHotelPriceWidget['Rec_Field5'].".js?callback=getCheapestRoomPrice&per=room&date=".$jsonDate."".$plusDate."";
				$json = file_get_contents($jsonurl);
				if (preg_match('/bar=(.*?);getCheapestRoomPrice/', $json, $match) == 1) {
	    			$json = json_decode($match[1]);
				}

				//var_dump($json);
				if($json <> NULL || $json <> ""){ //if the request is not null or empty
					foreach ($json as $room => $value) {
						if ( $value->price < $lowestPrice ) {
						$lowestPrice=$value->price;
						}
					}
				}
				$daysCounted++;
			}//end for today+7
				if($lowestPrice!=999999){
				$discount;
				if(($GetHotelPriceWidget['Rec_Field10'] <> "") AND ($currentDateTime < gmdate("YmdHi",strtotime($GetHotelPriceWidget['Rec_Field10'])))){
					$discount=$GetHotelPriceWidget['Rec_Field11'];
				}
				elseif(($GetHotelPriceWidget['Rec_Field12'] <> "") AND ($currentDateTime < gmdate("YmdHi",strtotime($GetHotelPriceWidget['Rec_Field12'])))){
					$discount=$GetHotelPriceWidget['Rec_Field13'];
				}
				elseif (($GetHotelPriceWidget['Rec_Field14'] <> "") AND ($currentDateTime < gmdate("YmdHi",strtotime($GetHotelPriceWidget['Rec_Field14'])))) {
					$discount=$GetHotelPriceWidget['Rec_Field15'];
				}
				elseif (($GetHotelPriceWidget['Rec_Field16'] <> "") AND ($currentDateTime < gmdate("YmdHi",strtotime($GetHotelPriceWidget['Rec_Field16'])))) {
					$discount=$GetHotelPriceWidget['Rec_Field17'];
				}
				else{
					$discount=10;
				}

				$discountPrice = round($lowestPrice - ($lowestPrice * ($discount / 100)));
				if($mobileMode<>1){ ?>
					<div class="hotelPrice-wrapper">
						<div class="hotelPrice-top">
							<div class="hotelIcon"></div>
							<div class="left">
								<div class="hPTopTitle"><?php echo $GetHotelPriceWidget['Rec_Field20']; ?></div>
							</div>
							<div class="hpInfoIcon">
								<div class="hpInfoContent"><div class="hpInfoText">We offer up-to-date information on the best prices available online, comparing various booking portals to guarantee the lowest rates possible.<a href="https://360hotelmarketing.com/" target="_blank" class="hpMadeBy"></a></div></div>
							</div>
							<div class="hPClose">X</div>
							<div style="clear:both;"></div>
						</div>
						<?php if($GetHotelPriceWidget['Rec_Field21'] <> ""){ ?><div class="hpmarquee" style="border-bottom: 1px solid #c5c5c5;" direction="" scrollamount="6""><div class="hPTopSubTitle"><?php echo $GetHotelPriceWidget['Rec_Field21']; ?></div></div><?php } ?>
						<div class="hotelPrice-content">
							<div class="hpBorder"><div class="hPWebsiteTitle">Official Website</div><div class="hpWebsitePrice">
								<?php echo convertCurrency($discountPrice, $currency, $getgeoloc['currency_converter'] ).' '.$getgeoloc['currency_symbol'] ?>
								</div>
								<div style="clear:both;"></div>
							</div>
							<?php if($GetHotelPriceWidget['Rec_Check1'] == 1){ ?>
								<div class="bookingDotComIcon"></div><div class="hPExtTitle">Booking</div><div class="hpExtPrice"><?php echo convertCurrency($lowestPrice, $currency, $getgeoloc['currency_converter'] ).' '.$getgeoloc['currency_symbol'] ?></div><div style="clear:both;"></div>
							<?php } ?>
							<?php if($GetHotelPriceWidget['Rec_Check2'] == 1){ ?>
								<div class="expediaIcon"></div><div class="hPExtTitle">Expedia</div><div class="hpExtPrice"><?php echo convertCurrency($lowestPrice, $currency, $getgeoloc['currency_converter'] ).' '.$getgeoloc['currency_symbol'] ?></div><div style="clear:both;"></div>
							<?php } ?>
							<?php if($GetHotelPriceWidget['Rec_Field6'] <> ""){ ?>
								<div class="hpTripadvisor-wrapper">
									<div class="hpTridavisor"></div><div class="hPTripadvisorTitle">Tripadvisor</div>
									<div id="TA_cdsratingsonlywide124" class="TA_cdsratingsonlywide right">
										<ul id="Nvp62wEKLH" class="TA_links XtSwXnY">
										<li id="yeK9ogp2" class="2kVPc3OV">
										<a target="_blank" href="https://www.tripadvisor.co.uk/"></a>
										</li>
										</ul>
									</div>
									<div style="clear:both;"></div>
									<script async src="https://www.jscache.com/wejs?wtype=cdsratingsonlywide&amp;uniq=124&amp;locationId=<?php echo $GetHotelPriceWidget['Rec_Field6'] ?>&amp;lang=en_UK&amp;border=false&amp;shadow=false&amp;display_version=2"></script>
								</div>
							<?php } ?>
						</div>
						<div class="hotelPrice-book">
							<a href="<?php echo $GetHotelPriceWidget["Rec_Field26"]; ?>" class="hpBookNow" target="_blank"><?php echo $GetHotelPriceWidget['Rec_Field25']; ?></a>
						</div>
					</div>
					<div class="hotelPrice-buttonWrapper hvr-ripple-out">Check<br>Prices</div>
				<?php
				}else{ //if mobile ?>
					<a class="hotelPrice-buttonWrapper hvr-ripple-out" href="<?php echo $GetHotelPriceWidget["Rec_Field26"]; ?>" target="_blank">Check<br>Prices</a>
				<?php
				} //end if mobile
			}//end if the price is not available
		}//end if there is record
	}//end if day and time is within the limits
}//end if start-end date
?>