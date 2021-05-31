<!--
You have to create the styles: divMenuRecs, divMenuRecsSel
-->

<script language="JavaScript" type="text/javascript">
    // Show/Hide DIV MENU
    IE5 = NN4 = NN6 = false
    if (document.all)IE5 = true
    else if (document.layers)NN4 = true
    else if (document.getElementById)NN6 = true

    function init() {
        showdivMenuRecs(0, 0)
    }
    function showdivMenuRecs(which, numdivs) {
        for (i = 0; i < numdivs; i++) {
            if (NN4) eval("document.divMenuRecs" + i + ".display='none'")
            if (IE5) eval("document.all.divMenuRecs" + i + ".style.display='none'")
            if (NN6) eval("document.getElementById('divMenuRecs" + i + "').style.display='none'")
            eval("document.getElementById('subMenuRecsLink" + i + "').className='subMenuRecs'")
        }
        if (NN4) eval("document.divMenuRecs" + which + ".display='block'")
        if (IE5) eval("document.all.divMenuRecs" + which + ".style.display='block'")
        if (NN6) eval("document.getElementById('divMenuRecs" + which + "').style.display='block'")
        eval("document.getElementById('subMenuRecsLink" + which + "').className='subMenuRecsSel'")
    }
</script>

<?php
// Build Sub Menu
$ID = $pView;
$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
$GetRoutePage_Query = q($GetRoutePage_Sel);
$GetRoutePage = f($GetRoutePage_Query);
$Page_ID = $GetRoutePage['Page_ID'];
if ($GetRoutePage["Page_OrderBy"] == "") {
    $orderString = "Order by Rec_DateStart Desc";
} else {
    $orderString = "order by " . $GetRoutePage["Page_OrderBy"] . " " . $GetRoutePage["Page_SortBy"];
}

$GetRecsMenu_Sel = "SELECT records.* FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderString";

$GetRecsMenu_Query = q($GetRecsMenu_Sel);
$numdivs = nr($GetRecsMenu_Query);
$nodivMenuRecs = 0;
?>

<div class="left" style="width:160px;">
    <?php while ($GetMenu = f($GetRecsMenu_Query)) {
        if ($nodivMenuRecs == 0) {
            $subMenuRecs = "subMenuRecsSel";
        } else {
            $subMenuRecs = "subMenuRecs";
        } ?>
        <div class="top10">
            <a href="javascript:showdivMenuRecs(<?php echo $nodivMenuRecs; ?> + ',' + <?php echo $numdivs; ?>)"
               id="subMenuRecsLink<?php echo $nodivMenuRecs; ?>" class="<?php echo $subMenuRecs; ?>">
                <?php print $GetMenu["Rec_Title"]; ?>
            </a>
        </div>
        <?php
        $nodivMenuRecs = $nodivMenuRecs + 1;
    } // end of while
    ?>
</div>

<div class="left">
    <?php
    $GetRecs_Sel = "SELECT records.* FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderString";
    $GetRecs_Query = q($GetRecs_Sel);
    $nodivMenuRecs = 0;

    // SHOW RECORD
    while ($GetRec = f($GetRecs_Query)) {

        $Rec_ID = $GetRec['Rec_ID'];
        $RecView = $GetRec['Rec_View'];
        $Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
        if ($mobileMode == 1) $Page_Rec_Temp = $GetRec['Page_Rec_Mob']; // If Mobile Version
        if ($Page_Rec_Temp == "") {
            $Page_Rec_Temp = "pg/page";
        }
        $recImCat = $GetRec['Rec_Img_Cat_ID'];
        $numphotosH = $GetRec['Num_HPhotos'];
        $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
        if (($numphotosH == "") OR ($numphotosH == 0)) $numphotosH = 100;
        $startat = $GetRec['StartAt_Photos'];
        $repeatrow = $GetRec['RepeatRow_Photos'];
        $ednum = 1; // editor number
        ?>

        <div id="divMenuRecs<?php echo $nodivMenuRecs; ?>" <?php if ($nodivMenuRecs == 0) {
            print "style='display:block;'";
        } else {
            print "style='display:none;'";
        } ?>>
            <?php
            // if record has a default display then choose display from category
            if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
            if ($mobileMode == '1') { // Mobile Version
                if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
            }
            $pagename = $path . "views/page.php";
            require "$pagename";
            ?>
        </div>
        <?php $nodivMenuRecs = $nodivMenuRecs + 1;
    } // end of while ?>
</div>
<div style="clear:both;"></div>