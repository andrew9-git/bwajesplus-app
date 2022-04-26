<?php

include('includes/header.php');
bwajes_plus_header('post-type', 'All post types');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
              <a href="post-type" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>See type</th>
                  <th>Modify</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Art</td>
                    <td><a href="each-type/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="edit-type/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this post type?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-type">
                    </form>
                </tr>
                <tr>
                    <td>Environment</td>
                    <td><a href="each-type/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="edit-type/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this post type?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-type">
                    </form>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td><a href="each-type/4"><i class="bx bx-link-external"></i></a></td>
                    <td><a href="edit-type/4"><i class="bx bx-edit"></i></a> | <a href="#"
                    onclick="event.preventDefault();if(confirm('Do you really want to delete this post type?')){
                        document.getElementById('form-delete-idWithPhp*').submit();
                    }
                    "><i class="bx bx-trash"></i></a></td>
                    <form method="post" action="" style="display: none;" id="form-delete-idWithPhp*">
                        <input type="hidden" value="" name="csrf">
                        <input type="hidden" value="idWithPhp*" name="delete-type">
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