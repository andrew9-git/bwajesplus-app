<?php

include('includes/header.php');
bwajes_plus_header('faqs', 'Each faqs');
$host='http://localhost:9090/bwajesplus-app/admin/';

$id = $_SESSION['admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if(isset($_GET['f']))
{
  $faq_id = $_GET['f'];

  $faq = fetch_single_row($faq_id, 'faqs');
}
else
{
  redirect_to('logout');
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
                <a href="<?php echo $host .'all-faqses'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>FAQ:</h4>
                <div>
                    <?php if(isset($faq['FAQ'])){echo $faq['FAQ'];} ?>
                </div>
                <h4>Answer:</h4>
                <div>
                    <?php if(isset($faq['answer'])){echo $faq['answer'];} ?>
                </div>
                <h4>Date created:</h4>
                <div>
                    <?php if(isset($faq['created_at'])){echo date("F jS, Y", strtotime($faq['created_at']));} ?>
                </div>
                <h4>Created by:</h4>
                <div>
                    <?php 
                    if(isset($faq['created_by']))
                    {
                      $created_by = fetch_single_row($faq['created_by'], 'admin');
                      echo ucfirst($created_by['first_name']) . ' ' . ucfirst($created_by['last_name']);
                    } 
                  ?>
                </div>
                <h4>Updated by:</h4>
                <div>
                    <?php 
                    if(isset($faq['updated_by']))
                    {
                      $updated_by = fetch_single_row($faq['updated_by'], 'admin');
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