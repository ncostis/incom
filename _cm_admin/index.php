<?php
session_start();
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
ini_set("display_errors", 1);

require_once "init.php";
require_once $routes["initvars.php"];
require_once $routes["settingsvars.php"];

// timestamp
$gmt = $GetVar['Rec_Field20'] * 60 * 60;
$timestamp = time() + $gmt;
if (!isset($_POST['show_field'])) $_POST['show_field'] = 'Rec_Title';
if (!isset($_POST['sort_field'])) $_POST['sort_field'] = 'Rec_DateStart';
if (!isset($_POST['sort_method'])) $_POST['sort_method'] = 'Desc';
?>

<!DOCTYPE HTML>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <?php require_once $routes["head_script.php"]; ?>
   <link href="<?php echo $rootPath; ?>css/layout.css" rel="stylesheet" type="text/css">
    <meta name="copyright" content="Copyright © Overron LTD, All rights reserved.">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script type="text/javascript" src="js/sortable_drag_and_drop.js"></script>
    <script src="js/incom_ipsum.min.js"></script>
    <?php require $routes["javascripts.php"]; ?>

</head>

<body class="bgMedium">
    <!-- ΕΜΦΑΝΙΣΗ ΣΕΛΙΔΑΣ -->
    <?php require $routes["top.php"]; ?>
    <div class="container">
        <div class="contentLeft">
            <?php require $routes["frame.php"]; ?>
        </div>
        <div class="mainContent bgContent <?php if($_GET["ID"]=='record_edit' || $_GET["ID"]=='record_Cat_edit') echo 'mainContentRecord'?>">
            <div class="contentArea">
                <!--	main	-->
                <?php
                if (isset($_GET["ID"]) && $_GET["ID"] <> '') {
                    require $routes[$_GET["ID"].".php"];
                } else {
                    require $routes["main.php"];
                }
                ?>
                <div class="top30"></div>
            </div>
        </div>
        <div class="contentRight">
            <?php require $routes["right.php"]; ?>
        </div>
        <div style="clear:both;"></div>
    </div>
<?php
print "<div class=\"top40\"></div>";
print "<div class=\"top40\"></div>";
require $routes["footer.php"];
?>

</body>
</html>
