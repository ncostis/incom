<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// Open the submenu on click and KEEP the previous OPEN
global $pIDArray;
rootmenu($Page_ID); //print $IDpath
$numitems = count($pIDArray);

$GetMenu_Sel = "SELECT * FROM pages WHERE Page_GenVar2 = 'sitemap' AND Parent_Page_ID = 0 AND Page_Show_Bottom = 1 AND Page_Lang = '$Lang' order by Page_Order Asc";
$GetMenu_Query = q($GetMenu_Sel);

print "<table style='width:100%;' border=0>";

while ($GetMenu = f($GetMenu_Query)) {
    $pID = $GetMenu["Page_ID"];

    $IDPath = $GetMenu['Page_View'];
    $rover = "linksmenu";
    print "<tr>";
    print "<td>";
    if ($IDPath <> "") { // if Page_View has content
        // check if there are parent pages. If so print submenu.
        $GetParents_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $pID";
        $GetParents_Query = q($GetParents_Sel);
        if (nr($GetParents_Query) > 0) { // if there are subcategories AND method list is default then print subcategories
            print "<br><table style='width:100%;'><tr><td>";
            print "<a href=\"$siteURL$IDPath/\" class=$rover><strong>".$GetMenu["Page_Name"]."</strong></a>";
            print "</td></tr></table>";
            //print "<strong><span class='sitemap'>$GetMenu[Page_Name]</span></strong></td></tr></table>";
            $CurPageView = $PageResults["Page_View"];

            print "<div style='padding-top:5px;'>";
            buildsitemap($pID, 0, "", $CurPageView);
            print "</div>";
        } else { // else if Page_View="" link directly
            print "<br><table style='width:100%;'><tr><td>";
            print "<a href=\"$siteURL$IDPath/\" class=$rover><strong>".$GetMenu["Page_Name"]."</strong></a>";
            print "</td></tr></table>";
        }
    } else {
        print "<a href=\"$GetMenu[Page_Html]/\" target='_blank' class='linksmenu'><strong>".$GetMenu["Page_Name"]."</strong></a><br>";
    }

    print "</td></tr>";
    ?>
    <?php
} //end while
print "</table>";


Function buildsitemap($Pid, $spaces, $symbol, $CurPageView)
{
    global $IDpath, $GetAccessMember, $siteURL;
    $GetMenuItem = "SELECT * FROM pages WHERE Parent_Page_ID = $Pid  AND Page_Show_Bottom = 1 order by Page_Order";
    $GetMenuItem_Query = q($GetMenuItem);
    $spaces = $spaces + 20;
    $padspaces = $spaces . "px";

    While ($GetMenuItem = f($GetMenuItem_Query)) {
        $Pid = $GetMenuItem['Page_ID'];

        $PageView = $GetMenuItem['Page_View'];
        if ($PageView <> "") {
            print "<div style='display:block; padding-left:$padspaces;'>";
            if($GetMenuItem['Page_GenVar']!="no_sitemap_url")
            	print "<a href=\"".$siteURL.$GetMenuItem["Page_View"]."/\" class=bodylinks>".$GetMenuItem["Page_Name"]."</a>";
            else print $GetMenuItem["Page_Name"];
            print "</div>";
        } else {
            $typefile = substr($GetMenuItem["Page_Html"], 0, 4); // Checks if external link is javascript or http url
            if ($typefile == "http") {
                print "<div style='display:block; padding-left:$padspaces;'><span class=menusymbols>$symbol</span> <a href=\"".$GetMenuItem["Page_Html"]."/\" target='_blank' class=sublinksmenu>$GetMenuItem[Page_Name]</a></div>";
            } else {
                print "<div style='display:block; padding-left:$padspaces;'><span class=menusymbols>$symbol</span> <a href=\"".$GetMenuItem["Page_Html"]."/\" class=sublinksmenu>$GetMenuItem[Page_Name]</a></div>";
            }
        }
        buildsitemap($Pid, $spaces, "&#8226;&nbsp;", $CurPageView);
    }
}

?>