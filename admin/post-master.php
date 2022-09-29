<?php

include('includes/header.php');
bwajes_plus_header('post-master', 'Post master');

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
                <h4 class="message-head">Message Users and/or Others</h4>
            </div>
            <div class="card-body">
                <form id="create_master_form" enctype="multipart/form-data">
                    <div id="create_master_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form_data_master" name="id" value="<?php echo $id; ?>" id="id">
                    </div>
                    <div class="form-group">
                        <label for="support">Choose Support Department*</label>
                        <select class="form-control form_data_master" name="support" id="support">
                        <option value="S">Choose support</option>
                        <option value="myphptestemail@gmail.com">General Support</option><!-- support@bwajes-plus.andadel.com -->
                        <option value="it@bwajes-plus.andadel.com">IT Support</option>
                        <option value="admin@bwajes-plus.andadel.com">Adminstration Support</option>
                        <option value="billing@bwajes-plus.andadel.com">Billing Support</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sender">Sender</label>
                        <input type="text" class="form-control form_data_master" name="sender" value="" id="sender">
                    </div>
                    <div class="form-group">
                        <label for="list">Send to*</label>
                        <select class="form-control form_data_master" name="list" id="list">
                        <option value="S">Select recipients</option>
                        <option value="all">All</option>
                        <option value="registered-users">Registered users only</option>
                        <option value="subscribers">Subscribers only</option>
                        <option value="commenters">Commenters only</option>
                        <option value="issuers">Feedback givers only</option>
                        <option value="S">-------- Special list --------</option>
                        <option value="payers">Ad removal subscribers (All sub users)</option>
                        <option value="payers-1">Ad removal subscribers (unexpired sub users)</option>
                        <option value="payers-2">Ad removal subscribers (expired sub users)</option>
                        <option value="payers-3">Ad removal subscribers (All sub non-users)</option>
                        <option value="deleted-users">Deleted users</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject*</label>
                        <input type="text" class="form-control form_data_master" placeholder="Enter subject" id="subject" name="subject">
                    </div>
                    <div class="form-group" id="salutation-div">
                        <label for="salutation">Salutation</label>
                        <input type="text" class="form-control form_data_master" name="salutation" value="" id="salutation">
                    </div>
                    <div class="form-group">
                        <label for="message">Message*</label>
                        <textarea class="form-control" name="post-master" rows="5" id="message"></textarea>
                    </div>
                    <button id="create_master" name="send-mail" class="btn btn-primary">Send</button>
                </form>
            </div>
            <div class="card-footer">
                <div class="info-container">
                <a href="email-list" class="btn btn-success">See email stats</a>
                </div>
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


        let salutation_div = document.getElementById('salutation-div');
        let list = document.getElementById('list');

        salutation_div.style.display = "none";

        list.addEventListener('change', ()=>{
            if(list.value == "registered-users")
            {
                salutation_div.style.display = "block";
            }
            else if(list.value == "payers" || list.value == "payers-1" || list.value == "payers-2")
            {
                salutation_div.style.display = "block";
            }
            else if(list.value == "deleted-users")
            {
                salutation_div.style.display = "block";
            }
            else
            {
                salutation_div.style.display = "none";
            }
        });

        let form = document.getElementById('create_master_form');
        let create_master_button = document.getElementById('create_master');
        let create_master_messages = document.getElementById('create_master_messages');
        form.addEventListener('submit', create_master);

        function create_master(e)
        {
            e.preventDefault();
            create_master_button.disabled = true;

            let crt_master_btn_bg_col = create_master_button.style.backgroundColor;
            let crt_master_btn_border = create_master_button.style.border;
            let crt_master_btn_cursor = create_master_button.style.cursor;

            if(create_master_button.disabled == true)
            {
                create_master_button.style.backgroundColor = 'grey';
                create_master_button.style.border = 'grey';
                create_master_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_master');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
                form_data.append(form_element[i].name, form_element[i].value);               
            }
            let message = CKEDITOR.instances['message'].getData();
            
            form_data.append('post-master', message);
            
            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    create_master_button.disabled = false;

                    if(create_master_button.disabled == false)
                    {
                        create_master_button.style.backgroundColor = crt_master_btn_bg_col;
                        create_master_button.style.border = crt_master_btn_border;
                        create_master_button.style.cursor = crt_master_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    create_master_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }

        CKEDITOR.replace('message',
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