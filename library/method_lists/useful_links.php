<?php
if ($ModPageID <> "") $Page_ID = $ModPageID;

$GetLink_Sel = "SELECT * FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Page_Lang = '$Lang' AND Rec_Page_Content <> '1'";
$GetLink_Query = q($GetLink_Sel);

while ($GetLink = f($GetLink_Query)) {
    print "<div class=\"grid33\"><a href=\"".$GetLink["Rec_Field1"]."/\" target='_blank' class='suglinks'>".$GetLink["Rec_Title"]."</a>
				<br><span class='sugdesc'>".$GetLink["Rec_Desc"]."</span></div>";
}
print "<div style=\"clear:both;\"></div>";

include $path . "links/links.php";
?>