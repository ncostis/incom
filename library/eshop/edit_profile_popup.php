<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php
    $path = "../../";
    require $path . "library/init.php";
    $elements = $rootURL . "elements";
    $Lang = getparamvalue('Lang');
    //$Rec_ID = $_GET['Rec_ID'];
    require "../text_lang.php";
    require $path . "library/eshop/eshop.php";
    ?>
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
            background-color: #fff;
            background-repeat: repeat-x;
            background-position: center top;
            font-family: Tahoma;
            font-size: 12px;
            color: #525252;
            border: 1px solid #f8f8f8;
            min-height: 550px;
        }

        #mainArea {
            display: block;
            padding: 20px;
        }

        p {
            padding: 0px;
            margin: 0px;
        }

        h1 {
            margin: 0px;
            font-size: 24px;
            color: #78787a;
        }

        h3 {
            margin: 0px;
            font-size: 17px;
            color: #78787a;
        }

        .cartText {
            font-family: Tahoma;
            font-size: 12px;
            color: #525252;
        }

        input.formtext {
            width: 185px;
            height: 20px;
            margin: 3px 0;
            padding: 0 3px;
            -moz-box-shadow: inset 0 5px 10px #f1efee;
            -webkit-box-shadow: inset 0 5px 5px #f1efee;
            box-shadow: inset 0 5px 5px #f1efee;
            border: 1px solid #abadb3;
            font-family: Tahoma;
            font-size: 12px;
            color: #525252;
        }

        .cartTitles {
            margin: 0px;
            font-size: 14px;
            color: #f47836;
            text-align: center;
        }

        table, td, th {
            border: 0;
            padding: 5px;
            border-collapse: collapse;
        }

        .grayTR {
            background-color: #eeebec;
        }

        .trLine {
            border-bottom: 1px solid #e1e1e1;
        }

        .error {
            color: #ce1515;
            font-size: 22px;
            text-align: center;
            padding-top: 50px;
        }

        .formfields {
            height: 18px;
            padding: 0 5px;
            -moz-box-shadow: inset 0 4px 4px #f6f6f6;
            -webkit-box-shadow: inset 0 4px 4px #f6f6f6;
            box-shadow: inset 0 4px 4px #f6f6f6;
        }

        .formfieldsSel {
            font-family: Tahoma;
            padding: 2px 2px;
            color: #345762;
            font-size: 11px;
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

        .top15 {
            padding-top: 15px;
        }

        .top20 {
            padding-top: 20px;
        }

        .right {
            float: right;
            margin: 0;
        }

        .formsubmit {
            font-family: Tahoma;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 4px;
            cursor: pointer;
            color: #fff;
            border: 0px;
            background-color: #f57935;
            -moz-box-shadow: 3px 3px 3px #dedede;
            -webkit-box-shadow: 3px 3px 3px #dedede;
            box-shadow: 3px 3px 3px #dedede;
        }

        .padd {
            padding: 4px;
        }

        .topBack {
            background-color: #d1d2d4;
            height: 40px;
            background-repeat: no-repeat !important;
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f1efee), to(#d1d2d4));
            background: -webkit-linear-gradient(top, #f1efee, #d1d2d4);
            background: -moz-linear-gradient(top, #f1efee, #d1d2d4);
            background: -ms-linear-gradient(top, #f1efee, #d1d2d4);
            background: -o-linear-gradient(top, #f1efee, #d1d2d4);
        }

        a.bodylinks {
            font-family: Verdana;
            font-size: 12px;
            color: #387ad0;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover.bodylinks {
            font-family: Verdana;
            font-size: 12px;
            color: #387ad0;
            font-weight: normal;
            text-decoration: underline;
        }

        a.titlelinks {
            font-family: Verdana;
            font-size: 16px;
            color: #7a7a7a;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover.titlelinks {
            font-family: Verdana;
            font-size: 16px;
            color: #7a7a7a;
            font-weight: normal;
            text-decoration: underline;
        }
    </style>

    <!-- CUFON -->
    <script type="text/javascript" src="<?php echo $path; ?>js/fonts/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>js/fonts/MyriadPro-Bold_700.font.js"></script>
    <script type="text/javascript">
        Cufon.replace('h1', {fontFamily: 'MyriadPro-Bold', hover: true});
        Cufon.replace('h3', {fontFamily: 'MyriadPro-Bold', hover: true});
        Cufon.replace('.cartTitles', {fontFamily: 'MyriadPro-Bold', hover: true});
        Cufon.replace('.titlelinks', {fontFamily: 'MyriadPro-Bold', hover: true});
    </script>
    <script type="text/javascript"> /*Cufon.now(); */</script>
</head>

<body>
<div id="mainArea">
    <div class="topBack">
        <div style="padding-top:9px; padding-left:15px;"><h1>Επεξεργασία προφίλ</h1></div>
    </div>
    <div class="top20">
        <?php
        $colname_customers = $_SESSION['user']['Customer_ID'];


        if (getparamvalue("MM_update") == "form10") {

            if (isset($_POST['Password'])) {
                if (getparamvalue('Password') == getparamvalue('Password2')) {
                    $new_password = md5(getparamvalue('Password'));
                    $updateSQL = sprintf("UPDATE members SET Mem_Name=%s, Mem_Company=%s, Mem_AFM=%s, Mem_Doy=%s, Mem_Address=%s, Mem_City=%s, Mem_Area=%s, Mem_TK=%s, Mem_Zone=%s, Mem_Tel=%s, Mem_Fax=%s, Mem_Email=%s, Mem_Usn=%s, Mem_Psw=%s WHERE Mem_ID=%s",
                        GetSQLValueString(getparamvalue('Name'), "text"),
                        GetSQLValueString(getparamvalue('Company'), "text"),
                        GetSQLValueString(getparamvalue('AFM'), "text"),
                        GetSQLValueString(getparamvalue('DOY'), "text"),
                        GetSQLValueString(getparamvalue('Address'), "text"),
                        GetSQLValueString(getparamvalue('City'), "text"),
                        GetSQLValueString(getparamvalue('Area'), "text"),
                        GetSQLValueString(getparamvalue('TK'), "text"),
                        GetSQLValueString(getparamvalue('Country'), "text"),
                        GetSQLValueString(getparamvalue('Tel'), "text"),
                        GetSQLValueString(getparamvalue('Fax'), "text"),
                        GetSQLValueString(getparamvalue('Email'), "text"),
                        GetSQLValueString(getparamvalue('Username'), "text"),
                        GetSQLValueString($new_password, "text"),
                        GetSQLValueString(getparamvalue('Customer_ID'), "int"));


                    $Result1 = q($updateSQL);
                    echo "<h2 style='text-align:center; padding-top:20px; padding-bottom:20px;'>Τα στοιχεία σας άλλαξαν επιτυχώς</h2>";
                } else {
                    echo "<h2>Οι δύο κωδικοί που δώσατε δεν είναι ίδια. Παρακαλώ προσπαθήστε ξανά.</h2>";
                }
            } else {
                $updateSQL = sprintf("UPDATE members SET Mem_Name=%s, Mem_Company=%s, Mem_AFM=%s, Mem_Doy=%s, Mem_Address=%s, Mem_City=%s, Mem_Area=%s, Mem_TK=%s, Mem_Zone=%s, Mem_Tel=%s, Mem_Fax=%s, Mem_Email=%s, Mem_Usn=%s, Mem_Discount=%s WHERE Mem_ID=%s",
                    GetSQLValueString(getparamvalue('Name'), "text"),
                    GetSQLValueString(getparamvalue('Company'), "text"),
                    GetSQLValueString(getparamvalue('AFM'), "text"),
                    GetSQLValueString(getparamvalue('DOY'), "text"),
                    GetSQLValueString(getparamvalue('Address'), "text"),
                    GetSQLValueString(getparamvalue('City'), "text"),
                    GetSQLValueString(getparamvalue('Area'), "text"),
                    GetSQLValueString(getparamvalue('TK'), "text"),
                    GetSQLValueString(getparamvalue('Country'), "text"),
                    GetSQLValueString(getparamvalue('Tel'), "text"),
                    GetSQLValueString(getparamvalue('Fax'), "text"),
                    GetSQLValueString(getparamvalue('Email'), "text"),
                    GetSQLValueString(getparamvalue('Username'), "text"),
                    GetSQLValueString(getparamvalue('Discount'), "int"),
                    GetSQLValueString(getparamvalue('Customer_ID'), "int"));


                $Result1 = q($updateSQL);
            }
        }


        $query_customers = sprintf("SELECT * FROM members WHERE Mem_ID = %s", $colname_customers);
        $customers = q($query_customers);
        $row_customers = f($customers);


        $query_Countries = "SELECT * FROM eshop_countries";
        $Countries = q($query_Countries);
        $row_Countries = f($Countries);

        ?>

        <div style="float:left; margin:0px 0px 0px 30px;">

            <form method="post" name="form10" action="<?php echo $link; ?>">

                <table align="center" width="100%" border="0">
                    <tr valign="baseline">
                        <td nowrap align="right"><?php print $Translation['Username']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="hidden" name="Username"
                                                value="<?php echo $row_customers['Mem_Usn']; ?>"><?php echo $row_customers['Mem_Usn']; ?>
                        </td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right">Email:&nbsp;&nbsp;</td>
                        <td align="left"><input type="hidden" name="Email"
                                                value="<?php echo $row_customers['Mem_Email']; ?>"><?php echo $row_customers['Mem_Email']; ?>
                        </td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right" style="padding-bottom:5px;"><?php print $Translation['Name']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="text" name="Name"
                                                value="<?php echo $row_customers['Mem_Name']; ?>" size="32"
                                                class="formtext" autocomplete="off"></td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right"><?php print $Translation['Company']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="text" name="Company"
                                                value="<?php echo $row_customers['Mem_Company']; ?>" size="32"
                                                class="formtext" autocomplete="off"></td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right"><?php print $Translation['AFM']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="text" name="AFM" value="<?php echo $row_customers['Mem_AFM']; ?>"
                                                size="32" class="formtext" autocomplete="off"></td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right"><?php print $Translation['DOY']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="text" name="DOY" value="<?php echo $row_customers['Mem_Doy']; ?>"
                                                size="32" class="formtext" autocomplete="off"></td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right"><?php print $Translation['Address']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="text" name="Address"
                                                value="<?php echo $row_customers['Mem_Address']; ?>" size="32"
                                                class="formtext" autocomplete="off"></td>
                    </tr>
                    <tr valign="baseline">
                        <td nowrap align="right"><?php print $Translation['Town']; ?>&nbsp;&nbsp;</td>
                        <td align="left"><input type="text" name="City"
                                                value="<?php echo $row_customers['Mem_City']; ?>" size="32"
                                                class="formtext" autocomplete="off"></td>
                    </tr>
                </table>
        </div>
        <div style="float:left; margin:14px 0px 0px 30px; ">
            <table>

                <tr valign="baseline">
                    <td nowrap align="right"><?php print $Translation['Area']; ?>&nbsp;&nbsp;</td>
                    <td align="left"><input type="text" name="Area" value="<?php echo $row_customers['Mem_Area']; ?>"
                                            size="32" class="formtext" autocomplete="off"></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right"><?php print $Translation['Postal_code']; ?>&nbsp;&nbsp;</td>
                    <td align="left"><input type="text" name="TK" value="<?php echo $row_customers['Mem_TK']; ?>"
                                            size="32" class="formtext" autocomplete="off"></td>
                </tr>

                <!-- ΜΟΝΟ ΓΙΑ E-SHOP -->
                <tr valign="baseline">
                    <td nowrap align="right" valign="middle"><?php print $Translation['Destination']; ?>
                        &nbsp;&nbsp;</td>
                    <td align="left">
                        <select name="Country" class="formtext" autocomplete="off">
                            <?php
                            do {
                                ?>
                                <option
                                    value="<?php echo $row_Countries['Region'] ?>" <?php if (!(strcmp($row_Countries['Region'], $row_customers['Mem_Zone']))) {
                                    echo "SELECTED";
                                } ?>><?php echo $row_Countries['Description'] ?></option>
                                <?php
                            } while ($row_Countries = f($Countries));
                            ?>
                        </select>
                    </td>
                </tr>
                <!-- END -->
                <tr valign="baseline">
                    <td nowrap align="right"><?php print $Translation['Phone']; ?>&nbsp;&nbsp;</td>
                    <td align="left"><input type="text" name="Tel" value="<?php echo $row_customers['Mem_Tel']; ?>"
                                            size="32" class="formtext" autocomplete="off"></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Fax:&nbsp;&nbsp;</td>
                    <td align="left"><input type="text" name="Fax" value="<?php echo $row_customers['Mem_Fax']; ?>"
                                            size="32" class="formtext" autocomplete="off"></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right"><?php print $Translation['New_Password']; ?>&nbsp;&nbsp;</td>
                    <td align="left"><input type="password" name="Password" size="32" class="formtext"
                                            autocomplete="off"></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right"><?php print $Translation['New_Password']; ?>&nbsp;&nbsp;</td>
                    <td align="left"><input type="password" name="Password2" size="32" class="formtext"
                                            autocomplete="off"></td>
                </tr>
                <tr valign="baseline">
                    <td colspan=2 style="padding-bottom:50px; padding-top:20px;" align="center">
                        <input type="submit" class="formsubmit" value=" <?php print $Translation['Update']; ?> ">
                        <hr style="border:1px dotted #f57935;"/>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form10">
            <input type="hidden" name="EditUser" value="Edit User"/>
            <input type="hidden" name="Customer_ID" value="<?php echo $row_customers['Mem_ID']; ?>">
            </form>
        </div>
        <div style="clear:both;"></div>

    </div>
</div>
</body>
</html>
