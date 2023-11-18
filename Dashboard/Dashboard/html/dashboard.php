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
    <title>Dashboard</title>
    <link rel = "stylesheet" href = "../css/dashboard_style.css">
</head>
<body>
    <div id = "row">
        <div id="right-side">
            Hello
        <?php echo htmlspecialchars($_SESSION['username']); ?>
        </div>
        <form action="../../Backend/logout.php" method="post" style="display: inline-block;">
            <input type="submit" value="Logout" class="text-only-button">
        </form>
        <div id="dropdown_menu">
            <div>
                <img src="../Images/Arrow.png" id="Arrow_img">
                MENU
            </div>
            <div class="dropdown_content">
                <ul>
                    <a href="../../Contact Info/html/Contact Info.php">
                        <li><img src="../Images/CONTACTINFO.png">CONTACT INFO</li>
                    </a>
                    <a href="../../Food Gallery/html/FoodGallery.php">
                        <li><img src="../Images/GALLERY.png">Gallery</li>
                    </a>    
                    <a href="../../cv/html/CV.php">
                        <li><img src="../Images/CV.png">CV</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
    <div id="main-content">
        <h1>Welcome to My Portfolio!</h1>
        <p>
            I'm Ahmad Al Dayekh, and this is a quick portal into my professional journey and personal interests. 
            You can navigate through my CV to get a detailed understanding of my professional experiences, 
            check out my gallery to see some of my favorite foods, or reach out to me via the contact page. 
            Thank you for visiting!
        </p>
    </div>
</body>
</html>
