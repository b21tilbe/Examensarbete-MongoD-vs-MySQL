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
</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        var cards = document.querySelectorAll(".card");

        cards.forEach(function(card) {
            card.addEventListener("click", function(event) {
                var selectedValue = event.currentTarget.dataset.cardNumber;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "save_choice.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log("Användarens val har sparats på servern.");
                            alert("Du valde kort " + selectedValue);
                        } else {
                            console.error("Ett fel uppstod när användarens val skulle sparas på servern.");
                        }
                    }
                };
                xhr.send("selected_value=" + selectedValue);
            });
        });
    });
</script>

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
                    <li><a href="#">Workout</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="FinalProject.php">Log out</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </header>
    <div id="programBody">
        <div class="cards">
            <div class="card card1" data-card-number="1">
                <div class="cardContainer">
                    <img src="/pictures/strength.jpg" alt="strength">
                </div>
                <div class="details">
                    <h3>Strength</h3>
                    <p>Lorem Ipsum</p>
                </div>
            </div>
            <div class="card card2" data-card-number="2">
                <div class="cardContainer">
                    <img src="/pictures/strength.jpg" alt="strength">
                </div>
                <div class="details">
                    <h3>Kondition</h3>
                    <p>Lorem Ipsum</p>
                </div>
            </div>
            <div class="card card3" data-card-number="3">
                <div class="cardContainer">
                    <img src="/pictures/strength.jpg" alt="strength">
                </div>
                <div class="details">
                    <h3>Uthållighet</h3>
                    <p>Lorem Ipsum</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
