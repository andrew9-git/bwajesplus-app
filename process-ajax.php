<?php

require_once('includes/functions.php');
include('includes/phpmailer.php');
include('includes/email-template.php');
session_start();

if(isset($_POST['user_profile_image']))
{
    $id = $_POST['user_id'];
    $row = fetch_single_row($id, 'users');

    $host = url();

    if($row['profile_image'] === NULL)
    {
      echo '<img src="' . $host . 'images/avatar.png" alt="">';
    }
    else
    {
      echo '<img src="' . $host . 'profile_images/' . $row['profile_image'] .'" alt="">';
    }
}

if(isset($_POST['user_profile_image_for_setting']))
{
    $host = url();
    $id = $_POST['user_id'];
    $user = fetch_single_row($id, 'users');
    $image = $user['profile_image'] === NULL ? $host . 'images/avatar.png' : $host . 'profile_images/' . $user['profile_image'];

    echo "background: url(". $image .");background-size:cover;background-repeat:no-repeat;background-position:center top;";
}

if(isset($_POST['delete-post']) && $_POST['delete-post'] !== '')
{
    $post_id = $_POST['delete-post'];

    $post = fetch_single_row($post_id, 'posts');

    $filename = 'cover_photos/' . $post['cover_photo'];
    if (file_exists($filename) && !is_dir($filename))
    {
        $deleted = unlink($filename);
        if ($deleted)
        {
            //delete post
            $executed = delete_single_row($post_id, 'posts');

            if($executed)
            {
                echo 'Success!';
            }
        }
    }
}


