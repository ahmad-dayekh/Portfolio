<?php
    session_start();
    // If the user is logged in, redirect to the dashboard page
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header('Location: ../Dashboard/html/dashboard.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Dashboard/css/dashboard_style.css">
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var toggle = document.getElementById('toggle-password');
            var icon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.style.backgroundImage = "url('../imgs/hide.png')";
            } else {
                passwordInput.type = 'password';
                icon.style.backgroundImage = "url('../imgs/show.png')";
            }
        }
        function validateForm() {
            var username = document.getElementById('username').value.trim();
            var fullname = document.getElementById('fullname').value.trim();
            var password = document.getElementById('password').value.trim();
            var sex = document.querySelector('input[name="sex"]:checked');
            var dob = document.getElementById('dob').value.trim();

            if (!username || !fullname || !password || !sex || !dob) {
                alert('Please fill out all fields.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

    </script>
</head>
<body class="body" style="background-color: #22223b;">
    <div class="center-box" style="height: 600px;">
        <div id="header-txt">Sign Up</div>
        <form action="../Backend/submit_signup.php" method="post" onsubmit="return validateForm()">
            <div class="form-input">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-input">
                <label for="fullname">Full Name</label><br>
                <input type="text" id="fullname" name="fullname">
            </div>
            <div class="form-input">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password">
                <input type="checkbox" id="toggle-password" class="toggle-checkbox" onclick="togglePassword()">
                <label for="toggle-password" class="eye-icon" id="eye-icon" style="top: 316px;"></label>
            </div>
            <div class="form-input">
                <label>Sex</label><br>
                <input style="margin-top: 15px;" type="radio" id="male" name="sex" value="male">
                <label for="male" style="font-size: 15px;">Male</label>
                <input type="radio" id="female" name="sex" value="female">
                <label for="female" style="font-size: 15px;">Female</label>
            </div>
            <div class="form-input" style="margin-bottom: 13px;">
                <label for="dob">Date of Birth</label><br>
                <input style="margin-top: 15px;" type="date" id="dob" name="dob">
            </div>
            <div style="text-align: center;">
                <button type="submit" class="login-button">Sign Up</button>
            </div>
        </form>
        <div id="signup-prompt" style="margin-top: 50px;">
            Already have an account? <a id="signup-anchor" href="../index.php">Sign in</a>
        </div>
    </div>
</body>
</html>