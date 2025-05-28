<?php
session_start();
include_once "classes/Users.php";
include_once "handlers/PouzivateliaHandler.php";
$users = new Users();

$hladat = $_GET['hladat'] ?? '';
$rola = $_GET['rola'] ?? '';

if ($hladat !== '' || $rola !== '') {
    $vsetci = $users->getUsersByFilter($hladat, $rola);
} else {
    $vsetci = $users->getAllUsers();
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Správa používateľov</title>
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .users-container {
            max-width: 1000px;
            margin: 60px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .users-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2D99CC;
        }
        .users-table {
            width: 100%;
            border-collapse: collapse;
        }
        .users-table th, .users-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
        }
        .users-table th {
            background-color: #2D99CC;
            color: white;
        }
        .users-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .action-buttons form {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container users-container">
    <h1><i class="fas fa-users-cog"></i> Správa používateľov</h1>
    <table class="users-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Email</th>
            <th>Rola</th>
            <th>Akcie</th>
        </tr>
        </thead>
        <tbody>
        <form method="get" action="pouzivatelia.php" style="margin-bottom: 20px;">
            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 20px">
                <input type="text" name="hladat" value="<?= $hladat ?>" placeholder="Vyhľadať podľa mena" class="form-control" style="width: 300px;">

                <select name="rola" class="form-control" style="width: 180px;">
                    <option value="">-- Všetky roly --</option>
                    <?php
                    $roles = ['admin', 'pouzivatel', 'kuchar', 'recepcny', 'editor'];
                    foreach ($roles as $role) {
                        $selected = (($_GET['rola'] ?? '') === $role) ? 'selected' : '';
                        echo "<option value='$role' $selected>$role</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="tm-btn tm-btn-primary">Hľadať</button>
                <a href="pouzivatelia.php" class="tm-btn tm-btn-danger" style="padding: 12px;">Zrušiť filter</a>

            </div>
        </form>

        <?php foreach ($vsetci as $user): ?>
            <tr>
                <td><?= $user['ID'] ?></td>
                <td><?= $user['meno'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <form method="post" class="action-buttons">
                        <input type="hidden" name="update_id" value="<?= $user['ID'] ?>">
                        <select name="new_role" class="select-role">
                            <?php
                            $roles = ['admin', 'pouzivatel', 'kuchar', 'recepcny', 'editor'];
                            foreach ($roles as $role) {
                                $selected = ($user['rola'] === $role) ? 'selected' : '';
                                echo "<option value='$role' $selected>$role</option>";
                            }
                            ?>
                        </select>
                        <button type="submit" class="tm-btn tm-btn-success" style="padding: 6px 10px; font-size: 0.9rem;">Uložiť</button>
                    </form>
                </td>
                <td class="action-buttons">
                    <?php if ($user['ID'] != $_SESSION['user_id']) : ?>
                        <form method="post" onsubmit="return confirm('Naozaj chceš zmazať tohto používateľa?');">
                            <input type="hidden" name="delete_id" value="<?= $user['ID'] ?>">
                            <button type="submit" class="tm-btn tm-btn-danger" style="padding: 6px 10px; font-size: 0.9rem;">
                                <i class="fas fa-trash-alt"></i> Zmazať
                            </button>
                        </form>
                    <?php else: ?>
                        <em>(ty)</em>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align: center; margin-top: 30px;">
        <a href="index.php" class="tm-btn tm-btn-primary"><i class="fas fa-arrow-left"></i> Späť na úvod</a>
    </div>
</div>
</body>
</html>
