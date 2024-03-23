<?php 
    include("connection.php");
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const target = document.querySelector(this.getAttribute('href'));
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap');
</style>
<body>

    <header>
        <nav>
            <ul class="nav-bar">
                <li class="smallLogo"><a href="#"><span id="miniLogo" class="material-symbols-outlined">exercise</span> </a></li>
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
                <input type="checkbox" id="check">
                <span class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Program</a></li>
                    <li><a href="#">Workout</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Contact</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </header>
    <section id="index">
    <div class="container">
        <span class="material-symbols-outlined">exercise</span>
        <h1 id="Logo">SkillTrainy</h1>
        <div class="containerLogIn">
            <p>Have an account? <a href="#LogInSection"><b><u>Log in</u></b></a></p>
            <a href="#LogInSection"><span class="material-symbols-outlined">expand_more</span></a>
        </div>
    </div>
   
    </section>
    <section id="LogInSection">
    <div class="login-wrapper">
        <h1>Login Form</h1>
        <form action="login.php" name="form" method="POST">
            <div class="input-container">
                <label for="user">Username:</label>
                <input type="text" id="user" name="user" required>
            </div>
            <div class="input-container">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" required>
            </div>
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
            <button type="submit" class="login-btn" name="submit">Login</button>
        </form>
    </div>
</section>
</body>
</html>
