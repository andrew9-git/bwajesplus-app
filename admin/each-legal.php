<?php

include('includes/header.php');
bwajes_plus_header('legal', 'Each legal');
$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

$admin = fetch_single_row($id, 'admin');

if($admin['admin_type'] != 1)
{
  redirect_to($host . 'logout');
}

if(isset($_GET['l']))
{
  $legal_id = $_GET['l'];

  $legal = fetch_single_row($legal_id, 'legal');

  if($legal == false)
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
                <a href="<?php echo $host .'all-legals'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Name:</h4>
                <div>
                    <?php if(isset($legal['name'])){echo $legal['name'];} ?>
                </div>
                <h4>Content:</h4>
                <div>
                    <?php if(isset($legal['content'])){echo $legal['content'];} ?>
                </div>
                <h4>Date created:</h4>
                <div>
                    <?php if(isset($legal['created_at'])){echo date("F jS, Y", strtotime($legal['created_at']));} ?>
                </div>
                <h4>Last updated:</h4>
                <div>
                    <?php if(isset($legal['updated_at'])){echo date("F jS, Y", strtotime($legal['updated_at']));} ?>
                </div>
                <h4>Created by:</h4>
                <div>
                    <?php 
                    if(isset($legal['created_by']))
                    {
                      $created_by = fetch_single_row($legal['created_by'], 'admin');
                      echo ucfirst($created_by['first_name']) . ' ' . ucfirst($created_by['last_name']);
                    } 
                  ?>
                </div>
                <h4>Updated by:</h4>
                <div>
                    <?php 
                    if(isset($legal['updated_by']))
                    {
                      $updated_by = fetch_single_row($legal['updated_by'], 'admin');
                      echo ucfirst($updated_by['first_name']) . ' ' . ucfirst($updated_by['last_name']);
                    } 
                  ?>
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