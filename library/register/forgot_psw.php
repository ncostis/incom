<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php
    $path = "../../";
    require "../init.php";
    $elements = $rootURL . "elements";
    $Lang = getparamvalue('Lang');
    require "../text_lang.php";
    ?>

    <style type="text/css">

        body {
            padding: 0;
            margin: 0;
            background-color: #f8f8f8;
            background-repeat: repeat-x;
            background-position: center top;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #707070;
        }

        p {
            padding: 0px;
            margin: 0px;
        }

        h1 {
            font-family: Tahoma;
            font-size: 16px;
            color: #7a7a7a;
            font-weight: normal;
            letter-spacing: 2px
        }

        table, td, th {
            border: 0;
            padding: 0px;
            border-collapse: collapse;
        }

        .formtext {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #7a7a7a;
            font-weight: normal;
            border: 1px solid #c9c9c9;
        }

        a.bodylinks {
            font-family: Tahoma;
            font-size: 11px;
            color: #4187a8;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover.bodylinks {
            font-family: Tahoma;
            font-size: 11px;
            color: #4187a8;
            text-decoration: underline;
            font-weight: normal;
        }

        .left {
            float: left;
            margin: 0;
        }

        .left7 {
            float: left;
            margin: 0px 0px 0px 7px;
        }
    </style>

</head>
<body>
<?php
$path = "";
$userEmail = getparamvalue('Mem_Email');
$secret_text = getparamvalue('secret_text');
$user_text = getparamvalue('user_text');
?>

<div style="padding-left:100px; padding-top:30px; padding-bottom:10px;">
    <h1>[ <?php echo $getpassword; ?> ]</h1>
