<?php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../../index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>
    <link rel="stylesheet" href="../css/contact_style.css">
    <link rel="stylesheet" href="../../user icon css/user_icon.css">
</head>
<body>
    <div class="button-container">
        <a href="../../Dashboard/html/dashboard.php">
            <img src="../Images/Button.png" id="button-img">
        </a>
    </div>
    <div class="user-menu-container">
        <div class="user-icon" onclick="toggleDropdown()"></div>
        <div class="dropdown-menu" id="dropdownMenu">
            <div class="dropdown-item">Username: <?php echo $_SESSION['username']; ?></div>
            <form action="../../Backend/logout.php" method="post" style="display: inline-block;">
            <input type="submit" value="Logout" class="text-only-button">
            </form>
        </div>
    </div>

    <div id="box">
        <div id = "header">
            Contact Me
        </div>
        <div id="space1">
            <div class="inside-left1">
                <img src="../Images/Name.png">
                Name
            </div>
            <div class="container1">
                Ahmad Al Dayekh
            </div>
        </div>
        <div class="vertical-line"></div>
        <div id="space2">
        <div class="inside-right1">
            <img src="../Images/Telephone.png">
            Telephone
        </div>
        <div class="container2">
            +961 70472533
        </div>
    </div>
    <div id="space3">
        <div class="inside-left2">
            <img src="../Images/Location.png">
            Location
        </div>
        <div class="container3">
            Near Gefinor Bldg, Hamra, Beirut, Lebanon
        </div>
    </div>
    <div id="space4">
        <div class="inside-right2">
            <img src="../Images/Email.png">
            Email
        </div>
        <div class="container4">
            ahmad.aldayekh@lau.edu
        </div>
    </div>
    <hr id="dotted-line">
    <input class="container5" type="text" name="message" placeholder="Enter your message">
    <div class="container6">
        Send Message
    </div>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdownMenu");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.user-icon')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === "block") {
                        openDropdown.style.display = "none";
                    }
                }
            }
        }

    </script>
</body>
</html>