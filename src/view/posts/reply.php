<!-- views/reply.php -->
<?php if ($user) { ?>
<div class="w-100 my-3 drop-shadow">
    <div class="d-flex">
        <!-- Avatar -->
        <div class="user-section p-2">
          <div class="flex justify-center">
            <?php echo generate_avatar($user, 40) ?>
          </div>
        </div>
        
        <!-- Post Content -->
        <div class="w-100 p-2">
            <div id="replyEditor"></div>
            <div class="flex justify-end">
                <button class="btn btn-primary mt-3" id="postReplyButton">Post Reply</button>
            </div>
        </div>

    </div>
</div>
<?php } else { ?>
  <button type="button" class="my-3 btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
    <span>Log in to reply</span>
  </button>
<?php } ?>

<script>
var replyEditor = new Quill('#replyEditor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['code-block']
    ]
  },
  placeholder: 'Compose your reply...',
  theme: 'snow' // Use the 'snow' theme for a clean and simple UI
});

$('#postReplyButton').on('click', function() {
  event.preventDefault(); 
  
  // Gather form data
  var replyContent = replyEditor.root.innerHTML;
  var threadId = <?php echo json_encode($threadId); ?>; // Pass the topic ID from PHP to JavaScript
  
  // Check if the reply content is empty
  if (replyContent.trim() === '') {
    alert('Please enter a reply.');
    return;
  }
  
  var replyData = {
    content: replyContent,
    threadId: threadId
  };

  // Send AJAX request to post the reply
  $.ajax({
    url: '/finalteam9/src/model/ajax/post_reply.php', // Backend URL to handle posting the reply
    type: 'POST',
    data: replyData,
    dataType: 'json',
    success: function(response) {
      // Handle success response
      console.log('Reply posted successfully:', response);
      // Clear the reply editor
      location.reload();
      // Perform any desired actions
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.log('Failed to post reply:', error);
    }
  });
});
</script>


