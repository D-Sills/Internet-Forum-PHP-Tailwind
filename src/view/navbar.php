<!-- views/navbar.php -->
<nav class="px-0 md:px-4 navbar drop-shadow navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand" href="/<?php echo $base_url; ?>/">
            <img src="/<?php echo $base_url; ?>/assets/images/logo.png" alt="Logo" width="300px" height="70px" class="d-none d-md-inline-block align-text-center">
            <img src="/<?php echo $base_url; ?>/assets/images/logo_sm.png" alt="Logo Small" width="50px" height="50px" class="d-inline-block d-md-none align-text-center">
        </a>

        <!-- Search -->
        <form class="d-flex flex-grow-1 flex-md-grow-0">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <!-- Buttons -->
        <ul class="navbar ms-auto">
            <li class="nav-item">
                <button class="btn" type="button"><i class="bi bi-brightness-high"></i></button>
            </li>
            <div class="vl"></div>
            
            <?php if (!$user) { ?> <!--  if not logged in -->
                <li class="nav-item">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-key"></i>
                        <span class="d-none d-md-inline text-xl">Log In</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="bi bi-clipboard"></i>
                        <span class="d-none d-md-inline text-xl">Register</span>
                    </button>
                </li>
            <?php } else {  ?>
                <li class="nav-item dropdown">
                    <div class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo generate_avatar($user, 35) ?>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/<?php echo $base_url; ?>/user/<?php echo clean_topic_name_for_url($user['username']); ?>.<?php echo $user['user_id']; ?>">
                        View Profile</a></li>
                        <hr>
                        <li><button onclick="logout()" class="dropdown-item">Log out</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        
    </div>
</nav>

<!-- Modals -->
<?php include 'modals/login.php' ?>
<?php include 'modals/register.php' ?>

<script>
function logout() {
    $.ajax({
        url: '/WebProgramming-FinalProject/src/model/ajax/logout.php',
        method: 'POST',
        success: function(response) {
            location.reload();
        },
        error: function(xhr, status, error) {
            // Handle the error if needed
        }
    });
}

// Function to perform the search using AJAX
function performSearch() {
  // Get the search input value
  var searchInput = document.querySelector('.form-control').value;

  // Perform AJAX request
  $.ajax({
    url: '/WebProgramming-FinalProject/src/model/ajax/search.php',
    type: 'GET',
    data: { search: searchInput },
    dataType: 'json',
    success: function(response) {
      // Handle the success response
      console.log('Search results:', response);
      window.location.href = '/WebProgramming-FinalProject/search/' + searchInput;
    },
    error: function(xhr, status, error) {
      console.log('Failed to perform search:', error);
    }
  });
}

// Event listener for the search button
document.querySelector('.btn').addEventListener('click', function(event) {
  event.preventDefault();
  performSearch();
});

// Event listener for pressing Enter in the search input field
document.querySelector('.form-control').addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    performSearch();
  }
});

</script>