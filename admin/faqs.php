<?php

include('includes/header.php');
bwajes_plus_header('faqs', 'FAQs');

?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
                <!-- <h4 class="message-head">Create faqses for users</h4> -->
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-faqses" class="btn btn-success">see faqses</a>
                </div>
                <form action="">
                <div class="form-group">
                    <label for="faq">FAQ*</label>
                    <input type="text" class="form-control" placeholder="Enter faq" id="faq" name="faq">
                </div>
                <div class="form-group">
                    <label for="answer">Answer*</label>
                    <textarea class="form-control" name="answer" rows="5" id="answer"></textarea>
                </div>
                <button type="submit" name="create-faq" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        CKEDITOR.replace('answer',
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