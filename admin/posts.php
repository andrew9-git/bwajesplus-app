<?php

include('includes/header.php');
bwajes_plus_header('all-users', 'User posts');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>
<?php
    if(isset($_GET['u']))
    {
        $user_id = $_GET['u'];
    }
    else
    {
      redirect_to('logout');
    }

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
              <a href="<?php echo $host. 'user/'. $user_id; ?>" class="btn btn-success">back</a>
            </div>
            <form action="">
                  <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total posts - <span id="total_posts"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for user here..." name="search" id="search" onkeyup="load_data(this.value);">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $user_id; ?>" class="form-control" name="user_id" id="user_id">
                        </div>
                    </div>
                  </div>
            </form>
            </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date created</th>
                    <th>Last updated</th>
                    <th>See post</th>
                  </tr>
                </thead>
                <tbody id="post_data"></tbody>
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
        let user_id = document.getElementById('user_id').value;

        let form_data = new FormData();

        form_data.append('post_query', query);
        form_data.append('page', page_number);
        form_data.append('user_id', user_id);

        let xhr = new XMLHttpRequest();
                
        xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

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
                    html += '<td>' + response.data[count].title + '</td>';
                    html += '<td>' + response.data[count].description + '</td>';
                    html += '<td>' + response.data[count].date_created + '</td>';
                    html += '<td>' + response.data[count].date_updated + '</td>';
                    html += '<td><a href="http://localhost:9090/bwajesplus-app/admin/post/'+ response.data[count].post_id +'"><i class="bx bx-link-external"></i></a></td>';
                    html += '</tr>';
                    serial_no++;

                  }
                  
              }
              else
              {
                html += '</tr><td colspan="6" style="text-align: center;">No Data Found</td></tr>';
              }
              document.getElementById('post_data').innerHTML = html;
              document.getElementById('total_posts').innerHTML = response.total_data;
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