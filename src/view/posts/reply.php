<!-- views/reply.php -->
<div class="w-100 container">
    <div class="d-flex">
        <!-- Avatar -->
        <div class="mr-3">
            <img src="path/to/avatar.jpg" alt="Avatar" class="avatar">
        </div>
        
        <!-- Post Content -->
        <div>
            <div id="replyEditor"></div>
            <div>
                <button id="postReplyButton">Post Reply</button>
            </div>
        </div>
    </div>
</div>

<script>
var replyEditor = new Quill('#replyEditor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
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

