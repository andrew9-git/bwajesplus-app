<?php

include('includes/header.php');
bwajes_plus_header('faqs', 'Update FAQ');
$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

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
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="<?php echo $host .'all-faqses'; ?>" class="btn btn-success">back</a>
                </div>
                <form id="edit_faqs_form">
                    <div id="edit_faqs_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_ef" name="admin-id" value="<?php echo $id; ?>" id="admin-id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_ef" name="faq-id" value="<?php echo $faq_id; ?>" id="faq-id">
                    </div>
                    <div class="form-group">
                        <label for="faqs">FAQs*</label>
                        <input type="text" class="form-control form_data_ef" value="<?php echo $faq['FAQ']; ?>" id="faqs" name="edit-faqs">
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer*</label>
                        <textarea class="form-control" rows="5" id="answer" name="answer"><?php echo $faq['answer']; ?></textarea>
                    </div>
                    <button name="update-faqs" id="edit_faqs" class="btn btn-primary">Update</button>
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

        let form = document.getElementById('edit_faqs_form');
        let edit_faqs_button = document.getElementById('edit_faqs');
        let edit_faqs_messages = document.getElementById('edit_faqs_messages');
        form.addEventListener('submit', edit_faqs);

        function edit_faqs(e)
        {
            e.preventDefault();
            edit_faqs_button.disabled = true;

            let edit_faqs_btn_bg_col = edit_faqs_button.style.backgroundColor;
            let edit_faqs_btn_border = edit_faqs_button.style.border;
            let edit_faqs_btn_cursor = edit_faqs_button.style.cursor;

            if(edit_faqs_button.disabled == true)
            {
                edit_faqs_button.style.backgroundColor = 'grey';
                edit_faqs_button.style.border = 'grey';
                edit_faqs_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_ef');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
              form_data.append(form_element[i].name, form_element[i].value);
            }
            let answer = CKEDITOR.instances['answer'].getData();
            form_data.append('answer', answer);

            let xhr = new XMLHttpRequest();

            let url = '<?php echo $host . 'process-ajax' ?>';
            
            xhr.open('POST', url);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    edit_faqs_button.disabled = false;

                    if(edit_faqs_button.disabled == false)
                    {
                        edit_faqs_button.style.backgroundColor = edit_faqs_btn_bg_col;
                        edit_faqs_button.style.border = edit_faqs_btn_border;
                        edit_faqs_button.style.cursor = edit_faqs_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    edit_faqs_messages.innerHTML = response;
                  
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