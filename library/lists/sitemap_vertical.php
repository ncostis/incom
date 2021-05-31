<?php
$SiteQuick_Sel = "SELECT * FROM pages WHERE Page_GenVar2 = 'sitemap' AND Parent_Page_ID = 0 AND Page_Active = '1'  AND Page_Lang = '$Lang' order by Page_Order Asc";
$SiteQuick_Query = q($SiteQuick_Sel);
$numLinks = nr($SiteQuick_Query);

$numLink = 0;
while ($SiteQuick = f($SiteQuick_Query)) {
	$numLink = $numLink + 1;
	$pID = $SiteQuick["Page_ID"];
	$IDPath = $SiteQuick['Page_View'];
	if($SiteQuick["Page_Name_Print"] <> '') { $name = "$SiteQuick[Page_Name]"; } else { $name = "$SiteQuick[Page_Name]"; }

	print"<div class=\"top5\">";
		if ($IDPath <> ""){ 
			if (strpos($IDPath, '#') !== false) $slash = ""; else $slash = "/";
			print "<a href=\"$siteURL$IDPath$slash\" class=\"footerSitemap\">$name</a>";
		} else {
			$htmlstring =  substr($SiteQuick['Page_Html'],0,4);
				if ($htmlstring == "http") {
					print "<a href=\"$SiteQuick[Page_Html]\" target='_blank' class=\"footerSitemap\">$name</a>";
				} else {
					print "<a href=\"".$siteURL."$SiteQuick[Page_Html]\" class=\"footerSitemap\">$name</a>";
				}
		}
	print"</div>";
	} //end while
	print "<div style=\"clear:both;\"></div>";
?>
