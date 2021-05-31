<?php
session_start();
?>
<script type="text/javascript">
    function elem(ent) {
        return document.getElementById(ent);
    }
    function toggle_layer(id) {
        if (elem(id).style.display == 'none') {
            elem(id).style.display = 'block';
        } else {
            elem(id).style.display = 'none';
        }
    }
</script>

<!DOCTYPE HTML>
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

        .cartTitles {
            margin: 0px;
            font-size: 14px;
            color: #f47836;
            text-align: center;
        }

        table, td, th {
            border: 0;
            padding: 8px;
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

        .padd10 {
            padding: 10px;
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
    <script type="text/javascript"> //Cufon.now(); </script>
</head>
<body>
<div id="mainArea">
    <div class="topBack">
        <div style="padding-top:9px; padding-left:15px;"><h1>Παραγγελίες</h1></div>
    </div>
    <div class="top20">
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

    </div>

</div>
</body>
