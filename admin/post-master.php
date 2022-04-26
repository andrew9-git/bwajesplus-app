<?php

include('includes/header.php');
bwajes_plus_header('post-master', 'Post master');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">Message Users</h4>
            </div>
            <div class="card-body">
                <form action="">
                <div class="form-group">
                    <label for="support">Choose Support Department*</label>
                    <select class="form-control" name="support" id="support">
                    <option value="">General Support</option>
                    <option value="">IT Support</option>
                    <option value="">Adminstration Support</option>
                    <option value="">Billing Support</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="list">Send to*</label>
                    <select class="form-control" name="list" id="list">
                    <option value="null">Select recipients</option>
                    <option value="">All</option>
                    <option value="">Registered users only</option>
                    <option value="">Subscribers only</option>
                    <option value="">Commenters only</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject*</label>
                    <input type="text" class="form-control" placeholder="Enter subject" id="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message*</label>
                    <textarea class="form-control" rows="5" id="message"></textarea>
                </div>
                <button type="submit" name="send-mail" class="btn btn-primary">Send</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        CKEDITOR.replace('message',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>