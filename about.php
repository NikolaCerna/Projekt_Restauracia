<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "functions.php";
                generateAboutText();
                generateWorkers();
            ?>
			<div class="tm-container-inner tm-featured-image">
				<div class="row">
					<div class="col-12">
						<div class="placeholder-2">
							<div class="parallax-window-2" data-parallax="scroll" data-image-src="img/about-05.jpg"></div>		
						</div>
					</div>
				</div>
			</div>
            <?php
                include_once "functions.php";
                generateAbout();
            ?>
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