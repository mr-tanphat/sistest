<?php
require_once('include/SugarFields/Fields/Image/Image.php');
$files = scandir('upload/');
$imgType = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
$count      = 0;
$count_re   = 0;
foreach($files as $image) {
    //do your work here
    if(is_guid($image)){
        $desOri     = 'upload/'.$image;
        $info = getimagesize($desOri);
        if(in_array($info['mime'],$imgType)){
            $imageOri   = new Image($desOri);
            $imageOri->resize(400);
            $imageOri->save($desOri);
            $count++;
            $desCopy    ='custom/uploads/imagesResize/'.$image;
            if (!file_exists($desCopy)) {
                $imageCopy  = new Image($desOri);
                $imageCopy->resize(220,220);
                $imageCopy->save($desCopy);
                $count_re++;
            }
        }

    }
}
echo "$count Converted!! <br><br>$count_re Resized!!";
