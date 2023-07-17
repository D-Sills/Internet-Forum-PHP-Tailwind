<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Log In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="loginForm">
          <div class="form-group">
            <label for="loginEmail">Email address</label>
            <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="loginPassword">Password</label>
            <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
          </div>
          <div class=" mt-3">
            <a href="#" class="text-primary">Forgot your password?</a>
          </div>
          <button id="loginButton" type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
        
        
        <div id="loginError"></div>
        
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  // Handle login form submission
  $('#loginForm').on('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    // Get form data
    var formData = $(this).serialize();

    // Send AJAX request
    $.ajax({
      url: '/finalteam9/src/model/ajax/login.php', // Backend login URL
      type: 'POST',
      data: formData,
      dataType: 'json', 
      success: function(response) {
      console.log('Success: ', response); // Check if this log is displayed in the console
      // Handle login success
      if (response.success) {
          // Reload the current page
          location.reload();
        } else {
          // Show error message
          console.log('Login Failed'); // Check if this log is displayed in the console
          $('#loginError').html(`<div class="alert alert-danger mt-3" role="alert">${response.message}</div>`);
        }
      },
      error: function(xhr, status, error) {
        console.log('Request failed: ', status); // Check if this log is displayed in the console
        console.log('Response:', xhr.responseText); // Log the response for debugging
        // Show error message
        $('#loginError').html(`<div class="alert alert-danger mt-3" role="alert">An error occurred. Please try again later.</div>`);
      }
    });
  });
});


</script>






