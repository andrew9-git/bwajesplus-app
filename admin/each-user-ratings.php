<?php

include('includes/header.php');
bwajes_plus_header('ratings', 'Each User Ratings');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
    <div class="post-area">
    <div class="card">
          <div class="card-header">
            <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total data - <span id="total_posts"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <!-- <input type="search" class="form-control" placeholder="search for ratings here..." name="search" id="search" onkeyup="load_data(this.value);"> -->
                            <input type="search" class="form-control" placeholder="search for ratings here..." name="search" id="search">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?php //echo $id; ?>" class="form-control" id="search_user_id">
                        </div>
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
                    <tbody id="post_data">
                        <tr>
                            <td>5</td>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Description</td>
                            <td><a href="#" onclick="event.preventDefault();if(confirm('Do you really want to delete this rating?')){document.getElementById('form-delete-rid').submit();}"><i class="bx bx-trash"></i></a>
                            <form method="post" action="" style="display: none;" id="form-delete-rid">
                                <input type="hidden" value="" name="csrf">
                                <input type="hidden" value="rid" name="delete-post">
                            </form>
                            </td>
                        </tr>
                    </tbody>
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

<?php

    include('includes/footer.php');
    ckeditor();

?>