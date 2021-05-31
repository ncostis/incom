<?php


$userid = $_SESSION['user']['Customer_ID'];
$query_orders = "SELECT * FROM eshop_orders WHERE User_ID='$userid' ORDER BY Order_Time DESC";

$orders = q($query_orders);
$orders_exist = nr($orders);

if ($orders_exist > 0)
{
?>

<?php
$counter = 0;
while ($row_orders = f($orders))
{
++$counter;
print "<a href=\"#rec" . $counter . "\" onclick=\"showOnClick_layer('rec" . $counter . "')\" class='bodylinks'\> [+] </a> Παραγγελία No " . $row_orders['Order_ID'] . " - " . $row_orders['Order_Time'];
print "<div style=\"padding-bottom:20px;\">&nbsp;</div>";
print "<div id='rec" . $counter . "' style='display: none;'>";
?>

<table border="0" align="center">
    <tr>
        <td class="padd10" align="center" valign="bottom"><?php print $Translation['Cost']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php print $Translation['Date']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php print $Translation['Status']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php print $Translation['Receipt']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php print $Translation['Payment_method']; ?></td>
        <td class="padd10" align="center" valign="bottom">Track Number</td>
    </tr>
    <tr>
        <td colspan="6">
            <hr/>
        </td>
    </tr>
    <tr>
        <td class="padd10" align="center" valign="bottom"><?php echo $row_orders['Order_Cost']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php echo $row_orders['Order_Time']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php echo $row_orders['Order_Status']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php echo $row_orders['Order_Voucher']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php echo $row_orders['Order_Payment']; ?></td>
        <td class="padd10" align="center" valign="bottom"><?php echo $row_orders['Order_Tracking']; ?></td>
    </tr>
    <?php if ($row_orders['Order_Comments'] != '') {
        ?>
        <tr>
            <td colspan="6">
                <hr/>
            </td>
        </tr>
        <tr>
            <td colspan="6"><?php print $Translation['Comments']; ?></td>
        </tr>
        <tr>
            <td colspan="6">
                <hr/>
            </td>
        </tr>
        <tr>
            <td colspan="6"><?php echo $row_orders['Order_Comments']; ?></td>
        </tr>
    <?php } ?>
</table>
<?php
$Order_ID = $row_orders['Order_ID'];
$query_cart = "SELECT * FROM eshop_carts WHERE Order_ID = '$Order_ID'";
$cart = q($query_cart);
?>
<table border="0" align="center" width="100%">
    <tr>
        <td colspan="4" style="padding-top:20px; padding-bottom:20px;">&nbsp;</td>
    </tr>
    <tr>
        <td><?php print $Translation['Product']; ?></td>
        <td><?php print $Translation['Price']; ?></td>
        <td><?php print $Translation['Amount']; ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <hr/>
        </td>
    </tr>
    <?php
    while ($row_cart = f($cart)) {
        if ($row_cart['Item_Link'] == "")
            $link_to_product = $Translation['Transfer'];
        else
            $link_to_product = "<a href=\"" . $row_cart['Item_Link'] . "\" target=\"_blank\" class=\"bodylinks\">" . $row_cart['Item_Title'] . "</a>";

        if ($row_cart['Item_Price'] > 0) {
            ?>

            <tr>
                <td>&nbsp;<?php echo $link_to_product; ?></td>
                <td>&nbsp;<?php echo $row_cart['Item_Price']; ?> €</td>
                <td>&nbsp;<?php echo $row_cart['Item_Amount']; ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <hr/>
                </td>
            </tr>
            <?php
        }
    }
    echo "</table><div style=\"padding-bottom:20px;\">&nbsp;</div></div>";
    }

    }

    ?>
