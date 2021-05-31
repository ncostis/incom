<!--    ************************  -->
<!--	  DELETE SUB CATEGORIES	  -->
<!--    ************************  -->
<?php
require_once("init.php");

// DELETE ALL SUB CATEGORIES
global $delArray;

if (getparamvalue("saved") == 'ok') {
    $Page_ID = $_POST["Page_ID"];
    selectSubCategories($Page_ID);

    $numitems = count($delArray);
    for ($i = 0; $i < $numitems; $i++) {
        $delID = $delArray[$i];
        deleterecords($delID);

        //delete Page Settings
        $delPS = "DELETE FROM pages_settings WHERE Set_Page_ID = \"$delID\"";
        q($delPS);

        $del = "DELETE FROM pages WHERE Page_ID = \"$delID\"";
        q($del);
    }

// DELETE MAIN CATEGORY
    $Page_ID = $_POST["Page_ID"];
    deleterecords($Page_ID);

    //delete Page Settings
    $delPS = "DELETE FROM pages_settings WHERE Set_Page_ID = \"$Page_ID\"";
    q($delPS);

    $del = "DELETE FROM pages WHERE Page_ID = \"$Page_ID\"";
    q($del);

    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=pages_view";
    </script>
    <?php
}

$Page_ID = $_GET["Page_ID"];

$result = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
$result_q = q($result);
?>


	<div class="topInternalTitle"><h3><?php print $textDelCategor; ?></h3></div>
	<div class="top20"></div>
    
	<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <form action="" method="post">
        <tr>
            <td width="11">&nbsp;</td>
            <td class="bodytextb">
                <br>
                <span class="redTextS2"><?php print $textRuSureDel; ?>:</span></strong>
                <br>
                <br>

                <?php
                while ($row = f($result_q)) {
                    ?>
                    <input type="Hidden" name="Page_ID" value="<?php echo $row['Page_ID']; ?>">
                    <input type="Hidden" name="saved" value="ok">
                    <table width="100%" border="0" cellpadding="0" cellspacing="8">
                        <tr>
                            <td width="35%" align="right"
                                class="bodytext"><?php print $textTitle; ?> :
                            </td>
                            <td width="65%" class="bodytext">
                                <font color="cc0000">
                                    <strong>
                                        <?php echo $row['Page_Name']; ?>
                                    </strong>
                                </font>
                            </td>
                        </tr>
                    </table>

                    <div class="width100 top30" margin:auto;">
                        <div class="leftCenter"><input type="submit" class="saveSubmit" name="delete_rec" value="YES"></div>
                        <div class="left25 top5"><a href="javascript:history.go(-1);" class="cancel"><i class="fas fa-reply"></i> Back</a></div>
                    </div>

                <?php } ?>

            </td>
        </tr>
    </form>

</table>