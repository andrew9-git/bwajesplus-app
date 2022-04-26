<?php

include('includes/header.php');
bwajes_plus_header('all-posts', 'Post');

$host='http://localhost:9090/bwajesplus-app/';
?>

    <div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <div class="info-container">
                    <a href="<?php echo $host .'all-posts.php'; ?>" class="btn btn-success">back</a>
                </div>
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
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
                  <h4>Keywords</h4>
                  <div>
                      health tech science 
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