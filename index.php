<?php include "parts/header.php" ?>
		<main>
            <?php
            include_once "classes/Obsah.php";
            $obsah = new Obsah();

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'], $_POST['nova_hodnota'])) {
                $id = (int)$_POST['update_id'];
                $novaHodnota = trim($_POST['nova_hodnota']);
                $obsah->updateObsah($id, $novaHodnota);
                header("Location: index.php");
                exit();
            }

            // Načítaj hodnoty a IDčka
            $nadpis = $obsah->getValue('nadpis');
            $nadpisID = $obsah->getID('nadpis');
            $text = $obsah->getValue('text');
            $textID = $obsah->getID('text');

            // Výpis nadpisu + tlačidlo + formulár
            echo '<div class=" tm-welcome-section">';
            echo '<h2 class="col-12 text-center tm-section-title" id="nadpis' . $nadpisID . '">' . $nadpis . '</h2>';
            echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'nadpis\', ' . $nadpisID . ')">Upraviť nadpis</button>';

            echo '<div id="edit-form-nadpis-' . $nadpisID . '" class="edit-form" style="display:none;">';
            echo '<form method="post" action="index.php" style="margin-left:5px;">';
            echo '<input type="hidden" name="update_id" value="' . $nadpisID . '">';
            echo '<input type="hidden" name="kluc" value="nadpis">';
            echo '<div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="' . $nadpis . '"></div>';
            echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
            echo '</form>';
            echo '</div>';

            // Výpis textu + tlačidlo + formulár
            echo '<p class="col-12 text-center" style="margin-top:50px" id="text' . $textID . '">' . $text . '</p>';
            echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'text\', ' . $textID . ')">Upraviť text</button>';

            echo '<div id="edit-form-text-' . $textID . '" class="edit-form" style="display:none;">';
            echo '<form method="post" action="index.php" style="margin-left:5px;">';
            echo '<input type="hidden" name="update_id" value="' . $textID . '">';
            echo '<input type="hidden" name="kluc" value="text">';
            echo '<div class="mb-2"><textarea name="nova_hodnota" class="form-control">' . $text . '</textarea></div>';
            echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
            echo '</form>';
            echo '</div>';

            echo '</div>';
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
                $urlID = $obsah->getID('questions_url');
                $nadpis = $obsah->getValue('questions_nadpis');
                $nadpisID = $obsah->getID('questions_nadpis');
                $text = $obsah->getValue('questions_text');
                $textID = $obsah->getID('questions_text');


                echo'<div class="tm-section tm-container-inner">';
                echo'<div class="row">';
                echo'<div class="col-md-6">';
                echo'<figure class="tm-description-figure">';
                echo'<img src="' . $url . '" alt="Image" class="img-fluid" />';
                echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'questions_url\', ' . $urlID . ')">Upraviť fotografiu</button>';

                echo '<div id="edit-form-questions_url-' . $urlID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="index.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id" value="' . $urlID . '">';
                echo '<input type="hidden" name="kluc" value="questions_url">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="' . $url . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo'</figure>';
                echo'</div>';
                echo'<div class="col-md-6">';
                echo'<div class="tm-description-box"> ';
                echo'<h4 class="tm-gallery-title">' . $nadpis . '</h4>';
                echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'questions_nadpis\', ' . $nadpisID . ')">Upraviť nadpis</button>';

                echo '<div id="edit-form-questions_nadpis-' . $nadpisID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="index.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id" value="' . $nadpisID . '">';
                echo '<input type="hidden" name="kluc" value="questions_nadpis">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="' . $nadpis . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo'<p class="tm-mb-p">' . $text . '</p>';
                echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'questions_text\', ' . $textID . ')">Upraviť text</button>';

                echo '<div id="edit-form-questions_text-' . $textID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="index.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id" value="' . $textID . '">';
                echo '<input type="hidden" name="kluc" value="questions_text">';
                echo '<div class="mb-2"><textarea name="nova_hodnota" class="form-control">' . $text . '</textarea></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

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