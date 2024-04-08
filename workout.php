<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout</title>
    <link rel="stylesheet" href="FinalProject.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            margin-top: auto;
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
            margin-top: .4rem;
            text-align: center;
            font-family: "Bebas Neue";
            letter-spacing: 2px;
            font-size: 1.4rem;
        }

    </style>
    <script>
        function saveSelection(selection) {
            localStorage.setItem('selectedCard', selection);
            window.location.href = 'workout.php';
        }

        $(document).ready(function(){
            $("#getRandomExercises").click(function(){
                var selectedValue = localStorage.getItem('selectedCard');
                console.log(selectedValue);
                $.ajax({
                    url: "get_random_exercises.php?selected_card=" + selectedValue,
                    success: function(result){
                        $("#exerciseTable").html(result);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Workout</h2>
    <div id="exerciseTable"></div>
    <button id="getRandomExercises">Generate Workout plan</button>
</body>
</html>
