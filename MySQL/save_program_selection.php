<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $programName = $_POST['programName'];
    $username = $_POST['username'];

    $sql = "INSERT INTO historik (username, programName) VALUES ('$username', '$programName')";

    if ($conn->query($sql) === TRUE) {
        echo "Selection saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>