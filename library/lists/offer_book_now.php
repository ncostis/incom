<?php if($GetRec["Rec_Field2"]<>"" && $GetRec["Rec_Field28"]<>""){
if($GetRec["Rec_Field1"]<>"") $sub = "<br><small style='margin-top:-10px;display:block;'>".$GetRec["Rec_Field1"]."</small>"; else $sub = ""?>

<a href="<?= $GetRec["Rec_Field28"]?>" target="_blank" class="bookOffer" style="text-align:center"><?= $GetRec["Rec_Field2"].$sub?></a>

<?php }?>