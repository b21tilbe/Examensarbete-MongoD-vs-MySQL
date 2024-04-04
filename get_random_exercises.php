<?php
   include("connection.php");

    $sql = "SELECT * FROM träningsövning ORDER BY RAND() LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ÖvningsNamn</th><th>Typ</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ÖvningsNamn"] . "</td><td>" . $row["Typ"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Inga resultat hittades";
    }
    $conn->close();
?>
