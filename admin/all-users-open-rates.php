<?php

include('includes/header.php');
bwajes_plus_header('admin-sent-emails', 'All users and/or others mail open rates');

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
            <div style="display: flex;align-items:center;justify-content:space-between">
              <a href="admin-sent-emails" class="btn btn-success">back</a>
              <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total open rates - <span id="total_open_rates"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for open rate here..." name="search" id="search" onkeyup="load_data(this.value);">
                        </div>
                        <!-- <div class="form-group">
                            <input type="hidden" value="<?php //echo $id; ?>" class="form-control" id="search_admin_id">
                        </div> -->
                    </div>
                </div>
            </form>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Email</th>
                  <th>No of mails recieved</th>
                  <th>No of mails opened</th>
                  <th>Open rates</th>
                  <th>See mails</th>
                </tr>
              </thead>
              <tbody id="open_rate_data"></tbody>
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

        form_data.append('open_rate_query', query);
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
                    html += '<td>' + response.data[count].email + '</td>';
                    html += '<td>' + response.data[count].no_of_mails_recieved + '</td>';
                    html += '<td>' + response.data[count].no_of_mails_opened + '</td>';
                    html += '<td>' + response.data[count].open_rate + '</td>';
                    html += '<td><a href="mails-recieved/'+ response.data[count].id +'"><i class="bx bx-link-external"></i></a></td>';
                    html += '</tr>';
                    serial_no++;

                  }
                  
              }
              else
              {
                html += '</tr><td colspan="6" style="text-align: center;">No Data Found</td></tr>';
              }
              document.getElementById('open_rate_data').innerHTML = html;
              document.getElementById('total_open_rates').innerHTML = response.total_data;
              document.getElementById('pagination_link').innerHTML = response.pagination;
          }
        }
            
        xhr.send(form_data);
      }

    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>