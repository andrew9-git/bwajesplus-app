<?php

include('includes/header.php');
bwajes_plus_header('issues', 'User\'s feedback');

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
          <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total issues - <span id="total_issues"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for issue here..." name="search" id="search" onkeyup="load_data(this.value);">
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
                  <th>First name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Date created</th>
                  <th>Check details</th>
                  <?php if($admin['admin_type'] == 1){ ?>
                  <th>Delete</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody id="issue_data"></tbody>
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

      form_data.append('issue_query', query);
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
                    html += '<td>' + response.data[count].first_name + '</td>';
                    html += '<td>' + response.data[count].email + '</td>';
                    html += '<td>' + response.data[count].subject + '</td>';
                    html += '<td>' + response.data[count].date_created + '</td>';
                    html += '<td><a href="issue-details/'+ response.data[count].issue_id +'"><i class="bx bx-link-external"></i></a></td>';
                    <?php if($admin['admin_type'] == 1){ ?>
                    html += '<td><span style="cursor: pointer;" onclick="event.preventDefault();if(confirm(&quot;Do you really want to delete this feedback?&quot;)){document.getElementById(&quot;form-delete-'+ response.data[count].issue_id +'&quot;).submit();}"><i class="bx bx-trash"></i></span><form method="post" action="issues" style="display: none;" id="form-delete-'+ response.data[count].issue_id +'"><input type="hidden" value="'+ response.data[count].issue_id +'" name="delete-issue" class="form_data_issue"></form></td>';<?php } ?>
                    html += '</tr>';
                    serial_no++;

                  }
                  
              }
              else
              {
              html += '</tr><td colspan="7" style="text-align: center;">No Data Found</td></tr>';
              }
              document.getElementById('issue_data').innerHTML = html;
              document.getElementById('total_issues').innerHTML = response.total_data;
              document.getElementById('pagination_link').innerHTML = response.pagination;
          }
      }
          
      xhr.send(form_data);
      }

    </script>

<?php
  if(isset($_POST['delete-issue']))
  {
    $issue_id = $_POST['delete-issue'];
    $executed = delete_single_row($issue_id, 'issues');
    if($executed)
    {
      $url = $host . 'issues';
      redirect_to($url);
    }
  }
?>
<?php

    include('includes/footer.php');
    ckeditor();

?>