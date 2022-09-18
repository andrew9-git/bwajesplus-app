<?php

include('includes/header.php');
bwajes_plus_header('admins-statistics', 'Admins statistics');

$id = $_SESSION['admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if($admin['admin_type'] != 1)
{
  redirect_to('logout');
}
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
            <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total admins - <span id="total_admins"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for admin here..." name="search" id="search" onkeyup="load_data(this.value);">
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
                    <th>Last name</th>
                    <th>Username</th>
                    <th>Admin type</th>
                    <th>Admin status</th>
                    <th>See statistics</th>
                  </tr>
                </thead>
                <tbody id="admin_data"></tbody>
              </table>
              <div id="pagination_link" style="width: 100%;display:flex;justify-content:center;align-items:center;"></div><br>
            </div>
            <div class="card-footer">
            </div>
          </div>
      </div>
    </div>
    <script>

      load_data();

      function load_data(query='', page_number = 1)
      {
        // let admin_id = document.getElementById('search_admin_id').value;

        let form_data = new FormData();

        form_data.append('admin_query', query);
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
                    html += '<td>' + response.data[count].last_name + '</td>';
                    html += '<td>' + response.data[count].username + '</td>';
                    if(response.data[count].admin_type == 1){
                    html += '<td>super</td>';
                    }else{
                      html += '<td>basic</td>';
                    }
                    if(response.data[count].suspended == 0){
                    html += '<td><i class="bx bxs-user-check"></i></td>';
                    }else{
                    html += '<td><span class="times">&times;</span></td>';
                    }
                    html += '<td><a href="admin-statistics/'+ response.data[count].admin_id +'"><i class="bx bx-link-external"></i></a></td>';
                    html += '</tr>';
                    serial_no++;

                  }
                  
              }
              else
              {
                html += '</tr><td colspan="5" style="text-align: center;">No Data Found</td></tr>';
              }
              document.getElementById('admin_data').innerHTML = html;
              document.getElementById('total_admins').innerHTML = response.total_data;
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