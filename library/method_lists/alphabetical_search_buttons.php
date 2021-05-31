<div style="padding-bottom:5px;" class="myriad16">Αλφαβητική Aναζήτηση</div>
<div style="width:680px; padding:15px; background-color:#f1f4f6; border-bottom:3px solid #d8e1e7" align="center">
    <div style="width:620px;" align="center">
        <div class="left top8 bodytext11" style="width:70px;">Ελληνικά:</div>
        <div class="left">
            <?php
            // Build Alphabetical Buttons
            $alfavitEL = array('Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω');
            $alfavitEN = array('A', 'B', 'G', 'D', 'E', 'Z', 'H', 'U', 'I', 'K', 'L', 'M', 'N', 'J', 'O', 'P', 'R', 'S', 'T', 'Y', 'F', 'X', 'C', 'V');

            // ΕΛΛΗΝΙΚΑ
            $numitems = count($alfavitEL);
            for ($i = 0; $i < $numitems; $i++) {
                $letter = $alfavitEL[$i];
                // Select by first character of Rec_Title
                $GetAlphButtons_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND SUBstring(Rec_Title, 1, 1) = '$letter' Order by Rec_Title";
                $GetAlphButtons_Query = q($GetAlphButtons_Sel);
                $numrow = nr($GetAlphButtons_Query);
                if ($numrow > 0) {
                    $numBut++;
                    $var1 = str_replace($alfavitEL, $alfavitEN, $letter); // Convert Greek Letter to English for URL string
                    if ($numBut == 1) $left = "left"; else $left = "left10";
                    print "<div class=\"$left\" align=\"center\"><a href=\"$siteURL$ID/0/$var1/EL/\" class='buttonLetter'>$letter</a></div>";
                    if ($numBut > 12) {
                        $numBut = 0;
                        print "<div style=\"clear:both; padding-top:10px;\"></div>";
                    }
                }
            }
            print "<div style=\"clear:both; padding-top:10px;\"></div>";
            ?>
        </div>
        <div style="clear:both;"></div>

        <div style="border-bottom:1px solid #cddae0;"></div>

        <div class="top8">
            <div class="left top8 bodytext11" style="width:70px;">Αγγλικά:</div>
            <div class="left">
                <?php
                // ENGLISH
                $numBut = 0;
                $numitems = count($alfavitEN);
                for ($i = 0; $i < $numitems; $i++) {
                    $letter = $alfavitEN[$i];
                    // Select by first character of Rec_Title
                    $GetAlphButtons_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND SUBstring(Rec_Title, 1, 1) = '$letter' Order by Rec_Title";
                    $GetAlphButtons_Query = q($GetAlphButtons_Sel);
                    $numrow = nr($GetAlphButtons_Query);
                    if ($numrow > 0) {
                        $numBut++;
                        if ($numBut == 1) $left = "left"; else $left = "left10";
                        print "<div class=\"$left\" align=\"center\"><a href=\"$siteURL$ID/0/$letter/EN/\" class='buttonLetter'>$letter</a></div>";
                        if ($numBut > 12) {
                            $numBut = 0;
                            print "<div style=\"clear:both; padding-top:10px;\"></div>";
                        }
                    }
                }
                print "<div style=\"clear:both; padding-top:10px;\"></div>";
                ?>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>
