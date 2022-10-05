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
    $host='http://localhost:9090/bwajesplus-app/';
    $host1='http://localhost:9090/bwajes/';
    $host2='http://localhost:9090/andadel/';
    return array($host, $host1, $host2);
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
function user_is_logged_in()
{
    if(isset($_SESSION['is_bwajes_plus_user_logged_in']))
    {
        return true;
    }
    return false;
}

function check_inactive_user($last_login_timestamp, $duration, $url='http://localhost:9090/bwajesplus-app/logout')
{
    // global $last_login_timestamp;

    if((time() - $last_login_timestamp) > $duration)
    {
        // $msg = 'Session time out. Please login';
        // set_msg($msg);
        header("Location: {$url}");
    }
    else
    {
        // global $last_login_timestamp;
        $last_login_timestamp = time();
    }
}

//afiliate programmes rotation for registered and non-registered users
function afiliate_programmes_rotation()
{
    $display = '';

    $db = new dbase();

    //if user wants to advertise product to other users

    // $query = "SELECT * FROM affiliate_programmes WHERE NOW() < expires AND shown = 0 ORDER BY id ASC LIMIT 1";

    $query = "SELECT * FROM affiliate_programmes WHERE shown = :shown ORDER BY id ASC LIMIT 1";

    $db->prep($query);
    $db->bindvalue(':shown', 0, 'int');
    $afiliate_programme = $db->fetchSingle();

    if($afiliate_programme)
    {
        $id    = $afiliate_programme['id'];
        $url   = $afiliate_programme['url'];
        $image = $afiliate_programme['image'];

        //the url can first be a php page with query string to check the number of times an affiliate link has been clicked

        $display .= '<a href="'. $url .'" target="_blank"><img src="'.url()[0].'images/'. $image .'"></a>';

        //if you want to track impressions

        // $query = "UPDATE affiliate_programmes SET shown = :shown, impression = impression + 1 WHERE id = :id";

        $query = "UPDATE affiliate_programmes SET shown = :shown WHERE id = :id";

        $db->prep($query);
        $db->bindvalue(':shown', 1, 'int');
        $db->bindvalue(':id', $id, 'int');
        $executed = $db->execute();

        if($executed)
        {
            $count = db_row_count(0, 'shown', 'affiliate_programmes', 'int');

            if($count == 0)
            {
                $query = "UPDATE affiliate_programmes SET shown = :shown";

                $db->prep($query);
                $db->bindvalue(':shown', 0, 'int');
                $executed = $db->execute();
            }
        }
    }

    return $display;

}

function afiliate_programme_codes_wrapper($id)
{
  $row = fetch_single_row_in_payment($id, 'user_id');
  if(isset($row['end_date']))
  {
    $end_date = date('Y-m-d H:i:s', strtotime($row['end_date']));
    //if subcription has expired
    if(date('Y-m-d H:i:s') >= $end_date)
    {
        $display = afiliate_programmes_rotation();
        echo '<div class="ShowHide" id="Bar">
        <div id="left">'.$display.'</div>
        <div id="right">
            <a href="#" id="hide-times">X</a>
        </div>
        </div>';
    }
  }
  else
  {
    $count = db_row_count($id, 'user_id', 'payment_subscriptions', 'int');
    //if there is no payment history
    if($count <= 0)
    {
        $display = afiliate_programmes_rotation();
        echo '<div class="ShowHide" id="Bar">
        <div id="left">'.$display.'</div>
        <div id="right">
            <a href="#" id="hide-times">X</a>
        </div>
        </div>';
    }
  }
}

