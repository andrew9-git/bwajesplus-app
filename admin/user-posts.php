<?php

include('includes/header.php');
bwajes_plus_header('posts-statistics', 'User posts stat');
$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if(isset($_GET['u']))
{
  $user_id = $_GET['u'];

  if(fetch_single_row($user_id, 'users') == false)
  {
    redirect_to($host.'logout');
  }

}
else
{
  redirect_to($host.'logout');
}
?>

<div class="home-content">
      <div class="post-area">
      <?php 
        if($admin['suspended'] != 1)
        {
      ?>
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
                <h4 class="message-body"><?php echo count_post_stat($user_id, 'published'); ?></h4>
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
                <h4 class="message-body"><?php echo count_post_stat($user_id, 'non-published'); ?></h4>
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
                <h4 class="message-body"><?php echo count_post_stat($user_id, 'suspended'); ?></h4>
                <i class="bx bx-book-open"></i>
              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
        <div class="info-container">
            <div class="btn btn-danger">Total: <?php echo count_post_stat($user_id); ?></div>
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
        <?php }
        else
        {
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">Your account has been suspended</h4>
            </div>
            <div class="card-body" style="display: flex;justify-content:center;align-items:center;">
                <div class="ad-removal">
                    For more information, or if you think your account was suspended by mistake, please contact the organisation
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
        <?php } ?>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>