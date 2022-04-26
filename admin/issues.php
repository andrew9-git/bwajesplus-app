<?php

include('includes/header.php');
bwajes_plus_header('issues', 'User\'s feedback');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>First name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Date created</th>
                  <th>Check details</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Andrew</td>
                  <td>andrew@gmail.com</td>
                  <td>A link not working</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td><a href="issue-details/4"><i class="bx bx-link-external"></i></a></td>
                  <td><a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this issue?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-issue">
                    </form>
                </tr>
                <tr>
                    <td>Andrew</td>
                    <td>andrew@gmail.com</td>
                    <td>A link not working</td>
                    <td>sep., 5, 2021 10:00:00</td>
                    <td><a href="issue-details/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this issue?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-issue">
                    </form>
                </tr>
                <tr>
                    <td>Andrew</td>
                    <td>andrew@gmail.com</td>
                    <td>A link not working</td>
                    <td>sep., 5, 2021 10:00:00</td>
                    <td><a href="issue-details/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this issue?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-issue">
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