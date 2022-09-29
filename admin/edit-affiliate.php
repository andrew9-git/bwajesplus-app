<?php

include('includes/header.php');
bwajes_plus_header('all-affiliates', 'Edit affiliate programme');

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');
$host = url()[0];

if(isset($_GET['af']))
{
  $affiliate_id = $_GET['af'];

  $affiliate = fetch_single_row($affiliate_id, 'affiliate_programmes');
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
                <a href="<?php echo $host .'all-affiliates'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
          <form id="edit_affiliate_form" enctype="multipart/form-data">
              <div id="edit_affiliate_messages">
              </div>
              <div class="form-group">
                    <input type="hidden" class="form-control form_data_ea" name="id" value="<?php echo $id; ?>" id="id">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_ea" name="affiliate-id" value="<?php echo $affiliate_id; ?>" id="affiliate-id">
                </div>
                <div class="form-group">
                  <label for="affiliate-url">Affiliate url*</label>
                  <input type="text" class="form-control form_data_ea" name="edit-affiliate-url" value="<?php echo $affiliate['url']; ?>" id="affiliate-url">
                </div>
                <div class="form-group">
                    <label for="company-name">Company's name*</label>
                    <input type="text" class="form-control form_data_ea" name="company-name" value="<?php echo $affiliate['name']; ?>" id="company-name">
                </div>
                <div class="form-group">
                  <label for="upload-photo">Company's photo*</label><br>
                  <span>Current company photo: <?php echo $affiliate['image'] ?></span>
                  <input type="file" name="company-photo" class="form-control" id="upload-photo" accept="image/*">
                </div>
                <button id="edit_affiliate" name="edit-affiliate" class="btn btn-success">Edit affiliate programme</button>
            </form>
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
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        let form = document.getElementById('edit_affiliate_form');
        let edit_affiliate_button = document.getElementById('edit_affiliate');
        let edit_affiliate_messages = document.getElementById('edit_affiliate_messages');
        form.addEventListener('submit', edit_affiliate);

        function edit_affiliate(e)
        {
            e.preventDefault();
            edit_affiliate_button.disabled = true;

            let crt_aff_btn_bg_col = edit_affiliate_button.style.backgroundColor;
            let crt_aff_btn_border = edit_affiliate_button.style.border;
            let crt_aff_btn_cursor = edit_affiliate_button.style.cursor;

            if(edit_affiliate_button.disabled == true)
            {
                edit_affiliate_button.style.backgroundColor = 'grey';
                edit_affiliate_button.style.border = 'grey';
                edit_affiliate_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_ea');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
             
              form_data.append(form_element[i].name, form_element[i].value);
            }

            if(document.querySelector('#upload-photo').files[0])
            {
              form_data.append('company-photo', document.querySelector('#upload-photo').files[0]);
            }

            let xhr = new XMLHttpRequest();

            let url = '<?php echo $host . 'process-ajax' ?>';
            
            xhr.open('POST', url);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    edit_affiliate_button.disabled = false;

                    if(edit_affiliate_button.disabled == false)
                    {
                        edit_affiliate_button.style.backgroundColor = crt_aff_btn_bg_col;
                        edit_affiliate_button.style.border = crt_aff_btn_border;
                        edit_affiliate_button.style.cursor = crt_aff_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    edit_affiliate_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>