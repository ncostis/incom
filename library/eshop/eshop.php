<?php
if (!unlock("eshop_standart"))
    exit;
global $Discount, $Paypal, $Shipment, $URL;
include $path . "library/eshop/LANG/" . $Lang . ".php";


$Scart = isset($_SESSION['cart']) ? $_SESSION['cart'] :'';
if (isset($Scart) && !is_array($Scart)) {
    unset($Scart);
    unset($_SESSION['cart']);
}

$Srecently_viewed = isset($_SESSION['recently_viewed']) ? $_SESSION['recently_viewed'] : '';
if (isset($Srecently_viewed) && !is_array($Srecently_viewed)) {
    unset($Srecently_viewed);
    unset($_SESSION['recently_viewed']);
}


$query_settings = "SELECT * FROM eshop_settings";
$settings = q($query_settings);
$row_settings = f($settings);

$Discount = $row_settings['Discount'];
$Paypal = $row_settings['Paypal'];
$Shipment = $row_settings['Shipment'];
$URL = $row_settings['URL'];
$Payment_URL = $row_settings['Payment_URL'];
$Contact_Email = $row_settings['Contact_Email'];
$Contact_Name = $row_settings['Contact_Name'];
$Company_Subject = $row_settings['Company_Subject'];
$Customer_Subject = $row_settings['Customer_Subject'];
$Payment_Method = $row_settings['Payment'];
$Keep_Stock = $row_settings['Stock'];
$eshop_included = "1";
if (isset($_SESSION['user'])) {
    $userid = $_SESSION['user']['Customer_ID'];
    $destination = $_SESSION['user']['Country'];
    if (isset($_SESSION['user']['FromCurrency']))
        $FromCurrency = $_SESSION['user']['FromCurrency'];
    else $FromCurrency = 'EUR';

    if (isset ($_POST['tocurrency']))
        $ToCurrency = getparamvalue('tocurrency');
    elseif (isset($_SESSION['user']['ToCurrency']))
        $ToCurrency = $_SESSION['user']['ToCurrency'];
    else $ToCurrency = 'EUR';


}
else {
    $FromCurrency = 'EUR';
    $ToCurrency = 'EUR';
}
$currency_factor = currency_convert($FromCurrency, $ToCurrency, 1);
if ($currency_factor == 0) $currency_factor = 1;




function UpdateProduct()
{
	global $Keep_Stock, $Translation;
	$size = count($_POST['link']);
	$i = 0;

	while ($i < $size) {
		$error = 0;
		$link = $_POST['link'][$i];
		$doseis=$_POST['doseis'][$i];
		$title=$_POST['title'][$i];
		$unit_price=$_POST['price'][$i];
		//print "---------".$price;
		$weight=$_POST['weight'][$i];
		$amount=$_POST['amount'][$i];
		$remove=$_POST['remove'][$i];
		$Rec_ID=$_POST['Rec_ID'][$i];
		$Old_Amount=$_POST['Old_Amount'][$i];
		$Product_Stock=$_POST['Product_Stock'][$i];
			if ($Keep_Stock == 'yes' && $amount > $Product_Stock )
			{
			$error++;

			}


		if (!isset($remove))
		{
			if ($error>0)
			{
			$recView2[] = array($link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID);
			print "<div style=\"font-size: 12px; color: #ce1515; font-weight: bold; text-align:center; padding-bottom:20px; padding-top:20px;\">".$Translation['StockError']. " (".$title.")</div>";
			}
			else
			$recView2[] = array($link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID);
		}


	++$i;
	}
	$_SESSION['cart']=$recView2;
	$url = $_SERVER["REQUEST_URI"];
	js_redirect($url, 0);

} //end UpdateProduct()



