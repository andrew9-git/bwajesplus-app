<?php

include('includes/header.php');
bwajes_plus_header('users-statistics', 'User statistics');
$host='http://localhost:9090/bwajesplus-app/admin/';

if(isset($_GET['u']))
{
  $user_id = $_GET['u'];

  $user_stat = fetch_single_row($user_id, 'user_statistics', 'user_id');

}
else
{
  redirect_to('logout');
}
?>

<div class="home-content">
      <div class="post-area">
        <div class="info-container">
            <a href="<?php echo $host .'users-statistics'; ?>" class="btn btn-success">back</a>
        </div>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
                  <h4>Browser:</h4>
                  <div>
                      <?php if(isset($user_stat['browser'])){echo $user_stat['browser'];} ?>
                  </div>
                  <h4>OS:</h4>
                  <div>
                      <?php if(isset($user_stat['os'])){echo $user_stat['os'];} ?>
                  </div>
                  <h4>Device name:</h4>
                  <div>
                      <?php if(isset($user_stat['device_name'])){echo $user_stat['device_name'];} ?>
                  </div>
                  <h4>Last visited:</h4>
                  <div>
                      <?php if(isset($user_stat['last_logout'])){echo date("F jS, Y", strtotime($user_stat['last_logout']));} ?>
                  </div>
                  <h4>Last login:</h4>
                  <div>
                  <?php if(isset($user_stat['last_login'])){echo date("F jS, Y", strtotime($user_stat['last_login']));} ?>
                  </div>
              </div>
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