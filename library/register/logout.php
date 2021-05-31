<?php
require "../../_cm_admin/siteurl.php";
session_start();
unset ($_SESSION['user']);
unset ($_SESSION['MemberMemID']);
unset ($_SESSION['MemberUserName']);
unset ($_SESSION['MemberMemName']);
unset ($_SESSION['MemberFullAccess']);
unset ($_SESSION['cart']);

?>
<script language="JavaScript">
    window.location = "<?php echo $rootURL; ?>";
</script>
