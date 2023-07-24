<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito</title>
	<link rel="stylesheet" href="css/navbar.css" />
	<link rel="stylesheet" href="css/showcase.css" />
	<script src="js/script.js"></script>
</head>
<body>
    @include('layouts/navbar')
    <main>
	<section id="content" class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12 left-line">
					<div class="col-md-5">
					<h1>Discover our home-grown plants.</h1>
					</div>
					<div class="col-md-7" hidden></div>
				</div>
			</div>
		</div>
		<div class="showcase">
		<div class="container">
			<div class="row">
				<div class="col-md-4 card-show">
					<div class="card">
						<img src="img/showcase/easytocare-showcase.jpg" alt="houseplants" />

					<div class="card-content">
						<h2>Easy to Care!</h2>
						<p>From bloom to room - plants perfect it all. </p>
					</div>
					</div>
				</div>

				<div class="col-md-4 card-show">
					<div class="card">
						<img src="img/showcase/rare-showcase.jpg" alt="rare plants" />

					<div class="card-content">
						<h2>Rare Plants</h2>
						<p>Plants from every part of the world. </p>
					</div>
					</div>
				</div>

				<div class="col-md-4 card-show">
					<div class="card">
						<img src="img/showcase/alocasia-showcase.jpg" alt="alocasia plant" />

					<div class="card-content">
						<h2>Alocasia Plant</h2>
						<p>Decorate with a purpose - choose plants. </p>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<!-- FEATURED PLANTS -->
	<section class="top-products">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12 product-title">
				<h1>Featured <strong>Products</strong></h1>
				</div>
				<div class="bottom-line"></div>
			</div>
		</div>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="carousel slide">
				<div class="item active">
					<div class="row">
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="img/TopProduct/fire-fern.jpg" class="img-responsive" alt="Fire Fern">
								</div>
								<div class="thumb-content">
									<h4>Fire Fern</h4>
									<p class="item-price"><strike>₱2,500.00</strike> <span>₱2,300.00</span></p>
								</div>						
							</div>
						</div>

						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="img/TopProduct/euphorbia-bongovalensis-nobg.png" class="img-responsive" alt="Euphorbia Bongovalensis">
								</div>
								<div class="thumb-content">
									<h4>Euphorbia Bongovalensis</h4>
									<p class="item-price"><strike>₱1,250</strike> <span>₱1,000</span></p>
								</div>						
							</div>
						</div>	

						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="img/TopProduct/dwarf-murraya-paniculata-nobg.png" class="img-responsive" alt="Dwarf Murraya Pinaculata">
								</div>
								<div class="thumb-content">
									<h4>Dwarf Murraya Paniculata</h4>
									<p class="item-price"><strike>₱3,000</strike> <span>₱2,800</span></p>
								</div>						
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="img/TopProduct/zz-raven.jpg" class="img-responsive" alt="zz raven">
								</div>
								<div class="thumb-content">
									<h4>ZZ Raven</h4>
									<p class="item-price"><strike>₱1,250</strike> <span>₱1,000</span></p>
								</div>					
							</div>
						</div>
						
					</div>
					<a href="/shop"><button class="btn btn-primary shopNow">SHOP NOW</button></a>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	</section>
	@include('layouts/footer')
</main>
</body>

<html>