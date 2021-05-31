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
        <div style="padding-left:20px; padding-right:50px;">
            <?php
            if (!isset($_POST['add_order'])) {
                getCart();
            }
            include "add_order.php";
            ?>
        </div>
        <?php
    } else
        echo "<div class=\"error\">" . $Translation['EmptyBasket'] . "</div>";
} else echo $Translation['NotLoggedIn'];
?>