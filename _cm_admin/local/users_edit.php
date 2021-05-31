<?php
require_once "init.php";

if (getparamvalue("submitpasswords") == 'OK') {

    $Pas_ID = $_POST['Pas_ID'];
    if ($_POST['Pas_Psw'] == "") {
        $Pas_Psw = $_POST['Old_Psw'];
    } else {
        $Pas_Psw = md5($_POST["Pas_Psw"]);
    }
    $upq = "
			UPDATE `passwords` SET `Pas_Usn` = '".$_POST["Pas_Usn"]."',
			`Pas_Psw` = '$Pas_Psw',
			`Pas_Name` = '".$_POST["Pas_Name"]."',
			`Pas_Email` = '".$_POST["Pas_Email"]."',
			`Pas_Level` = '".$_POST["Pas_Level"]."',
			`Pas_FullAccess` = '".$_POST["Pas_FullAccess"]."',
			`Pas_Fails` = '".$_POST["Pas_Fails"]."',
			`Acc_FieldLists` = '".$_POST["Acc_FieldLists"]."',
			`Acc_DynFields` = '".$_POST["Acc_DynFields"]."',
			`Acc_AttTables` = '".$_POST["Acc_AttTables"]."',
			`Acc_Categories` = '".$_POST["Acc_Categories"]."',
			`Acc_TempWebSite` = '".$_POST["Acc_TempWebSite"]."',
			`Acc_TempCat` = '".$_POST["Acc_TempCat"]."',
            `Acc_TempList` = '".$_POST["Acc_TempList"]."',
			`Acc_TempRec` = '".$_POST["Acc_TempRec"]."',
			`Acc_TempHead` = '".$_POST["Acc_TempHead"]."',
            `Acc_LiveEdit` = '".$_POST["Acc_LiveEdit"]."',
            `Acc_LiveEditTemplates` = '".$_POST["Acc_LiveEditTemplates"]."',
			`Acc_Modules` = '".$_POST["Acc_Modules"]."',
			`Acc_PageEditSettings` = '".$_POST["Acc_PageEditSettings"]."',
			`Acc_Javascript` = '".$_POST["Acc_Javascript"]."',
			`Acc_Activate` = '".$_POST["Acc_Activate"]."',
			`Acc_AddAdminUser` = '".$_POST["Acc_AddAdminUser"]."',
			`Acc_Members` = '".$_POST["Acc_Members"]."',
			`Acc_CSS` = '".$_POST["Acc_CSS"]."',
			`Acc_SettingsVars` = '".$_POST["Acc_SettingsVars"]."',
			`Acc_Settings` = '".$_POST["Acc_Settings"]."',
			`Acc_Eshop` = '".$_POST["Acc_Eshop"]."',
			`Eshop_OrdRep` = '".$_POST["Eshop_OrdRep"]."',
			`Eshop_Discounts` = '".$_POST["Eshop_Discounts"]."',
			`Eshop_Stats` = '".$_POST["Eshop_Stats"]."',
			`Eshop_Settings` = '".$_POST["Eshop_Settings"]."',
			`Eshop_Customers` = '".$_POST["Eshop_Customers"]."',
			`Eshop_ShipCost` = '".$_POST["Eshop_ShipCost"]."',
			`Eshop_Zones` = '".$_POST["Eshop_Zones"]."',
			`Eshop_VAT` = '".$_POST["Eshop_VAT"]."',
			`Eshop_Suppliers` = '".$_POST["Eshop_Suppliers"]."',
			`Eshop_Statements` = '".$_POST["Eshop_Statements"]."',
			`Eshop_Brands` = '".$_POST["Eshop_Brands"]."',
			`Eshop_ProdCats` = '".$_POST["Eshop_ProdCats"]."',
			`Eshop_Availability` = '".$_POST["Eshop_Availability"]."' WHERE `passwords`.`Pas_ID` =$Pas_ID LIMIT 1 ;
	";
    q($upq);
}


$sel = "SELECT * FROM passwords Where Pas_ID = ".$_GET["Pas_ID"];
$re = q($sel);
$GetRec = f($re);
?>