function getCart()
{
    global $Translation, $Keep_Stock, $Shipment, $rootURL, $ToCurrency;
    //require_once "../../_cm_admin/initvars.php";
    //echo $Path_ImageRes_Middle;
    $telikes_doseis = 1;
    $destination = $_SESSION['user']['Country'];
    $totalweight = 0;
    $cost = 0;
    $i = 0;
    $ul = '';
    $ul .= "<table>
	<tr class='grayTR'>
	<td colspan=2 class='cartTitles' style='width:55%' align=center>" . $Translation['Product'] . "</td>
	<td class='cartTitles' style='width:13%' align=center>" . $Translation['Amount'] . "</td>
	<td class='cartTitles' style='width:12%' align=center>" . $Translation['Unit_price'] . "</td>";
    $ul .= "<td class='cartTitles' style='width:20%' align=center>" . $Translation['Remove'] . "</td></tr>";
	$ul .="<tr><td colspan=5 style='padding-bottom:5px;'></td></tr>";
    foreach ($_SESSION['cart'] as $data) {
        list($link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID) = array_values($data);

        $check_stock_query = "SELECT Rec_Stock,Rec_Image_Resize,Rec_Img_Cat_ID FROM records WHERE Rec_ID = '$Rec_ID' LIMIT 1";
        $check_stock = q($check_stock_query);
        $product_stock_array = f($check_stock);
        $product_stock = $product_stock_array['Rec_Stock'];
        $product_imageRes = $product_stock_array['Rec_Image_Resize'];
        $product_image1 = $product_stock_array['Rec_Image1'];
        $select_query = "Select * FROM images WHERE Img_Cat_ID = ".$product_stock_array["Rec_Img_Cat_ID"]." Order by Img_Order Asc Limit 0,1";
        $Photos_Query = q($select_query);
        $PhotosQ = f($Photos_Query);
        $product_firstThumb = $PhotosQ['Img_Ext'];
        if ($product_imageRes <> "") {
            $product_imageURL = $rootURL . "uploads/images_resize/thumb/" . $product_imageRes;
        } else if ($product_image1 <> "") {
            $product_imageURL = $rootURL . "uploads/images/" . $product_image1;
        } else {
            $product_imageURL = $rootURL . "uploads/photos/thumb/" . $product_firstThumb;
        }

        // έλεγχος για photoGallery

        $ul .= "<form method=\"post\"><tr class='trLine'>";
        //$ul .= "<td style='width:90px' align=center><img src=\"$product_imageURL\" alt='' title='' width=75 border=0></td>";
        $ul .= "<td class='cartText' align=left colspan=2>
		<a href=\"$link\" class='bodylinks' target='_blank'>$title</a></td>
		<td class='cartText' align=center><input type=text size='1' class='cartText' style='text-align:center;' name=amount[$i] value=$amount></td>";
        $final_price = $unit_price * $doseis;
        $final_price = number_format($final_price, 2);
        $ul .= "<td class='cartText' align=center>$final_price $ToCurrency</td>";
//	<td style='paddin-left:5px; padding-right:5px;'>$doseis</td>
        $ul .= "<td class='cartText' align=center>
		<input type=\"hidden\" name=\"link[$i]\" value=\"$link\">
		<input type=\"hidden\" name=\"doseis[$i]\" value=\"$doseis\">
		<input type=\"hidden\" name=\"title[$i]\" value=\"$title\">
		<input type=\"hidden\" name=\"price[$i]\" value=\"$unit_price\">
		<input type=\"hidden\" name=\"weight[$i]\" value=\"$weight\">
		<input type=\"hidden\" name=\"Rec_ID[$i]\" value=\"$Rec_ID\">
		<input type=\"hidden\" name=\"Product_Stock[$i]\" value=\"$product_stock\">
		<input type=\"hidden\" name=\"Old_Amount[$i]\" value=\"$amount\">
		<input type=\"checkbox\" name=\"remove[$i]\" value=\"\" class=\"cartDelete\">
		</td></tr>";
        if ($doseis > $telikes_doseis) $telikes_doseis = $doseis;
        if ($telikes_doseis < 2) $message_doseis = $Translation['Cash'];
        else $message_doseis = $Translation['Installments'] . " " . $telikes_doseis . " " . $Translation['Installments_cost'];
        $product_cost = $amount * $unit_price * $doseis;
        $cost = $cost + $product_cost;
        $product_weight = $amount * $weight;
        $totalweight = $totalweight + $product_weight;
        ++$i;
    }


    if ($totalweight > 0) $totalweight = $totalweight / 1000;
	if (strlen($destination)<1) {
		$ul .= "<tr><td colspan='3' class='cartText' style='text-align:right; padding-top:5px;'>" . $Translation['Transfer'] . ":</td><td colspan='2' class='cartText' align=center><b>(Δεν έχει δηλωθεί περιοχή)</b></td><td></td></tr>";
	}
    $weightcost = Calculate_Cost($totalweight, $destination);
    if ($Shipment > 0 && $cost >= $Shipment)
        $weightcost = 0;
    $cost = $cost + $weightcost;
    $cost_doseon = $cost / $telikes_doseis;
    $cost_doseon = number_format($cost_doseon, 2);
    $cost = number_format($cost, 2);

    if ($weightcost > 0)

    $ul .= "<tr><td colspan='3' class='cartText' style='text-align:right; padding-top:5px;'>" . $Translation['Transfer'] . ":</td><td colspan='2' class='cartText' align=center><b>$weightcost $ToCurrency</b></td><td></td></tr>";
    $ul .= "<tr class='grayTR'><td colspan='3' class='cartText' style='text-align:right; padding-top:5px;'>" . $Translation['Cost_sum'] . "</td><td colspan='2' class='cartText' align=center><b>$cost $ToCurrency</b></td><td></td>";
    $ul .= "</tr>";
    $ul .= "<tr>
			<td colspan=3 style='text-align:left;' class='cartText top15'>$message_doseis $cost_doseon $ToCurrency</td>
			<td colspan=3 style='text-align:right;' class='top20'><input type='submit' name='update'  class='formsubmit' value=\" " . $Translation['Submit_changes'] . " \"></td>
			</tr>
			</form>";
    $ul .= "</table>
	<div style='padding-bottom:20px;'></div>";

    echo $ul;
}


