<?php
    $user = 'root';
    $pass = '';
    $db = 'mysql database';

    $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

    echo"Connected";
?>
