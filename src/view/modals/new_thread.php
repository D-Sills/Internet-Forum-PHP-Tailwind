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
  var title = $('#threadTitle').val();
  var content = quill.root.innerHTML;
  var topicId = <?php echo json_encode($topicId); ?>; // Pass the topic ID from PHP to JavaScript
  
  // Check if the editor content is empty
  if (title.trim() === '' || content.trim() === '') {
    if (title.trim() === '' && content.trim() === '') {
      alert('Please enter a title and content for the thread.');
      return;
    }
  }
  
  var formData = {
    title: title,
    content: content,
    topicId: topicId
  };
  
  $.ajax({
    url: '/finalteam9/src/model/ajax/create_thread.php',
    type: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {
      console.log('Thread created successfully:', response);
      var threadUrl = '/finalteam9/?route=threads&id=' + response.data.thread_id + '?page=1'; // Replace with the actual URL structure for your thread pages
      window.location.href = threadUrl;
    },
    error: function(xhr, status, error) {
      console.log('Thread creation failed:', error);
    }
  });
});
</script>

