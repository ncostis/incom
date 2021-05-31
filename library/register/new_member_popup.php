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
    $Rec_ID = getparamvalue('Rec_ID');
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
            color: #525252;
        }

        #mainArea {
            display: block;
            width: <?php echo 	getparamvalue('width'); ?>px;
        }

        p {
            padding: 0px;
            margin: 0px;
        }

        h1 {
            font-family: Verdana;
            font-size: 16px;
            color: #7a7a7a;
            font-weight: normal;
            letter-spacing: 2px;
        }

        table, td, th {
            border: 0;
            padding: 4px;
            border-collapse: collapse;
        }

        .error {
            color: #ce1515;
        }

        .formfields {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            font-weight: normal;
            font-style: normal;
            height: 18px;
            padding: 0 5px;
            -moz-box-shadow: inset 0 4px 4px #f6f6f6;
            -webkit-box-shadow: inset 0 4px 4px #f6f6f6;
            box-shadow: inset 0 4px 4px #f6f6f6;
            border: 1px solid #bababa;
            color: #345762;
        }

        .formfieldsSel {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            padding: 2px 2px;
            color: #345762;
            font-size: 11px;
        }

        .formsubmit {
            border: 1px solid #4c4c4c;
            cursor: pointer;
            margin-top: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            padding: 3px 10px;
            color: #fff;
            background-color: #151515;
            font-family: Verdana;
            font-size: 11px;
            text-decoration: none;
        }

        .left {
            float: left;
            margin: 0;
        }

        .left10 {
            float: left;
            margin: 0px 0px 0px 10px;
        }

        .left30 {
            float: left;
            margin: 0px 0px 0px 30px;
        }

        .top5 {
            padding-top: 5px;
        }

        .top10 {
            padding-top: 10px;
        }

        .right {
            float: right;
            margin: 0;
        }
    </style>
</head>

<script language="JavaScript" src="<?php echo $rootURL; ?>js/form_validator.js" type="text/javascript"></script>

