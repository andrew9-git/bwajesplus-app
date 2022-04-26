<?php

function bwajes_plus_header($active, $page_name)
{

  $host='http://localhost:9090/bwajesplus-app/admin/';
  $host1='http://localhost:9090/bwajesplus-app/';
  
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
            <a href="#" class="no-action">
              <i class="bx bxs-report arrow"></i>
              <span class="links_name arrow">Reports</span>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </a>
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
            <a href="#" class="no-action">
              <i class="bx bx-support arrow"></i>
              <span class="links_name arrow">Messages</span>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </a>
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
            <a href="#" class="no-action">
              <i class="bx bx-paper-plane arrow"></i>
              <span class="links_name arrow">Post</span>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </a>
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
            <a href="#" class="no-action">
              <i class="bx bx-stats arrow"></i>
              <span class="links_name arrow">Statistics</span>
              <i class="bx bxs-chevron-down rotate arrow"></i>
            </a>
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
          </ul>
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
  <!-- suspended admin should not see content on this page
   a tooltip with a message of why they've been suspended -->
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><?php echo $page_name; ?></span>
      </div>
      <div class="profile-details">
        <img src="<?php echo $host1 .'images/profile.jpg'; ?>" alt="">
        <span class="admin_name">Andrew Adelodun</span>
        <i class='bx bx-bell'></i>
        <span class="notify-number">3</span>
        <div class="notification admin">
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