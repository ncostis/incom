<?php

        // Top Links

        $GetTopMenu_Sel = "SELECT * FROM pages WHERE Page_Section = 'general' AND Page_Show_TopLinks = 1 AND Page_Active = 1 AND Page_Lang = '$Lang' order by Page_Order";

        $GetTopMenu_Query = q($GetTopMenu_Sel);

        $tmnum = 0;
        while ($GetTopMenu = f($GetTopMenu_Query)) {

            $tmnum = $tmnum + 1;

            $IDPathTM = $GetTopMenu['Page_View'];

            if ($tmnum == 1) $leftTM = "left"; else $leftTM = "left25Top";

            if (getparamvalue('ID') == $IDPathTM) {
                $rovertopmenu = "rootMenu rootMenuSel";
            } else {
                $rovertopmenu = "rootMenu";
            }

            if ($GetTopMenu['Page_Name_Print'] <> "") {
                $name = $GetTopMenu['Page_Name_Print'];
            } else {
                $name = $GetTopMenu['Page_Name'];
            }


            //print "<div class=\"$leftTM\">";

            if ($IDPathTM <> "") {

                if (strpos($IDPathTM, '#') !== false) $slash = ""; else $slash = "/";

                print "<a href=\"$siteURL$IDPathTM$slash\" class=\"$rovertopmenu\">$name</a>";

            } else {

                $htmltop = substr($GetTopMenu['Page_Html'], 0, 4);

                if ($htmltop == "http") {

                    print "<a href=\"".$GetTopMenu["Page_Html"]."/\" target='_blank' class='$rovertopmenu'>$name</a>";

                } else {

                    print "<a href=\"$siteURL".$GetTopMenu["Page_Html"]."\" class='$rovertopmenu'>$name</a>";

                }

            }

            //print "</div>";

            //if ($tmnum < nr($GetTopMenu_Query)) {
                //print"<div class=\"left25Top\"> | </div>";
            //}

        } // while

        print "<div style=\"clear:both;\"></div>";

        ?>
    <div style="clear:both;"></div>