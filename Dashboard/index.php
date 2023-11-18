<?php
session_start();
$loginError = '';

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: Dashboard/html/dashboard.php');
    exit;
}

// Check for a cookie
if (isset($_COOKIE['rememberme_username'])) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_COOKIE['rememberme_username'];
    header('Location: Dashboard/html/dashboard.php');
    exit;
}

if (isset($_SESSION['error'])) {
    $loginError = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="Dashboard/css/dashboard_style.css">
</head>
<body class="body" style="background-color: #22223b;">
    <div class="center-box">
        <div id="header-txt">Sign in</div>
        <form action="Backend/login.php" method="post">
            <div class="form-input">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-input" style="margin-bottom: 10px;">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password">
                <input type="checkbox" id="toggle-password" class="toggle-checkbox">
                <label for="toggle-password" class="eye-icon"></label>
            </div>
            <div class="form-input" style="margin-bottom: 15px;">
                <input type="checkbox" id="remember-me" name="remember-me" value="on">
                <label for="remember-me" style="font-size: 15px;">Remember me</label>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="login-button">Log in</button>
            </div>
        </form>
        <?php if (!empty($loginError)): ?>
        <script type="text/javascript">
            alert('<?php echo addslashes($loginError); ?>');
        </script>
    <?php endif; ?>
        <div id="signup-prompt">
            Don’t have an account? <a id="signup-anchor" href="Sign up/Signup.php">Sign up</a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementById('password');
            var usernameInput = document.getElementById('username');
            var form = document.querySelector('form');

            document.getElementById('toggle-password').addEventListener('change', function() {
                passwordInput.type = this.checked ? 'text' : 'password';
            });

            form.onsubmit = function(event) {
                if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '') {
                    alert('Please enter both username and password.');
                    event.preventDefault(); // Prevent form from submitting
                }
            };
        });
    </script>
</body>
</html>