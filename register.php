<?php
include("connection.php");

if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    
    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful!");</script>';
        echo '<script>window.location.href = "FinalProject.php";</script>';
        exit();
    }
}

mysqli_close($conn);
?>
