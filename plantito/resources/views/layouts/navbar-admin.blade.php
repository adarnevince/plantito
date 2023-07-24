<header class="header-profile overlay-profile">
    <nav class="navbar navbar-expand-md navbar-dark">
		<div class="container-fluid">
			<a href="#" class="navbar-brand"><img src="img/plantito-logo-nobg.png" id="logo" /></a>
			
			<button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#main-nav">
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
			</button>
			
			<div id="main-nav" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li><a href="#" class="nav-item nav-link">Users</a></li>
					<li><a href="/admin-UserOrders" class="nav-item nav-link ">Orders</a></li>
					
					<li><a href="/admin-products" class="nav-item nav-link">Products</a></li>
					@if (Session::has('user_id'))
					<li><a href="/logout" class="nav-item nav-link ">Logout</a></li>

					@else
                    <li><a href="/login" class="nav-item nav-link">Sign Up/Login</a></li>
					@endif
				</ul>
                
			</div>
		</div>
	</nav>
	
	<div class="banner">
   
		<div class="container">
		</div>
	</div>
</header>