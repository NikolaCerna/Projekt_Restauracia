<?php
include_once "classes/Users.php";
session_start();

$users = new Users();

if (!isset($_SESSION['rola']) || $_SESSION['rola'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Zmazanie používateľa
if (isset($_POST['delete_id'])) {
    $idToDelete = $_POST['delete_id'];
    if ($idToDelete != $_SESSION['user_id']) {
        $users->deleteUser($idToDelete);
    }
}

// Zmena roly používateľa
if (isset($_POST['update_id']) && isset($_POST['new_role'])) {
    $users->updateUserRole($_POST['update_id'], $_POST['new_role']);
}

$vsetci = $users->getAllUsers();
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
        <?php foreach ($vsetci as $user): ?>
            <tr>
                <td><?= $user['ID'] ?></td>
                <td><?= htmlspecialchars($user['meno']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
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
