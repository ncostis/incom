<?php
global $pagename;
$pagename = "index.php";

$connected = false;
$db_name ="di_s370_j9";
$db_login="root";
$db_pswd="";
$db_host = "localhost";

$db = mysqli_connect($db_host, $db_login, $db_pswd);
if(!$db) echo "Error: Unable to connect to Database.";
mysqli_select_db($db, $db_name);
mysqli_query($db, "SET CHARACTER SET 'utf8'");
mysqli_query($db, "SET NAMES 'UTF8'");

// Maria DB fix
// remove STRICT_TRANS_TABLES:
// If a value could not be inserted as given into a transactional table, abort the statement.
mysqli_query($db, "SET SESSION sql_mode = 'ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");


function q($q_str)
{
    global $db,$numq;

    if(empty($q_str)) return false;

    $r = mysqli_query($db, $q_str);

    if(class_exists("Auth")){
        if(!$r && Auth::isAdmin() && $GetVar['Rec_Check2']==1){
            printf("<pre>Mysql Error: %s</pre>", mysqli_error($db));
        }
    }

    return $r;
}

function d($db)
{
    @mysqli_close($db);
}


function e($r)
{
    if (mysqli_numrows($r))
        return 0;
    else return 1;
}


function f($r)
{
    if ($r) {
        return mysqli_fetch_array($r, MYSQLI_ASSOC);
    }
}


function nr($r)
{
    if ($r) {
        return mysqli_num_rows($r);
    }
}


function numfields($r)
{
    return mysqli_num_fields($r);
}


function fn2($r, $i)
{
    $property = mysqli_fetch_field($r);
    return $property->name;
}



/*************** Sanitize input *******************/

function getparamvalue($param)
{
    global $db;
    if (isset($_POST[$param])) return mysqli_real_escape_string($db, trim($_POST[$param]));
    if (isset($_GET[$param])) return mysqli_real_escape_string($db, trim($_GET[$param]));
    return '';
}
?>