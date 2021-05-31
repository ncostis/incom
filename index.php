<?php
require_once $path."library/mobile.php";
require_once("_cm_admin/routes.php");
include_once $routes["UserAuth.php"];

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
// error_reporting(E_ALL);

$enable_cache = 0;
if ($enable_cache == 1) require "topcache.php"; else session_start();
$path = "";
require_once $path."library/init.php";
$siteURL = $rootURL;
require_once $path."library/header.php";
?>
<!DOCTYPE HTML>
<html lang="<?php echo $Lang; ?>" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
  require_once $path."library/init_queries.php";
  if(getparamvalue('ID') == ""){if ($GetOptRec['Rec_Desc'] == ""){ require $path . "css/head_font_script.php";}}else{require $path . "css/head_font_script.php";}
?>
<meta name="robots" content="<?php echo $metaCont; ?>"/>
<?php
  require_once $path."library/basic/translations.php";
  require_once $path."views/build_styles.php";
  if(getparamvalue('ID') == ""){if ($GetOptRec['Rec_Desc'] == ""){ require $path . "js/javascripts.php";}else{ if ($GetOptRec['Rec_Check4'] == '1'){
  print"<script type=\"text/javascript\" src=\"//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js\"></script>\n";}}}else{ if ($GetOptRec['Rec_Check4'] == '1'){
  print"<script type=\"text/javascript\" src=\"//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js\"></script>\n";} require $path . "js/javascripts.php";}
?>
</head>
<?php flush(); ?>
<body>
<?php if (Auth::isAdmin() && $_GET['le']=="1") include $routes["live_edit_core.php"];?>
<?php
if(getparamvalue('ID') == ""){if ($GetOptRec['Rec_Desc'] == ""){ require $path . "js/js_bodyopen.php";} }else{require $path . "js/js_bodyopen.php";}
if ((getparamvalue('ID') == "")) {
  require_once $path."library/popup.php";
}
print"<div id=\"container\">\n<div id=\"mainContainer\">";
require_once $path."views/build_layout.php";
print"</div>\n</div>\n";
// require $path."library/objects/stats.php"; ?>
<?php
	if ($GetOptRec['Rec_Desc'] <> "" && getparamvalue('ID') == ""){
		require_once $path . "css/css_bodyclose.php";
		require_once $path . "css/head_font_script.php";
		require_once $path . "js/javascripts.php";
		require_once $path . "js/js_bodyopen.php";
	}

require $path . "js/js_bodyclose.php";
?>
</body>
</html>
<?php if ($enable_cache == 1) require_once $path."library/bottomcache.php"; ?>