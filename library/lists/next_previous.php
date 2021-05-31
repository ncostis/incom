<div style="width:100%;">
    <?php
    // Create next - previous records
    $numNP = 0;
    $RecsArray = array();
    echo $orderString;
    // To Select είναι ίδιο με αθτό της προηγούμενης σελίδα που φέρνει όλα τα αποτελέσματα
    $GetRecsCat_Sel = "SELECT records.* FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderString";
    $GetRecsCat_Query = q($GetRecsCat_Sel);
    while ($GetRecsCat = f($GetRecsCat_Query)) {
        $arrRec_ID = $GetRecsCat['Rec_ID'];
        $RecsArray[] = "$arrRec_ID";
        if ($arrRec_ID == $Rec_ID) {
            $numNPPoint = $numNP;
        }
        $numNP = $numNP + 1;
    }
    $prevRecID = $RecsArray[$numNPPoint - 1];
    $nextRecID = $RecsArray[$numNPPoint + 1];

    $prevlink = $siteURL . getparamvalue('ID') . "/" . $prevRecID;
    $nextlink = $siteURL . getparamvalue('ID') . "/" . $nextRecID;
    print "<div class='left' style='padding-left:6px;'>";
    if ($prevRecID > 1) {
        print "<a href=\"$prevlink/\"><img src=\"$elements/prev.png\" border=0></a>";
    } else {
        print "<img src=\"$elements/prevDis.png\" border=0>";
    }
    print "</div>";
    print "<div class='right' style='padding-right:6px;'>";
    if ($nextRecID > 1) {
        print "<a href=\"$nextlink/\"><img src=\"$elements/next.png\" border=0></a>";
    } else {
        print "<img src=\"$elements/nextDis.png\" border=0>";
    }
    print "</div>";
    print "<br style='clear:both;'>";
    ?>
</div>