if(isset($_POST['query']))
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

    if($_POST['query'] !== '')
    {
        $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);
		$condition = trim($condition);
		$condition = str_replace(" ", "%", $condition);

		$values = array(
			'user_id'		=>	$user_id,
			'title'		    =>	'%' . $condition . '%',
			'description'	=>	'%' . $condition . '%'
		);

        $total_data = count_post_a($values);
        $posts = search_post_with_wildcard($values, $offset, $limit);

		$replace_array_1 = explode("%", $condition);

		foreach($replace_array_1 as $row_data)
		{
			$replace_array_2[] = '<span style="background-color:#'.rand(100000, 999999).'; color:#fff">'.$row_data.'</span>';
		}

		foreach($posts as $post)
		{
			$data[] = array(
				'post_id'			    =>	$post["id"],
				'post_title'			=>	str_ireplace($replace_array_1, $replace_array_2, $post["title"]),
				'post_description'		=>	str_ireplace($replace_array_1, $replace_array_2, $post["description"])
			);
		}
    }
    else
	{
        $total_data = count_post_b($user_id);
        $posts = search_post($user_id, $offset, $limit);

		foreach($posts as $post)
		{
			$data[] = array(
                'post_id'			    =>	$post["id"],
				'post_title'			=>	$post["title"],
				'post_description'		=>	$post["description"]
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

			if($next_id >= $total_links)
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

if(isset($_POST['department']))
{
    $user_id = trim($_POST['user-id']);
    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);

    //error array
    $errors = array();

    if(has_presence($email) == false)
    {
        $errors[] = 'Email cannot be empty';
    }
    elseif(accepted_data_type($email, 'email') == false)
    {
        $errors[] = $email . ' is not a valid email';
    }

    if(accepted_option($department) == false)
    {
        $errors[] = 'Please choose support department';
    }

    if(has_presence($title) == false)
    {
        $errors[] = 'Title cannot be empty';
    }
    elseif(strlen($title) < 20)
    {
        $errors[] = 'The title field cannot be lesser than 20 characters';
    }
    elseif(strlen($title) > 60)
    {
        $errors[] = 'The title field cannot be more than 60 characters';
    } 

    if(has_presence($message) == false)
    {
        $errors[] = 'Message cannot be empty';
    }

    elseif(strlen($message) < 30)
    {
        $errors[] = 'The message field cannot be lesser than 30 characters';
    }
    elseif(strlen($message) > 65535)
    {
        $errors[] = 'The message field cannot be more than 65535 characters';
    }

    if(empty($errors))
    {
        //insert user into user sent emails table
        $values = array(
            'user_id'    => $user_id,
            'email'      => $email,
            'department' => $department,
            'title'      => $title,
            'message'    => $message
        );

        $executed = user_sent_emails($values);

        if($executed)
        {
            $name = $first_name . ' ' . $last_name;
            $set_from = array(
                'email' => $email,
                'name' => $name
            );

            $add_address = array(
                'email' => $department,
                'name' => 'bwajes+'
            );

            $add_reply_to = array(
                'email' => $email,
                'message' => 'You can reply to this mail'
            );

            $subject = $title;
            $body_msg = $message;
            $altbody = $message;
            $body = email_template($body_msg, 0, 1, '', '', 1);

            $data = array(
                'subject' => $subject,
                'body' => $body,
                'altbody' => $altbody
            );

            $mail_response = send_mail($set_from, $add_address, $data, $add_reply_to);
            if($mail_response !== true)
            {
                echo "<div class='card error'><div>" . $mail_response . "</div></div>";
            }
            else
            {
                $msg = "<div class='card success'><div>Thanks for messaging us!</div></div>";
                echo $msg;
            }
        }
    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['rating']))
{
    $user_id = trim($_POST['user-id']);
    $rating = trim($_POST['rating']);
    $reason = trim($_POST['reason']); 
    $suggestion = trim($_POST['suggestion']);

    //error array
    $errors = array();

    if(!empty($reason) || $reason != '' || $reason != null)
    {
        if(strlen($reason) < 20)
        {
            $errors[] = 'Please ensure that your reason should\'nt be lesser than 20 characters';
        }
        elseif(strlen($reason) > 65535)
        {
            $errors[] = 'Please ensure that your reason should\'nt be greater than 65535 characters';
        }
    }
    else
    {
        $reason = null;
    }


    if(!empty($suggestion) || $suggestion != '' || $suggestion != null)
    {
        if(strlen($suggestion) < 20)
        {
            $errors[] = 'Please ensure that your suggestion should\'nt be lesser than 20 characters';
        }
        elseif(strlen($suggestion) > 65535)
        {
            $errors[] = 'Please ensure that your suggestion should\'nt be greater than 65535 characters';
        }
    }
    else
    {
        $suggestion = null;
    }

    if(empty($errors))
    {
        //insert into ratings table
        $values = array(
            'user_id'    => $user_id,
            'rating'     => $rating,
            'reason'     => $reason,
            'suggestion' => $suggestion
        );

        $executed = ratings($values);

        if($executed)
        {
            $msg = "<div class='card success'><div>Thanks for rating us!</div></div>";
            echo $msg;
        }
    }
    else
    {
        echo form_errors($errors);
    }
}

if(isset($_POST['user-id-profile-image']))
{
    $id = trim($_POST['user-id-profile-image']);

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
            $user = fetch_single_row($id, 'users');

            $filename = 'profile_images/' . $user['profile_image'];
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

        //update profile image in users table
        $executed = update_user_profile_image($values);

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

if(isset($_POST['old-password']))
{
    $id                   = trim($_POST['user-id']);
    $user_email           = trim($_POST['user-email']);
    $old_password         = trim($_POST['old-password']);
    $new_password         = trim($_POST['new-password']);
    $confirm_new_password = trim($_POST['confirm-new-password']);

    //error array
    $errors = array();

    $user = fetch_single_row($id, 'users');

    $user_password = $user['password'];

    if(has_presence($old_password) == false)
    {
        $errors[] = 'The password field cannot be empty';
    }
    elseif(password_verify($old_password, $user_password) == false)
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

    //get all the passwords of this user from user passwords table
    $rows = fetch_rows_in_passwords($user_email);
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

        $values = array($user_email, $hashed_password);

        //insert hashed password into user's passwords table
        $executed = insert_into_user_passwords($values);

        if($executed)
        {
            $values = array(
                'id'            => $id,
                'password' => $hashed_password,
            );
    
            //update user's hashed password in users table
            $executed = update_user_password($values);
    
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


if(isset($_POST['delete-user-id']))
{
    $delete_id         = trim($_POST['delete-user-id']);
    $delete_first_name = trim($_POST['delete-user-first-name']);
    $delete_last_name  = trim($_POST['delete-user-last-name']);
    $delete_email      = trim($_POST['delete-user-email']);
    $delete_gender     = trim($_POST['delete-user-gender']);

    $phone      = trim($_POST['delete-user-phone']);
    $website    = trim($_POST['delete-user-website']);
    $birth_date = trim($_POST['delete-user-birth-date']);
    $address    = trim($_POST['delete-user-address']);
    $city       = trim($_POST['delete-user-city']);
    $state      = trim($_POST['delete-user-state']);
    $country    = trim($_POST['delete-user-country']);

    empty($phone) || $phone == '' || $phone == null ? $delete_phone = $phone : $delete_phone = NULL;
    empty($website) || $website == '' || $website == null ? $delete_website = $website : $delete_website = NULL;
    empty($birth_date) || $birth_date == '' || $birth_date == null ? $delete_birth_date = $birth_date : $delete_birth_date = NULL;
    empty($address) || $address == '' || $address == null ? $delete_address = $address : $delete_address = NULL;
    empty($city) || $city == '' || $city == null ? $delete_city = $city : $delete_city = NULL;
    empty($state) || $state == '' || $state == null ? $delete_state = $state : $delete_state = NULL;
    empty($country) || $country == '' || $country == null ? $delete_country = $country : $delete_country = NULL;

    //delete all user's previous passwords from user passwords table
    $executed = delete_single_row($delete_email, 'user_passwords', 'email', 'str');

    if($executed)
    {
        //delete registered users from email list table
        $executed = delete_from_email_list($delete_email, 1);
    
        if($executed)
        {
            $values = array(
                'user_id'    => $delete_id,
                'first_name' => $delete_first_name,
                'last_name'  => $delete_last_name,
                'email'      => $delete_email,
                'gender'     => $delete_gender,
                'phone'      => $delete_phone,
                'website'    => $delete_website,
                'birthdate'  => $delete_birth_date,
                'address'    => $delete_address,
                'city'       => $delete_city,
                'state'      => $delete_state,
                'country'    => $delete_country
            );
    
            //insert into deleted users table
            $executed = deleted_users($values);
    
            if($executed)
            {
                //delete all cover photo uploaded by user
    
                $user_posts = posts_to_show_in_dashboard($delete_id, 0);
    
                foreach($user_posts as $post)
                {
                    $filename = 'cover_photos/' . $post['cover_photo'];
                    if (file_exists($filename) && !is_dir($filename))
                    {
                        $deleted = unlink($filename);
                        if(!$deleted)
                        {
                            $msg = "<div class='card error'><div>Something went wrong</div></div>";
                            echo $msg;
                            break;
                        }
                    }
                }
    
                //delete profile image uploaded by user
                $user = fetch_single_row($delete_id, 'users');
    
                $user_profile_image = $user['profile_image'];
    
                if($user_profile_image !== null || $user_profile_image !== '')
                {
                    $filename = 'profile_images/' . $user_profile_image;
                    if (file_exists($filename) && !is_dir($filename))
                    {
                        $deleted = unlink($filename);
                        if(!$deleted)
                        {
                            $msg = "<div class='card error'><div>Something went wrong</div></div>";
                            echo $msg;
                        }
                        else
                        {
                            //delete from users table
                            $executed = delete_single_row($delete_id, 'users');
                            if($executed)
                            {
                                //redirect to register
    
                                unset($_SESSION['is_bwajes_plus_user_logged_in']);
                                session_destroy();
                                $msg = "<div class='card error'><div>Success!</div></div>";
                                echo $msg;
                        
                            }
                            else
                            {
                                $msg = "<div class='card error'><div>Something went wrong</div></div>";
                                echo $msg;
                            }
                        }
                    }
                    else
                    {
                        //delete from users table
                        $executed = delete_single_row($delete_id, 'users');
                        if($executed)
                        {
                            //redirect to register
    
                            unset($_SESSION['is_bwajes_plus_user_logged_in']);
                            session_destroy();
                            $msg = "<div class='card error'><div>Success!</div></div>";
                            echo $msg;
                    
                        }
                        else
                        {
                            $msg = "<div class='card error'><div>Something went wrong</div></div>";
                            echo $msg;
                        }
                    }
                }
                else
                {
                    //delete from users table
                    $executed = delete_single_row($delete_id, 'users');
                    if($executed)
                    {
                        //redirect to register
    
                        unset($_SESSION['is_bwajes_plus_user_logged_in']);
                        session_destroy();
                        $msg = "<div class='card error'><div>Success!</div></div>";
                        echo $msg;
                
                    }
                    else
                    {
                        $msg = "<div class='card error'><div>Something went wrong</div></div>";
                        echo $msg;
                    }
                }
            }
            else
            {
                $msg = "<div class='card error'><div>Something went wrong</div></div>";
                echo $msg;
            }
        }
        else
        {
            $msg = "<div class='card error'><div>Something went wrong</div></div>";
            echo $msg;
        }
    }
    else
    {
        $msg = "<div class='card error'><div>Something went wrong</div></div>";
        echo $msg;
    }
}

if(isset($_POST["view_notification"]))
{

    $user_id = $_POST["user_id"];

    if($_POST["view_notification"] != '')
    {
        update_unseen_comment($user_id);
    }
    
    $results = comments_in_notification($user_id);
    $output = '';

    if($results)
    {
        foreach($results as $result)
        {
            $post = fetch_single_row($result["post_id"], 'posts');

            $url  = 'http://localhost:9090/bwajes/post/'.$result["post_id"].'/'.$post["title"].'#'.$result['id'];
            $output .= '
            <li>
                <a target="_blank" href="'.$url.'">
                '.substr($result["comment"], 0, 20).'...
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
    $count = count_unseen_comments($user_id);

    $data = array(
    'notification'   => $output,
    'unseen_notification' => $count
    );
    
    echo json_encode($data);
}

?>