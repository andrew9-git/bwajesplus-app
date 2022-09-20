<?php

include('includes/header.php');
bwajes_plus_header('user-sent-emails', 'All emails sent by users');

$id = $_SESSION['admin_data']['id'];
$admin = fetch_single_row($id, 'admin');

$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
      <?php 
        if($admin['suspended'] != 1)
        {
      ?>
        <div class="card">
          <div class="card-header">
          <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total user emails - <span id="total_user_sent_emails"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for user emails here..." name="search" id="search" onkeyup="load_data(this.value);">
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
                  <th width="5%">S/N</th>
                  <th width="15%">User email</th>
                  <th width="25%">Department</th>
                  <th width="30%">Subject</th>
                  <th width="15%">Date created</th>
                  <th width="5%">Check email</th>
                  <?php if($admin['admin_type'] == 1){ ?>
                  <th width="5%">Delete</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody id="user_emails_data"></tbody>
            </table>
            <div id="pagination_link" style="width: 100%;display:flex;justify-content:center;align-items:center;"></div><br>
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

      load_data();

      function load_data(query='', page_number = 1)
      {
        // let admin_id = document.getElementById('search_admin_id').value;

        let form_data = new FormData();

        form_data.append('user_emails_query', query);
        form_data.append('page', page_number);
        // form_data.append('admin_id', admin_id);

        let xhr = new XMLHttpRequest();
                
        xhr.open('POST', 'process-ajax');

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
                    html += '<td>' + response.data[count].user_email + '</td>';
                    html += '<td>' + response.data[count].department + '</td>';
                    html += '<td>' + response.data[count].title + '</td>';
                    html += '<td>' + response.data[count].date_created + '</td>';
                    html += '<td><a href="user-email/'+ response.data[count].user_email_id +'"><i class="bx bx-link-external"></i></a></td>';<?php if($admin['admin_type'] == 1){ ?>
                    html += '<td><span style="cursor: pointer;" onclick="event.preventDefault();if(confirm(&quot;Do you really want to delete this user email?&quot;)){document.getElementById(&quot;form-delete-'+ response.data[count].user_email_id +'&quot;).submit();}"><i class="bx bx-trash"></i></span><form method="post" action="user-sent-emails" style="display: none;" id="form-delete-'+ response.data[count].user_email_id +'"><input type="hidden" value="'+ response.data[count].user_email_id +'" name="delete-user-email" class="form_data_use"></form></td>';<?php } ?>
                    html += '</tr>';
                    serial_no++;

                  }
                  
              }
              else
              {
                html += '</tr><td colspan="5" style="text-align: center;">No Data Found</td></tr>';
              }
              document.getElementById('user_emails_data').innerHTML = html;
              document.getElementById('total_user_sent_emails').innerHTML = response.total_data;
              document.getElementById('pagination_link').innerHTML = response.pagination;
          }
        }
            
        xhr.send(form_data);
      }

    </script>
    <?php
      if(isset($_POST['delete-user-email']))
      {
        $user_email_id = $_POST['delete-user-email'];
        $executed = delete_single_row($user_email_id, 'user_sent_emails');
        if($executed)
        {
          $url = $host . 'user-sent-emails';
          redirect_to($url);
        }
      }
    ?>
<?php

    include('includes/footer.php');
    ckeditor();

?>