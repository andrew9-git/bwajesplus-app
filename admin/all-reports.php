<?php

include('includes/header.php');
bwajes_plus_header('create-report', 'All reports');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
              <a href="create-report" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Report</th>
                  <th>Date created</th>
                  <th>Last updated</th>
                  <th>Modify</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Violence</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td><a href="edit-report/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this report?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-report">
                    </form>
                </tr>
                <tr>
                  <td>Fake news</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td><a href="edit-report/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this report?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-report">
                    </form>
                </tr>
                <tr>
                  <td>Hate speech</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td><a href="edit-report/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this report?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-report">
                    </form>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>