<script type="text/javascript">
    $(document).ready(function () {
        $("a#register").fancybox({
            'overlayShow': false,
            'titleShow': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });
    });
</script>

<div style="padding-bottom:20px;">
    <?php
    $step = $initStep;
    //require $path."library/basic/category_name.php";

    if (isset($_SESSION['user']['Customer_ID'])) {

        print "<div class='left'>$welcomeuser: " . $_SESSION['user']['Name'] . "</div>";
        ?>
        <div class="left15">
            [&nbsp;<a href="<?php echo $path; ?>library/register/logout.php"
                      class="bodylinks"><?php echo $logout; ?></a>&nbsp;&nbsp;/&nbsp;&nbsp;
            <a id="register"
               href="<?php echo $siteURL; ?>library/register/popup.php?Page=edit_profile_popup.php&Lang=<?php echo $Lang; ?>&w=820&h=420"
               class="bodylinks"><?php echo $editprofile; ?></a>&nbsp;]
        </div>
        <div style="clear:both;"></div>
    <?php

    $cp = $cp . "px";
    if ($PageResults["Page_OrderBy"] == "") {
        $orderString = "Order by Rec_DateStart Desc";
    } else {
        $orderString = "order by " . $PageResults["Page_OrderBy"] . " " . $PageResults["Page_SortBy"];
    }

    // Counts numbers of records per page and finds the number of records. Then creates paging according to that number
    $GetAll_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 $orderString";
    $GetAll_Query = q($GetAll_Sel);
    // variables $step & $ntd is defined by setting vars
    $numpages = (nr($GetAll_Query) / $step);

    $intnumpages = (int)$numpages;
    if ($intnumpages < $numpages) {
        $intnumpages = $intnumpages + 1;
    }
    if ($numpages > $intnumpages) {
        $numpages = $intnumpages + 1;
    } else {
        $numpages = $intnumpages;
    }
    $numpages = $numpages - 1; // Because $pages starts from 0,  the forth page is basically $page=3, so this is to fix that issue.

    // if by choosing category it should appear only 1st record then directly on page Limit 0,1
    $page = getparamvalue('var1');
    if ($page == "") {
        $page = 1;
    }
    $start = ($page * $step) - $step; // Fix the issue that variable  $start starts from 1st page meaning 0


    // GET ALL RECORDS FROM CATEGORY
    $GetPages_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0  AND Rec_Active = 0 $orderString Limit $start,$step";
    $GetPages_Query = q($GetPages_Sel);

    if ($ShowTopRes == 1) {
        print "<div style='padding-bottom:12px;'>$selida $page $apo $intnumpages</div>";
    }
    print "<div>";
    $num = 0;
    while ($GetRec = f($GetPages_Query)) {
        $num = $num + 1;

        $Rec_ID = $GetRec['Rec_ID'];
        $RecView = $GetRec['Rec_View'];
        $recImCat = $GetRec['Rec_Img_Cat_ID'];
        $numphotosH = $GetRec['Num_HPhotos'];
        $recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
        if (($numphotosH == "") OR ($numphotosH == 0)) $numphotosH = 100;
        $startat = $GetRec['StartAt_Photos'];
        $repeatrow = $GetRec['RepeatRow_Photos'];
        $ednum = 1; // editor number
        if ($num == 1) {
            $left = "left";
        } else {
            $left = "left30";
        }

        print "<div class='$left top30'>";
        if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
        if ($mobileMode == '1') { // Mobile Version
            if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
        }
        $pagename = $path . "views/lists_page.php";
        require "$pagename";

        print "</div>";
        if ($num == $ntd) {
            $num = 0;
            print "<div style='clear:both;'></div>";
        }
    } // end of while

    if ($num <> $ntd) print "<div style='clear:both;'></div>";
    print"</div>";

    /*** SHOW DOWDN PANEL ***/
    if (($DownNavig == 1) AND ($numpages >= 1)) {
        require $path . "library/method_lists/down_search_results.php";
    }

    ?>
    <?php } else { ?>

        <script language="JavaScript">
            window.location = "<?php echo $rootURL; ?>login_<?php echo $Lang; ?>";
        </script>

    <?php } ?>
</div>