<?php

print "<div class=\"internalTitle\">All Rooms & Suites</div>";
print "<div class=\"top20\"></div>";
	$GetSubCats_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $Parent_Page_ID Order by Page_Order Asc";
	$GetSubCats_Query = q($GetSubCats_Sel);

	while ($GetSubCats = f($GetSubCats_Query)) {
		$numISC ++;
		$IDPathTM = $GetSubCats['Page_View'];
		if ($numISC == 1) $leftInSC = "left"; else $leftInSC = "left25";
                if ($mobileMode == 1){ $leftInSC = "";}
			if ($_GET['ID'] == $IDPathTM) { $roverIntSubMenu = "intSubMenu intSubMenuSel"; } else { $roverIntSubMenu = "intSubMenu";  }

			print "<div class=\"$leftInSC\">";
					print "<a href=\"$siteURL$IDPathTM/\" class=\"$roverIntSubMenu\">".$GetSubCats["Page_Name"]."</a>";
			print "</div>";
	} // while
	print "<div style=\"clear:both;\"></div>";
?>