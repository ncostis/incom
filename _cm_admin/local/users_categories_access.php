<?php
require_once("../init.php");
require_once($routes["settingsvars.php"]);
$Users_Page_Lang = $_SESSION['AdminLang'];
?>
<!DOCTYPE HTML>
<html class="cmspopup">
<head>
    <?php require_once($routes["head_script.php"]); ?>
    <?php require_once($routes["javascripts.php"]); ?>
   <link href="<?php echo $rootPath; ?>css/styles_templates.css" rel="stylesheet" type="text/css">
</head>
<?php
if (getparamvalue("submitaccess") == 'OK') {

    $Users_Pas_ID = $_POST['Users_Pas_ID'];
    $Section = $_POST['Section'];
    $cbnums = $_POST['cbnums'];

    // First delete all previous access for the user with ID=Users_Pas_ID (password id)
    $dq = "DELETE FROM users WHERE Users_Pas_ID = \"$Users_Pas_ID\" AND Users_Page_Lang = \"$Users_Page_Lang\" AND Users_Page_Section = '$Section'";
    q($dq);


    $cbn = 1;
    while ($cbn <= $cbnums) {
        $namecb = "cb" . $cbn;
        if (isset($_POST[$namecb])) {
            $Users_Page_ID = $_POST[$namecb];
            $qu = "INSERT INTO users(`Users_ID`,`Users_Pas_ID`,`Users_Page_ID`,`Users_Page_Section`,`Users_Page_Lang`)
			VALUES('','$Users_Pas_ID','$Users_Page_ID','$Section','$Users_Page_Lang')";
            q($qu);
        } else {
            $namecb = 0;
        }

        $cbn++;
    }

    ?>

    <script language="JavaScript">
        window.location = "users_access_view.php?Pas_ID=<?php echo $_GET['Pas_ID']; ?>&Name=<?php echo $_GET['Name']; ?>&Lang=<?php echo $_GET['Lang']; ?>&Section=<?php echo $_GET['Section']; ?>";
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

    while ($re_set = f($re)){
        ?>
        <tr>
            <td valign="middle">
                <?php
                if ($re_set['Parent_Page_ID'] == 0) {
                    echo str_repeat("&nbsp;", $F_echoSpaces) . "<span class='cDefault'>".$re_set["Page_Name"]."</span>";
                } else {
                    echo str_repeat("&nbsp;", $F_echoSpaces) . "&#149;&nbsp;" . "<span class='cDefault'>".$re_set["Page_Name"]."</span>";
                }

                ?>
            </td>
            <!--	edit	-->
            <td width="40" class="" valign="middle">
                <?php
                $numvar = $numvar + 1;
                $name = "cb" . $numvar;
                $namecb = "cb" . getparamvalue('cbn');

                // relate with table USERS for each PAGE_ID
                // equivalent to user Users_Pas_ID
                $cq = "select * from users where Users_Pas_ID = ".$_GET["Pas_ID"];
                $cq_re = q($cq);

                //If there is the same Page_ID then flag $checkbox = 1 and checked the checkbox
                $checkbox = 0;
                while ($Getcp = f($cq_re)) {
                    if ($Getcp['Users_Page_ID'] == $re_set['Page_ID']) {
                        $checkbox = 1;
                    }
                }
                ?>
                <input type="Checkbox" name="<?php echo $name; ?>"
                       value="<?php echo $re_set['Page_ID']; ?>" <?php if ($checkbox == '1') echo 'checked'; ?>>
            </td>
        </tr>
        <?php
        $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];

        $re1 = q($qu1);

        if (nr($re1) > 0) {

            $echoSpaces = $F_echoSpaces + 6;

            getCatCambRecursesion($re_set['Page_ID'], $echoSpaces);
        }

    }//end of while
}//end of function getCatCambRecursesion()
?>


    <body>
        <div class="outlinePopup">
            <div class="headAreaPopup bgColor">
                <div class="headTitle cLight">
                    <?php print $textDeclareAccLvl; ?><strong><?php echo getparamvalue('URL'); ?></strong>
                </div>
            </div>
        <table style="width:100%;" border="0" cellspacing="10" cellpadding="0" align="center">
            <tr>
                <td valign="top">
                    <table width="100%" border="0" cellspacing="4" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td class="cDefault"><?php print $textAuthUsrSite; ?>: <span class="cDefault"><?php echo getparamvalue('Name'); ?></span></td>
                                        <td class="cDefault" align="right"><?php print $textLanguage; ?> <span class="cDefault"><?php echo $Users_Page_Lang; ?></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table cellpadding=6 cellspacing=0 border=0>
                                    <tr>
                                        <td class="cDefault"><?php print $textSectionChr; ?>:</td>
                                        <?php
                                        $Sections_Sel = "SELECT * FROM sections";
                                        $Sections_Query = q($Sections_Sel);
                                        ?>
                                        <form name="website" method="POST" action="/cgi-bin/redirect.cgi" onSubmit="return false">
                                            <td>
                                                <select name="m1" onChange="jmp(this.form,0)" class="formField">
                                                    <?php
                                                    while ($GetSection = f($Sections_Query)) { ?>
                                                        <option
                                                            value="users_access_view.php?Pas_ID=<?php echo $_GET['Pas_ID']; ?>&Name=<?php echo $_GET['Name']; ?>&Lang=<?php echo $_GET['Lang']; ?>&Section=<?php echo $GetSection['Section_Name']; ?>" <?php if ($_GET['Section'] == $GetSection['Section_Name']) echo "selected"; ?>><?php echo $GetSection['Section_Title']; ?></option>
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
                                <form action="" method="post">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                        <!-- Start Query -->
                                        <?php echo getCatCambRecursesion(0, 2); ?>
                                    </table>
                                    <br>
                                    <table width="100%" cellpadding="4" border="0">
                                        <tr>
                                            <td align="right" width=260>
                                                <input type="hidden" name="Users_Pas_ID" value="<?php echo $_GET["Pas_ID"]; ?>">
                                                <input type="hidden" name="Section" value="<?php echo $_GET["Section"]; ?>">
                                                <input type="hidden" name="cbnums" value="<?php echo $numvar; ?>">
                                                <input type="hidden" name="submitaccess" value="OK">
                                                <input type="submit" class="textBigger bgColor cLight buttonLink " name="save_rec" value="Save">
                                            </td>
                                            <td align="right"><a href="javascript: self.close ()" class="cDefault buttonLink"><?php print $textCloseWind; ?></a></td>
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
    </body>
</html>