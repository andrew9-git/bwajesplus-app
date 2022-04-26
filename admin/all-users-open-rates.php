<?php

include('includes/header.php');
bwajes_plus_header('admin-sent-emails', 'All users mail open rates');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div style="display: flex;align-items:center;justify-content:space-between">
              <a href="admin-sent-emails" class="btn btn-success">back</a>
              <form action="">
                  <div class="form-wrapper">
                      <div class="form-group">
                          <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                      </div>
                      <div class="search-button-wrapper">
                          <div class="form-group">
                              <input type="search" class="form-control" placeholder="search here..." name="search" id="search">
                          </div>
                          <div class="form-group">
                              <button name="filter" class="btn btn-primary">filter</button>
                          </div>
                      </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>First name</th>
                  <th>Email</th>
                  <th>No of mails recieved</th>
                  <th>No of mails opened</th>
                  <th>Open rates</th>
                  <th>See mails</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Joe</td>
                    <td>andrew@gmail.com</td>
                    <td>40</td>
                    <td>5</td>
                    <td>12.50%</td>
                    <td><a href="mails-recieved/4"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <tr>
                    <td>Joe</td>
                    <td>andrew@gmail.com</td>
                    <td>40</td>
                    <td>5</td>
                    <td>12.50%</td>
                    <td><a href="mails-recieved/4"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <tr>
                    <td>Joe</td>
                    <td>andrew@gmail.com</td>
                    <td>40</td>
                    <td>5</td>
                    <td>12.50%</td>
                    <td><a href="mails-recieved/4"><i class="bx bx-link-external"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>