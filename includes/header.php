<?php

function bwajes_plus_header($active, $page_name)
{

  $host='http://localhost:9090/bwajesplus-app/';

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
        <li>
          <div class="icon-links">
            <a href="#" id="rate">
              <i class='bx bx-star' ></i>
              <span class="links_name">Rate us</span>
            </a>
          </div>
        </li>
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
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $page_name; ?></span>
      </div>
      <?php if(basename($_SERVER['PHP_SELF']) !== 'create-post.php')
      { ?>

        <a href="<?php echo $host .'create-post'; ?>" class="btn btn-primary create-post nav">create post</a>
      <?php } ?>
      <div class="profile-details">
        <img src="<?php echo $host .'images/profile.jpg'; ?>" alt="">
        <span class="admin_name">Andrew Adelodun</span>
        <i class='bx bx-bell'></i>
        <span class="notify-number">3</span>
        <div class="notification">
          <ul class="notification-items">
            <li><a href="#">comment comment comment</a></li>
            <li><a href="#">comment</a></li>
            <li><a href="#">comment</a></li>
            <li><a href="#">comment</a></li>
          </ul>
        </div>
      </div>
    </nav>
<?php
}
?>