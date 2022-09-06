<?php

include('includes/header.php');
bwajes_plus_header('legal', 'Update legal');
$host='http://localhost:9090/bwajesplus-app/admin/';

if(isset($_GET['l']))
{
  $legal_id = $_GET['l'];

  $legal = fetch_single_row($legal_id, 'legal');
}
else
{
  redirect_to('logout');
}

$admin_id = $_SESSION['admin_data']['id'];
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="<?php echo $host .'all-legals'; ?>" class="btn btn-success">back</a>
                </div>
                <form id="edit_legal_form" enctype="multipart/form-data">
                    <div id="edit_legal_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_el" name="admin-id" value="<?php echo $admin_id; ?>" id="admin-id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_el" name="legal-id" value="<?php echo $legal_id; ?>" id="legal-id">
                    </div>
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control form_data_el" value="<?php echo $legal['name']; ?>" id="name" name="edit-name">
                    </div>
                    <div class="form-group">
                        <label for="content">Content*</label>
                        <textarea class="form-control" rows="5" id="content" name="edit-content"><?php echo $legal['content']; ?></textarea>
                    </div>
                    <button id="edit_legal" name="update-legal" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        // document.getElementById('back').addEventListener('click', (e) => {
        //     e.preventDefault();
        //     window.history.back();
        // });

        let form = document.getElementById('edit_legal_form');
        let edit_legal_button = document.getElementById('edit_legal');
        let edit_legal_messages = document.getElementById('edit_legal_messages');
        form.addEventListener('submit', edit_legal);

        function edit_legal(e)
        {
            e.preventDefault();
            edit_legal_button.disabled = true;

            let edit_legal_btn_bg_col = edit_legal_button.style.backgroundColor;
            let edit_legal_btn_border = edit_legal_button.style.border;
            let edit_legal_btn_cursor = edit_legal_button.style.cursor;

            if(edit_legal_button.disabled == true)
            {
                edit_legal_button.style.backgroundColor = 'grey';
                edit_legal_button.style.border = 'grey';
                edit_legal_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_el');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
                form_data.append(form_element[i].name, form_element[i].value);
              
            }
            let content = CKEDITOR.instances['content'].getData();
            
            form_data.append('edit-content', content);

            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    edit_legal_button.disabled = false;

                    if(edit_legal_button.disabled == false)
                    {
                        edit_legal_button.style.backgroundColor = edit_legal_btn_bg_col;
                        edit_legal_button.style.border = edit_legal_btn_border;
                        edit_legal_button.style.cursor = edit_legal_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                      setInterval(() => {window.history.back();}, 3000);
                      
                    }
                    edit_legal_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }

        CKEDITOR.replace('edit-content',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor',
            extraPlugins: 'justify',
            height: 300,
            filebrowserUploadUrl: 'http://localhost:9090/bwajesplus-app/admin/upload',
            filebrowserUploadMethod: 'form'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>