<?php
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $databaseName = 'database2';
        $historikCollection = 'historik';

        $programName = $_POST['programName'];
        $username = $_POST['username'];

        $connection2 = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $hej = new MongoDB\Driver\BulkWrite;
        $hej->insert(['username' => $username, 'programName' => $programName]);
        $connection2->executeBulkWrite("$databaseName.$historikCollection", $hej);

        echo "Document inserted successfully.";
    }
?>
