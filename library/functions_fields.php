<?php

/*********** RETURN REC FIELD ***********/
function getField($ListField)
{
    if ($ListField == "More") return "More";
    if (($ListField <> "List_DateStart") && ($ListField <> "List_DateStop") && ($ListField <> "List_HotPrice") && ($ListField <> "List_BestSeller") && ($ListField <> "List_BestPrice") && ($ListField <> "List_BestChoice")) {
        return str_replace("List", "Rec", $ListField);
    }
}

// EDITOR //
function getEditor($RecID, $Path_Texts, $ednum, $style, $path)
{
    require_once $path . "_cm_admin/core/initvars.php";
    $GetText_Sel = "SELECT Rec_Text1,Rec_Text2 FROM records WHERE Rec_ID = $RecID";
    $GetText_Query = q($GetText_Sel);
    $GetText = f($GetText_Query);
    $RecText = "Rec_Text" . $ednum;
    if (Auth::isAdmin() && $_GET['le']=="1") $iec = " incom_edit_container";
    if (($style == 0)||($style == "")) print "<div class=\"textEditor_$RecID$iec\" data-rec-id='$RecID' data-field='$RecText'>";

    $FileName = $Path_Texts . $GetText[$RecText] . ".htm";
    if (strlen($GetText[$RecText]) > 0) {
        if (file_exists($FileName) & (filesize($FileName) > 0)) {
            $handle = fopen($FileName, "r");
            $contents = fread($handle, filesize($FileName));
            fclose($handle);
            echo $contents;
        }
    }
    if (($style == 0)||($style == "")) print "</div>";
}


// MOBILE EDITOR //
function getEditorMob($Rec_ID, $Path_Texts, $ednummob, $style, $path)
{
    require_once $path . "_cm_admin/core/initvars.php";
    $GetText_Sel = "SELECT Rec_TextMob FROM records WHERE Rec_ID = $Rec_ID";
    $GetText_Query = q($GetText_Sel);
    $GetText = f($GetText_Query);
    if (Auth::isAdmin() && $_GET['le']=="1") $iec = " incom_edit_container";
    if (($style == 0)||($style == "")) print "<div class=\"textEditor_$RecID$iec\" data-rec-id='$RecID' data-field='Rec_TextMob'>";

    $FileName = $Path_Texts . $GetText['Rec_TextMob'] . ".htm";
    if (strlen($GetText['Rec_TextMob']) > 0) {
        if (file_exists($FileName) & (filesize($FileName) > 0)) {
            $handle = fopen($FileName, "r");
            $contents = fread($handle, filesize($FileName));
            fclose($handle);
            echo $contents;
        }
    }
    if (($style == 0)||($style == "")) print "</div>";
}

/*********** RETURN RAT FIELD ***********/
function getRatField($ListField)
{
    if ($ListField == "More") return "More";
    if (($ListField <> "List_DateStart") && ($ListField <> "List_DateStop") && ($ListField <> "List_HotPrice") && ($ListField <> "List_BestSeller") && ($ListField <> "List_BestPrice") && ($ListField <> "List_BestChoice")) {
        return str_replace("List", "Rat", $ListField);
    }
}

// EDITOR FROM REC ATTACH TABLE //
function getEditorRat($Rat_ID, $Path_Texts, $ednum, $style, $path)
{
    require_once $path . "_cm_admin/core/initvars.php";
    $GetText_Sel = "SELECT Rat_Text1,Rat_Text2 FROM recs_att_tables WHERE Rat_ID = $Rat_ID";
    $GetText_Query = q($GetText_Sel);
    $GetText = f($GetText_Query);
    global $show;
    $RecText = "Rat_Text" . $ednum;
    $FileName = $Path_Texts . $GetText[$RecText] . ".htm";
    if (strlen($GetText[$RecText]) > 0) {
        if (file_exists($FileName) & (filesize($FileName) > 0)) {
            $handle = fopen($FileName, "r");
            $contents = fread($handle, filesize($FileName));
            fclose($handle);
            echo $contents;
        }
    }
    $show = 0;
    return $show;
}

/*********** DATE 12:23, 28-03-2010 *************/
function DateNum($mdate)
{
    $year = substr($mdate, 0, 4);
    $month = substr($mdate, 4, 2);
    $day = substr($mdate, 6, 2);
    $time = substr($mdate, 8, 2);
    $finaldate = $day . "." . $month . "." . $year;
    return $finaldate;
}//end of function rootlinks

/*********** TIME 12:23 *************/
function TimeNum($mdate)
{
    $hours = substr($mdate, 8, 2);
    $minutes = substr($mdate, 10, 2);
    $timefinal = $hours . ":" . $minutes;
    return $timefinal;
}//end of function rootlinks