function RemoveProductFromCart($link, $photo, $title, $unit_price, $amount)
{

    $recView =& $_SESSION['cart'];
    $x = 0;

    foreach ($recView as $data) {
        list($link2, $photo2, $title2, $unit_price2, $amount2) = array_values($data);
        if ($title2 == $title && $link2 == $link && $amount2 == $amount) $found = $x;
        $x++;
    }
    unset($recView[$found]);

    foreach ($recView as $data) {
        list($link, $photo, $title, $unit_price, $amount, $weight, $Rec_ID) = array_values($data);
        $recView2[] = array($link, $photo, $title, $unit_price, $amount, $weight, $Rec_ID);
    }
    $_SESSION['cart'] = $recView2;
}


function addProductToSession($link, $title)
{
    if (!unlock("eshop_lastviewed")) return 1;
    $recView =& $_SESSION['recently_viewed'];
    $found = 0;

    if (isset($recView)) {
        foreach ($recView as $data) {
            list($link2, $photo2, $title2, $unit_price2, $amount2) = array_values($data);
            if ($link2 == $link) $found = 1;
        }
    }

    if ($found == 0) {
        if (count($recView) == 5) array_shift($recView);
        $recView[] = array($link, $title);
    }
}


function count_products()
{
    $recView =& $_SESSION['cart'];
    if (isset($recView) && !is_array($recView)) {
        unset($recView);
        unset($_SESSION['cart']);
    } else {
        $cart_items = 0;
        if (isset($recView)) {
            foreach ($recView as $data) {
                list($link, $photo, $title, $unit_price, $amount) = array_values($data);
                $cart_items = $cart_items + $amount;
            }
        }
    }
    return $cart_items;
}


function addProductToCart($stock, $link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID)
{
    global $siteURL, $Keep_Stock, $Translation;
    $recView =& $_SESSION['cart'];
    $found = 0;
    if ($Keep_Stock == 'yes') {
        if ($stock < $amount)
            return $Translation['StockError'];
    }
    if (isset($recView)) {
        foreach ($recView as $data) {
            list($link2, $doseis2, $title2, $unit_price2, $amount2) = array_values($data);
            if ($title2 == $title) $found = 1;
        }
    }

    if ($found == 0) {
        $recView[] = array($link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID);
        return "none";
    } else return $Translation['InBasket'];
}


function getRecentlyViewedProducts()
{
    if (!unlock("eshop_lastviewed")) return 1;
    if (isset($_SESSION['recently_viewed'])) {
        $ul = "";
        foreach ($_SESSION['recently_viewed'] as $data) {
            list($link, $photo, $title) = array_values($data);
            $ul .= "<a href=\"$link\" class='smallbodylinks'>$title</a><br><br>";
        }
        echo $ul;
    }
}


