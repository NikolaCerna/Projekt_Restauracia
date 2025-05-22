<?php
include_once "handlers/ObsahHandler.php";
include_once "handlers/OtazkyHandler.php";
include_once "handlers/SpravyHandler.php";
include_once "parts/header.php";
?>
		<main>
            <?php
            include_once "classes/Obsah.php";
            $obsah = new Obsah();

            $nadpis = $obsah->getValue('contact_nadpis');
            $nadpisID = $obsah->getID('contact_nadpis');
            $text = $obsah->getValue('contact_text');
            $textID = $obsah->getID('contact_text');
            ?>

            <div class="tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title" style="margin-bottom:10px"><?= $nadpis ?></h2>
                <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $nadpisID ?>')">Upraviť nadpis</button>

                <div id="edit-form-obsah<?= $nadpisID ?>" class="edit-form" style="display:none;">
                    <form method="post" action="contact.php" style="margin-left:5px;">
                        <input type="hidden" name="update_obsah" value="<?= $nadpisID ?>">
                        <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                        <input type="hidden" name="kluc" value="contact_nadpis">
                        <div class="mb-2">
                            <input type="text" name="nova_hodnota" class="form-control" value="<?= $nadpis ?>">
                        </div>
                        <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                    </form>
                </div>

                <p class="col-12 text-center" style="margin-top:50px"><?= $text ?></p>
                <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $textID ?>')">Upraviť text</button>

                <div id="edit-form-obsah<?= $textID ?>" class="edit-form" style="display:none;">
                    <form method="post" action="contact.php" style="margin-left:5px;">
                        <input type="hidden" name="update_obsah" value="<?= $textID ?>">
                        <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                        <input type="hidden" name="kluc" value="contact_text">
                        <div class="mb-2">
                            <textarea name="nova_hodnota" class="form-control"><?= $text ?></textarea>
                        </div>
                        <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                    </form>
                </div>
            </div>

            <div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="contact.php" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="meno" class="form-control" placeholder="Name" required="" />
					        </div>

					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>

					        <div class="form-group">
					          <textarea rows="5" name="sprava" class="form-control" placeholder="Message" required=""></textarea>
					        </div>

					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
                            <div class="form-group tm-d-flex" style="margin-top: 10px;">
                                <a href="spravy.php" class="tm-btn tm-btn-primary tm-btn-right">Zobraziť správy</a>
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
                    ?>

                    <div class="col-md-6">
                        <div class="tm-address-box">
                            <h4 class="tm-info-title tm-text-success"><?= $nadpis_adresa ?></h4>
                            <button type="button" class="tm-btn tm-btn-warning" style="margin-bottom:20px" onclick="toggleEditForm('obsah<?= $nadpis_adresaID ?>')">Upraviť nadpis</button>

                            <div id="edit-form-obsah<?= $nadpis_adresaID ?>" class="edit-form" style="display:none;">
                                <form method="post" action="contact.php" style="margin-left:5px;">
                                    <input type="hidden" name="update_obsah" value="<?= $nadpis_adresaID ?>">
                                    <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="kluc" value="nadpis_adresa">
                                    <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $nadpis_adresa ?>"></div>
                                    <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                </form>
                            </div>

                            <address><?= $adresa ?></address>
                            <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $adresaID ?>')">Upraviť adresu</button>

                            <div id="edit-form-obsah<?= $adresaID ?>" class="edit-form" style="display:none;">
                                <form method="post" action="contact.php" style="margin-left:5px;">
                                    <input type="hidden" name="update_obsah" value="<?= $adresaID ?>">
                                    <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="kluc" value="adresa">
                                    <div class="mb-2"><textarea name="nova_hodnota" class="form-control"><?= $adresa ?></textarea></div>
                                    <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                </form>
                            </div>

                            <a href="tel:<?= $telefonne_cislo ?>" class="tm-contact-link">
                                <i class="fas fa-phone tm-contact-icon"></i><?= $telefonne_cislo ?>
                            </a>
                            <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $telefonne_cisloID ?>')">Upraviť tel. číslo</button>

                            <div id="edit-form-obsah<?= $telefonne_cisloID ?>" class="edit-form" style="display:none;">
                                <form method="post" action="contact.php" style="margin-left:5px;">
                                    <input type="hidden" name="update_obsah" value="<?= $telefonne_cisloID ?>">
                                    <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="kluc" value="telefonne_cislo">
                                    <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $telefonne_cislo ?>"></div>
                                    <button type="submit" class="tm-btn tm-btn-success">Uložiť</button>
                                </form>
                            </div>

                            <a href="mailto:<?= $email ?>" class="tm-contact-link">
                                <i class="fas fa-envelope tm-contact-icon"></i><?= $email ?>
                            </a>
                            <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $emailID ?>')">Upraviť emailovú adresu</button>

                            <div id="edit-form-obsah<?= $emailID ?>" class="edit-form" style="display:none;">
                                <form method="post" action="contact.php" style="margin-left:5px;">
                                    <input type="hidden" name="update_obsah" value="<?= $emailID ?>">
                                    <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="kluc" value="email">
                                    <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $email ?>"></div>
                                    <button type="submit" class="tm-btn tm-btn-success">Uložiť</button>
                                </form>
                            </div>

                            <div class="tm-contact-social">
                                <?php if (!empty($facebook)) : ?>
                                    <a href="<?= $facebook ?>" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($twitter)) : ?>
                                    <a href="<?= $twitter ?>" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($instagram)) : ?>
                                    <a href="<?= $instagram ?>" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
                                <?php endif; ?>
                                <?php if (!empty($youtube)) : ?>
                                    <a href="<?= $youtube ?>" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $mapa = $obsah->getValue('mapa');
                $mapaID = $obsah->getID('mapa');
                ?>

                <div class="tm-container-inner-2 tm-map-section">
                    <div class="row">
                        <div class="col-12">
                            <div class="tm-map">
                                <iframe src="<?= $mapa ?>" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="tm-btn tm-btn-warning" style="margin: auto; margin-top: 10px" onclick="toggleEditForm('obsah<?= $mapaID ?>')">Upraviť adresu (mapa)</button>
                    <div id="edit-form-obsah<?= $mapaID ?>" class="edit-form" style="display:none; margin-top:10px;">
                        <form method="post" action="contact.php" style="margin-left:5px; margin-bottom:10px;">
                            <input type="hidden" name="update_obsah" value="<?= $mapaID ?>">
                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="kluc" value="mapa">
                            <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $mapa ?>"></div>
                            <button type="submit" class="tm-btn tm-btn-success">Uložiť</button>
                        </form>
                    </div>
                </div>

                <?php
                $nadpis = $obsah->getValue('qna_nadpis');
                $nadpisID = $obsah->getID('qna_nadpis');
                $text = $obsah->getValue('qna_text');
                $textID = $obsah->getID('qna_text');
                ?>

                <div class="tm-container-inner-2 tm-info-section">
                    <div class="row">
                        <div class="col-12 tm-faq">
                            <h2 class="text-center tm-section-title"><?= $nadpis ?></h2>
                            <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $nadpisID ?>')">Upraviť nadpis</button>
                            <div id="edit-form-obsah<?= $nadpisID ?>" class="edit-form" style="display:none;">
                                <form method="post" action="contact.php" style="margin-left:5px;">
                                    <input type="hidden" name="update_obsah" value="<?= $nadpisID ?>">
                                    <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="kluc" value="qna_nadpis">
                                    <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $nadpis ?>"></div>
                                    <button type="submit" class="tm-btn tm-btn-success">Uložiť</button>
                                </form>
                            </div>

                            <p class="text-center"><?= $text ?></p>
                            <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $textID ?>')">Upraviť text</button>
                            <div id="edit-form-obsah<?= $textID ?>" class="edit-form" style="display:none;">
                                <form method="post" action="contact.php" style="margin-left:5px;">
                                    <input type="hidden" name="update_obsah" value="<?= $textID ?>">
                                    <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="kluc" value="qna_text">
                                    <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $text ?>"></div>
                                    <button type="submit" class="tm-btn tm-btn-success">Uložiť</button>
                                </form>
                            </div>

                            <div class="tm-accordion">


                            <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať otázku a odpoveď</button>

                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="contact.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Otázka:</label><textarea name="otazka" class="form-control" required></textarea></div>
                        <div class="mb-2"><label>Odpoveď:</label><textarea name="odpoved" class="form-control" required></textarea></div>
                        <button type="submit" name="add-qna" class="tm-btn tm-btn-success" style="margin-top: 20px; margin-bottom:20px">Uložiť</button>
                    </form>
                </div>
                <?php generateOtazky() ?>
		</main>
		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>