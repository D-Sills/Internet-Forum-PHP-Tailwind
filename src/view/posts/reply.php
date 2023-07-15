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
                <button class="mt-2 py-2 px-4 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600" id="postReplyButton">Post Reply</button>
            </div>
        </div>

    </div>
</div>
<?php } else { ?>
  log in bitch
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
  var replyData = {
    content: replyEditor.root.innerHTML,
    threadId: <?php echo $threadId; ?> // Pass the topic ID from PHP to JavaScript
  };
  
  // Perform any necessary checks or validation on the reply content
  
  // Send AJAX request to post the reply
  $.ajax({
    url: '/WebProgramming-FinalProject/src/model/ajax/post_reply.php', // Backend URL to handle posting the reply
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

