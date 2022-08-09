<?php

require_once('includes/functions.php');
include('includes/phpmailer.php');
include('includes/email-template.php');
session_start();

//to edit post
if(isset($_POST['post-id']))
{
    $user_id     = trim($_POST['user-id']); 
    $post_id     = trim($_POST['post-id']);
    $post_title  = trim($_POST['post-title']);
    $description = trim($_POST['description']);
    $category_id = trim($_POST['category']);
    $type_id     = trim($_POST['type']);
    $publish     = trim($_POST['publish']);
    $post        = trim($_POST['post']);
    
    //error array
    $errors = array();

    if(has_presence($post_title) == false)
    {
        $errors[] = 'Title cannot be empty';
    }
    // elseif(accepted_data_type($title, 'str2') == false)
    // {
    //     $errors[] = $title . ' is not valid';
    // }
    elseif(strlen($post_title) < 8)
    {
        $errors[] = 'The title field cannot be lesser than 8 characters';
    }
    elseif(strlen($post_title) > 60)
    {
        $errors[] = 'The title field cannot be more than 60 characters';
    }

    if(has_presence($description) == false)
    {
        $errors[] = 'Description cannot be empty';
    }
    // elseif(accepted_data_type($description, 'str2') == false)
    // {
    //     $errors[] = $description . ' is not valid';
    // }
    elseif(strlen($description) < 20)
    {
        $errors[] = 'The description field cannot be lesser than 20 characters';
    }
    elseif(strlen($description) > 160)
    {
        $errors[] = 'The description field cannot be more than 160 characters';
    }

    if(accepted_option($category_id) == false)
    {
        $errors[] = 'Please select a post category';
    }

    if(accepted_option($type_id) == false)
    {
        $errors[] = 'Please select a post type';
    }

    if($publish == 0)
    {
        //checking if the number of posts by the user is more than the allowed private posts by the user(10)
        $no_of_private_post_allowed = fetch_single_row($user_id, 'users')['no_of_private_post_allowed'];
        if(db_row_count($user_id, 'user_id', 'posts', 'int') >= 10)
        {
            $errors[] = 'You cannot have more than ' . $no_of_private_post_allowed . ' <b>unpublished/private</b> posts. <b><i>Remove ads</i></b> to increase the number of private posts you can create';
        }
    }

    if(has_presence($post) == false)
    {
        $errors[] = 'Post cannot be empty';
    }
    // elseif(accepted_data_type($post, 'str2') == false)
    // {
    //     $errors[] = $post . ' is not valid';
    // }
    elseif(strlen($post) < 1000)
    {
        $errors[] = 'Your post cannot be lesser than 1000 characters';
    }
    elseif(strlen($post) > 65535)
    {
        $errors[] = 'Your post cannot be more than 65535 characters';
    }
    else
    {
        //The reason for placing this here is to ensure that cover photo is not added twice to the folder due to some unknown reason in ckeditor
        if(isset($_FILES['cover-photo']['name']))
        {
            $update_cover_photo = 1;

            $cover_photo_name = $_FILES['cover-photo']['name'];
            $cover_photo_size = $_FILES['cover-photo']['size'];
        
            $allowed_images = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
            $image_ext = pathinfo($cover_photo_name, PATHINFO_EXTENSION);
        
            if(!in_array($image_ext, $allowed_images))
            {
                $errors[] = 'The accepted cover photo types are png and jpg/jpeg only';
            }
            elseif($cover_photo_size > 1000000)
            {
                $errors[] = 'The accepted cover photo size should not be more than 1Mb';
            }
            else
            {
                $new_cover_photo_name = time() .'_' . $cover_photo_name;
                $cover_photo_folder = 'cover_photos/';
                $tmp_cover_photo = $_FILES['cover-photo']['tmp_name'];
            
                move_uploaded_file($tmp_cover_photo, $cover_photo_folder .$new_cover_photo_name);
            }
        }
        else
        {
            $update_cover_photo = 0;
        }
    }
    
    if(empty($errors))
    {
        if(isset($new_cover_photo_name))
        {
            $new_cover_photo_name = $new_cover_photo_name;
        }
        else
        {
            $new_cover_photo_name = '';
        }

        $values = array(
            'id'          => $post_id,
            'title'       => $post_title,
            'description' => $description,
            'post'        => $post,
            'cover_photo' => $new_cover_photo_name,
            'category_id' => $category_id,
            'type_id'     => $type_id,
            'published'   => $publish,
        );

        //insert into posts table
        $executed = update_posts($values, $update_cover_photo);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> Your post has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

?>