function PlaceOrder($voucher, $comments, $payment)
{
    global $Translation, $ToCurrency;
    $query_settings = "SELECT * FROM eshop_settings";
    $settings = q($query_settings);
    $row_settings = f($settings);
    $Shipment = $row_settings['Shipment'];
    $userid = $_SESSION['user']['Customer_ID'];;
    $totalweight = 0;
    $details_message = '';
    $cost = 0;
    $destination = $_SESSION['user']['Country'];
    $Contact_Email = $row_settings['Contact_Email'];
    $Contact_Name = $row_settings['Contact_Name'];
    $Company_Subject = $row_settings['Company_Subject'];
    $Customer_Subject = $row_settings['Customer_Subject'];
    $Main_Order_Message = $row_settings['Order_Message'];
    $Keep_Stock = $row_settings['Stock'];

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $data) {
            list($link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID) = array_values($data);
            $product_cost = $amount * $unit_price * $doseis;
            $cost = $cost + $product_cost;
            $totalweight = $totalweight + $weight;
        }
        reset($_SESSION['cart']);
    }
    if ($cost > $Shipment)
        $weightcost = 0;
    else {
        if ($totalweight > 0) $totalweight = $totalweight / 1000;
        $weightcost = Calculate_Cost($totalweight, $destination);
    }

    $cost = $cost + $weightcost;


    $insertSQL = "INSERT INTO eshop_orders (User_ID, Order_Cost, Order_Voucher, Order_Comments, Order_Payment) VALUES ('$userid', '$cost', '$voucher', '$comments', '$payment')";
    $Result1 = q($insertSQL);
    $Get_User_Details = "SELECT * FROM members WHERE Mem_ID = '$userid' LIMIT 1";
    $User_Details = q($Get_User_Details);
    $Details = f($User_Details);
    $name = $Details['Mem_Name'];
    $company = $Details['Mem_Company'];
    $afm = $Details['Mem_AFM'];
    $doy = $Details['Mem_Doy'];
    $address = $Details['Mem_Address'];
    $city = $Details['Mem_City'];
    $area = $Details['Mem_Area'];
    $tk = $Details['Mem_TK'];
    $tel = $Details['Mem_Tel'];
    $fax = $Details['Mem_Fax'];

    if ($company != '')
        $order_message = "<br />" . $Translation['Company'] . $company . "<br />" . $Translation['AFM'] . $afm . "<br />" . $Translation['DOY'] . $doy;
    $order_message .= "<br />" . $Translation['Name'] . $name . "<br />" . $Translation['Address'] . $address . "<br />" . $Translation['Town'] . $city . "<br />" . $Translation['Area'] . $area . "<br />" . $Translation['Postal_code'] . $tk . "<br />" . $Translation['Phone'] . $tel;
    $order_message .= "<br /><hr><br />" . $Translation['Order_cost'] . number_format($cost, 2) . " $ToCurrency<br />" . $Translation['Payment_terms'] . $payment . "<br />" . $Translation['Comments'] . $comments;
    $order_message .= "<table><td colspan=3>" . $Translation['Products'] . "</td></tr><tr><td colspan=3><hr></td></tr>";


    $query_stats = "SELECT * from eshop_stats_customers WHERE Customer_ID = '$userid'";
    $stats = q($query_stats);
    $sold = f($stats);
    $foundit = nr($stats);

    if ($foundit == 0)
        $update_stats = "INSERT INTO eshop_stats_customers (Customer_ID, Orders_Value) VALUES ('$userid', '$cost')";
    else {
        $Orders_Value = $sold['Orders_Value'];
        $updatedcost = $cost + $Orders_Value;
        $update_stats = "UPDATE eshop_stats_customers SET Orders_Value='$updatedcost' WHERE Customer_ID = '$userid'";
    }

    if (unlock("eshop_statistics"))
        $update_customers = q($update_stats);


    $month = date("m-Y");
    $query_stats = "SELECT * from eshop_stats_months WHERE Month = '$month'";
    $stats = q($query_stats);
    $sold = f($stats);
    $foundit = nr($stats);

    if ($foundit == 0)
        $update_stats = "INSERT INTO eshop_stats_months (Month, Orders_Value) VALUES ('$month', '$cost')";
    else {
        $Orders_Value = $sold['Orders_Value'];
        $updatedcost = $cost + $Orders_Value;
        $update_stats = "UPDATE eshop_stats_months SET Orders_Value='$updatedcost' WHERE Month = '$month'";
    }

    if (unlock("eshop_statistics"))
        $update_customers = q($update_stats);


    $destination = $_SESSION['user']['Country'];
    $query_stats = "SELECT * from eshop_stats_locations WHERE Location = '$destination'";
    $stats = q($query_stats);
    $sold = f($stats);
    $foundit = nr($stats);

    if ($foundit == 0)
        $update_stats = "INSERT INTO eshop_stats_locations (Location, Orders_Value) VALUES ('$destination', '$cost')";
    else {
        $Orders_Value = $sold['Orders_Value'];
        $updatedcost = $cost + $Orders_Value;
        $update_stats = "UPDATE eshop_stats_locations SET Orders_Value='$updatedcost' WHERE Location = '$destination'";
    }
    if (unlock("eshop_statistics"))
        $update_customers = q($update_stats);


    $query_order = "SELECT Order_ID FROM eshop_orders WHERE eshop_orders.User_ID = '$userid' ORDER BY eshop_orders.Order_Time DESC";
    $order = q($query_order);
    $row_order = f($order);
    $Order_ID = $row_order['Order_ID'];
    $_SESSION['Order_ID'] = $Order_ID;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $data) {
            list($link, $doseis, $title, $unit_price, $amount, $weight, $Rec_ID) = array_values($data);
            $product_cost = $amount * $unit_price * $doseis;
            $price = $unit_price * $doseis;
            $insertOrder = "INSERT INTO eshop_carts (Order_ID, Item_Link, Item_Title, Item_Price, Item_Doseis, Item_Amount) VALUES ('$Order_ID', '$link', '$title', '$price', '$doseis', '$amount')";
            $details_message .= "<tr><td>" . $Translation['Product'] . $title . "</td><td>" . $Translation['Unit_price'] . number_format($price, 2) . "$ToCurrency</td><td>" . $Translation['Amount'] . $amount . "</td></tr>";
            $details_message .= "<tr><td colspan=3><hr></td></tr>";
            $add_to_cart = q($insertOrder);


            $query_stats = "SELECT * from eshop_stats_items WHERE Item_Link = '$link'";
            $stats = q($query_stats);
            $sold = f($stats);
            $foundit = nr($stats);

            if ($foundit == 0)
                $update_stats = "INSERT INTO eshop_stats_items (Item_Link, Item_Title, Item_Amount) VALUES ('$link', '$title', '$amount')";
            else {
                $items_sold = $sold['Item_Amount'];
                $amount_to_add = $amount + $items_sold;
                $update_stats = "UPDATE eshop_stats_items SET Item_Amount='$amount_to_add' WHERE Item_Title = '$title' AND Item_Link = '$link'";
            }

            if (unlock("eshop_statistics"))
                $update_items = q($update_stats);


            $query_grab_details = "SELECT * from records WHERE Rec_ID = '$Rec_ID' LIMIT 1";
            $grab_details = q($query_grab_details);
            $details = f($grab_details);
            $product_category = $details['Rec_CatProduct'];
            $product_supplier = $details['Rec_Supplier'];
            $product_stock = $details['Rec_Stock'];

            if ($Keep_Stock == 'yes') {
                $products_left = $product_stock - $amount;
                $update_stock_query = "UPDATE records SET Rec_Stock = '$products_left' WHERE Rec_ID = '$Rec_ID' LIMIT 1";
                q($update_stock_query);
            }


            $query_stats = "SELECT * from eshop_stats_categories WHERE Category = '$product_category'";
            $stats = q($query_stats);
            $sold = f($stats);
            $foundit = nr($stats);

            if ($foundit == 0)
                $update_stats = "INSERT INTO eshop_stats_categories (Category, Orders_Value) VALUES ('$product_category', '$product_cost')";
            else {
                $items_sold = $sold['Orders_Value'];
                $amount_to_add = $product_cost + $items_sold;
                $update_stats = "UPDATE eshop_stats_categories SET Orders_Value='$amount_to_add' WHERE Category = '$product_category'";
            }
            if (unlock("eshop_statistics"))
                $update_items = q($update_stats);


            $query_stats = "SELECT * from eshop_stats_suppliers WHERE Supplier = '$product_supplier'";
            $stats = q($query_stats);
            $sold = f($stats);
            $foundit = nr($stats);

            if ($foundit == 0)
                $update_stats = "INSERT INTO eshop_stats_suppliers (Supplier, Orders_Value) VALUES ('$product_supplier', '$product_cost')";
            else {
                $items_sold = $sold['Orders_Value'];
                $amount_to_add = $product_cost + $items_sold;
                $update_stats = "UPDATE eshop_stats_suppliers SET Orders_Value='$amount_to_add' WHERE Supplier = '$product_supplier'";
            }
            if (unlock("eshop_statistics"))
                $update_items = q($update_stats);

        }

    }


    if ($weightcost > 0) {
        $insertOrder = "INSERT INTO eshop_carts (Order_ID, Item_Link, Item_Title, Item_Price, Item_Amount) VALUES ('$Order_ID', '', '".$Translation["Transfer"]."', '$weightcost', '1')";
        $add_to_cart = q($insertOrder);
    }

    $headers = '';

    $headers .= "From: $Contact_Name <$Contact_Email>" .
        "\nMIME-Version: 1.0\n" .
        "Content-type: text/html; charset=utf-8\n";
    "Content-Transfer-Encoding: 7bit\n\n";
    $Main_Order_Message = str_replace("\n", "<br />", $Main_Order_Message);

    $Customer_message = $Main_Order_Message . "<br>" . $order_message . $details_message . "</table>";
    $Company_message = $order_message . $details_message . "</table>";


    $Customer_Email = $_SESSION['user']['Email'];

    if (unlock("eshop_notify")) {
        mail($Contact_Email, $Company_Subject, $Company_message, $headers);
        mail($Customer_Email, $Customer_Subject, $Customer_message, $headers);
    }
    return $Order_ID;
}


