<?php

include('includes/header.php');
bwajes_plus_header('post-type', 'Update post type');
$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if(isset($_GET['t']))
{
  $type_id = $_GET['t'];

  $type = fetch_single_row($type_id, 'post_type');

  if($type == false)
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
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="<?php echo $host .'all-types'; ?>" class="btn btn-success">back</a>
                </div>
                <form id="edit_type_form">
                    <div id="edit_type_messages">
                    </div>
                    <div class="form-group">
                    <input type="hidden" class="form-control form_data_et" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_et" name="type-id" value="<?php echo $type_id; ?>" id="type-id">
                    </div>
                    <div class="form-group">
                        <label for="type">Type*</label>
                        <input name="edit-type" type="text" class="form-control form_data_et" value="<?php echo $type['type']; ?>" id="type">
                    </div>
                    <button id="edit_type" name="update-type" class="btn btn-primary">Update</button>
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

        let form = document.getElementById('edit_type_form');
        let edit_type_button = document.getElementById('edit_type');
        let edit_type_messages = document.getElementById('edit_type_messages');
        form.addEventListener('submit', edit_type);

        function edit_type(e)
        {
            e.preventDefault();
            edit_type_button.disabled = true;

            let edt_type_btn_bg_col = edit_type_button.style.backgroundColor;
            let edt_type_btn_border = edit_type_button.style.border;
            let edt_type_btn_cursor = edit_type_button.style.cursor;

            if(edit_type_button.disabled == true)
            {
                edit_type_button.style.backgroundColor = 'grey';
                edit_type_button.style.border = 'grey';
                edit_type_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_et');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
             
              form_data.append(form_element[i].name, form_element[i].value);
            }

            let xhr = new XMLHttpRequest();

            let url = '<?php echo $host . 'process-ajax' ?>';
            
            xhr.open('POST', url);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    edit_type_button.disabled = false;

                    if(edit_type_button.disabled == false)
                    {
                        edit_type_button.style.backgroundColor = edt_type_btn_bg_col;
                        edit_type_button.style.border = edt_type_btn_border;
                        edit_type_button.style.cursor = edt_type_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    edit_type_messages.innerHTML = response;
                  
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