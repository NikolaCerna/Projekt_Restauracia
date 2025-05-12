<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "classes/Obsah.php";
                $obsah = new Obsah();

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id_c'], $_POST['nova_hodnota_c'])) {
                    $id = (int)$_POST['update_id_c'];
                    $novaHodnota = trim($_POST['nova_hodnota_c']);
                    $obsah->updateObsah($id, $novaHodnota);
                    header("Location: contact.php");
                    exit();
                }

                $nadpis = $obsah->getValue('contact_nadpis');
                $nadpisID = $obsah->getID('contact_nadpis');
                $text = $obsah->getValue('contact_text');
                $textID = $obsah->getID('contact_text');

                echo'<div class="tm-welcome-section">';
                echo'<h2 class="col-12 text-center tm-section-title" style="margin-bottom:10px">' . $nadpis . '</h2>';
                echo'<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'contact_nadpis\', ' . $nadpisID . ')">Upraviť nadpis</button>';

                echo '<div id="edit-form-contact_nadpis-' . $nadpisID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_c" value="' . $nadpisID . '">';
                echo '<input type="hidden" name="kluc" value="contact_nadpis">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $nadpis . '"></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo'<p class="col-12 text-center" style="margin-top:50px">' . $text . '</p>';

                echo '<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'contact_text\', ' . $textID . ')">Upraviť text</button>';

                echo '<div id="edit-form-contact_text-' . $textID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_c" value="' . $textID . '">';
                echo '<input type="hidden" name="kluc" value="contact_text">';
                echo '<div class="mb-2"><textarea name="nova_hodnota_c" class="form-control">' . $text . '</textarea></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                echo '</form>';
                echo '</div>';


                echo'</div>';
            ?>
			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="name" class="form-control" placeholder="Name" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>
				
					        <div class="form-group">
					          <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
						</form>
					</div>
                    <?php
                    $nadpis_adresa = $obsah->getValue('nadpis_adresa');
                    $nadpis_adresaID = $obsah->getID('nadpis_adresa');
                    $adresa = $obsah->getValue('adresa');
                    $adresaID = $obsah->getID('adresa');
                    $telefonne_cislo = $obsah->getValue('telefonne_cislo');
                    $telefonne_cisloID = $obsah->getID('telefonne_cislo');
                    $email = $obsah->getValue('email');
                    $emailID = $obsah->getID('email');
                    $facebook = $obsah->getValue('facebook');
                    $twitter = $obsah->getValue('twitter');
                    $instagram = $obsah->getValue('instagram');
                    $youtube = $obsah->getValue('youtube');

                    echo'<div class="col-md-6">';
                    echo'<div class="tm-address-box">';
                    echo'<h4 class="tm-info-title tm-text-success">' . $nadpis_adresa . '</h4>';
                    echo'<button type="button" class="tm-btn tm-btn-warning" style="margin-bottom:20px" onclick="toggleEdit(\'nadpis_adresa\', ' . $nadpis_adresaID . ')">Upraviť nadpis</button>';

                    echo '<div id="edit-form-nadpis_adresa-' . $nadpis_adresaID . '" class="edit-form" style="display:none;">';
                    echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                    echo '<input type="hidden" name="update_id_c" value="' . $nadpis_adresaID . '">';
                    echo '<input type="hidden" name="kluc" value="nadpis_adresa">';
                    echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $nadpis_adresa . '"></div>';
                    echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                    echo '</form>';
                    echo '</div>';


                    echo'<address>' . $adresa . '</address>';
                    echo'<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'adresa\', ' . $adresaID . ')">Upraviť adresu</button>';

                    echo '<div id="edit-form-adresa-' . $adresaID . '" class="edit-form" style="display:none;">';
                    echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                    echo '<input type="hidden" name="update_id_c" value="' . $adresaID . '">';
                    echo '<input type="hidden" name="kluc" value="adresa">';
                    echo '<div class="mb-2"><textarea name="nova_hodnota_c" class="form-control">' . $adresa . '"</textarea></div>';
                    echo '<button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>';
                    echo '</form>';
                    echo '</div>';

                    echo'<a href="tel:' . $telefonne_cislo . '" class="tm-contact-link">';
                    echo'<i class="fas fa-phone tm-contact-icon"></i>' . $telefonne_cislo . '';
                    echo'</a>';
                    echo'<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'telefonne_cislo\', ' . $telefonne_cisloID . ')">Upraviť tel. číslo</button>';

                    echo '<div id="edit-form-telefonne_cislo-' . $telefonne_cisloID . '" class="edit-form" style="display:none;">';
                    echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                    echo '<input type="hidden" name="update_id_c" value="' . $telefonne_cisloID . '">';
                    echo '<input type="hidden" name="kluc" value="telefonne_cislo">';
                    echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $telefonne_cislo . '"</input></div>';
                    echo '<button type="submit" class="tm-btn tm-btn-success"">Uložiť</button>';
                    echo '</form>';
                    echo '</div>';

                    echo'<a href="mailto:' . $email . '" class="tm-contact-link">';
                    echo'<i class="fas fa-envelope tm-contact-icon"></i>' . $email . '';
                    echo'</a>';

                    echo'<button type="button" class="tm-btn tm-btn-warning" onclick="toggleEdit(\'email\', ' . $emailID . ')">Upraviť emailovú adresu</button>';

                    echo '<div id="edit-form-email-' . $emailID . '" class="edit-form" style="display:none;">';
                    echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                    echo '<input type="hidden" name="update_id_c" value="' . $emailID . '">';
                    echo '<input type="hidden" name="kluc" value="email">';
                    echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $email . '"</input></div>';
                    echo '<button type="submit" class="tm-btn tm-btn-success"">Uložiť</button>';
                    echo '</form>';
                    echo '</div>';

                    echo'<div class="tm-contact-social">';
                    if (!empty($facebook)) {
                        echo '<a href="' . $facebook . '" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>';
                    }
                    if (!empty($twitter)) {
                        echo '<a href="' . $twitter . '" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>';
                    }
                    if (!empty($instagram)) {
                        echo '<a href="' . $instagram . '" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>';
                    }
                    if (!empty($youtube)) {
                        echo '<a href="' . $youtube . '" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>';
                    }

                    echo'</div>';
                    echo'</div>';
                    echo'</div>';
                    ?>

                </div>
			</div>

            <?php
                $mapa = $obsah->getValue('mapa');
                $mapaID = $obsah->getID('mapa');

                echo '<div class="tm-container-inner-2 tm-map-section">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="tm-map">';
                echo '<iframe src="' . $mapa .'" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';
                echo'<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'mapa\', ' . $mapaID . ')">Upraviť adresu (mapa)</button>';

                echo '<div id="edit-form-mapa-' . $mapaID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_c" value="' . $mapaID . '">';
                echo '<input type="hidden" name="kluc" value="mapa">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $mapa . '"</input></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success"">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="tm-container-inner-2 tm-info-section">';
                echo '<div class="row">';
                echo '<div class="col-12 tm-faq">';

                $nadpis = $obsah->getValue('qna_nadpis');
                $nadpisID = $obsah->getID('qna_nadpis');
                $text = $obsah->getValue('qna_text');
                $textID = $obsah->getID('qna_text');
                echo '<h2 class="text-center tm-section-title">' . $nadpis . '</h2>';
                echo'<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'qna_nadpis\', ' . $nadpisID . ')">Upraviť nadpis</button>';

                echo '<div id="edit-form-qna_nadpis-' . $nadpisID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_c" value="' . $nadpisID . '">';
                echo '<input type="hidden" name="kluc" value="qna_nadpis">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $nadpis . '"</input></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success"">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo '<p class="text-center">' . $text . '</p>';
                echo'<button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEdit(\'qna_text\', ' . $textID . ')">Upraviť text</button>';

                echo '<div id="edit-form-qna_text-' . $textID . '" class="edit-form" style="display:none;">';
                echo '<form method="post" action="contact.php" style="margin-left:5px;">';
                echo '<input type="hidden" name="update_id_c" value="' . $textID . '">';
                echo '<input type="hidden" name="kluc" value="qna_text">';
                echo '<div class="mb-2"><input type="text" name="nova_hodnota_c" class="form-control" value="' . $text . '"</input></div>';
                echo '<button type="submit" class="tm-btn tm-btn-success"">Uložiť</button>';
                echo '</form>';
                echo '</div>';

                echo '<div class="tm-accordion">';
                ?>

                <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať otázku a odpoveď</button>

                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="contact.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Otázka:</label><textarea name="otazka" class="form-control" required></textarea></div>
                        <div class="mb-2"><label>Odpoveď:</label><textarea name="odpoved" class="form-control" required></textarea></div>
                        <button type="submit" name="add-qna" class="tm-btn tm-btn-success" style="margin-top: 20px; margin-bottom:20px">Uložiť</button>
                    </form>
                </div>
                <?php
                    generateQna();
                ?>
		</main>
		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>