<SCRIPT LANGUAGE="JavaScript">
    <!-- // live popup code
    function jmp(form, elt)
// The first parameter is a reference to the form.
    {
        if (form != null) {
            with (form.elements[elt]) {
                if (0 <= selectedIndex)
                    location = options[selectedIndex].value;
            }
        }
    }

    // -->
</SCRIPT>


<!-- Πρέπει να επιλεγεί γλώσσα -->

<?php
require_once("init.php");
require_once($routes["settingsvars.php"]);

$MemAcc_Page_Lang = $_SESSION['AdminLang'];
?>

<!DOCTYPE HTML>
<html>
<head>
    <?php require_once($routes["head_script.php"]); ?>
</head>


<?php
if (getparamvalue("submitaccess") == 'OK') {

    $MemAcc_Mem_ID = $_POST['MemAcc_Mem_ID'];
    $Section = $_POST['Section'];
    $cbnums = $_POST['cbnums'];

    // First delete all previous access for the user with ID=MemAcc_Mem_ID (password id)
    $dq = "DELETE FROM members_access  WHERE MemAcc_Mem_ID = \"$MemAcc_Mem_ID\" AND MemAcc_Page_Lang = \"$MemAcc_Page_Lang\" AND MemAcc_Page_Section = '$Section'";
    q($dq);


    $cbn = 1;
    while ($cbn <= $cbnums) {
        $namecb = "cb" . $cbn;
        if (isset($_POST[$namecb])) {
            $MemAcc_Page_ID = $_POST[$namecb];
            $qu = "INSERT INTO members_access(`MemAcc_ID`,`MemAcc_Mem_ID`,`MemAcc_Page_ID`,`MemAcc_Page_Section`,`MemAcc_Page_Lang`)
			VALUES('','$MemAcc_Mem_ID','$MemAcc_Page_ID','$Section','$MemAcc_Page_Lang')";
            q($qu);
        } else {
            $namecb = 0;
        }

        $cbn++;
    }

    ?>

    <script language="JavaScript">
        window.location = "members_access_view.php?Mem_ID=<?php echo $_GET['Mem_ID'];?>&Name=<?php echo $_GET['Name'];?>&Lang=<?php echo $_GET['Lang'];?>&Section=<?php echo $_GET['Section'];?>";
    </script>

<?php } ?>



<?php
global $numvar;
$numvar = 0;

function getCatCambRecursesion($F_id, $F_echoSpaces)
{
    global $numvar;

    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Section = '".$_GET["Section"]."'";

    $re = q($qu);

    while ($re_set = f($re)) {
        ?>
        <tr>
            <td class="maingreenline" valign="middle">
                <?php if ($re_set['Parent_Page_ID'] == 0) {
                    echo str_repeat("&nbsp;", $F_echoSpaces) . "<span class='redTextb'>".$re_set["Page_Name"]."</span>";
                } else {
                    echo str_repeat("&nbsp;", $F_echoSpaces) . "&#149;&nbsp;" . "<span class='bodytext'>".$re_set["Page_Name"]."</span>";
                }

                ?>
            </td>
            <!--	edit	-->
            <td width="40" class="maingreenline" valign="middle">
                <?php
                $numvar = $numvar + 1;
                $name = "cb" . $numvar;
                $namecb = "cb" . getparamvalue('cbn');

                // Gia kathe Page_ID sisxetizei me to table users an yparxei
                // antistoixo gia ton user MemAcc_Mem_ID
                $cq = "select * FROM members_access  where MemAcc_Mem_ID = ".$_GET["Mem_ID"];
                $cq_re = q($cq);

                //An vrei oti yparxei idio Page_ID vazei to flag $checkbox = 1 kai kanei checked to checkbox
                $checkbox = 0;
                while ($Getcp = f($cq_re)) {
                    if ($Getcp['MemAcc_Page_ID'] == $re_set['Page_ID']) {
                        $checkbox = 1;
                    }
                }
                ?>
                <input type="Checkbox" name="<?php echo $name; ?>"
                       value="<?php echo $re_set['Page_ID']; ?>" <?php if ($checkbox == '1') echo 'checked'; ?>>
            </td>
        </tr>
        <?php $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];
        $re1 = q($qu1);
        if (nr($re1) > 0) {
            $echoSpaces = $F_echoSpaces + 6;
            getCatCambRecursesion($re_set['Page_ID'], $echoSpaces);
        }
    }//end of while
}//end of function getCatCambRecursesion()
?>


<!DOCTYPE HTML>
<html>
<head>
    <?php require_once($routes["head_script.php"]); ?>
</head>


<table style="width:90%; height:80px" border="0" cellspacing="10" cellpadding="0" align="center">
    <tr>
        <td class="main-border" valign="top">
            <table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                    <td height="30" class="MainTitle">
                        <table style="width:100%" cellspacing="0">
                            <tr>
                                <td height="28" bgcolor="F7F5DC"><h2><?php print $textDeclareAccLvl; ?>
                                    :<em><span class="bodytextblue"><b><?php echo getparamvalue('URL'); ?></b></span></em>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="f5f5f5">
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td class="bodytext"><?php print $textAuthUsrSite; ?>: <span
                                        class="pages11RedBold"><?php echo $_GET['Name']; ?></span></td>
                                <td class="bodytext" align="right"><?php print $textLanguage; ?>: <span
                                        class="pages11RedBold"><?php echo $MemAcc_Page_Lang; ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:" cellpadding=6 cellspacing=0 border=0>
                            <tr>
                                <td><?php print $textSectionChr; ?>:</td>
                                <?php
                                $Sections_Sel = "SELECT * FROM sections";
                                $Sections_Query = q($Sections_Sel);
                                ?>
                                <FORM NAME="website" METHOD="POST" ACTION="/cgi-bin/redirect.cgi"
                                      onSubmit="return false">
                                    <td>
                                        <SELECT NAME="m1" onChange="jmp(this.form,0)" class="selSection">
                                            <?php
                                            while ($GetSection = f($Sections_Query)) { ?>
                                                <option
                                                    value="members_access_view.php?Mem_ID=<?php echo $_GET['Mem_ID']; ?>&Name=<?php echo $_GET['Name']; ?>&Lang=<?php echo $_GET['Lang']; ?>&Section=<?php echo $GetSection['Section_Name']; ?>" <?php if ($_GET['Section'] == $GetSection['Section_Name']) echo "selected"; ?>><?php echo $GetSection['Section_Title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </form>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <FORM action="" method="post">
                            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                <!-- Start Query -->
                                <?php echo getCatCambRecursesion(0, 2); ?>
                            </table>
                            <br>
                            <table width="95%" class="top5">
                                <tr>
                                    <td valign="bottom" width="60%" align="right">
                                        <INPUT type="hidden" name="MemAcc_Mem_ID"
                                               value="<?php echo $_GET["Mem_ID"]; ?>">
                                        <INPUT type="hidden" name="Section" value="<?php echo $_GET["Section"]; ?>">
                                        <INPUT type="hidden" name="cbnums" value="<?php echo $numvar; ?>">
                                        <INPUT type="hidden" name="submitaccess" value="OK">
                                        <input type="submit" class="publishSubmitSm" name="save_rec" value="Publish">
                                    </td>
                                    <td valign="bottom" width="40%" align="right"><A href="javascript: self.close ()"
                                                         class=bodylinks><?php print $textCloseWind; ?></A></td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td width="21">&nbsp;</td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</html>