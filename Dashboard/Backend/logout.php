<?php
session_start();

$_SESSION = array();

session_destroy();

// Clear the cookie
setcookie('rememberme_username', '', time() - 42000, '/');

header('Location: ../index.php');
exit;
?>
