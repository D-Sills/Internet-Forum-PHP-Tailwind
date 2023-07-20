<!-- views/navbar.php -->
<nav class="px-0 md:px-4 navbar drop-shadow navbar-expand-lg bg-body-tertiary fixed-top">
	<div class="container-fluid">

		<!-- Logo -->
		<a class="navbar-brand" href="/<?php echo $base_url; ?>/">
			<img src="/<?php echo $base_url; ?>/assets/images/logo.png" alt="Logo" width="300px" height="70px" class="d-none d-lg-inline-block align-text-center">
			<img src="/<?php echo $base_url; ?>/assets/images/logo_sm.png" alt="Logo Small" width="50px" height="50px" class="d-inline-block d-lg-none align-text-center">
		</a>

		<!-- Search -->
		<form class="d-flex flex-grow-1 flex-md-grow-0">
			<div class="input-group">
				<input class="form-control" type="search" placeholder="Search" aria-label="Search">
				<div class="dropdown">
					<button class="btn dropdown-toggle btn-outline-secondary rounded-none" type="button" id="searchTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="active-search-type">Posts</span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="searchTypeDropdown">
						<li><a class="dropdown-item search-type-select" href="#" data-value="posts">Posts</a></li>
						<li><a class="dropdown-item search-type-select" href="#" data-value="threads">Threads</a></li>
						<li><a class="dropdown-item search-type-select" href="#" data-value="members">Members</a></li>
					</ul>
				</div>
				<button class="btn searchbtn btn-outline-secondary" type="button" onclick="performSearch()">
					<i class="bi bi-search"></i>
				</button>
			</div>
		</form>

		<!-- Buttons -->
		<ul class="navbar ms-auto">



			<?php if (!$user) { ?> <!-- if not logged in -->
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
			<?php } else { ?>
				<li class="nav-item dropdown">
					<div class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo generate_avatar($user, 35) ?>
					</div>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
						<li><a class="dropdown-item" href="/<?php echo $base_url; ?>/?route=user&id=<?php echo $user['user_id']; ?>">
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
	// Event listener for the search type dropdown items
	var searchTypeItems = document.querySelectorAll('.search-type-select');
	searchTypeItems.forEach(function(item) {
		item.addEventListener('click', function(event) {
			event.preventDefault();
			var selectedType = item.dataset.value;
			var activeSearchType = document.querySelector('.active-search-type');
			activeSearchType.textContent = selectedType.charAt(0).toUpperCase() + selectedType.slice(1);
		});
	});

	function logout() {
		$.ajax({
			url: '/finalteam9/src/model/ajax/logout.php',
			method: 'POST',
			success: function(response) {
				location.reload();
			},
			error: function(xhr, status, error) {
				// Handle the error if needed
			}
		});
	}

	function performSearch() {
		var searchInput = document.querySelector('.form-control').value;
		var searchType = document.querySelector('.active-search-type').textContent;

		// Check if the search input is empty
		if (searchInput.trim() === '') {
			alert('Please enter a search query');
			return;
		}

		$.ajax({
			url: '/finalteam9/src/model/ajax/search.php',
			type: 'GET',
			data: {
				search: searchInput,
				type: searchType
			},
			dataType: 'json',
			success: function(response) {
				console.log('Search results:', response);
				window.location.href = '/finalteam9/?route=search&query=' + searchInput + '&type=' + searchType;
			},
			error: function(xhr, status, error) {
				console.log('Failed to perform search:', error);
			}
		});
	}

	// Event listener for pressing Enter in the search input field
	document.querySelector('.form-control').addEventListener('keypress', function(event) {
		if (event.key === 'Enter') {
			event.preventDefault();
			performSearch();
		}
	});
</script>