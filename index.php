<?php
require_once "parts/header.php";

require_once "handlers/ObsahHandler.php";
require_once "handlers/JedalnyListokHandler.php";
require_once "functions.php";
require_once "classes/Obsah.php";
require_once "classes/Users.php";
require_once "classes/JedalnyListok.php";

$admin = new Users();
$obsah = new Obsah();
?>
            <main>
                <?php if ($admin->isAdmin()) { ?>
                <div style="display: flex; justify-content: flex-end; margin: 20px;">
                    <a href="pouzivatelia.php" class="tm-btn tm-btn-success" style="white-space: nowrap;">
                        <i class="fas fa-users-cog"></i> Používatelia
                    </a>
                </div>
                <?php } ?>
                <div class="tm-welcome-section">
                    <?php
                    $nadpis = $obsah->getValue('nadpis');
                    $nadpisID = $obsah->getID('nadpis');
                    $text = $obsah->getValue('text');
                    $textID = $obsah->getID('text');
                    ?>
                    <h2 class="col-12 text-center tm-section-title"><?= $nadpis ?></h2>
                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                    <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $nadpisID ?>')">Upraviť nadpis</button>
                    <?php } ?>
                    <div id="edit-form-obsah<?= $nadpisID ?>" class="edit-form" style="display:none;">
                        <form method="post" action="index.php" style="margin-left:5px;">
                            <input type="hidden" name="update_obsah" value="<?= $nadpisID ?>">
                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="kluc" value="nadpis">
                            <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $nadpis ?>"></div>
                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                        </form>
                    </div>

                    <p class="col-12 text-center" style="margin-top:50px"><?= $text ?></p>
                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                    <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $textID ?>')">Upraviť text</button>
                    <?php } ?>
                    <div id="edit-form-obsah<?= $textID ?>" class="edit-form" style="display:none;">
                        <form method="post" action="index.php" style="margin-left:5px;">
                            <input type="hidden" name="update_obsah" value="<?= $textID ?>">
                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="kluc" value="text">
                            <div class="mb-2"><textarea name="nova_hodnota" class="form-control"><?= $text ?></textarea></div>
                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                        </form>
                    </div>
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

                <?php
                $db = new JedalnyListok();
                $kategorie = $db->getKategorie();
                ?>

                <?php if ($admin->isAdmin() || $admin->isKuchar()) { ?>
                <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať jedlo</button>
                <?php } ?>
                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="index.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Názov:</label><input type="text" name="nazov" class="form-control" required></div>
                        <div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_obrazka" class="form-control" required></div>
                        <div class="mb-2"><label>Popis:</label><textarea name="popis" class="form-control" required></textarea></div>
                        <div class="mb-2"><label>Cena:</label><input type="text" name="cena" class="form-control" required></div>
                        <div class="mb-2"><label>Kategória:</label>
                            <select name="kategoria" class="form-control" required>
                                <?php foreach ($kategorie as $kat): ?>
                                    <option value="<?= $kat['ID'] ?>"><?= $kat['nazov'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="add_jedlo" class="tm-btn tm-btn-success" style="margin-top: 20px; margin-bottom:20px">Uložiť</button>
                    </form>
                </div>

                <div id="tm-gallery-page-pizza" class="tm-gallery-page">
                    <?php generateMenu($kategorie[0]['nazov']); ?>
                </div>
                <div id="tm-gallery-page-salad" class="tm-gallery-page hidden">
                    <?php generateMenu($kategorie[1]['nazov']); ?>
                </div>
                <div id="tm-gallery-page-noodle" class="tm-gallery-page hidden">
                    <?php generateMenu($kategorie[2]['nazov']); ?>
                </div>

                <?php
                $url = $obsah->getValue('questions_url');
                $urlID = $obsah->getID('questions_url');
                $qnadpis = $obsah->getValue('questions_nadpis');
                $qnadpisID = $obsah->getID('questions_nadpis');
                $qtext = $obsah->getValue('questions_text');
                $qtextID = $obsah->getID('questions_text');
                ?>

                <div class="tm-section tm-container-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="tm-description-figure">
                                <img src="<?= $url ?>" alt="Image" class="img-fluid" />
                                <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                                <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $urlID ?>')">Upraviť fotografiu</button>
                                <?php } ?>
                                <div id="edit-form-obsah<?= $urlID ?>" class="edit-form" style="display:none;">
                                    <form method="post" action="index.php" style="margin-left:5px;">
                                        <input type="hidden" name="update_obsah" value="<?= $urlID ?>">
                                        <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                        <input type="hidden" name="kluc" value="questions_url">
                                        <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $url ?>"></div>
                                        <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                    </form>
                                </div>
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <div class="tm-description-box">
                                <h4 class="tm-gallery-title"><?= $qnadpis ?></h4>
                                <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                                <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $qnadpisID ?>')">Upraviť nadpis</button>
                                <?php } ?>
                                <div id="edit-form-obsah<?= $qnadpisID ?>" class="edit-form" style="display:none;">
                                    <form method="post" action="index.php" style="margin-left:5px;">
                                        <input type="hidden" name="update_obsah" value="<?= $qnadpisID ?>">
                                        <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                        <input type="hidden" name="kluc" value="questions_nadpis">
                                        <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $qnadpis ?>"></div>
                                        <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                    </form>
                                </div>

                                <p class="tm-mb-p"><?= $qtext ?></p>
                                <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                                <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $qtextID ?>')">Upraviť text</button>
                                <?php } ?>
                                <div id="edit-form-obsah<?= $qtextID ?>" class="edit-form" style="display:none;">
                                    <form method="post" action="index.php" style="margin-left:5px;">
                                        <input type="hidden" name="update_obsah" value="<?= $qtextID ?>">
                                        <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                        <input type="hidden" name="kluc" value="questions_text">
                                        <div class="mb-2"><textarea name="nova_hodnota" class="form-control"><?= $qtext ?></textarea></div>
                                        <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                    </form>
                                </div>
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
