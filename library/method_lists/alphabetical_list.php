<?php
require $path . "alphabetical_search_buttons.php"; ?>

<div class="top15">
    <div style="border-left:7px solid #ffe3ce; padding-left:30px;">
        <?php
        $var1 = getparamvalue('var1');
        $var2 = getparamvalue('var2');
        if ($var2 <> "") {
            if ($var2 == "el") {
                $var1 = str_replace($alfavitEN, $alfavitEL, $var1);
                $stringSel = "AND SUBstring(Rec_Title, 1, 1) = '$var1'";
            } else {
                $stringSel = "AND SUBstring(Rec_Title, 1, 1) = '$var1'";
            }
        }

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

        $GetRecsMenu_Sel = "SELECT records.* FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $stringSel UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 $stringSel GROUP BY Rec_ID $orderString";
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

            <div id="divAcc<?php echo $groupRec . $nodivRecAcc; ?>" <?php print "style='display:none;'"; ?>
                 class="accTextBack">
                <div style="padding:10px 15px; background-color:#fdf9fa">
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
</div>