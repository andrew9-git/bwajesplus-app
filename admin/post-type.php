<?php

include('includes/header.php');
bwajes_plus_header('post-type', 'Post type');

$id = $_SESSION['admin_data']['id'];
?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
                <h4 class="message-head">Create post types</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-types" class="btn btn-success">see types</a>
                </div>
                <form id="post_type_form">
                    <div id="post_type_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_pt" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <label for="type">Type*</label>
                        <input type="text" name="post-type" class="form-control form_data_pt" placeholder="Enter type" id="type">
                    </div>
                    <button id="post_type" name="create-type" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        let form = document.getElementById('post_type_form');
        let post_type_button = document.getElementById('post_type');
        let post_type_messages = document.getElementById('post_type_messages');
        form.addEventListener('submit', post_type);

        function post_type(e)
        {
            e.preventDefault();
            post_type_button.disabled = true;

            let post_type_btn_bg_col = post_type_button.style.backgroundColor;
            let post_type_btn_border = post_type_button.style.border;
            let post_type_btn_cursor = post_type_button.style.cursor;

            if(post_type_button.disabled == true)
            {
                post_type_button.style.backgroundColor = 'grey';
                post_type_button.style.border = 'grey';
                post_type_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_pt');
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
                    post_type_button.disabled = false;

                    if(post_type_button.disabled == false)
                    {
                        post_type_button.style.backgroundColor = post_type_btn_bg_col;
                        post_type_button.style.border = post_type_btn_border;
                        post_type_button.style.cursor = post_type_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    post_type_messages.innerHTML = response;
                  
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