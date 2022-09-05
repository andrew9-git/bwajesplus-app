<?php

include('includes/header.php');
bwajes_plus_header('user-sent-emails', 'User sent email');

$id = $_SESSION['admin_data']['id'];
$host='http://localhost:9090/bwajesplus-app/admin/';

if(isset($_GET['ues']))
{
  $user_email_id = $_GET['ues'];

  $user_email = fetch_single_row($user_email_id, 'user_sent_emails');
}
else
{
  redirect_to('logout');
}
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'user-sent-emails'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Subject:</h4>
                <div>
                  <?php if(isset($user_email['title'])){echo $user_email['title'];} ?>
                </div>
                <h4>Body:</h4>
                <div>
                  <?php if(isset($user_email['message'])){echo $user_email['message'];} ?>
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