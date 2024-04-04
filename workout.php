<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Träningsövningar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $(document).ready(function(){
        $("#getRandomExercises").click(function(){
            <?php
            if(isset($_SESSION['selected_value'])) {
                $selectedValue = $_SESSION['selected_value'];
                echo "var selectedValue = '$selectedValue';";
            } else {
                echo "var selectedValue = '';";
            }
            ?>
            $.ajax({
                    url: "get_random_exercises.php?selected_value=" + selectedValue,
                    success: function(result){
                        $("#exerciseTable").html(result);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Slumpmässiga Träningsövningar</h2>
    <button id="getRandomExercises">Hämta slumpmässiga övningar</button>
    <div id="exerciseTable"></div>
</body>
</html>