function Calculate_Cost($weight, $destination)
{

    $query_weight = "SELECT $destination FROM eshop_transport WHERE Weight >= $weight ORDER BY Weight ASC LIMIT 0,1";
    $weight_sel = q($query_weight);
    $weight_cost = f($weight_sel);
    $cost = $weight_cost[$destination];

    return $cost;
}


function clean_cart()
{

    unset ($_SESSION['transport']);
    unset($_SESSION['cart']);

}

function AddProductToFavourites($Rec_ID, $Rec_Page_ID, $Rec_Title)
{
    if (!unlock("eshop_favourites")) return 1;

    $User_ID = $_SESSION['user']['Customer_ID'];
    $SearchSQL = "SELECT * FROM eshop_favourites WHERE User_ID = '$User_ID' AND Rec_ID = '$Rec_ID' AND Rec_Page_ID = '$Rec_Page_ID' LIMIT 0,1";
    $Search = q($SearchSQL);
    $Found = nr($Search);

    if ($Found < 1) {
        $InsertSQL = "INSERT INTO eshop_favourites (User_ID, Rec_ID, Rec_Page_ID, Rec_Title) VALUES ('$User_ID', '$Rec_ID', '$Rec_Page_ID', '$Rec_Title' )";
        $Insert = q($InsertSQL);
        $page_view = getparamvalue('ID');


        $query_stats = "SELECT * from eshop_stats_favourites WHERE Rec_ID = '$Rec_ID'";
        $stats = q($query_stats);
        $sold = f($stats);
        $foundit = nr($stats);

        $favourites_link = $page_view . "/" . $Rec_ID;
        if ($foundit == 0)
            $update_stats = "INSERT INTO eshop_stats_favourites (Rec_ID, Item_Link, Item_Title, Item_Amount) VALUES ('$Rec_ID','$favourites_link', '$Rec_Title', 1)";
        else {
            $items_sold = $sold['Item_Amount'];
            $favourites_amount = $items_sold + 1;
            $update_stats = "UPDATE eshop_stats_favourites SET Item_Amount='$favourites_amount' WHERE Rec_ID = '$Rec_ID'";
        }
        $update_items = q($update_stats);


    }

}

