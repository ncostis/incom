<?php
    // Get Rec_ID of Optimized Section
    $GetOptRec_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'optimized' AND Rec_Page_ID = Page_ID";
    $GetOptRec_Query = q($GetOptRec_Sel);
    $GetOptRec = f($GetOptRec_Query);

    $ToolsPagesViews = ['modules_check', 'xml_sitemap', 'seo', 'pages_edit_all_seo', 'database_tools', 'keys', 'update'];

    if(!isset($ID) || !in_array($ID, $ToolsPagesViews) && !in_array($_GET['Rec_ID'], [$GetVar['Rec_ID'], $GetOptRec['Rec_ID']])){
        $activeTabMenu = true;
    }else{
        $activeTabMenu = false;
    }
?>


<div class="menuTabs">
    <a href="#" class="menuTopTab cLight bgDark <?=$activeTabMenu?'active':''?>" data-tab="menu">MENU</a>
    <a href="#" class="menuTopTab cLight bgDark <?=!$activeTabMenu?'active':''?>" data-tab="tools">TOOLS</a>
</div>

<!-- Tabs Content -->
<div class="menuTabsCont">

    <!-- Menu Tab Content -->
    <div class="menuTabCont" data-tabname="menu" style="<?=$activeTabMenu?'display:block':'display:none'?>">

        <div class="admMenuPanel bgDark">
            <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_FieldLists'] == 1) || ($accAdm['Acc_AttTables'] == 1)) { ?>
                <a href="index.php?ID=lists_view" class="admLink btn cLight bgDark <?= ($ID=='lists_view' || $ID=='lists_edit')? 'active':''?>">
                    <div class="menuDotImg field-lists"></div><i class="fas fa-list"></i>&nbsp;&nbsp;<?php print $textFieldList; ?>
                </a>
            <?php } ?>
            <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_Categories'] == 1)) { ?>
                <a href="index.php?ID=pages_view" class="admLink btn cLight bgDark <?= ($ID=='pages_view' || $ID=='pages_edit')? 'active':''?>">
                    <div class="menuDotImg categories"></div><i class="fas fa-sitemap"></i>&nbsp;&nbsp;<?php print $textCategories; ?>
                </a>
            <?php } ?>
            <a href="index.php?ID=records_view" class="admLink btn cLight bgDark <?= (($ID=='records_view' || $ID=='record_view' || $ID=='record_edit' ) && !in_array($_GET['Rec_ID'], [$GetVar['Rec_ID'], $GetOptRec['Rec_ID']]))? 'active':''?>">
                <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;<?php print $textRecords; ?>
            </a>
        </div>

        <?php if ( (unlock("eshop_standart") || $_SESSION["UserID"] == "0") && $GetVar["Rec_Check4"]=="1" ) { ?>

            <div class="eshopLinks admMenuPanel admMenuPanelPadd bgDark">
                <div class="leftBackTitle cMedium">E-SHOP</div>
                <div class="paddingLeftMenu2">
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_OrdRep'] == 1)) { ?>
                        <a href="index.php?ID=eshop" class="admLink cLight"><?php print $textEshopRepor; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Discounts'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Manage_Discounts" class="admLink cLight"><?php print $textDiscounts; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Stats'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Statistics" class="admLink cLight"><?php print $textStatistics; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Settings'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Settings" class="admLink cLight"><?php print $textEshopSetts; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Customers'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Show_All_Customers"
                           class="admLink cLight"><?php print $textEshopCust; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_ShipCost'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Transport"
                           class="admLink cLight"><?php print $textCostTransp; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Zones'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Zones" class="admLink cLight"><?php print $textEshopZones; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_VAT'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_FPA_Categories"
                           class="admLink cLight"><?php print $textFPACateg; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Suppliers'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Suppliers" class="admLink cLight"><?php print $textSuppliers; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Statements'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Status" class="admLink cLight"><?php print $textEshopStatus; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Brands'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Brands" class="admLink cLight"><?php print $textBrands; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_ProdCats'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Categories"
                           class="admLink cLight"><?php print $textProdCategor; ?></a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Eshop_Availability'] == 1)) { ?>
                        <a href="index.php?ID=eshop&action=Update_Availability"
                           class="admLink cLight"><?php print $textAvailability; ?></a>
                    <?php } ?>
                </div>
            </div>

        <?php } ?>

        <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_FieldLists'] == 1) || ($accAdm['Acc_TempCat'] == 1) || ($accAdm['Acc_TempList'] == 1) || ($accAdm['Acc_TempRec'] == 1) || ($accAdm['Acc_TempHead'] == 1)) { ?>
            <div class="templatesLinks admMenuPanel admMenuPanelPadd bgDark">
                <div class="leftBackTitle cMedium">TEMPLATES</div>
                <div class="paddingLeftMenu2">
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_FieldLists'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/build_layout_view.php" data-width="92%" data-height="94%">Website</a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_TempCat'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/method_lists_templates_view.php" data-width="92%" data-height="94%">Categories</a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_TempList'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/lists_templates_view.php" data-width="92%" data-height="94%">Lists</a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_TempRec'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/rec_templates_view.php" data-width="92%" data-height="94%">Records</a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_TempHead'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/listshead_templates_view.php" data-width="92%" data-height="94%">Headers</a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_DynFields'] == 1)) { ?>
            <div class="viewsLinks admMenuPanel admMenuPanelPadd bgDark">
                <div class="leftBackTitle cMedium"><?php print $textSpecialViews; ?></div>
                <div class="paddingLeftMenu2">
                        <a class="popUpWindow admLink cLight" href="core/module_dyn_templates_view.php" data-width="92%" data-height="94%">Dynamic Templates</a>
                        <a class="popUpWindow admLink cLight" href="core/module_recs_display_templates_view.php" data-width="92%" data-height="94%">List Records</a>
                        <a class="popUpWindow admLink cLight" href="core/module_att_templates_view.php" data-width="92%" data-height="94%">Dynamic Modules</a>
                        <a class="popUpWindow admLink cLight" href="core/module_rat_templates_view.php" data-width="92%" data-height="94%">Attached Records</a>
                        <a class="popUpWindow admLink cLight" href="core/dynamic_text_href_view.php" data-width="680" data-height="94%">Dynamic Text Href</a>
                </div>
            </div>
        <?php } ?>

        <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_Modules'] == 1) || ($accAdm['Acc_Javascript'] == 1)) { ?>
            <div class="modulesLinks admMenuPanel admMenuPanelPadd bgDark">
                <div class="leftBackTitle cMedium">MODULES</div>
                <div class="paddingLeftMenu2">
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_Modules'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/pages_view_view.php?HeaderCat=default" data-width="950" data-height="94%">Method Lists</a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_Modules'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/modules_view.php" data-width="980" data-height="94%">Modules</a>
                    <?php } ?>
                    <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_Javascript'] == 1)) { ?>
                        <a class="popUpWindow admLink cLight" href="core/javascript_view.php" data-width="860" data-height="94%">Javascripts</a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

    </div><!-- END Menu Tab Content -->

    <!-- Tools Tab Content -->
    <div class="menuTabCont" data-tabname="tools" style="<?=!$activeTabMenu?'display:block':'display:none'?>">
        
        <div class="admMenuPanel bgDark">

            <a href="index.php?ID=modules_check" class="admLink btn cLight bgDark <?= ($ID=='modules_check')? 'active':''?>">
                <i class="fas fa-cubes"></i>&nbsp;&nbsp;Manage Modules
            </a>
            <a href="index.php?ID=xml_sitemap" class="admLink btn cLight bgDark <?= ($ID=='xml_sitemap')? 'active':''?>">
                <i class="fas fa-sitemap"></i>&nbsp;&nbsp;XML SiteMap
            </a>
            <a href="index.php?ID=record_edit&Page_ID=<?php echo $GetOptRec['Page_ID']; ?>&Rec_ID=<?php echo $GetOptRec['Rec_ID']; ?>" class="admLink btn cLight bgDark <?= ($_GET['Rec_ID']==$GetOptRec['Rec_ID'])? 'active':''?>">
                <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Optimize
            </a>
            <a href="index.php?ID=seo" class="admLink btn cLight bgDark <?= ($ID=='seo')? 'active':''?>">
                <i class="fas fa-search"></i>&nbsp;&nbsp;SEO Checker
            </a>

            <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_SettingsVars'] == 1)) { ?>
                <a href="index.php?ID=record_edit&Page_ID=<?php echo $GetVar['Page_ID']; ?>&Rec_ID=<?php echo $GetVar['Rec_ID']; ?>" class="admLink btn cLight bgDark <?= ($_GET['Rec_ID']==$GetVar['Rec_ID'])? 'active':''?>"  title="Set Init Settings">
                    <i class="fas fa-cog"></i>&nbsp;&nbsp;<?php print $GetVar['Page_Name']; ?>
                </a>
            <?php } ?>

            <a href="index.php?ID=database_tools" class="admLink btn cLight bgDark <?= ($ID=='database_tools')? 'active':''?>">
                <i class="fas fa-database"></i>&nbsp;&nbsp;Database Tools
            </a>

            <?php if ((Auth::accessLevel() == 0) || ($accAdm['Acc_Activate'] == 1)) { ?>
                <a href="index.php?ID=keys" class="admLink btn cLight bgDark <?= ($ID=='keys')? 'active':''?>">
                    <i class="fas fa-unlock-alt"></i>&nbsp;&nbsp;<?php print $textActivate;?>
                </a>
            <?php } ?>

            <a href="index.php?ID=incom_update" class="admLink btn cLight bgDark active" style="display:none" id="check_version">
                 <i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;New version <p class="right"><small>v</small><span id="update_version"></span></p>
            </a>

            <script>
                $(document).ready(function(){
                    $.post( "core/check_version.php", { Current_Version: "<?=$incom_version?>" }, function( data ) {
                        if(data!=""){
                          $("#update_version").text(data);
                          $("#check_version").fadeIn(0);
                      }
                    });
                })
            </script>

        </div>

        <div class="admMenuPanel bgDark paddingLeftMenu themeSelector">
            <div class="top10"></div>
            <span class="cMedium" style="padding:5px 0;display:inline-block">Choose Theme</span>
            <div class="form-group">
                <label class="cLight bgDark">Default<input type="radio" name="colorTheme" value="defaultTheme"></label>
            </div>
            <div class="form-group">
                <label class="cLight bgDark">Dark<input type="radio" name="colorTheme" value="darkTheme"></label>
            </div>
            <div class="form-group">
                <label class="cLight bgDark">Light<input type="radio" name="colorTheme" value="lightTheme"></label>
            </div>
            <div class="top10"></div>
        </div>

    </div><!-- END Tools Tab Content -->

</div>