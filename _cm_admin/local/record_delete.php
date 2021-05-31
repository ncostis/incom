<?php
require_once('init.php');

if (isset($_POST["saved"]) && $_POST["saved"] == 'ok') {
    
    $Rec_ID = $_GET["Rec_ID"];
    $Page_ID = $_GET['Page_ID'];

    // SYNCHRONIZE
    // Delete from delete_records Folder only from main Synchronize Domain
    $GetSynchr_Sel = "SELECT Section_Name FROM sections WHERE Section_Name = 'synchronize' Limit 0,1";
    $GetSynchr_Query = q($GetSynchr_Sel);
    $GetCurPage_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
    $GetCurPage_Query = q($GetCurPage_Sel);
    $GetCurPage = f($GetCurPage_Query);
    if ($GetCurPage['Page_Synchronize'] == 1 && nr($GetSynchr_Query) > 0) {
        require_once "record_delete_download.php";
    }

    // DELETE ALL FILES & REC
    require_once "local/record_delete_files.php";
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_view&Page_ID=<?php echo $_GET['Page_ID']; ?>";
    </script>
    <?php
}
?>