function Get_Favourites()
{
    if (!unlock("eshop_favourites")) return 1;
    $User_ID = $_SESSION['user']['Customer_ID'];
    $GetSQL = "SELECT * FROM eshop_favourites WHERE User_ID = '$User_ID'";
    $GetFavourites = q($GetSQL);
    $Favourites = f($GetFavourites);

    print "<table border=1>";
    do {
        $Rec_Page_ID = $Favourites['Rec_Page_ID'];
        $GetPageViewSQL = "SELECT Page_View FROM pages WHERE Page_ID = '$Rec_Page_ID' LIMIT 0,1";
        $GetPageView = q($GetPageViewSQL);
        $ID = f($GetPageView);
        print "<tr><td><a href='" . $ID['Page_View'] . "/" . $Favourites['Rec_ID'] . "' class='bodylinks'>" . $Favourites['Rec_Title'] . "</a></td></tr>";
    } while ($Favourites = f($GetFavourites));
    print "</table>";
}


function get_discount($product_discount, $user_discount)
{
    if (!unlock("eshop_b2b"))
        $user_discount = 0;
    global $Discount;
    if ($product_discount == 0 || $user_discount == 0 || $Discount == "both")
        $final_discount = $product_discount + $user_discount;
    else if ($Discount == "product")
        $final_discount = $product_discount;
    else $final_discount = $user_discount;
    return $final_discount;
}


function discount($price, $discount)
{
    if ($discount > 0) {
        $discount = $discount / 100;
        $money_discount = $price * $discount;
        $price = $price - $money_discount;
    }

    return $price;

}


function Get_Adjusted_Price($price, $product_discount, $user_discount, $fpa_category)
{
    global $currency_factor;
    $final_discount = get_discount($product_discount, $user_discount);
    $price = discount($price, $final_discount);

    $Get_FPA_Query = "SELECT * FROM eshop_fpa WHERE eshop_fpa.Category = '$fpa_category' LIMIT 1";
    $Get_FPA = q($Get_FPA_Query);
    $FPA = f($Get_FPA);
    $fpa_value = $FPA['Value'] / 100 + 1;
    $price = $price * $fpa_value;
    $price = round($price * $currency_factor, 2);
    return $price;

}


