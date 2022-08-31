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

if(isset($_POST["view_notification"]))
{

    if($_POST["view_notification"] != '')
    {
        update_unseen_user_sent_email();
    }
    
    $results = user_sent_emails_in_notification();
    $output = '';

    if($results)
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
    }
    else
    {
        $output .= '<li><a href="#">No Notification</a></li>';
    }

    //count unseen comments
    $count = count_unseen_user_sent_emails();

    $data = array(
    'notification'   => $output,
    'unseen_notification' => $count
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

?>