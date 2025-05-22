<?php
include_once "handlers.php";
include_once "parts/header.php";
?>
		<main>
            <?php
            include_once "classes/Obsah.php";
            $obsah = new Obsah();

            $nadpis = $obsah->getValue('nadpis');
            $nadpisID = $obsah->getID('nadpis');
            $text = $obsah->getValue('text');
            $textID = $obsah->getID('text');

            echo '<div class=" tm-welcome-section">';
            echo '<h2 class="col-12 text-center tm-section-title" id="nadpis' . $nadpisID . '">' . $nadpis . '</h2>';
            echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm(\'obsah' . $nadpisID . '\')">Upraviť nadpis</button>';

            echo '<div id="edit-form-obsah' . $nadpisID . '" class="edit-form" style="display:none;">';
            echo '<form method="post" action="index.php" style="margin-left:5px;">';
            echo '<input type="hidden" name="update_obsah" value="' . $nadpisID . '">';
            echo '<input type="hidden" name="redirect" value="' . $_SERVER['REQUEST_URI'] . ' ">';
            echo '<input type="hidden" name="kluc" value="nadpis">';
            echo '<div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="' . $nadpis . '"></div>';
            echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
            echo '</form>';
            echo '</div>';

            echo '<p class="col-12 text-center" style="margin-top:50px" id="text' . $textID . '">' . $text . '</p>';
            echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm(\'obsah' . $textID . '\')">Upraviť text</button>';

            echo '<div id="edit-form-obsah' . $textID . '" class="edit-form" style="display:none;">';
            echo '<form method="post" action="index.php" style="margin-left:5px;">';
            echo '<input type="hidden" name="update_obsah" value="' . $textID . '">';
            echo '<input type="hidden" name="redirect" value="' . $_SERVER['REQUEST_URI'] . ' ">';
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
                <?php
                    include_once "classes/Kategorie.php";
                    $kategoriaDB = new Kategorie();
                    $kategorie = $kategoriaDB->getAll();
                ?>
                <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať jedlo</button>

                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="index.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Názov:</label><input type="text" name="nazov" class="form-control" required></div>
                        <div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_obrazka" class="form-control" required></div>
                        <div class="mb-2"><label>Popis:</label><textarea name="popis" class="form-control" required></textarea></div>
                        <div class="mb-2"><label>Cena:</label><input type="text" name="cena" class="form-control" required></div>
                        <div class="mb-2"><label>Kategória:</label>
                            <select name="kategoria" class="form-control" required>
                                <?php
                                foreach ($kategorie as $kat) {
                                    echo '<option value="' . $kat['ID'] . '">' . $kat['nazov'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="add_jedlo" class="tm-btn tm-btn-success" style="margin-top: 20px; margin-bottom:20px">Uložiť</button>
                    </form>
                </div>
            <!-- Gallery -->
            <div id="tm-gallery-page-pizza" class="tm-gallery-page">
                <?php generateMenu($kategorie[0]['nazov']); ?>

            </div>

            <div id="tm-gallery-page-salad" class="tm-gallery-page hidden">
                <?php generateMenu($kategorie[1]['nazov']); ?>
            </div>

            <div id="tm-gallery-page-noodle" class="tm-gallery-page hidden">
                <?php generateMenu($kategorie[2]['nazov']); ?>
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
                echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm(\'obsah' . $urlID . '\')">Upraviť fotografiu</button>';

                echo '<div id="edit-form-obsah' . $urlID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="index.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_obsah" value="' . $urlID . '">';
                echo '<input type="hidden" name="redirect" value="' . $_SERVER['REQUEST_URI'] . ' ">';
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
                echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm(\'obsah' . $nadpisID . '\')">Upraviť nadpis</button>';

                echo '<div id="edit-form-obsah' . $nadpisID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="index.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_obsah" value="' . $nadpisID . '">';
                echo '<input type="hidden" name="redirect" value="' . $_SERVER['REQUEST_URI'] . ' ">';
                echo '<input type="hidden" name="kluc" value="questions_nadpis">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="' . $nadpis . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo'<p class="tm-mb-p">' . $text . '</p>';
                echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm(\'obsah' . $textID . '\')">Upraviť text</button>';

                echo '<div id="edit-form-obsah' . $textID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="index.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_obsah" value="' . $textID . '">';
                echo '<input type="hidden" name="redirect" value="' . $_SERVER['REQUEST_URI'] . ' ">';
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