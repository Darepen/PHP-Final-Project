<?php
// Determine the return URL, default to index.php if not available
$back_url = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : 'index.php';
$hostname   = "localhost";
$username   = "root";  
$password   = "";
$dbName     = "p_r_s_db"; 

// Create connection
$db = new mysqli($hostname, $username, $password, $dbName, 3307); 

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>