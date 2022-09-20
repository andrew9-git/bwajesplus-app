<?php

include('includes/header.php');
bwajes_plus_header('payments', 'Payments');

$id = $_SESSION['admin_data']['id'];

$admin = fetch_single_row($id, 'admin');

if($admin['admin_type'] != 1)
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
      <div style="display: flex;justify-content:center;align-items:center;gap:10px;">
          <div class="card">
            <div class="card-header" style="display: flex;align-items:center;justify-content:center;gap:2rem">
                <!-- <h4 class="admin-head">All</h4> -->
                <div id="filter_using">
                  <form action="">
                      <div class="form-wrapper">
                          <div class="form-group"></div>
                            <div class="form-group">
                                <label for="filter-using">Filter using</label>
                                <select class="form-control form_data" name="filter-using" id="filter-using">
                                <option value="S">Select filter</option>
                                <option value="date-range">Date range</option>
                                <option value="payment-periods">Payment  periods</option>
                                </select>
                            </div>
                      </div>
                  </form>
                </div>
                <div id="date_range">
                  <form action="">
                      <div class="form-wrapper">
                          <div class="form-group"></div>
                          <div class="search-button-wrapper">
                              <div class="form-group">
                                  <label for="from">From</label>
                                  <input type="date" class="form-control form_data_range" name="from" id="from">
                                  <span id="from-error" style="color: red;"></span>
                              </div>
                              <div class="form-group">
                                  <label for="to">To</label>
                                  <input type="date" class="form-control form_data_range" name="to" id="to">
                              </div>
                          </div>
                      </div>
                  </form>
                </div>
                <div id="payment_periods">
                  <form action="">
                      <div class="form-wrapper">
                          <div class="form-group"></div>
                          <div class="search-button-wrapper">
                              <div class="form-group">
                                  <label for="payment-periods">Payments</label>
                                  <select class="form-control form_data_periods" name="payment-periods" id="payment-periods">
                                  <option value="S">Select period</option>
                                  <option value="10y">Last decade</option>
                                  <option value="5y">Last 5 years</option>
                                  <option value="1y">Last 1 year</option>
                                  <option value="6m">Last 6 months</option>
                                  <option value="3m">Last 3 months</option>
                                  <option value="1m">Last 1 month</option>
                                  <option value="1d">Last 1 day</option>
                                  </select>
                                  <span id="periods-error" style="color: red;"></span>
                              </div>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
            <div class="card-body">
              <div class="info-body">
                <?php 
                $amount = 0;

                $payments = payment_subscriptions();
            
                foreach($payments as $payment)
                {
                  $amount += $payment['amount'];
                }
                
                ?>
                <h4 class="message-body">$<span id="price"><?php echo $amount; ?></span></h4>
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
                        <span><b>Total payments - <span id="total_payments"></span></b></span>
                    </div>
                    <div class="search-button-wrapper">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="search for payment here..." name="search" id="search-payment">
                        </div>
                        <!-- <div class="form-group">
                            <input type="hidden" value="<?php //echo $id; ?>" class="form-control" name="payment_id" id="search_payment_id">
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
              </thead><!--payment-statistics/4-->
              <tbody id="payment_data"></tbody>
            </table>
            <div id="pagination_link" style="width: 100%;display:flex;justify-content:center;align-items:center;"></div><br>
          </div>
          <div class="card-footer">
          </div>
        </div><br>
        <div class="card">
            <div class="card-header">
            <h4 class="admin-head">Update ad-removal price</h4><!-- updating the values(It has an ID of 1) -->
            </div>
            <div class="card-body">
              <?php $payment_price = fetch_single_row(1, 'payment_prices'); ?>
            <form id="edit_price_form">
              <div id="edit_price_messages">
              </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_ep" name="price-id" value="<?php echo 1; ?>" id="price-id">
                </div>
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" value="<?php echo $payment_price['subject']; ?>" class="form-control form_data_ep" name="subject" id="subject">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control form_data_ep" rows="5" name="price-description" id="description"><?php echo $payment_price['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="amount-per-month">Amount Per Month</label>
                    <input type="text" class="form-control form_data_ep" name="amount-per-month" value="<?php echo $payment_price['amount_per_month']; ?>" id="amount-per-month">
                </div>
                <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="text" class="form-control form_data_ep" value="<?php echo $payment_price['rate']; ?>" name="rate" id="rate">
                </div>
                <button name="edit-price" id="edit_price" class="btn btn-primary">Update Ad removal</button>
            </form>
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
<script language="JavaScript" type="text/javascript">
  document.addEventListener('DOMContentLoaded', () => {
    let filter_using_select = document.getElementById('filter-using');
    let date_range = document.getElementById('date_range');
    let payment_periods = document.getElementById('payment_periods');

    date_range.style.display = "none";
    payment_periods.style.display = "none";

    filter_using_select.addEventListener('change', () => {

      for(let i = 0; i < filter_using_select.options.length; i++)
      {
        if(filter_using_select.options[i].selected == true && filter_using_select.options[i].value == "date-range")
        {
          date_range.style.display = "block";
        }
        else if(filter_using_select.options[i].selected == false && filter_using_select.options[i].value == "date-range")
        {
          date_range.style.display = "none";
        }
        else if(filter_using_select.options[i].selected == true && filter_using_select.options[i].value == "payment-periods")
        {
          payment_periods.style.display = "block";
        }
        else if(filter_using_select.options[i].selected == false && filter_using_select.options[i].value == "payment-periods")
        {
          payment_periods.style.display = "none";
        }
      }
    });

    let to = document.getElementById('to');
    to.addEventListener('change', () => {
      let price = document.getElementById('price');
      let from_error = document.getElementById('from-error');

      let form_element = document.getElementsByClassName('form_data_range');

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
          let response = xhr.responseText;
          const pattern = /choose/;
          let regex = pattern.test(response);
          if(regex === true)
          {
            from_error.innerHTML = response;
          }
          else
          {
            from_error.innerHTML = "";
            price.innerHTML = response;
          }
        }
      }
      xhr.send(form_data);
    });

    let periods = document.getElementById('payment-periods');
    periods.addEventListener('change', () => {

      let price = document.getElementById('price');
      let periods_error = document.getElementById('periods-error');

      let form_element = document.getElementsByClassName('form_data_periods');

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
          let response = xhr.responseText;
          const pattern = /period/;
          let regex = pattern.test(response);
          if(regex === true)
          {
            periods_error.innerHTML = response;
          }
          else
          {
            periods_error.innerHTML = "";
            price.innerHTML = response;
          }
        }
      }
      xhr.send(form_data);
    });

    //search-payment
    let search_payment = document.getElementById('search-payment');

    search_payment.addEventListener('keyup', () => {
      load_data(search_payment.value);
    })

    load_data();

    function load_data(query='', page_number = 1)
    {
      // let payment_id = document.getElementById('payment_id').value;

      let form_data = new FormData();

      form_data.append('payment_query', query);
      form_data.append('page', page_number);
      // form_data.append('payment_id', payment_id);

      let xhr = new XMLHttpRequest();
              
      xhr.open('POST', 'process-ajax');

      xhr.onload = function()
      {
        if(this.status == 200)
        {
            let response = JSON.parse(xhr.responseText);
            let html = '';
            let serial_no = 1;

            if(response.data.length > 0)
            {
                for(let count = 0; count < response.data.length; count++)
                {
                  html += '<tr>';
                  html += '<td>' + serial_no + '</td>';
                  html += '<td>' + response.data[count].agreement_id + '</td>';
                  html += '<td>' + response.data[count].state + '</td>';
                  html += '<td>' + response.data[count].expires + '</td>';
                  html += '<td>' + response.data[count].amount_w_c + '</td>';
                  html += '<td><a href="payment-statistics/'+ response.data[count].payment_id +'"><i class="bx bx-link-external"></i></a></td>';
                  html += '</tr>';
                  serial_no++;

                }
                
            }
            else
            {
              html += '</tr><td colspan="6" style="text-align: center;">No Data Found</td></tr>';
            }
            document.getElementById('payment_data').innerHTML = html;
            document.getElementById('total_payments').innerHTML = response.total_data;
            document.getElementById('pagination_link').innerHTML = response.pagination;
        }
      }
          
      xhr.send(form_data);
    }

    let form = document.getElementById('edit_price_form');
    let edit_price_button = document.getElementById('edit_price');
    let edit_price_messages = document.getElementById('edit_price_messages');
    form.addEventListener('submit', edit_price);

    function edit_price(e)
    {
        e.preventDefault();
        edit_price_button.disabled = true;

        let edit_pri_btn_bg_col = edit_price_button.style.backgroundColor;
        let edit_pri_btn_border = edit_price_button.style.border;
        let edit_pri_btn_cursor = edit_price_button.style.cursor;

        if(edit_price_button.disabled == true)
        {
            edit_price_button.style.backgroundColor = 'grey';
            edit_price_button.style.border = 'grey';
            edit_price_button.style.cursor = 'not-allowed';
        }

        let form_element = document.getElementsByClassName('form_data_ep');
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
                edit_price_button.disabled = false;

                if(edit_price_button.disabled == false)
                {
                    edit_price_button.style.backgroundColor = edit_pri_btn_bg_col;
                    edit_price_button.style.border = edit_pri_btn_border;
                    edit_price_button.style.cursor = edit_pri_btn_cursor;
                }

                let response = xhr.responseText;
                const pattern = /Success!/;
                let regex = pattern.test(response);
                if(regex === true)
                {
                  form.reset();
                }
                edit_price_messages.innerHTML = response;
              
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