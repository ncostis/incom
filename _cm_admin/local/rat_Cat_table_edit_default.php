<?php
require_once("init.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php require_once($routes["head_script.php"]); ?>
</head>

<table style="width:100%; height:80px" border="0" cellspacing="10" cellpadding="0">
    <tr>
        <td class="main-border" valign="top">
            <table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                    <td height="30" class="MainTitle">
                        <table style="width:100%" cellspacing="0">
                            <tr>
                                <td height="28" bgcolor="F7F5DC" class="text14blue"><?php print $textEditRecordPop; ?>
                                    :</em></td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <form action="" method="post">

                                <input type="Hidden" name="Rat_ID" value="<?php echo $Rat_ID; ?>">
                                <input type="Hidden" name="Rat_Rec_ID" value="<?php echo $Rat_Rec_ID; ?>">
                                <input type="Hidden" name="Rat_SubCat" value="<?php echo $Rat_SubCat; ?>">
                                <input type="Hidden" name="saved" value="ok">
                                <tr>
                                    <td width="11">&nbsp;</td>
                                    <td>

                                        <table width="100%" border="0" cellpadding="0" cellspacing="8">
                                            <!--	titlos	-->
                                            <?php
                                            if ($Select_Lists_row['List_Title'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Title']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Title"
                                                                           value="<?php echo $Select_Rat_row['Rat_Title']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	perigrafi	-->
                                            <?php
                                            if ($Select_Lists_row['List_Desc'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right" class="text11blue"
                                                        valign="top"><?php echo $Select_Lists_row['List_Desc']; ?> :
                                                    </td>
                                                    <td width="65%"><textarea name="Rat_Desc" class="textPopUp"
                                                                              cols="40"
                                                                              rows="3"><?php echo $Select_Rat_row['Rat_Desc']; ?></textarea>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Order	-->
                                            <?php
                                            if ($Select_Lists_row['List_Order'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Order']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Order"
                                                                           value="<?php echo $Select_Rat_row['Rat_Order']; ?>"
                                                                           class="textPopUp" size="4" maxrows="4"></td>
                                                </tr>
                                            <?php } ?>


                                            <!--	TextArea	--><!--	TextArea	--><!--	TextArea	-->

                                            <!--
                                                                    <tr>
                                                                        <td align="center" class="maingreenline" colspan="2">
                                                                            <div class="titleRecordsS2"><strong>Text Areas</strong></div>
                                                                        </td>
                                                                    </tr>
                                            -->
                                            <!--	TextArea1	-->
                                            <?php
                                            if ($Select_Lists_row['List_TextArea1'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right" class="text11blue"
                                                        valign="top"><?php echo $Select_Lists_row['List_TextArea1']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><textarea name="Rat_TextArea1" class="textPopUp"
                                                                              cols="40"
                                                                              rows="3"><?php echo $Select_Rat_row['Rat_TextArea1']; ?></textarea>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <!--	TextArea2	-->
                                            <?php
                                            if ($Select_Lists_row['List_TextArea2'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right" class="text11blue"
                                                        valign="top"><?php echo $Select_Lists_row['List_TextArea2']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><textarea name="Rat_TextArea2" class="textPopUp"
                                                                              cols="40"
                                                                              rows="3"><?php echo $Select_Rat_row['Rat_TextArea2']; ?></textarea>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <!------	Fields		-----><!------	Fields		----->
                                            <!------	Fields		----->
                                            <!------	Fields		-----><!------	Fields		----->
                                            <!------	Fields		----->
                                            <!------	Fields		-----><!------	Fields		----->
                                            <!------	Fields		----->
                                            <!--
                                                                    <tr>
                                                                        <td align="center" class="maingreenline" colspan="2">
                                                                            <div class="titleRecordsS2"><strong>Πεδία</strong></div>
                                                                        </td>
                                                                    </tr>
                                            -->
                                            <!--	Field1	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field1'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field1']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field1"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field1']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field2	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field2'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field2']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field2"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field2']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field3	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field3'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field3']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field3"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field3']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field4	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field4'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field4']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field4"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field4']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field5	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field5'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field5']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field5"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field5']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field6	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field6'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field6']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field6"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field6']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field7	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field7'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field7']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field7"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field7']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field8	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field8'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field8']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field8"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field8']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field9	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field9'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field9']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field9"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field9']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field10	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field10'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field10']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field10"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field10']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field11	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field11'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field11']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field11"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field11']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field12	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field12'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field12']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field12"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field12']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field13	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field13'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field13']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field13"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field13']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field14	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field14'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field14']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field14"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field14']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field15	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field15'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field15']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field15"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field15']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field16	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field16'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field16']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field16"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field16']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field17	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field17'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field17']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field17"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field17']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field18	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field18'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field18']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field18"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field18']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field19	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field19'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field19']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field19"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field19']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field20	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field20'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field20']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field20"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field20']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field21	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field21'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field21']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field21"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field21']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field22	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field22'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field22']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field22"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field22']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field23	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field23'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field23']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field23"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field23']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field24	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field24'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field24']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field24"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field24']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field25	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field25'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field25']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field25"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field25']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field26	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field26'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field26']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field26"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field26']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field27	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field27'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field27']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field27"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field27']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field28	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field28'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field28']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field28"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field28']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field29	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field29'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field29']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field29"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field29']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Field30	-->
                                            <?php
                                            if ($Select_Lists_row['List_Field30'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Field30']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Text" name="Rat_Field30"
                                                                           value="<?php echo $Select_Rat_row['Rat_Field30']; ?>"
                                                                           class="textPopUp" size="50" maxrows="255">
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <!------	CheckBoxes		-----><!------	CheckBoxes		----->
                                            <!------	CheckBoxes		----->
                                            <!------	CheckBoxes		-----><!------	CheckBoxes		----->
                                            <!------	CheckBoxes		----->
                                            <!------	CheckBoxes		-----><!------	CheckBoxes		----->
                                            <!------	CheckBoxes		----->
                                            <!--
                                                                    <tr>
                                                                        <td align="center" class="maingreenline" colspan="2">
                                                                            <div class="titleRecordsS2"><strong>Check Boxes</strong></div>
                                                                        </td>
                                                                    </tr>
                                            -->
                                            <!--	CheckBox1	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check1'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check1']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check1"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check1'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox2	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check2'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check2']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check2"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check2'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox3	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check3'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check3']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check3"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check3'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox4	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check4'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check4']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check4"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check4'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox5	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check5'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check5']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check5"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check5'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox6	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check6'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check6']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check6"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check6'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox7	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check7'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check7']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check7"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check7'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox8	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check8'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check8']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check8"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check8'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox9	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check9'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check9']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check9"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check9'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox10	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check10'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check10']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check10"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check10'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox11	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check11'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check11']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check11"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check11'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox12	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check12'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check12']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check12"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check12'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox13	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check13'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check13']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check13"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check13'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox14	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check14'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check14']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check14"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check14'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox15	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check15'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check15']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check15"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check15'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox16	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check16'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check16']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check16"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check16'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox17	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check17'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check17']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check17"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check17'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox18	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check18'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check18']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check18"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check18'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox19	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check19'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check19']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check19"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check19'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox20	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check20'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check20']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check20"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check20'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <!--	CheckBox21	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check21'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check21']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check21"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check21'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <!--	CheckBox22	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check22'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check22']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check22"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check22'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox23	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check23'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check23']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check23"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check23'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox24	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check24'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check24']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check24"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check24'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox25	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check25'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check25']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check25"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check25'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox26	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check26'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check26']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check26"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check26'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox27	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check27'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check27']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check27"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check27'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox28	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check28'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check28']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check28"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check28'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox29	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check29'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check29']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check29"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check29'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox30	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check30'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check30']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check30"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check30'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox31	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check31'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check31']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check31"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check31'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox32	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check32'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check32']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check32"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check32'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox33	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check33'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check33']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check33"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check33'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox34	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check34'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check34']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check34"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check34'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox35	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check35'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check35']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check35"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check35'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox36	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check36'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check36']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check36"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check36'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox37	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check37'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check37']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check37"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check37'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox38	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check38'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check38']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check38"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check38'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox39	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check39'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check39']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check39"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check39'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	CheckBox40	-->
                                            <?php
                                            if ($Select_Lists_row['List_Check40'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Check40']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%"><input type="Checkbox" name="Rat_Check40"
                                                                           value="1" <?php if ($Select_Rat_row['Rat_Check40'] == '1') echo 'checked'; ?>>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <!------	Scrolling		-----><!------	Scrolling		----->
                                            <!------	Scrolling		----->
                                            <!------	Scrolling		-----><!------	Scrolling		----->
                                            <!------	Scrolling		----->
                                            <!------	Scrolling		-----><!------	Scrolling		----->
                                            <!------	Scrolling		----->
                                            <!--
                                                                    <tr>
                                                                        <td align="center" class="maingreenline" colspan="2">
                                                                            <div class="titleRecordsS2"><strong>Scrollings</strong></div>
                                                                        </td>
                                                                    </tr>
                                            -->


                                            <!--	Scrolling1	-->
                                            <?php
                                            if ($Select_Lists_row['List_Scroll1'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Scroll1']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <select name="Rat_Scroll1" class="textPopUp">
                                                            <option
                                                                value="1" <?php if ($Select_Rat_row['Rat_Scroll1'] == 1) echo 'selected'; ?>>
                                                                AAAAA
                                                            </option>
                                                            <option
                                                                value="2" <?php if ($Select_Rat_row['Rat_Scroll1'] == 2) echo 'selected'; ?>>
                                                                BBBBB
                                                            </option>
                                                            <option
                                                                value="3" <?php if ($Select_Rat_row['Rat_Scroll1'] == 3) echo 'selected'; ?>>
                                                                CCCCC
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Scrolling2	-->
                                            <?php
                                            if ($Select_Lists_row['List_Scroll2'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Scroll2']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <select name="Rat_Scroll2" class="textPopUp">
                                                            <option
                                                                value="1" <?php if ($Select_Rat_row['Rat_Scroll2'] == 1) echo 'selected'; ?>>
                                                                AAAAA
                                                            </option>
                                                            <option
                                                                value="2" <?php if ($Select_Rat_row['Rat_Scroll2'] == 2) echo 'selected'; ?>>
                                                                BBBBB
                                                            </option>
                                                            <option
                                                                value="3" <?php if ($Select_Rat_row['Rat_Scroll2'] == 3) echo 'selected'; ?>>
                                                                CCCCC
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <!--	Scrolling3	-->

                                            <?php
                                            if ($Select_Lists_row['List_Scroll3'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Scroll3']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <select name="Rat_Scroll3" class="textPopUp">
                                                            <option
                                                                value="1" <?php if ($Select_Rat_row['Rat_Scroll3'] == 1) echo 'selected'; ?>>
                                                                AAAAA
                                                            </option>
                                                            <option
                                                                value="2" <?php if ($Select_Rat_row['Rat_Scroll3'] == 2) echo 'selected'; ?>>
                                                                BBBBB
                                                            </option>
                                                            <option
                                                                value="3" <?php if ($Select_Rat_row['Rat_Scroll3'] == 3) echo 'selected'; ?>>
                                                                CCCCC
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Scrolling4	-->
                                            <?php
                                            if ($Select_Lists_row['List_Scroll4'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Scroll4']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <select name="Rat_Scroll4" class="textPopUp">
                                                            <option
                                                                value="1" <?php if ($Select_Rat_row['Rat_Scroll4'] == 1) echo 'selected'; ?>>
                                                                AAAAA
                                                            </option>
                                                            <option
                                                                value="2" <?php if ($Select_Rat_row['Rat_Scroll4'] == 2) echo 'selected'; ?>>
                                                                BBBBB
                                                            </option>
                                                            <option
                                                                value="3" <?php if ($Select_Rat_row['Rat_Scroll4'] == 3) echo 'selected'; ?>>
                                                                CCCCC
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!--	Scrolling5	-->
                                            <?php
                                            if ($Select_Lists_row['List_Scroll5'] <> "") {
                                                ?>
                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_Scroll5']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <select name="Rat_Scroll5" class="textPopUp">
                                                            <option
                                                                value="1" <?php if ($Select_Rat_row['Rat_Scroll5'] == 1) echo 'selected'; ?>>
                                                                AAAAA
                                                            </option>
                                                            <option
                                                                value="2" <?php if ($Select_Rat_row['Rat_Scroll5'] == 2) echo 'selected'; ?>>
                                                                BBBBB
                                                            </option>
                                                            <option
                                                                value="3" <?php if ($Select_Rat_row['Rat_Scroll5'] == 3) echo 'selected'; ?>>
                                                                CCCCC
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <!-- ------------------------------------------------------- -->
                                            <!-- ----------- Π Ρ Ο Σ Ο Χ Η ----------------------------- -->

                                            <!-- ΣΕ ΠΕΡΙΠΤΩΣΗ ΧΡΗΣΗΣ PHOTOGALERY, EDITOR ΚΛΠ, ΝΑ ΔΗΛΩΘΟΥΝ ΕΚ ΝΕΟΥ ΤΑ PATHS ΓΙΑ ΤΟ SAVE ΤΩΝ ΑΡΧΕΙΩΝ ΣΕ ΑΛΛΟΥΣ ΦΑΚΕΛΟΥΣ !!!! -->

                                            <!-- ------------------------------------------------------- -->

                                            <!--	dates	--><!--	dates	--><!--	dates	--><!--	dates	-->
                                            <!--	dates	--><!--	dates	-->

                                            <!--	date start	-->

                                            <?php
                                            if ($Select_Lists_row['List_DateStart'] <> "") {
                                                ?>

                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_DateStart']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <script type='text/JavaScript' src='scw.js'></script>
                                                        <input name="Rat_DateStart" id="Rat_DateStart" type="text"
                                                               value="<?php echo $Select_Rat_row['Rat_DateStart']; ?>">
                                                        <a href="javascript:;"><img src="elements/calendar.gif"
                                                                                    onClick="scwShow(document.getElementById('Rat_DateStart'),this);"
                                                                                    border="0"></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            <!--	date stop	-->

                                            <?php
                                            if ($Select_Lists_row['List_DateStop'] <> "") {
                                                ?>

                                                <tr>
                                                    <td width="35%" align="right"
                                                        class="text11blue"><?php echo $Select_Lists_row['List_DateStop']; ?>
                                                        :
                                                    </td>
                                                    <td width="65%">
                                                        <script type='text/JavaScript' src='scw.js'></script>
                                                        <input name="Rat_DateStop" id="Rat_DateStop" type="text"
                                                               value="<?php echo $Select_Rat_row['Rat_DateStop']; ?>">
                                                        <a href="javascript:;"><img src="elements/calendar.gif"
                                                                                    onClick="scwShow(document.getElementById('Rat_DateStop'),this);"
                                                                                    border="0"></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                        </table>


                                        <!--	buttons	-->
                                        <table width="95%" class="top15">
                                            <tr>
                                                <td valign="bottom" width="57%" align="right">
                                                    <input type="submit" class="publishSubmitSm" name="save_rec" value="Publish">
                                                </td>
                                                <td valign="bottom" width="38%" align="right"><a href="javascript:history.go(-1);" class="cancelSm"><i class="fas fa-reply"></i> Back</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="21">&nbsp;</td>
                                </tr>
                            </form>
                        </table>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>