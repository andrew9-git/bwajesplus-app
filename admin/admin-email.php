<?php

include('includes/header.php');
bwajes_plus_header('admin-sent-emails', 'Admin sent email');
$host='http://localhost:9090/bwajesplus-app/admin/';

$id = $_SESSION['admin_data']['id'];
$host='http://localhost:9090/bwajesplus-app/admin/';

if(isset($_GET['aes']))
{
  $admin_email_id = $_GET['aes'];

  $admin_email = fetch_single_row($admin_email_id, 'admin_sent_emails');
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
                <a href="<?php echo $host .'admin-sent-emails'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Subject:</h4>
                <div>
                  <?php if(isset($admin_email['subject'])){echo $admin_email['subject'];} ?>
                </div>
                <h4>Body:</h4>
                <div>
                  <?php if(isset($admin_email['body'])){echo $admin_email['body'];} ?>
                </div>
                <h4>Number of users sent to:</h4>
                <div>
                  <?php $ab = db_row_count($admin_email_id, 'admin_sent_emails_id', 'email_tracking'); echo $ab; ?>
                </div>
                <h4>Number of users that opened mail:</h4>
                <div>
                  <?php 
                    $no = no_of_users_that_opened_mail($admin_email_id); 
                    echo $no;
                   ?>
                </div>
                <h4>Open rate:</h4>
                <div>
                  <?php 
                  if($ab > 0)
                  {
                    echo number_format((($no / $ab) * 100), 2, '.', '') . "%"; 
                  }
                  else
                  {
                    echo "Not sent to any user/person yet";
                  }
                  ?>
                </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo $host .'mail-opened-users/4'; ?>" class="btn btn-primary">see users that opened mail</a>
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>