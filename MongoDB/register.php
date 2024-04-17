<?php
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $databaseName = 'database2';
        $collectionName = 'login';
    
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $row = new MongoDB\Driver\BulkWrite();
        $row->insert(['username' => $username, 'password' => $password]);
        $conn->executeBulkWrite("$databaseName.$collectionName", $row);
    
        echo '<script>alert("Registration successful!");</script>';
        echo '<script>window.location.href = "FinalProject.php";</script>';
        exit();
    }
?>
