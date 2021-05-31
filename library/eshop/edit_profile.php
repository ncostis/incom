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


<form method="post" name="form10" action="<?php echo $link; ?>">
    <table align="center" width="100%" border="0">
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;"><strong>Username:</strong>&nbsp;&nbsp;</td>
            <td align="left"><input type="hidden" name="Username"
                                    value="<?php echo $row_customers['Mem_Usn']; ?>"><?php echo $row_customers['Mem_Usn']; ?>
            </td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Email:&nbsp;&nbsp;</td>
            <td align="left"><input type="hidden" name="Email"
                                    value="<?php echo $row_customers['Mem_Email']; ?>"><?php echo $row_customers['Mem_Email']; ?>
            </td>
        </tr>
        <tr valign="baseline" style="padding-bottom:10px;">
            <td nowrap align="right" style="padding-bottom:5px;">Όνομα:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="Name"
                                                                 value="<?php echo $row_customers['Mem_Name']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Εταιρία:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="Company"
                                                                 value="<?php echo $row_customers['Mem_Company']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">ΑΦΜ:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="AFM"
                                                                 value="<?php echo $row_customers['Mem_AFM']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">ΔΟΥ:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="DOY"
                                                                 value="<?php echo $row_customers['Mem_Doy']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Διεύθυνση:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="Address"
                                                                 value="<?php echo $row_customers['Mem_Address']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Πόλη:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="City"
                                                                 value="<?php echo $row_customers['Mem_City']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Περιοχή:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left" align="left"><input type="text" name="Area"
                                                                              value="<?php echo $row_customers['Mem_Area']; ?>"
                                                                              size="32" class="formtext"
                                                                              autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">TK:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="TK"
                                                                 value="<?php echo $row_customers['Mem_TK']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>

        <!-- ΜΟΝΟ ΓΙΑ E-SHOP -->
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;" valign="middle">Γεωγραφική θέση:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left">
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
            <td nowrap align="right" style="padding-bottom:10px;">Tηλέφωνο:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="Tel"
                                                                 value="<?php echo $row_customers['Mem_Tel']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Fax:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="text" name="Fax"
                                                                 value="<?php echo $row_customers['Mem_Fax']; ?>"
                                                                 size="32" class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Νέο Password:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="password" name="Password" size="32"
                                                                 class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right" style="padding-bottom:10px;">Επιβεβαιώστε το Password:&nbsp;&nbsp;</td>
            <td style="padding-bottom:10px;" align="left"><input type="password" name="Password2" size="32"
                                                                 class="formtext" autocomplete="off"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td style="padding-bottom:50px; padding-top:20px;" align="left"><input type="submit" class="formsubmit"
                                                                                   value="Ενημέρωση"></td>
        </tr>
    </table>
    <input type="hidden" name="MM_update" value="form10">
    <input type="hidden" name="EditUser" value="Edit User"/>
    <input type="hidden" name="Customer_ID" value="<?php echo $row_customers['Mem_ID']; ?>">
</form>
