<?php

include('includes/header.php');
bwajes_plus_header('reported-posts', 'Reports about post');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
              <div class="info-container">
                  <a href="reported-posts.php" class="btn btn-success">back</a>
              </div>
              <!-- Using if statement to show either suspend or activate button -->
            <a href="#" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this post?')){document.getElementById('form-suspend-pid').submit();}">suspend</a><a href="#" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this post?')){document.getElementById('form-activate-pid').submit();}">activate</a> | <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this post?')){document.getElementById('form-delete-pid').submit();}"><i class="bx bx-trash"></i></a>
            <form method="post" action="" style="display: none;" id="form-suspend-id">
                <input type="hidden" value="" name="csrf">
                <input type="hidden" value="pid" name="suspend-post">
            </form>
            <form method="post" action="" style="display: none;" id="form-activate-id">
                <input type="hidden" value="" name="csrf">
                <input type="hidden" value="pid" name="activate-post">
            </form>
            <form method="post" action="" style="display: none;" id="form-delete-id">
                <input type="hidden" value="" name="csrf">
                <input type="hidden" value="pid" name="delete-post">
            </form>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Report(s)</th>
                  <th>Date reported</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Hate speech</td>
                  <td>1/04/2021</td>
                </tr>
                <tr>
                  <td>Violence</td>
                  <td>1/04/2021</td>
                </tr>
                <tr>
                  <td>False information</td>
                  <td>1/04/2021</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer" style="display: flex;align-items:center;justify-content:space-between;">
            <a href="post-reported.php?pid=id" target="_blank" class="btn btn-danger">see post</a>
            <a href="all-users.php?uid=id" target="_blank" class="btn btn-warning">see user</a>
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>