<?php

include('includes/header.php');
bwajes_plus_header('legal', 'Legal');

$id = $_SESSION['admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if($admin['admin_type'] != 1)
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
                <h4 class="message-head">Legality of app usage by users</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-legals" class="btn btn-success">see legals</a>
                </div>
                <form id="create_legal_form" enctype="multipart/form-data">
                    <div id="create_legal_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_legal" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control form_data_legal" placeholder="Enter name" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="content">Content*</label>
                        <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                    </div>
                    <button id="create_legal" name="create-legal" class="btn btn-primary">Create</button>
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

        let form = document.getElementById('create_legal_form');
        let create_legal_button = document.getElementById('create_legal');
        let create_legal_messages = document.getElementById('create_legal_messages');
        form.addEventListener('submit', create_legal);

        function create_legal(e)
        {
            e.preventDefault();
            create_legal_button.disabled = true;

            let crt_legal_btn_bg_col = create_legal_button.style.backgroundColor;
            let crt_legal_btn_border = create_legal_button.style.border;
            let crt_legal_btn_cursor = create_legal_button.style.cursor;

            if(create_legal_button.disabled == true)
            {
                create_legal_button.style.backgroundColor = 'grey';
                create_legal_button.style.border = 'grey';
                create_legal_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_legal');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
                form_data.append(form_element[i].name, form_element[i].value);               
            }
            let content = CKEDITOR.instances['content'].getData();
            
            form_data.append('content', content);
            
            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    create_legal_button.disabled = false;

                    if(create_legal_button.disabled == false)
                    {
                        create_legal_button.style.backgroundColor = crt_legal_btn_bg_col;
                        create_legal_button.style.border = crt_legal_btn_border;
                        create_legal_button.style.cursor = crt_legal_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    create_legal_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }

        CKEDITOR.replace('content',
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