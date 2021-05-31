<?php
require_once("init.php");
$gmt = $GetVar['Rec_Field20'] * 60 * 60;

$string = generateString($numAlpha = 8, $numNonAlpha = 8);

$iq = "INSERT INTO pages
		(Page_Name,Page_Order,Page_Section,Page_GetFromSection,Page_Lang,Page_Num_Recs,Page_Active,Page_View,Page_Type,Page_Lists_Temp,Page_Rec_Temp,Page_Header_Flag,Page_Header,Page_Mob_Enable,Page_Type_Mob,Page_Temp_ID_Mob,Page_Style_ID_Mob,Page_Styles_Links_Mob)
		VALUES ('New Category','999','".$_SESSION["AdminSection"]."','".$_SESSION["AdminSection"]."','".$_SESSION["AdminLang"]."','1','1','$string','lists/default','1','1','1','default','1','lists/mobile_cat_list','36','8','8')
		";
q($iq);

$Select_New_Page = "SELECT Page_ID FROM pages ORDER BY Page_ID DESC";
$Select_New_Page_q = q($Select_New_Page);
$Select_New_Page_row = f($Select_New_Page_q);

?>

<script language="JavaScript">
    window.location = "index.php?ID=pages_edit&Page_ID=<?php echo $Select_New_Page_row['Page_ID']; ?>";
</script>