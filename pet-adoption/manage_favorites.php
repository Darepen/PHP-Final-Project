<?php
session_start();
require_once 'config/db.php';

$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {

    $separator = parse_url($redirect_url, PHP_URL_QUERY) ? '&' : '?';

    header("Location: " . $redirect_url . $separator . "login_required=true");
    exit;
}

if (isset($_GET['id'])) {
    $pet_id = (int)$_GET['id'];
    $user_id = (int)$_SESSION['id'];

    $stmt = $db->prepare("SELECT * FROM user_favorites WHERE UserID = ? AND PetID = ?");
    $stmt->bind_param("ii", $user_id, $pet_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $stmt_delete = $db->prepare("DELETE FROM user_favorites WHERE UserID = ? AND PetID = ?");
        $stmt_delete->bind_param("ii", $user_id, $pet_id);
        $stmt_delete->execute();
        $stmt_delete->close();

        $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$pet_id]);
    } else {
        $stmt_insert = $db->prepare("INSERT INTO user_favorites (UserID, PetID) VALUES (?, ?)");
        $stmt_insert->bind_param("ii", $user_id, $pet_id);
        $stmt_insert->execute();
        $stmt_insert->close();
        $_SESSION['favorites'][] = $pet_id;
    }
    $stmt_count = $db->prepare("UPDATE pets p SET p.FavoriteCount = (SELECT COUNT(*) FROM user_favorites uf WHERE uf.PetID = ?) WHERE p.PetID = ?");
    $stmt_count->bind_param("ii", $pet_id, $pet_id);
    $stmt_count->execute();
    $stmt_count->close();
}
header("Location: " . $redirect_url);
exit();
?>