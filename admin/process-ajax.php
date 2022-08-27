<?php

require_once('includes/functions.php');
session_start();

if(isset($_POST['admin-type']))
{
    $registered_by = trim($_POST['registered-by']);
    $first_name    = trim($_POST['first-name']);
    $last_name     = trim($_POST['last-name']);
    $email         = trim($_POST['email']);
    $admin_type    = trim($_POST['admin-type']);
    $gender        = trim($_POST['gender']);
    $phone         = trim($_POST['phone']);
    $bio           = trim($_POST['bio']);
    $website       = trim($_POST['website']);
    $birth_date    = trim($_POST['birth-date']);
    $address       = trim($_POST['address']);
    $city          = trim($_POST['city']);
    $state         = trim($_POST['state']);
    $country       = trim($_POST['country']);
    
    //generating password for admin
    $password='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-=+[]{}()@?&';
    $password = str_shuffle($password);
    $password = substr($password, 0, 8);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //error array
    $errors = array();

    if(has_presence($first_name) == false)
    {
        $errors[] = 'First name cannot be empty';
    }
    elseif(strlen($first_name) < 2)
    {
        $errors[] = 'First name cannot be lesser than 2 characters';
    }
    elseif(strlen($first_name) > 30)
    {
        $errors[] = 'First name cannot be more than 30 characters';
    }   
    elseif(accepted_data_type($first_name, 'name') == false)
    {
        $name = ucfirst($first_name);
        $errors[] = $name . ' is not a valid first name';
    }
    else
    {
        //generating admin's username
        $username = username($first_name);
    }

    if(has_presence($last_name) == false)
    {
        $errors[] = 'Last name cannot be empty';
    }
    elseif(strlen($last_name) < 2)
    {
        $errors[] = 'Last name cannot be lesser than 2 characters';
    }
    elseif(strlen($last_name) > 30)
    {
        $errors[] = 'Last name cannot be more than 30 characters';
    }
    elseif(accepted_data_type($last_name, 'name') == false)
    {
        $name = ucfirst($last_name);
        $errors[] = $name . ' is not a valid last name';
    }

    if(has_presence($email) == false)
    {
        $errors[] = 'Email cannot be empty';
    }
    elseif(accepted_data_type($email, 'email') == false)
    {
        $errors[] = $email . ' is not a valid email';
    }

    if(accepted_option($gender) == false)
    {
        $errors[] = 'Please select a gender';
    }

    if(isset($_FILES['admin-photo']['name']))
    {
        $admin_photo_name = $_FILES['admin-photo']['name'];
        $admin_photo_size = $_FILES['admin-photo']['size'];
    
        $allowed_images = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
        $image_ext = pathinfo($admin_photo_name, PATHINFO_EXTENSION);
    
        if(!in_array($image_ext, $allowed_images))
        {
            $errors[] = 'The accepted admin photo types are png and jpg/jpeg only';
        }
        elseif($admin_photo_size > 1000000)
        {
            $errors[] = 'The accepted admin photo size should not be more than 1Mb';
        }
        else
        {
            $new_admin_photo_name = time() .'_' . $admin_photo_name;
            $admin_photo_folder = 'profile_images/';
            $tmp_admin_photo = $_FILES['admin-photo']['tmp_name'];
        
            move_uploaded_file($tmp_admin_photo, $admin_photo_folder .$new_admin_photo_name);
        }
    }
    else
    {
        $errors[] = 'You must upload a photo for admin';
    }

    if(has_presence($phone) == false)
    {
        $errors[] = 'Phone cannot be empty';
    }
    elseif(accepted_data_type($phone, 'phone') == false)
    {
        $errors[] = 'Invalid phone format';
    }

    if(has_presence($bio) == false)
    {
        $errors[] = 'Bio cannot be empty';
    }
    elseif(strlen($bio) < 100)
    {
        $errors[] = 'Bio should not be lesser than 100 characters';
    }
    elseif(strlen($bio) > 65535)
    {
        $name = substr(ucfirst($bio), 0, 8);
        $errors[] = 'Bio should not be more than 65535 characters';
    }

    if(has_presence($website) == false)
    {
        $errors[] = 'Website cannot be empty';
    }
    elseif(accepted_data_type($website, 'url') == false)
    {
        $errors[] = 'Invalid website address is valid';
    }
    
    if(has_presence($address) == false)
    {
        $errors[] = 'Address cannot be empty';
    }
    if(accepted_data_type($address, 'address') == false)
    {
        $errors[] = 'Invalid address is valid';
    }
    elseif(strlen($address) < 5)
    {
        $errors[] = 'Address should not be lesser than 5 characters';
    }
    elseif(strlen($address) > 255)
    {
        $errors[] = 'Address should not be greater than 255 characters';
    }

    if(has_presence($city) == false)
    {
        $errors[] = 'City cannot be empty';
    }
    elseif(accepted_data_type($city, 'address') == false)
    {
        $errors[] = 'Invalid city';
    }
    elseif(strlen($city) < 5)
    {
        $errors[] = 'City should not be lesser than 5 characters';
    }
    elseif(strlen($city) > 255)
    {
        $errors[] = 'City should not be greater than 255 characters';
    }

    if(has_presence($state) == false)
    {
        $errors[] = 'State cannot be empty';
    }
    elseif(accepted_data_type($state, 'address') == false)
    {
        $errors[] = 'Invalid state';
    }
    elseif(strlen($state) < 5)
    {
        $errors[] = 'State should not be lesser than 5 characters';
    }
    elseif(strlen($state) > 255)
    {
        $errors[] = 'State should not be greater than 255 characters';
    }

    if(has_presence($country) == false)
    {
        $errors[] = 'Country cannot be empty';
    }
    if(accepted_data_type($country, 'address') == false)
    {
        $errors[] = 'Invalid country';
    }
    elseif(strlen($country) < 5)
    {
        $errors[] = 'Country should not be lesser than 5 characters';
    }
    elseif(strlen($country) > 255)
    {
        $errors[] = 'Country should not be greater than 255 characters';
    }


    if(empty($errors))
    {
        //insert user into admin table
        $values = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'username'      => $username,
            'admin_type'    => $admin_type,
            'gender'        => $gender,
            'password'      => $hashed_password,
            'profile_image' => $new_admin_photo_name,
            'phone'         => $phone,
            'bio'           => $bio,
            'website'       => $website,
            'birthdate'     => $birth_date,
            'address'       => $address,
            'city'          => $city,
            'state'         => $state,
            'country'       => $country,
            'registered_by' => $registered_by,
        );

        $executed = insert_into_admin($values);

        if($executed)
        {
            //insert into passwords table
            $values = array($email, $hashed_password);

            $executed = insert_into_admin_passwords($values);

            if($executed)
            {
                $msg = "<div class='card success'><div><b>Success!</b> Admin registered. Admin's username: " . $username . " password: " . $password . "</div></div>";
                echo $msg;
            }

        }
    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['generate-id']))
{
    $generate_id = trim($_POST['generate-id']);
    $updated_by    = trim($_POST['admin-id']);

    //generating new password for admin
    $password='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-=+[]{}()@?&';
    $password = str_shuffle($password);
    $password = substr($password, 0, 8);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $values = array(
        'generate_id' => $generate_id,
        'password'    => $hashed_password,
        'updated_by'  => $updated_by
    );

    $executed = update_admin_password($values);
    if($executed)
    {
        $msg = "<div class='card success'><div>New password: <b>" . $password . "</b></div></div>";
        echo $msg;
    }
}

?>