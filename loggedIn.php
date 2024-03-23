<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillTrainy</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "Welcome $username";
        } else {
            header("Location: FinalProject.php");
            exit();
        }
    ?>
</body>
</html>
