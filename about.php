<?php
require_once "parts/header.php";

require_once "handlers/ObsahHandler.php";
require_once "handlers/ZamestnanciHandler.php";
require_once "handlers/InformacieJedlaHandler.php";
require_once "functions.php";
require_once "classes/Users.php";
require_once "classes/Obsah.php";

$admin = new Users();
$obsah = new Obsah();
?>
            <main>
                <div class="tm-welcome-section">
                    <?php
                    $nadpis = $obsah->getValue('about_nadpis');
                    $nadpisID = $obsah->getID('about_nadpis');
                    $text = $obsah->getValue('about_text');
                    $textID = $obsah->getID('about_text');
                    ?>
                    <h2 class="col-12 text-center tm-section-title"><?= $nadpis ?></h2>
                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                    <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $nadpisID ?>')">Upraviť nadpis</button>
                    <?php } ?>
                    <div id="edit-form-obsah<?= $nadpisID ?>" class="edit-form" style="display:none;">
                        <form method="post" action="about.php" style="margin-left:5px;">
                            <input type="hidden" name="update_obsah" value="<?= $nadpisID ?>">
                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="kluc" value="about_nadpis">
                            <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $nadpis ?>"></div>
                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                        </form>
                    </div>

                    <p class="col-12 text-center" style="margin-top:50px"><?= $text ?></p>
                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                    <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $textID ?>')">Upraviť text</button>
                    <?php } ?>
                    <div id="edit-form-obsah<?= $textID ?>" class="edit-form" style="display:none;">
                        <form method="post" action="about.php" style="margin-left:5px;">
                            <input type="hidden" name="update_obsah" value="<?= $textID ?>">
                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                            <input type="hidden" name="kluc" value="about_text">
                            <div class="mb-2"><textarea name="nova_hodnota" class="form-control"><?= $text ?></textarea></div>
                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                        </form>
                    </div>
                </div>
                <?php if ($admin->isAdmin()) { ?>
                <button type="button" class="tm-btn tm-btn-primary" style="margin-left: 55px; margin-bottom:20px" onclick="toggleAddForm()">Pridať zamestnanca</button>
                <?php } ?>
                <div id="add-form" style="display:none; margin-top:20px;">
                    <form method="post" action="about.php" style="max-width: 20vw; margin-left:55px">
                        <div class="mb-2"><label>Pozicia:</label><input type="text" name="pozicia" class="form-control" required></div>
                        <div class="mb-2"><label>URL obrázka:</label><input type="text" name="url_fotografie" class="form-control" required></div>
                        <div class="mb-2"><label>Meno:</label><input type="text" name="meno" class="form-control" required></div>
                        <div class="mb-2"><label>Priezvisko:</label><input type="text" name="priezvisko" class="form-control" required></div>
                        <div class="mb-2"><label>Popis:</label><textarea name="popis" class="form-control" required></textarea></div>
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
                ?>
                <div class="tm-container-inner tm-history">
                    <div class="row">
                        <div class="col-12">
                            <div class="tm-history-inner">
                                <div>
                                    <img src="<?= $url ?>" alt="Image" class="img-fluid tm-history-img" />
                                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                                    <button type="button" class="tm-btn tm-btn-warning" style="margin: auto;" onclick="toggleEditForm('obsah<?= $urlID ?>')">Upraviť fotografiu</button>
                                    <?php } ?>
                                    <div id="edit-form-obsah<?= $urlID ?>" class="edit-form" style="display:none;">
                                        <form method="post" action="about.php" style="margin-left:5px;">
                                            <input type="hidden" name="update_obsah" value="<?= $urlID ?>">
                                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                            <input type="hidden" name="kluc" value="history_url">
                                            <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $url ?>"></div>
                                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="tm-history-text">
                                    <h4 class="tm-history-title"><?= $nadpis ?></h4>
                                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                                    <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $nadpisID ?>')">Upraviť nadpis</button>
                                    <?php } ?>
                                    <div id="edit-form-obsah<?= $nadpisID ?>" class="edit-form" style="display:none;">
                                        <form method="post" action="about.php" style="margin-left:5px;">
                                            <input type="hidden" name="update_obsah" value="<?= $nadpisID ?>">
                                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                            <input type="hidden" name="kluc" value="history_nadpis">
                                            <div class="mb-2"><input type="text" name="nova_hodnota" class="form-control" value="<?= $nadpis ?>"></div>
                                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                        </form>
                                    </div>

                                    <p class="tm-mb-p"><?= $text ?></p>
                                    <?php if ($admin->isAdmin() || $admin->isEditor()) { ?>
                                    <button type="button" class="tm-btn tm-btn-warning" onclick="toggleEditForm('obsah<?= $textID ?>')">Upraviť text</button>
                                    <?php } ?>
                                    <div id="edit-form-obsah<?= $textID ?>" class="edit-form" style="display:none;">
                                        <form method="post" action="about.php" style="margin-left:5px;">
                                            <input type="hidden" name="update_obsah" value="<?= $textID ?>">
                                            <input type="hidden" name="redirect" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                            <input type="hidden" name="kluc" value="history_text">
                                            <div class="mb-2"><textarea name="nova_hodnota" class="form-control"><?= $text ?></textarea></div>
                                            <button type="submit" class="tm-btn tm-btn-success" style="margin-bottom:20px">Uložiť</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include "parts/footer.php" ?>
        </div>
    </body>
</html>