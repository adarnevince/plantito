<header class="header-shop overlay-shop">
    <nav class="navbar navbar-expand-md navbar-dark">
		<div class="container-fluid">
			<a href="/home" class="navbar-brand"><img src="img/plantito-logo-nobg.png" id="logo" /></a>
			
			<button type="button" class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#main-nav">
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
			</button>
			
			<div id="main-nav" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li><a href="/home" class="nav-item nav-link">Home</a></li>
					<li><a href="/shop" class="nav-item nav-link active">Shop</a></li>
					
					<li><a href="/contact-us" class="nav-item nav-link">Contact Us</a></li>
					@if (Session::has('user_id'))
					<li class="dropdown">
						<a href="/profile" class="nav-item nav-link" data-toggle="dropdown">My Account</a>
						<div class="dropdown-menu">
							<a href="/orders" class="dropdown-item">My Orders</a>
							<a href="/completed-orders" class="dropdown-item">Order History</a>
							<a href="/logout" class="dropdown-item">Logout</a>
						</div>
					</li> 
					
					<!-- <li><a href="/shop/cart" class="nav-item nav-link"><img src="img/shopping-cart.png" class="cart" /></a></li> -->
					
					@else
                    <li><a href="/login" class="nav-item nav-link">Sign Up/Login</a></li>
					@endif
				</ul>
                
			</div>
		</div>
	</nav>
	
	<div class="banner">
   
		<div class="container">
             <!-- <img src="img/overlay-bg.png" id="overlay_img" /> -->
			<h1>"Leaf your troubles behind."</h1>
			<p>Start shopping now!</p>
			<a href="#shop-title"><button>Get started</button></a>
		</div>
	</div>
</header>