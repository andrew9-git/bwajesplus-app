<?php

include('includes/header.php');
bwajes_plus_header('post-category', 'Update post category');
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
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="<?php echo $host .'all-categories'; ?>" class="btn btn-success">back</a>
                </div>
                <form id="edit_category_form">
                    <div id="edit_category_messages">
                    </div>
                    <div class="form-group">
                    <input type="hidden" class="form-control form_data_ec" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_ec" name="category-id" value="<?php echo $category_id; ?>" id="category-id">
                    </div>
                    <div class="form-group">
                        <label for="category">Category*</label>
                        <input type="text" name="edit-category" class="form-control form_data_ec" value="<?php echo $category['category']; ?>" id="category">
                    </div>
                    <button id="edit_category" name="update-category" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        let form = document.getElementById('edit_category_form');
        let edit_category_button = document.getElementById('edit_category');
        let edit_category_messages = document.getElementById('edit_category_messages');
        form.addEventListener('submit', edit_category);

        function edit_category(e)
        {
            e.preventDefault();
            edit_category_button.disabled = true;

            let edt_cgy_btn_bg_col = edit_category_button.style.backgroundColor;
            let edt_cgy_btn_border = edit_category_button.style.border;
            let edt_cgy_btn_cursor = edit_category_button.style.cursor;

            if(edit_category_button.disabled == true)
            {
                edit_category_button.style.backgroundColor = 'grey';
                edit_category_button.style.border = 'grey';
                edit_category_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_ec');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
             
              form_data.append(form_element[i].name, form_element[i].value);
            }

            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    edit_category_button.disabled = false;

                    if(edit_category_button.disabled == false)
                    {
                        edit_category_button.style.backgroundColor = edt_cgy_btn_bg_col;
                        edit_category_button.style.border = edt_cgy_btn_border;
                        edit_category_button.style.cursor = edt_cgy_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    edit_category_messages.innerHTML = response;
                  
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