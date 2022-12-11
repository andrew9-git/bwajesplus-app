<?php

include('includes/header.php');
bwajes_plus_header('payments', 'Payment Statistics');
$host = url()[0];

$id = $_SESSION['bwajes_plus_admin_data']['id'];

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

  if($payment_info == false)
  {
    redirect_to($host.'logout');
  }
}
else
{
  redirect_to($host.'logout');
}
?>

<div class="home-content">
    <div class="post-area">
    <?php 
        if($admin['suspended'] != 1)
        {
      ?>
      <div style="display: flex;justify-content:center;align-items:center;gap:10px;">
            <div class="card">
                <div class="card-header">
                    <h4 class="admin-head">Total Payments</h4>
                </div>
                <div class="card-body">
                    <div class="info-body">
                    <?php 

                        $agreement = paypal($user_id)['agreement'];
                        $agreementDetails = paypal($user_id)['agreementDetails'];
                        $end_date = paypal($user_id)['end_date'];

                        $cycles_completed = $agreementDetails->getCyclesCompleted();

                        ?>
                        <h4 class="message-body">$<?php echo $payment_info['amount'] * $cycles_completed; ?></h4>
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
                        <h4 class="message-body"><?php echo $cycles_completed; ?></h4>
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
                    }
                    else
                    {
                      $deleted_user = fetch_single_row($user_id, 'deleted_users', 'user_id');
                      if(isset($deleted_user['first_name']) && isset($deleted_user['last_name']))
                      {
                          echo '<b>DELETED: </b>'.ucfirst(strtolower($deleted_user['first_name'])) . " " . ucfirst(strtolower($deleted_user['last_name']));
                      }
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
                    }
                    else
                    {
                      $deleted_user = fetch_single_row($user_id, 'deleted_users', 'user_id');
                      if(isset($deleted_user['email']))
                      {
                          echo '<b>DELETED: </b>'.$deleted_user['email'];
                      }
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
                    <?php 
                        echo $agreement->getState();
                     ?>
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
                  <h4>Number of failed payments:</h4>
                  <div>
                    <?php 
                        $failed_payments = $agreementDetails->getFailedPaymentCount();
                        echo $failed_payments;
                     ?> 
                  </div>
                  <h4>Number of times subscription cancelled:</h4>
                  <div>
                    <?php 
                        echo count_cancelled_subscriptions($user_id);
                     ?> 
                  </div>
                  <h4>Number of database entries:</h4>
                  <div>
                    <?php 
                        echo db_entries_for_a_user_subscriptions($user_id);
                     ?> 
                  </div>
                  <h4>Last payment date:</h4>
                  <div>
                    <?php 
                        $last_payment_date = $agreementDetails->getLastPaymentDate();
                        echo date("F jS, Y", strtotime($last_payment_date));
                     ?> 
                  </div>
                  <h4>Expires:</h4>
                  <div>
                    <?php 
                        echo date("F jS, Y", strtotime($end_date));
                     ?> 
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
</div>

<?php

    include('includes/footer.php');
    ckeditor();

?>