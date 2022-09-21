<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../includes/email-template.php');
require_once('includes/phpmailer.php');
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

	if(has_presence($birth_date) == false)
    {
        $errors[] = 'Birth date cannot be empty';
    }
    elseif(accepted_data_type($birth_date, 'name') == false)
    {
        $errors[] = 'Invalid birth date address is valid';
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

    if(accepted_option($country) == false)
    {
        $errors[] = 'Please select a country';
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
            'updated_by'    => $registered_by,
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

if(isset($_POST['edit-admin-type']))
{
    $admin_id      = trim($_POST['admin-id']);
    $updated_by    = trim($_POST['updated-by']);
    $first_name    = trim($_POST['first-name']);
    $last_name     = trim($_POST['last-name']);
    $email         = trim($_POST['email']);
    $admin_type    = trim($_POST['edit-admin-type']);
    $gender        = trim($_POST['gender']);
    $phone         = trim($_POST['phone']);
    $bio           = trim($_POST['bio']);
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
		$update_admin_photo = 1;

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
		$update_admin_photo = 0;
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

	if(has_presence($birth_date) == false)
    {
        $errors[] = 'Birth date cannot be empty';
    }
    elseif(accepted_data_type($birth_date, 'name') == false)
    {
        $errors[] = 'Invalid birth date address is valid';
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

    if(accepted_option($country) == false)
    {
        $errors[] = 'Please select a country';
    }


    if(empty($errors))
    {
		if(isset($new_admin_photo_name))
        {
            $new_admin_photo_name = $new_admin_photo_name;
        }
        else
        {
            $new_admin_photo_name = '';
        }

        //update admin table
        $values = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'admin_type'    => $admin_type,
            'gender'        => $gender,
            'profile_image' => $new_admin_photo_name,
            'phone'         => $phone,
            'bio'           => $bio,
            'website'       => $website,
            'birthdate'     => $birth_date,
            'address'       => $address,
            'city'          => $city,
            'state'         => $state,
            'country'       => $country,
            'updated_by'    => $updated_by,
            'id'            => $admin_id,
        );

        $executed = update_admin($values, $update_admin_photo);

        if($executed)
        {
			$msg = "<div class='card success'><div><b>Success!</b> Admin updated </div></div>";
			echo $msg;
        }
    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['update-admin-type']))
{
    $admin_id      = trim($_POST['admin-id']);
    $updated_by    = trim($_POST['admin-id']);
    $first_name    = trim($_POST['first-name']);
    $last_name     = trim($_POST['last-name']);
    $email         = trim($_POST['email']);
    $admin_type    = trim($_POST['update-admin-type']);
    $gender        = trim($_POST['gender']);
    $phone         = trim($_POST['phone']);
    $bio           = trim($_POST['bio']);
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
		$update_admin_photo = 1;

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
		$update_admin_photo = 0;
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

	if(has_presence($birth_date) == false)
    {
        $errors[] = 'Birth date cannot be empty';
    }
    elseif(accepted_data_type($birth_date, 'name') == false)
    {
        $errors[] = 'Invalid birth date address is valid';
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

    if(accepted_option($country) == false)
    {
        $errors[] = 'Please select a country';
    }


    if(empty($errors))
    {
		if(isset($new_admin_photo_name))
        {
            $new_admin_photo_name = $new_admin_photo_name;
        }
        else
        {
            $new_admin_photo_name = '';
        }

        //update admin table
        $values = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'admin_type'    => $admin_type,
            'gender'        => $gender,
            'profile_image' => $new_admin_photo_name,
            'phone'         => $phone,
            'bio'           => $bio,
            'website'       => $website,
            'birthdate'     => $birth_date,
            'address'       => $address,
            'city'          => $city,
            'state'         => $state,
            'country'       => $country,
            'updated_by'    => $updated_by,
            'id'            => $admin_id,
        );

        $executed = update_admin($values, $update_admin_photo);

        if($executed)
        {
			$msg = "<div class='card success'><div><b>Success!</b> Admin updated </div></div>";
			echo $msg;
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

if(isset($_POST["view_notification"]))
{

    if($_POST["view_notification"] != '')
    {
        update_unseen_table('user_sent_emails');
        update_unseen_table('issues');
    }
    
    $results = tables_in_notification('user_sent_emails');
    $results_1 = tables_in_notification('issues');
    $output = '';

    if($results || $result_1)
    {
        foreach($results as $result)
        {

            $url  = 'http://localhost:9090/bwajesplus-app/admin/user-email/'.$result['id'];
            $output .= '
            <li>
                <a target="_blank" href="'.$url.'">
                '.substr($result["title"], 0, 20).'...
                </a>
            </li>
            ';
        }

		foreach($results_1 as $result_1)
        {

            $url  = 'http://localhost:9090/bwajesplus-app/admin/issue-details/'.$result_1['id'];
            $output .= '
            <li>
                <a target="_blank" href="'.$url.'">
                '.substr($result_1["subject"], 0, 20).'...
                </a>
            </li>
            ';
        }
    }
    else
    {
        $output .= '<li><a href="#">No Notification</a></li>';
    }

    //count unseen comments
    $count = count_unseen_table('user_sent_emails');
    $count_1 = count_unseen_table('issues');

	$total = $count + $count_1;

    $data = array(
    'notification'   => $output,
    'unseen_notification' => $total
    );
    
    echo json_encode($data);
}

if(isset($_POST['active_users']))
{
    $no_of_active_users = db_row_count(1, 'active', 'users');

    echo $no_of_active_users;
}

if(isset($_POST['active_admins']))
{
    $no_of_active_admins = db_row_count(1, 'active', 'admin');
    
    echo $no_of_active_admins;
}

if(isset($_POST['report']))
{
    $admin_id = trim($_POST['id']);
    $report = trim($_POST['report']);

    $errors = array();

    if(has_presence($report) == false)
    {
        $errors[] = 'Report cannot be empty';
    }
    elseif(accepted_data_type($report, 'name') == false)
    {
        $errors[] = $report . ' is not valid';
    }
    elseif(strlen($report) < 3)
    {
        $errors[] = 'The report field cannot be lesser than 3 characters';
    }
    elseif(strlen($report) > 255)
    {
        $errors[] = 'The report field cannot be more than 255 characters';
    }

    if(empty($errors))
    {
        $values = array(
            'report'     => $report,
            'created_by' => $admin_id,
            'updated_by' => $admin_id
        );

        //insert into reports table
        $executed = insert_into_reports($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A report type has been created</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'title'		    =>	'%' . $condition . '%',
			'report'	=>	'%' . $condition . '%'
		);

        $total_data = count_report_a($values);
        $reports = search_report_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($reports as $report)
		{
			$data[] = array(
				'report_id'	=>	$report["id"],
				'report'	=>	str_ireplace($replace_array_1, $replace_array_2, $report["report"]),
                'date_created'	=>	$report["created_at"],
				'last_updated'	=>	$report["updated_at"]
			);
		}
    }
    else
	{
        $total_data = count_report_b();
        $reports = search_report($offset, $limit);

		foreach($reports as $report)
		{
			$data[] = array(
                'report_id'	=>	$report["id"],
				'report'	=>	$report["report"],
				'date_created'	=>	$report["created_at"],
				'last_updated'	=>	$report["updated_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['edit-report']))
{
    $admin_id    = $_POST['admin-id'];
    $report_id   = $_POST['report-id'];
    $edit_report = $_POST['edit-report'];

    if(has_presence($edit_report) == false)
    {
        $errors[] = 'Report cannot be empty';
    }
    elseif(accepted_data_type($edit_report, 'name') == false)
    {
        $errors[] = $edit_report . ' is not valid';
    }
    elseif(strlen($edit_report) < 3)
    {
        $errors[] = 'The report field cannot be lesser than 3 characters';
    }
    elseif(strlen($edit_report) > 255)
    {
        $errors[] = 'The report field cannot be more than 255 characters';
    }

    if(empty($errors))
    {
        $values = array(
            'id'       => $report_id,
            'admin_id' => $admin_id,
            'report'   => $edit_report
        );
    
        $executed = update_report($values);
        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A report type has been updated</div></div>";
            echo $msg;
        }
    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['query_reported_post']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['query_reported_post'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query_reported_post"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'title'		    =>	'%' . $condition . '%',
			'report'	=>	'%' . $condition . '%'
		);

        $total_data = count_reported_posts_a($values);
        $reports = search_reported_posts_with_wildcard($values, $offset, $limit);

		// $replace_array_1 = explode("%", $condition);

		// foreach($replace_array_1 as $row_data)
		// {
		// 	$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		// }

		foreach($reports as $report)
		{
            $post          = fetch_single_row($report["post_id"], 'posts');
            $no_of_reports = db_row_count($report["post_id"], 'post_id', 'reported_posts');

			$data[] = array(
                'post_id'	    =>	$report["post_id"],
				'post_title'	=>	$post["title"],
				'no_of_reports'	=>	$no_of_reports
				// 'report'	=>	str_ireplace($replace_array_1, $replace_array_2, $report["report"]),
			);
		}
    }
    else
	{
        $total_data = count_reported_posts_b();
        $reports = search_reported_posts($offset, $limit);

		foreach($reports as $report)
		{
            $post          = fetch_single_row($report["post_id"], 'posts');
            $no_of_reports = db_row_count($report["post_id"], 'post_id', 'reported_posts');

			$data[] = array(
                'post_id'	    =>	$report["post_id"],
				'post_title'	=>	$post["title"],
				'no_of_reports'	=>	$no_of_reports
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query_reported_post"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query_reported_post"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["query_reported_post"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['query_reports_about_post']))
{
    // $admin_id = $_POST['admin_id'];
    $get_post_id = $_POST['post_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['query_reports_about_post'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query_reports_about_post"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'title'		    =>	'%' . $condition . '%',
			'report'	=>	'%' . $condition . '%',
			'post_id'	=>	$get_post_id
		);

        $total_data = count_rpt_abt_post_a($values);
        $reports = search_rpt_abt_post_with_wildcard($values, $offset, $limit);


		foreach($reports as $report)
		{
            $rpt = fetch_single_row($report["report_id"], 'reports');

			$data[] = array(
				'report'	    =>	$rpt["report"],
				'date_created'	=>	$report['created_at'],
				'ip'	        =>	$report['end_user_ip']
			);
		}
    }
    else
	{
        $values = array(
			'post_id'	=>	$get_post_id
		);

        $total_data = count_rpt_abt_post_b($values);
        $reports = search_rpt_abt_post($values, $offset, $limit);

		foreach($reports as $report)
		{
            $rpt = fetch_single_row($report["report_id"], 'reports');

			$data[] = array(
                'report'	    =>	$rpt["report"],
				'date_created'	=>	$report['created_at'],
				'ip'	        =>	$report['end_user_ip']
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query_reports_about_post"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["query_reports_about_post"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["query_reports_about_post"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['affiliate_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['affiliate_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["affiliate_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'url'	=>	'%' . $condition . '%',
			'name'	=>	'%' . $condition . '%',
			'image'	=>	'%' . $condition . '%'
		);

        $total_data = count_affiliate_a($values);
        $affiliates = search_affiliate_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($affiliates as $affiliate)
		{
			$data[] = array(
				'affiliate_id'	=>	$affiliate["id"],
				'url'	=>	str_ireplace($replace_array_1, $replace_array_2, $affiliate["url"]),
				'company_name'	=>	str_ireplace($replace_array_1, $replace_array_2, $affiliate["name"]),
                'date_created'	=>	$affiliate["created_at"],
				'last_updated'	=>	$affiliate["updated_at"]
			);
		}
    }
    else
	{
        $total_data = count_affiliate_b();
        $affiliates = search_affiliate($offset, $limit);

		foreach($affiliates as $affiliate)
		{
			$data[] = array(
                'affiliate_id'  =>	$affiliate["id"],
				'url'	        =>	$affiliate["url"],
				'company_name'	=>	$affiliate["name"],
				'date_created'	=>	$affiliate["created_at"],
				'last_updated'	=>	$affiliate["updated_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["affiliate_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["affiliate_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["affiliate_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to create affiliate
if(isset($_POST['affiliate-url']))
{
    $id            = trim($_POST['id']);
    $affiliate_url = trim($_POST['affiliate-url']);
    $company_name  = trim($_POST['company-name']);
    
    //error array
    $errors = array();

    if(has_presence($affiliate_url) == false)
    {
        $errors[] = 'Url cannot be empty';
    }
    elseif(accepted_data_type($affiliate_url, 'url') == false)
    {
        $errors[] = $affiliate_url . ' is not valid';
    }

    if(has_presence($company_name) == false)
    {
        $errors[] = 'Company name cannot be empty';
    }
    elseif(accepted_data_type($company_name, 'name') == false)
    {
        $errors[] = $company_name . ' is not valid';
    }
    elseif(strlen($company_name) < 2)
    {
        $errors[] = 'The company name field cannot be lesser than 2 characters';
    }
    elseif(strlen($company_name) > 255)
    {
        $errors[] = 'The company name field cannot be more than 255 characters';
    }


	if(isset($_FILES['company-photo']['name']))
	{
		$company_photo_name = $_FILES['company-photo']['name'];
		$company_photo_size = $_FILES['company-photo']['size'];
	
		$allowed_images = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
		$image_ext = pathinfo($company_photo_name, PATHINFO_EXTENSION);
	
		if(!in_array($image_ext, $allowed_images))
		{
			$errors[] = 'The accepted company photo types are png and jpg/jpeg only';
		}
		elseif($company_photo_size > 1000000)
		{
			$errors[] = 'The accepted company photo size should not be more than 1Mb';
		}
		else
		{
			$new_company_photo_name = time() .'_' . $company_photo_name;
			$company_photo_folder = 'affiliate_photos/';
			$tmp_company_photo = $_FILES['company-photo']['tmp_name'];
		
			move_uploaded_file($tmp_company_photo, $company_photo_folder .$new_company_photo_name);
		}
	}
	else
	{
		$errors[] = 'You must upload a company photo';
	}
    
    if(empty($errors))
    {
        $values = array(
			'url'        => $affiliate_url,
            'name'       => $company_name,
            'image'      => $new_company_photo_name,
            'created_by' => $id,
            'updated_by' => $id
        );

        //insert into posts table
        $executed = insert_into_affiliate($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> An affiliate program has been created</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

//to edit affiliate
if(isset($_POST['edit-affiliate-url']))
{
    $id            = trim($_POST['id']);
    $affiliate_id  = trim($_POST['affiliate-id']);
    $affiliate_url = trim($_POST['edit-affiliate-url']);
    $company_name  = trim($_POST['company-name']);
    
    //error array
    $errors = array();

    if(has_presence($affiliate_url) == false)
    {
        $errors[] = 'Url cannot be empty';
    }
    elseif(accepted_data_type($affiliate_url, 'url') == false)
    {
        $errors[] = $affiliate_url . ' is not valid';
    }

    if(has_presence($company_name) == false)
    {
        $errors[] = 'Company name cannot be empty';
    }
    elseif(accepted_data_type($company_name, 'name') == false)
    {
        $errors[] = $company_name . ' is not valid';
    }
    elseif(strlen($company_name) < 2)
    {
        $errors[] = 'The company name field cannot be lesser than 2 characters';
    }
    elseif(strlen($company_name) > 255)
    {
        $errors[] = 'The company name field cannot be more than 255 characters';
    }


	if(isset($_FILES['company-photo']['name']))
	{
		$update_company_photo = 1;

		$company_photo_name = $_FILES['company-photo']['name'];
		$company_photo_size = $_FILES['company-photo']['size'];
	
		$allowed_images = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
		$image_ext = pathinfo($company_photo_name, PATHINFO_EXTENSION);
	
		if(!in_array($image_ext, $allowed_images))
		{
			$errors[] = 'The accepted company photo types are png and jpg/jpeg only';
		}
		elseif($company_photo_size > 1000000)
		{
			$errors[] = 'The accepted company photo size should not be more than 1Mb';
		}
		else
		{
			$affiliate_programme = fetch_single_row($affiliate_id, 'affiliate_programmes');

            $filename = 'affiliate_photos/' . $affiliate_programme['image'];
            if (file_exists($filename) && !is_dir($filename))
            {
                $deleted = unlink($filename);
                if (!$deleted)
                {
                    $errors[] = 'Something went wrong. Please try again';
                }
                else
                {
					$new_company_photo_name = time() .'_' . $company_photo_name;
					$company_photo_folder = 'affiliate_photos/';
					$tmp_company_photo = $_FILES['company-photo']['tmp_name'];
				
					move_uploaded_file($tmp_company_photo, $company_photo_folder .$new_company_photo_name);
                }
            }
            else
            {
				$new_company_photo_name = time() .'_' . $company_photo_name;
				$company_photo_folder = 'affiliate_photos/';
				$tmp_company_photo = $_FILES['company-photo']['tmp_name'];
			
				move_uploaded_file($tmp_company_photo, $company_photo_folder .$new_company_photo_name);
            }
		}
	}
	else
	{
		$update_company_photo = 0;
	}
    
    if(empty($errors))
    {
		if(isset($new_company_photo_name))
        {
            $new_company_photo_name = $new_company_photo_name;
        }
        else
        {
            $new_company_photo_name = '';
        }

        $values = array(
			'url'          => $affiliate_url,
            'name'         => $company_name,
            'image'        => $new_company_photo_name,
            'updated_by'   => $id,
            'affiliate_id' => $affiliate_id
        );

        //insert into posts table
        $executed = update_affiliate($values, $update_company_photo);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> Affiliate program has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['country_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['country_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["country_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'url'	=>	'%' . $condition . '%',
			// 'name'	=>	'%' . $condition . '%',
			'country'	=>	'%' . $condition . '%'
		);

        $total_data = count_country_a($values);
        $countries = search_country_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($countries as $country)
		{
			$data[] = array(
				'country_id'	=>	$country["id"],
				'country'	=>	str_ireplace($replace_array_1, $replace_array_2, $country["country"]),
                'date_created'	=>	$country["created_at"],
				'last_updated'	=>	$country["updated_at"]
			);
		}
    }
    else
	{
        $total_data = count_country_b();
        $countries = search_country($offset, $limit);

		foreach($countries as $country)
		{
			$data[] = array(
				'country_id'	=>	$country["id"],
				'country'	    =>	$country["country"],
                'date_created'	=>	$country["created_at"],
				'last_updated'	=>	$country["updated_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["country_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["country_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["country_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to add country
if(isset($_POST['add-country']))
{
    $id      = trim($_POST['id']);
    $country = trim($_POST['add-country']);
    
    //error array
    $errors = array();

    if(has_presence($country) == false)
    {
        $errors[] = 'Country cannot be empty';
    }
    elseif(accepted_data_type($country, 'address') == false)
    {
        $errors[] = $country . ' is not valid';
    }
    elseif(strlen($country) < 2)
    {
        $errors[] = 'The country field cannot be lesser than 2 characters';
    }
    elseif(strlen($country) > 255)
    {
        $errors[] = 'The country field cannot be more than 255 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'country'    => $country,
            'created_by' => $id,
            'updated_by' => $id
        );

        //insert into posts table
        $executed = insert_into_country($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A country has been added</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

//to update country
if(isset($_POST['edit-country']))
{
    $id      = trim($_POST['id']);
    $country_id      = trim($_POST['country-id']);
    $country = trim($_POST['edit-country']);
    
    //error array
    $errors = array();

    if(has_presence($country) == false)
    {
        $errors[] = 'Country cannot be empty';
    }
    elseif(accepted_data_type($country, 'address') == false)
    {
        $errors[] = $country . ' is not valid';
    }
    elseif(strlen($country) < 2)
    {
        $errors[] = 'The country field cannot be lesser than 2 characters';
    }
    elseif(strlen($country) > 255)
    {
        $errors[] = 'The country field cannot be more than 255 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'country'    => $country,
            'country_id'    => $country_id,
            'updated_by' => $id
        );

        //insert into posts table
        $executed = update_country($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A country has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['user_emails_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['user_emails_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["user_emails_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'email'	     =>	'%' . $condition . '%',
			'department' =>	'%' . $condition . '%',
			'title'	     =>	'%' . $condition . '%',
			'message'	 =>	'%' . $condition . '%'
		);

        $total_data = count_user_emails_a($values);
        $user_emails = search_user_emails_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($user_emails as $user_email)
		{
			$data[] = array(
				'user_email_id'	=>	$user_email["id"],
				'user_email'	=>	str_ireplace($replace_array_1, $replace_array_2, $user_email["email"]),
				'department'	=>	str_ireplace($replace_array_1, $replace_array_2, $user_email["department"]),
				'title'	        =>	str_ireplace($replace_array_1, $replace_array_2, $user_email["title"]),
                'date_created'	=>	$user_email["created_at"]
			);
		}
    }
    else
	{
        $total_data = count_user_emails_b();
        $user_emails = search_user_emails($offset, $limit);

		foreach($user_emails as $user_email)
		{
			$data[] = array(
				'user_email_id'	=>	$user_email["id"],
				'user_email'	=>	$user_email["email"],
				'department'	=>	$user_email["department"],
				'title'	        =>	$user_email["title"],
                'date_created'	=>	$user_email["created_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["user_emails_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["user_emails_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["user_emails_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['admin_emails_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['admin_emails_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["admin_emails_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'set_from_name'	 =>	'%' . $condition . '%',
			'set_from_email' =>	'%' . $condition . '%',
			'subject'	     =>	'%' . $condition . '%',
			'body'	         =>	'%' . $condition . '%'
		);

        $total_data = count_admin_emails_a($values);
        $admin_emails = search_admin_emails_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($admin_emails as $admin_email)
		{
			$admin = fetch_single_row($admin_email['admin_id'], 'admin');

			$admin_type = $admin['admin_type'];

			if($admin_type == 1)
			{
				$admin_type = "super";
			}
			elseif($admin_type == 2)
			{
				$admin_type = "basic";
			}

			$data[] = array(
				'admin_email_id' =>	$admin_email["id"],
				'admin_name'	 =>	$admin["first_name"],
				'admin_type'	 =>	$admin_type,
				'subject'	     =>	str_ireplace($replace_array_1, $replace_array_2, $admin_email["subject"]),
                'date_created'	 =>	$admin_email["created_at"]
			);
		}
    }
    else
	{
        $total_data = count_admin_emails_b();
        $admin_emails = search_admin_emails($offset, $limit);

		foreach($admin_emails as $admin_email)
		{
			$admin = fetch_single_row($admin_email['admin_id'], 'admin');

			$admin_type = $admin['admin_type'];

			if($admin_type == 1)
			{
				$admin_type = "super";
			}
			elseif($admin_type == 2)
			{
				$admin_type = "basic";
			}

			$data[] = array(
				'admin_email_id' =>	$admin_email["id"],
				'admin_name'	 =>	$admin["first_name"],
				'admin_type'	 =>	$admin_type,
				'subject'	     =>	$admin_email["subject"],
                'date_created'	 =>	$admin_email["created_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["admin_emails_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["admin_emails_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["admin_emails_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to create post category
if(isset($_POST['post-category']))
{
    $id      = trim($_POST['id']);
    $post_category = trim($_POST['post-category']);
    
    //error array
    $errors = array();

    if(has_presence($post_category) == false)
    {
        $errors[] = 'post category cannot be empty';
    }
    elseif(accepted_data_type($post_category, 'name') == false)
    {
        $errors[] = $post_category . ' is not valid';
    }
    elseif(strlen($post_category) < 2)
    {
        $errors[] = 'The post category field cannot be lesser than 2 characters';
    }
    elseif(strlen($post_category) > 255)
    {
        $errors[] = 'The post category field cannot be more than 255 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'post_category' => $post_category,
            'created_by'    => $id,
            'updated_by'    => $id
        );

        //insert into posts table
        $executed = insert_into_post_category($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A post category has been added</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['post_category_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['post_category_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["post_category_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'url'	=>	'%' . $condition . '%',
			// 'name'	=>	'%' . $condition . '%',
			'category'	=>	'%' . $condition . '%'
		);

        $total_data = count_post_category_a($values);
        $post_categories = search_post_category_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($post_categories as $post_category)
		{
			$data[] = array(
				'post_category_id'	=>	$post_category["id"],
				'post_category'	=>	str_ireplace($replace_array_1, $replace_array_2, $post_category["category"])
			);
		}
    }
    else
	{
        $total_data = count_post_category_b();
        $post_categories = search_post_category($offset, $limit);

		foreach($post_categories as $post_category)
		{
			$data[] = array(
				'post_category_id' =>	$post_category["id"],
				'post_category'	   =>	$post_category["category"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["post_category_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["post_category_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["post_category_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to update post category
if(isset($_POST['edit-category']))
{
    $id           = trim($_POST['id']);
    $category_id  = trim($_POST['category-id']);
    $category     = trim($_POST['edit-category']);
    
    //error array
    $errors = array();

    if(has_presence($category) == false)
    {
        $errors[] = 'category cannot be empty';
    }
    elseif(accepted_data_type($category, 'name') == false)
    {
        $errors[] = $category . ' is not valid';
    }
    elseif(strlen($category) < 2)
    {
        $errors[] = 'The category field cannot be lesser than 2 characters';
    }
    elseif(strlen($category) > 255)
    {
        $errors[] = 'The category field cannot be more than 255 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'category'    => $category,
            'category_id'    => $category_id,
            'updated_by' => $id
        );

        //insert into post category table
        $executed = update_post_category($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A category has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

//to create post type
if(isset($_POST['post-type']))
{
    $id      = trim($_POST['id']);
    $post_type = trim($_POST['post-type']);
    
    //error array
    $errors = array();

    if(has_presence($post_type) == false)
    {
        $errors[] = 'post type cannot be empty';
    }
    elseif(accepted_data_type($post_type, 'name') == false)
    {
        $errors[] = $post_type . ' is not valid';
    }
    elseif(strlen($post_type) < 2)
    {
        $errors[] = 'The post type field cannot be lesser than 2 characters';
    }
    elseif(strlen($post_type) > 255)
    {
        $errors[] = 'The post type field cannot be more than 255 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'post_type' => $post_type,
            'created_by'    => $id,
            'updated_by'    => $id
        );

        //insert into posts table
        $executed = insert_into_post_type($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A post type has been added</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['post_type_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['post_type_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["post_type_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'url'	=>	'%' . $condition . '%',
			// 'name'	=>	'%' . $condition . '%',
			'type'	=>	'%' . $condition . '%'
		);

        $total_data = count_post_type_a($values);
        $post_categories = search_post_type_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($post_categories as $post_type)
		{
			$data[] = array(
				'post_type_id'	=>	$post_type["id"],
				'post_type'	=>	str_ireplace($replace_array_1, $replace_array_2, $post_type["type"])
			);
		}
    }
    else
	{
        $total_data = count_post_type_b();
        $post_categories = search_post_type($offset, $limit);

		foreach($post_categories as $post_type)
		{
			$data[] = array(
				'post_type_id' =>	$post_type["id"],
				'post_type'	   =>	$post_type["type"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["post_type_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["post_type_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["post_type_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to update post type
if(isset($_POST['edit-type']))
{
    $id           = trim($_POST['id']);
    $type_id  = trim($_POST['type-id']);
    $type     = trim($_POST['edit-type']);
    
    //error array
    $errors = array();

    if(has_presence($type) == false)
    {
        $errors[] = 'type cannot be empty';
    }
    elseif(accepted_data_type($type, 'name') == false)
    {
        $errors[] = $type . ' is not valid';
    }
    elseif(strlen($type) < 2)
    {
        $errors[] = 'The type field cannot be lesser than 2 characters';
    }
    elseif(strlen($type) > 255)
    {
        $errors[] = 'The type field cannot be more than 255 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'type'       => $type,
            'type_id'    => $type_id,
            'updated_by' => $id
        );

        //insert into post type table
        $executed = update_post_type($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A type has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

//to create legal
if(isset($_POST['content']))
{
    $id      = trim($_POST['id']);
    $name    = trim($_POST['name']);
    $content = trim($_POST['content']);
    
    //error array
    $errors = array();

    if(has_presence($name) == false)
    {
        $errors[] = 'Name cannot be empty';
    }
    elseif(accepted_data_type($name, 'name') == false)
    {
        $errors[] = $name . ' is not valid';
    }
    elseif(strlen($name) < 2)
    {
        $errors[] = 'The name field cannot be lesser than 2 characters';
    }
    elseif(strlen($name) > 255)
    {
        $errors[] = 'The name field cannot be more than 255 characters';
    }

    if(has_presence($content) == false)
    {
        $errors[] = 'Content cannot be empty';
    }
    // elseif(accepted_data_type($content, 'name') == false)
    // {
    //     $errors[] = $content . ' is not valid';
    // }
    elseif(strlen($content) < 1000)
    {
        $errors[] = 'Your content cannot be lesser than 1000 characters';
    }
    elseif(strlen($content) > 65535)
    {
        $errors[] = 'Your content cannot be more than 65535 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
            'name'       => $name,
            'content'    => $content,
            'created_by' => $id,
            'updated_by' => $id
        );

        //insert into posts table
        $executed = insert_into_legal($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> " . ucfirst($name) . " has been added</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['legal_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['legal_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["legal_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'url'	=>	'%' . $condition . '%',
			'name'	=>	'%' . $condition . '%',
			'content'	=>	'%' . $condition . '%'
		);

        $total_data = count_legal_a($values);
        $legals = search_legal_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($legals as $legal)
		{
			$data[] = array(
				'legal_id'	=>	$legal["id"],
				'legal'	=>	str_ireplace($replace_array_1, $replace_array_2, $legal["name"])
			);
		}
    }
    else
	{
        $total_data = count_legal_b();
        $legals = search_legal($offset, $limit);

		foreach($legals as $legal)
		{
			$data[] = array(
				'legal_id' =>	$legal["id"],
				'legal'	   =>	$legal["name"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["legal_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["legal_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["legal_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to edit legal
if(isset($_POST['edit-content']))
{
    $admin_id = trim($_POST['admin-id']); 
    $legal_id = trim($_POST['legal-id']);
    $name     = trim($_POST['edit-name']);
    $content  = trim($_POST['edit-content']);
    
    //error array
    $errors = array();

    if(has_presence($name) == false)
    {
        $errors[] = 'Name cannot be empty';
    }
    elseif(accepted_data_type($name, 'name') == false)
    {
        $errors[] = $name . ' is not valid';
    }
    elseif(strlen($name) < 2)
    {
        $errors[] = 'The name field cannot be lesser than 2 characters';
    }
    elseif(strlen($name) > 255)
    {
        $errors[] = 'The name field cannot be more than 255 characters';
    }
  
    if(has_presence($content) == false)
    {
        $errors[] = 'content cannot be empty';
    }
    // elseif(accepted_data_type($content, 'name') == false)
    // {
    //     $errors[] = $content . ' is not valid';
    // }
    elseif(strlen($content) < 1000)
    {
        $errors[] = 'Your content cannot be lesser than 1000 characters';
    }
    elseif(strlen($content) > 65535)
    {
        $errors[] = 'Your content cannot be more than 65535 characters';
    }
    
    if(empty($errors))
    {

        $values = array(
            'id'         => $legal_id,
            'updated_by' => $admin_id,
            'name'       => $name,
            'content'    => $content
        );

        //update legal table
        $executed = update_legal($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> ". ucfirst($name) ." has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

//to send messages
if(isset($_POST['post-master']))
{
    $id               = trim($_POST['id']);
    $set_from_email   = trim($_POST['support']);
    $sender           = trim($_POST['sender']);
    $group_to_send_to = trim($_POST['list']);
    $subject          = trim($_POST['subject']);
    $salutation       = trim($_POST['salutation']);
	$message          = trim($_POST['post-master']);

	if($sender == "")
	{
		if(preg_match('/support/',$set_from_email))
		{
			$set_from_name = "Support";
		}
		elseif(preg_match('/it/',$set_from_email))
		{
			$set_from_name = "IT Team";
		}
		elseif(preg_match('/admin/',$set_from_email))
		{
			$set_from_name = "Admin";
		}
		elseif(preg_match('/billing/',$set_from_email))
		{
			$set_from_name = "Payment service";
		}
		else
		{
			$set_from_name = "bwajes+";
		}
	}
	else
	{
		$set_from_name = $sender;
	}

	if($salutation == "")
	{
		$salutation = "Dear";
	}
   
    //error array
    $errors = array();

	if(accepted_option($set_from_email) == false)
    {
        $errors[] = 'Please select support';
    }

	if(accepted_option($group_to_send_to) == false)
    {
        $errors[] = 'Please select send to';
    }

    if(has_presence($subject) == false)
    {
        $errors[] = 'subject cannot be empty';
    }
    elseif(strlen($subject) < 8)
    {
        $errors[] = 'The subject field cannot be lesser than 8 characters';
    }
    elseif(strlen($subject) > 60)
    {
        $errors[] = 'The subject field cannot be more than 60 characters';
    }

	if(has_presence($message) == false)
	{
		$errors[] = 'message cannot be empty';
	}
	elseif(strlen($message) < 100)
	{
		$errors[] = 'Your message cannot be lesser than 100 characters';
	}
	elseif(strlen($message) > 65535)
	{
		$errors[] = 'Your message cannot be more than 65535 characters';
	}
    
    if(empty($errors))
    {
		$table_name = "";
		
		if($group_to_send_to == "all")
		{
			$table_name = "email_list";
		}
		elseif($group_to_send_to == "registered-users")
		{
			$table_name = "users";
		}
		elseif($group_to_send_to == "subscribers")
		{
			$table_name = "subscriber_list";
		}
		elseif($group_to_send_to == "commenters")
		{
			$table_name = "comments";
		}
		elseif($group_to_send_to == "issuers")
		{
			$table_name = "issues";
		}
		elseif($group_to_send_to == "deleted-users")
		{
			$table_name = "deleted_users";
		}

		//insert into admin sent email table
		//get last insertId from admin sent email table
		$values = array(
			'set_from_name'  => $set_from_name,
			'set_from_email' => $set_from_email,
			'subject'        => $subject,
			'body'           => $message,
			'admin_id'       => $id
		);

		$lastId = insert_into_admin_sent_emails($values);


		if($lastId)
		{
			$no_of_email_sent = 0;

			$group_emails = select_distinct_emails($table_name, $group_to_send_to);

			foreach($group_emails as $group_email)
			{
				if(isset($group_email['first_name']) && ($group_to_send_to == "registered-users" || $group_to_send_to == "payers" || $group_to_send_to == "payers-1" || $group_to_send_to == "payers-2"))
				{
					//email track code
					$code = email_track_code();
		
					$base_url = "http://localhost:9090/bwajes/dz5445z/";
					$track = '<img src="'.$base_url.'email_track/'.$code.'" width="1" height="1">';
					$message = $track . '<p>'.$salutation . ' ' . ucfirst(strtolower($group_email['first_name'])) . '</p>' . trim($_POST['post-master']);
				}
				elseif(isset($group_email['first_name']) && $group_to_send_to == "deleted-users")
				{
					$message = $track . '<p>'.$salutation . ' ' . ucfirst(strtolower($group_email['first_name'])) . '</p>' . trim($_POST['post-master']);
				}
				else
				{
					//email track code
					$code = email_track_code();

					$base_url = "http://localhost:9090/bwajes/dz5445z/";
					$track = '<img src="'.$base_url.'email_track/'.$code.'" width="1" height="1">';
					$message = $track . trim($_POST['post-master']);	
				}
			
				$set_from = array(
					'email' => $set_from_email,
					'name' => $set_from_name
				);
	
				$sent_to_email = $group_email['email'];
	
				$add_address = array(
					'email' => $sent_to_email,
					'name' => ''
				);
	
				
				$altbody = 'Please update this app or use another app to view mail';

				$body = email_template($message, 1, $lastId, encryption($table_name), $sent_to_email);

				$data = array(
					'subject' => $subject,
					'body' => $body,
					'altbody' => $altbody
				);

				$mail_response = send_mail($set_from, $add_address, $data);
				if($mail_response !== true)
				{
					echo "<div class='card error'><div>" . $mail_response . "</div></div>";
				}
				else
				{
					//insert into email tracking table
					$values = array(
						'admin_sent_emails_id' => $lastId,
						'sent_to_email'        => $sent_to_email,
						'email_track_code'     => $code
					);

					$executed = insert_into_email_tracking($values);
					if($executed)
					{
						$no_of_email_sent += 1;
					}
				}
	
			}

			if($no_of_email_sent > 0)
			{
				if($no_of_email_sent == 1)
				{
					$msg = "<div class='card success'><div><b>Success!</b> Email sent to ". $no_of_email_sent ." person</div></div>";
					echo $msg;
				}
				else
				{
					$msg = "<div class='card success'><div><b>Success!</b> Email sent to ". $no_of_email_sent ." people</div></div>";
					echo $msg;
				}
			}
			else
			{
				$msg = "<div class='card error'><div>No user/person to send email to</div></div>";
				echo $msg;
			}
		}

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['open_rate_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['open_rate_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["open_rate_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'url'	=>	'%' . $condition . '%',
			// 'name'	=>	'%' . $condition . '%',
			'email'	=>	'%' . $condition . '%'
		);

        $total_data = count_open_rates_a($values);
        $open_rates = search_open_rates_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($open_rates as $open_rate)
		{
			$rate_open = (float) (($open_rate["no_of_mails_opened"] / $open_rate["no_of_mails_recieved"]) * 100);

			$rate_open = number_format($rate_open, 2, '.', '');

			$data[] = array(
				'id'	=>	$open_rate["id"],
				'email'	=>	str_ireplace($replace_array_1, $replace_array_2, $open_rate["email"]),
				'no_of_mails_recieved'	=>	$open_rate["no_of_mails_recieved"],
				'no_of_mails_opened'	=>	$open_rate["no_of_mails_opened"],
				'open_rate'	=>	$rate_open."%"
			);
		}
    }
    else
	{
        $total_data = count_open_rates_b();
        $open_rates = search_open_rates($offset, $limit);

		foreach($open_rates as $open_rate)
		{
			$rate_open = ($open_rate["no_of_mails_opened"] / $open_rate["no_of_mails_recieved"]) * 100;

			$data[] = array(
				'id'	=>	$open_rate["id"],
				'email'	=>	$open_rate["email"],
				'no_of_mails_recieved'	=>	$open_rate["no_of_mails_recieved"],
				'no_of_mails_opened'	=>	$open_rate["no_of_mails_opened"],
				'open_rate'	=>	$rate_open
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["open_rate_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["open_rate_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["open_rate_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['mail_recieved_query']))
{
    // $admin_id = $_POST['admin_id'];
    $email = $_POST['email'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['mail_recieved_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["mail_recieved_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'url'	=>	'%' . $condition . '%',
			'subject'	=>	'%' . $condition . '%',
			'body'	    =>	'%' . $condition . '%',
			'email'	    =>	$email
		);

        $total_data = count_mails_recieved_a($values);
        $mails_recieved = search_mails_recieved_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($mails_recieved as $mail_recieved)
		{
			$admin_sent_email = fetch_single_row($mail_recieved['admin_sent_emails_id'], 'admin_sent_emails');

			if($mail_recieved["email_status"] == 1)
			{
				$status = 'Opened';
			}
			elseif($mail_recieved["email_status"] == 0)
			{
				$status = 'Not opened';
			}

			if($mail_recieved["date_opened"] != "" || $mail_recieved["date_opened"] != null || !empty($mail_recieved["date_opened"]))
			{
				$date_opened =  $mail_recieved["date_opened"]; 
			}
			else
			{
				$date_opened =  "-";
			}

			$date1 = new DateTime($mail_recieved['date_recieved']);
			if($mail_recieved["date_opened"] != "" || $mail_recieved["date_opened"] != null || !empty($mail_recieved["date_opened"]))
			{
			$date2 = new DateTime($mail_recieved["date_opened"]);
			$interval = $date1->diff($date2);
			$days = $interval->days;
	
			if($days > 1)
			{
				$how_long = $days . " days";
			}
			else
			{
				$how_long = $days . " day";
			}
			}
			else
			{
				$how_long = "-";
			}

			$data[] = array(
				'mail_recieved_id'	=>	$mail_recieved["id"],
				'status'	=>	$status,
				'date_recieved'	=>	$mail_recieved["date_recieved"],
				'date_opened'	=>	$date_opened,
				'how_long'	=>	$how_long,
				'title'	=>	str_ireplace($replace_array_1, $replace_array_2, $admin_sent_email['subject'])
			);
		}
    }
    else
	{
        $total_data = count_mails_recieved_b($email);
        $mails_recieved = search_mails_recieved($email, $offset, $limit);

		foreach($mails_recieved as $mail_recieved)
		{
			$admin_sent_email = fetch_single_row($mail_recieved['admin_sent_emails_id'], 'admin_sent_emails');

			if($mail_recieved["email_status"] == 1)
			{
				$status = 'Opened';
			}
			elseif($mail_recieved["email_status"] == 0)
			{
				$status = 'Not opened';
			}

			if($mail_recieved["date_opened"] != "" || $mail_recieved["date_opened"] != null || !empty($mail_recieved["date_opened"]))
			{
				$date_opened =  $mail_recieved["date_opened"]; 
			}
			else
			{
				$date_opened =  "-";
			}

			$date1 = new DateTime($mail_recieved['date_recieved']);
			if($mail_recieved["date_opened"] != "" || $mail_recieved["date_opened"] != null || !empty($mail_recieved["date_opened"]))
			{
			$date2 = new DateTime($mail_recieved["date_opened"]);
			$interval = $date1->diff($date2);
			$days = $interval->days;
	
			if($days > 1)
			{
				$how_long = $days . " days";
			}
			else
			{
				$how_long = $days . " day";
			}
			}
			else
			{
				$how_long = "-";
			}

			$data[] = array(
				'mail_recieved_id'	=>	$mail_recieved["id"],
				'status'	=>	$status,
				'date_recieved'	=>	$mail_recieved["date_recieved"],
				'date_opened'	=>	$date_opened,
				'how_long'	=>	$how_long,
				'title'	=>	$admin_sent_email['subject']
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["mail_recieved_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["mail_recieved_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["mail_recieved_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['mail_opened_query']))
{
    // $admin_id = $_POST['admin_id'];
    $mail_opened_id = $_POST['mail_opened_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['mail_opened_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["mail_opened_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			// 'body'	     =>	'%' . $condition . '%',
			'email'	         =>	'%' . $condition . '%',
			'mail_opened_id' =>	$mail_opened_id
		);

        $total_data = count_mail_opened_a($values);
        $mails_opened = search_mail_opened_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($mails_opened as $mail_opened)
		{
			$date1 = new DateTime($mail_opened['date_recieved']);
			$date2 = new DateTime($mail_opened["date_opened"]);
			$interval = $date1->diff($date2);
			$days = $interval->days;
	
			if($days > 1)
			{
				$how_long = $days . " days";
			}
			else
			{
				$how_long = $days . " day";
			}	

			$data[] = array(
				'mail_opened_id' =>	$mail_opened["id"],
				'date_recieved'	 =>	$mail_opened["date_recieved"],
				'date_opened'	 =>	$mail_opened["date_opened"],
				'how_long'	     =>	$how_long,
				'email'	         =>	str_ireplace($replace_array_1, $replace_array_2, $mail_opened["sent_to_email"])
			);
		}
    }
    else
	{
        $total_data = count_mail_opened_b($mail_opened_id);
        $mails_opened = search_mail_opened($mail_opened_id, $offset, $limit);

		foreach($mails_opened as $mail_opened)
		{
			$date1 = new DateTime($mail_opened['date_recieved']);
			$date2 = new DateTime($mail_opened["date_opened"]);
			$interval = $date1->diff($date2);
			$days = $interval->days;
	
			if($days > 1)
			{
				$how_long = $days . " days";
			}
			else
			{
				$how_long = $days . " day";
			}

			$data[] = array(
				'mail_opened_id' =>	$mail_opened["id"],
				'date_recieved'	 =>	$mail_opened["date_recieved"],
				'date_opened'	 =>	$mail_opened["date_opened"],
				'how_long'	     =>	$how_long,
				'email'	         =>	$mail_opened["sent_to_email"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["mail_opened_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["mail_opened_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["mail_opened_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['email_list_stats']))
{
    $eld = db_row_count('', '', 'email_list', '', 0, 0);
    $el  = db_row_count('', 'email', 'email_list', '', 0, 1);
    $cld = db_row_count('', '', 'comments', '', 0, 0);
    $cl  = db_row_count('', 'email', 'comments', '', 0, 1);
    $sl  = db_row_count('', '', 'subscriber_list', '', 0, 0);
    $ul  = db_row_count('', '', 'users', '', 0, 0);
    
	$output = array(
		'eld' =>	$eld,
		'el'  =>	$el,
		'cld' =>	$cld,
		'cl'  =>	$cl,
		'sl'  =>	$sl,
		'ul'  =>	$ul
	);

	echo json_encode($output);
}

if(isset($_POST['user_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['user_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["user_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'first_name' =>	'%' . $condition . '%',
			'last_name'	 =>	'%' . $condition . '%',
			'email'	     =>	'%' . $condition . '%'
		);

        $total_data = count_users_a($values);
        $users = search_users_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($users as $user)
		{
			$data[] = array(
				'user_id'	=>	$user["id"],
				'first_name'	=>	str_ireplace($replace_array_1, $replace_array_2, $user["first_name"]),
				'last_name'	=>	str_ireplace($replace_array_1, $replace_array_2, $user["last_name"]),
				'email'	=>	str_ireplace($replace_array_1, $replace_array_2, $user["email"]),
				'suspended'	=>	$user["suspended"]
			);
		}
    }
    else
	{
        $total_data = count_users_b();
        $users = search_users($offset, $limit);

		foreach($users as $user)
		{
			$data[] = array(
				'user_id'	 =>	$user["id"],
				'first_name' =>	$user["first_name"],
				'last_name'	 =>	$user["last_name"],
				'email'	     =>	$user["email"],
				'suspended'	 =>	$user["suspended"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["user_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["user_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["user_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['admin_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['admin_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["admin_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'first_name' =>	'%' . $condition . '%',
			'last_name'	 =>	'%' . $condition . '%',
			'username'	 =>	'%' . $condition . '%'
		);

        $total_data = count_admin_a($values);
        $admins = search_admin_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($admins as $admin)
		{
			$data[] = array(
				'admin_id'	=>	$admin["id"],
				'first_name'	=>	str_ireplace($replace_array_1, $replace_array_2, $admin["first_name"]),
				'last_name'	=>	str_ireplace($replace_array_1, $replace_array_2, $admin["last_name"]),
				'username'	=>	str_ireplace($replace_array_1, $replace_array_2, $admin["username"]),
				'admin_type' =>	$admin["admin_type"],
				'suspended'	=>	$admin["suspended"]
			);
		}
    }
    else
	{
        $total_data = count_admin_b();
        $admins = search_admin($offset, $limit);

		foreach($admins as $admin)
		{
			$data[] = array(
				'admin_id'	 =>	$admin["id"],
				'first_name' =>	$admin["first_name"],
				'last_name'	 =>	$admin["last_name"],
				'username'	 =>	$admin["username"],
				'admin_type' =>	$admin["admin_type"],
				'suspended'	 =>	$admin["suspended"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["admin_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["admin_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["admin_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['rating_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['rating_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["rating_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'rating'     =>	$condition,
			'reason'	 =>	'%' . $condition . '%',
			'suggestion' =>	'%' . $condition . '%'
		);

        $total_data = count_ratings_a($values);
        $ratings = search_ratings_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($ratings as $rating)
		{
			$data[] = array(
				'rating_id'	=>	$rating["id"],
				'user_id'	=>	$rating["user_id"],
				'rating'	=>	str_ireplace($replace_array_1, $replace_array_2, $rating["rating"]),
				'reason'	=>	str_ireplace($replace_array_1, $replace_array_2, $rating["reason"]),
				'suggestion'	=>	str_ireplace($replace_array_1, $replace_array_2, $rating["suggestion"])
			);
		}
    }
    else
	{
        $total_data = count_ratings_b();
        $ratings = search_ratings($offset, $limit);

		foreach($ratings as $rating)
		{
			$data[] = array(
				'rating_id'	 =>	$rating["id"],
				'user_id'	 =>	$rating["user_id"],
				'rating'	 =>	$rating["rating"],
				'reason'	 =>	$rating["reason"],
				'suggestion' =>	$rating["suggestion"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["rating_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["rating_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["rating_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['each_rating_query']))
{
    // $admin_id = $_POST['admin_id'];
    $user_id = $_POST['user_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['each_rating_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["each_rating_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'user_id'    =>	$user_id,
			'rating'     =>	$condition,
			'reason'	 =>	'%' . $condition . '%',
			'suggestion' =>	'%' . $condition . '%'
		);

        $total_data = count_each_ratings_a($values);
        $ratings = search_each_ratings_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($ratings as $rating)
		{
			$data[] = array(
				'rating_id'	=>	$rating["id"],
				'user_id'	=>	$rating["user_id"],
				'rating'	=>	str_ireplace($replace_array_1, $replace_array_2, $rating["rating"]),
				'reason'	=>	str_ireplace($replace_array_1, $replace_array_2, $rating["reason"]),
				'suggestion'	=>	str_ireplace($replace_array_1, $replace_array_2, $rating["suggestion"])
			);
		}
    }
    else
	{
        $total_data = count_each_ratings_b($user_id);
        $ratings = search_each_ratings($user_id, $offset, $limit);

		foreach($ratings as $rating)
		{
			$data[] = array(
				'rating_id'	 =>	$rating["id"],
				'user_id'	 =>	$rating["user_id"],
				'rating'	 =>	$rating["rating"],
				'reason'	 =>	$rating["reason"],
				'suggestion' =>	$rating["suggestion"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["each_rating_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["each_rating_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["each_rating_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['issue_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['issue_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["issue_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'subject'       =>	'%' . $condition . '%',
			'feedback_type' =>	'%' . $condition . '%',
			'comments'      =>	'%' . $condition . '%',
			'version'       =>	'%' . $condition . '%'
		);

        $total_data = count_issues_a($values);
        $issues = search_issues_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($issues as $issue)
		{
			$data[] = array(
				'issue_id'	=>	$issue["id"],
				'first_name'	=>	str_ireplace($replace_array_1, $replace_array_2, $issue["first_name"]),
				'email'	=>	str_ireplace($replace_array_1, $replace_array_2, $issue["email"]),
				'subject'	=>	str_ireplace($replace_array_1, $replace_array_2, $issue["subject"]),
				'date_created'	=>	$issue["created_at"]
			);
		}
    }
    else
	{
        $total_data = count_issues_b();
        $issues = search_issues($offset, $limit);

		foreach($issues as $issue)
		{
			$data[] = array(
				'issue_id'	   =>	$issue["id"],
				'first_name'   =>	$issue["first_name"],
				'email'	       =>	$issue["email"],
				'subject'	   =>	$issue["subject"],
				'date_created' =>	$issue["created_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["issue_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["issue_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["issue_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to add country
if(isset($_POST['faq']))
{
    $id     = trim($_POST['id']);
    $faq    = trim($_POST['faq']);
    $answer = trim($_POST['answer']);
    
    //error array
    $errors = array();

    if(has_presence($faq) == false)
    {
        $errors[] = 'Faq cannot be empty';
    }
    elseif(strlen($faq) < 2)
    {
        $errors[] = 'The faq field cannot be lesser than 2 characters';
    }
    elseif(strlen($faq) > 255)
    {
        $errors[] = 'The faq field cannot be more than 255 characters';
    }

	if(has_presence($answer) == false)
    {
        $errors[] = 'Answer cannot be empty';
    }
    elseif(strlen($answer) < 12)
    {
        $errors[] = 'The answer field cannot be lesser than 12 characters';
    }
    elseif(strlen($answer) > 65535)
    {
        $errors[] = 'The answer field cannot be more than 65535 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'faq'        => $faq,
			'answer'     => $answer,
            'created_by' => $id,
            'updated_by' => $id
        );

        //insert into posts table
        $executed = insert_into_faqs($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> A faq has been added</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['faqs_query']))
{
    // $admin_id = $_POST['admin_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['faqs_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["faqs_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'faq'   =>	'%' . $condition . '%',
			'answer' =>	'%' . $condition . '%'
		);

        $total_data = count_faqs_a($values);
        $faqs = search_faqs_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($faqs as $faq)
		{
			$data[] = array(
				'faq_id' =>	$faq["id"],
				'faq'	 =>	str_ireplace($replace_array_1, $replace_array_2, $faq["FAQ"])
			);
		}
    }
    else
	{
        $total_data = count_faqs_b();
        $faqs = search_faqs($offset, $limit);

		foreach($faqs as $faq)
		{
			$data[] = array(
				'faq_id' =>	$faq["id"],
				'faq'	 =>	$faq["FAQ"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["faqs_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["faqs_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["faqs_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

//to update country
if(isset($_POST['edit-faqs']))
{
    $admin_id = trim($_POST['admin-id']);
    $faq_id   = trim($_POST['faq-id']);
    $faqs     = trim($_POST['edit-faqs']);
    $answer   = trim($_POST['answer']);
    
    //error array
    $errors = array();

	if(has_presence($faqs) == false)
    {
        $errors[] = 'Faq cannot be empty';
    }
    elseif(strlen($faqs) < 2)
    {
        $errors[] = 'The faq field cannot be lesser than 2 characters';
    }
    elseif(strlen($faqs) > 255)
    {
        $errors[] = 'The faq field cannot be more than 255 characters';
    }

	if(has_presence($answer) == false)
    {
        $errors[] = 'Answer cannot be empty';
    }
    elseif(strlen($answer) < 12)
    {
        $errors[] = 'The answer field cannot be lesser than 12 characters';
    }
    elseif(strlen($answer) > 65535)
    {
        $errors[] = 'The answer field cannot be more than 65535 characters';
    }
    
    if(empty($errors))
    {
        $values = array(
			'faqs'       => $faqs,
			'answer'     => $answer,
            'faq_id'     => $faq_id,
            'updated_by' => $admin_id
        );

        $executed = update_faqs($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> Faqs has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['post_query']))
{
    $user_id = $_POST['user_id'];

    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['post_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["post_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'user_id'     =>	$user_id,
			'title'       =>	'%' . $condition . '%',
			'description' =>	'%' . $condition . '%'
		);

        $total_data = count_posts_a($values);
        $posts = search_posts_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($posts as $post)
		{
			$data[] = array(
				'post_id'	    =>	$post["id"],
				'title'	        =>	str_ireplace($replace_array_1, $replace_array_2, $post["title"]),
				'description'	=>	str_ireplace($replace_array_1, $replace_array_2, $post["description"]),
				'date_created'	=>	$post["created_at"],
				'date_updated'	=>	$post["updated_at"]
			);
		}
    }
    else
	{
        $total_data = count_posts_b($user_id);
        $posts = search_posts($user_id, $offset, $limit);

		foreach($posts as $post)
		{
			$data[] = array(
				'post_id'	    =>	$post["id"],
				'title'	        =>	$post["title"],
				'description'	=>	$post["description"],
				'date_created'	=>	$post["created_at"],
				'date_updated'	=>	$post["updated_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["post_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["post_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["post_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['all_post_query']))
{
    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['all_post_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["all_post_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'title'       =>	'%' . $condition . '%',
			'description' =>	'%' . $condition . '%'
		);

        $total_data = count_posts_a($values, 0);
        $posts = search_posts_with_wildcard($values, $offset, $limit, 0);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($posts as $post)
		{
			$data[] = array(
				'post_id'	    =>	$post["id"],
				'title'	        =>	str_ireplace($replace_array_1, $replace_array_2, $post["title"]),
				'description'	=>	str_ireplace($replace_array_1, $replace_array_2, $post["description"]),
				'date_created'	=>	$post["created_at"],
				'date_updated'	=>	$post["updated_at"]
			);
		}
    }
    else
	{
        $total_data = count_posts_b('', 0);
        $posts = search_posts('', $offset, $limit, 0);

		foreach($posts as $post)
		{
			$data[] = array(
				'post_id'	    =>	$post["id"],
				'title'	        =>	$post["title"],
				'description'	=>	$post["description"],
				'date_created'	=>	$post["created_at"],
				'date_updated'	=>	$post["updated_at"]
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["all_post_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["all_post_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["all_post_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['to']))
{
	$to = trim($_POST['to']);
	$from = trim($_POST['from']);

	if($from == '')
	{
		echo 'please choose a date';
	}
	else
	{
		$amount = 0;

		$values = array(
			'from' => $from,
			'to'   => $to
		);
		$payments = payment_subscriptions($values, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
}

if(isset($_POST['payment-periods']))
{
	$payment_periods = trim($_POST['payment-periods']);

	if($payment_periods == 'S')
	{
		echo 'select a period';
	}
	elseif($payment_periods == '10y')
	{
		$amount = 0;

		// $dt = new DateTime(date("Y-m-d"));
		// $dt->modify("-10 year");

		// $past = $dt->format('Y-m-d');
		$unit = "YEAR";
		$period = 10;

		$values = array(
			// 'past'   => $past,
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	elseif($payment_periods == '5y')
	{
		$amount = 0;
		$unit = "YEAR";
		$period = 5;

		$values = array(
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	elseif($payment_periods == '1y')
	{
		$amount = 0;

		$unit = "YEAR";
		$period = 1;

		$values = array(
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	elseif($payment_periods == '6m')
	{
		$amount = 0;

		$unit = "MONTH";
		$period = 6;

		$values = array(
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	elseif($payment_periods == '3m')
	{
		$amount = 0;

		$unit = "MONTH";
		$period = 3;

		$values = array(
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	elseif($payment_periods == '1m')
	{
		$amount = 0;

		$unit = "MONTH";
		$period = 1;

		$values = array(
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	elseif($payment_periods == '1d')
	{
		$amount = 0;

		$unit = "DAY";
		$period = 1;

		$values = array(
			'unit'   => $unit,
			'period' => $period
		);

		$payments = payment_subscriptions($values, 0, 1);

		foreach($payments as $payment)
		{
			$amount += $payment['amount'];
		}
		echo $amount;
	}
	
}

if(isset($_POST['payment_query']))
{
    $data = array();

    $limit = 5;

	$page = 1;

	if($_POST["page"] > 1)
	{
		$offset = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	}
	else
	{
		$offset = 0;
	}

    if($_POST['payment_query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["payment_query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'state'   =>	'%' . $condition . '%',
			'expires' =>	'%' . $condition . '%',
			'amount'  =>	'%' . $condition . '%'
		);

        $total_data = count_payment_subscriptions_a($values, 0);
        $payments = search_payment_subscriptions_with_wildcard($values, $offset, $limit, 0);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($payments as $payment)
		{
			$data[] = array(
				'payment_id'   =>	$payment["id"],
				'user_id'	   =>	$payment["user_id"],
				'agreement_id' =>	$payment["agreement_id"],
				'state'	       =>	str_ireplace($replace_array_1, $replace_array_2, $payment["state"]),
				'expires'	   =>	str_ireplace($replace_array_1, $replace_array_2, $payment["end_date"]),
				'amount_w_c'   =>	str_ireplace($replace_array_1, $replace_array_2, $payment["amount_with_currency"]),
			);
		}
    }
    else
	{
        $total_data = count_payment_subscriptions_b();
        $payments = search_payment_subscriptions($offset, $limit);

		foreach($payments as $payment)
		{
			$data[] = array(
				'payment_id'   =>	$payment["id"],
				'user_id'	   =>	$payment["user_id"],
				'agreement_id' =>	$payment["agreement_id"],
				'state'	       =>	$payment["state"],
				'expires'	   =>	$payment["end_date"],
				'amount_w_c'   =>	$payment["amount_with_currency"],
			);
		}
	}

    $pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["payment_query"].'`, '.$previous_id.')">Previous</a></li>';
			}
			else
			{
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`'.$_POST["payment_query"].'`, '.$next_id.')">Next</a></li>
				';
			}

		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			}
			else
			{
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`'.$_POST["payment_query"].'`, '.$page_array[$count].')">'.$page_array[$count].'</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_POST['amount-per-month']))
{
	$id               = trim($_POST['price-id']);
	$subject          = trim($_POST['subject']);
	$desc             = trim($_POST['price-description']);
	$amount_per_month = trim($_POST['amount-per-month']);
	$rate             = trim($_POST['rate']);

	//error array
	$errors = array();

	if(has_presence($subject) == false)
	{
		$errors[] = 'Subject cannot be empty';
	}
	elseif(accepted_data_type($subject, 'name') == false)
	{
		$errors[] = $subject . ' is not valid';
	}
	elseif(strlen($subject) < 2)
	{
		$errors[] = 'The subject field cannot be lesser than 2 characters';
	}
	elseif(strlen($subject) > 255)
	{
		$errors[] = 'The subject field cannot be more than 255 characters';
	}

	if(has_presence($desc) == false)
	{
		$errors[] = 'Description cannot be empty';
	}
	elseif(strlen($desc) < 12)
	{
		$errors[] = 'The description field cannot be lesser than 12 characters';
	}
	elseif(strlen($desc) > 65535)
	{
		$errors[] = 'The description field cannot be more than 65535 characters';
	}

	if(has_presence($amount_per_month) == false)
	{
		$errors[] = 'Amount per month cannot be empty';
	}
	elseif(accepted_data_type($amount_per_month, 'name') == false)
	{
		$errors[] = $amount_per_month . ' is not valid';
	}
	elseif(strlen($amount_per_month) > 10)
	{
		$errors[] = 'The amount per month field cannot be more than 10 characters';
	}

	if(has_presence($rate) == false)
	{
		$errors[] = 'rate cannot be empty';
	}
	elseif(accepted_data_type($rate, 'int') == false)
	{
		$errors[] = $rate . ' is not valid';
	}
	elseif(strlen($rate) > 3)
	{
		$errors[] = 'The rate field cannot be more than 3 characters';
	}

	if(empty($errors))
    {
		//update
		$values = array(
			'id'               => $id,
			'subject'          => $subject,
			'description'      => $desc,
			'amount_per_month' => $amount_per_month,
			'rate'             => $rate
		);
		$executed = update_payment_prices($values);
		if($executed)
		{
			$msg = "<div class='card success'><div><b>Success!</b> Ad removal updated </div></div>";
			echo $msg;	
		}
	}
	else
	{
		echo form_errors($errors);
	}

}

if(isset($_POST['admin_profile_image_for_setting']))
{
    $host = url()[0];
    $host1 = url()[1];
    $id = $_POST['admin_id'];
    $admin = fetch_single_row($id, 'admin');
    $image = $admin['profile_image'] === NULL ? $host1 . 'images/avatar.png' : $host . 'profile_images/' . $admin['profile_image'];

    echo "background: url(". $image .");background-size:cover;background-repeat:no-repeat;background-position:center top;";
}

if(isset($_POST['admin-id-profile-image']))
{
    $id = trim($_POST['admin-id-profile-image']);

    //error array
    $errors =  array();

    if(isset($_FILES['profile-image']['name']))
    {
    
        $profile_image_name = $_FILES['profile-image']['name'];
        $profile_image_size = $_FILES['profile-image']['size'];

        $allowed_images = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
        $image_ext = pathinfo($profile_image_name, PATHINFO_EXTENSION);

        if(!in_array($image_ext, $allowed_images))
        {
            $errors[] = 'The accepted profile image types are png and jpg/jpeg only';
        }
        elseif($profile_image_size > 1000000)
        {
            $errors[] = 'Profile image size should not be more than 1Mb';
        }
        else
        {
            $admin = fetch_single_row($id, 'admin');

            $filename = 'profile_images/' . $admin['profile_image'];
            if (file_exists($filename) && !is_dir($filename))
            {
                $deleted = unlink($filename);
                if (!$deleted)
                {
                    $errors[] = 'Something went wrong. Please try again';
                }
                else
                {
                    $new_profile_image_name = time() .'_' . $profile_image_name;
                    $profile_image_folder = 'profile_images/';
                    $tmp_profile_image = $_FILES['profile-image']['tmp_name'];
                
                    move_uploaded_file($tmp_profile_image, $profile_image_folder .$new_profile_image_name);
                }
            }
            else
            {
                $new_profile_image_name = time() .'_' . $profile_image_name;
                $profile_image_folder = 'profile_images/';
                $tmp_profile_image = $_FILES['profile-image']['tmp_name'];
            
                move_uploaded_file($tmp_profile_image, $profile_image_folder .$new_profile_image_name);
            }
        }
    }
    else
    {
        $errors[] = 'You must upload a profile image';
    }

    if(empty($errors))
    {
        $values = array(
            'id'            => $id,
            'profile_image' => $new_profile_image_name,
        );

        //update profile image in admin table
        $executed = update_admin_profile_image($values);

        if($executed)
        {
            $msg = "<div class='card success'><div><b>Success!</b> Your profile image has been updated</div></div>";
            echo $msg;
        }

    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['admin_profile_image']))
{
    $id = $_POST['admin_id'];
    $row = fetch_single_row($id, 'admin');

    $host = url()[0];
    $host1 = url()[1];

    if($row['profile_image'] === NULL)
    {
      echo '<img src="' . $host1 . 'images/avatar.png" alt="">';
    }
    else
    {
      echo '<img src="' . $host . 'profile_images/' . $row['profile_image'] .'" alt="">';
    }
}

if(isset($_POST['old-password']))
{
    $id                   = trim($_POST['admin-id']);
    // $username            = trim($_POST['username']);
    $email                = trim($_POST['email']);
    $old_password         = trim($_POST['old-password']);
    $new_password         = trim($_POST['new-password']);
    $confirm_new_password = trim($_POST['confirm-new-password']);

    //error array
    $errors = array();

    $admin = fetch_single_row($id, 'admin');

    $admin_password = $admin['password'];

    if(has_presence($old_password) == false)
    {
        $errors[] = 'The password field cannot be empty';
    }
    elseif(password_verify($old_password, $admin_password) == false)
    {
        $errors[] = 'Please provide your valid account password';
    }

    if(has_presence($new_password) == false)
    {
        $errors[] = 'The new password field cannot be empty';
    }
    elseif(strlen($new_password) < 8)
    {
        $errors[] = 'The new password field cannot be lesser than 8 characters';
    }
    elseif(strlen($new_password) > 32)
    {
        $errors[] = 'The new password field cannot be more than 32 characters';
    }
    elseif(!preg_match("#[0-9]+#",$new_password)) {
        $errors[] = "The new password field must contain at least one number!";
    }
    elseif(!preg_match("#[A-Z]+#",$new_password)) {
        $errors[] = "The new password field must contain at least one capital letter!";
    }
    elseif(!preg_match("#[a-z]+#",$new_password)) {
        $errors[] = "The new password field must contain at least one lowercase letter!";
    }
    elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $new_password)) {
        $errors[] = "The new password field must contain at least one special character!";
    }

    //get all the passwords of this admin from admin passwords table
    $rows = fetch_rows_in_passwords($email);
    foreach($rows as $row)
    {
        if(password_verify($new_password, $row['password']))
        {
            $errors[] = "You can't reuse your previous password(s)!";
            break;
        }
    }

    if(has_presence($confirm_new_password) == false)
    {
        $errors[] = 'The confirm new password field cannot be empty';
    }
    
    if($new_password !== $confirm_new_password)
    {
        $errors[] = 'The new and confirm new password fields does not match!';
    }

    if(empty($errors))
    {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $values = array($email, $hashed_password);

        //insert hashed password into admin's passwords table
        $executed = insert_into_admin_passwords($values);

        if($executed)
        {
            $values = array(
                'generate_id' => $id,
                'updated_by'  => $id,
                'password'    => $hashed_password,
            );
    
            //update admin's hashed password in admins table
            $executed = update_admin_password($values);
    
            if($executed)
            {
                $msg = "<div class='card success'><div><b>Success!</b> Your password has been updated</div></div>";
                echo $msg;
            }
        }


    }
    else
    {
        echo form_errors($errors);
    }
}
?>