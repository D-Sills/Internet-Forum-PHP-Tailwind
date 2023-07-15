<div class="modal fade" id="newThreadModal" tabindex="-1" aria-labelledby="newThreadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newThreadModalLabel">New Thread</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="newThreadForm">
          <div class="form-group">
            <label for="threadTitle">Thread Title</label>
            <input type="text" class="form-control" name="threadTitle" id="threadTitle" placeholder="Enter thread title">
          </div>
          <div class="form-group">
            <label for="threadContent">Thread Content</label>
            <div style="height: 200px;" id="threadEditor"></div>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Create Thread</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
var quill = new Quill('#threadEditor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow' // Use the 'snow' theme for a clean and simple UI
});

$('#newThreadForm').on('submit', function(event) {
  event.preventDefault(); // Prevent form from submitting normally
  
  // Gather form data
  var formData = {
    title: $('#threadTitle').val(),
    content: quill.root.innerHTML,
    topicId: <?php echo $topicId; ?> // Pass the topic ID from PHP to JavaScript
  };
  
  // Send AJAX request
  $.ajax({
    url: '/WebProgramming-FinalProject/src/model/ajax/create_thread.php', // Backend URL to handle thread creation
    type: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {
      // Handle success response
      console.log('Thread created successfully:', response);
      // Close the modal and perform any desired actions
      var threadId = response.threadId; // Assuming the response includes the newly created thread ID
      var threadUrl = '/WebProgramming-FinalProject/threads/' + threadId + '?page=1'; // Replace with the actual URL structure for your thread pages
      window.location.href = threadUrl;
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.log('Thread creation failed:', error);
    }
  });
});
</script>
