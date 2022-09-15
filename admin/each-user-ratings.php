<?php

include('includes/header.php');
bwajes_plus_header('ratings', 'Each User Ratings');
$host='http://localhost:9090/bwajesplus-app/admin/';

$id = $_SESSION['admin_data']['id'];

if(isset($_GET['r']))
{
  $user_id = $_GET['r'];
}
else
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
                        <span><b>Total ratings - <span id="total_ratings"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for rating here..." name="search" id="search" onkeyup="load_data(this.value);">
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
                        <th width="5%">Rating</th>
                        <th width="25%">Reason</th>
                        <th width="60%">Suggestion</th>
                        <th width="5%">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="rating_data"></tbody>
                </table>
                <div id="pagination_link" style="width: 100%;display:flex;justify-content:center;align-items:center;"></div><br>
          </div>
          <div class="card-footer">
            <div class="info-container">
                <a href="<?php echo $host .'ratings'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
        </div>
    </div>
</div>
<script>

    load_data();

    function load_data(query='', page_number = 1)
    {
    // let admin_id = document.getElementById('search_admin_id').value;
    let user_id = <?php echo $user_id; ?>;

    let form_data = new FormData();

    form_data.append('each_rating_query', query);
    form_data.append('page', page_number);
    // form_data.append('admin_id', admin_id);
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
                html += '<td>' + response.data[count].rating + '</td>';
                if(response.data[count].reason == null)
                {
                    html += '<td>No reason given</td>';
                }
                else
                {
                    html += '<td>' + response.data[count].reason + '</td>';
                }
                if(response.data[count].suggestion == null)
                {
                    html += '<td>No suggestion given</td>';
                }
                else
                {
                    html += '<td>' + response.data[count].suggestion + '</td>';
                }
                html += '<td><span style="cursor: pointer;" onclick="event.preventDefault();if(confirm(&quot;Do you really want to delete this rating?&quot;)){document.getElementById(&quot;form-delete-'+ response.data[count].rating_id +'&quot;).submit();}"><i class="bx bx-trash"></i></span><form method="post" action="http://localhost:9090/bwajesplus-app/admin/each-user-ratings/'+ response.data[count].user_id +'" style="display: none;" id="form-delete-'+ response.data[count].rating_id +'"><input type="hidden" value="'+ response.data[count].rating_id +'" name="delete-rating" class="form_data_rating"></form></td>';
                html += '</tr>';
                serial_no++;

                }
                
            }
            else
            {
            html += '</tr><td colspan="5" style="text-align: center;">No Data Found</td></tr>';
            }
            document.getElementById('rating_data').innerHTML = html;
            document.getElementById('total_ratings').innerHTML = response.total_data;
            document.getElementById('pagination_link').innerHTML = response.pagination;
        }
    }
        
    xhr.send(form_data);
    }

</script>

<?php
      if(isset($_POST['delete-rating']))
      {
        $rating_id = $_POST['delete-rating'];
        $executed = delete_single_row($rating_id, 'ratings');
        if($executed)
        {
          $url = $host . 'each-user-ratings/' . $user_id;
          redirect_to($url);
        }
      }
?>
<?php

    include('includes/footer.php');
    ckeditor();

?>