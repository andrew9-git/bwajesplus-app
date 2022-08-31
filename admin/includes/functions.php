<?php

// Database instantiation
require_once('includes/db.php');

function db($dbname)
{
    $db = new dbase($dbname);
    return $db;
}
// End database instantiation

// Miscellenious functions
function url()
{
    $host='http://localhost:9090/bwajesplus-app/admin/';
    $host1='http://localhost:9090/bwajesplus-app/';
    return array($host, $host1);
}

function redirect_to($url)
{
    header("Location: {$url}");
}

function set_msg($msg)
{
    if($msg !== "")
    {
        $_SESSION['setmsg'] = $msg;
    }
}

function display_msg()
{
    if(isset($_SESSION['setmsg']))
    {
        echo '<div class="card success"><div class="card-header"></div><div class="card-body">' . $_SESSION['setmsg'] . '</div></div>';
        $_SESSION['setmsg'] = null;
    }
}

function csrf_token()
{
    //create a key for hash_hmac function
	if (empty($_SESSION['key']))
    $_SESSION['key'] = bin2hex(random_bytes(32));

    //create CSRF token
    $csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);
    return $csrf;
}

//checking if the user has already logged in or not
function admin_is_logged_in()
{
    if(isset($_SESSION['is_admin_logged_in']))
    {
        return true;
    }
    return false;
}

function check_inactive_admin($last_login_timestamp, $duration, $url='http://localhost:9090/bwajesplus-app/admin/logout')
{
    

    if((time() - $last_login_timestamp) > $duration)
    {
        header("Location: {$url}");
    }
    else
    {   
        $last_login_timestamp = time();
    }
}

//generating username for admin
function username($first_name)
{
    $name = $first_name;
    $username = 'abcdefghijklmnopqrstuvwxyz';
    $username = str_shuffle($username);
    if(strlen($name) == 2)
    {
        $username = 'B+'. substr(strtolower($name), 0, 2) . substr($username, 0, 6);
    }
    elseif(strlen($name) > 2)
    {
        $username = 'B+'. substr(strtolower($name), 0, 3) . substr($username, 0, 5);
    }

    $count = db_row_count($username, 'username', 'admin', 'str');

    if($count > 0)
    {
        username($name);
    }
    else
    {
        return $username;
    }
}
// End miscellenious functions

// Form validation functions

//presence
function has_presence($value)
{
    
    // $value = trim($value);
    if(!isset($value) || $value === "" || empty($value))
    {
       return false;
    }
    else
    {
        return true;
    }
}

//string length
function accepted_field_length($value, $min, $max)
{
    if(strlen($value) < $min)
    {
        $errors[] = 'The characters should not be less than' . $min;
    }
    elseif(strlen($value) > $max)
    {
        $errors[] = 'The characters should not be greater than' . $max;
    }
    else
    {
        return true;
    }
}

//type
function accepted_data_type($value, $field_type)
{
    switch($field_type)
    {
        case 'int': 
            if(!filter_var($value, FILTER_VALIDATE_INT))
            {
                return false;  
            }
            else
            {
                return true;
            }
        break;
        case 'email':
            if(!filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                return false;  
            }
            else
            {
                return true;
            }
        break;
        case 'name': 
            if(preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬!]/', $value))
            {
                return false;  
            }
            else
            {
                return true;
            }
        break;
        case 'url': 
            if(!filter_var($value, FILTER_VALIDATE_URL))
            {
                return false;  
            }
            else
            {
                return true;
            }
        break;
        case 'phone': 
            if(!preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $value))
            {
                return false;
            }
            else
            {
                return true;
            }
        break;
        case 'address': 
            if(preg_match('/[^A-Za-z0-9 \*,\'"\.:;@\(\)&\-]/', $value))
            {
                return false;  
            }
            else
            {
                return true;
            }
        break;
        case 'str': 
            if(preg_match('/[^A-Za-z\-]/', $value))
            {
                return false; 
            }
            else
            {
                return true;
            }
        break;
        case 'str1': 
            if(preg_match('/[^A-Za-z0-9\-_ ]/', $value))
            {
                return false; 
            }
            else
            {
                return true;
            }
        break;
        case 'str2': 
            if(preg_match('/[^A-Za-z0-9&\?\|\[\]\(\)\{\}\-_ ]/', $value))
            {
                return false;
            }
            else
            {
                return true;
            }
        break;
        default: return false;
        break;
    }
}

//validate gender field
function accepted_option($option)
{
    
    if($option === 'S')
    {
        return false;  
    }
    else
    {
        return true;
    }
}

//inclusion in a set
function found_in($value, array $set)
{
    if(!in_array($value, $set))
    {
        $errors[] = 'This is file type is not valid'; 
    }
    else
    {
        return true;
    }
}