/*********** DATE EL *************/
function DateEL($mdate, $style)
{
    $year = substr($mdate, 0, 4);
    $month = substr($mdate, 4, 2);
    $day = substr($mdate, 6, 2);
    $hour = substr($mdate, 8, 2);
    $min = substr($mdate, 10, 2);
    if ($month == '01') {
        $month = "Ιαν";
    }
    if ($month == '02') {
        $month = "Φεβ";
    }
    if ($month == '03') {
        $month = "Μαρ";
    }
    if ($month == '04') {
        $month = "Απρ";
    }
    if ($month == '05') {
        $month = "Μαϊου";
    }
    if ($month == '06') {
        $month = "Ιουν";
    }
    if ($month == '07') {
        $month = "Ιουλ";
    }
    if ($month == '08') {
        $month = "Αυγ";
    }
    if ($month == '09') {
        $month = "Σεπ";
    }
    if ($month == '10') {
        $month = "Οκτ";
    }
    if ($month == '11') {
        $month = "Νοεμ";
    }
    if ($month == '12') {
        $month = "Δεκ";
    }
    if ($style <> "") {
        print "<div class=$style>";
    }
    print "$day/$month/$year";
    if ($style <> "") {
        print "</div>";
    }
}//end of function rootlinks

/*********** DATE EN *************/
function DateEN($mdate, $style)
{
    $year = substr($mdate, 0, 4);
    $month = substr($mdate, 4, 2);
    $day = substr($mdate, 6, 2);
    $hour = substr($mdate, 8, 2);
    $min = substr($mdate, 10, 2);
    if ($month == '01') {
        $month = "Jan";
    }
    if ($month == '02') {
        $month = "Feb";
    }
    if ($month == '03') {
        $month = "Mar";
    }
    if ($month == '04') {
        $month = "Apr";
    }
    if ($month == '05') {
        $month = "May";
    }
    if ($month == '06') {
        $month = "June";
    }
    if ($month == '07') {
        $month = "July";
    }
    if ($month == '08') {
        $month = "Aug";
    }
    if ($month == '09') {
        $month = "Sep";
    }
    if ($month == '10') {
        $month = "Oct";
    }
    if ($month == '11') {
        $month = "Nov";
    }
    if ($month == '12') {
        $month = "Dec";
    }
    if ($style <> "") {
        print "<div class=$style>";
    }
    print "$day/$month/$year";
    if ($style <> "") {
        print "</div>";
    }
}//end of function rootlinks

/*********** WEEK DAY GREEK *************/
function weekdaygreek($weekday)
{
    if ($weekday == 'Monday') {
        $weekday = "Δευτέρα";
    }
    if ($weekday == 'Tuesday') {
        $weekday = "Τρίτη";
    }
    if ($weekday == 'Wednesday') {
        $weekday = "Τετάρτη";
    }
    if ($weekday == 'Thursday') {
        $weekday = "Πέμπτη";
    }
    if ($weekday == 'Friday') {
        $weekday = "Παρασκευή";
    }
    if ($weekday == 'Saturday') {
        $weekday = "Σάββατο";
    }
    if ($weekday == 'Sunday') {
        $weekday = "Κυριακή";
    }
    print "$weekday&nbsp;&nbsp;&nbsp;";
}//end of function rootlinks


/*********** MONTH ************/
function printmonth($month)
{
    if ($month == '01') {
        $month = "January";
    }
    if ($month == '02') {
        $month = "February";
    }
    if ($month == '03') {
        $month = "March";
    }
    if ($month == '04') {
        $month = "April";
    }
    if ($month == '05') {
        $month = "May";
    }
    if ($month == '06') {
        $month = "June";
    }
    if ($month == '07') {
        $month = "July";
    }
    if ($month == '08') {
        $month = "August";
    }
    if ($month == '09') {
        $month = "September";
    }
    if ($month == '10') {
        $month = "October";
    }
    if ($month == '11') {
        $month = "November";
    }
    if ($month == '12') {
        $month = "December";
    }
    print "$month";
}//end of function FullDateEL


/*********** MONTH ************/
function printmonthEL($month)
{
    if ($month == '01') {
        $month = "Ιανουάριος";
    }
    if ($month == '02') {
        $month = "Φεβρουάριος";
    }
    if ($month == '03') {
        $month = "Μάρτιος";
    }
    if ($month == '04') {
        $month = "Απρίλιος";
    }
    if ($month == '05') {
        $month = "Μάϊος";
    }
    if ($month == '06') {
        $month = "Ιούνιος";
    }
    if ($month == '07') {
        $month = "Ιούλιος";
    }
    if ($month == '08') {
        $month = "Αύγουστος";
    }
    if ($month == '09') {
        $month = "Σεπτέμβριος";
    }
    if ($month == '10') {
        $month = "Οκτώβριος";
    }
    if ($month == '11') {
        $month = "Νοέμβριος";
    }
    if ($month == '12') {
        $month = "Δεκέμβριος";
    }
    print "$month";
}//end of function FullDateEL
?>