<?php
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');

function upload_file($path, $name, $index) {
    move_uploaded_file($_FILES['file']['tmp_name'][$index],$path.'/'.$name);
    //echo $path.'/'.$name;
}
?>