//format
function matches_format($regex, $value)
{
    if(!preg_match($regex, $value))
    {
        $errors[] = 'A match was not found'; 
    }
    else
    {
        return true;
    }
}

//validate token
function csrf_is_valid($csrf)
{
    if (hash_equals($csrf, $_POST['csrf']) === false)
    {
        $errors[] = 'Oops something went wrong. Please try again later';
    }
    else
    {
        return true;
    }

}

//form error
function form_errors(array $errors)
{
    $output = "";
    if(!empty($errors))
    {
        $output .= "<div class='card error'>";
        $output .= "<div>";
        $output .= "<ul>";
        foreach($errors as $key => $error)
        {
            $output .= "<li>{$error}</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
        $output .= "</div>";
    }
    return $output;
}

// End form validation functions

// Database queries

//uniqueness and row count
function db_row_count($value, $column_name, $table_name, $type='int', $where=1)
{
    $db = new dbase();

    $query = "";
    $query .= "SELECT COUNT(*) FROM $table_name";
    if($where == 1)
    {
        $query .= " WHERE $column_name = :value";
    }
    $db->prep($query);
    if($where == 1)
    {
        $db->bindvalue(':value', $value, $type);
    }
    $count = $db->fetchCol();
    return $count;
}

//getting all admin types
function admin_type()
{
    $db = new dbase();

    $query = "SELECT * FROM admin_type";
    $db->prep($query);
    $rows = $db->fetchMultiple();
    return $rows;
}

//inserting values into admin table
function insert_into_admin(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO admin(first_name, last_name, email, username, admin_type, gender, password, profile_image, phone, bio, website, birthdate, address, city, state, country, registered_by) VALUES(:first_name, :last_name, :email, :username, :admin_type, :gender, :password, :profile_image, :phone, :bio, :website, :birthdate, :address, :city, :state, :country, :registered_by)";
    $db->prep($query);

    $db->bindvalue(':first_name', $value['first_name'], 'str');
    $db->bindvalue(':last_name', $value['last_name'], 'str');
    $db->bindvalue(':email', $value['email'], 'str');
    $db->bindvalue(':username', $value['username'], 'str');
    $db->bindvalue(':admin_type', $value['admin_type'], 'int');
    $db->bindvalue(':gender', $value['gender'], 'str');
    $db->bindvalue(':password', $value['password'], 'str');
    $db->bindvalue(':profile_image', $value['profile_image'], 'str');
    $db->bindvalue(':phone', $value['phone'], 'str');
    $db->bindvalue(':bio', $value['bio'], 'str');
    $db->bindvalue(':website', $value['website'], 'str');
    $db->bindvalue(':birthdate', $value['birthdate'], 'str');
    $db->bindvalue(':address', $value['address'], 'str');
    $db->bindvalue(':city', $value['city'], 'str');
    $db->bindvalue(':state', $value['state'], 'str');
    $db->bindvalue(':country', $value['country'], 'str');
    $db->bindvalue(':registered_by', $value['registered_by'], 'int');

    $execute = $db->execute();

    return $execute;
}

function insert_into_admin_passwords(array $value)
{
    

    $db = new dbase();

    $query = "INSERT INTO admin_passwords(email, password) VALUES(:email, :password)";
    $db->prep($query);

    $db->bindvalue(':email', $value[0], 'str');
    $db->bindvalue(':password', $value[1], 'str');

    $execute = $db->execute();

    return $execute;
}

//getting a single row in a table
function fetch_single_row($value, $table_name, $column_name = 'id', $type='int')
{
    $db = new dbase();

    $query = "SELECT * FROM $table_name WHERE $column_name = :value";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $row = $db->fetchSingle();
    return $row;
}

//update admin's password
function update_admin_password($value)
{
    $db = new dbase();
    $query = "UPDATE admin SET password = :password, updated_by = :updated_by,updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $value['generate_id'], 'int');
    $db->bindvalue(':password', $value['password'], 'str');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');

    $execute = $db->execute();
    
    return $execute;
}

//update user table by setting active to 0
function set_active_to_0($id)
{
    $db = new dbase();
    $query = "UPDATE admin SET active = :active WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $id, 'int');
    $db->bindvalue(':active', 0, 'int');

    $execute = $db->execute();
    
    return $execute;
}

function update_last_logout($id)
{
    

    $db = new dbase();

    $query = "";
    $query .= "UPDATE admin_statistics SET";
    $query .= " last_logout = NOW(), updated_at = NOW() WHERE admin_id = :admin_id";

    $db->prep($query);
    $db->bindvalue(':admin_id', $id, 'int');

    $execute = $db->execute();

    return $execute;
}

//update unseen user sent email to 1
function update_unseen_user_sent_email()
{
    $db = new dbase();
    $query = "UPDATE user_sent_emails SET status = 1 WHERE status = 0";
    $db->prep($query);

    $execute = $db->execute();
    
    return $execute;
}

//fetch user sent emails to be displayed in notification
function user_sent_emails_in_notification($limit=5, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM user_sent_emails ORDER BY $by DESC LIMIT $limit";
    $db->prep($query);

    $rows = $db->fetchMultiple();

    return $rows;
}

//count unseen user sent emails
function count_unseen_user_sent_emails()
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM user_sent_emails WHERE status = 0";

    $db->prep($query);


    $count = $db->fetchCol();
    
    return $count;
}

