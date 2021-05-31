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
        Cufon.replace('.cartTitles', {fontFamily: 'MyriadPro-Bold', hover: true});
        Cufon.replace('.titlelinks', {fontFamily: 'MyriadPro-Bold', hover: true});
    </script>
    <script type="text/javascript"> //Cufon.now(); </script>
</head>
<body>
<div id="mainArea">
    <div class="topBack">
        <div style="padding-top:9px; padding-left:15px;"><h1>Καλάθι αγορών</h1></div>
    </div>
    <div class="top20">
        <?php
        if (isset($_SESSION['user']['Username'])) {


//Παίρνουμε το $link
            $formlink = $HTTP_SERVER_VARS['PHP_SELF'];
            if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
                $formlink .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
            }

            if (isset($_POST['remove']))
                RemoveProductFromCart(getparamvalue('link'), getparamvalue('photo'), getparamvalue('title'), getparamvalue('unit_price'), getparamvalue('amount'));

            if (isset($_POST['update']))
                UpdateProduct(getparamvalue('link'), getparamvalue('photo'), getparamvalue('title'), getparamvalue('unit_price'), getparamvalue('amount'));


            if (isset($_SESSION['cart'])) {
                ?>
                <div>
                    <?php
                    if (!isset($_POST['add_order'])) {
                        getCart();
                    }
                    //include "add_order.php";
                    ?>
                    <hr/>
                    <div align="center">
                        <table>
                            <tr>
                                <td><a href="<?php print $rootURL; ?>checkout" target="_parent"
                                       class="titlelinks"><?php echo $Translation['Checkout']; ?></a></td>
                                <td><a href="<?php print $rootURL; ?>checkout" target="_parent" class="titlelinks"><img
                                            src="<?php echo $path; ?>elements/eshop/arrow_cash.png" alt="" border="0"/></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr/>
                </div>
                <?php
            } else
                echo "<div class=\"error\">" . $Translation['EmptyBasket'] . "</div>";
        } else echo $Translation['NotLoggedIn'];
        ?>
    </div>
</div>