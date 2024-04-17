<?php
  include("connection.php");
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $databaseName = 'database2';
      $collectionName = 'login';
      
      $username = $_POST["user"];
      $password = $_POST["pass"];
      
      $filter = ['username' => $username, 'password' => $password];
      $query = new MongoDB\Driver\Query($filter);
      $rows = $conn->executeQuery("$databaseName.$collectionName", $query);
      
      $match = false;
      foreach ($rows as $row) {
          $match = true;
          break;
      }
      
      if ($match) {
          echo '<script>window.location.href = "loggedIn.php";</script>';
          exit();
      } else {
          echo '<script>alert("Invalid login.");</script>';
          echo '<script>window.location.href = "FinalProject.php";</script>';
          exit();
      }
  }
?>
