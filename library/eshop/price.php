<?php
$GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_Price <> '' AND Rat_Rec_ID= '".$GetRec["Rec_ID"]."' AND Rat_Check1 < 1";
$GetRatRecs_Query = q($GetRatRecs_Sel);
if (nr($GetRatRecs_Query) > 0) {
    if ($product_discount > 0 || $user_discount > 0)
        print $Translation['Discount'] . " <span class=\"cartDiscount\">" . get_discount($product_discount, $user_discount) . "%</span><br>";
    ?>
    <select name="rel_price" style="margin-bottom:20px;">
        <?php
        while ($GetRatRec = f($GetRatRecs_Query)) {
            $price = Get_Adjusted_Price($GetRatRec['Rat_Price'], $product_discount, $user_discount, $fpa_category);
            ?>
            <option
                value="<?php print $GetRatRec['Rat_Title'] . ";" . $price; ?>"><?php print $GetRatRec['Rat_Title'] . " - " . $price . " " . $ToCurrency; ?></option>
            <?php
        } // end of while
        ?>
    </select>
<?php } else {
    if ($product_discount > 0 || $user_discount > 0)
        print $Translation['RawPrice'] . "&nbsp;<span class=\"cartOldPrice\">" . number_format(Get_Adjusted_Price($GetRec['Rec_Price'], 0, 0, $GetRec['Rec_Scroll1']), 2, ',', '.') . " " . $ToCurrency . "</span><br>";
    print $Translation['FinalPrice'] . "&nbsp;<span class=\"cartPrice\">" . Get_Adjusted_Price($GetRec['Rec_Price'], $product_discount, $user_discount, $fpa_category) . " " . $ToCurrency . "</span>";
    $final_price = Get_Adjusted_Price($GetRec['Rec_Price'], $product_discount, $user_discount, $fpa_category);
    ?>
    <input type="hidden" name="price" value="<?php print $final_price; ?>"/>
<?php }


$GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_Price <> '' AND Rat_Rec_ID= '".$GetRec["Rec_ID"]."' AND Rat_Check1 > 0";
$GetRatRecs_Query = q($GetRatRecs_Sel);
if (nr($GetRatRecs_Query) > 0) {
    ?>
    <select name="add_price" style="margin-bottom:20px;">
        <option value="">Additional Selections</option>
        <?php
        while ($GetRatRec = f($GetRatRecs_Query)) {
            $price = Get_Adjusted_Price($GetRatRec['Rat_Price'], $product_discount, $user_discount, $fpa_category);
            ?>
            <option
                value="<?php print $GetRatRec['Rat_Title'] . ";" . $price; ?>"><?php print $GetRatRec['Rat_Title'] . " (+" . $price . " " . $ToCurrency; ?>
                )
            </option>
            <?php
        } // end of while
        ?>
    </select>
<?php }


?>
