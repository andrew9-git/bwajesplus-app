<?php

include('includes/header.php');
bwajes_plus_header('posts-statistics', 'User posts stat');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="info-container">
            <a href="<?php echo $host .'posts-statistics'; ?>" class="btn btn-success">back</a>
        </div>
        <div class="info">
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Published/Live posts</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">100</h4>
                <i class="bx bx-book-add"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Non-published posts</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">20</h4>
                <i class="bx bx-book-alt"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="admin-head">Suspended posts</h4>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">50</h4>
                <i class="bx bx-book-open"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="info-container">
            <div class="btn btn-danger">Total: 120</div>
        </div><br>
        <!-- <div class="card">
            <div class="card-header stat">
              <div class="btn btn-secondary">Average statistics for all published posts</div>
            </div>
            <div class="card-body statistics">
                <div class="card stat">
                    <div class="card-header stat">
                      <div class="btn btn-secondary">Pie chart</div>
                    </div>
                    <div class="card-body stat">
                        <div style="width:100px;height:100px;border:1px solid red;border-radius:50%;"></div>  
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
                <div class="card stat">
                    <div class="card-header stat">
                      <div class="btn btn-secondary">Doughnut chart</div>
                    </div>
                    <div class="card-body stat">
                        <div style="width:100px;height:100px;border:1px solid red;border-radius:50%;"></div>  
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
                <div class="card stat">
                    <div class="card-header stat">
                      <div class="btn btn-secondary">Bar chart</div>
                    </div>
                    <div class="card-body stat">
                        <div style="width:100px;height:100px;border:1px solid red;border-radius:50%;"></div>  
                    </div>
                    <div class="card-footer">
                    </div>
                </div>    
            </div>
            <div class="card-footer">
            </div>
        </div><br> -->
        <!-- <div class="card">
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
                    <th>See statistics</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Happy days ahead</td>
                    <td>andrew@gmail.com</td>
                    <td>14, Sept., 2021 12:00:00</td>
                    <td><a href="post-stat.php?uid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                  <tr>
                      <td>Happy days ahead</td>
                      <td>andrew@gmail.com</td>
                      <td>14, Sept., 2021 12:00:00</td>
                      <td><a href="post-stat.php?uid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                  <tr>
                      <td>Happy days ahead</td>
                      <td>andrew@gmail.com</td>
                      <td>14, Sept., 2021 12:00:00</td>
                      <td><a href="post-stat.php?uid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
            </div>
        </div> -->
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>