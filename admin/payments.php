<?php

include('includes/header.php');
bwajes_plus_header('payments', 'Payments');

?>

<div class="home-content">
  <div class="post-area">
      <div style="display: flex;justify-content:center;align-items:center;gap:10px;">
          <div class="card">
            <div class="card-header">
                <!-- <h4 class="admin-head">All</h4> -->
                <form action="">
                    <div class="form-wrapper">
                        <div class="form-group"></div>
                        <div class="search-button-wrapper">
                            <!-- It's either I use the date range or select or both for filtration of data to give insight -->
                            <div class="form-group">
                                <label for="support">Payments</label>
                                <select class="form-control form_data" name="payment-periods" id="payment-periods">
                                <option value="">All</option>
                                <option value="">Last decade</option>
                                <option value="">Last 5 years</option>
                                <option value="">Last 1 year</option>
                                <option value="">Last 6 months</option>
                                <option value="">Last 3 months</option>
                                <option value="">Last 1 month</option>
                                <option value="">Last 1 day</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <input type="hidden" value="<?php //echo $id; ?>" class="form-control" id="search_user_id">
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
              <div class="info-body">
                <h4 class="message-body">$1000</h4>
                <i class="bx bx-money"></i>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div><br>
        <div class="card">
          <div class="card-header">
            <form action="">
                <div class="form-wrapper">
                    <div class="form-group">
                        <span><b>Total data - <span id="total_posts"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <!-- <input type="search" class="form-control" placeholder="filter here..." name="search" id="search" onkeyup="load_data(this.value);"> -->
                            <input type="search" class="form-control" placeholder="filter here..." name="search" id="search">
                        </div>
                        <!-- <div class="form-group">
                            <input type="hidden" value="<?php //echo $id; ?>" class="form-control" id="search_user_id">
                        </div> -->
                    </div>
                </div>
            </form>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>ID</th>
                  <th>State</th>
                  <th>Expires</th>
                  <th>Amount</th>
                  <th>Details & Stats</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John</td>
                  <td>Doe</td>
                  <td>andrew@gmail.com</td>
                  <td>10</td>
                  <td>10</td>
                  <td><a href="payment-statistics/4"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <tr>
                  <td>Mary</td>
                  <td>Moe</td>
                  <td>andrew@gmail.com</td>
                  <td>10</td>
                  <td>10</td>
                  <td><a href="payment-statistics/4"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <tr>
                  <td>July</td>
                  <td>Dooley</td>
                  <td>andrew@gmail.com</td>
                  <td>10</td>
                  <td>10</td>
                  <td><a href="payment-statistics/4"><i class="bx bx-link-external"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
          </div>
        </div><br>
        <div class="card">
            <div class="card-header">
            <h4 class="admin-head">Update ad-removal price</h4><!-- updating the values(It has an ID of 1) -->
            </div>
            <div class="card-body">
            <form action="">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                </div>
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="amount-per-month">Amount Per Month</label>
                    <input type="text" class="form-control" name="amount-per-month" id="amount-per-month">
                </div>
                <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="text" class="form-control" name="rate" id="rate">
                </div>
                <button type="submit" name="create-affiliate" class="btn btn-primary">Update Ad removal</button>
            </form>
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