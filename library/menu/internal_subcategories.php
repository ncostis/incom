<?php
$HeadCat_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $headerPageID Order by Page_Order Asc";
$HeadCat_Query = q($HeadCat_Sel);
print"<div class=\"galleryTitle center\">$moreRooms</div>";
print"<div class=\"\">";

	while ($HeadCat = f($HeadCat_Query)) {
		//print "<div class=\"FacTitle\" style=\"padding:30px 0px;\" >$HeadCat[Page_Name]</div>";
					print "<div style=\"margin:auto; display:table;margin-bottom:15px;\" align=\"center\">";
					$GetSubCats_Sel = "SELECT * FROM pages WHERE Page_ID = $HeadCat[Page_ID] Order by Page_Order Asc";
					$GetSubCats_Query = q($GetSubCats_Sel);
						$numISC = 0;
						while ($GetSubCats = f($GetSubCats_Query)) {
							$numISC = $numISC + 1;
							$IDPathTM = $GetSubCats['Page_View'];
							if ($_GET['ID'] == $IDPathTM) { $roverIntSubMenu = "intSubMenuSel"; } else { $roverIntSubMenu = "intSubMenu";  }
							if ($numISC == 1) $leftInSC = "left"; else $leftInSC = "left25";
                     if($mobileMode <> 1){
								print "<a href=\"$siteURL$IDPathTM/\" class=\"$roverIntSubMenu\">$GetSubCats[Page_Name] </a>";}
							else {
                        print "<div style=\"width:100%;margin:10px auto;display:table;\"><a href=\"$siteURL$IDPathTM/\" class=\"$roverIntSubMenu\">$GetSubCats[Page_Name] </a></div>";}

						}				
					print"</div>";
	} // while
print"</div>";
?>