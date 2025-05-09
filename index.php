<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "classes/Obsah.php";
                $obsah = new Obsah();

                $nadpis = $obsah->getValue('nadpis');
                $text = $obsah->getValue('text');
                echo'<div class="row tm-welcome-section">';
                echo'<h2 class="col-12 text-center tm-section-title">' . $nadpis . '</h2>';
                echo'<p class="col-12 text-center">' . $text . '</p>';
                echo'</div>';
            ?>
			
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
            <div id="tm-gallery-page-pizza" class="tm-gallery-page">
                <?php generateMenu("pizza"); ?>
            </div>

            <div id="tm-gallery-page-salad" class="tm-gallery-page hidden">
                <?php generateMenu("salad"); ?>
            </div>

            <div id="tm-gallery-page-noodle" class="tm-gallery-page hidden">
                <?php generateMenu("noodle"); ?>
            </div><!-- Gallery -->

            <?php
                $url = $obsah->getValue('questions_url');
                $nadpis = $obsah->getValue('questions_nadpis');
                $text = $obsah->getValue('questions_text');

                echo'<div class="tm-section tm-container-inner">';
                echo'<div class="row">';
                echo'<div class="col-md-6">';
                echo'<figure class="tm-description-figure">';
                echo'<img src="' . $url . '" alt="Image" class="img-fluid" />';
                echo'</figure>';
                echo'</div>';
                echo'<div class="col-md-6">';
                echo'<div class="tm-description-box"> ';
                echo'<h4 class="tm-gallery-title">' . $nadpis . '</h4>';
                echo'<p class="tm-mb-45">' . $text . '</p>';
                echo'<a href="about.php" class="tm-btn tm-btn-default tm-right">Read More</a>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
            ?>
		</main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>