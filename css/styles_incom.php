<?php
$checkLangCss_Sel = "SELECT * FROM lang WHERE Lang_Title = '$Lang' AND Lang_Start <> 1";
$checkLangCss_Query = q($checkLangCss_Sel);
if ($GetOptRec['Rec_Check3'] == 1){
		print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootURL."css/styles_global.css\" />\n";
		print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootURL."css/styles.css\" />\n";
		print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootURL."css/links.css\" />\n";
	if (nr($checkLangCss_Query) > 0) {
		print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootURL."css/styles_$Lang.css\" />\n";
		print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootURL."css/links_$Lang.css\" />\n";
	}
}else{
	print "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootURL."min/b=".$GetVar["Rec_Title"]."css&amp;f=styles_global.css,styles.css,links.css";  if (nr($checkLangCss_Query) > 0) {
	        print ",styles_$Lang.css,links_$Lang.css"; } print"&1800"; echo "?v=".$GetVar['Rec_Field21']; print "\" />\n";
}
?>