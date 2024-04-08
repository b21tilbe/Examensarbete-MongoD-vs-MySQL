<?php
include("connection.php");

if (isset($_GET['selected_card'])) {
    $selectedCard = $_GET['selected_card'];

    $sql = "(SELECT * FROM träningsövning WHERE Typ = 'Compound' OR Typ = 'compound' ORDER BY RAND() LIMIT 2)
    UNION ALL
    (SELECT * FROM träningsövning WHERE Typ <> 'Compound' AND Typ <> 'compound' ORDER BY RAND() LIMIT 4)";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Exercise</th><th>Type</th><th>Reps</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ÖvningsNamn"] . "</td><td>" . $row["Typ"] . "</td><td>";

            switch ($selectedCard) {
                case 'Powerlifting':
                    $reps = rand(4, 6);
                    break;
                case 'Strength':
                    $reps = rand(8, 12);
                    break;
                case 'Endurance':
                    $reps = rand(15, 25);
                    break;
                default:
                    $reps = "N/A";
                    break;
            }

            echo $reps;
            echo "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
} else {
    echo "No card found";
}

$conn->close();
?>
