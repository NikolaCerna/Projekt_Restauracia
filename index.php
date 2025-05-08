<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "functions.php";
                generateUvod();
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
                include_once "functions.php";
                generateQuestionPart();
            ?>
		</main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>