//getting all users to display in dashboard
function values_to_show_in_dashboard($table_name='users',$dashboard=1, $limit=10, $by='id')
{
    $db = new dbase();

    $query = "";

    $query .= "SELECT * FROM $table_name";
    if($dashboard == 1)
    {
        $query .= " ORDER BY $by DESC LIMIT $limit";
    }
    $db->prep($query);
    $rows = $db->fetchMultiple();
    return $rows;
}

//insert into reports table
function insert_into_reports(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO reports(report, created_by, updated_by) VALUES(:report, :created_by, :updated_by)";
    $db->prep($query);

    $db->bindvalue(':report', $value['report'], 'str');
    $db->bindvalue(':created_by', $value['created_by'], 'int');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');

    $execute = $db->execute();

    return $execute;
}

function count_report_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM reports WHERE report LIKE :report ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':report', $value['report'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_report_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM reports WHERE report LIKE :report ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':report', $value['report'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_report_b($by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM reports ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_report($offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM reports ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function delete_single_row($value, $table_name, $column_name = 'id', $type='int')
{
    

    $db = new dbase();

    $query = "DELETE FROM $table_name WHERE $column_name = :value";

    $db->prep($query);

    $db->bindvalue(':value', $value, $type);

    $execute = $db->execute();

    return $execute;
}

//update report
function update_report($value)
{
    $db = new dbase();
    $query = "UPDATE reports SET report = :report, updated_by = :updated_by, updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $value['id'], 'int');
    $db->bindvalue(':updated_by', $value['admin_id'], 'int');
    $db->bindvalue(':report', $value['report'], 'str');

    $execute = $db->execute();
    
    return $execute;
}

function count_reported_posts_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(DISTINCT(post_id)) FROM reported_posts WHERE report_id IN (SELECT id FROM reports WHERE report LIKE :report) ORDER BY created_at DESC";

    $db->prep($query);

    $db->bindvalue(':report', $value['report'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_reported_posts_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT DISTINCT post_id FROM reported_posts WHERE report_id IN (SELECT id FROM reports WHERE report LIKE :report) ORDER BY created_at DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':report', $value['report'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_reported_posts_b($by='created_at')
{
    $db = new dbase();

    $query = "SELECT COUNT(DISTINCT(post_id)) FROM reported_posts ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_reported_posts($offset, $limit, $by='created_at')
{
    $db = new dbase();

    $query = "SELECT DISTINCT post_id FROM reported_posts ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function count_rpt_abt_post_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM reported_posts WHERE report_id IN (SELECT id FROM reports WHERE report LIKE :report) AND post_id = :post_id ORDER BY created_at DESC";

    $db->prep($query);

    $db->bindvalue(':report', $value['report'], 'str');
    $db->bindvalue(':post_id', $value['post_id'], 'int');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_rpt_abt_post_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM reported_posts WHERE report_id IN (SELECT id FROM reports WHERE report LIKE :report) AND post_id = :post_id ORDER BY created_at DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':report', $value['report'], 'str');
    $db->bindvalue(':post_id', $value['post_id'], 'int');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_rpt_abt_post_b($value, $by='created_at')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM reported_posts WHERE post_id = :post_id ORDER BY $by DESC";

    $db->prep($query);

    $db->bindvalue(':post_id', $value['post_id'], 'int');


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_rpt_abt_post($value, $offset, $limit, $by='created_at')
{
    $db = new dbase();

    $query = "SELECT * FROM reported_posts WHERE post_id = :post_id ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':post_id', $value['post_id'], 'int');

    $rows = $db->fetchMultiple();

    return $rows;
}

//suspend a user's post
function suspend_user_post($id)
{
    $db = new dbase();
    $query = "UPDATE posts SET suspended = :suspended WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $id, 'int');
    $db->bindvalue(':suspended', 1, 'int');

    $execute = $db->execute();
    
    return $execute;
}

//suspend a user's post
function activate_user_post($id)
{
    $db = new dbase();
    $query = "UPDATE posts SET suspended = :suspended WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $id, 'int');
    $db->bindvalue(':suspended', 0, 'int');

    $execute = $db->execute();
    
    return $execute;
}
// End database queries


?>