<?php

    session_start();
    if (isset($_SESSION['username'])) {

    include("connection.php");

    if (isset($_POST['selected_value'])) {
        $selectedValue = $_POST['selected_value'];
        
        $username = $_SESSION['username'];
        $query = "UPDATE users SET selected_value = '$selectedValue' WHERE username = '$username'";
        
        include("connection.php");

        echo "Användarens val har sparats på servern.";
    } else {
        echo "Inget användarval hittades.";
    }
    } else {
        echo "Användaren är inte inloggad.";
    }
?>
