<?php

include('includes/header.php');
bwajes_plus_header('all-users', 'User');
$host = url()[0];
?>
<?php
    if(isset($_GET['u']))
    {
        $get_user_id = $_GET['u'];
        $user_info = fetch_single_row($get_user_id, 'users');
    }
    else
    {
      redirect_to('logout');
    }

    $id = $_SESSION['bwajes_plus_admin_data']['id'];
    $admin = fetch_single_row($id, 'admin');
?>
<div class="home-content">
      <div class="post-area">
      <?php 
        if($admin['suspended'] != 1)
        {
      ?>
        <div class="card">
            <div class="card-header">
                <div class="info-container">
                    <span class="btn btn-success back" id="back">back</span>
                    <!-- <a href="<?php //echo $host."all-users" ?>" class="btn btn-success back" id="back">back</a> -->
                </div>
                <!-- Using if statement to show either suspend or activate button
                and it's only super admin that should be able to delete user -->
                <?php if($user_info['suspended'] == 0){ ?>
                <span style="cursor: pointer;" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this user?')){document.getElementById('form-suspend-<?php echo $get_user_id; ?>').submit();}">suspend</span><?php } ?>
                <?php if($user_info['suspended'] == 1){ ?><span style="cursor: pointer;" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this user?')){document.getElementById('form-activate-<?php echo $get_user_id; ?>').submit();}">activate</span> 
                <?php } ?> <?php if($admin['admin_type'] == 1){ ?>| <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this user?')){document.getElementById('form-delete-<?php echo $get_user_id; ?>').submit();}"><i class="bx bx-trash"></i></a>
                <?php } ?>
                <form method="post" action="<?php echo $host . 'user/' . $get_user_id; ?>" style="display: none;" id="form-suspend-<?php echo $get_user_id; ?>">
                <input type="hidden" value="<?php echo $get_user_id; ?>" name="suspend-user">
                </form>
                <form method="post" action="<?php echo $host . 'user/' . $get_user_id; ?>" style="display: none;" id="form-activate-<?php echo $get_user_id; ?>">
                    <input type="hidden" value="<?php echo $get_user_id; ?>" name="activate-user">
                </form>
                <form method="post" action="<?php echo $host . 'user/' . $get_user_id; ?>" style="display: none;" id="form-delete-<?php echo $get_user_id; ?>">
                    <input type="hidden" value="<?php echo $get_user_id; ?>" name="delete-user">
                </form>
            </div>
            <div class="card-body">
                <div style="line-height: 1.625rem; margin: 10px;">
                    <h4>First Name:</h4>
                    <div>
                        <?php if(isset($user_info['first_name'])){echo $user_info['first_name'];} ?>
                    </div>
                    <h4>Last Name:</h4>
                    <div>
                        <?php if(isset($user_info['last_name'])){echo $user_info['last_name'];} ?>
                    </div>
                    <h4>Email:</h4>
                    <div>
                        <?php if(isset($user_info['email'])){echo $user_info['email'];} ?>
                    </div>
                    <h4>Business name:</h4>
                    <div>
                        <?php if(isset($user_info['business_name'])){echo $user_info['business_name'];} ?>
                    </div>
                    <h4>Gender:</h4>
                    <div>
                        <?php if(isset($user_info['gender'])){
                            if($user_info['gender'] == "M")
                            {
                                echo "Male";
                            }
                            elseif($user_info['gender'] == "F")
                            {
                                echo "Female";
                            }
                            elseif($user_info['gender'] == "N")
                            {
                                echo "Chose not to say";
                            }
                        
                        }?>
                    </div>
                    <h4>Phone:</h4>
                    <div>
                        <?php if(isset($user_info['phone'])){echo $user_info['phone'];} ?>
                    </div>
                    <h4>Bio:</h4>
                    <div>
                        <?php if(isset($user_info['bio'])){echo $user_info['bio'];} ?>
                    </div>
                    <h4>Website:</h4>
                    <div>
                        <?php if(isset($user_info['website'])){echo $user_info['website'];} ?>
                    </div>
                    <h4>Age:</h4>
                    <div>
                        <?php if(isset($user_info['birthdate'])){
                            $date1 = new DateTime($user_info['birthdate']);
                            $date2 = new DateTime(date('Y-m-d'));
                            $interval = $date1->diff($date2);
                            $years = $interval->y;
                    
                            if($years > 1)
                            {
                                $age = $years . " years old";
                            }
                            else
                            {
                                $age = $years . " year old";
                            }
                            echo $age;
                        } ?>
                    </div>
                    <h4>Address:</h4>
                    <div>
                        <?php if(isset($user_info['address'])){echo "<address>".$user_info['address']. "</address>";} ?>
                    </div>
                    <h4>City:</h4>
                    <div>
                        <?php if(isset($user_info['city'])){echo $user_info['city'];} ?>
                    </div>
                    <h4>State:</h4>
                    <div>
                        <?php if(isset($user_info['state'])){echo $user_info['state'];} ?>
                    </div>
                    <h4>Country:</h4>
                    <div>
                        <?php if(isset($user_info['country'])){echo fetch_single_row($user_info['country'], 'countries')['country'];} ?>
                    </div>
                    <h4>Date registered:</h4>
                    <div>
                        <?php if(isset($user_info['created_at'])){echo date("F jS, Y", strtotime($user_info['created_at']));} ?>
                    </div>
                    <h4>Date updated:</h4>
                    <div>
                        <?php if(isset($user_info['updated_at'])){echo date("F jS, Y", strtotime($user_info['updated_at']));} ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo $host .'posts/'. $user_info['id']; ?>" class="btn btn-primary">see posts</a> 
            </div>
        </div>
        <?php }
        else
        {
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">Your account has been suspended</h4>
            </div>
            <div class="card-body" style="display: flex;justify-content:center;align-items:center;">
                <div class="ad-removal">
                    For more information, or if you think your account was suspended by mistake, please contact the organisation
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
        <?php } ?>
      </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('back').addEventListener('click', (e) => {
                e.preventDefault();
                window.history.back();
            });
        });
    </script>
    <?php
      if(isset($_POST['suspend-user']))
      {
        $get_user_id = $_POST['suspend-user'];
        $executed = suspend_user($get_user_id);
        if($executed)
        {
          $url = $host . 'user/' . $get_user_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['activate-user']))
      {
        $get_user_id = $_POST['activate-user'];
        $executed = activate_user($get_user_id);
        if($executed)
        {
          $url = $host . 'user/' . $get_user_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['delete-user']))
      {
        $delete_id         = $_POST['delete-user'];
        $delete_first_name = $user_info['first_name'];
        $delete_last_name  = $user_info['last_name'];
        $delete_email      = $user_info['email'];
        $delete_gender     = $user_info['gender'];
    
        $phone      = $user_info['phone'];
        $website    = $user_info['website'];
        $birth_date = $user_info['birthdate'];
        $address    = $user_info['address'];
        $city       = $user_info['city'];
        $state      = $user_info['state'];
        $country    = $user_info['country'];
    
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
    
                    $user_posts = fetch_all_posts($delete_id);
    
                    foreach($user_posts as $post)
                    {
                        $filename = '../cover_photos/' . $post['cover_photo'];
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
                        $filename = '../profile_images/' . $user_profile_image;
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
                                    $url = $host . 'all-users';
                                    redirect_to($url);
                            
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
                                $url = $host . 'all-users';
                                redirect_to($url);
                        
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
                            $url = $host . 'all-users';
                            redirect_to($url);
                    
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

        // $get_user_id = $_POST['delete-user'];
        // $executed = delete_single_row($get_user_id, 'users');
        // if($executed)
        // {
        //   $url = $host . 'all-users';
        //   redirect_to($url);
        // }
      }
    ?>
<?php

    include('includes/footer.php');
    ckeditor();

?>