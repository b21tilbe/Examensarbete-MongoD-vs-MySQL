<?php
include("connection.php");

if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: loggedIn.php");
        exit();
    }
    else{
        echo '<script> window.location.href = "FinalProject.php"; alert("Login failed. Invalid username or password");</script>';
    }
}
?>

