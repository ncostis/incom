<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <?php
    $path = "";
    $Lang = "en";
    require $path . "library/init.php";

    if (getparamvalue('ID') == "") {
        // GET ID from 1st Category
        $GetHomeID_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = 0 AND Page_Section = 'general' AND Page_Lang = '$Lang' Order by Page_Order Asc Limit 0,1";
        $GetHomeID_Query = q($GetHomeID_Sel);
        $GetHomeID = f($GetHomeID_Query);
        $ID = $GetHomeID['Page_View'];
    } else {
        $ID = getparamvalue('ID');
    }

    ?>

    <?php
    // INITIAL SETTINGS
    $Page_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
    $qPageResults = q($Page_Sel);
    $PageResults = f($qPageResults);
    $Page_ID = $PageResults["Page_ID"];
    $pView = $PageResults["Page_View"];
    $Parent_Page_ID = $PageResults["Parent_Page_ID"];
    $Page_Type = $PageResults["Page_Type"];
    $Page_GenVar = $PageResults["Page_GenVar"];
    $Page_Rec_Temp = $PageResults["Page_Rec_Temp"];
    $Page_HeadLists_Temp = $PageResults["Page_HeadLists_Temp"];
    $Page_Lists_Temp = $PageResults["Page_Lists_Temp"];
    $Page_Rec_Temp = $PageResults["Page_Rec_Temp"];
    $Page_List_ID = $PageResults["Page_List_ID"];
    $Page_Section = $PageResults["Page_Section"];
    $Page_Header_Flag = $PageResults["Page_Header_Flag"];
    $op = $PageResults["Page_ImgOP"];  // Open Page Style of Images
    if (($Page_Header_Flag == 1) OR ($Parent_Page_ID == 0)) {
        $pageHeader = pageHeader($Page_ID);
        $headerPageID = $Page_ID;
    } else {
        $headerPageID = headerPageID($Page_ID);
        $pageHeader = pageHeader($headerPageID);
    }

    $Settings_Sel = "SELECT * FROM pages WHERE Page_ID = $headerPageID";
    $Settings_Query = q($Settings_Sel);
    $GetSettings = f($Settings_Query);
    $LayoutID = $GetSettings['Page_Temp_ID'];
    $SetPageID = $GetSettings['Page_ID'];
    $Page_Style_ID = $GetSettings['Page_Style_ID'];

    require $path . "_cm_admin/settingsvars.php";

    require $path . "_cm_admin/settingsvars.php";
    require $path . "library/queries.php";


    if ($ID == "") {
        print "<TITLE>".$GetHome["Page_Meta_Title"]."</TITLE>";
        print "<META name='description' content='".$GetHome["Page_Meta_Desc"]."'>";
    } else {
        print "<TITLE>".$PageResults["Page_Meta_Title"]."</TITLE>";
        print "<META name='description' content='".$PageResults["Page_Meta_Desc"]."'>";
    }
    ?>

    <META name="keywords" content="">
    <meta HTTP-EQUIV="Expires" CONTENT="0">
    <meta name="generator" content="Overron">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="all">
    <meta name="classification" content="">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="copyright" content="Copyright © Overron, All rights reserved - by INCOM CMS">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <?php // Decrack start
    $available_page_views = array();
    $check_ID_query = "SELECT Page_View FROM pages";
    $check_ID = q($check_ID_query);
    while ($Check_For_ID = f($check_ID))
        $available_page_views[] .= $Check_For_ID['Page_View'];

    $ID = getparamvalue('ID');
    if (!in_array($ID, $available_page_views))
        unset ($_GET['ID']);
    $Rec_ID = getparamvalue("Rec_ID");
    if (!is_numeric($Rec_ID))
        unset ($_GET["Rec_ID"]);
    //Decrack end
    ?>

    <?php require $path . "views/build_styles.php"; ?>

    <!-- FADE BULLETS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="<?php echo $rootURL; ?>js/fade_bullets/js/slides.min.jquery.js"></script>

    <!-- FANCYBOX -->
    <script type="text/javascript"
            src="<?php echo $rootURL; ?>js/fancybox/elements/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript"
            src="<?php echo $rootURL; ?>js/fancybox/elements/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $rootURL; ?>js/fancybox/elements/jquery.fancybox-1.3.4.css"
          media="screen"/>

    <!-- FONTS Replace-->
    <!--<script type="text/javascript" src="<?php echo $rootURL; ?>js/fonts/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo $rootURL; ?>js/fonts/pfdavinciscript-normal_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h1', { fontFamily: 'pfdavinciscript-normal', hover: true});
	Cufon.replace('.bookTitle', { fontFamily: 'PFTransport-regular', hover: true});
</script>
<script type="text/javascript"> //Cufon.now(); </script>
-->

    <script type="text/javascript" src="<?php echo $rootURL; ?>js/swfobject.js"></script>
    <!--[if gte IE 5.5]>
    <script language="JavaScript" src="js/nav-h.js" type="text/JavaScript"></script>
    <![endif]-->
    <?php require $path . "js/javascripts.php"; ?>
</head>

<body>
<!-- DISPLAY PAGE -->
<div id="container">
    <?php
    $BLR_Temp_ID = 10;
    require $path . "views/build_layout.php"; ?>
</div>


