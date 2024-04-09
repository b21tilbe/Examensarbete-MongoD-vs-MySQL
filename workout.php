<!DOCTYPE html>
<html>
  <head>
    <title>Workout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="FinalProject.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    th,
    td {
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

    #Back {
      display: block;
      text-align: center;
      margin: auto;
      margin-top: .1rem;
      margin-bottom: 20px;
      padding: 10px;
      font-size: 1rem;
      font-weight: 600;
      background-color: rgb(198, 152, 236);
      border: none;
      border-radius: 3px;
      width: 12.2rem;
    }

    #Back a {
      color: black;
      text-decoration: none;
    }

    #getRandomExercises,
    #Back {
      border: none;
      display: block;
      position: relative;
      padding: 0.7em 2.4em;
      font-size: 18px;
      background: transparent;
      cursor: pointer;
      user-select: none;
      overflow: hidden;
      color: rgb(198, 152, 236);
      z-index: 1;
      font-family: inherit;
      font-weight: 500;
    }

    #getRandomExercises span,
    #Back span {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: transparent;
      z-index: -1;
      border: 4px solid rgb(198, 152, 236);
    }

    #Back a {
      text-decoration: none;
      color: rgb(198, 152, 236);
    }
  </style>
  <body>
    <header>
      <nav>
        <ul class="nav-bar">
          <li class="smallLogo">
            <a href="loggedIn.php">
              <span id="miniLogo" class="material-symbols-outlined">exercise</span>
            </a>
          </li>
          <input type="checkbox" id="check">
          <span class="menu">
            <li>
              <a href="loggedIn.php">Home</a>
            </li>
            <li>
              <a href="program.php">Program</a>
            </li>
            <li>
              <a href="profile.php">Profile</a>
            </li>
            <li>
              <a href="FinalProject.php">Log out</a>
            </li>
            <label for="check" class="close-menu">
              <i class="fas fa-times"></i>
            </label>
          </span>
          <label for="check" class="open-menu">
            <i class="fas fa-bars"></i>
          </label>
        </ul>
      </nav>
    </header>
    <script>
      function saveSelection(selection) {
        localStorage.setItem('selectedCard', selection);
        window.location.href = 'workout.php';
      }
      $(document).ready(function() {
        $("#getRandomExercises").click(function() {
          var selectedValue = localStorage.getItem('selectedCard');
          console.log(selectedValue);
          $.ajax({
            url: "get_random_exercises.php?selected_card=" + selectedValue,
            success: function(result) {
              $("#exerciseTable").html(result);
            }
          });
        });
      });
    </script>
    </head>
    <h2>Workout</h2>
    <div id="exerciseTable"></div>
    <div class="button-container">
      <button id="getRandomExercises">Generate Workout plant <span></span>
      </button>
    </div>
    <div class="button-container">
      <button id="Back">
        <a href="program.php">Back</a>
        <span></span>
      </button>
    </div>
  </body>
</html>
