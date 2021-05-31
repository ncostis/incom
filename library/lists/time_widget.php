<html>
<head>
<meta name="robots" content="noindex, nofollow">
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once ("../../_cm_admin/condb/active_mysql.php");

$path = "../../";
// require $path."library/init.php";
$Lang=$_GET['Lang'];
require $path."library/queries.php";
?>

<?php
$timezone = $GetHome["Rec_Field5"];
print "<div style=\"text-align:center;width:350px;padding:0.5em 0;\">";
		 		print "<h2><span style=\"color:gray;\">Current Local Time</span><br /></h2>";
?>
		 		<iframe src ='https://www.zeitverschiebung.net/clock-widget-iframe?language=en&timezone=<?php echo $timezone; ?>' width="100%" height="130" frameborder="0" seamless></iframe>
<?php print "</div>"; ?>
</head>
</html>