<?php

include('includes/header.php');
bwajes_plus_header('payments', 'Payment Statistics');
$host='http://localhost:9090/bwajesplus-app/admin/';
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
                        <h4 class="message-body">$1000</h4>
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
                        <h4 class="message-body">42</h4>
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
                      Lorem
                  </div>
                  <h4>Payment's name:</h4>
                  <div>
                      Ipsum
                  </div>
                  <h4>Bwajes+ Email:</h4>
                  <div>
                      andrew@gmail.com
                  </div>
                  <h4>Payment's Email:</h4>
                  <div>
                    andrewadelodun@gmail.com
                  </div>
                  <h4>Agreement ID:</h4>
                  <div>
                    I-6D5JX7VB4G4Y
                  </div>
                  <h4>Plan ID:</h4>
                  <div>
                    PMTGPWSLBTFEL
                  </div>
                  <h4>State:</h4>
                  <div>
                      Active
                  </div>
                  <h4>Amount:</h4>
                  <div>
                      $54.45
                  </div>
                  <h4>Payment method:</h4>
                  <div>
                      Paypal
                  </div>
                  <h4>Renews every:</h4>
                  <div>
                      3 months
                  </div>
                  <h4>Expires:</h4>
                  <div>
                    Nov. 4, 2021 
                  </div>
                  <h4>Created at:</h4>
                  <div>
                      Feb. 4, 2022 
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