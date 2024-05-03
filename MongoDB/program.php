<?php
    include("connection.php");

    session_start();
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: FinalProject.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SkillTrainy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="FinalProject.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1 id="ProgramH1">Type of workout</h1>
    <header>
        <nav>
            <ul class="nav-bar">
                <li class="smallLogo"><a href="loggedIn.php"><span id="miniLogo" class="material-symbols-outlined">exercise</span></a></li>
                <input type="checkbox" id="check">
                <span class="menu">
                    <li><a href="loggedIn.php">Home</a></li>
                    <li><a href="program.php">Program</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="FinalProject.php">Log out</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </header>
    <script>
        function saveSelection(selection) {
            var username = "<?php echo $username; ?>";
            localStorage.setItem('selectedCard', selection);

            console.log("User selected program: " + selection);

            $.ajax({
                url: 'save_program_selection.php',
                method: 'POST',
                data: { programName: selection, username: username },
                success: function(response) {
                    console.log(response);
                    window.location.href = 'workout.php';
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>
    <div id="programBody">
        <div class="cards">
            <div class="card card1" onclick="saveSelection('Powerlifting')">
                <div class="cardContainer">
                    <img src="/pictures/strength.jpg" alt="Powerlifting">
                </div>
                <div class="details">
                    <h3>Powerlifting</h3>
                    <p>Build strength</p>
                </div>
            </div>
            <div class="card card2" onclick="saveSelection('Strength')">
                <div class="cardContainer">
                    <img src="/pictures/planB.jpg" alt="Strength">
                </div>
                <div class="details">
                    <h3>Strength</h3>
                    <p>Build muscles</p>
                </div>
            </div>
            <div class="card card3" onclick="saveSelection('Endurance')">
                <div class="cardContainer">
                    <img src="/pictures/Endurance.jpg" alt="Endurance">
                </div>
                <div class="details">
                    <h3>Endurance</h3>
                    <p>Build stamina</p>
                </div>
            </div>
        </div>
    </div>
    <div class="Dots">
        <p>○●○○</p>
    </div>
</body>
</html>
