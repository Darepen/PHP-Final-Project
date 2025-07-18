<?php
session_start();
require_once 'config/db.php';

// Get the page the user came from, or default to index.php
$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
// Clean the redirect URL to prevent issues
$redirect_url = strtok($redirect_url, '?'); 

// Check if the user is logged in.
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // If not logged in, redirect back with a flag to trigger the modal.
    header("Location: " . $redirect_url . "?login_required=true");
    exit;
}

if (isset($_GET['id'])) {
    $pet_id = (int)$_GET['id'];
    $user_id = (int)$_SESSION['id'];

    // Check if the pet is already a favorite
    $stmt = $db->prepare("SELECT * FROM user_favorites WHERE UserID = ? AND PetID = ?");
    $stmt->bind_param("ii", $user_id, $pet_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Remove from favorites
        $stmt_delete = $db->prepare("DELETE FROM user_favorites WHERE UserID = ? AND PetID = ?");
        $stmt_delete->bind_param("ii", $user_id, $pet_id);
        $stmt_delete->execute();
        $stmt_delete->close();
        
        $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$pet_id]);
    } else {
        // Add to favorites
        $stmt_insert = $db->prepare("INSERT INTO user_favorites (UserID, PetID) VALUES (?, ?)");
        $stmt_insert->bind_param("ii", $user_id, $pet_id);
        $stmt_insert->execute();
        $stmt_insert->close();
        
        $_SESSION['favorites'][] = $pet_id;
    }

    // Update the FavoriteCount
    $stmt_count = $db->prepare("UPDATE pets p SET p.FavoriteCount = (SELECT COUNT(*) FROM user_favorites uf WHERE uf.PetID = ?) WHERE p.PetID = ?");
    $stmt_count->bind_param("ii", $pet_id, $pet_id);
    $stmt_count->execute();
    $stmt_count->close();
}

// Redirect back to the original page after the action.
header("Location: " . $redirect_url);
exit();
?>