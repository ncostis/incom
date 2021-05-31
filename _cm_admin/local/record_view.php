<?php
require_once("init.php");

$tmpPageID = getparamvalue('Page_ID');
$Select_Page = "SELECT * FROM pages WHERE Page_ID = '$tmpPageID'";
$Select_Page_q = q($Select_Page);
$Select_Page_row = f($Select_Page_q);

$CurList_Sel = "SELECT * FROM lists WHERE List_ID = {$Select_Page_row['Page_List_ID']}";
$CurList_Query = q($CurList_Sel);
$CurList = f($CurList_Query);
// print_r($CurList);

$GetSection_Sel = "SELECT Section_Title FROM sections WHERE Section_Name = '".$_SESSION["AdminSection"]."'";
$GetSection_Query = q($GetSection_Sel);
$GetSection = f($GetSection_Query);


$sort_field = getparamvalue('sort_field');
$sort_method = getparamvalue('sort_method');

if(getparamvalue('orderSubmit') == null){ //not submited
    $sort_field = "Rec_Order";
    $sort_method = "Asc";
}

$classSortableDiv = $sort_field == "Rec_Order" ? "sortableContainerRecords":"";

$GetRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = '$tmpPageID' AND Rec_Page_Content = 0 ORDER BY BINARY Rec_Active, $sort_field $sort_method, Rec_ID ASC";
$GetRec_Query = q($GetRec_Sel);

$activeFields = ["List_Title"];
?>

<div class="topInternalTitle bgLighter">
    <h2><span class="cMedium"><i class="fas fa-pen"></i></span> <span class="cMedium"><small><?php echo $GetSection['Section_Title'];?> ></small></span> <?php echo $Select_Page_row['Page_Name']; ?></h2>
    <div class="gridTitleRight">
        <?php if (Auth::accessLevel() == 0){?>
            <a href="index.php?ID=pages_edit&Page_ID=<?php echo $tmpPageID; ?>" class='categoriesLink cDefault'><i class="fas fa-share"></i> <?php print $textEditCateg; ?></a>
            <a href="index.php?ID=lists_edit&List_ID=<?php echo $CurList['List_ID']; ?>" class="categoriesLink cDefault"><i class="fas fa-share"></i> Edit Field List</a>
        <?php }?>
    </div>
</div>

<div class="top30"></div>

<!--    elegxos gia to add  -->
<div class="gridTitleLeft">
    <a href="index.php?ID=record_add&Page_ID=<?php echo $tmpPageID; ?>" class="cDefault addNewTemp"><i class="fas fa-plus-square"></i> <span><?php print $textAddRecordPop; ?></span></a>
</div>

<div class="top30"></div>
<div class="clear"></div>
<div class="top20"></div>

<div class="recordsActions bgLighter">
    <ul class="cDefault">
        <li style="padding:11px 10px;">
            <input class="" type="checkbox" name="select-all" id="select-all" />
        </li>
        <li></li>
        <?php foreach($activeFields as $activeField){?>
            <li><a href="#" class="cDefault"><?php echo $CurList[$activeField]?></a></li>
        <?php }?>
    </ul>
    <form name="massDeactive" action="index.php?ID=record_mass_actions&Page_ID=<?php echo($Select_Page_row['Page_ID']); ?>" method="post" style="display:flex;">
            <input id="selectedCheckboxes" type="hidden" name="selectedCheckboxes">

            <div class="actionBtn text selectedRecords cMedium">0 selected</div>

            <div class="actionBtn">
                <button type="submit" name="massΑctivate" style="cursor: pointer;background:transparent;border:none;padding:0;" title="Activate" value="massΑctivate" class="cGreen">
                    <i class="fas fa-toggle-on" title="Activate Record"></i>
                </button>
            </div>

            <div class="actionBtn">
                <button type="submit" name="massDeactivate" style="cursor: pointer;background:transparent;border:none;padding:0;" title="De-Activate" value="massDeactivate" class="cMedium">
                    <i class="fas fa-toggle-off" title="Deactivate Record"></i>
                </button>
            </div>

            <div class="actionBtn">
                <button type="submit" name="massDeleteRecs" style="cursor: pointer;background:transparent;border:none;padding:0;" title="Delete" value="massDelete" class="cRed" onclick="if(confirm('Do you want to delete the selected records?'))return true;else return false;">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>

            <div class="actionBtn">
                <button type="submit" name="massAddtoMultiple" style="cursor: pointer;background:transparent;border:none;padding:0;" title="Add to Multiple Categories" value="massAddtoMultiple" class="cDefault">
                    <i class="fas fa-bezier-curve"></i>
                </button>
            </div>

    </form>
