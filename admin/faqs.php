<?php

include('includes/header.php');
bwajes_plus_header('faqs', 'FAQs');

$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');
?>

    <div class="home-content">
      <div class="post-area">
      <?php 
        if($admin['suspended'] != 1)
        {
      ?>
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">Create faqs for users</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-faqses" class="btn btn-success">see faqses</a>
                </div>
                <form id="create_faqs_form">
                    <div id="create_faqs_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_cf" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <label for="faq">FAQ*</label>
                        <input type="text" class="form-control form_data_cf" placeholder="Enter faq" id="faq" name="faq">
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer*</label>
                        <textarea class="form-control" name="answer" rows="5" id="answer"></textarea>
                    </div>
                    <button name="create-faq" id="create_faqs" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="card-footer"></div>
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

        let form = document.getElementById('create_faqs_form');
        let create_faqs_button = document.getElementById('create_faqs');
        let create_faqs_messages = document.getElementById('create_faqs_messages');
        form.addEventListener('submit', create_faqs);

        function create_faqs(e)
        {
            e.preventDefault();
            create_faqs_button.disabled = true;

            let crt_faqs_btn_bg_col = create_faqs_button.style.backgroundColor;
            let crt_faqs_btn_border = create_faqs_button.style.border;
            let crt_faqs_btn_cursor = create_faqs_button.style.cursor;

            if(create_faqs_button.disabled == true)
            {
                create_faqs_button.style.backgroundColor = 'grey';
                create_faqs_button.style.border = 'grey';
                create_faqs_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_cf');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
              form_data.append(form_element[i].name, form_element[i].value);
            }
            let answer = CKEDITOR.instances['answer'].getData();
            form_data.append('answer', answer);

            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    create_faqs_button.disabled = false;

                    if(create_faqs_button.disabled == false)
                    {
                        create_faqs_button.style.backgroundColor = crt_faqs_btn_bg_col;
                        create_faqs_button.style.border = crt_faqs_btn_border;
                        create_faqs_button.style.cursor = crt_faqs_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    create_faqs_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }

        let upload_url = '<?php echo $host . 'upload' ?>';

        CKEDITOR.replace('answer',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor',
            extraPlugins: 'justify',
            height: 300,
            filebrowserUploadUrl: upload_url,
            filebrowserUploadMethod: 'form'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>