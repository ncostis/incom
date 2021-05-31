<?php
if ($ShowTopRes == 1) {
    print "<table style='width:100%;'>";
    $syn = ($StartAt + $stepsize);
    $fromr = $StartAt + 1;
    print "<tr><td style='padding:$cp;' class=topresults>";
    print "$fromr - ";
    if ($syn > $num_rows) {
        print "$num_rows";
    } else {
        print "$syn";
    }
    print " $apo <B>$num_rows</B> $arithos_eggrafon $sumpages<BR>";
    print "</td>";
    print "</tr>";
    print "</table>";
    print "<br>";
}
?>