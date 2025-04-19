<?php include "parts/header.php" ?>
		<main>
			<div class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to La Tavola!</h2>
				<p class="col-12 text-center">Welcome to La Tavola, where crispy pizza, fresh salads, and flavorful noodles come together in one delicious place. Whether you're in the mood for Italian classics or Asian-inspired bowls, we serve taste and comfort on every plate. Come in, sit down, and enjoy the moment.</p>
			</div>
			
			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Pizza</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Salad</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Noodle</a></li>
					</ul>
				</nav>
			</div>

			<!-- Gallery -->
			<div class="row tm-gallery">
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-pizza" class="tm-gallery-page">
					<?php
                    include_once "functions.php";
                    generateMenu("page1");?>
				</div> <!-- gallery page 1 -->
				
				<!-- gallery page 2 -->
				<div id="tm-gallery-page-salad" class="tm-gallery-page hidden">
                    <?php
                        generateMenu("page2");
                    ?>
				</div> <!-- gallery page 2 -->
				
				<!-- gallery page 3 -->
				<div id="tm-gallery-page-noodle" class="tm-gallery-page hidden">
                    <?php
                    generateMenu("page3");
                    ?>
				</div> <!-- gallery page 3 -->
			</div> <!-- Gallery -->

			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="img/gallery/questions.jpg" alt="Image" class="img-fluid" />
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box"> 
							<h4 class="tm-gallery-title">Got Questions?</h4>
							<p class="tm-mb-45">If you have any questions, concerns, or would like to make a reservation, feel free to <a href="contact.php">get in touch with us!</a> We're always happy to assist you.</p>
							<a href="about.php" class="tm-btn tm-btn-default tm-right">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>