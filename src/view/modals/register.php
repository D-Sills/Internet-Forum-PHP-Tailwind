<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="registerForm">
          <div class="form-group">
            <label for="registerUsername">Username</label>
            <input type="text" class="form-control" name="registerUsername" id="registerUsername" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="registerEmail">Email address</label>
            <input type="email" class="form-control" name="registerEmail" id="registerEmail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="registerPassword">Password</label>
            <input type="password" class="form-control" name="registerPassword" id="registerPassword" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
        
        <div id="registerError"></div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  // Handle register form submission
  $('#registerForm').on('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    // Get form data
    var formData = $(this).serialize();

    // Send AJAX request
    $.ajax({
      url: '/finalteam9/src/model/ajax/register.php', // Backend registration URL
      method: 'POST',
      data: formData,
      dataType: 'json',
      success: function(response) {
        // Handle registration success
        if (response.success) {
          location.reload();
        } else {
          $('#registerError').html(`<div class="alert alert-danger mt-3" role="alert">${response.message}</div>`);
        }
      },
      error: function(xhr, status, error) {
        console.log('Request failed: ', status); // Check if this log is displayed in the console
        console.log('Response:', xhr.responseText); // Log the response for debugging
        // Show error message
        $('#registerError').text('An error occurred. Please try again later.').show();
      }
    });
  });
});
</script>
