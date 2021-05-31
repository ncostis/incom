<?php 
	$pathelements = $rootURL."elements/langs";
	$Lang_Sel = "SELECT * FROM lang WHERE Lang_XML_Export = 1 Order by Lang_Order Asc";
	$Lang_Query = q($Lang_Sel);
	$show_flags = false;
?>

<div class="langWrapper center">
<?php
	while($GetLang = f($Lang_Query)){
		$langlink = ($Lang == $GetLang[Lang_Title]) ? "langSel lang" : "lang";
		$rL = ($GetLang['Lang_Title'] == "$StartLang")? "" : $GetLang[Lang_Title]."/";
print "<a href=\"$rootURL$rL\" class='$langlink' alt='$GetLang[Lang_Desc]'> ";
        //if($Lang <> $GetLang[Lang_Title]){echo " | ";}
print ($show_flags)? "<img src=\"$pathelements/$GetLang[Lang_Title].png\" width=\"auto\" height=\"auto\" border=0 alt='$GetLang[Lang_Desc]' style=\"vertical-align: middle;\">" : $GetLang['Lang_Desc'];
print "</a>";
}
?>
</div>