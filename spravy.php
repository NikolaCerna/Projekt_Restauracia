<?php
require_once "parts/header.php";

require_once "handlers/SpravyHandler.php";
require_once "classes/Spravy.php";
require_once "classes/Users.php";

$admin = new Users();
$kontakt = new Spravy();
$spravy = $kontakt->getSpravy();
?>
<main style="margin: 20px">
    <div class="spravy-container">
        <h2 class="spravy-heading">Správy od používateľov</h2>

        <?php if (empty($spravy)): ?>
            <p class="text-center text-muted">Žiadne správy zatiaľ neboli odoslané.</p>
        <?php else: ?>
            <table class="spravy-table">
                <thead>
                <tr>
                    <th>Meno</th>
                    <th>Email</th>
                    <th>Správa</th>
                    <th>Odoslané</th>
                    <?php if ($admin->isAdmin()) { ?>
                    <th>Akcia</th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($spravy as $s):
                    $meno = $s['meno'];
                    $email = $s['email'];
                    $sprava = $s['sprava'];
                    $datum = $s['datum_a_cas'];
                    $ID = $s['ID']; ?>
                    <tr>
                        <td><?= $meno ?></td>
                        <td><?= $email ?></td>
                        <td><?= $sprava ?></td>
                        <td><?= $datum ?></td>
                        <?php if ($admin->isAdmin() || $admin->isRecepcny()) { ?>
                        <td style="text-align: center;">
                            <form method="post" action="spravy.php" style="display: inline;" onsubmit="return confirm('Naozaj chceš túto správu zmazať?');">
                                <input type="hidden" name="delete_sprava" value="<?= $ID ?>">
                                <button type="submit" class="tm-btn tm-btn-danger">Zmazať</button>
                            </form>
                        </td>
                        <?php }?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<?php include "parts/footer.php"; ?>
