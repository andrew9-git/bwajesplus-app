<?php

if(isset($_FILES['upload']['tmp_name']))
{
    $legal_photo_name = $_FILES['upload']['name'];
    $legal_photo_size = $_FILES['upload']['size'];

    $allowed_images = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
    $image_ext = pathinfo($legal_photo_name, PATHINFO_EXTENSION);

    if(!in_array($image_ext, $allowed_images))
    {
        $error = 'The accepted cover photo types are png and jpg/jpeg only';
        echo "<script type='text/javascript'>alert($error);</script>";
    }
    elseif($legal_photo_size > 5000000)
    {
        $error = 'The accepted cover photo size should not be more than  5Mb';
        echo "<script type='text/javascript'>alert($error);</script>";
    }
    else
    {
        $new_legal_photo_name = time() .'_' . $legal_photo_name;
        $legal_photo_folder = 'upload_photos/';
        $tmp_legal_photo = $_FILES['upload']['tmp_name'];

        chmod('upload_photos', 0777);
        move_uploaded_file($tmp_legal_photo, $legal_photo_folder . $new_legal_photo_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url = 'http://localhost:9090/bwajesplus-app/admin/'.$legal_photo_folder . $new_legal_photo_name;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    
    }
}