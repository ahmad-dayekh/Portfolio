<?php
session_start();
$loginSuccessful = false;
$loginError = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    $filePath = 'data/users.csv';
    $loginSuccessful = false;

    if (($handle = fopen($filePath, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            
            if ($data[0] == $username && password_verify($password, $data[2])) {
                $loginSuccessful = true;
                break;
            }
        }
        fclose($handle);
    }

    if ($loginSuccessful) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
            // Set a cookie that expires in 30 days
            setcookie('rememberme_username', $username, time() + (30 * 24 * 60 * 60), '/');
        } else {
            if (isset($_COOKIE['rememberme_username'])) {
                unset($_COOKIE['rememberme_username']);
                setcookie('rememberme_username', null, -1, '/');
            }
        }

        header('Location: ../Dashboard/html/dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: ../index.php');
        exit();
    }
} else {
    header('Location: ../index.php');
}
?>