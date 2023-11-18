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
    <title>Ahmad Al Dayekh's CV</title>
    <link rel="stylesheet" href="../css/CV.css">
    <link rel="stylesheet" href="../../user icon css/user_icon.css">
</head>

<body id="body">
    <div class="user-menu-container"style="margin:1px 1px 0 0">
        <div class="user-icon" onclick="toggleDropdown()"></div>
        <div class="dropdown-menu" id="dropdownMenu">
            <div class="dropdown-item"style="color:black;">Username: <?php echo $_SESSION['username']; ?></div>
            <form action="../../Backend/logout.php" method="post" style="display: block;text-align:center;">
                <input type="submit" value="Logout" class="text-only-button" style="display:inline-block;color:black;">
            </form>
        </div>
    </div>
    <div id="left-side">
        <a href="../../Dashboard/html/dashboard.php">
            <img src="../images/Button.png">
        </a>
        <div id="space1">
            <div>
                <img class="images" src="../images/Contact.PNG"
                    alt="Contact Image">
                <div class="leftbig">Contact</div>
            </div>
            <hr class="line">
            <div class="leftsmall">
                Phone
            </div>
            <div class="leftsmallsmall">
                +961 70472533
            </div>
            <div class="leftsmall">
                Email
            </div>
            <div class="leftsmallsmall">
                aldayekhahmad@gmail.com
            </div>
            <div class="leftsmall">
                Address
            </div>
            <div class="leftsmallsmall">
                Hamra, Near Gefinor Bdg.
                <br>Beirut, Lebanon
            </div>
        </div>
        <div id="space2">
            <div>
                <img class="images" src="../images/Project.PNG"
                    alt="Project Image">
                <div class="leftbig">Projects</div>
            </div>
            <hr class="line">
            <div class="leftsmall">
                JAVA Hospital Management Application
            </div>
            <div class="leftsmallsmall">
                Created a JAVA-based Hospital Management App with CRUD operations for staff, patient, and doctor
                entities.
            </div>
            <div class="leftsmall">
                RISC Processor Development
            </div>
            <div class="leftsmallsmall">
                Designed and built a RISC processor with 8 3-bit registers, supporting arithmetic, memory access,
                branch, and register operations.
            </div>
            <div class="leftsmall">
                Python Wordle App
            </div>
            <div class="leftsmallsmall">
                Created an interactive Python Wordle game where players guess a five-letter word within limited
                attempts, blending word-guessing and puzzle-solving skills.
            </div>
        </div>
        <div id="space3">
            <div>
                <img class="images" src="../images/Language.png"
                    alt="Language Image">
                <div class="leftbig">Languages</div>
            </div>
            <hr class="line">
            <div class="leftsmall">
                English
            </div>
            <div class="leftsmall">
                Arabic
            </div>
        </div>
    </div>
    <div id="right-side">
        <div id="name">
            Ahmad Al Dayekh
        </div>
        <div class="rightbig">
            Education
        </div>
        <hr class="line2">
        <div class="rightsmall">
            Bachelor of Science in Computer Science
        </div>
        <div class="rightsmallsmall">
            Lebanese American University
            <br>CGPA: 3.78
            <br>In Progress: January 2022 - December 2024
        </div>
        <div class="rightbig2">
            Experience
        </div>
        <hr class="line2">
        <div class="rightsmall">
            Lab Assistant
        </div>
        <div class="rightsmallsmall">
            Assisted computer science students in labs, maintained equipment, and resolved technical issues.
            Collaborated with faculty for smooth lab operations.
        </div>
        <div class="rightbig2">
            Courses
        </div>
        <hr class="line2">
        <div class="rightsmallsmall">
            Object-Oriented Programming
            <br>Computer Organization
            <br>Objects and Data Abstraction
            <br>Database Management Systems
            <br>Operating Systems
            <br>Algorithms and Data Structures
        </div>
        <div class="rightbig2">
            Honors and Achievements
        </div>
        <hr class="line2">
        <div class="rightsmallsmall">
            Placed on the Distinction List for outstanding academic performance.
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