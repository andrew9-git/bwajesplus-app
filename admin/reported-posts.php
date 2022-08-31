<?php

include('includes/header.php');
bwajes_plus_header('reported-posts', 'Reported posts');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header" style="text-align: center;">
            <h4 class="message-head">click on post title to see a post's report(s)</h4>
            <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total posts reported/Report searched for - <span id="total_reports"></span></b></span>
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
                  <th>Post title</th>
                  <th>Number of Reports</th>
                </tr>
              </thead>
              <tbody id="report_data"></tbody>
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

          form_data.append('query_reported_post', query);
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
                    html += '<td><a style="color:red;" href="reports-about-post/' + response.data[count].post_id + '">'+ response.data[count].post_title +'</a></td>';
                    html += '<td>' + response.data[count].no_of_reports + '</td>';
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

    include('includes/footer.php');
    ckeditor();

?>