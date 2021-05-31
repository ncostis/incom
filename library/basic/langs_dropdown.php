<?php
$pathelements = $rootURL."elements/langs";
$Lang_Sel = "SELECT * FROM lang WHERE Lang_XML_Export = 1 Order by Lang_Order Asc";
$Lang_Query = q($Lang_Sel);
$show_flags = false;
?>
<style>.langWrapper{position:relative;display:table;margin:auto;}.languageSelector{background: url(<?php echo $rootURL; ?>elements/arrowdropdown.png) no-repeat scroll right center; padding-right:25px; display:block;}.languages{position:absolute; z-index:999; margin:0; padding:0; width: 100%; display:none;}.languages li{list-style-type:none; margin:0;padding:0;}.languages a{width:100%; display:block; box-sizing:border-box;}</style>
<script type="text/javascript">$(document).ready(function(){$(".languageSelector").click(function(a){a.preventDefault(),$(".languages").is(":hidden")?$(".languages").slideDown("fast"):$(".languages").slideUp("fast")}),$(document).mouseup(function(a){var b=$(".langWrapper");b.is(a.target)||0!==b.has(a.target).length||$(".languages").slideUp("fast")})});</script>
<div class="langWrapper">
<a href="#" alt="Change Language" class="languageSelector"><?php echo $selectlang;?></a>
<ul class="languages">
<?php
while($GetLang = f($Lang_Query)){
$langlink = ($Lang == $GetLang[Lang_Title]) ? "langSel" : "lang";
$after_url = ($GetLang['Lang_Title'] == "$StartLang")? "" : $GetLang[Lang_Title]."/";
print"<li><a href=\"$rootURL$after_url\" class=\"$langlink\">";
print ($show_flags)? "<img src=\"$pathelements/$GetLang[Lang_Title].png\" border=0 alt='$GetLang[Lang_Desc]'>" : $GetLang[Lang_Desc];
print "</a></li>";
}
?>
</ul>
</div>