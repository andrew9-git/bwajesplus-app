<?php

include('includes/header.php');
bwajes_plus_header('reported-posts', 'Reports about post');
$host = url()[0];
?>
    <?php 
      if(isset($_GET['p']))
      {
        $post_id = $_GET['p'];

        $post = fetch_single_row($post_id, 'posts');

        if($post == false)
        {
          redirect_to($host.'logout');
        }
      }
      else
      {
        redirect_to($host.'logout');
      }

      $admin_id = $_SESSION['bwajes_plus_admin_data']['id'];
      $admin = fetch_single_row($admin_id, 'admin');
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
                  <a href="<?php echo $host . 'reported-posts'; ?>" class="btn btn-success">back</a>
              </div>
              <!-- Using if statement to show either suspend or activate button -->
              <?php if($post['suspended'] == 0){ ?>
            <span style="cursor: pointer;" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this post?')){document.getElementById('form-suspend-<?php echo $post_id; ?>').submit();}">suspend</span><?php } ?>
            <?php if($post['suspended'] == 1){ ?><span style="cursor: pointer;" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this post?')){document.getElementById('form-activate-<?php echo $post_id; ?>').submit();}">activate</span> 
            <?php } ?><?php if($admin['admin_type'] == 1){ ?>| <span style="cursor: pointer;" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this post?')){document.getElementById('form-delete-<?php echo $post_id; ?>').submit();}"><i class="bx bx-trash"></i></span><?php } ?>
            <form method="post" action="<?php echo $host . 'reports-about-post/' . $post_id; ?>" style="display: none;" id="form-suspend-<?php echo $post_id; ?>">
                <input type="hidden" value="<?php echo $post_id; ?>" name="suspend-post">
            </form>
            <form method="post" action="<?php echo $host . 'reports-about-post/' . $post_id; ?>" style="display: none;" id="form-activate-<?php echo $post_id; ?>">
                <input type="hidden" value="" name="csrf">
                <input type="hidden" value="<?php echo $post_id; ?>" name="activate-post">
            </form>
            <form method="post" action="<?php echo $host . 'reports-about-post/' . $post_id; ?>" style="display: none;" id="form-delete-<?php echo $post_id; ?>">
                <input type="hidden" value="" name="csrf">
                <input type="hidden" value="<?php echo $post_id; ?>" name="delete-post">
            </form>
            <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total reports/Report searched for - <span id="total_reports"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for report here..." name="search" id="search" onkeyup="load_data(this.value);">
                        </div>
                        <!-- <div class="form-group">
                            <input type="hidden" value="<?php //echo $id; ?>" class="form-control" id="search_admin_id">
                        </div> -->
                    </div>
                </div>
            </form>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Report(s)</th>
                  <th>Date reported</th>
                  <th>User IP</th>
                </tr>
              </thead>
              <tbody id="report_data"></tbody>
            </table>
            <div id="pagination_link" style="width: 100%;display:flex;justify-content:center;align-items:center;"></div><br>
          </div>
          <div class="card-footer" style="display: flex;align-items:center;justify-content:space-between;">
            <a href="<?php echo $host . 'post/' . $post_id; ?>" target="_blank" class="btn btn-danger">see post</a>
            <a href="<?php echo $host . 'user/' . $post['user_id']; ?>" target="_blank" class="btn btn-warning">see user</a>
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

      load_data();

      function load_data(query='', page_number = 1)
      {
          // let admin_id = document.getElementById('search_admin_id').value;
          let post_id = <?php echo $post_id; ?>;

          let form_data = new FormData();

          form_data.append('query_reports_about_post', query);
          form_data.append('page', page_number);
          // form_data.append('admin_id', admin_id);
          form_data.append('post_id', post_id);

          let xhr = new XMLHttpRequest();

          let url = '<?php echo $host . 'process-ajax' ?>';
                  
          xhr.open('POST', url);

          xhr.onload = function()
          {
            if(this.status == 200)
            {
              let response = JSON.parse(xhr.responseText);
              let html = '';
              let serial_no = 1;

              if(response.data.length > 0)
              {
                  for(let count = 0; count < response.data.length; count++)
                  {
                    html += '<tr>';
                    html += '<td>' + serial_no + '</td>';
                    html += '<td>' + response.data[count].report + '</td>';
                    html += '<td>' + response.data[count].date_created + '</td>';
                    html += '<td>' + response.data[count].ip + '</td>';
                    html += '</tr>';
                    serial_no++;

                  }
                  
              }
              else
              {
                html += '</tr><td colspan="5" style="text-align: center;">No Data Found</td></tr>';
              }
              document.getElementById('report_data').innerHTML = html;
              document.getElementById('total_reports').innerHTML = response.total_data;
              document.getElementById('pagination_link').innerHTML = response.pagination;
            }
          }
              
          xhr.send(form_data);
      }

    </script>
    <?php
      if(isset($_POST['suspend-post']))
      {
        $post_id = $_POST['suspend-post'];
        $executed = suspend_user_post($post_id);
        if($executed)
        {
          $url = $host . 'reports-about-post/' . $post_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['activate-post']))
      {
        $post_id = $_POST['activate-post'];
        $executed = activate_user_post($post_id);
        if($executed)
        {
          $url = $host . 'reports-about-post/' . $post_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['delete-post']))
      {
        $post_id = $_POST['delete-post'];
        $executed = delete_single_row($post_id, 'posts');
        if($executed)
        {
          $url = $host . 'reported-posts';
          redirect_to($url);
        }
      }
    ?>
<?php

    include('includes/footer.php');
    ckeditor();

?>