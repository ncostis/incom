<?php
    if (($_GET['ID'] == "pages_view") || ($_GET['ID'] == "record_delete")) {
        require_once("init.php");
    } else {
        require_once("../init.php"); // lang_view
    }
    require_once($routes["folder_paths.php"]);

    if(!function_exists('delete_gallery')){
        function delete_gallery($Img_Cat_ID){
            $selDelCat = "SELECT * FROM img_category WHERE Img_Cat_ID = $Img_Cat_ID";
            $DelCat_Query = q($selDelCat);

            while ($GetCat = f($DelCat_Query)) {
                //select images to delete
                $sf = "SELECT * FROM images WHERE Img_Cat_ID = $Img_Cat_ID";
                $sdf = q($sf);

                //delete images
                while ($DelFile = f($sdf)) {
                    $ImDelID = $DelFile['Img_ID'];
                    //select image to delete
                    $Delete_File_Sel = "SELECT * FROM images WHERE Img_ID = $ImDelID";
                    $Delete_File_q = q($Delete_File_Sel);
                    $Delete_File = f($Delete_File_q);
                    $imagePath="../uploads/photos/";

                    $dimensions=generateDimensions();
                    foreach ($dimensions as $folder => $value) {
                        if(file_exists($imagePath . $folder."/".$Delete_File['Img_Ext'])) unlink($imagePath . $folder."/".$Delete_File['Img_Ext']);
                    }

                    $delrec = "DELETE FROM images WHERE Img_ID = '$ImDelID'";
                    q($delrec);

                    $dpt = "DELETE FROM images_text WHERE ImgT_ImgID = $ImDelID";
                    q($dpt);
                }
            }
            $dcat = "DELETE FROM img_category WHERE Img_Cat_ID = $Img_Cat_ID LIMIT 1";
            q($dcat);
        }
    }

    if(!function_exists('delete_nr_gallery')){
        function delete_nr_gallery($Nric_Cat_ID){
            $selDelCat = "SELECT * FROM noresize_images WHERE Nri_Cat_ID = $Nric_Cat_ID";
            $DelCat_Query = q($selDelCat);

            while ($GetCat = f($DelCat_Query)) {
                $Del_ID = $GetCat['Nri_ID'];
                //select file to delete
                $sf = "SELECT * FROM noresize_images WHERE Nri_ID=$Del_ID";
                $sdf = q($sf);
                $DelFile = f($sdf);
                $imagePath="../uploads/nr_photos/";

                $dimensions=generateDimensions();
                foreach ($dimensions as $folder => $value) {
                    if(file_exists($imagePath . $folder."/".$DelFile['Nri_ImageZoom'])) unlink($imagePath . $folder."/".$DelFile['Nri_ImageZoom']);
                }

                $dp = "DELETE FROM noresize_images WHERE Nri_ID = $Del_ID";
                q($dp);

                $dpt = "DELETE FROM noresize_images_text WHERE NRImgT_ImgID = $Del_ID";
                q($dpt);

            }
            $dcat = "DELETE FROM noresize_images_cat WHERE Nric_Cat_ID = $Nric_Cat_ID LIMIT 1";
            q($dcat);
        }
    }

    $Rec_Sel = "SELECT * FROM records WHERE Rec_ID = $Rec_ID";
    $Rec_Query = q($Rec_Sel);
    $DelRec = f($Rec_Query);

    // Delete Text htm 1
    $myFile = $Path_Texts_Admin . $DelRec['Rec_Text1'] . ".htm";
    if (file_exists($myFile)) unlink($myFile);
    // Delete Text htm 2
    $myFile = $Path_Texts_Admin . $DelRec['Rec_Text2'] . ".htm";
    if (file_exists($myFile)) unlink($myFile);

    // Delete attached records in table recs_att_tables
    $delrat = "DELETE FROM recs_att_tables WHERE Rat_Rec_ID = $Rec_ID";
    q($delrat);

    // Delete related records in table related_pages
    $delrelpages = "DELETE FROM related_pages WHERE Related_Rec_ID = $Rec_ID";
    q($delrelpages);

    // Delete attach file 1
    $myFile = $Path_File_Admin . $DelRec['Rec_File1'];
    // If numIm > 1 it means that file is attached to a master record, so do not delete it
    $numIm = checkIfFileExistsLang('Rec_File1',$DelRec['Rec_File1']);
    if ((file_exists($myFile)) AND ($DelRec['Rec_File1'] <> "") AND ($numIm == 1)) {
        unlink($myFile);
    }
    // Delete attach file 2
    $myFile = $Path_File_Admin . $DelRec['Rec_File2'];
    $numIm = checkIfFileExistsLang('Rec_File2',$DelRec['Rec_File2']);
    if ((file_exists($myFile)) AND ($DelRec['Rec_File2'] <> "") AND ($numIm == 1)) {
        unlink($myFile);
    }

    //delete gallery
    $Img_Cat_ID = $DelRec['Rec_Img_Cat_ID'];
    if(!empty($Img_Cat_ID) && $Img_Cat_ID>0){
        $num_attached_to_records = nr(q("SELECT Rec_Img_Cat_ID FROM records WHERE Rec_Img_Cat_ID=$Img_Cat_ID"));
        if($num_attached_to_records==1){
            delete_gallery($Img_Cat_ID);
        }
    }

    //delete nr gallery
    $NoResImg_Cat_ID = $DelRec['Rec_NoResImg_Cat_ID'];
    if(!empty($NoResImg_Cat_ID) && $NoResImg_Cat_ID>0){
        $num_attached_to_records = nr(q("SELECT Rec_NoResImg_Cat_ID FROM records WHERE Rec_NoResImg_Cat_ID=$NoResImg_Cat_ID"));
        if($num_attached_to_records==1){
            delete_nr_gallery($NoResImg_Cat_ID);
        }
    }


    $imagesFields = array("Image1","Image2","Image3","Image4","Image5","Image6");

    foreach($imagesFields as $imageField){
        //delete files for image1 to image6
        $column="Rec_".$imageField;
        $imageName=$DelRec[$column];

        if($imageName=="") continue;

        $flagDRID = 0;

        if($DelRec['Rec_Rel_LangID']<>""){
            if(strpos($imageName, "_".$DelRec['Rec_Rel_LangID']."_") !== false)
            $flagDRID = 1;
        }

        $dimensions=generateDimensions();
        if ($flagDRID == 0){
            foreach ($dimensions as $folder => $value) {
                if(file_exists($Path_Image_Admin . $folder."/".$imageName)){
                	unlink($Path_Image_Admin . $folder."/".$imageName);
                }
            }
            //delete image outside folders
            if(file_exists($Path_Image_Admin . "/".$imageName)){
                	unlink($Path_Image_Admin . "/".$imageName);
            }
            //delete fallback jpg image outside folders
            if(file_exists($Path_Image_Admin . "/".str_replace(".webp",".jpg",$imageName))){
                	unlink($Path_Image_Admin . "/".str_replace(".webp",".jpg",$imageName));
            }
            if(file_exists($Path_Image_Admin . "/".str_replace(".webp",".jpeg",$imageName))){
                	unlink($Path_Image_Admin . "/".str_replace(".webp",".jpeg",$imageName));
            }
        }
    }

    $imagesFields = array("Rec_Logo","Rec_Logo_Bottom","Rec_Image_Social");
    foreach($imagesFields as $imageField){
        $column=$imageField;
        $imageName=$DelRec[$column];
        $flagDRID = 0;

        if($DelRec['Rec_Rel_LangID']<>""){
            if(strpos($imageName, "_".$DelRec['Rec_Rel_LangID']."_") !== false)
            $flagDRID = 1;
        }
        if ($flagDRID == 0){
            $filePath = $Path_Image_Admin . $imageName;
            if (($flagDRID == 0) && file_exists($filePath)){
            	unlink($filePath);
            }
        }
    }

    //Delete Docs
    $Sel_Docs = "SELECT * FROM docs WHERE Doc_Rec_ID = $Rec_ID";
    $Docs_Query = q($Sel_Docs);
    while ($getDocs = f($Docs_Query)) {
        //delete Doc file
        if ($getDocs['Doc_Name'] <> "") {
            $myFile = $Path_Docs_Admin . $getDocs['Doc_Name'];
            if (file_exists($myFile)) unlink($myFile);
        }
    }
    $seldel = "DELETE FROM docs WHERE Doc_Rec_ID = $Rec_ID";
    q($seldel);

    //Delete Docs2
    $Sel_Docs = "SELECT * FROM docs2 WHERE Doc_Rec_ID = $Rec_ID";
    $Docs_Query = q($Sel_Docs);
    while ($getDocs = f($Docs_Query)) {
        //delete Doc file
        if ($getDocs['Doc_Name'] <> "") {
            $myFile = $Path_Docs2_Admin . $getDocs['Doc_Name'];
            if (file_exists($myFile)) unlink($myFile);
        }
    }
    $seldel = "DELETE FROM docs2 WHERE Doc_Rec_ID = $Rec_ID";
    q($seldel);


    // DELETE RECORD
    // -------------
    $delrec = "DELETE FROM records WHERE Rec_ID = $Rec_ID LIMIT 1";
    q($delrec);

    //DELETE FROM SEARCHTEXT SRec_ID
    $tablename = "searchtext"; // Σταθερό table
    $delSrec = "DELETE FROM $tablename WHERE SRec_ID = $Rec_ID";
    q($delSrec);


?>