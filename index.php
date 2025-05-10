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
            <div>
                <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať jedlo</button>

                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="index.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Názov:</label><input type="text" name="nazov" class="form-control" required></div>
                        <div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_obrazka" class="form-control" required></div>
                        <div class="mb-2"><label>Popis:</label><textarea name="popis" class="form-control" required></textarea></div>
                        <div class="mb-2"><label>Cena:</label><input type="text" name="cena" class="form-control" required></div>
                        <div class="mb-2"><label>Kategória:</label>
                            <select name="kategoria" class="form-control" required>
                                <option value="pizza">pizza</option>
                                <option value="salad">salad</option>
                                <option value="noodle">noodle</option>
                            </select>
                        </div>
                        <button type="submit" name="add" class="tm-btn tm-btn-success" style="margin-top: 20px; margin-bottom:20px">Uložiť</button>
                    </form>
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
            </div>

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