<?php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../../index.php');
    exit;
}
$jsonString = file_get_contents('../images/gallery.json');
$images = json_decode($jsonString, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Gallery</title>
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../../user icon css/user_icon.css">
</head>
<body class="Main_Body">
    <div>
        <div class="Box">
            <a href="../../Dashboard/html/dashboard.php">
                <img src="../images/button.png">
            </a>
            <div>Food Gallery</div>
        </div>
        <div class="user-menu-container"style="margin:1px 1px 0 0">
            <div class="user-icon" onclick="toggleDropdown()"></div>
            <div class="dropdown-menu" id="dropdownMenu">
                <div class="dropdown-item"style="color:black;">Username: <?php echo $_SESSION['username']; ?></div>
                <form action="../../Backend/logout.php" method="post" style="display: block;text-align:center;">
                    <input type="submit" value="Logout" class="text-only-button" style="display:inline-block;color:black;">
                </form>
            </div>
        </div>
        <div class="Allign" id = "Gallery">
        <?php foreach ($images as $image): ?>
            <div class="Container">
                <img src="../images/<?php echo $image; ?>" alt="<?php echo pathinfo($image, PATHINFO_FILENAME); ?>">
                <div class="HoverImage">
                    <img src="../images/<?php echo $image; ?>" alt="<?php echo pathinfo($image, PATHINFO_FILENAME); ?>">
                </div>
            </div>
        <?php endforeach; ?>
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