<?php

include('includes/header.php');
bwajes_plus_header('post-master', 'Email list stats');
$host='http://localhost:9090/bwajesplus-app/admin/';

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
                <a href="<?php echo $host .'post-master'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Email list (with duplicate):</h4>
                <div id="email-list-duplicate">
                  <?php //if(isset($type['type'])){echo $type['type'];} ?>
                </div>
                <h4>Email list (without duplicate):</h4>
                <div id="email-list">
                  <?php //if(isset($type['created_at'])){echo date("F jS, Y", strtotime($type['created_at']));} ?>
                </div>
                <h4>Comments list (with duplicate):</h4>
                <div id="comments-list-duplicate">
                  <?php //if(isset($type['type'])){echo $type['type'];} ?>
                </div>
                <h4>Comments list (without duplicate):</h4>
                <div id="comments-list">
                  <?php //if(isset($type['created_at'])){echo date("F jS, Y", strtotime($type['created_at']));} ?>
                </div>
                <h4>Subscriber list:</h4>
                <div id="subscriber-list">
                  <?php //if(isset($type['type'])){echo $type['type'];} ?>
                </div>
                <h4>Users list:</h4>
                <div id="users-list">
                  <?php //if(isset($type['created_at'])){echo date("F jS, Y", strtotime($type['created_at']));} ?>
                </div>
            </div>
          </div>
          <div class="card-footer">
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

        function email_list(value="")
        {   
          let form_data = new FormData();

          form_data.append('email_list_stats', value);
          
          let xhr = new XMLHttpRequest();
          
          xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

          xhr.onload = function()
          {
            if(this.status == 200)
            {
              let response = JSON.parse(xhr.responseText);
              let eld = document.getElementById('email-list-duplicate');
              let el  = document.getElementById('email-list');
              let cld = document.getElementById('comments-list-duplicate');
              let cl  = document.getElementById('comments-list');
              let sl  = document.getElementById('subscriber-list');
              let ul  = document.getElementById('users-list');
              eld.innerHTML = response.eld;
              el.innerHTML = response.el;
              cld.innerHTML = response.cld;
              cl.innerHTML = response.cl;
              sl.innerHTML = response.sl;
              ul.innerHTML = response.ul;
            }
          }
          
          xhr.send(form_data);
        }

        email_list();

        setInterval(function(){ 
          email_list();
        }, 5000);

      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>