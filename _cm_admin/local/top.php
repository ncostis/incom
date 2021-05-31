<?php
$accAdm_Query = q("SELECT * FROM passwords WHERE Pas_ID = '".$_SESSION["UserID"]."'");
$accAdm = f($accAdm_Query);

$Active_Lang = f(q("SELECT * FROM lang WHERE Lang_Title='".$_SESSION["AdminLang"]."'"));
$Langs_Query = q("SELECT * FROM lang WHERE Lang_Title <> '".$_SESSION["AdminLang"]."'");

$liveEditLink = $rootURL."?le=1";
if(($Page_ID = getparamvalue("Page_ID")) && $Page_ID<>"" && $_SESSION["AdminSection"]=="general"){
    $Page_View = f(q("SELECT Page_View FROM pages WHERE Page_ID = $Page_ID"))['Page_View'];
    if(!empty($Page_View)) $liveEditLink = $rootURL.$Page_View."/?le=1";
}
if(($Rec_ID = getparamvalue("Rec_ID")) && $Rec_ID<>"" && $_SESSION["AdminSection"]=="general"){
    $Page_ID = getparamvalue("Page_ID");
    $page = f(q("SELECT Page_Num_Recs, Page_View FROM pages WHERE Page_ID = $Page_ID"));
    $Page_Num_Recs = $page['Page_Num_Recs'];
    $Page_View = $page['Page_View'];
    if(!empty($Page_View)){
        if($Page_Num_Recs=='999')
            $liveEditLink = $rootURL.$Page_View."/".$Rec_ID."/?le=1";
        else $liveEditLink = $rootURL.$Page_View."/?le=1";
    }
}
?>
<div class="top">
    <div class="topRow1 bgDark">

        <div class="topRowLeft">
            <!-- Logo -->
            <div class="admLogo">
                <a href="https://www.incomcms.com/" target="_blank"><img src="elements/logo.png" alt="" border="0"></a>
            </div>
            <!-- Version -->
            <div class="incomVersion cLight">incom sb_<?php require_once "local/version.php"; ?></div>
        </div>

        <div class="topRowRight">

            <!-- Live Edit -->
            <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_LiveEdit'] == 1)) { ?>
            <div class="right">
                <a href="<?php echo $liveEditLink?>" target="_blank" class="liveEditBtn cLight bgRed"><i class="fas fa-edit"></i> Live Edit</a>
            </div>
        <?php } ?>

            <!-- Website -->
            <div class="right">
                <a href="<?php echo $rootURL?>" target="_blank" class="websiteBtn bgColor cLight"><i class="fas fa-globe"></i> Website</a>
            </div>

            <!-- Languages -->
            <div class="right">
                <div class="langWrapper">

                    <!-- Active Lang -->
                    <a href="index.php?ID=records_view&AdminLang=<?php echo $Active_Lang['Lang_Title']; ?>" class="languageSelector cLight bgDark">
                        <img src="elements/langs/<?php echo $Active_Lang['Lang_Pic']; ?>" border="0" align=absmiddle>&nbsp;&nbsp;<?php echo $Active_Lang['Lang_Desc']; ?>
                    </a>

                    <ul class="languages">
                        <?php
                        while($Select_Lang_row = f($Langs_Query)){?>
                            <li>
                                <a href="index.php?ID=records_view&AdminLang=<?php echo $Select_Lang_row['Lang_Title']; ?>" class="cLight bgDark">
                                    <img src="elements/langs/<?php echo $Select_Lang_row['Lang_Pic']; ?>" border="0" align=absmiddle>&nbsp;&nbsp;<?php echo $Select_Lang_row['Lang_Desc']; ?>
                                </a>
                            </li>
                        <?php }?>

                        <!-- Edit Langs -->
                        <?php if (Auth::accessLevel() == 0) { ?>
                            <li>
                                <a class="popUpWindow cLight bgDark" href="core/lang_view.php" data-width="950" data-height="560"><i class="far fa-plus-square-o"></i>&nbsp;&nbsp;Edit Languages</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <!-- EXPORT/IMPORT LINKS -->
            <!-- <div class="right">
                <div class="csvCont">
                    <a href="index.php?" class="topMenuLink cLight bgDark"><i class="fas fa-file-download"></i>&nbsp;&nbsp;Download CSV</a>
                    <a href="index.php?" class="topMenuLink cLight bgDark"><i class="fas fa-file-upload"></i>&nbsp;&nbsp;Upload CSV</a>
                </div>
            </div> -->

            <!-- Site Members / Administrators / Settings / Activate -->
            <div class="right">

                <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_Members'] == 1)) { ?>
                    <a href="index.php?ID=members_view" class="topMenuLink cLight bgDark"><i class="fas fa-user-friends"></i>&nbsp;&nbsp;<?php print $textSiteUsers; ?></a>
                <?php } ?>

                <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_AddAdminUser'] == 1)) { ?>
                    <a href="index.php?ID=users_view" title="Add Authorized Incom Users" class="topMenuLink cLight bgDark"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;<?php print $textAdminUsers; ?></a>
                <?php } ?>

            </div>

        </div>

    </div>

</div>