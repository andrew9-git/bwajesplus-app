<?php

include('includes/header.php');
bwajes_plus_header('post-category', 'Post category');

$id = $_SESSION['admin_data']['id'];
?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
                <h4 class="message-head">Create post categories</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-categories" class="btn btn-success">see categories</a>
                </div>
                <form id="post_category_form">
                    <div id="post_category_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_pc" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <label for="category">Category*</label>
                        <input type="text" name="post-category" class="form-control form_data_pc" placeholder="Enter category" id="category">
                    </div>
                    <button id="post_category" name="create-category" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        let form = document.getElementById('post_category_form');
        let post_category_button = document.getElementById('post_category');
        let post_category_messages = document.getElementById('post_category_messages');
        form.addEventListener('submit', post_category);

        function post_category(e)
        {
            e.preventDefault();
            post_category_button.disabled = true;

            let post_cat_btn_bg_col = post_category_button.style.backgroundColor;
            let post_cat_btn_border = post_category_button.style.border;
            let post_cat_btn_cursor = post_category_button.style.cursor;

            if(post_category_button.disabled == true)
            {
                post_category_button.style.backgroundColor = 'grey';
                post_category_button.style.border = 'grey';
                post_category_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_pc');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
             
              form_data.append(form_element[i].name, form_element[i].value);
            }

            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    post_category_button.disabled = false;

                    if(post_category_button.disabled == false)
                    {
                        post_category_button.style.backgroundColor = post_cat_btn_bg_col;
                        post_category_button.style.border = post_cat_btn_border;
                        post_category_button.style.cursor = post_cat_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    post_category_messages.innerHTML = response;
                  
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