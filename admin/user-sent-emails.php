<?php

include('includes/header.php');
bwajes_plus_header('user-sent-emails', 'All emails sent by users');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for email here..." name="search" id="search">
                        </div>
                        <div class="form-group">
                            <button name="filter" class="btn btn-primary">filter</button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>User email</th>
                  <th>Department</th>
                  <th>Subject</th>
                  <th>Date created</th>
                  <th>Check email</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>andrew@gmail.com</td>
                  <td>IT Support</td>
                  <td>No money? No problem</td>
                  <td>sep., 5, 2021 10:00:00</td>
                  <td><a href="user-email/4"><i class="bx bx-link-external"></i></a></td>
                  <td><a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this sent email?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-sent-email">
                    </form>
                </tr>
                <tr>
                    <td>andrew@gmail.com</td>
                    <td>IT Support</td>
                    <td>No money? No problem</td>
                    <td>sep., 5, 2021 10:00:00</td>
                    <td><a href="user-email/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this sent email?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-sent-email">
                    </form>
                </tr>
                <tr>
                    <td>andrew@gmail.com</td>
                    <td>IT Support</td>
                    <td>No money? No problem</td>
                    <td>sep., 5, 2021 10:00:00</td>
                    <td><a href="user-email/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this sent email?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-sent-email">
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