function eurobank_submit()
{
    if (!unlock("eshop_c2bank"))
        return;
    global $Discount, $Paypal, $Shipment, $URL, $Payment_URL, $Translation;
    $customer_email = $_SESSION['user']['Email'];
    $Order_ID = $_SESSION['Order_ID'];
    $totalweight = 0;
    $cost = 0;
    $ul = '';

    $ul .= "<form name=\"PayformMC\" Method=\"POST\" action=\"$Payment_URL\">
       <INPUT TYPE=\"hidden\" Name=\"APACScommand\" value=\"NewPayment\">
       <INPUT TYPE=\"hidden\" Name=\"merchantID\" VALUE=\"$Paypal\">
       <INPUT TYPE=\"hidden\" Name=\"merchantRef\" VALUE=\"$Order_ID\" >
       <INPUT TYPE=\"hidden\" Name=\"merchantDesc\" VALUE=\"X-Treme Stores\">
       <INPUT TYPE=\"hidden\" Name=\"currency\" VALUE=\"0978\">
       <INPUT TYPE=\"hidden\" Name=\"lang\" VALUE=\"GR\">
       <INPUT TYPE=\"hidden\" Name=\"CustomerEmail\" VALUE=\"$customer_email\">
       <INPUT TYPE=\"hidden\" Name=\"Offset\"  VALUE=\"0\">";

    $telikes_doseis = 1;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $data) {
            list($link, $doseis, $title, $unit_price, $amount, $weight) = array_values($data);
            $product_cost = $amount * $unit_price * $doseis;
            if ($doseis > $telikes_doseis) $telikes_doseis = $doseis;
            if ($telikes_doseis < 2) $telikes_doseis = 0;
        }

        $query_orders = "SELECT * FROM eshop_orders WHERE Order_ID = '$Order_ID'";
        $orders = q($query_orders);
        $row_orders = f($orders);
        $order_cost = $row_orders['Order_Cost'];


        $cost = intval($order_cost * 100);

        $ul .= "<INPUT TYPE=\"hidden\" Name=\"amount\" VALUE=\"$cost\">
       <INPUT TYPE=\"hidden\" Name=\"Period\"  VALUE=\"$telikes_doseis\">";
    }

    $ul .= "<input type=\"submit\"  class='cartSubmit' value=\"" . $Translation['Creditcard_pay'] . "\"> </form> ";
    echo $ul;

    clean_cart();
    unset ($_SESSION['order']);
    unset ($_SESSION['Order_ID']);
}

function deltapay_submit()
{
	global $Translation;
?>

	<script type="text/javascript">

		function acceptance() {
			var accept_btn = document.getElementById('accbtn').checked;
			var form_post = document.getElementById('demo');
			if (accept_btn)
			{
				form_post.submit();
			} else {
				alert("Πρέπει να αποδεχθείτε τους όρους πριν προχωρήσετε σε αγορά.");
			}
		}
		</script>

    <?php
	global $Discount, $Paypal, $Shipment, $URL, $Payment_URL, $Translation;
	$customer_email=$_SESSION['user']['Email'];
	$customer_name = $_SESSION['user']['Name'];
	$Order_ID = $_SESSION['Order_ID'];
	$totalweight=0;
	$cost=0;
    $ul = '';
$ul .="<form Method=\"POST\" action=\"$Payment_URL\" accept-charset=\"UTF-8\" name=\"demo\" id=\"demo\" >
       <br>Έχω διαβάσει και αποδέχομαι τους όρους του καταστήματος.<input type=\"checkbox\" id=\"accbtn\">
       <br><INPUT TYPE=\"hidden\" Name=\"mid\" VALUE=\"$Paypal\">
       <INPUT TYPE=\"hidden\" Name=\"orderid\" VALUE=\"$Order_ID\" >
       <INPUT TYPE=\"hidden\" Name=\"orderDesc\"  VALUE=\"bright.gr\">";

   	$query_orders="SELECT * FROM eshop_orders WHERE Order_ID = '$Order_ID'";
	$orders=q($query_orders);
	$row_orders = f($orders);
	$order_cost = $row_orders['Order_Cost'];
	$cost = number_format($order_cost,2);
	$cost =  str_replace(',', '', $cost);
	$cost =  str_replace('.', ',', $cost);
	$ul .= "<INPUT TYPE=\"hidden\" Name=\"orderAmount\" VALUE=\"$cost\">";



	   $ul .="<INPUT TYPE=\"hidden\" Name=\"currency\" VALUE=\"EUR\">
       <INPUT TYPE=\"hidden\" Name=\"confirmUrl\" VALUE=\"http://www.bright.gr/stockout/Succesfull_Payment\">
       <INPUT TYPE=\"hidden\" Name=\"cancelUrl\" VALUE=\"http://www.bright.gr/stockout/Payment_Error\">
	   ";
		$form_data = "";
		$form_data_array = array();
		$form_data_array[1] = $Paypal;
		$form_data_array[2] = $Order_ID;
		$form_data_array[3] = "bright.gr";
		$form_data_array[4] = $cost;
		$form_data_array[5] = "EUR";
		$form_data_array[6] = "http://www.bright.gr/stockout/Succesfull_Payment";
		$form_data_array[7] = "http://www.bright.gr/stockout/Payment_Error";





		$form_data_array[8] = "Cardlink1";

		$form_data = implode("", $form_data_array);

		$digest = base64_encode(sha1($form_data,true));





$ul .="<input type=\"hidden\" name=\"digest\" value=\"$digest\">";
$ul .="<input type=\"button\" name=\"checkout\" value=\"".$Translation['Creditcard_pay']."\" onclick=\"javascript:acceptance()\" />";
//	$ul .="<input type=\"submit\" class='BankSubmit' value=\"".$Translation['Creditcard_pay']."\"> </form> ";
	echo $ul;

	clean_cart();
	unset ($_SESSION['order']);
	unset ($_SESSION['Order_ID']);

}



