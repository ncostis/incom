<?php
require_once $routes["active_mysql.php"];

require_once $routes["initvars.php"];
global $Lang;
$Lang = $GetVar['Rec_Scroll1'];
$rootURL = "/".$GetVar['Rec_Title'];
if (($path == "../") AND (strlen(substr(dirname($_SERVER['PHP_SELF']), -2)) == 2)) $Lang = substr(dirname($_SERVER['PHP_SELF']), -2);
if (($path == "../") AND ($domain == "localhost")) $Lang = substr(dirname($_SERVER['PHP_SELF']), -2);


$gmt = $GetVar['Rec_Field20']*60*60;
$timestamp = time() + $gmt;
$currentDateTime = gmdate("YmdHi",$timestamp);

// GEO LOCATION ACTIVE
require_once $path."library/geo_location.php";
$getgeoloc = ip_info("Visitor", "Country Code");
$getgeolocBlock = "-".$getgeoloc;

require_once $path."library/functions.php";
require_once $path."library/functions_fields.php";
require_once $path."library/docs/docgalleries.php";
?>