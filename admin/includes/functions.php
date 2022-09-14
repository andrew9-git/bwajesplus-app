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

function encryption($string)
{
    $ciphering = "AES-128-CTR";

    $iv_length = openssl_cipher_iv_length($ciphering);

    $options = 0;

    $encryption_iv = '1234567891011121';
    
    $encryption_key = "bwajes-plus-key";

    $encryption = openssl_encrypt($string, $ciphering,$encryption_key, $options,$encryption_iv);

    return $encryption;
}

function decryption($encryption)
{
    $ciphering = "AES-128-CTR";

    $decryption_iv = '1234567891011121';
    $options = 0;

    $decryption_key = "bwajes-plus-key";
        
    // encryption will be gotten from get super global
    $decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

    return $decryption;
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
function db_row_count($value, $column_name, $table_name, $type='int', $where=1, $distinct=0)
{
    $db = new dbase();

    $query = "";
    if($distinct == 0)
    {
        $query .= "SELECT COUNT(*) FROM $table_name";
    }
    else
    {
        $query .= "SELECT COUNT(DISTINCT($column_name)) FROM $table_name";
    }
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

function count_affiliate_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM affiliate_programmes WHERE url LIKE :url OR name LIKE :name OR image LIKE :image ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':url', $value['url'], 'str');
    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':image', $value['image'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_affiliate_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM affiliate_programmes WHERE url LIKE :url OR name LIKE :name OR image LIKE :image ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':url', $value['url'], 'str');
    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':image', $value['image'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_affiliate_b($by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM affiliate_programmes ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_affiliate($offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM affiliate_programmes ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

//insert into affiliate programmes table
function insert_into_affiliate(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO affiliate_programmes(url, name, image, created_by, updated_by) VALUES(:url, :name, :image, :created_by, :updated_by)";
    $db->prep($query);

    $db->bindvalue(':url', $value['url'], 'str');
    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':image', $value['image'], 'str');
    $db->bindvalue(':created_by', $value['created_by'], 'int');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $execute = $db->execute();

    return $execute;
}

function update_affiliate($value, $update_company_photo)
{
    

    $db = new dbase();

    $query = "";
    $query .= "UPDATE affiliate_programmes SET url = :url, name = :name,";
    if($update_company_photo == 1)
    {
        $query .= " image = :image,";
    }
    $query .= " updated_by = :updated_by,";
    $query .= " updated_at = NOW() WHERE id = :id";

    $db->prep($query);

    $db->bindvalue(':url', $value['url'], 'str');
    $db->bindvalue(':name', $value['name'], 'str');
    if($update_company_photo == 1)
    {
        $db->bindvalue(':image', $value['image'], 'str');
    }
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $db->bindvalue(':id', $value['affiliate_id'], 'int');

    $execute = $db->execute();

    return $execute;
}

function count_country_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM countries WHERE country LIKE :country ORDER BY country ASC";

    $db->prep($query);

    $db->bindvalue(':country', $value['country'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_country_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM countries WHERE country LIKE :country ORDER BY country ASC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':country', $value['country'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_country_b($by='country')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM countries ORDER BY $by ASC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_country($offset, $limit, $by='country')
{
    $db = new dbase();

    $query = "SELECT * FROM countries ORDER BY $by ASC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

//insert into countries table
function insert_into_country(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO countries(country, created_by, updated_by) VALUES(:country, :created_by, :updated_by)";
    $db->prep($query);

    $db->bindvalue(':country', $value['country'], 'str');
    $db->bindvalue(':created_by', $value['created_by'], 'int');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $execute = $db->execute();

    return $execute;
}

function update_country($value)
{    

    $db = new dbase();

    $query = "UPDATE countries SET country = :country, updated_by = :updated_by, updated_at = NOW() WHERE id = :id";

    $db->prep($query);

    $db->bindvalue(':country', $value['country'], 'str');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $db->bindvalue(':id', $value['country_id'], 'int');

    $execute = $db->execute();

    return $execute;
}

function fetch_countries($by='country')
{
    $db = new dbase();

    $query = "SELECT * FROM countries ORDER BY $by ASC";

    $db->prep($query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function count_user_emails_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM user_sent_emails WHERE email LIKE :email OR department LIKE :department OR title LIKE :title OR message LIKE :message ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':email', $value['email'], 'str');
    $db->bindvalue(':department', $value['department'], 'str');
    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':message', $value['message'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_user_emails_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM user_sent_emails WHERE email LIKE :email OR department LIKE :department OR title LIKE :title OR message LIKE :message ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':email', $value['email'], 'str');
    $db->bindvalue(':department', $value['department'], 'str');
    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':message', $value['message'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_user_emails_b($by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM user_sent_emails ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_user_emails($offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM user_sent_emails ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function count_admin_emails_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM admin_sent_emails WHERE set_from_name LIKE :set_from_name OR set_from_email LIKE :set_from_email OR subject LIKE :subject OR body LIKE :body ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':set_from_name', $value['set_from_name'], 'str');
    $db->bindvalue(':set_from_email', $value['set_from_email'], 'str');
    $db->bindvalue(':subject', $value['subject'], 'str');
    $db->bindvalue(':body', $value['body'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_admin_emails_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM admin_sent_emails WHERE set_from_name LIKE :set_from_name OR set_from_email LIKE :set_from_email OR subject LIKE :subject OR body LIKE :body ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':set_from_name', $value['set_from_name'], 'str');
    $db->bindvalue(':set_from_email', $value['set_from_email'], 'str');
    $db->bindvalue(':subject', $value['subject'], 'str');
    $db->bindvalue(':body', $value['body'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_admin_emails_b($by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM admin_sent_emails ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_admin_emails($offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM admin_sent_emails ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

//insert into post category table
function insert_into_post_category(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO post_category(category, created_by, updated_by) VALUES(:category, :created_by, :updated_by)";
    $db->prep($query);

    $db->bindvalue(':category', $value['post_category'], 'str');
    $db->bindvalue(':created_by', $value['created_by'], 'int');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $execute = $db->execute();

    return $execute;
}

function count_post_category_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM post_category WHERE category LIKE :category ORDER BY category ASC";

    $db->prep($query);

    $db->bindvalue(':category', $value['category'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_post_category_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM post_category WHERE category LIKE :category ORDER BY category ASC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':category', $value['category'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_post_category_b($by='category')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM post_category ORDER BY $by ASC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_post_category($offset, $limit, $by='category')
{
    $db = new dbase();

    $query = "SELECT * FROM post_category ORDER BY $by ASC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function update_post_category($value)
{    

    $db = new dbase();

    $query = "UPDATE post_category SET category = :category, updated_by = :updated_by, updated_at = NOW() WHERE id = :id";

    $db->prep($query);

    $db->bindvalue(':category', $value['category'], 'str');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $db->bindvalue(':id', $value['category_id'], 'int');

    $execute = $db->execute();

    return $execute;
}

//insert into post type table
function insert_into_post_type(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO post_type(type, created_by, updated_by) VALUES(:type, :created_by, :updated_by)";
    $db->prep($query);

    $db->bindvalue(':type', $value['post_type'], 'str');
    $db->bindvalue(':created_by', $value['created_by'], 'int');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $execute = $db->execute();

    return $execute;
}

function count_post_type_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM post_type WHERE type LIKE :type ORDER BY type ASC";

    $db->prep($query);

    $db->bindvalue(':type', $value['type'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_post_type_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM post_type WHERE type LIKE :type ORDER BY type ASC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':type', $value['type'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_post_type_b($by='type')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM post_type ORDER BY $by ASC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_post_type($offset, $limit, $by='type')
{
    $db = new dbase();

    $query = "SELECT * FROM post_type ORDER BY $by ASC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function update_post_type($value)
{    

    $db = new dbase();

    $query = "UPDATE post_type SET type = :type, updated_by = :updated_by, updated_at = NOW() WHERE id = :id";

    $db->prep($query);

    $db->bindvalue(':type', $value['type'], 'str');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');
    $db->bindvalue(':id', $value['type_id'], 'int');

    $execute = $db->execute();

    return $execute;
}

//insert into legal table
function insert_into_legal(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO legal(name, content, created_by, updated_by) VALUES(:name, :content, :created_by, :updated_by)";
    $db->prep($query);

    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':content', $value['content'], 'str');
    $db->bindvalue(':created_by', $value['created_by'], 'int');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');

    $execute = $db->execute();

    return $execute;
}

function count_legal_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM legal WHERE name LIKE :name OR content LIKE :content ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':content', $value['content'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_legal_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM legal WHERE name LIKE :name OR content LIKE :content ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':content', $value['content'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_legal_b($by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM legal ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_legal($offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM legal ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

//update legal table
function update_legal($value)
{
    $db = new dbase();
    $query = "UPDATE legal SET name = :name, content = :content, updated_by = :updated_by, updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $value['id'], 'int');
    $db->bindvalue(':name', $value['name'], 'str');
    $db->bindvalue(':content', $value['content'], 'str');
    $db->bindvalue(':updated_by', $value['updated_by'], 'int');

    $execute = $db->execute();
    
    return $execute;
}

//generating email track code
function email_track_code()
{
    $code = md5(rand());

    $count = db_row_count($code, 'email_track_code', 'email_tracking', 'str');

    if($count > 0)
    {
        email_track_code();
    }
    else
    {
        return $code;
    }
}

//inserting values into admin sent emails table
function insert_into_admin_sent_emails(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO admin_sent_emails(set_from_name, set_from_email, subject, body, admin_id) VALUES(:set_from_name, :set_from_email, :subject, :body, :admin_id)";
    $db->prep($query);

    $db->bindvalue(':set_from_name', $value['set_from_name'], 'str');
    $db->bindvalue(':set_from_email', $value['set_from_email'], 'str');
    $db->bindvalue(':subject', $value['subject'], 'str');
    $db->bindvalue(':body', $value['body'], 'str');
    $db->bindvalue(':admin_id', $value['admin_id'], 'int');

    $lastId = $db->lastId();

    return $lastId;
}

//getting all admin types
function select_distinct_emails($table_name)
{
    $db = new dbase();

    if($table_name == "subscriber_list")
    {
        $query = "SELECT DISTINCT email FROM $table_name WHERE unsubscribed = 0";
    }
    else
    {
        $query = "SELECT DISTINCT email, first_name FROM $table_name WHERE unsubscribed = 0";
    }

    $db->prep($query);
    $rows = $db->fetchMultiple();
    return $rows;
}

//inserting values into email tracking table
function insert_into_email_tracking(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO email_tracking(admin_sent_emails_id, sent_to_email, email_track_code) VALUES(:admin_sent_emails_id, :sent_to_email, :email_track_code)";
    $db->prep($query);

    $db->bindvalue(':admin_sent_emails_id', $value['admin_sent_emails_id'], 'int');
    $db->bindvalue(':sent_to_email', $value['sent_to_email'], 'str');
    $db->bindvalue(':email_track_code', $value['email_track_code'], 'str');

    $execute = $db->execute();

    return $execute;
}

function count_open_rates_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(DISTINCT(sent_to_email)) FROM email_tracking WHERE sent_to_email LIKE :sent_to_email ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':sent_to_email', $value['email'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_open_rates_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT id, sent_to_email as email, COUNT(sent_to_email) as no_of_mails_recieved, (SELECT COUNT(sent_to_email) FROM email_tracking WHERE sent_to_email = email AND email_status = 1) as no_of_mails_opened FROM email_tracking WHERE sent_to_email LIKE :sent_to_email GROUP BY sent_to_email ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':sent_to_email', $value['email'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_open_rates_b($by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(DISTINCT(sent_to_email)) FROM email_tracking ORDER BY $by DESC";

    $db->prep($query);


    $total_data = $db->fetchCol();

    return $total_data;
}

function search_open_rates($offset, $limit, $by='id')
{
    $db = new dbase();
    
    $query = "SELECT id, sent_to_email as email, COUNT(sent_to_email) as no_of_mails_recieved, (SELECT COUNT(sent_to_email) FROM email_tracking WHERE email_status = 1 AND sent_to_email = email) as no_of_mails_opened FROM email_tracking GROUP BY sent_to_email ORDER BY id DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function no_of_users_that_opened_mail($admin_sent_emails_id)
{
    $db = new dbase();

  
    $query = "SELECT COUNT(*) FROM email_tracking WHERE admin_sent_emails_id = :admin_sent_emails_id AND email_status = 1";

    $db->prep($query);

    $db->bindvalue(':admin_sent_emails_id', $admin_sent_emails_id, 'int');

    $count = $db->fetchCol();
    return $count;
}

function count_mails_recieved_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM email_tracking WHERE admin_sent_emails_id IN (SELECT id FROM admin_sent_emails WHERE subject LIKE :subject OR body LIKE :body) AND sent_to_email = :sent_to_email ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':sent_to_email', $value['email'], 'str');
    $db->bindvalue(':subject', $value['subject'], 'str');
    $db->bindvalue(':body', $value['body'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_mails_recieved_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM email_tracking WHERE admin_sent_emails_id IN (SELECT id FROM admin_sent_emails WHERE subject LIKE :subject OR body LIKE :body) AND sent_to_email = :sent_to_email ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':sent_to_email', $value['email'], 'str');
    $db->bindvalue(':subject', $value['subject'], 'str');
    $db->bindvalue(':body', $value['body'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_mails_recieved_b($value, $by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM email_tracking WHERE sent_to_email = :sent_to_email ORDER BY $by DESC";

    $db->prep($query);
    $db->bindvalue(':sent_to_email', $value, 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_mails_recieved($value, $offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM email_tracking WHERE sent_to_email = :sent_to_email ORDER BY $by DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);
    $db->bindvalue(':sent_to_email', $value, 'str');
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_mail_opened_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM email_tracking WHERE admin_sent_emails_id = :admin_sent_emails_id AND email_status = 1 AND sent_to_email LIKE :sent_to_email ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':admin_sent_emails_id', $value['mail_opened_id'], 'int');
    $db->bindvalue(':sent_to_email', $value['email'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_mail_opened_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM email_tracking WHERE admin_sent_emails_id = :admin_sent_emails_id AND email_status = 1 AND sent_to_email LIKE :sent_to_email ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':admin_sent_emails_id', $value['mail_opened_id'], 'int');
    $db->bindvalue(':sent_to_email', $value['email'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

function count_mail_opened_b($value, $by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM email_tracking WHERE admin_sent_emails_id = :admin_sent_emails_id AND email_status = 1 ORDER BY $by DESC";

    $db->prep($query);

    $db->bindvalue(':admin_sent_emails_id', $value, 'int');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_mail_opened($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT * FROM email_tracking WHERE admin_sent_emails_id = :admin_sent_emails_id AND email_status = 1 ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':admin_sent_emails_id', $value, 'int');
    
    $rows = $db->fetchMultiple();

    return $rows;
}

// End database queries


?>