function GetGui($MerchantCode,$Charge,$CurrencyCode,$Installments,$CardHolderName,$Param1,$TransactionType)
{
$CardHolderName = urlencode($CardHolderName);
$url="https://www.deltapay.gr/getguid.asp?MerchantCode=".$MerchantCode."&Charge=".$Charge."&CurrencyCode=".$CurrencyCode."&Installments=".$Installments."&CardHolderName=".$CardHolderName."&Param1=".$Param1."&TransactionType=".$TransactionType;

$ch = curl_init();
$timeout = 0;
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$rawdata = curl_exec($ch);
curl_close($ch);
$data = explode('<br>', $rawdata);
return $data['0'];
}


function paypal_submit()
{
    global $Discount, $Paypal, $Shipment, $URL, $Translation, $destination;

    if ($URL == '') {
        $URL = "http://";
        $URL .= $_SERVER['SERVER_NAME'];
        $URL .= $_SERVER['PHP_SELF'];
        if (isset($_SERVER['QUERY_STRING'])) {
            $URL .= "?" . $_SERVER['QUERY_STRING'];
        }
    }


    $totalweight = 0;
    $cost = 0;
    $count = 0;
    $ul = '';
    $ul .= "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">
<input type=\"hidden\" name=\"cmd\" value=\"_cart\">
<input type=\"hidden\" name=\"upload\" value=\"1\">
<input type=\"hidden\" name=\"business\" value=\"$Paypal\">
<INPUT TYPE=\"hidden\" name=\"charset\" value=\"utf-8\">
<input type=\"hidden\" name=\"notify_url\" value=\"$URL \">
<input type=\"hidden\" name=\"currency_code\" value=\"EUR\">";
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $data) {
            $count = $count + 1;
            list($link, $photo, $title, $unit_price, $amount, $weight) = array_values($data);
            $ul .= "
<input type=\"hidden\" name=\"item_name_$count\" value=\"$title\">
<input type=\"hidden\" name=\"amount_$count\" value=\"$unit_price\">
<input type=\"hidden\" name=\"quantity_$count\" value=\"$amount\">";


            $product_cost = $amount * $unit_price;
            $cost = $cost + $product_cost;
            $totalweight = $totalweight + $weight;

        }
    }


    if ($totalweight > 0) $totalweight = $totalweight / 1000;

    $weightcost = Calculate_Cost($totalweight, $destination);
    $count = $count + 1;
    if ($Shipment > 0 && $cost >= $Shipment)
        $weightcost = 0;

    if ($weightcost > 0) {
        $ul .= "<input type=\"hidden\" name=\"item_name_$count\" value=\"" . $Translation['Transfer'] . "\">
<input type=\"hidden\" name=\"amount_$count\" value=\"$weightcost\">
<input type=\"hidden\" name=\"quantity_$count\" value=\"1\">";
    }

    $ul .= "<input type=\"submit\" class='cartSubmit' value=\"" . $Translation['Creditcard_pay'] . "\"> </form> ";

    echo $ul;
    clean_cart();
    unset ($_SESSION['order']);
}

function pay()
{
    global $Payment_Method;
    switch ($Payment_Method) {
        case "paypal":
            paypal_submit();
            break;
        case "eurobank":
            eurobank_submit();
            break;
        case "deltapay":
            deltapay_submit();
            break;
    }
}


function currency_convert($from, $to, $amount)
{
    if ($from == $to) return $amount;
    $amount = urlencode($amount);
    $from_Currency = urlencode($from);
    $to_Currency = urlencode($to);
    $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('"', $rawdata);
    $data = explode(' ', $data['3']);
    $var = $data['0'];
    return $var;
}
