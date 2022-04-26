<?php

include('includes/header.php');
bwajes_plus_header('all-users', 'User posts');

?>

<div class="home-content">
      <div class="post-area">
          <div class="info-container">
              <a href="user.php?uid=idWithPhp" class="btn btn-success">back</a>
          </div>
        <div class="card">
            <div class="card-header">
                <form action="">
                    <div class="form-wrapper">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                        </div>
                        <div class="form-group">
                            <span>see published post?</span>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="" name="publish"> Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="" name="publish"> No
                                </label>
                            </div>
                        </div>
                        <div class="search-button-wrapper">
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="search for post here..." name="search" id="search">
                            </div>
                            <div class="form-group">
                                <button name="filter" type="submit" class="btn btn-primary">filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>User email</th>
                    <th>Last updated</th>
                    <th>See post</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Happy days ahead</td>
                    <td>andrew@gmail.com</td>
                    <td>14, Sept., 2021 12:00:00</td>
                    <td><a href="post.php?uid=idWithPhp&pid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                  <tr>
                      <td>Happy days ahead</td>
                      <td>andrew@gmail.com</td>
                      <td>14, Sept., 2021 12:00:00</td>
                      <td><a href="post.php?uid=idWithPhp&pid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                  <tr>
                      <td>Happy days ahead</td>
                      <td>andrew@gmail.com</td>
                      <td>14, Sept., 2021 12:00:00</td>
                      <td><a href="post.php?uid=idWithPhp&pid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
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