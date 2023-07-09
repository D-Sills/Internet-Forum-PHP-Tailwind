<!-- views/navbar.php -->
<nav class="px-0 md:px-4 navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand" href="/<?php echo $base_url; ?>/">
            <img src="assets/images/" alt="Logo" width="30px" height="30px" class="d-inline-block align-text-center">
            <span class="px-1 brand-text d-none d-md-inline">Forum Name</span>
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
                        <i class="bi bi-key"><span class="d-none d-md-inline">Log In</span></i>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="bi bi-clipboard"><span class="d-none d-md-inline">Register</span></i>
                    </button>
                </li>
            <?php } else {  ?>
                <li class="nav-item dropdown">
                    <div class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar" src="path/to/user_avatar.jpg" alt="<?php echo $user['username']; ?>" width="50" height="50">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
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
        url: '/WebProgramming-FinalProject/src/model/logout.php',
        method: 'POST',
        success: function(response) {
            location.reload();
        },
        error: function(xhr, status, error) {
            // Handle the error if needed
        }
    });
}
</script>