<!--
You have to create the styles: subMenuCats, subMenuCatsSel
-->

<script language="JavaScript" type="text/javascript">
    // Show/Hide DIV MENU
    IE5 = NN4 = NN6 = false
    if (document.all)IE5 = true
    else if (document.layers)NN4 = true
    else if (document.getElementById)NN6 = true

    function init() {
        showdivMenuCats(0, 0)
    }
    function showdivMenuCats(which, numdivs) {
        for (i = 0; i < numdivs; i++) {
            if (NN4) eval("document.divMenuCats" + i + ".display='none'")
            if (IE5) eval("document.all.divMenuCats" + i + ".style.display='none'")
            if (NN6) eval("document.getElementById('divMenuCats" + i + "').style.display='none'")
            eval("document.getElementById('subMenuCatsLink" + i + "').className='subMenuCats'")
        }
        if (NN4) eval("document.divMenuCats" + which + ".display='block'")
        if (IE5) eval("document.all.divMenuCats" + which + ".style.display='block'")
        if (NN6) eval("document.getElementById('divMenuCats" + which + "').style.display='block'")
        eval("document.getElementById('subMenuCatsLink" + which + "').className='subMenuCatsSel'")
    }
</script>

<?php
// Build Sub Menu
$ID = $pView;
$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
$GetRoutePage_Query = q($GetRoutePage_Sel);
$GetRoutePage = f($GetRoutePage_Query);
if ($GetRoutePage["Page_OrderBy"] == "") {
    $orderString = "Order by Page_Order";
} else {
    $orderString = "order by " . $GetRoutePage["Page_OrderBy"] . " " . $GetRoutePage["Page_SortBy"];
}

$GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." $orderString";
$GetPages_Query = q($GetPages_Sel);
$numdivs = nr($GetPages_Query);
$nodivMenuCats = 0;
?>

<div class="left" style="width:160px;">
    <?php while ($GetMenu = f($GetPages_Query)) {
        if ($nodivMenuCats == 0) {
            $subMenuCats = "subMenuCatsSel";
        } else {
            $subMenuCats = "subMenuCats";
        } ?>
        <div class="top10">
            <a href="javascript:showdivMenuCats(<?php echo $nodivMenuCats; ?> + ',' + <?php echo $numdivs; ?>)"
               id="subMenuCatsLink<?php echo $nodivMenuCats; ?>" class="<?php echo $subMenuCats; ?>">
                <?php print $GetMenu["Page_Name"]; ?>
            </a>
        </div>
        <?php
        $nodivMenuCats = $nodivMenuCats + 1;
    } // end of while
    ?>
</div>

<div class="left">
    <?php
    $GetRecsMenu_Sel = "SELECT FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0  $orderString";

    $GetRecsMenu_Query = q($GetRecsMenu_Sel);
    $nodivMenuCats = 0;


    $GetPage_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." $orderString";
    $GetPage_Query = q($GetPage_Sel);
    $nodivMenuCats = 0;

    while ($GetPage = f($GetPage_Query)) {
        $Page_Type = $GetPage['Page_Type'];
        if ($mobileMode == 1) $Page_Type = $GetPage['Page_Type_Mob']; // Mobile Version
        $Page_Rec_Temp = $GetPage['Page_Rec_Temp'];
        if ($mobileMode == 1) $Page_Rec_Temp = $GetPage['Page_Rec_Mob']; // Mobile Version
        $Page_Enable = $GetPage["Page_Enable"];
        $Page_ID = $GetPage['Page_ID'];
        $pView = $GetPage['Page_View'];
        $ID = $pView;
        $Page_List_ID = $GetPage["Page_List_ID"];

		// Page_Lists_Temp
		$Page_Lists_Temp = $GetPage["Page_Lists_Temp"];
		if ($GetPage["Page_Lists_Temp2"] > 0) $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp2"]; else $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp"];

		if ($mobileMode == 1) {
			$Page_Lists_Temp = $GetPage["Page_Lists_Mob"];
			if ($GetAllPages["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $GetPage["Page_Lists_Mob2"]; else $Page_Lists_Temp2 = $GetPage["Page_Lists_Mob"];

		}

        $GetRecs_Sel = "SELECT * FROM pages,records WHERE Page_ID = ".$GetPage["Page_ID"]." AND Rec_Page_ID = ".$GetPage["Page_ID"]." AND Rec_Active = 0 Order by Rec_DateStart Desc";
        $GetRecs_Query = q($GetRecs_Sel);
        ?>

        <div id="divMenuCats<?php echo $nodivMenuCats; ?>" <?php if ($nodivMenuCats == 0) {
            print "style='display:block;'";
        } else {
            print "style='display:none;'";
        } ?>>
            <?php
            $pagepath = $path . "library/method_" . $Page_Type . ".php";
            require "$pagepath";
            ?>
        </div>
        <?php $nodivMenuCats = $nodivMenuCats + 1; ?>
    <?php } // end of while ?>
</div>
<div style="clear:both;"></div>



