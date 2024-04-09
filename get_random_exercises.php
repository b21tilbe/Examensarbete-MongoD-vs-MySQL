<?php
include "connection.php";

if (isset($_GET["selected_card"])) {
    $selectedCard = $_GET["selected_card"];

    $sqlArms = "(SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ = 'Compound' OR Typ = 'compound') AND Muskelgrupp = 'Arms' ORDER BY RAND() LIMIT 2)
        UNION ALL
        (SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ <> 'Compound' AND Typ <> 'compound') AND Muskelgrupp = 'Arms' ORDER BY RAND() LIMIT 4)";

    $sqlLegs = "(SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ = 'Compound' OR Typ = 'compound') AND Muskelgrupp = 'Legs' ORDER BY RAND() LIMIT 2)
        UNION ALL
        (SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ <> 'Compound' AND Typ <> 'compound') AND Muskelgrupp = 'Legs' ORDER BY RAND() LIMIT 4)";

    $sqlBack = "(SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ = 'Compound' OR Typ = 'compound') AND Muskelgrupp = 'Back' ORDER BY RAND() LIMIT 2)
        UNION ALL
        (SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ <> 'Compound' AND Typ <> 'compound') AND Muskelgrupp = 'Back' ORDER BY RAND() LIMIT 4)";

    $sqlChest = "(SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ = 'Compound' OR Typ = 'compound') AND Muskelgrupp = 'Chest' ORDER BY RAND() LIMIT 2)
        UNION ALL
        (SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ <> 'Compound' AND Typ <> 'compound') AND Muskelgrupp = 'Chest' ORDER BY RAND() LIMIT 4)";

    $sqlShoulders = "(SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ = 'Compound' OR Typ = 'compound') AND Muskelgrupp = 'Shoulders' ORDER BY RAND() LIMIT 2)
        UNION ALL
        (SELECT *, 4 AS Sets FROM träningsövning WHERE (Typ <> 'Compound' AND Typ <> 'compound') AND Muskelgrupp = 'Shoulders' ORDER BY RAND() LIMIT 4)";

    $resultArms = $conn->query($sqlArms);
    $resultLegs = $conn->query($sqlLegs);
    $resultBack = $conn->query($sqlBack);
    $resultChest = $conn->query($sqlChest);
    $resultShoulders = $conn->query($sqlShoulders);

    if ($resultArms->num_rows > 0 || $resultLegs->num_rows > 0) {
        if ($resultArms->num_rows > 0) {
            echo "<h3>Arms</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Exercise</th><th>Reps</th><th>Sets</th></tr>";
            while ($row = $resultArms->fetch_assoc()) {
                displayExerciseRow($row, $selectedCard);
            }
            echo "</table>";
        }

        // Display table for Legs
        if ($resultLegs->num_rows > 0) {
            echo "<h3>Legs</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Exercise</th><th>Reps</th><th>Sets</th></tr>";
            while ($row = $resultLegs->fetch_assoc()) {
                displayExerciseRow($row, $selectedCard);
            }
            echo "</table>";
        }

        // Display table for Back
        if ($resultBack->num_rows > 0) {
            echo "<h3>Back</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Exercise</th><th>Reps</th><th>Sets</th></tr>";
            while ($row = $resultBack->fetch_assoc()) {
                displayExerciseRow($row, $selectedCard);
            }
            echo "</table>";
        }
        // Display table for Back
        if ($resultChest->num_rows > 0) {
            echo "<h3>Chest</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Exercise</th><th>Reps</th><th>Sets</th></tr>";
            while ($row = $resultChest->fetch_assoc()) {
                displayExerciseRow($row, $selectedCard);
            }
            echo "</table>";
        }

        // Display table for Shoulders
        if ($resultShoulders->num_rows > 0) {
            echo "<h3>Shoulders</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Exercise</th><th>Reps</th><th>Sets</th></tr>";
            while ($row = $resultShoulders->fetch_assoc()) {
                displayExerciseRow($row, $selectedCard);
            }
            echo "</table>";
        }
    } else {
        echo "No results found";
    }
} else {
    echo "No card found";
}

$conn->close();

function displayExerciseRow($row, $selectedCard)
{
    echo "<tr><td>" . $row["ÖvningsNamn"] . "</td><td>";

    switch ($selectedCard) {
        case "Powerlifting":
            $reps = rand(2, 3) * 2;
            break;
        case "Strength":
            $reps = rand(4, 6) * 2;
            break;
        case "Endurance":
            $reps = rand(8, 12) * 2;
            break;
        default:
            $reps = "N/A";
            break;
    }

    echo $reps;
    echo "</td><td>" . $row["Sets"] . "</td></tr>";
}

?>
