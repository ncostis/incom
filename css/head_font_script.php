<?php
$numFont = 0;
$GetFonts_Sel = "SELECT * FROM fonts WHERE Google_Font = 1 AND Font_Langs like '%" . $Lang . "%'";
$GetFonts_Query = q($GetFonts_Sel);
while ($GetFonts = f($GetFonts_Query)) {
    $numFont++;
    if (isset($strFont)) $strFont .= $GetFonts["Font_Family"]; else $strFont = $GetFonts["Font_Family"];
    if ($numFont < nr($GetFonts_Query)) $strFont .= "|";
}

if (nr($GetFonts_Query) > 0) print "<link href='https://fonts.googleapis.com/css?family=$strFont&amp;subset=latin,greek' rel='stylesheet'>\n";
?>