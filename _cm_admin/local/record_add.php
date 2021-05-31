<?php
require_once('init.php');
$Page_ID = $_GET["Page_ID"];
$year = date("Y", $timestamp);
$month = date("m", $timestamp);
$date = date("d", $timestamp);
$hour = date("H", $timestamp);
$min = date("i", $timestamp);
$dateNow = $year . $month . $date . $hour . $min;
$dateEnd = ($year + 20) . $month . $date . $hour . $min;

//date creation
$timestamp = $timestamp + $offset;
$creationdate = gmdate("Y-m-d,H:i", $timestamp);


$GetPage_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
$GetPage_Query = q($GetPage_Sel);
$GetPage = f($GetPage_Query);
$Page_Rec_Temp = $GetPage["Page_Rec_Temp"];

$inr = "
		INSERT INTO records 
				(Rec_Page_ID, Rec_Title, Rec_Order, Rec_View, Rec_DateStart, Rec_DateStop, Rec_Active, Creation_Date) 
		VALUES 	('$Page_ID', '', '9999', '$Page_Rec_Temp', '$dateNow', '$dateEnd', '0', '$creationdate')
	";
q($inr);

$Select_Rec = "SELECT * FROM records WHERE Rec_Page_ID = '$Page_ID' ORDER BY Rec_ID DESC";
$Select_Rec_q = q($Select_Rec);
$Select_Rec_row = f($Select_Rec_q);

?>


<script language="JavaScript">
    window.location = "index.php?ID=record_edit&Page_ID=<?php echo $Page_ID; ?>&Rec_ID=<?php echo $Select_Rec_row['Rec_ID']; ?>";
</script>