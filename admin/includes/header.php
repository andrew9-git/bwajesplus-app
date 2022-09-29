<?php
ob_start();
session_start();
include_once('includes/functions.php');
$csrf = csrf_token();
function bwajes_plus_header($active, $page_name)
{

  $host  = url()[0];
  $host1 = url()[1];

  $id = $_SESSION['bwajes_plus_admin_data']['id'];
  $first_name = $_SESSION['bwajes_plus_admin_data']['first_name'];
  $last_name = $_SESSION['bwajes_plus_admin_data']['last_name'];
  $username = $_SESSION['bwajes_plus_admin_data']['username'];
  $duration = 3600; // 1 hour 

  $admin = fetch_single_row($id, 'admin');
  
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="copyright" content="Andadel">
    <meta name="robots" content="noindex, nofollow">
    <title>bwajes+</title>
    <link rel="icon" type="image/x-icon" href="<?php echo $host1 .'images/bwajes_plus.png'; ?>">
    <link rel="stylesheet" href="<?php echo $host1 .'assets/css/style.css'; ?>">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo $host1 .'ckeditor/ckeditor.js'; ?>"></script>
</head>
<body>
  <div class="sidebar admin">
    <div class="logo-details">
      <i><img src="<?php echo $host1 .'images/bwajes_plus.png'; ?>" class="bwajes"></i>
      <span class="logo_name">bwajes+</span>
    </div>
      <ul class="nav-links">
        <li>
            <a <?php if($active === 'dashboard')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'dashboard"';
                } ?>>
                <i class='bx bxs-dashboard'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
          <div class="icon-links">
            <div class="div-arrow">
              <i class="bx bxs-report arrow"></i>
              <a href="#" class="no-action">
                <span class="links_name arrow">Reports</span>
              </a>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </div>
          </div>
          <ul class="sub-menu">
            <li>
                <a <?php if($active === 'create-report')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'create-report"';
                } ?>>
                <i class='bx bx-pencil'></i>
                <span class="links_name">Create report</span>
                </a>
            </li>
            <li>
              <a <?php if($active === 'reported-posts')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'reported-posts"';
                } ?>>
                <i class='bx bx-book-alt'></i>
                <span class="links_name">Reported posts</span>
                </a>
            </li>
          </ul>
        </li>
        <li>
          <div class="icon-links">
            <a <?php if($active === 'all-affiliates')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'all-affiliates"';
                } ?>>
                <i class='bx bxs-business'></i>
                <span class="links_name">Affiliate</span>
            </a>
          </div>
        </li>
        <li>
          <div class="icon-links">
            <a <?php if($active === 'all-countries')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'all-countries"';
                } ?>>
                <i class='bx bx-home'></i>
                <span class="links_name">Countries</span>
            </a>
          </div>
        </li>
        <li>
          <div class="icon-links">
            <div class="div-arrow">
              <i class="bx bx-support arrow"></i>
              <a href="#" class="no-action">
                <span class="links_name arrow">Messages</span>
              </a>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </div>
          </div>
          <ul class="sub-menu">
            <li>
                <a <?php if($active === 'admin-sent-emails')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'admin-sent-emails"';
                } ?>>
                <i class='bx bxs-send'></i>
                <span class="links_name">Admin sent emails</span>
                </a>
            </li>
            <li>
                <a <?php if($active === 'user-sent-emails')
                {
                  echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'user-sent-emails"';
                } ?>>
                <i class='bx bx-mail-send'></i>
                <span class="links_name">User sent emails</span>
                </a>
            </li>
          </ul>
        </li>
        <li>
          <div class="icon-links">
            <div class="div-arrow">
              <i class="bx bx-paper-plane arrow"></i>
              <a href="#" class="no-action">
                <span class="links_name arrow">Post</span>
              </a>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </div>
          </div>
          <ul class="sub-menu">
            <li>
                <a <?php if($active === 'post-category')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'post-category"';
                } ?>>
                <i class='bx bx-category'></i>
                <span class="links_name">Category</span>
                </a>
            </li>
            <li>
                <a <?php if($active === 'post-type')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'post-type"';
                } ?>>
                <i class='bx bx-spreadsheet'></i>
                <span class="links_name">Type</span>
                </a>
            </li>
          </ul>
        </li>
        <?php if($admin['admin_type'] == 1){ ?>
        <li>
            <div class="icon-links">
                <a <?php if($active === 'legal')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'legal"';
                } ?>>
                <i class='bx bxs-graduation'></i>
                <span class="links_name">Legal</span>
                </a>
            </div>
        </li>
        <?php } ?>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'post-master')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'post-master"';
                } ?>>
                <i class='bx bx-message-rounded'></i>
                <span class="links_name">Post master</span>
                </a>
          </div>
      </li>
        <li>
          <div class="icon-links">
            <div class="div-arrow">
              <i class="bx bx-stats arrow"></i>
              <a href="#" class="no-action">
                <span class="links_name arrow">Statistics</span>
              </a>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </div>
          </div>
          <ul class="sub-menu">
            <li>
                <a <?php if($active === 'posts-statistics')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'posts-statistics"';
                } ?>>
                <i class='bx bx-stats'></i>
                <span class="links_name">Posts statistics</span>
                </a>
            </li>
            <li>
                <a <?php if($active === 'users-statistics')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'users-statistics"';
                } ?>>
                <i class='bx bx-stats'></i>
                <span class="links_name">Users statistics</span>
                </a>
            </li>
            <?php if($admin['admin_type'] == 1){ ?>
            <li>
                <a <?php if($active === 'admins-statistics')
                {
                    echo 'class="active" href="#"';
                }else{
                  echo 'href="' . $host . 'admins-statistics"';
                } ?>>
                <i class='bx bx-stats'></i>
                <span class="links_name">Admins statistics</span>
                </a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'ratings')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'ratings"';
                } ?>>
                <i class='bx bx-star'></i>
                <span class="links_name">Ratings</span>
                </a>
          </div>
        </li>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'issues')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'issues"';
                } ?>>
                <i class='bx bx-file-find'></i>
                <span class="links_name">Issues</span>
                </a>
          </div>
        </li>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'faqs')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'faqs"';
                } ?>>
                <i class='bx bx-help-circle'></i>
                <span class="links_name">FAQs</span>
                </a>
          </div>
        </li>
        <li>
          <div class="icon-links">
            <a href="#" id="rate">
              <i class='bx bx-info-circle'></i>
              <span class="links_name">About</span>
            </a>
          </div>
        </li>
        <?php if($admin['admin_type'] == 1){ ?>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'all-admins')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'all-admins"';
                } ?>>
                <i class='bx bx-command'></i>
                <span class="links_name">Admins</span>
                </a>
          </div>
        </li>
        <?php } ?>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'all-users')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'all-users"';
                } ?>>
                <i class='bx bx-user'></i>
                <span class="links_name">Users</span>
                </a>
          </div>
        </li>
        <?php if($admin['admin_type'] == 1){ ?>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'payments')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'payments"';
                } ?>>
                <i class='bx bx-money'></i>
                <span class="links_name">Payments</span>
                </a>
          </div>
        </li>
        <?php } ?>
        <li>
          <div class="icon-links">
                <a <?php if($active === 'settings')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'settings"';
                } ?>>
                <i class='bx bx-cog'></i>
                <span class="links_name">Settings</span>
                </a>
          </div>
        </li>
        <li class="log_out admin">
          <div class="icon-links">
                <a <?php if($active === 'logout')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'logout"';
                } ?>>
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
                </a>
          </div>
        </li>
      </ul>
  </div>
  <section class="home-section">
  <?php
    if(admin_is_logged_in() === false)
    {
      $url = url()[2].'admin/login';

      redirect_to($url);
    }
    else
    {
      $last_login_timestamp = $_SESSION['bwajes_plus_admin_data']['time'];
      
      check_inactive_admin($last_login_timestamp, $duration);
    }
    ?>
  <!-- suspended admin should not see content on this page
   a tooltip with a message of why they've been suspended -->
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $page_name; ?></span>
      </div>
      <div class="profile-details">
        <span id="admin-profile-image"></span>
        <span class="admin_name"><?php echo ucfirst(strtolower($first_name)) . ' ' . ucfirst(strtolower($last_name)); ?></span>
        <i id="notify_bell" class='bx bx-bell'></i>
        <span id="notify_number" class="notify-number"></span>
        <div class="notification admin">
          <ul id="notify_ul" class="notification-items">
          </ul>
        </div>
      </div>
    </nav>
<?php
}
?>