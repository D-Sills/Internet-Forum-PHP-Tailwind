<!-- views/navbar.php -->
<nav class="px-0 md:px-4 navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand" href="/WebProgramming-FinalProject/">
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
            <li class="nav-item">
                <button class="btn" type="button">
                    <i class="bi bi-key"><span class="d-none d-md-inline">Log In</span></i>
                </button>
            </li>
            <li class="nav-item">
                <button class="btn" type="button">
                    <i class="bi bi-clipboard"><span class="d-none d-md-inline">Register</span></i>
                </button>
            </li>
        </ul>
        
    </div>
</nav>