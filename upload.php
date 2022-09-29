<?php

include('includes/functions.php');

if(isset($_FILES['upload']['tmp_name']))
{
    $post_photo_name = $_FILES['upload']['name'];
    $post_photo_size = $_FILES['upload']['size'];

    $allowed_images = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
    $image_ext = pathinfo($post_photo_name, PATHINFO_EXTENSION);

    if(!in_array($image_ext, $allowed_images))
    {
        $error = 'The accepted cover photo types are png and jpg/jpeg only';
        echo "<script type='text/javascript'>alert($error);</script>";
    }
    elseif($post_photo_size > 5000000)
    {
        $error = 'The accepted cover photo size should not be more than  5Mb';
        echo "<script type='text/javascript'>alert($error);</script>";
    }
    else
    {
        $new_post_photo_name = time() .'_' . $post_photo_name;
        $post_photo_folder = 'post_photos/';
        $tmp_post_photo = $_FILES['upload']['tmp_name'];

        chmod('post_photos', 0777);
        move_uploaded_file($tmp_post_photo, $post_photo_folder . $new_post_photo_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url = url()[0].$post_photo_folder . $new_post_photo_name;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    
    }
}