<div id="mainArea">
    <div style="padding-top:25px; padding-bottom:6px;" align="center">
        <h1>[ <?php echo $newMember; ?> ]</h1>
    </div>
    <div style="border-bottom:1px dotted #bdbdbd;"></div>
    <div style="padding:20px;">

        <?php
        $error = "";
        $secret_text = getparamvalue('secret_text');
        $user_text = getparamvalue('user_text');

        if (getparamvalue("submitmembers") == 'OK') {
            $error = "no";
            // Check if user exists
            $username = getparamvalue('Mem_Usn');
            $GetMemberUsn_Sel = "SELECT * FROM members Where Mem_Usn = '" . $username . "'";
            $GetMemberUsn_Query = q($GetMemberUsn_Sel);
            if (nr($GetMemberUsn_Query) > 0) {
                $error = "usn";
            }

            // Check if e-mail exists
            $email = getparamvalue('Mem_Email');
            $GetMemberMail_Sel = "SELECT * FROM members Where Mem_Email = '" . $email . "'";
            $GetMemberMail_Query = q($GetMemberMail_Sel);
            if (nr($GetMemberMail_Query) > 0) {
                $error = "email";
            }

            if ($error == "no") {
                //date creation
                $creationdate = gmdate("Y-m-d,H:i", $timestamp);
                $mempsw = md5($_POST['Mem_Psw']);
                $sUserName = getparamvalue('Mem_Usn');
                $mem_name = getparamvalue('Mem_Name');
                $sEmail = getparamvalue('Mem_Email');
                $sTel = getparamvalue('Mem_Tel');
                $sMobile = getparamvalue('Mem_Mobile');
                $sCity = getparamvalue('Mem_City');
                $sCompany = getparamvalue('Mem_Company');
                $sSector = getparamvalue('Mem_Sector');
                $sCountry = getparamvalue('Mem_Country');
                $sZone = getparamvalue('Zone');
                $sTK = getparamvalue('Mem_TK');
                $sPosition = getparamvalue('Mem_Position');

                $qu = "INSERT INTO members(`Mem_ID`, `Mem_Usn`, `Mem_Psw`, `Mem_Name`, `Mem_Email`, `Mem_Tel`, `Mem_Mobile`, `Mem_City`, `Mem_Company`, `Mem_Zone`, `Mem_Sector`, `Mem_Country`, `Mem_TK`, `Mem_Position`, `Mem_Level`, `Mem_Creation_Date`)
            VALUES('',
            '$sUserName',
            '$mempsw',
            '$mem_name',
            '$sEmail',
            '$sTel',
            '$sMobile',
            '$sCity',
            '$sCompany',
            '$sSector',
            '$sCountry',
            '$sZone',
            '$sTK',
            '$sPosition',
            '0',
            '$creationdate')";
                q($qu);

                $Email = getparamvalue('Mem_Email');
                $FullName = getparamvalue('Mem_Name');
                $headers .= "From: $FullName <$Email>" .
                    "\nMIME-Version: 1.0\n" .
                    "Content-type: text/html; charset=utf-8\n";
                "Content-Transfer-Encoding: 7bit\n\n";

                // Sent e-mail
                //mail("elena@overronet.com","New Member","Extranet New Member",$headers);

                // WAITING FOR ACTIVATION
                $GetRecMem_Sel = "SELECT * FROM pages, records WHERE Page_View = 'waiting_activation_" . $Lang . "' AND Rec_Page_ID = Page_ID";
                $GetRecMem_Query = q($GetRecMem_Sel);
                $GetRecMem = f($GetRecMem_Query);
                print "<div align='center'>";
                getEditor($GetRecMem['Rec_ID'], $Path_Texts, 1, $style, $path);
                print "</div><br /><br />";
            } // if error no
        } // submitmembers


        $GetMember_Sel = "SELECT * FROM members Where Mem_ID = ".$_SESSION["MemberMemID"];
        $GetMember_Query = q($GetMember_Sel);
        $GetMember = f($GetMember_Query);
        ?>

        <div class="top15">
            <FORM action="" name="myform" method="post">
                <?php if ($error == "usn") {
                    print"<div style=\"padding-bottom:10px;\" class=\"error\">$usnexist<br><br><br><a href=\"javascript:history.go(-1)\" class=\"formsubmit\">&laquo; $back</a></div>";
                }
                if ($error == "email") {
                    print"<div style=\"padding-bottom:10px;\" class=\"error\">$emailexist<br><br><br><a href=\"javascript:history.go(-1)\" class=\"formsubmit\">&laquo; $back</a></div>";
                }
                if ($error == "securitycode") {
                    print"<div style=\"padding-bottom:10px;\" class=\"error\">$securitycodeErr<br><br><br><a href=\"javascript:history.go(-1)\" class=\"formsubmit\">&laquo; $back</a></div>";
                }

                if (($error <> "no") AND ($error == ""))  { ?>

                <div style="padding-bottom:20px;">
                    <?php $GetRecMem_Sel = "SELECT * FROM pages, records WHERE Page_View = 'new_member_$Lang' AND Rec_Page_ID = Page_ID";
                    $GetRecMem_Query = q($GetRecMem_Sel);
                    $GetRecMem = f($GetRecMem_Query);

                    getEditor($GetRecMem['Rec_ID'], $Path_Texts, 1, $style, $path); ?>
                </div>

                <div class="left10">
                    <table>
                        <tr>
                            <td class="formtext paddForm"><?php echo $fullnamextr; ?></td>
                            <td class="paddForm"><input type="text" name="Mem_Name"
                                                        value="<?php echo getparamvalue('Mem_Name'); ?>" size="35" maxlength="40"
                                                        class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                        <tr>
                            <td class="formtext paddForm">E-Mail</td>
                            <td class="paddForm"><input type="text" name="Mem_Email"
                                                        value="<?php echo getparamvalue('Mem_Email'); ?>" size="35" maxlength="100"
                                                        class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                        <tr>
                            <td class="formtext paddForm"><?php echo $phonextr; ?></td>
                            <td class="paddForm"><input type="text" name="Mem_Tel" value="<?php echo getparamvalue('Mem_Tel'); ?>"
                                                        size="35" maxlength="100" class="formfields"></td>
                        </tr>
                        <tr>
                            <td class="formtext paddForm"><?php echo $mobilephonextr; ?></td>
                            <td class="paddForm"><input type="text" name="Mem_Mobile"
                                                        value="<?php echo getparamvalue('Mem_Mobile'); ?>" size="35"
                                                        maxlength="100" class="formfields"></td>
                        </tr>
                        <tr>
                            <td class="formtext paddForm"><?php echo $addressxtr; ?></td>
                            <td class="paddForm"><input type="text" name="Mem_Address"
                                                        value="<?php echo getparamvalue('Mem_Address'); ?>" size="35"
                                                        maxlength="100" class="formfields"></td>
                        </tr>
                        <tr>
                            <td class="formtext paddForm"><?php echo $cityxtr; ?></td>
                            <td class="paddForm"><input type="text" name="Mem_City"
                                                        value="<?php echo getparamvalue('Mem_City'); ?>" size="35"
                                                        class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                        <tr>
                            <td class="formtext paddForm"><?php echo $zipcodextr; ?></td>
                            <td class="paddForm"><input type="text" name="Mem_TK" value="<?php echo getparamvalue('Mem_TK'); ?>"
                                                        size="35" maxlength="100" class="formfields"></td>
                        </tr>
                        <tr>
                            <td class="formtext"><?php echo $countryxtr; ?></td>
                            <td>
                                <select name="Mem_Country" size=1 class="formfieldsSel">
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                    <option>American Samoa</option>
                                    <option>Andorra</option>
                                    <option>Angola</option>
                                    <option>Anguilla</option>
                                    <option>Antarctica</option>
                                    <option>Antigua and Barbuda</option>
                                    <option>Argentina</option>
                                    <option>Armenia</option>
                                    <option>Aruba</option>
                                    <option>Australia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Bahamas</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Barbados</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bermuda</option>
                                    <option>Bhutan</option>
                                    <option>Bolivia</option>
                                    <option>Bosnia and Herzegovina</option>
                                    <option>Botswana</option>
                                    <option>Bouvet Island</option>
                                    <option>Brazil</option>
                                    <option>Brunei Darussalam</option>
                                    <option>Bulgaria</option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi</option>
                                    <option>Cambodia</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                    <option>Cape Verde</option>
                                    <option>Cayman Islands</option>
                                    <option>Central African Republic</option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>Christmas Island</option>
                                    <option>Cocos (Keeling) Islands</option>
                                    <option>Colombia</option>
                                    <option>Comoros</option>
                                    <option>Congo</option>
                                    <option>Congo</option>
                                    <option>Cook Islands</option>
                                    <option>Costa Rica</option>
                                    <option>Cote D'ivoire</option>
                                    <option>Croatia</option>
                                    <option>Cuba</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Djibouti</option>
                                    <option>Dominica</option>
                                    <option>Dominican Republic</option>
                                    <option>Ecuador</option>
                                    <option>Egypt</option>
                                    <option>El Salvador</option>
                                    <option>Equatorial Guinea</option>
                                    <option>Eritrea</option>
                                    <option>Estonia</option>
                                    <option>Ethiopia</option>
                                    <option>Falkland Islands (Malvinas)</option>
                                    <option>Faroe Islands</option>
                                    <option>Fiji</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>French Guiana</option>
                                    <option>French Polynesia</option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Ghana</option>
                                    <option>Gibraltar</option>
                                    <option>Greece</option>
                                    <option>Greenland</option>
                                    <option>Grenada</option>
                                    <option>Guadeloupe</option>
                                    <option>Guam</option>
                                    <option>Guatemala</option>
                                    <option>Guinea</option>
                                    <option>Guinea-bissau</option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Vatican City State</option>
                                    <option>Honduras</option>
                                    <option>Hong Kong</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Ireland</option>
                                    <option>Israel</option>
                                    <option>Italy</option>
                                    <option>Jamaica</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Kenya</option>
                                    <option>Kiribati</option>
                                    <option>Korea Northf</option>
                                    <option>Korea South</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Lao</option>
                                    <option>Latvia</option>
                                    <option>Lebanon</option>
                                    <option>Lesotho</option>
                                    <option>Liberia</option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Macao</option>
                                    <option>Madagascar</option>
                                    <option>Malawi</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands</option>
                                    <option>Martinique</option>
                                    <option>Mauritania</option>
                                    <option>Mauritius</option>
                                    <option>Mayotte</option>
                                    <option>Mexico</option>
                                    <option>Micronesia</option>
                                    <option>Moldova</option>
                                    <option>Monaco</option>
                                    <option>Mongolia</option>
                                    <option>Montserrat</option>
                                    <option>>Morocco</option>
                                    <option>Mozambique</option>
                                    <option>Myanmar</option>
                                    <option>Namibia</option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands</option>
                                    <option>Netherlands Antilles</option>
                                    <option>New Caledonia</option>
                                    <option>New Zealand</option>
                                    <option>Nicaragua</option>
                                    <option>Niger</option>
                                    <option>Nigeria</option>
                                    <option>Niue</option>
                                    <option>Norfolk Island</option>
                                    <option>Northern Mariana Islands</option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>Palau</option>
                                    <option>Palestinian Territory, Occupied</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea</option>
                                    <option>Paraguay</option>
                                    <option>Peru</option>
                                    <option>Philippines</option>
                                    <option>Pitcairn</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Puerto Rico</option>
                                    <option>Qatar</option>
                                    <option>Reunion</option>
                                    <option>Romania</option>
                                    <option>Russia</option>
                                    <option>Rwanda</option>
                                    <option>Saint Kitts and Nevis</option>
                                    <option>Saint Lucia</option>
                                    <option>Saint Pierre and Miquelon</option>
                                    <option>Saint Vincent & The Grenadines</option>
                                    <option>Samoa</option>
                                    <option>San Marino</option>
                                    <option>Sao Tome and Principe</option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal</option>
                                    <option>Serbia and Montenegro</option>
                                    <option>Seychelles</option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore</option>
                                    <option>Slovakia</option>
                                    <option>Slovenia</option>
                                    <option>Solomon Islands</option>
                                    <option>Somalia</option>
                                    <option>South Africa</option>
                                    <option>Spain</option>
                                    <option>Sri Lanka</option>
                                    <option>Sudan</option>
                                    <option>Suriname</option>
                                    <option>Svalbard and Jan Mayen</option>
                                    <option>Swaziland</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikistan</option>
                                    <option>Tanzania</option>
                                    <option>Thailand</option>
                                    <option>Timor-leste</option>
                                    <option>Togo</option>
                                    <option>Tokelau</option>
                                    <option>Tonga</option>
                                    <option>Trinidad and Tobago</option>
                                    <option>Tunisia</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>Turks and Caicos Islands</option>
                                    <option>Tuvalu</option>
                                    <option>Uganda</option>
                                    <option>Ukraine</option>
                                    <option>United Arab Emirates</option>
                                    <option>United Kingdom</option>
                                    <option selected>United States (U.S.A.)</option>
                                    <option>Uruguay</option>
                                    <option>Uzbekistan</option>
                                    <option>Vanuatu</option>
                                    <option>Venezuela</option>
                                    <option>Vietnam</option>
                                    <option>Virgin Islands, British</option>
                                    <option>Virgin Islands, U.S.</option>
                                    <option>Wallis and Futuna</option>
                                    <option>Western Sahara</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="left30">
                    <table>
                        <tr>
                            <td class="formtext"><?php echo $companynamextr; ?></td>
                            <td><input type="text" name="Mem_Company" size="35"
                                       value="<?php echo getparamvalue('Mem_Company'); ?>" maxlength="40" class="formfields">&nbsp;<span
                                    class="formstar">(*)</span></td>
                        </tr>
                        <!--<tr>
         <td class="formtext"><?php print "$AFM"; ?></td>
         <td><input type="text" name="Mem_AFM" value="<?php echo getparamvalue('Mem_AFM'); ?>" size="35" maxlength="100" class="formfields">&nbsp;<span class="formstar">(*)</span></td>
      </tr>
      <tr>
         <td class="formtext"><?php print "$Doy"; ?></td>
         <td><input type="text" name="Mem_Doy" value="<?php echo getparamvalue('Mem_Doy'); ?>" size="35" maxlength="40" class="formfields">&nbsp;<span class="formstar">(*)</span></td>
      </tr> -->
                        <tr>
                            <td class="formtext"><?php echo $sector; ?></td>
                            <td>
                                <select name="Mem_Sector" class="formfieldsSel">
                                    <option selected>-- <?php echo $select; ?> --</option>
                                    <option value="Tour Operator"><?php echo $tourop; ?></option>
                                    <option value="Travel Agent"><?php echo $travelag; ?></option>
                                    <option value="Other"><?php echo $sectorother; ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="formtext"><?php echo $position; ?></td>
                            <td><input type="text" name="Mem_Position" value="<?php echo getparamvalue('Mem_Position'); ?>"
                                       size="35" maxlength="100" class="formfields"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="top5">
                                    <table style="border:1px dotted #e64506;">
                                        <tr>
                                            <td class="formtext">&nbsp;&nbsp;<?php echo $membersuser; ?>&nbsp;</td>
                                            <td><input type="text" name="Mem_Usn"
                                                       value="<?php echo getparamvalue('Mem_Usn'); ?>" size="35"
                                                       maxlength="100" class="formfields">&nbsp;<span class="formstar">(*)</span>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="formtext">&nbsp;&nbsp;<?php echo $memberspass; ?>&nbsp;</td>
                                            <td><input type="password" name="Mem_Psw" size="35" maxlength="100"
                                                       class="formfields">&nbsp;<span class="formstar">(*)</span>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            </td>
                        </tr>

                        <tr>
                            <td class="formtext" colspan="2"><?php echo $seccode; ?></td>
                        </tr>
                        <tr>
                            <td class="formtext">
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
                            </td>
                            <td><input name="user_text" type="text" class="formfields" id="user_text" size="35"></td>
                        </tr>
                    </table>
                </div>
                <div style="clear:both;"></div>

                <div class="top10">
                    <div class="left" style="width:710px;">
                        <table>
                            <tr>
                                <td>
                                    <style>li {
                                            font-family: Verdana;
                                            font-size: 11px;
                                            color: #d53045;
                                        }</style>
                                    <div id='myform_errorloc' class='error_strings'></div>
                                </td>
                            </tr>
                        </table>
                        <div class="top10">
                            <em>( * <?php echo $requiredxtr; ?> )</em>
                        </div>
                        &nbsp;
                    </div>
                    <div class="left top10">
                        <INPUT type="hidden" name="submitmembers" value="OK">
                        <!--<input type="submit" value=" Submit  " name="formsubmit" class="formsubmit">-->
                        <input type="image" src="<?php echo $rootURL; ?>elements/submit_popup_<?php echo $Lang; ?>.png">
                    </div>
                    <div style="clear:both;"></div>
                </div>

            </form>
            <?php } // submitmembers  ?>
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
    //You should create the validator only after the definition of the HTML form
    var frmvalidator = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("Mem_Usn", "req", "<?php echo $fillusn; ?>");
    frmvalidator.addValidation("Mem_Usn", "maxlen=20", "<?php echo $maxlength; ?>");
    frmvalidator.addValidation("Mem_Psw", "req", "<?php echo $fillpsw; ?>");
    frmvalidator.addValidation("Mem_Name", "req", "<?php echo $fillfullname; ?>");
    frmvalidator.addValidation("Mem_City", "req", "<?php echo $fillcity; ?>");
    frmvalidator.addValidation("Mem_Company", "req", "<?php echo $fillcompany; ?>");
    frmvalidator.addValidation("user_text", "req", "<?php echo $securitycode; ?>");
    frmvalidator.addValidation("Mem_Tel", "numeric", "<?php echo $validnumber; ?>");
    frmvalidator.addValidation("Mem_Mobile", "numeric", "<?php echo $validnumber; ?>");
    frmvalidator.addValidation("Mem_Email", "maxlen=50");
    frmvalidator.addValidation("Mem_Email", "req", "<?php echo $fillmail; ?>");
    frmvalidator.addValidation("Mem_Email", "email", "<?php echo $validmail; ?>");
    //    frmvalidator.addValidation("Mem_Tel","req","<?php //echo $fillnumber; ?>//");
    //    frmvalidator.addValidation("Mem_Address","req","<?php //echo $filladdress; ?>//");
    //    frmvalidator.addValidation("Mem_Sector","req","<?php //echo $fillsector; ?>//");
    //    frmvalidator.addValidation("Mem_AFM","req","<?php //echo $fillAFM; ?>//");
    //    frmvalidator.addValidation("Mem_Doy","req","<?php //echo $fillDoy; ?>//");
    //    frmvalidator.addValidation("Mem_AFM","numeric","<?php //echo $validnumber; ?>//");
</script>

