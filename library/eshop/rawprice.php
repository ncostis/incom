<?php
if ($GetRec['Rec_Discount'] > 0 || $_SESSION['user']['Discount'] > 0)
    print number_format(Get_Adjusted_Price($GetRec['Rec_Price'], 0, 0, $GetRec['Rec_Scroll1']), 2, ',', '.') . " " . $ToCurrency; ?>
