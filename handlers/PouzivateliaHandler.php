<?php
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
?>