<?php

include('includes/header.php');
bwajes_plus_header('admins-statistics', 'Admins statistics');

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
                              <input type="search" class="form-control" placeholder="search for admin here..." name="search" id="search">
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
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Admin email</th>
                    <th>Admin type</th>
                    <th>Admin status</th>
                    <th>See statistics</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Andrew</td>
                    <td>Adelodun</td>
                    <td>andrew@gmail.com</td>
                    <td>basic</td>
                    <td><i class="bx bxs-user-check"></i></td>
                    <td><a href="admin-statistics/4"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                  <tr>
                    <td>Andrew</td>
                    <td>Adelodun</td>
                    <td>andrew@gmail.com</td>
                    <td>basic</td>
                    <td><i class="bx bxs-user-check"></i></td>
                    <td><a href="admin-statistics/4"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                  <tr>
                    <td>Andrew</td>
                    <td>Adelodun</td>
                    <td>andrew@gmail.com</td>
                    <td>super</td>
                    <td><span class="times">&times;</span></td>
                    <td><a href="admin-statistics/4"><i class="bx bx-link-external"></i></a></td>
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