//progess bar for tracking user's profile
function profile_progress($id)
{
  $count = 0;
  $user = fetch_single_row($id, 'users');

  $profile_image = $user['profile_image'];
  $phone         = $user['phone'];
  $bio           = $user['bio'];
  $website       = $user['website'];
  $birthdate     = $user['birthdate'];
  $address       = $user['address'];
  $city          = $user['city'];
  $state         = $user['state'];
  $country       = $user['country'];

  if(!empty($profile_image) || $profile_image != NULL || $profile_image != '')
  {
    $count += 1;
  }

  if(!empty($phone) || $phone != NULL || $phone != '')
  {
    $count += 1;
  }

  if(!empty($bio) || $bio != NULL || $bio != '')
  {
    $count += 1;
  }

  if(!empty($website) || $website != NULL || $website != '')
  {
    $count += 1;
  }

  if(!empty($birthdate) || $birthdate != NULL || $birthdate != '')
  {
    $count += 1;
  }

  if(!empty($address) || $address != NULL || $address != '')
  {
    $count += 1;
  }

  if(!empty($city) || $city != NULL || $city != '')
  {
    $count += 1;
  }

  if(!empty($state) || $state != NULL || $state != '')
  {
    $count += 1;
  }

  if(!empty($country) || $country != NULL || $country != '')
  {
    $count += 1;
  }

  $count = round((($count+5)/14)*100);

  $progress = '<div class="profile-progress">Your profile is '.$count.'% completed<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: '.$count.'%" aria-valuenow="'.$count.'" aria-valuemin="0" aria-valuemax="100"></div>
  </div></div>';
  return array($count, $progress);
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
    
    if(strlen($value) < $min  && strlen($value) > $max)
    {
        return false; 
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
//inclusion in a set
function found_in($value, array $set, $msg='This is file type is not valid')
{
    
    if(!in_array($value, $set))
    {
        return false;  
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
        return false;  
    }
    else
    {
        return true;
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

//validate checkbox field
function is_checked($value)
{
    
    if(empty($value))
    {
        return false; 
    }
    else
    {
        return true;
    }
}

//validate token
function csrf_is_valid($session_csrf, $post_csrf)
{
    
    if (hash_equals($_SESSION['csrf'], $post_csrf) === false)
    {
        return false;
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
function db_row_count($value, $column_name, $table_name, $type='str')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM $table_name WHERE $column_name = :value";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $count = $db->fetchCol();
    return $count;
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

function update_last_logout($id)
{
    

    $db = new dbase();

    $query = "";
    $query .= "UPDATE user_statistics SET";
    $query .= " last_logout = NOW(), updated_at = NOW() WHERE user_id = :user_id";

    $db->prep($query);
    $db->bindvalue(':user_id', $id, 'int');

    $execute = $db->execute();

    return $execute;
}

//update user table by setting active to 0
function set_active_to_0($id)
{
    $db = new dbase();
    $query = "UPDATE users SET active = :active WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $id, 'int');
    $db->bindvalue(':active', 0, 'int');

    $execute = $db->execute();
    
    return $execute;
}

//getting all posts to display in dashboard
function posts_to_show_in_dashboard($id, $dashboard=1, $limit=10, $by='updated_at')
{
    $db = new dbase();

    $query = "";

    $query .= "SELECT * FROM posts WHERE user_id = :id";
    if($dashboard == 1)
    {
        $query .= " ORDER BY $by DESC LIMIT $limit";
    }
    $db->prep($query);
    $db->bindvalue(':id', $id, 'int');
    $rows = $db->fetchMultiple();
    return $rows;
}

//getting all post categories
function post_category()
{
    $db = new dbase();

    $query = "SELECT * FROM post_category";
    $db->prep($query);
    $rows = $db->fetchMultiple();
    return $rows;
}

//getting all post types
function post_type()
{
    $db = new dbase();

    $query = "SELECT * FROM post_type";
    $db->prep($query);
    $rows = $db->fetchMultiple();
    return $rows;
}

//insert into posts table
function insert_into_posts(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO posts(title, description, post, cover_photo, user_id, category_id, type_id, published) VALUES(:title, :description, :post, :cover_photo, :user_id, :category_id, :type_id, :published)";
    $db->prep($query);

    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':description', $value['description'], 'str');
    $db->bindvalue(':post', $value['post'], 'str');
    $db->bindvalue(':cover_photo', $value['cover_photo'], 'str');
    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':category_id', $value['category_id'], 'int');
    $db->bindvalue(':type_id', $value['type_id'], 'int');
    $db->bindvalue(':published', $value['published'], 'int');

    $execute = $db->execute();

    return $execute;
}

function update_posts($value, $update_cover_photo)
{
    

    $db = new dbase();

    $query = "";
    $query .= "UPDATE posts SET title = :title, description = :description, post = :post,";
    if($update_cover_photo == 1)
    {
        $query .= " cover_photo = :cover_photo,";
    }
    $query .= " category_id = :category_id, type_id = :type_id, published = :published,";
    $query .= " updated_at = NOW() WHERE id = :id";

    $db->prep($query);
    $db->bindvalue(':id', $value['id'], 'int');
    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':description', $value['description'], 'str');
    $db->bindvalue(':post', $value['post'], 'str');
    if($update_cover_photo == 1)
    {
        $db->bindvalue(':cover_photo', $value['cover_photo'], 'str');
    }
    $db->bindvalue(':category_id', $value['category_id'], 'int');
    $db->bindvalue(':type_id', $value['type_id'], 'int');
    $db->bindvalue(':published', $value['published'], 'int');

    $execute = $db->execute();

    return $execute;
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

function count_post_a($value)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM posts WHERE (title LIKE :title 
    OR description LIKE :description OR category_id IN (SELECT id FROM post_category WHERE category LIKE :category) OR type_id IN (SELECT id FROM post_type WHERE type LIKE :type)) AND user_id = :user_id ORDER BY id DESC";

    $db->prep($query);

    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':description', $value['description'], 'str');
    $db->bindvalue(':category', $value['category'], 'str');
    $db->bindvalue(':type', $value['type'], 'str');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_post_with_wildcard($value, $offset, $limit)
{
    $db = new dbase();

    $query = "SELECT id, title, description 
    FROM posts WHERE (title LIKE :title 
    OR description LIKE :description OR category_id IN (SELECT id FROM post_category WHERE category LIKE :category) OR type_id IN (SELECT id FROM post_type WHERE type LIKE :type)) AND user_id = :user_id ORDER BY id DESC";

    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':description', $value['description'], 'str');
    $db->bindvalue(':category', $value['category'], 'str');
    $db->bindvalue(':type', $value['type'], 'str');
    
    $rows = $db->fetchMultiple();

    return $rows;
}


function count_post_b($id, $by='id')
{
    $db = new dbase();

    $query = "SELECT COUNT(*) description FROM posts WHERE user_id = :user_id ORDER BY $by DESC";

    $db->prep($query);

    $db->bindvalue(':user_id', $id, 'int');

    $total_data = $db->fetchCol();

    return $total_data;
}

function search_post($id, $offset, $limit, $by='id')
{
    $db = new dbase();

    $query = "SELECT id, title, description FROM posts WHERE user_id = :user_id ORDER BY $by DESC";
    
    $filter_query = $query . " LIMIT " . $offset . ", " . $limit . "";

    $db->prep($filter_query);

    $db->bindvalue(':user_id', $id, 'int');

    $rows = $db->fetchMultiple();

    return $rows;
}

//insert into user sent emails table
function user_sent_emails(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO user_sent_emails(user_id, email, department, title, message) VALUES(:user_id, :email, :department, :title, :message)";
    $db->prep($query);

    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':email', $value['email'], 'str');
    $db->bindvalue(':department', $value['department'], 'str');
    $db->bindvalue(':title', $value['title'], 'str');
    $db->bindvalue(':message', $value['message'], 'str');

    $execute = $db->execute();

    return $execute;
}

//insert into ratings table
function ratings(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO ratings(user_id, rating, reason, suggestion) VALUES(:user_id, :rating, :reason, :suggestion)";
    $db->prep($query);

    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':rating', $value['rating'], 'str');
    $db->bindvalue(':reason', $value['reason'], 'str');
    $db->bindvalue(':suggestion', $value['suggestion'], 'str');

    $execute = $db->execute();

    return $execute;
}

