<script language="JavaScript" type="text/javascript">
    // Show/Hide Accordition DIV
    IE5 = NN4 = NN6 = false
    if (document.all)IE5 = true
    else if (document.layers)NN4 = true
    else if (document.getElementById)NN6 = true
    function init() {
        showDivAcc(0, 0, 0)
    }
    function showDivAcc(which, numdivs, letter) {
        whichid = letter + which;
        for (i = 0; i < numdivs; i++) {
            unid = letter + i;
            if (NN4) eval("document.divAcc" + unid + ".display='none'")
            if (IE5) eval("document.all.divAcc" + unid + ".style.display='none'")
            if (NN6) eval("document.getElementById('divAcc" + unid + "').style.display='none'")
            eval("document.getElementById('accLink" + unid + "').className='accordMenu'")
        }
        if (NN4) eval("document.divAcc" + whichid + ".display='block'")
        if (IE5) eval("document.all.divAcc" + whichid + ".style.display='block'")
        if (NN6) eval("document.getElementById('divAcc" + whichid + "').style.display='block'")
        eval("document.getElementById('accLink" + whichid + "').className='accordMenuSel'")
    }
</script>


<div class="tophead">
    <div>

        <div class="width980 top20">
            <?php

            require $path . "library/basic/category_name.php";
            $PaddingAcc = "padding-left:10px;";
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
            $nodivAcc = 0;
            $nodivRecAcc = 0;
            $groupRecLetters = "KLMNOP";
            $groupRec = substr($groupRecLetters, $groupRecNum, 1);
            $groupRecNum = $groupRecNum + 1;

            while ($GetMenu = f($GetRecsMenu_Query)) { ?>
                <div style="padding-bottom:0px;">
                    <?php $num = ""; ?>
                    <a href="javascript:showDivAcc(<?php echo $nodivAcc; ?> + ',' + <?php echo $numdivs; ?>,'<?php echo $groupRec; ?>')"
                       id="accLink<?php echo $groupRec . $nodivAcc; ?>" class="accordMenu">
                        <span style="<?php echo $PaddingAcc; ?>"><?php print $num.$GetMenu["Rec_Title"]; ?></span></a>
                </div>
                <?php $Rec_ID = $GetMenu['Rec_ID'];

                // SHOW RECORD
                $GetRecs_Sel = "SELECT * FROM pages, records WHERE Rec_ID = $Rec_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $orderString";
                $GetRecs_Query = q($GetRecs_Sel);
                $GetRec = f($GetRecs_Query);

                $RecView = $GetRec['Rec_View'];
                $Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
                if ($mobileMode == 1) $Page_Rec_Temp = $PageResults['Page_Rec_Mob']; // Mobile Version
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

                <div id="divAcc<?php echo $groupRec . $nodivRecAcc; ?>" <?php if ($nodivRecAcc == 0) {
                    print "style='display:block;'";
                } else {
                    print "style='display:none;'";
                } ?> class="accTextBack">
                    <div style="padding-top:12px; padding-bottom:12px; padding-left:10px; padding-right:10px;">
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
                </div>
                <?php $nodivAcc = $nodivAcc + 1;
                $nodivRecAcc = $nodivRecAcc + 1;

            } // end of while ?>

        </div>