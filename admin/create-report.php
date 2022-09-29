<?php

include('includes/header.php');
bwajes_plus_header('create-report', 'Create report');

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
            <div class="info-container">
                <a href="all-reports" class="btn btn-success">see all reports</a>
            </div>
          </div>
          <div class="card-body">
            <form id="create_report_form">
              <div id="create_report_messages">
              </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_report" name="id" value="<?php echo $id; ?>" id="id">
                </div>
                <div class="form-group">
                  <label for="report">Report*</label>
                  <input type="text" class="form-control form_data_report" name="report" id="report">
                </div>
                <button id="create_report" name="create-report" class="btn btn-primary">Create report</button>
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

        let form = document.getElementById('create_report_form');
        let form_data_report_button = document.getElementById('create_report');
        let form_data_report_messages = document.getElementById('create_report_messages');
        form.addEventListener('submit', create_report);

        function create_report(e)
        {
            e.preventDefault();
            form_data_report_button.disabled = true;

            let crt_rpt_btn_bg_col = form_data_report_button.style.backgroundColor;
            let crt_rpt_btn_border = form_data_report_button.style.border;
            let crt_rpt_btn_cursor = form_data_report_button.style.cursor;

            if(form_data_report_button.disabled == true)
            {
                form_data_report_button.style.backgroundColor = 'grey';
                form_data_report_button.style.border = 'grey';
                form_data_report_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_report');
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
                    form_data_report_button.disabled = false;

                    if(form_data_report_button.disabled == false)
                    {
                        form_data_report_button.style.backgroundColor = crt_rpt_btn_bg_col;
                        form_data_report_button.style.border = crt_rpt_btn_border;
                        form_data_report_button.style.cursor = crt_rpt_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    form_data_report_messages.innerHTML = response;
                  
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