</div>
<div style="border-bottom:1px dotted #bdbdbd;"></div>
<div style="padding-left:100px; padding-top:10px;">

    <?php
    if ((!ereg(".+\@.+\..+", $userEmail)) || (!ereg("^[a-zA-Z0-9_@.-]+$", $userEmail))) {
        $error .= $fillmail . "<br>";
    }
    if ($secret_text <> $user_text) $error .= $securitycode;

    if (($userEmail <> "") AND ($error == "")) {

        // SEND E-MAIL
        $selMember = "SELECT * FROM members WHERE Mem_Email = '$userEmail'";
        $resMember = q($selMember);
        $Member = f($resMember);
//	$Psw = $Member['Mem_Psw'];


        if (nr($resMember) > 0) {
            $Psw = substr(md5(rand() . rand()), 0, 8);
            $new_password = md5($Psw);
            $Update_SQL = "UPDATE members SET Mem_Psw='$new_password' WHERE Mem_Email = '$userEmail'";
            $change_password = q($Update_SQL);

            $message = "
		Dear User,
		Your Password is:
		<b>$Psw</b>
			
		Thank you
		";
            $headers .= "From: $userEmail;" .
                "\nMIME-Version: 1.0\n" .
                "Content-type: text/html; charset=utf-8\n";
            "Content-Transfer-Encoding: 7bit\n\n";

            $subject = "website - password";
            $message = str_replace("\n", "<br>", $message);
            mail($userEmail, "$subject", "$message", $headers);
            print "
			<div style='padding-top:10px;'>$sendpassword <b>$userEmail</b></div>";
        } else {
            print "
			<div style='padding-top:10px;'>$emailnoexist &nbsp; <b>$userEmail</b></div>";
        }

    } else {

    if (getparamvalue('sendform') == "OK") print "<strong>$error</strong><br />";
    ?>

    <div style="padding-top:10px;">
        <form method="post" name="myform" action="forgot_psw.php?Lang=<?php echo $Lang; ?>">
            &nbsp;<?php echo $entermail; ?>
            <div style="padding-top:3px; padding-bottom:15px;">
                <input type="text" name="Mem_Email" value="<?php echo $userEmail; ?>" size="30" maxlength="60"
                       class="formtext">
            </div>
            <?php echo $seccode; ?>:
            <div style="padding-top:3px; padding-bottom:15px;">
                <div class="left" style="padding-top:3px;">
                    <?php
                    //how many letters/numbers must code have
                    $number_of_letters = 5;
                    $secret_text = "";
                    for ($i = 0; $i < $number_of_letters; $i++) {
                        $ntext = rand(1, 62);
                        $folder = $rootURL . "elements/form/";
                        echo "<img src=\"$folder/$ntext.jpg\" width=16 height=16>";

                        switch ($ntext) {
                            case 10:
                                $ntext = "0";
                                break;
                            case 11:
                                $ntext = "A";
                                break;
                            case 12:
                                $ntext = "B";
                                break;
                            case 13:
                                $ntext = "C";
                                break;
                            case 14:
                                $ntext = "D";
                                break;
                            case 15:
                                $ntext = "E";
                                break;
                            case 16:
                                $ntext = "F";
                                break;
                            case 17:
                                $ntext = "G";
                                break;
                            case 18:
                                $ntext = "H";
                                break;
                            case 19:
                                $ntext = "I";
                                break;
                            case 20:
                                $ntext = "J";
                                break;
                            case 21:
                                $ntext = "K";
                                break;
                            case 22:
                                $ntext = "L";
                                break;
                            case 23:
                                $ntext = "M";
                                break;
                            case 24:
                                $ntext = "N";
                                break;
                            case 25:
                                $ntext = "O";
                                break;
                            case 26:
                                $ntext = "P";
                                break;
                            case 27:
                                $ntext = "Q";
                                break;
                            case 28:
                                $ntext = "R";
                                break;
                            case 29:
                                $ntext = "S";
                                break;
                            case 30:
                                $ntext = "T";
                                break;
                            case 31:
                                $ntext = "U";
                                break;
                            case 32:
                                $ntext = "V";
                                break;
                            case 33:
                                $ntext = "W";
                                break;
                            case 34:
                                $ntext = "X";
                                break;
                            case 35:
                                $ntext = "Y";
                                break;
                            case 36:
                                $ntext = "Z";
                                break;
                            case 37:
                                $ntext = "a";
                                break;
                            case 38:
                                $ntext = "b";
                                break;
                            case 39:
                                $ntext = "c";
                                break;
                            case 40:
                                $ntext = "d";
                                break;
                            case 41:
                                $ntext = "e";
                                break;
                            case 42:
                                $ntext = "f";
                                break;
                            case 43:
                                $ntext = "g";
                                break;
                            case 44:
                                $ntext = "h";
                                break;
                            case 45:
                                $ntext = "i";
                                break;
                            case 46:
                                $ntext = "j";
                                break;
                            case 47:
                                $ntext = "k";
                                break;
                            case 48:
                                $ntext = "l";
                                break;
                            case 49:
                                $ntext = "m";
                                break;
                            case 50:
                                $ntext = "n";
                                break;
                            case 51:
                                $ntext = "o";
                                break;
                            case 52:
                                $ntext = "p";
                                break;
                            case 53:
                                $ntext = "q";
                                break;
                            case 54:
                                $ntext = "r";
                                break;
                            case 55:
                                $ntext = "s";
                                break;
                            case 56:
                                $ntext = "t";
                                break;
                            case 57:
                                $ntext = "u";
                                break;
                            case 58:
                                $ntext = "v";
                                break;
                            case 59:
                                $ntext = "w";
                                break;
                            case 60:
                                $ntext = "x";
                                break;
                            case 61:
                                $ntext = "y";
                                break;
                            case 62:
                                $ntext = "z";
                                break;
                        }
                        $secret_text = $secret_text . $ntext;
                    }
                    ?>
                    <input type="hidden" name="secret_text" value="<?php echo $secret_text; ?>">
                </div>
                <div class="left7"><input name="user_text" type="text" class="formtext" id="name" size="15"></div>
                <div style="clear:both;"></div>
            </div>


            <div style="padding-left:104px;">
                <input type="hidden" name="url" value="<?php echo getparamvalue('url'); ?>"/>
                <input type="hidden" name="sendform" value="OK"/>
                <input type="image" src="<?php echo $rootURL; ?>elements/submit_popup_<?php echo $Lang; ?>.png">
            </div>
        </form>
        <?php } ?>
    </div>
</body>