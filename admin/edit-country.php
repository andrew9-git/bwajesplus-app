<?php

include('includes/header.php');
bwajes_plus_header('all-countries', 'Edit country');

$id = $_SESSION['bwajes_plus_admin_data']['id'];

$admin = fetch_single_row($id, 'admin');
$host='http://localhost:9090/bwajesplus-app/admin/';

if(isset($_GET['ctr']))
{
  $country_id = $_GET['ctr'];

  $country = fetch_single_row($country_id, 'countries');
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
            <div class="info-container">
                <a href="<?php echo $host .'all-countries'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
          <form id="edit_country_form">
              <div id="edit_country_messages">
              </div>
              <div class="form-group">
                    <input type="hidden" class="form-control form_data_ec" name="id" value="<?php echo $id; ?>" id="id">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_ec" name="country-id" value="<?php echo $country_id; ?>" id="country-id">
                </div>
                <div class="form-group">
                  <label for="country">Country*</label>
                  <input type="text" value="<?php echo $country['country']; ?>" class="form-control form_data_ec" name="edit-country" id="country">
                </div>
                <button id="edit_country" name="edit-country-btn" class="btn btn-success">Update country</button>
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

        let form = document.getElementById('edit_country_form');
        let edit_country_button = document.getElementById('edit_country');
        let edit_country_messages = document.getElementById('edit_country_messages');
        form.addEventListener('submit', edit_country);

        function edit_country(e)
        {
            e.preventDefault();
            edit_country_button.disabled = true;

            let edt_ctr_btn_bg_col = edit_country_button.style.backgroundColor;
            let edt_ctr_btn_border = edit_country_button.style.border;
            let edt_ctr_btn_cursor = edit_country_button.style.cursor;

            if(edit_country_button.disabled == true)
            {
                edit_country_button.style.backgroundColor = 'grey';
                edit_country_button.style.border = 'grey';
                edit_country_button.style.cursor = 'not-allowed';
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
                    edit_country_button.disabled = false;

                    if(edit_country_button.disabled == false)
                    {
                        edit_country_button.style.backgroundColor = edt_ctr_btn_bg_col;
                        edit_country_button.style.border = edt_ctr_btn_border;
                        edit_country_button.style.cursor = edt_ctr_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    edit_country_messages.innerHTML = response;
                  
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