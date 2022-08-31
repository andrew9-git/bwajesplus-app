<?php

include('includes/header.php');
bwajes_plus_header('create-report', 'Edit report');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>
    <?php 
      if(isset($_GET['r']))
      {
        $report_id = $_GET['r'];

        $report = fetch_single_row($report_id, 'reports');
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
            <div class="info-container">
                <a href="<?php echo $host .'all-reports'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <form id="edit_report_form">
              <div id="edit_report_messages">
              </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_er" name="admin-id" value="<?php echo $admin_id; ?>" id="admin-id">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_er" name="report-id" value="<?php echo $report_id; ?>" id="report-id">
                </div>
                <div class="form-group">
                  <label for="report">Report*</label>
                  <input type="text" value="<?php echo $report['report']; ?>" class="form-control form_data_er" name="edit-report" id="report">
                </div>
                <button name="update-report" id="edit_report" class="btn btn-primary">Update report</button>
            </form>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      let form = document.getElementById('edit_report_form');
      let edit_report_button = document.getElementById('edit_report');
      let edit_report_messages = document.getElementById('edit_report_messages');
      form.addEventListener('submit', edit_report);

      function edit_report(e)
      {
        e.preventDefault();
        edit_report_button.disabled = true;

        let edit_report_btn_bg_col = edit_report_button.style.backgroundColor;
        let edit_report_btn_border = edit_report_button.style.border;
        let edit_report_btn_cursor = edit_report_button.style.cursor;

        if(edit_report_button.disabled == true)
        {
            edit_report_button.style.backgroundColor = 'grey';
            edit_report_button.style.border = 'grey';
            edit_report_button.style.cursor = 'not-allowed';
        }

        let form_element = document.getElementsByClassName('form_data_er');
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
                edit_report_button.disabled = false;

                if(edit_report_button.disabled == false)
                {
                    edit_report_button.style.backgroundColor = edit_report_btn_bg_col;
                    edit_report_button.style.border = edit_report_btn_border;
                    edit_report_button.style.cursor = edit_report_btn_cursor;
                }

                let response = xhr.responseText;
                const pattern = /Success!/;
                let regex = pattern.test(response);
                if(regex === true)
                {
                  form.reset();
                  setInterval(() => {window.history.back();}, 3000);
                  
                }
                edit_report_messages.innerHTML = response;
              
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