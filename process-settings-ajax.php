<?php

require_once('includes/functions.php');
include('includes/phpmailer.php');
include('includes/email-template.php');
session_start();

if(isset($_POST['bio']))
{
    $user_id       = trim($_POST['user-id']);
    $first_name    = trim($_POST['settings-first-name']);
    $last_name     = trim($_POST['settings-last-name']); 
    $business_name = trim($_POST['brand-name']);
    $gender        = trim($_POST['gender']);
    $phone         = trim($_POST['phone']); 
    $bio           = trim($_POST['bio']);
    $public        = trim($_POST['public']);
    $website       = trim($_POST['website']); 
    $birth_date    = trim($_POST['birth-date']);
    $address       = trim($_POST['address']); 
    $city          = trim($_POST['city']);
    $state         = trim($_POST['state']);
    $country       = trim($_POST['country']);

    //error array
    $errors = array();

    if(has_presence($first_name) == false)
    {
        $errors[] = 'First name cannot be empty';
    }
    elseif(strlen($first_name) < 2)
    {
        $name = ucfirst($first_name);
        $errors[] = $name . ' cannot be lesser than 2 characters';
    }
    elseif(strlen($first_name) > 30)
    {
        $name = substr(ucfirst($first_name), 0, 8);
        $errors[] = $name . ' cannot be more than 30 characters';
    } 
    elseif(accepted_data_type($first_name, 'str') == false)
    {
        $name = ucfirst($first_name);
        $errors[] = $name . ' is not a valid first name';
    }

    if(has_presence($last_name) == false)
    {
        $errors[] = 'Last name cannot be empty';
    }
    elseif(strlen($last_name) < 2)
    {
        $name = ucfirst($last_name);
        $errors[] = $name . ' cannot be lesser than 2 characters';
    }
    elseif(strlen($last_name) > 30)
    {
        $name = substr(ucfirst($last_name), 0, 8);
        $errors[] = $name . ' cannot be more than 30 characters';
    }
    elseif(accepted_data_type($last_name, 'str') == false)
    {
        $name = ucfirst($last_name);
        $errors[] = $name . ' is not a valid last name';
    }

    if(has_presence($business_name) == false)
    {
        $errors[] = 'Business name cannot be empty';
    }
    elseif(strlen($business_name) < 1)
    {
        $name = ucfirst($business_name);
        $errors[] = $name . ' cannot be lesser than 1 characters';
    }
    elseif(strlen($business_name) > 255)
    {
        $name = substr(ucfirst($business_name), 0, 8);
        $errors[] = $name . ' cannot be more than 255 characters';
    }

    if(accepted_option($gender) == false)
    {
        $errors[] = 'Please select a gender';
    }

    if(!empty($phone) || $phone != '' || $phone != null)
    {
        if(accepted_data_type($phone, 'phone') == false)
        {
            $errors[] = 'Please ensure that your telephone number is valid';
        }
    }
    else
    {
        $phone = null;
    }

    if(!empty($bio) || $bio != '' || $bio != null)
    {
        if(strlen($bio) < 100)
        {
            $errors[] = 'Please ensure that your bio is not lesser than 100 characters';
        }
        elseif(strlen($bio) > 65535)
        {
            $name = substr(ucfirst($bio), 0, 8);
            $errors[] = 'Please ensure that your bio is more than 65535 characters';
        }
    }
    else
    {
        $bio = null;
    }

    if(!empty($website) || $website != '' || $website != null)
    {
        if(accepted_data_type($website, 'url') == false)
        {
            $errors[] = 'Please ensure that your website address is valid';
        }
    }
    else
    {
        $website = null;
    }

    if(!empty($birth_date) || $birth_date != '' || $birth_date != null)
    {
        $bd = explode('-', $birth_date);
        $day = (int) $bd[2];
        $month = (int) $bd[1];
        $year = (int) $bd[0];
        if(checkdate($month, $day, $year) == false)
        {
            $errors[] = 'Please ensure that your birth date is valid';
        }
    }
    else
    {
        $birth_date = null;
    }

    if(!empty($address) || $address != '' || $address != null)
    {
        if(accepted_data_type($address, 'address') == false)
        {
            $errors[] = 'Please ensure that your address is valid';
        }
        elseif(strlen($address) < 5)
        {
            $errors[] = 'Please ensure that your address is not lesser than 5 characters';
        }
        elseif(strlen($address) > 255)
        {
            $errors[] = 'Please ensure that your address is not greater than 255 characters';
        }
    }
    else
    {
        $address = null;
    }

    if(!empty($city) || $city != '' || $city != null)
    {
        if(accepted_data_type($city, 'address') == false)
        {
            $errors[] = 'Please ensure that the city is valid';
        }
        elseif(strlen($city) < 5)
        {
            $errors[] = 'Please ensure that the city is not lesser than 5 characters';
        }
        elseif(strlen($city) > 255)
        {
            $errors[] = 'Please ensure that the city is not greater than 255 characters';
        }
    }
    else
    {
        $city = null;
    }

    if(!empty($state) || $state != '' || $state != null)
    {
        if(accepted_data_type($state, 'address') == false)
        {
            $errors[] = 'Please ensure that the state is valid';
        }
        elseif(strlen($state) < 5)
        {
            $errors[] = 'Please ensure that the state is not lesser than 5 characters';
        }
        elseif(strlen($state) > 255)
        {
            $errors[] = 'Please ensure that the state is not greater than 255 characters';
        }
    }
    else
    {
        $state = null;
    }

    if($country == 'S')
    {
        $country = null;
    }

    if(empty($errors))
    {
        //update users table
        $values = array(
            'id'            => $user_id,
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'business_name' => $business_name,
            'gender'        => $gender,
            'phone'         => $phone,
            'bio'           => $bio,
            'public'        => $public,
            'website'       => $website,
            'birthdate'     => $birth_date,
            'address'       => $address,
            'city'          => $city,
            'state'         => $state,
            'country'       => $country
        );

        $executed = update_user($values);

        if($executed)
        {
            $msg = "<div class='card success'><div>Your profile has been updated!</div></div>";
            echo $msg;
        }
    }
    else
    {
        echo form_errors($errors);
    }
}


?>