<?php
// to activate tabs, ID should be always from header category, so then Page_ID of each category is considered as $_GET['var1']
$curID = getparamvalue('var1');

$ID = $pView;
$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
$GetRoutePage_Query = q($GetRoutePage_Sel);
$GetRoutePage = f($GetRoutePage_Query);
if ($GetRoutePage["Page_OrderBy"] == "") {
    $orderString = "Order by Page_Order";
} else {
    $orderString = "order by " . $GetRoutePage["Page_OrderBy"] . " " . $GetRoutePage["Page_SortBy"];
}

$GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." AND Page_Active = 1 $orderString";
$GetPages_Query = q($GetPages_Sel);
$nodivMenu = 0;
?>
<div style="width:<?php echo $GetVar['Rec_Field19']; ?>; margin:0 auto;">
    <?php while ($GetMenu = f($GetPages_Query)) {
        if ($GetMenu['Page_View'] == $curID) {
            $tabButton = "tabButtonSel";
        } else {
            $tabButton = "tabButton";
        }
        if (($nodivMenu == 0) AND ($curID == "")) {
            $tabButton = "tabButtonSel";
        }
        if ($nodivMenu == 0) {
            $left = "left";
        } else {
            $left = "left5";
        }
        ?>
        <div class="<?php echo $left; ?>"><a
                href="<?php echo "$siteURL" . getparamvalue('ID') . "/0/" . $GetMenu['Page_View']; ?>"
                class="<?php echo $tabButton; ?>"><?php echo $GetMenu['Page_Name']; ?></a></div>
        <?php $nodivMenu = $nodivMenu + 1;
    } // end of while ?>
    <div style="clear:both;"></div>
</div>

<div style="padding-top:20px;">
    <?php // SHOW RECORDS FROM PAGES
    if ($curID <> "") {
        $GetPage_Sel = "SELECT * FROM pages WHERE Page_View = '$curID'";
    } else {
        $GetPage_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." $orderString LIMIT 0,1";
    }
    $GetPage_Query = q($GetPage_Sel);
    $nodivTab = 0;

    while ($GetPage = f($GetPage_Query)) {
        $Page_Type = $GetPage['Page_Type'];
        if ($mobileMode == 1) $Page_Type = $GetPage['Page_Type_Mob']; // Mobile Version
        $Page_Rec_Temp = $GetPage['Page_Rec_Temp'];
        if ($mobileMode == 1) $Page_Rec_Temp = $GetPage['Page_Rec_Mob']; // Mobile Version
        $Page_Enable = $GetPage["Page_Enable"];
        $Page_ID = $GetPage['Page_ID'];
        $pView = $GetPage['Page_View'];
        $ID = $pView;

		// Page_Lists_Temp
		$Page_Lists_Temp = $GetPage["Page_Lists_Temp"];
		if ($GetPage["Page_Lists_Temp2"] > 0) $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp2"]; else $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp"];

		if ($mobileMode == 1) {
			$Page_Lists_Temp = $GetPage["Page_Lists_Mob"];
			if ($GetAllPages["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $GetPage["Page_Lists_Mob2"]; else $Page_Lists_Temp2 = $GetPage["Page_Lists_Mob"];

		}

        if ($GetPage["Page_OrderBy"] == "") {
            $orderString = "Order by Rec_DateStart Desc, Rec_Order";
        } else {
            $orderString = "order by " . $GetPage["Page_OrderBy"] . " " . $GetPage["Page_SortBy"];
        }

        $GetRecs_Sel = "SELECT records.* FROM pages, records WHERE Page_ID = ".$GetPage["Page_ID"]." AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderString";
        $GetRecs_Query = q($GetRecs_Sel);
        ?>
        <div style="display:block;">
            <?php
            $pagepath = $path . "library/method_" . $Page_Type . ".php";
            require "$pagepath"; // display page type
            ?>
        </div>
        <?php
        $nodivTab = $nodivTab + 1;
    } // end of while ?>
</div>