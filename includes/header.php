<?php
ob_start();
session_start();
include_once('includes/functions.php');
$csrf = csrf_token();
function bwajes_plus_header($active, $page_name)
{

  $id = $_SESSION['bwajes_plus_user_data']['id'];
  $first_name = $_SESSION['bwajes_plus_user_data']['first_name'];
  $last_name = $_SESSION['bwajes_plus_user_data']['last_name'];
  $email = $_SESSION['bwajes_plus_user_data']['email'];
  $host = url()[0];
  $duration = 3600; // 1 hour 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="copyright" content="Andadel">
    <meta name="robots" content="noindex, nofollow">
    <title>bwajes+</title>
    <link rel="icon" type="image/x-icon" href="<?php echo $host .'images/bwajes_plus.png'; ?>">
    <link rel="stylesheet" href="<?php echo $host .'assets/css/style.css'; ?>">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo $host .'ckeditor/ckeditor.js'; ?>"></script>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i><img src="<?php echo $host .'images/bwajes_plus.png'; ?>" class="bwajes"></i>
      <span class="logo_name">bwajes+</span>
    </div>
      <ul class="nav-links">
        <li><a <?php if($active === 'dashboard')
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
              <i class="bx bx-book arrow"></i>
              <a href="#" class="no-action">
                <span class="links_name arrow">Post</span>
              </a>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </div>
          </div>
          <ul class="sub-menu">
            <li>
              <a <?php if($active === 'create-post')
                {
                    $duration = 7200; // 2 hours
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'create-post"';
                } ?>>
                <i class="bx bx-pencil"></i>
                <span class="links_name">Create posts</span>
              </a>
            </li>
            <li>
              <a <?php if($active === 'all-posts')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'all-posts"';
                } ?>>
                <i class="bx bx-book-alt" ></i>
                <span class="links_name">All posts</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <div class="icon-links">
            <a href="#" id="message">
              <i class='bx bx-message' ></i>
              <span class="links_name">Message</span>
            </a>
          </div>
        </li>
        <?php 
        $user = fetch_single_row($id, 'users');
        if($user['suspended'] != 1)
        {
        ?>
        <?php 
        $count = db_row_count($id, 'user_id', 'ratings', 'int');
        if($count < 5)
        {
        ?>
        <li>
          <div class="icon-links">
            <a href="#" id="rate">
              <i class='bx bx-star' ></i>
              <span class="links_name">Rate us</span>
            </a>
          </div>
        </li>
        <?php } ?>
        <?php } ?>
        <?php 
        $count = db_row_count($id, 'user_id', 'posts', 'int');
        if($count > 0)
        {
        ?>
        <li><a <?php if($active === 'remove-ads')
                {
                    echo 'class="active" href="#"';
                }else{
                    echo 'href="' . $host . 'remove-ads"';
                } ?>>
                <i class='bx bx-money'></i>
                <span class="links_name">Remove ads</span>
            </a>
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
              <i class='bx bx-cog' ></i>
              <span class="links_name">Settings</span>
            </a>
          </div>
        </li>
        <li class="log_out">
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
    if(user_is_logged_in() === false)
    {
      $url = url()[1].'login';
      redirect_to($url);
    }
    else
    {
      $last_login_timestamp = $_SESSION['bwajes_plus_user_data']['time'];
      
      check_inactive_user($last_login_timestamp, $duration);
    }
    ?>
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $page_name; ?></span>
      </div>
      <?php if(basename($_SERVER['PHP_SELF']) !== 'create-post.php' && basename($_SERVER['PHP_SELF']) !== 'remove-ads.php')
      { ?>

        <a href="<?php echo $host .'create-post'; ?>" class="btn btn-primary create-post nav">create post</a>
      <?php } ?>
      <div class="profile-details">
        <span id="user-profile-image"></span>
        <span class="admin_name"><?php echo ucfirst(strtolower($first_name)) . ' ' . ucfirst(strtolower($last_name)); ?></span>
        <i id="notify_bell" class='bx bx-bell'></i>
        <span id="notify_number" class="notify-number"></span>
        <div class="notification">
          <ul id="notify_ul" class="notification-items">
          </ul>
        </div>
      </div>
    </nav>
<?php
}
?>