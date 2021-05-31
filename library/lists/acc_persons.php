<?php
    $capacity = $GetRecMod['Rec_Field3']!='' ? $GetRecMod['Rec_Field3'] : $GetRec['Rec_Field3'];
    $capacity = str_replace("+", "_", $capacity);
    if($capacity<>''){
        echo "<div class='capacity capacity$capacity'></div>";
    }else{
        echo "<div class='top20'></div>";
    }
?>