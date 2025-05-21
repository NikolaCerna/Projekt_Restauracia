<?php
include_once "handlers.php";
include_once "parts/header.php";
?>
		<main>
            <?php
                include_once "classes/Obsah.php";
                $obsah = new Obsah();

                $nadpis = $obsah->getValue('about_nadpis');
                $nadpisID = $obsah->getID('about_nadpis');
                $text = $obsah->getValue('about_text');
                $textID = $obsah->getID('about_text');


                echo'<div class="tm-welcome-section">';
                echo'<h2 class="col-12 text-center tm-section-title">' . $nadpis . '</h2>';
                echo'<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'about_nadpis\', ' . $nadpisID . ')">Upraviť nadpis</button>';

                echo '<div id="edit-form-about_nadpis-' . $nadpisID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="about.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_a" value="' . $nadpisID . '">';
                echo '<input type="hidden" name="kluc" value="about_nadpis">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_a" class="form-control" value="' . $nadpis . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo '<p class="col-12 text-center" style="margin-top:50px" id="text' . $textID . '">' . $text . '</p>';
                echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'about_text\', ' . $textID . ')">Upraviť text</button>';

                echo '<div id="edit-form-about_text-' . $textID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="about.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_a" value="' . $textID . '">';
                echo '<input type="hidden" name="kluc" value="about_text">';
                echo '<div class="mb-2"><textarea name="nova_hodnota_a" class="form-control">' . $text . '</textarea></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';


                echo'</div>';
                ?>
                <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať zamestnanca</button>

                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="about.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Pozicia:</label><input type="text" name="pozicia" class="form-control" required></div>
                        <div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_fotografie" class="form-control" required></div>
                        <div class="mb-2"><label>Meno:</label><input type="text" name="meno" class="form-control" required></div>
                        <div class="mb-2"><label>Priezvisko:</label><input type="text" name="priezvisko" class="form-control" required></div>
                        <div class="mb-2"><label>Popis</label>:</label><textarea name="popis" class="form-control" required></textarea></div>
                        <div class="mb-2"><label>Facebook:</label><input type="text" name="facebook" class="form-control"></div>
                        <div class="mb-2"><label>Twitter:</label><input type="text" name="twitter" class="form-control"></div>
                        <div class="mb-2"><label>Instagram:</label><input type="text" name="instagram" class="form-control"></div>
                        <div class="mb-2"><label>Youtube:</label><input type="text" name="youtube" class="form-control"></div>


                        <button type="submit" name="add-worker" class="tm-btn tm-btn-success" style="margin-top: 20px; margin-bottom:20px">Uložiť</button>
                    </form>
                </div>
                <?php
                generateWorkers();
                generateInformacieJedla();

                $nadpis = $obsah->getValue('history_nadpis');
                $nadpisID = $obsah->getID('history_nadpis');
                $text = $obsah->getValue('history_text');
                $textID = $obsah->getID('history_text');
                $url = $obsah->getValue('history_url');
                $urlID = $obsah->getID('history_url');

                echo '<div class="tm-container-inner tm-history">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="tm-history-inner">';
                echo '<div>';
                echo '<img src="' . $url . '" alt="Image" class="img-fluid tm-history-img" />';
                echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'history_url\', ' . $urlID . ')">Upraviť fotografiu</button>';
                echo '<div id="edit-form-history_url-' . $urlID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="about.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_a" value="' . $urlID . '">';
                echo '<input type="hidden" name="kluc" value="history_url">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_a" class="form-control" value="' . $url . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';


                echo '<div class="tm-history-text"> ';
                echo '<h4 class="tm-history-title">' . $nadpis . '</h4>';
                echo'<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'history_nadpis\', ' . $nadpisID . ')">Upraviť nadpis</button>';

                echo '<div id="edit-form-history_nadpis-' . $nadpisID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="about.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_a" value="' . $nadpisID . '">';
                echo '<input type="hidden" name="kluc" value="history_nadpis">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_a" class="form-control" value="' . $nadpis . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo '<p class="tm-mb-p">' . $text . '</p>';
                echo '<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'history_text\', ' . $textID . ')">Upraviť text</button>';

                echo '<div id="edit-form-history_text-' . $textID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="about.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_a" value="' . $textID . '">';
                echo '<input type="hidden" name="kluc" value="history_text">';
                echo '<div class="mb-2"><textarea name="nova_hodnota_a" class="form-control">' . $text . '</textarea></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';



                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            ?>
        </main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>