</div>

    <div class="top25 <?=$classSortableDiv?>">
        <?php
        while ($GetRec = f($GetRec_Query)){
            ?>
            <span data-pageid="<?=$GetRec['Rec_ID']?>" class="recordRowContainer rowRecord bgLighter <?php if ($GetRec['Rec_Active'] == 1) echo "bgInactive"?>">
                <div class="sortable-handler bgLight cMedium ui-sortable-handle">
                    <i class="fas fa-arrows-alt-v"></i>
                </div>

                    <div class="recordColumns">

                        <div>
                            <input type="checkbox" name="<?=$GetRec['Rec_ID']?>" id="<?=$GetRec['Rec_ID']?>" />
                        </div>

                        <div>
                            <?php if($GetRec['Rec_ShowHome'] == 1){?>
                                <span class='cDefault'>
                                    <i class='fa fa-home' aria-hidden='true'></i>
                                </span>
                            <?php }?>
                        </div>

                        <div>
                            <a href="index.php?ID=record_edit&Rec_ID=<?php echo $GetRec['Rec_ID']?>&Page_ID=<?php echo $GetRec['Rec_Page_ID']?>" class='recordLink cDefault'><?php echo empty($GetRec["Rec_Title"])?"<span class='cMedium textSmaller'><i>No Title</i></span>":$GetRec["Rec_Title"]?></a>
                        </div>

                        <?php foreach($activeFields as $activeField){?>
                            <?php if(in_array($activeField, ["List_Image1"])){
                                    $Thumbnail_Sel = "Select * FROM images WHERE Img_Cat_ID = ".$GetRec["Rec_Img_Cat_ID"]." Order by Img_Order Asc"; // LIMIT $startat, 100
                                    $Thumbnail_Querry = q($Thumbnail_Sel);
                                    $Thumbnail = f($Thumbnail_Querry);

                                    if(nr($Thumbnail_Querry)>0){ ?>
                                        <div>
                                            <img style="width:40px;height:40px;" src="<?php echo $path_photos_M640 . $Thumbnail['Img_Ext']; ?>">
                                        </div>
                                    <?php }
                                ?>

                            <?php } //if image
                            else{?>
                                <div>
                                    <a href="index.php?ID=record_edit&Rec_ID=<?php echo $GetRec['Rec_ID']?>&Page_ID=<?php echo $GetRec['Rec_Page_ID']?>" class='recordLink cDefault'><?php echo $GetRec[$activeField]?></a>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>

                    <div class="actionBtn activeRec">
                        <?php if($GetRec['Rec_Active']=='0'){ ?>
                            <a href="index.php?ID=record_edit&Rec_ID=<?php echo($GetRec['Rec_ID']); ?>&Page_ID=<?php echo($GetRec['Rec_Page_ID']); ?>&deactivateRec=deactivate" class='cGreen'><i class="fas fa-toggle-on" title="Deactivate Record"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?ID=record_edit&Rec_ID=<?php echo($GetRec['Rec_ID']); ?>&Page_ID=<?php echo($GetRec['Rec_Page_ID']); ?>&deactivateRec=activate" title="Activate Record" class='cMedium'>
                             <i class="fas fa-toggle-off"></i></a>
                        <?php } ?>
                    </div>

                    <div class="actionBtn">
                        <a href="index.php?ID=record_edit&Rec_ID=<?php echo $GetRec['Rec_ID']?>&Page_ID=<?php echo $GetRec['Rec_Page_ID']?>" class="cColor"><i class="fas fa-edit"></i></a>
                    </div>

                    <div class="actionBtn">
                        <a href="#" class="cRed" onclick="toggle_layer('deleteR<?php echo($GetRec['Rec_ID']); ?>');return false;"><i class="fas fa-trash-alt"></i></a>
                    </div>

                    <div class="clear"></div>

                    <div id="deleteR<?php echo($GetRec['Rec_ID']); ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                        <div class="marginPopupInt bottom20">
                        <form name="deletepage<?php echo($GetRec['Rec_ID'])?>" action="index.php?ID=record_delete&Rec_ID=<?php echo($GetRec['Rec_ID']); ?>&Page_ID=<?php echo($GetRec['Rec_Page_ID'])?>" method="post">
                            <div class="inlinediv5 cDefault">Are you sure you want to delete this record?</div>
                            <div class="inlinediv10">
                                <input type="hidden" name="Cat_ID" value="<?php echo($GetRec['Page_ID']); ?>">
                                <input type="Hidden" name="Rec_ID" value="<?php echo($GetRec['Rec_ID']); ?>">
                                <input type="hidden" name="saved" value="ok">
                                <input type="submit" name="delete_rec" value="YES" class="cLight buttonLink bgRed">
                            </div>
                        </form>
                        </div>
                    </div>
            </span>
            <?php
        }
        ?>
    </div>

<script type="text/javascript">
    var selectedCheckboxes = new Array();
    // Listen for click on toggle all checkbox
    $('#select-all').click(function(event) {
        if(this.checked) {
            $(".recordRowContainer").addClass("active");
            //empty the array
            selectedCheckboxes.length=0;
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
                if($(this).attr('name')!='select-all'){
                    selectedCheckboxes.push($(this).attr('id'));
                }
            });
        } else {
            $(".recordRowContainer").removeClass("active");
            selectedCheckboxes.length=0;
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
        $('#selectedCheckboxes').val(selectedCheckboxes);
        $(".selectedRecords").html(selectedCheckboxes.length+" selected");
    });
    // Listen for click on toggle a checkbox
    $(":checkbox").click(function(event) {
        if($(this).attr('name')!='select-all'){
            if(this.checked) {
                selectedCheckboxes.push($(this).attr('id'));
            }else{
                selectedCheckboxes.splice( $.inArray($(this).attr('id'), selectedCheckboxes), 1 );
            }
            $('#selectedCheckboxes').val(selectedCheckboxes);
            $(".selectedRecords").html(selectedCheckboxes.length+" selected");
        }
    });
</script>