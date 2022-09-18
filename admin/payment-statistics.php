<?php

include('includes/header.php');
bwajes_plus_header('payments', 'Payment Statistics');
$host='http://localhost:9090/bwajesplus-app/admin/';

$id = $_SESSION['admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if($admin['admin_type'] != 1)
{
  redirect_to($host . 'logout');
}

if(isset($_GET['ps']))
{
  $payment_id = $_GET['ps'];
  $payment_info = fetch_single_row($payment_id, 'payment_subscriptions');

  $user_id = $payment_info['user_id'];
  $user_info = fetch_single_row($user_id, 'users');
}
else
{
  redirect_to('logout');
}
?>

<div class="home-content">
    <div class="post-area">
      <div style="display: flex;justify-content:center;align-items:center;gap:10px;">
            <div class="card">
                <div class="card-header">
                    <h4 class="admin-head">Total Payments</h4>
                </div>
                <div class="card-body">
                    <div class="info-body">
                    <?php 
                        $amount = 0;

                        $payments = payment_subscriptions('', 0, 0, $user_id);
                    
                        foreach($payments as $payment)
                        {
                        $amount += $payment['amount'];
                        }
                        $count = db_row_count($user_id, 'user_id', 'payment_subscriptions');
                        ?>
                        <h4 class="message-body">$<?php echo $amount; ?></h4>
                        <i class="bx bx-money"></i>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="admin-head">Total Renewals</h4>
                </div>
                <div class="card-body">
                    <div class="info-body">
                        <h4 class="message-body"><?php echo $count; ?></h4>
                        <i class="bx bx-spreadsheet"></i>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div><br>
        <div class="card">
            <div class="card-header">
                <div class="info-container">
                    <a href="<?php echo $host .'payments'; ?>" class="btn btn-success">back</a>
                </div>
            </div>
            <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                  <h4>Bwajes+ name:</h4>
                  <div>
                    <?php if(isset($user_info['first_name']) && isset($user_info['last_name']))
                    {
                        echo ucfirst(strtolower($user_info['first_name'])) . " " . ucfirst(strtolower($user_info['last_name']));
                    } ?>
                  </div>
                  <h4>Payment's name:</h4>
                  <div>
                    <?php if(isset($payment_info['first_name']) && isset($payment_info['last_name']))
                    {
                        echo ucfirst(strtolower($payment_info['first_name'])) . " " . ucfirst(strtolower($payment_info['last_name']));
                    } ?>
                  </div>
                  <h4>Bwajes+ Email:</h4>
                  <div>
                    <?php if(isset($user_info['email']))
                    {
                        echo $user_info['email'];
                    } ?>
                  </div>
                  <h4>Payment's Email:</h4>
                  <div>
                    <?php if(isset($payment_info['email']))
                    {
                        echo $payment_info['email'];
                    } ?>
                  </div>
                  <h4>Agreement ID:</h4>
                  <div>
                    <?php if(isset($payment_info['agreement_id']))
                    {
                        echo $payment_info['agreement_id'];
                    } ?>
                  </div>
                  <h4>Plan ID:</h4>
                  <div>
                    <?php if(isset($payment_info['payer_id']))
                    {
                        echo $payment_info['payer_id'];
                    } ?>
                  </div>
                  <h4>State:</h4>
                  <div>
                    <?php if(isset($payment_info['state']))
                    {
                        echo $payment_info['state'];
                    } ?>
                  </div>
                  <h4>Amount:</h4>
                  <div>
                  <?php if(isset($payment_info['amount_with_currency']))
                    {
                        echo $payment_info['amount_with_currency'];
                    } ?>
                  </div>
                  <h4>Payment method:</h4>
                  <div>
                    <?php if(isset($payment_info['payment_method']))
                    {
                        echo $payment_info['payment_method'];
                    } ?>
                  </div>
                  <h4>Renews every:</h4>
                  <div>
                    <?php if(isset($payment_info['interval_value']))
                    {
                        $interval = $payment_info['interval_value'];
                        if($interval > 1)
                        {
                            echo $interval . " months";
                        }
                        else
                        {
                            echo $interval . " month";
                        }
                    } ?>
                  </div>
                  <h4>Expires:</h4>
                  <div>
                    <?php if(isset($payment_info['end_date']))
                    {
                        echo date("F jS, Y", strtotime($payment_info['end_date']));
                    } ?> 
                  </div>
                  <h4>Created at:</h4>
                  <div>
                    <?php if(isset($payment_info['created_at']))
                    {
                        echo date("F jS, Y", strtotime($payment_info['created_at']));
                    } ?> 
                  </div>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
      </div>
    </div>
</div>

<?php

    include('includes/footer.php');
    ckeditor();

?>