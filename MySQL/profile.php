<?php
include "connection.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: FinalProject.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM historik WHERE username = '$username'";
$result = $conn->query($sql);

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
<style>
      body {
            font-family: sans-serif;
            background-color: black;
            color: white;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            color: black;
            margin: 0 auto;
            border: none;
            width: 90%;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: none;
        }

        th {
            font-weight: 600;
            background: rgb(198, 152, 236);
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5
        }

        #getRandomExercises {
            display: block; 
            text-align: center;
            margin: auto;
            margin-top: 1.5rem;
            margin-bottom: 20px;
            padding: 10px;
            font-size: 1rem;
            font-weight: 600;
            background-color: rgb(198, 152, 236);
            border: none;
            border-radius: 3px;
        }

        h2 {
            margin-top: 4rem;
            text-align: center;
            font-family: "Bebas Neue";
            letter-spacing: 5px;
            font-size: 3rem;
        }

        h3 {
            margin-left: 1.4rem;
            margin-top: 1.5rem;
            font-family: "Bebas Neue";
            letter-spacing: 5px;
            font-size: 1.4rem;
        }
</style>
<body>
    <div class="username">History for user <?php echo $username; ?></div>
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
    <table border="1">
        <tr>
            <th>Program Name</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["programName"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='1'>No exercise history found</td></tr>";
        }
        ?>
    </table>
    <div class="button-container">
        <button id="buttonGet"><a href="FinalProject.php">Log out</a><span></span></button>
    </div>
    <div class="Dots">
        <p>○○○●</p>
    </div>
</body>
</html>
