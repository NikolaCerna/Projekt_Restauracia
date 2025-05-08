<?php include "parts/header.php" ?>
		<main>
			<div class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">About La Tavola</h2>
				<p class="col-13 text-center">At <strong>La Tavola</strong>, we pride ourselves on using only the freshest ingredients and crafting each dish with care and creativity.
                    From our carefully curated selection of pizzas, made with the finest toppings, to our
                    vibrant salads and satisfying noodles, we offer a variety of options to please every palate. Come enjoy a relaxed atmosphere, excellent service, and the perfect meal for any occasion.</p>
			</div>

			<div class="tm-container-inner tm-persons">
				<div class="row">
					<?php
                        include_once "functions.php";
                        generateWorkers();
					?>
				</div>
			</div>
			<div class="tm-container-inner tm-featured-image">
				<div class="row">
					<div class="col-12">
						<div class="placeholder-2">
							<div class="parallax-window-2" data-parallax="scroll" data-image-src="img/about-05.jpg"></div>		
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner tm-features">
				<div class="row">
					<?php
                        include_once "functions.php";
                        generateAbout();
                    ?>
				</div>
			</div>
			<div class="tm-container-inner tm-history">
				<div class="row">
					<div class="col-12">
						<div class="tm-history-inner">
							<img src="img/about/history.jpg" alt="Image" class="img-fluid tm-history-img" />
							<div class="tm-history-text"> 
								<h4 class="tm-history-title">History of our restaurant</h4>
								<p class="tm-mb-p">Our journey began with a passion for bringing fresh, flavorful, and comforting dishes to the table. From our humble beginnings, we’ve grown into a beloved spot in the community,
                                    known for our high-quality pizzas, vibrant salads, and tasty noodle dishes. We are proud to serve food that not only satisfies your cravings but also brings people together.</p>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>