<?php
require_once("init.php");
$qu = "
		INSERT INTO lists 
		(List_Name) 
		VALUES ('$textListNameee')
		";

q($qu);

$Select_New_Type = "SELECT * FROM lists ORDER BY List_ID DESC";
$Select_New_Type_q = q($Select_New_Type);
$Select_New_Type_row = f($Select_New_Type_q);

?>


<script language="JavaScript">
    window.location = "index.php?ID=lists_edit&List_ID=<?php echo $Select_New_Type_row['List_ID']; ?>";
</script>