//update user table
function update_user($value)
{
    $db = new dbase();
    $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, business_name = :business_name, gender = :gender, phone = :phone, bio = :bio, public = :public, website = :website, birthdate = :birthdate, address = :address, city = :city, state = :state, country = :country, updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $value['id'], 'int');
    $db->bindvalue(':first_name', $value['first_name'], 'str');
    $db->bindvalue(':last_name', $value['last_name'], 'str');
    $db->bindvalue(':business_name', $value['business_name'], 'str');
    $db->bindvalue(':gender', $value['gender'], 'str');
    $db->bindvalue(':phone', $value['phone'], 'str');
    $db->bindvalue(':bio', $value['bio'], 'str');
    $db->bindvalue(':public', $value['public'], 'int');
    $db->bindvalue(':website', $value['website'], 'str');
    $db->bindvalue(':birthdate', $value['birthdate'], 'str');
    $db->bindvalue(':address', $value['address'], 'str');
    $db->bindvalue(':city', $value['city'], 'str');
    $db->bindvalue(':state', $value['state'], 'str');
    $db->bindvalue(':country', $value['country'], 'str');

    $execute = $db->execute();
    
    return $execute;
}

//update user's profile image
function update_user_profile_image($value)
{
    $db = new dbase();
    $query = "UPDATE users SET profile_image = :profile_image, updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $value['id'], 'int');
    $db->bindvalue(':profile_image', $value['profile_image'], 'str');

    $execute = $db->execute();
    
    return $execute;
}

