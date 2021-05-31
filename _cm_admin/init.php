<?php
$curFolder = basename(dirname($_SERVER["PHP_SELF"]));
if ($curFolder == "_cm_admin") $rootPath = ""; else $rootPath = "../";
include "admin_routes.php";

require_once($routes["active_mysql.php"]);

// SETTINGS - CODE VARIABLES
$GetVar = f(q("SELECT * FROM pages, records WHERE Page_ID = Rec_page_ID AND Parent_Page_ID = 0 AND Rec_Page_Content = 0 AND Page_Section = 'settings' Order by Page_Order Asc Limit 0,1"));
$rootURL = "/" . $GetVar['Rec_Title'];

require_once($routes["UserAuth.php"]);
if (!Auth::isAdmin()) {
    header("Location: login.php");
    exit;
}
require_once($routes["functions.php"]);
require_once($routes["langCMS_en.php"]);
$Lang = $_SESSION['AdminLang'];