<?php

include('includes/header.php');
bwajes_plus_header('legal', 'All legals');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
              <a href="legal" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>See legal</th>
                  <th>Modify</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Terms of Service</td>
                    <td><a href="each-legal/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="edit-legal/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this legal statement?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-legal">
                    </form>
                </tr>
                <tr>
                    <td>Privacy Policy</td>
                    <td><a href="each-legal/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="edit-legal/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this legal statement?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-legal">
                    </form>
                </tr>
                <tr>
                    <td>Data Policy</td>
                    <td><a href="each-legal/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="edit-legal/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this legal statement?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-legal">
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