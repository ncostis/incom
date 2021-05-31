<?php
require_once("init.php");
if (getparamvalue("submitmembers") == 'OK') {

    $Mem_ID = $_POST['Mem_ID'];
    $Mem_Usn = $_POST['Mem_Usn'];
    if ($_POST['Mem_Usn'] == "") {
        $Mem_Usn = "-nu-";
    }
    $password = md5($_POST['Mem_Psw']);

    $sel = "SELECT * FROM members Where Mem_ID = ".$_GET["Mem_ID"];
    $re = q($sel);
    $GetRec = f($re);
    if (strlen($_POST['Mem_Psw']) > 2)
        $upq = "
			UPDATE `members` SET `Mem_Usn` = '$Mem_Usn',
			`Mem_Psw` = '$password',
			`Mem_Name` = '".$_POST["Mem_Name"]."',
			`Mem_Email` = '".$_POST["Mem_Email"]."',
			`Mem_Tel` = '".$_POST["Mem_Tel"]."',
			`Mem_City` = '".$_POST["Mem_City"]."',
			`Mem_Level` = '".$_POST["Mem_Level"]."',
			`Mem_FullAccess` = '".$_POST["Mem_FullAccess"]."' WHERE `members`.`Mem_ID` =$Mem_ID LIMIT 1 ;
	";
    else
        $upq = "
			UPDATE `members` SET `Mem_Usn` = '$Mem_Usn',
			`Mem_Name` = '".$_POST["Mem_Name"]."',
			`Mem_Email` = '".$_POST["Mem_Email"]."',
			`Mem_Tel` = '".$_POST["Mem_Tel"]."',
			`Mem_City` = '".$_POST["Mem_City"]."',
			`Mem_Level` = '".$_POST["Mem_Level"]."',
			`Mem_FullAccess` = '".$_POST["Mem_FullAccess"]."' WHERE `members`.`Mem_ID` =$Mem_ID LIMIT 1 ;
	";
    q($upq);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=members_view";
    </script>
    <?php

} ?>


<?php
$sel = "SELECT * FROM members Where Mem_ID = ".$_GET["Mem_ID"];
$re = q($sel);
$GetRec = f($re);
?>


<div class="width100">
    <?php headerTitle ("Edit Website Member"); ?>
    <div class="top20"></div>

    <form action="" method="post">
        <div class="admGrid2Cols">
            <div>

                <div class="form-group">
                    <label class="formLabel"><?php print $textUsrName; ?></label>
                    <div class="colInput">
                        <input value="<?php if ($GetRec['Mem_Usn'] <> "-nu-") {
                            echo $GetRec['Mem_Usn'];
                        } ?>" type="text" name="Mem_Usn" size="20" maxlength="20" class="formField" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel"><?php print $textPasswrd; ?></label>
                    <div class="colInput">
                        <input value="" type="text" name="Mem_Psw" size="20" class="formField">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel">E-Mail</label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Mem_Email']; ?>" type="email" name="Mem_Email" size="40" maxlength="100" class="formField" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel"><?php print $textFullName; ?></label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Mem_Name']; ?>" type="text" name="Mem_Name" size="40" maxlength="60" class="formField">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel"><?php print $textTelephone; ?></label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Mem_Tel']; ?>" type="text" name="Mem_Tel" size="40" maxlength="60" class="formField">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel">Location</label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Mem_City']; ?>" type="text" name="Mem_City" size="40" maxlength="60" class="formField">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel"><?php print $textAccLevel; ?></label>
                    <div class="colInput">
                        <select name="Mem_Level" class="formField">
                            <option value="0" <?php if ($GetRec['Mem_Level'] == 0) echo 'selected'; ?>>0</option>
                            <option value="1" <?php if ($GetRec['Mem_Level'] == 1) echo 'selected'; ?>>1</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Mem_FullAccess"
                               value="1" <?php if ($GetRec['Mem_FullAccess'] == '1') echo 'checked'; ?>> <?php print $textAccAllContent; ?></label>
                </div>

                <div class="form-group">
                    <label class="formLabel">Categories Access
                    <a class="popUpWindow textBigger bgColor cLight buttonLink" href="local/members_categories_access.php?Mem_ID=<?php echo $_GET['Mem_ID']; ?>&Name=<?php echo $GetRec['Mem_Name']; ?>&Lang=<?php echo $_SESSION['AdminLang']; ?>&Section=<?php echo $_SESSION['AdminSection']; ?>" data-width="600" data-height="580">Select</a>
                    </label>
                </div>

            </div>
        </div><!-- 2 cols -->



        <!--	buttons	-->
        <div class="top20 clear"></div>

        <input type="hidden" name="Mem_ID" value="<?php echo $_GET["Mem_ID"]; ?>">
        <input type="hidden" name="submitmembers" value="OK">

        <?php
        $pageTempBack = "index.php?ID=members_view";
        include('core/templates_footer.php');
        ?>
    </form>

    <div class="top40 clear"></div>
</div>