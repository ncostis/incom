<?php
require_once "init.php";

if (getparamvalue("submitsections") == 'OK') {

    $Section_ID = $_POST['Section_ID'];
    $upq = "
			UPDATE `sections` SET `Parent_Section_ID` = '".$_POST["Parent_Section_ID"]."',
            `Section_Title` = '".$_POST["Section_Title"]."',
			`Section_Name` = '".$_POST["Section_Name"]."',
			`Section_Order` = '".$_POST["Section_Order"]."',
			`Section_Thumb_SW` = '".$_POST["Section_Thumb_SW"]."',
			`Section_Thumb_SH` = '".$_POST["Section_Thumb_SH"]."',
			`Section_XML` = '".$_POST["Section_XML"]."', `Section_Active` = '".$_POST["Section_Active"]."' WHERE `sections`.`Section_ID` =$Section_ID LIMIT 1 ;
	";
    q($upq);
    ?>

    <script language="JavaScript">
        window.location = "index.php?ID=sections_view";
    </script>

<?php } ?>


<?php
$sel = "SELECT * FROM sections Where Section_ID = ".$_GET["Section_ID"];
$re = q($sel);
$GetSection = f($re);
?>


<div class="width100">
    <?php headerTitle($textEditSectiont)?>
    <div class="top20"></div>

    <form action="" method="post">
        <div class="admGrid2Cols">
            <div>
                <div class="form-group">
                    <label class="formLabel"><?php print $textSectionTitle; ?></label>
                    <div class="colInput">
                        <input value="<?php echo $GetSection['Section_Title']; ?>" type="text" name="Section_Title" size="20"
                               maxlength="20" class="formField">
                    </div>
                </div>
                <div class="form-group">
                    <label class="formLabel"><?php print $textNameSection; ?></label>
                    <div class="colInput top7">
                        <input value="<?php echo $GetSection['Section_Name']; ?>" type="text" class="formField" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label class="formLabel"><?php print $textViewOrder; ?></label>
                    <div class="colInput">
                        <input value="<?php echo $GetSection['Section_Order']; ?>" type="text" name="Section_Order" size="2"
                               maxlength="2" class="formField">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel">Level<?php echo $GetList['List_Scroll1']; ?></label>
                    <div class="colInput">
                        <select name="Parent_Section_ID" class="formField">
                            <option value="0" selected>-- Header Section --</option>
                            <?php
                            $GetScr1_Sel = "SELECT * FROM sections WHERE Section_Name <> 'optimized' AND Parent_Section_ID = 0 Order by Section_Order";
                            $GetScr1_Query = q($GetScr1_Sel);
                            while ($GetScr1 = f($GetScr1_Query)){
                            ?>
                                <option value="<?php echo $GetScr1['Section_ID']; ?>" <?php if($GetSection['Parent_Section_ID'] == $GetScr1['Section_ID']) echo "selected"; ?>><?php echo $GetScr1['Section_Title']; ?></option>
                            <?php
                                // check for sub sections
                                $GetSubS_Sel = "SELECT * FROM sections WHERE Parent_Section_ID = ".$GetScr1["Section_ID"]." Order by Section_Order Asc";
                                $GetSubS_Query = q($GetSubS_Sel);
                                if (nr($GetSubS_Query) > 0) {
                                    while ($GetSubS = f($GetSubS_Query)){

                                        ?>
                                        <option value="<?php echo $GetSubS['Section_ID']; ?>">&nbsp;&nbsp;&raquo; <?php echo $GetSubS['Section_Title']; ?></option>
                                    <?php } // while ?
                                } // if
                            } // while ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="top5"></div>

        <div class="admGrid4Cols">
            <div>
                <div class="form-group">
                    <label class="formLabel">
                        <input type="Checkbox" name="Section_XML" value="1" <?php if ($GetSection['Section_XML'] == '1') echo 'checked'; ?>> <?php print $textXMLSection; ?>
                    </label>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="formLabel"><input type="Checkbox" name="Section_Active" value="1" <?php if ($GetSection['Section_Active'] == '1') echo 'checked'; ?>> <?php print $textActiveSection; ?></label>
                </div>
            </div>
        </div>

        <!--	buttons	-->
        <?php
        $pageTempBack = "index.php?ID=sections_view";
        include('core/templates_footer.php');
        ?>

        <input type="hidden" name="Section_ID" value="<?php echo $_GET["Section_ID"]; ?>">
        <input type="hidden" name="Section_Name" value="<?php echo $GetSection["Section_Name"]; ?>">
        <input type="hidden" name="submitsections" value="OK">
    </form>

    <div class="top40 clear"></div>
</div>
