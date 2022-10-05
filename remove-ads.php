<?php

include('includes/header.php');
bwajes_plus_header('remove-ads', 'Remove ads');

?>


<?php 
    $id = $_SESSION['bwajes_plus_user_data']['id'];

    $count = db_row_count($id, 'user_id', 'posts', 'int');
    if($count == 0)
    {
        redirect_to('logout');
    }
?>
    <div class="home-content">
      <div class="post-area">
        <?php afiliate_programme_codes_wrapper($id); ?>
        <?php 
        $user = fetch_single_row($id, 'users');
        if($user['suspended'] != 1)
        {
        ?>
        <div class="card">
            <div class="card-header flex"></div>
            <?php
                if(isset($_GET['success']))
                {
                    $count = db_row_count($id, 'user_id', 'payment_subscriptions', 'int');
                    if($count > 0)
                    {
                        $row = fetch_single_row_in_payment($id, 'user_id');
                        $end_date = date('Y-m-d H:i:s', strtotime($row['end_date']));
                        if($_GET['success'] == 'true' && date('Y-m-d H:i:s') < $end_date && $row['state'] != 'Cancelled')
                        {
                            echo '<div class="ShowHide" style="background-color: #28a745;" id="Bar-msg">
                            <div id="left">
                            <div style="margin-top:4%;">Thank you '.$_SESSION['bwajes_plus_user_data']['first_name'].'. Your payment was successful.</div>
                            </div>
                            <div id="right">
                            <a href="#" id="hide-times-msg">X</a>
                            </div>
                        </div>';
                        }
                    }
                    
                    if($_GET['success'] == 'false')
                    {
                        echo '<div class="ShowHide" style="background-color: #ccc;" id="Bar-msg">
                        <div id="left" style="color: #111;">
                        <div style="margin-top:4%;">Hi '.$_SESSION['bwajes_plus_user_data']['first_name'].'. Please select a plan.</div>
                        </div>
                        <div id="right">
                        <a href="#" id="hide-times-msg">X</a>
                        </div>
                        </div>';
                    }
                }
                ?>

                <?php
                if(isset($_GET['cancelled']) && $_GET['cancelled'] == 'true')
                {
                    $row = fetch_single_row_in_payment($id, 'user_id');
                    $state = $row['state'];
                    if($state == 'Cancelled')
                    {
                        echo '<div style="background-color: #dc3545;"   class="ShowHide" id="Bar-msg">
                        <div id="left">
                            <div style="margin-top:4%;">
                            You have successfully cancelled your subscription.
                            </div>
                        </div>
                        <div id="right">
                          <a href="#" id="hide-times-msg">X</a>
                        </div>
                      </div>';  
                    }
                }
                ?>
            <div class="card-body ads">
                <?php 
                $count = db_row_count($id, 'user_id', 'payment_subscriptions', 'int');
                if($count > 0)
                {
                    $row = fetch_single_row_in_payment($id, 'user_id');
                    $end_date = date('Y-m-d H:i:s', strtotime($row['end_date']));

                    //When subscription is active and unexpired
                    if($row['state'] == 'Active' && date('Y-m-d H:i:s') < $end_date)
                    { ?>
                    <div class="ad-removal cancel">
                        <div>
                            Your subcription to bwajes+ ads removal helps us to make better software for you and your business(es).
                        </div>
                        <div>
                            <form id="cancel_subscription_form">
                                <div id="cancel_subscription_messages"></div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control form_data_cancel" value="<?php echo $_SESSION['bwajes_plus_user_data']['id']; ?>" name="user-id">
                                </div>
                                <button name="cancel-sub" id="cancel-subscription" class="btn btn-danger">Cancel subscription</button>
                            </form>
                        </div>
                    </div> 
                    <?php 
                    }

                    //When subscription is cancelled and unexpired
                    elseif($row['state'] == 'Cancelled' && date('Y-m-d H:i:s') < $end_date)
                    { ?>
                    <div class="ad-removal expires">
                        Your subscription won't be renewed when its expires on <?php echo date("F jS, Y", strtotime($row['end_date'])); ?> 
                    </div>
                    <?php } else { ?>
                    <div class="ad-removal renew">
                        <div class="support">
                            By subscribing to bwajes+ ads removal, you get to support us in making a better software for you and your business(es).
                        </div>
                        <div class="plan">
                            <form id="remove_ads_form">
                                <div id="remove_ads_messages"></div>
                                <div id="price-tag-div">
                                    <div id="price-tag"></div>
                                </div>
                                <div class="form-group">
                                    <label for="interval">Renew ad removal for every:</label>
                                    <select class="form-control form_data_ads" name="interval" id="interval">
                                    <option value="S">Please select plan</option>
                                    <option value="12">1 year</option>
                                    <option value="6">6 months</option>
                                    <option value="3">3 months</option>
                                    <option value="1">1 month</option>
                                    </select>
                                </div>
                                <button type="submit" id="remove_ads" name="remove-ads" class="btn btn-success">Remove ads</button>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                <?php }
                else
                {

                 ?>
                <div class="ad-removal renew">
                    <div class="support">
                        By subscribing to bwajes+ ads removal, you get to support us in making a better software for you and your business(es). 
                    </div>
                    <div class="plan">
                        <form id="remove_ads_form">
                            <div id="remove_ads_messages"></div>
                            <div id="price-tag-div"><span id="price-tag"></span></div>
                            <div class="form-group">
                          <label for="interval">Renew ad removal for every:</label>
                          <select class="form-control form_data_ads" name="interval" id="interval">
                          <option value="S">Please select plan</option>
                          <option value="12">1 year</option>
                          <option value="6">6 months</option>
                          <option value="3">3 months</option>
                          <option value="1">1 month</option>
                          </select><br>
                            <button type="submit" id="remove_ads" name="remove-ads" class="btn btn-success">Remove ads</button><br>
                        </form>
                    </div>
                </div>
                <?php } ?>
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
                    For more information, or if you think your account was suspended by mistake, please message admin
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
        <?php } ?>
        <div class="card-footer"></div>
      </div>
    </div>
    <?php $price = fetch_single_row(1, 'payment_prices');?>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        //DOM manipulation for price tag
        let price_tag = document.getElementById('price-tag');
        let price_tag_div = document.getElementById('price-tag-div');
        let interval = document.getElementById('interval');

        if(price_tag_div)
        {
            price_tag_div.style.display = 'none';
            interval.addEventListener('change', () => {
    
                price_tag_div.style.display = 'block';
    
                for(let i = 0; i < interval.options.length; i++)
                {
                    if(interval.options[i].selected == true && interval.options[i].value != 'S')
                    {
                        let intervalValue = Number(interval.options[i].value);

                        let amount = <?php echo $price['amount_per_month']; ?>

                        let rate = <?php echo $price['rate']; ?>

                        amount = amount * (1 + ((Number(rate)/100) / intervalValue)) * intervalValue;

                        let amountValue = amount.toFixed(2);
                        
                        price_tag.innerHTML = '$' + amountValue;
                    }
                    else if(interval.options[i].selected == true && interval.options[i].value == 'S')
                    {
                        price_tag_div.style.display = 'none';
    
                    }
                }
            });
        }

        //ajax for cancelling subscription
        let cancel = document.getElementById('cancel_subscription_form');

        if(cancel)
        {
            let cancel_subscription_button = document.getElementById('cancel-subscription');
            let cancel_subscription_messages = document.getElementById('cancel_subscription_messages');
            cancel.addEventListener('submit', (e) => {

                e.preventDefault();
    
                cancel_subscription_button.disabled = true;
    
                let ads_btn_bg_col = cancel_subscription_button.style.backgroundColor;
                let ads_btn_border = cancel_subscription_button.style.border;
                let ads_btn_cursor = cancel_subscription_button.style.cursor;
    
                if(cancel_subscription_button.disabled == true)
                {
                    cancel_subscription_button.style.backgroundColor = 'grey';
                    cancel_subscription_button.style.border = 'grey';
                    cancel_subscription_button.style.cursor = 'not-allowed';
                }
    
                let form_element = document.getElementsByClassName('form_data_cancel');
                let form_data = new FormData();
    
                for(let i = 0; i < form_element.length; i++)
                {
                    form_data.append(form_element[i].name, form_element[i].value);
                }
    
                let xhr = new XMLHttpRequest();
                
                xhr.open('POST', 'billing/cancelAgreement');
    
                xhr.onload = function()
                {
                    if(this.status == 200)
                    {
                        cancel_subscription_button.disabled = false;
    
                        if(cancel_subscription_button.disabled == false)
                        {
                            cancel_subscription_button.style.backgroundColor = ads_btn_bg_col;
                            cancel_subscription_button.style.border = ads_btn_border;
                            cancel_subscription_button.style.cursor = ads_btn_cursor;
                        }

                        let response = xhr.responseText;
                        const pattern = /remove/;
                        let regex = pattern.test(response);
                        if(regex === true)
                        {
                          cancel.reset();
                        //   console.log(response);
                          window.location.href = response;
                        }
                        else
                        {
                            cancel_subscription_messages.innerHTML = response;
                        }
                        // console.log(response);
                    }
                }
                xhr.send(form_data);
            });
            
        }

        //ajax request for payment
        let form = document.getElementById('remove_ads_form');
        if(form)
        {
            let remove_ads_button = document.getElementById('remove_ads');
            let remove_ads_messages = document.getElementById('remove_ads_messages');
            form.addEventListener('submit', remove_ads);
    
            function remove_ads(e)
            {
                e.preventDefault();
                remove_ads_button.disabled = true;
    
                let ads_btn_bg_col = remove_ads_button.style.backgroundColor;
                let ads_btn_border = remove_ads_button.style.border;
                let ads_btn_cursor = remove_ads_button.style.cursor;
    
                if(remove_ads_button.disabled == true)
                {
                    remove_ads_button.style.backgroundColor = 'grey';
                    remove_ads_button.style.border = 'grey';
                    remove_ads_button.style.cursor = 'not-allowed';
                }
    
                let form_element = document.getElementsByClassName('form_data_ads');
                let form_data = new FormData();
    
                for(let i = 0; i < form_element.length; i++)
                {
                    form_data.append(form_element[i].name, form_element[i].value);
                }
    
                let xhr = new XMLHttpRequest();
                
                // xhr.open('POST', 'remove-ads');
                xhr.open('POST', 'billing/CreatePlan');
    
                xhr.onload = function()
                {
                    if(this.status == 200)
                    {
                        remove_ads_button.disabled = false;
    
                        if(remove_ads_button.disabled == false)
                        {
                            remove_ads_button.style.backgroundColor = ads_btn_bg_col;
                            remove_ads_button.style.border = ads_btn_border;
                            remove_ads_button.style.cursor = ads_btn_cursor;
                        }
    
                        let response = xhr.responseText;
                        const pattern = /https/;
                        let regex = pattern.test(response);
                        if(regex === true)
                        {
                          form.reset();
                        //   console.log(response);
                          window.location.href = response;
                        }
                        else if(regex == false)
                        {
                            remove_ads_messages.innerHTML = response;
                            // console.log(response);
                            // window.location.href = response;
                        }
                      
                    }
                }
                
                xhr.send(form_data);
            }
        }

      });
    </script>

<?php

    include('includes/footer.php');
    ckeditor();

?>