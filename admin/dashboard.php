<?php

include('includes/header.php');
bwajes_plus_header('dashboard', 'Dashboard');

$id = $_SESSION['admin_data']['id'];
$admin_statistics = fetch_single_row($id, 'admin_statistics', 'admin_id');
?>
    <div class="home-content">
      <div class="post-area">
        <div class="info">
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Number of users</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">
                  <?php
                    $no_of_users = db_row_count('', '', 'users', '', 0);
                    echo $no_of_users;
                  ?>
                </h4>
                <i class="bx bx-user"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Number of posts</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">
                <?php
                    $no_of_posts = db_row_count('', '', 'posts', '', 0);
                    echo $no_of_posts;
                  ?>
                </h4>
                <i class="bx bx-book"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div><br>
        <?php $users_count = db_row_count('', '', 'users', '', 0);
          if($users_count > 0)
          {?>

        <div class="card">
          <div class="card-header">
            <div class="info-container">
              <a href="all-users" class="btn btn-success">see all users</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Number of posts</th>
                  <th>See user</th>
                </tr>
              </thead>
              <tbody>
              <?php $dashboard_users = values_to_show_in_dashboard(); 
                foreach($dashboard_users as $dashboard_user)
                { ?>
                <tr>
                  <td><?php echo $dashboard_user['first_name']; ?></td>
                  <td><?php echo $dashboard_user['last_name']; ?></td>
                  <td><?php echo $dashboard_user['email']; ?></td>
                  <td>
                    <?php  
                      echo db_row_count($dashboard_user['id'], 'user_id', 'posts');
                    ?>
                  </td>
                  <td><a href="user/<?php echo $dashboard_user['id']; ?>"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="info-container">
                <b>Active users: <span id="active-users"></span></b>
            </div>
          </div>
        </div>
        <?php }else{ ?>
          <span class="btn btn-warning no-post">no users yet</span>
        <?php } ?><br>
        <div class="info">
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Number of super admins</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">
                  <?php
                    $no_of_super_admins = db_row_count(1, 'admin_type', 'admin');
                    echo $no_of_super_admins;
                  ?>
                </h4>
                <i class="bx bx-user"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Number of basic admins</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">
                  <?php
                    $no_of_basic_admins = db_row_count(2, 'admin_type', 'admin');
                    echo $no_of_basic_admins;
                  ?>
                </h4>
                <i class="bx bx-book"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="info-container">
          <div class="btn btn-danger">Total numbers of admin: 
            <?php
                  $no_of_admins = db_row_count('', '', 'admin', '', 0);
                  echo $no_of_admins;
            ?>
          </div>
        </div><br>
        <?php $admins_count = db_row_count('', '', 'admin', '', 0);
          if($admins_count > 0)
          {?>
        <div class="card">
          <div class="card-header">
            <div class="info-container">
              <a href="all-admins" class="btn btn-success">see all admins</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Number of Messages Sent</th>
                  <th>See admin</th>
                </tr>
              </thead>
              <tbody>
              <?php $dashboard_admins = values_to_show_in_dashboard('admin'); 
                foreach($dashboard_admins as $dashboard_admin)
                { ?>
                <tr>
                  <td><?php echo $dashboard_admin['first_name']; ?></td>
                  <td><?php echo $dashboard_admin['last_name']; ?></td>
                  <td><?php echo $dashboard_admin['email']; ?></td>
                  <td>
                    <?php  
                      echo db_row_count($dashboard_admin['id'], 'admin_id', 'admin_sent_emails');
                    ?>
                  </td>
                  <td><a href="admin/<?php echo $dashboard_admin['id']; ?>"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="info-container">
              <b>Active admins: <span id="active-admins"></span></b>
            </div>
          </div>
        </div>
        <?php }else{ ?>
          <span class="btn btn-warning no-post">no admins yet</span>
        <?php } ?>
        <div class="info-container">
          <div class="btn btn-secondary last-login">last visited: <?php if(isset($admin_statistics)){echo date("F jS, Y", strtotime($admin_statistics['last_logout']));} ?></div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {

        function active_users(value="")
        {   
          let form_data = new FormData();

          form_data.append('active_users', value);
          
          let xhr = new XMLHttpRequest();
          
          xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

          xhr.onload = function()
          {
            if(this.status == 200)
            {
              let response = JSON.parse(xhr.responseText);
              let active = document.getElementById('active-users');
              active.innerHTML = response;
            }
          }
          
          xhr.send(form_data);
        }

        active_users();

        setInterval(function(){ 
          active_users();
        }, 5000);

        function active_admins(value="")
        {   
          let form_data = new FormData();

          form_data.append('active_admins', value);
          
          let xhr = new XMLHttpRequest();
          
          xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

          xhr.onload = function()
          {
            if(this.status == 200)
            {
              let response = JSON.parse(xhr.responseText);
              let active = document.getElementById('active-admins');
              active.innerHTML = response;
            }
          }
          
          xhr.send(form_data);
        }

        active_admins();

        setInterval(function(){ 
          active_admins();
        }, 5000);

      });
    </script>

<?php

    include('includes/footer.php');
    ckeditor();

?>