<div class="width100">
    <?php headerTitle ($textEditAdmin); ?>
    <div class="top20"></div>

    <form action="" method="post">
        <div class="admGrid2Cols">
            <div>
                <div class="form-group">
                    <label class="formLabel"><?php print $textUsrName; ?></label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Pas_Usn']; ?>" type="text" name="Pas_Usn" size="20" maxlength="20" class="formField">
                    </div>
                </div>
                <div class="form-group">
                    <label class="formLabel"><?php print $textPasswrd; ?></label>
                    <div class="colInput">
                        <input value="" type="text" name="Pas_Psw" size="20" class="formField">
                    </div>
                </div>
                <div class="form-group">
                    <label class="formLabel"><?php print $textFullName; ?></label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Pas_Name']; ?>" type="text" name="Pas_Name" size="40" maxlength="60" class="formField">
                    </div>
                </div>

                <div class="form-group">
                    <label class="formLabel">E-Mail</label>
                    <div class="colInput">
                        <input value="<?php echo $GetRec['Pas_Email']; ?>" type="text" name="Pas_Email" size="40" maxlength="100" class="formField">
                    </div>
                </div>

                <?php if (Auth::accessLevel() == 0) { ?>
                    <div class="form-group">
                        <label class="formLabel"><?php print $textAccLevel; ?></label>
                        <div class="colInput">
                            <select name="Pas_Level" class="formField selHeight">
                                <option value="1" <?php if ($GetRec['Pas_Level'] == 1) echo 'selected'; ?>>Simple User</option>
                                <option value="0" <?php if ($GetRec['Pas_Level'] == 0) echo 'selected'; ?>>Full Access</option>
                            </select>
                        </div>
                    </div>
                <?php } else { ?>
                    <input value="1" type="hidden" name="Pas_Level" size="40">
                <?php } ?>

                <?php
        		if ((Auth::accessLevel() == 0) AND ($GetRec['Pas_Fails'] > 2)){ ?>
                    <div class="form-group">
                        <label class="formLabel">Fail-secure access</label>
                        <div class="colInput">
                            <input value="<?php echo $GetRec['Pas_Fails']; ?>" type="text" name="Pas_Fails" size="2" class="formField">&nbsp;&nbsp;
                             <?php print "<span class=\"redTextS2\">Deactiveted account - Set 0 to make it active</span>"; ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="formLabel">
                        <input type="checkbox" name="Pas_FullAccess" value="1" <?php if ($GetRec['Pas_FullAccess'] == '1') echo 'checked'; ?>> <?php print $textAccAllContent; ?></label>
                </div>

                <div class="form-group">
                    <label class="formLabel">
                        Categories Access
                    <a class="popUpWindow textBigger bgColor cLight buttonLink" href="local/users_categories_access.php?Pas_ID=<?php echo $_GET['Pas_ID']; ?>&Name=<?php echo $GetRec['Pas_Name']; ?>&Lang=<?php echo $_SESSION['AdminLang']; ?>&Section=<?php echo $_SESSION['AdminSection']; ?>" data-width="600" data-height="580">Select</a>
                </div>
            </div>
        </div> <!-- 2 cols -->


        <!--	Fields		--><!--	Fields		--><!--	Fields	-->
        <div class="top30"><h3>Content Access</h3></div>
        <div class="line"></div>

        <!-- Column 1 -->
        <div class="grid30">
            <fieldset>
                <legend><b>Menu</b></legend>
                <?php if (Auth::accessLevel() == 0) { ?>
                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_FieldLists" value="1" <?php if ($GetRec['Acc_FieldLists'] == '1') echo 'checked'; ?>> Field Lists</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_AttTables" value="1" <?php if ($GetRec['Acc_AttTables'] == '1') echo 'checked'; ?>> Attached Tables</label>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_Categories" value="1" <?php if ($GetRec['Acc_Categories'] == '1') echo 'checked'; ?>> Categories</label>
                </div>

            </fieldset>

            <div class="clear top20"></div>

            <fieldset>
                <legend><b>Modules / JS</b></legend>

                <?php if (Auth::accessLevel() == 0) { ?>
                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_Modules" value="1" <?php if ($GetRec['Acc_Modules'] == '1') echo 'checked'; ?>> Modules</label>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_Javascript" value="1" <?php if ($GetRec['Acc_Javascript'] == '1') echo 'checked'; ?>>Javascript</label>
                </div>
            </fieldset>

        </div>

        <div class="grid5">&nbsp;</div>
        <!-- Column 2 -->
        <!-- ACCESS TO USERS -->
        <?php if (Auth::accessLevel() == 0) { ?>
            <div class="grid30">
                <fieldset>
                    <legend><b>Templates</b></legend>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_TempWebSite" value="1" <?php if ($GetRec['Acc_TempWebSite'] == '1') echo 'checked'; ?>> Website</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_TempCat" value="1" <?php if ($GetRec['Acc_TempCat'] == '1') echo 'checked'; ?>> Categories</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_TempList" value="1" <?php if ($GetRec['Acc_TempList'] == '1') echo 'checked'; ?>> Lists</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_TempRec" value="1" <?php if ($GetRec['Acc_TempRec'] == '1') echo 'checked'; ?>> Records</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_TempHead" value="1" <?php if ($GetRec['Acc_TempHead'] == '1') echo 'checked'; ?>> Head Content</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><b>Special Views</b></legend>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_LiveEdit" value="1" <?php if ($GetRec['Acc_LiveEdit'] == '1') echo 'checked'; ?>> Active Live Edit</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_LiveEditTemplates" value="1" <?php if ($GetRec['Acc_LiveEditTemplates'] == '1') echo 'checked'; ?>> Live Edit Templates</label>
                    </div>

                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_DynFields" value="1" <?php if ($GetRec['Acc_DynFields'] == '1') echo 'checked'; ?>> Dynamic Views Templates</label>
                    </div>

                </fieldset>

            </div>
        <?php } ?>
        <div class="grid5">&nbsp;</div>
        <!-- Column 2 -->
        <div class="grid30">
            <fieldset>
                <legend><b>General</b></legend>

                <?php if (Auth::accessLevel() == 0) { ?>
                    <div class="form-group">
                        <label class="formLabel"><input type="checkbox" name="Acc_PageEditSettings" value="1" <?php if ($GetRec['Acc_PageEditSettings'] == '1') echo 'checked'; ?>> Show Page Settings</label>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_Activate" value="1" <?php if ($GetRec['Acc_Activate'] == '1') echo 'checked'; ?>> Activate</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_AddAdminUser" value="1" <?php if ($GetRec['Acc_AddAdminUser'] == '1') echo 'checked'; ?>> Add Admin Users</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_Members" value="1" <?php if ($GetRec['Acc_Members'] == '1') echo 'checked'; ?>> Website Members</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_CSS" value="1" <?php if ($GetRec['Acc_CSS'] == '1') echo 'checked'; ?>> CSS Styles</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_SettingsVars" value="1" <?php if ($GetRec['Acc_SettingsVars'] == '1') echo 'checked'; ?>> Init Settings</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Acc_Settings" value="1" <?php if ($GetRec['Acc_Settings'] == '1') echo 'checked'; ?>> Settings</label>
                </div>
            </fieldset>

        </div>
        <div class="clear"></div>

        <!-- ACCESS TO ESHOP -->
        <?php if ($GetVar['Rec_Check4']=="1" && (Auth::accessLevel() == 0 OR $GetRec['Acc_Eshop'] == '1')) { ?>

            <div class="top30 redTextS2b">Access to E-Shop</div>
            <hr/>

            <!-- Column 1 -->
            <div class="grid30">

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_OrdRep" value="1" <?php if ($GetRec['Eshop_OrdRep'] == '1') echo 'checked'; ?>> Orders' Report</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Discounts" value="1" <?php if ($GetRec['Eshop_Discounts'] == '1') echo 'checked'; ?>> Discounts</label>

                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Stats" value="1" <?php if ($GetRec['Eshop_Stats'] == '1') echo 'checked'; ?>> Statistics</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Settings" value="1" <?php if ($GetRec['Eshop_Settings'] == '1') echo 'checked'; ?>> Settings</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Customers" value="1" <?php if ($GetRec['Eshop_Customers'] == '1') echo 'checked'; ?>> Customers</label>
                </div>

            </div>
            <div class="grid5">&nbsp;</div>
            <!-- Column 2 -->
            <div class="grid30">

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_ShipCost" value="1" <?php if ($GetRec['Eshop_ShipCost'] == '1') echo 'checked'; ?>> Shipping Costs</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Zones" value="1" <?php if ($GetRec['Eshop_Zones'] == '1') echo 'checked'; ?>> Transport Zones</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_VAT" value="1" <?php if ($GetRec['Eshop_VAT'] == '1') echo 'checked'; ?>> VAT Categories</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Suppliers" value="1" <?php if ($GetRec['Eshop_Suppliers'] == '1') echo 'checked'; ?>>Suppliers</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Statements" value="1" <?php if ($GetRec['Eshop_Statements'] == '1') echo 'checked'; ?>> Statements</label>
                </div>

            </div>
            <div class="grid5">&nbsp;</div>
            <!-- Column 2 -->
            <div class="grid30">

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Brands" value="1" <?php if ($GetRec['Eshop_Brands'] == '1') echo 'checked'; ?>> Brands</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_ProdCats" value="1" <?php if ($GetRec['Eshop_ProdCats'] == '1') echo 'checked'; ?>> Product Categories</label>
                </div>

                <div class="form-group">
                    <label class="formLabel"><input type="checkbox" name="Eshop_Availability" value="1" <?php if ($GetRec['Eshop_Availability'] == '1') echo 'checked'; ?>> Availability</label>
                </div>

            </div>
        <?php } ?>


        <!--	buttons	-->
        <div class="top20 clear"></div>
        <div class="width100" align="center"><img src="elements/shadow.png" alt="" style="width:100%; max-width:630px;"/></div>
        <br/>
        <input type="hidden" name="Pas_ID" value="<?php echo $_GET["Pas_ID"]; ?>">
        <input type="hidden" name="Old_Psw" value="<?php echo $GetRec['Pas_Psw']; ?>">
        <input type="hidden" name="submitpasswords" value="OK">

        <?php
        $pageTempBack = "index.php?ID=users_view";
        include('core/templates_footer.php');
        ?>
    </form>

    <div class="top40 clear"></div>
</div>
