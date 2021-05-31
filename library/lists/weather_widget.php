<meta name="robots" content="noindex, nofollow">
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once ("../../_cm_admin/condb/active_mysql.php");

$path = "../../";
// require $path."library/init.php";
require $path."library/queries.php";
$GetHome = f(q("SELECT * FROM pages,records where Page_Section='general' AND Page_ID = Rec_Page_ID Order by Page_Order ASC LIMIT 1"));
$weatherID = $GetHome["Rec_Field3"];
?>
<a class="aw-widget-legal">
<!--By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.-->
</a>
<div id="" class="aw-widget-current"  data-locationkey="<?php echo $weatherID; ?>" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc"></div>
<script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>