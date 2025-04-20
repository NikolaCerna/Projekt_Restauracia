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
					<article class="col-lg-6">
						<figure class="tm-person">
							<img src="img/about/workers/about-01.jpg" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Jennifer Soft</h4>
								<p class="tm-person-title">Founder and CEO</p>
								<p class="tm-person-about">Jennifer leads La Tavola with passion and dedication, ensuring every guest feels welcome and enjoys a memorable dining experience.</p>
								<div>
									<a href="https://fb.com" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
									<a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-6">
						<figure class="tm-person">
							<img src="img/about/workers/about-02.jpg" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Daisy Walker</h4>
								<p class="tm-person-title">Executive Chef</p>
								<p class="tm-person-about">Daisy crafts innovative dishes with fresh ingredients, bringing flavors that delight our customers.</p>
								<div>
									<a href="https://fb.com" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-6">
						<figure class="tm-person">
							<img src="img/about/workers/about-03.jpg" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Florence Nelson</h4>
								<p class="tm-person-title">Kitchen Manager</p>
								<p class="tm-person-about">Florence ensures our kitchen runs smoothly, maintaining quality and efficiency in every dish served.</p>
								<div>
									<a href="https://fb.com" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
					<article class="col-lg-6">
						<figure class="tm-person">
							<img src="img/about/workers/about-04.jpg" alt="Image" class="img-fluid tm-person-img" />
							<figcaption class="tm-person-description">
								<h4 class="tm-person-name">Valentina Martin</h4>
								<p class="tm-person-title">Culinary Director</p>
								<p class="tm-person-about">Valentina oversees the menu, ensuring we offer unique and delicious dishes that keep our guests coming back for more.</p>
								<div>
									<a href="https://fb.com" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
									<a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
									<a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
									<a href="https://youtube.com" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
								</div>
							</figcaption>
						</figure>
					</article>
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