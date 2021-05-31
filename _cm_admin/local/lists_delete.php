<?php
if (Auth::isAdmin()) {

if (getparamvalue("saved") == 'ok') {
    $List_ID = $_POST["List_ID"];

    $dlq = "
			DELETE FROM lists 
			WHERE List_ID = \"$List_ID\"
		";
    q($dlq);
    ?>
    <script language="JavaScript">
        window.location = "index.php?page=lists_view";
    </script>
    <?php
}
} //auth
?>