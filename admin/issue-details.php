<?php

include('includes/header.php');
bwajes_plus_header('issues', 'Issue details');
$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if(isset($_GET['id']))
{
  $issue_id = $_GET['id'];

  $issue = fetch_single_row($issue_id, 'issues');

  if($issue == false)
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
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'issues'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
          <div style="line-height: 1.625rem; margin: 10px;">
            <h4>First Name:</h4>
            <div>
                <?php if(isset($issue['first_name'])){echo $issue['first_name'];} ?>
            </div>
            <h4>Email:</h4>
            <div>
                <?php if(isset($issue['email'])){echo $issue['email'];} ?>
            </div>
            <h4>Subject:</h4>
            <div>
                <?php if(isset($issue['subject'])){echo $issue['subject'];} ?>
            </div>
            <h4>Feedback type:</h4>
            <div>
                <?php if(isset($issue['feedback_type'])){echo $issue['feedback_type'];} ?>
            </div>
            <h4>Comments:</h4>
            <div>
                <?php if(isset($issue['comments'])){echo $issue['comments'];} ?>
            </div>
            <h4>Version:</h4>
            <div>
                <?php if(isset($issue['version'])){echo $issue['version'];} ?>
            </div>
            <h4>Date reported:</h4>
            <div>
                <?php if(isset($issue['created_at'])){echo date("F jS, Y", strtotime($issue['created_at']));} ?>
            </div>
          </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
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