<?php require "LANG/$Lang.php"; ?>
<script language="JavaScript" src="<?php echo $rootURL; ?>js/form_validator.js" type="text/javascript"></script>

<div>
    <div style="padding-left:20px;">

        <?php
        $query_Countries = "SELECT * FROM eshop_countries";
        $Countries = q($query_Countries);
        $row_Countries = f($Countries);


        if (getparamvalue("submitmembers") == 'OK') {
            // Check if user exists
            $username = getparamvalue('Mem_Usn');
            $GetMemberUsn_Sel = "SELECT * FROM members Where Mem_Usn = '" . $username . "'";
            $GetMemberUsn_Query = q($GetMemberUsn_Sel);
        if (nr($GetMemberUsn_Query) > 0) {
            ?>
            <script language="JavaScript">
                window.location = "<?php echo $siteURL; ?>new_member/0/usn";
            </script>
        <?php
        }
        // Check if e-mail exists
        $email = getparamvalue('Mem_Email');
        $GetMemberMail_Sel = "SELECT * FROM members Where Mem_Email = '" . $email . "'";
        $GetMemberMail_Query = q($GetMemberMail_Sel);
        if (nr($GetMemberMail_Query) > 0) {
        ?>
            <script language="JavaScript">
                window.location = "<?php echo $siteURL; ?>new_member/0/email";
            </script>
        <?php
        }


        if ((nr($GetMemberUsn_Query) == 0) AND (nr($GetMemberMail_Query) == 0)) {
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
        }

        // Sent e-mail
        //mail("info@overronet.com","New Member","Extranet New Member","from: www.titania.gr");
        ?>

            <script language="JavaScript">
                window.location = "<?php echo $siteURL; ?>waiting_activation";
            </script>

        <?php } ?>


        <?php
        $GetMember_Sel = "SELECT * FROM members Where Mem_ID = ".$_SESSION["MemberMemID"];
        $GetMember_Query = q($GetMember_Sel);
        $GetMember = f($GetMember_Query);
        ?>

        <div id="top15">
            <FORM action="" name="myform" method="post">
                <?php if (getparamvalue('var1') == "usn") { ?>
                    <div style="padding-bottom:10px;" colspan="2"><?php echo $usnexist; ?></div>
                <?php } ?>
                <?php if (getparamvalue('var1') == "email") { ?>
                    <div style="padding-bottom:10px;" colspan="2"><?php echo $emailexist; ?></div>
                <?php } ?>


                <div class="left">
                    <table>
                        <tr>
                            <td class="formtext"><?php print $Translation['Name']; ?></td>
                            <td><input type="text" name="Mem_Name" value="<?php echo getparamvalue('Mem_Name'); ?>" size="40"
                                       maxlength="40" class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                        <tr>
                            <td class="formtext">E-Mail</td>
                            <td><input type="text" name="Mem_Email" value="<?php echo getparamvalue('Mem_Email'); ?>" size="40"
                                       maxlength="100" class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                        <tr>
                            <td class="formtext"><?php print $Translation['Phone']; ?></td>
                            <td><input type="text" name="Mem_Tel" value="<?php echo getparamvalue('Mem_Tel'); ?>" size="40"
                                       maxlength="100" class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                        <tr>
                            <td class="formtext"><?php print $Translation['Town']; ?></td>
                            <td><input type="text" name="Mem_City" value="<?php echo getparamvalue('Mem_City'); ?>" size="40"
                                       class="formfields">&nbsp;<span class="formstar">(*)</span></td>
                        </tr>
                    </table>
                </div>

                <div class="left10">
                    <table>
                        <tr>
                            <td class="formtext"><?php print $Translation['Mem_Zone']; ?></td>
                            <td>
                                <select name="Zone" class="formfieldsSel" autocomplete="off">
                                    <?php
                                    do {
                                        ?>
                                        <option
                                            value="<?php echo $row_Countries['Region'] ?>"><?php echo $row_Countries['Description'] ?></option>
                                        <?php
                                    } while ($row_Countries = f($Countries));
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td class="formtext"><?php print $Translation['Country']; ?></td>
                            <td>
                                <select name=Country size=1 class="formfields">
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                    <option>American Samoa</option>
                                    <option>Andorra</option>
                                    <option>Angola</option>
                                    <option>Anguilla</option>
                                    <option>Antarctica</option>
                                    <option>Antigua/Barbuda</option>
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
                                    <option>Bosnia</option>
                                    <option>Botswana</option>
                                    <option>Bouvet Island</option>
                                    <option>Brazil</option>
                                    <option>British Indian Ocean Territory</option>
                                    <option>British West Indies</option>
                                    <option>Brunei Darussalam</option>
                                    <option>Bulgaria</option>
                                    <option>Burkina Faso</option>
                                    <option>Burma</option>
                                    <option>Burundi</option>
                                    <option>Cambodia</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                    <option>Cape Verde</option>
                                    <option>Cayman Islands</option>
                                    <option>Central Africa</option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>Christmas Island</option>
                                    <option>Cocos (Keeling) Islands</option>
                                    <option>Colombia</option>
                                    <option>Comoros</option>
                                    <option>Congo</option>
                                    <option>Cook Islands</option>
                                    <option>Costa Rica</option>
                                    <option>Cote D'Ivoire</option>
                                    <option>Croatia</option>
                                    <option>Cuba</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Djibouti</option>
                                    <option>Dominica</option>
                                    <option>Dominican Republic</option>
                                    <option>East Timor</option>
                                    <option>Ecuador</option>
                                    <option>Egypt</option>
                                    <option>El Salvador</option>
                                    <option>England</option>
                                    <option>Equatorial Guinea</option>
                                    <option>Eritrea</option>
                                    <option>Estonia</option>
                                    <option>Ethiopia</option>
                                    <option>Faeroe Islands</option>
                                    <option>Falkland Islands</option>
                                    <option>Fiji</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>French Polynesia</option>
                                    <option>French Southern Territories</option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Gaza</option>
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
                                    <option>Guiana</option>
                                    <option>Guinea</option>
                                    <option>Guinea-Bissau</option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Heard And Mcdonald Islands</option>
                                    <option>Held Territories</option>
                                    <option>Honduras</option>
                                    <option>Hong Kong</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>India</option>
                                    <option>Indian Ocean Islands</option>
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
                                    <option>Korea</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Laos</option>
                                    <option>Latvia</option>
                                    <option>Lebanon</option>
                                    <option>Lesotho</option>
                                    <option>Liberia</option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Macau</option>
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
                                    <option>Morocco</option>
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
                                    <option>North Korea</option>
                                    <option>Northern Ireland</option>
                                    <option>Northern Mariana Islands</option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>Palau</option>
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
                                    <option>Saint Lucia</option>
                                    <option>San Marino</option>
                                    <option>Sao Tome And Principe</option>
                                    <option>Saudi Arabia</option>
                                    <option>Scotland</option>
                                    <option>Senegal</option>
                                    <option>Seychelles</option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore</option>
                                    <option>Slovak Republic</option>
                                    <option>Slovenia</option>
                                    <option>Solomon Islands</option>
                                    <option>Somalia</option>
                                    <option>South Africa</option>
                                    <option>South Georgia</option>
                                    <option>Spain</option>
                                    <option>Sri Lanka</option>
                                    <option>St. Helena</option>
                                    <option>St. Kitts &amp; Nevis</option>
                                    <option>St. Pierre</option>
                                    <option>St. Vincent &amp; Grendadines</option>
                                    <option>Sudan</option>
                                    <option>Suriname</option>
                                    <option>Svalbard Islands</option>
                                    <option>Swaziland</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikistan</option>
                                    <option>Tanzania</option>
                                    <option>Thailand</option>
                                    <option>Togo</option>
                                    <option>Tokelau</option>
                                    <option>Tonga</option>
                                    <option>Trinidad And Tobago</option>
                                    <option>Tunisia</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>Turks And Caicos Islands</option>
                                    <option>Tuvalu</option>
                                    <option>U.S. Minor Outlying Islands</option>
                                    <option>Uganda</option>
                                    <option>Ukraine</option>
                                    <option>United Arab Emirates</option>
                                    <option selected>United States</option>
                                    <option>Uruguay</option>
                                    <option>Uzbekistan</option>
                                    <option>Vanuatu</option>
                                    <option>Vatican City State</option>
                                    <option>Venezuela</option>
                                    <option>Viet Nam</option>
                                    <option>Virgin Islands (British)</option>
                                    <option>Virgin Islands (U.S.)</option>
                                    <option>Wales</option>
                                    <option>Wallis And Futuna Islands</option>
                                    <option>Western Sahara</option>
                                    <option>Western Samoa</option>
                                    <option>Yemen</option>
                                    <option>Yugoslavia</option>
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
                            <td class="formtext"><?php print $Translation['Postal_code']; ?></td>
                            <td><input type="text" name="Mem_TK" value="<?php echo getparamvalue('Mem_TK'); ?>" size="40"
                                       maxlength="100" class="formfields"></td>
                        </tr>

                        <tr>

                            <td class="formtext"><?php print $Translation['Username']; ?></td>
                            <td><input type="text" name="Mem_Usn" value="<?php echo getparamvalue('Mem_Usn'); ?>" size="35"
                                       maxlength="100" class="formfields">&nbsp;<span class="formstar">(*)</span>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td class="formtext"><?php print $Translation['Password']; ?></td>
                            <td><input type="password" name="Mem_Psw" size="35" maxlength="100" class="formfields">&nbsp;<span
                                    class="formstar">(*)</span>&nbsp;&nbsp;</td>
                        </tr>

                    </table>

                    </td>
                    </tr>
                    </table>
                </div>
                <div style="clear:both;"></div>

                <div id="top10" style="width:740px;">
                    <div class="left" style="width:674px;">
                        <table style="width:674px;">
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
                        &nbsp;
                    </div>
                    <div id="right">
                        <INPUT type="hidden" name="submitmembers" value="OK">
                        <input type="submit" value=" Submit  " name="submitform" class="formsubmit">
                        <!--<input type="Image" src="<?php echo $rootURL; ?>elements/submit_contact.gif" name="submit">-->
                    </div>
                    <div style="clear:both;"></div>
                </div>

                <div id="top10">
                    <em>required fields (*)</em>
                </div>

            </form>
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
    //You should create the validator only after the definition of the HTML form
    var frmvalidator = new Validator("myform");
    frmvalidator.EnableOnPageErrorDisplaySingleBox();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("Mem_Usn", "req", "<?php echo $fillusn; ?>");
    frmvalidator.addValidation("Mem_Usn", "maxlen=20", "Max length 20 characters");

    frmvalidator.addValidation("Mem_Psw", "req", "<?php echo $fillpsw; ?>");
    frmvalidator.addValidation("Mem_Name", "req", "<?php echo $fillfullname; ?>");
    frmvalidator.addValidation("Mem_City", "req", "<?php echo $fillcity; ?>");
    frmvalidator.addValidation("Mem_Company", "req", "<?php echo $fillcompany; ?>");
    frmvalidator.addValidation("Mem_Sector", "req", "<?php echo $fillsector; ?>");

    frmvalidator.addValidation("Mem_Email", "maxlen=50");
    frmvalidator.addValidation("Mem_Email", "req", "<?php echo $retypemail; ?>");
    frmvalidator.addValidation("Mem_Email", "email");
</script>

