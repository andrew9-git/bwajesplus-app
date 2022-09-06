<?php

include('includes/header.php');
bwajes_plus_header('post-category', 'Each post category');
$host='http://localhost:9090/bwajesplus-app/admin/';

$id = $_SESSION['admin_data']['id'];

if(isset($_GET['c']))
{
  $category_id = $_GET['c'];

  $category = fetch_single_row($category_id, 'post_category');
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
                <a href="<?php echo $host .'all-categories'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Category:</h4>
                <div>
                  <?php if(isset($category['category'])){echo $category['category'];} ?>
                </div>
                <h4>Date created:</h4>
                <div>
                  <?php if(isset($category['created_at'])){echo date("F jS, Y", strtotime($category['created_at']));} ?>
                </div>
                <h4>Last updated:</h4>
                <div>
                  <?php if(isset($category['updated_at'])){echo date("F jS, Y", strtotime($category['updated_at']));} ?>
                </div>
                <h4>Created by:</h4>
                <div>
                  <?php 
                    if(isset($category['created_by']))
                    {
                      $created_by = fetch_single_row($category['created_by'], 'admin');
                      echo ucfirst($created_by['first_name']) . ' ' . ucfirst($created_by['last_name']);
                    } 
                  ?>
                </div>
                <h4>Updated by:</h4>
                <div>
                  <?php 
                    if(isset($category['updated_by']))
                    {
                      $updated_by = fetch_single_row($category['updated_by'], 'admin');
                      echo ucfirst($updated_by['first_name']) . ' ' . ucfirst($updated_by['last_name']);
                    } 
                  ?>
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