<?php
require_once "classes/Kontakt.php";
include_once "parts/header.php";

$kontakt = new Kontakt();
$spravy = $kontakt->getAllSpravy();
?>

<style>
    .spravy-container {
        max-width: 1000px;
        margin: 50px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .spravy-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .spravy-table th,
    .spravy-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
        vertical-align: top;
    }

    .spravy-table th {
        background-color: #f7f7f7;
        font-weight: bold;
    }

    .spravy-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .spravy-heading {
        text-align: center;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .spravy-table th,
        .spravy-table td {
            font-size: 14px;
        }
    }
</style>

<main class="tm-container-inner-2">
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
                    <th>Akcia</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($spravy as $sprava): ?>
                    <tr>
                        <td><?= htmlspecialchars($sprava['meno']) ?></td>
                        <td><?= htmlspecialchars($sprava['email']) ?></td>
                        <td><?= nl2br(htmlspecialchars($sprava['sprava'])) ?></td>
                        <td style="text-align: center;">
                            <form method="post" action="spravy.php" style="display: inline;" onsubmit="return confirm('Naozaj chceš túto správu zmazať?');">
                                <input type="hidden" name="delete_sprava" value="<?= $sprava['ID'] ?>">
                                <button type="submit" class="tm-btn tm-btn-danger">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<?php include "parts/footer.php"; ?>