//getting all rows of a specific user in passwords table
function fetch_rows_in_passwords($email)
{
    $db = new dbase();

    $query = "SELECT * FROM user_passwords WHERE email = :email";
    $db->prep($query);
    $db->bindvalue(':email', $email, 'str');
    $rows = $db->fetchMultiple();
    return $rows;
}

//update user's password
function update_user_password($value)
{
    $db = new dbase();
    $query = "UPDATE users SET password = :password, updated_at = NOW() WHERE id = :id";
    $db->prep($query);

    $db->bindvalue(':id', $value['id'], 'int');
    $db->bindvalue(':password', $value['password'], 'str');

    $execute = $db->execute();
    
    return $execute;
}

function insert_into_user_passwords(array $value)
{
    

    $db = new dbase();

    $query = "INSERT INTO user_passwords(email, password) VALUES(:email, :password)";
    $db->prep($query);

    $db->bindvalue(':email', $value[0], 'str');
    $db->bindvalue(':password', $value[1], 'str');

    $execute = $db->execute();

    return $execute;
}

//insert into deleted users table
function deleted_users(array $value)
{
    $db = new dbase();

    $query = "INSERT INTO deleted_users(user_id, first_name, last_name, email, gender, phone, website, birthdate, address, city, state, country) VALUES(:user_id, :first_name, :last_name, :email, :gender, :phone, :website, :birthdate, :address, :city, :state, :country)";
    $db->prep($query);

    $db->bindvalue(':user_id', $value['user_id'], 'int');
    $db->bindvalue(':first_name', $value['first_name'], 'str');
    $db->bindvalue(':last_name', $value['last_name'], 'str');
    $db->bindvalue(':email', $value['email'], 'str');
    $db->bindvalue(':gender', $value['gender'], 'str');
    $db->bindvalue(':phone', $value['phone'], 'str');
    $db->bindvalue(':website', $value['website'], 'str');
    $db->bindvalue(':birthdate', $value['birthdate'], 'str');
    $db->bindvalue(':address', $value['address'], 'str');
    $db->bindvalue(':city', $value['city'], 'str');
    $db->bindvalue(':state', $value['state'], 'str');
    $db->bindvalue(':country', $value['country'], 'int');

    $execute = $db->execute();

    return $execute;
}

//update unseen comment to 1
function update_unseen_comment($id)
{
    $db = new dbase();
    $query = "UPDATE comments SET status = 1 WHERE user_id = :user_id AND status = 0";
    $db->prep($query);

    $db->bindvalue(':user_id', $id, 'int');

    $execute = $db->execute();
    
    return $execute;
}

//fetch comments to be displayed in notification
function comments_in_notification($id, $limit=5, $by='id')
{
    $db = new dbase();

    $query = "SELECT * FROM comments WHERE user_id = :user_id ORDER BY $by DESC LIMIT $limit";
    $db->prep($query);
    $db->bindvalue(':user_id', $id, 'int');

    $rows = $db->fetchMultiple();

    return $rows;
}

//count unseen comments
function count_unseen_comments($id)
{
    $db = new dbase();

    $query = "SELECT COUNT(*) FROM comments WHERE status = 0 AND user_id = :user_id";

    $db->prep($query);

    $db->bindvalue(':user_id', $id, 'int');

    $count = $db->fetchCol();
    
    return $count;
}

//getting a single row in payment table
function fetch_single_row_in_payment($value, $column_name = 'id', $type='int', $by='id', $order='DESC', $limit=1)
{
    $db = new dbase();

    $query = "SELECT * FROM payment_subscriptions WHERE $column_name = :value ORDER BY $by $order LIMIT $limit";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $row = $db->fetchSingle();
    return $row;
}

function fetch_countries($by='country')
{
    $db = new dbase();

    $query = "SELECT * FROM countries ORDER BY $by ASC";

    $db->prep($query);

    $rows = $db->fetchMultiple();

    return $rows;
}

function delete_from_email_list($email, $source)
{
    $db = new dbase();

    $query = "DELETE FROM email_list WHERE email = :email AND source = $source";

    $db->prep($query);

    $db->bindvalue(':email', $email, 'str');

    $execute = $db->execute();

    return $execute;
}

//getting a single row in payment subscriptions table
function active_subscription($value, $column_name = 'user_id', $type='int')
{
    $db = new dbase();

    $query = "SELECT * FROM payment_subscriptions WHERE $column_name = :value ORDER BY id DESC LIMIT 1";
    $db->prep($query);
    $db->bindvalue(':value', $value, $type);
    $row = $db->fetchSingle();
    return $row;
}
// End database queries
?>