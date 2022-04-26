<?php

include('includes/header.php');
bwajes_plus_header('all-users', 'User');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <div class="info-container">
                    <a href="<?php echo $host .'all-users'; ?>" class="btn btn-success">back</a>
                </div>
                <!-- Using if statement to show either suspend or activate button
                and it's only super admin that should be able to delete user -->
                <a href="#" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this admin?')){document.getElementById('form-suspend-aid').submit();}">suspend</a><a href="#" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this admin?')){document.getElementById('form-activate-aid').submit();}">activate</a> | <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this admin?')){document.getElementById('form-delete-aid').submit();}"><i class="bx bx-trash"></i></a>
                <form method="post" action="" style="display: none;" id="form-suspend-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="aid" name="suspend-admin">
                </form>
                <form method="post" action="" style="display: none;" id="form-activate-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="aid" name="activate-admin">
                </form>
                <form method="post" action="" style="display: none;" id="form-delete-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="aid" name="delete-admin">
                </form>
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
                  <h4>First name:</h4>
                  <div>
                      Lorem
                  </div>
                  <h4>Last name:</h4>
                  <div>
                      Ipsum
                  </div>
                  <h4>Email:</h4>
                  <div>
                      andrew@gmail.com
                  </div>
                  <h4>Business/Brand name:</h4>
                  <div>
                      Lorem ipsum dolor
                  </div>
                  <h4>Gender:</h4>
                  <div>
                      Male
                  </div>
                  <h4>Phone:</h4>
                  <div>
                      +234 9067839832 
                  </div>
                  <h4>Bio:</h4>
                  <div>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, placeat amet laboriosam provident excepturi doloribus sequi necessitatibus in consequuntur dolore obcaecati totam, veritatis ut mollitia ducimus cupiditate modi, qui ad cumque commodi non odit maiores eligendi voluptatibus? Provident, qui deleniti tempora impedit, nostrum recusandae maxime non veniam omnis ex sapiente?
                  </div>
                  <h4>Website:</h4>
                  <div>
                      https://andadel.com/portfolio
                  </div>
                  <h4>Age:</h4>
                  <div>
                      30
                  </div>
                  <h4>Address:</h4>
                  <div>
                      <address>5, Fashola street</address>
                  </div>
                  <h4>City:</h4>
                  <div>
                      Ikorodu
                  </div>
                  <h4>State:</h4>
                  <div>
                      Lagos
                  </div>
                  <h4>Last updated:</h4>
                  <div>
                      Nov. 4, 2021 
                  </div>
                  <h4>Date registered:</h4>
                  <div>
                      Sept. 4, 2021 
                  </div>
              </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo $host .'posts/4'; ?>" class="btn btn-primary">see posts</a> 
            </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>