<?php
$SiteQuick_Sel = "SELECT * FROM pages WHERE Page_Section = 'general' AND Parent_Page_ID = 0 AND Page_Show_Bottom = '1' AND Page_Active = '1'  AND Page_Lang = '$Lang' order by Page_Order Asc";
$SiteQuick_Query = q($SiteQuick_Sel);
$numLinks = nr($SiteQuick_Query);

$numLink = 0;
while ($SiteQuick = f($SiteQuick_Query)) {
	$numLink = $numLink + 1;
	$pID = $SiteQuick["Page_ID"];
	$IDPath = $SiteQuick['Page_View'];
	if($SiteQuick["Page_Name_Print"] <> '') { $name = $SiteQuick["Page_Name"]; } else { $name = $SiteQuick["Page_Name"]; }

	//$SiteSubMenu_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $pID  AND Page_Show_Bottom = '1' AND Page_Active = '1' AND Page_Lang = '$Lang' order by Page_Order Asc";
	//$SiteSubMenu_Query = q($SiteSubMenu_Sel);

	//print"<div class=\"top5 left\">";
		if ($IDPath <> ""){
		//	if ((nr($SiteSubMenu_Query) > 0)  AND ($SiteQuick['Page_Show_SubMenu'] == 1)) {
		//		print "<span class=sitemapcat>$name</span>";
		//			while ($SiteSubMenu = f($SiteSubMenu_Query)) {
		//				$subpID = $SiteSubMenu["Page_ID"];
		//				$subIDPath = $SiteSubMenu['Page_View'];
		//				if($SiteSubMenu["Page_Name_Print"] <> '') { $subname = $SiteSubMenu["Page_Name_Print"]; } else { $subname = $SiteSubMenu["Page_Name"]; }
		//					print"<div class=\"top5\" style=\"padding-left:15px;\">";
		//						if ($subIDPath <> ""){
		//							print "<a href=\"".$siteURL."$subIDPath\" class=footerSublinks>$subname</a>";
		//						}	else {
		//							$htmlsubstring =  substr($SiteSubMenu['Page_Html'],0,4);
		//							if ($htmlsubstring == "http") {
		//								print "<a href=\"".$SiteSubMenu["Page_Html"]."\" target='_blank' class='footerSublinks'>$subname</a>";
		//							} else {
		//								print "<a href=\"".$siteURL.$SiteSubMenu["Page_Html"]."\" class='footerSublinks'>$subname</a>";
		//							}
		//						}
		//					print"</div>";
		//			} // end while submenu
		//		} else {
		//			print "<a href=\"".$siteURL."$IDPath\" class=footerSitemap>$name</a>";
		//		}
			if (strpos($IDPath, '#') !== false) $slash = ""; else $slash = "/";
			print "<a href=\"$siteURL$IDPath$slash\" class=\"footerSitemap\"><span class=\"footerSitemapSpan\">$name</span></a>";
		} else {
			$htmlstring =  substr($SiteQuick['Page_Html'],0,4);
				if ($htmlstring == "http") {
					print "<a href=\"".$SiteQuick["Page_Html"]."\" target=\"_blank\" class=\"footerSitemap\"><span class=\"footerSitemapSpan\">$name</span></a>";
				} else {
					print "<a href=\"".$siteURL.$SiteQuick["Page_Html"]."\" class=\"footerSitemap\"><span class=\"footerSitemapSpan\">$name</span></a>";
				}
		}
	//print"</div>";
	//if ($numLink < $numLinks) { print "<div style=\" height:1px; float:left; width:10px;\"></div>"; }
	} //end while
	//print "<div style=\"clear:both;\"></div>";
?>
