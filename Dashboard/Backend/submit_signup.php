<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);

    
    $csvLine = [$username, $fullname, $password, $sex, $dob];


    $filePath = 'data/users.csv';
    if (!file_exists(dirname($filePath))) {
        mkdir(dirname($filePath), 0777, true);
    }
    
    // Open the file in append mode, create it if it doesn't exist
    if (($file = fopen($filePath, 'a')) !== false) {

        fputcsv($file, $csvLine);

        fclose($file);
        

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;


        header('Location: ../Dashboard/html/dashboard.php');
    } else {
        
    }
    exit();
} else {

    exit();
}
?>
