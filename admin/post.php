<?php

include('includes/header.php');
bwajes_plus_header('all-users', 'User post');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>
<?php
    if(isset($_GET['p']))
    {
        $post_id = $_GET['p'];
        $post_info = fetch_single_row($post_id, 'posts');
    }
    else
    {
      redirect_to('logout');
    }

    $id = $_SESSION['admin_data']['id'];

    $post_types = post_type();
    $post_categories = post_category();
?>
<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <div class="info-container">
                    <span class="btn btn-success back" id="back">back</span>
                </div>
                <!-- Using if statement to show either suspend or activate button
                and it's only super admin that should be able to delete post -->
                <?php if($post_info['suspended'] == 0){ ?>
                <span style="cursor: pointer;" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this user?')){document.getElementById('form-suspend-<?php echo $post_id; ?>').submit();}">suspend</span><?php } ?>
                <?php if($post_info['suspended'] == 1){ ?><span style="cursor: pointer;" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this user?')){document.getElementById('form-activate-<?php echo $post_id; ?>').submit();}">activate</span> 
                <?php } ?> | <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this user?')){document.getElementById('form-delete-<?php echo $post_id; ?>').submit();}"><i class="bx bx-trash"></i></a>
                
                <form method="post" action="<?php echo $host . 'user/' . $post_id; ?>" style="display: none;" id="form-suspend-<?php echo $post_id; ?>">
                <input type="hidden" value="<?php echo $post_id; ?>" name="suspend-user">
                </form>
                <form method="post" action="<?php echo $host . 'user/' . $post_id; ?>" style="display: none;" id="form-activate-<?php echo $post_id; ?>">
                    <input type="hidden" value="<?php echo $post_id; ?>" name="activate-user">
                </form>
                <form method="post" action="<?php echo $host . 'user/' . $post_id; ?>" style="display: none;" id="form-delete-<?php echo $post_id; ?>">
                    <input type="hidden" value="<?php echo $post_id; ?>" name="delete-user">
                </form>
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
                  <h4>Title:</h4>
                  <div>
                    <?php if(isset($post_info['title'])){echo $post_info['title'];} ?>
                  </div>
                  <h4>Description:</h4>
                  <div>
                    <?php if(isset($post_info['description'])){echo $post_info['description'];} ?>
                  </div>
                  <h4>Post:</h4>
                  <div>
                    <?php if(isset($post_info['post'])){echo $post_info['post'];} ?>
                  </div>
                  <h4>Post category:</h4>
                  <div>
                    <?php if(isset($post_info['category_id'])){
                        foreach($post_categories as $post_category)
                        {
                            if($post_info['category_id'] == $post_category['id'])
                            {
                                echo $post_category['category'];
                            }
                        }
                    } ?>
                  </div>
                  <h4>Post type:</h4>
                  <div>
                  <?php if(isset($post_info['type_id'])){
                    foreach($post_types as $post_type)
                    {
                        if($post_info['type_id'] == $post_type['id'])
                        {
                            echo $post_type['type'];
                        }
                    }
                    } ?> 
                  </div>
                  <h4>Published?:</h4>
                  <div>
                  <?php if(isset($post_info['published'])){
                        if($post_info['published'] == 1)
                        {
                            echo 'Yes';
                        }
                        elseif($post_info['published'] == 0)
                        {
                            echo 'No';
                        }
                    } ?>
                  </div>
                  <h4>Last updated:</h4>
                  <div>
                    <?php if(isset($post_info['updated_at'])){echo date("F jS, Y", strtotime($post_info['updated_at']));} ?> 
                  </div>
                  <h4>Date created:</h4>
                  <div>
                    <?php if(isset($post_info['created_at'])){echo date("F jS, Y", strtotime($post_info['created_at']));} ?> 
                  </div>
              </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            document.getElementById('back').addEventListener('click', (e) => {
                e.preventDefault();
                window.history.back();
            });
        });
    </script>
    <?php
      if(isset($_POST['suspend-user']))
      {
        $post_id = $_POST['suspend-user'];
        $executed = suspend_user($post_id);
        if($executed)
        {
          $url = $host . 'user/' . $post_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['activate-user']))
      {
        $post_id = $_POST['activate-user'];
        $executed = activate_user($post_id);
        if($executed)
        {
          $url = $host . 'user/' . $post_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['delete-user']))
      {
        $post_id = $_POST['delete-user'];
        $executed = delete_single_row($post_id, 'users');
        if($executed)
        {
          $url = $host . 'all-users';
          redirect_to($url);
        }
      }
    ?>
<?php

    include('includes/footer.php');
    ckeditor();

?>