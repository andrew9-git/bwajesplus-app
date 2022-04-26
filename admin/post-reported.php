<?php

include('includes/header.php');
bwajes_plus_header('reported-posts', 'User post reported');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <!-- <div class="info-container">
                    <a href="reports-about-post.php?pid=id" class="btn btn-success">back</a>
                </div> -->
                <!-- Using if statement to show either suspend or activate button
                and it's only super admin that should be able to delete post -->
                <a href="#" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this post?')){document.getElementById('form-suspend-pid').submit();}">suspend</a><a href="#" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this post?')){document.getElementById('form-activate-pid').submit();}">activate</a> | <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this post?')){document.getElementById('form-delete-pid').submit();}"><i class="bx bx-trash"></i></a>
                <form method="post" action="" style="display: none;" id="form-suspend-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="pid" name="suspend-post">
                </form>
                <form method="post" action="" style="display: none;" id="form-activate-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="pid" name="activate-post">
                </form>
                <form method="post" action="" style="display: none;" id="form-delete-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="pid" name="delete-post">
                </form>
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
                <h4>First name:</h4>
                <div>
                    Andrew
                </div>
                <h4>Last name:</h4>
                <div>
                    Adelodun
                </div>
                <h4>Email:</h4>
                <div>
                    andrew@gmail.com
                </div>
                <h4>Title:</h4>
                <div>
                    No money? No problem
                </div>
                <h4>Description:</h4>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque odit reiciendis voluptate voluptatem quod omnis eveniet maiores, quo perspiciatis quasi.
                </div>
                <h4>Post:</h4>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates animi consectetur, quas est inventore ducimus voluptatibus veritatis facere at alias rem doloribus dignissimos molestiae exercitationem delectus possimus hic blanditiis incidunt amet vitae ipsam reprehenderit expedita eius labore! Quo veritatis incidunt ullam illum voluptatum, officiis eaque. Similique quae itaque illum voluptatum modi aperiam culpa, amet magni a, quam reprehenderit odio assumenda, doloribus deleniti voluptatibus vero? Aspernatur perspiciatis sapiente doloribus soluta nisi voluptas commodi necessitatibus et, nostrum dicta assumenda aliquid placeat exercitationem eveniet? Impedit nihil deserunt assumenda odit repudiandae voluptates ea soluta magni dolorum, consequuntur provident, voluptate facere nulla, aspernatur deleniti dicta?
                </div>
                <h4>Suspended?</h4>
                <div>
                    No
                </div>
                <h4>Post category:</h4>
                <div>
                    Health
                </div>
                <h4>Post type:</h4>
                <div>
                    Journal 
                </div>
                <h4>Published?:</h4>
                <div>
                    Yes
                </div>
                <h4>Date published:</h4>
                <div>
                    Sept. 4, 2021 
                </div>
                <h4>Last updated:</h4>
                <div>
                    Nov. 4, 2021 
                </div>
                <h4>Date created:</h4>
                <div>
                    Sept. 4, 2021 
                </div>
              </div>
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