<?php
    $mongoURI = "mongodb://localhost:27017";
    $databaseName = "database2";
    $collectionName = "träningsövning";

    $manager = new MongoDB\Driver\Manager($mongoURI);

    $database = $databaseName;
    $collection = $collectionName;

    if (isset($_GET["selected_card"])) {
        $selectedCard = $_GET["selected_card"];

        function getRandomExercises($manager, $database, $collection, $muscleGroup, $type, $size) {
            $pipeline = [
                ['$match' => ['musclegroup' => $muscleGroup, 'type' => $type]],
                ['$sample' => ['size' => $size]]
            ];
            return $manager->executeCommand($database, new MongoDB\Driver\Command([
                'aggregate' => $collection,
                'pipeline' => $pipeline,
                'cursor' => new stdClass(),
            ]));
        }

        displayMuscleGroupExercises($manager, $database, $collection, $selectedCard, 'Arms');
        displayMuscleGroupExercises($manager, $database, $collection, $selectedCard, 'Chest');
        displayMuscleGroupExercises($manager, $database, $collection, $selectedCard, 'Legs');
        displayMuscleGroupExercises($manager, $database, $collection, $selectedCard, 'Back');
        displayMuscleGroupExercises($manager, $database, $collection, $selectedCard, 'Shoulders');
    } else {
        echo "No card found";
    }

    function displayMuscleGroupExercises($manager, $database, $collection, $selectedCard, $muscleGroup) {
        $compoundExercises = getRandomExercises($manager, $database, $collection, $muscleGroup, 'compound', 2);
        $isolatedExercises = getRandomExercises($manager, $database, $collection, $muscleGroup, 'isolated', 4);

        echo "<h3>$muscleGroup</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Exercise</th><th>Reps</th><th>Sets</th></tr>";

        foreach ($compoundExercises as $row) {
            displayExerciseRow($row, $selectedCard);
        }
        foreach ($isolatedExercises as $row) {
            displayExerciseRow($row, $selectedCard);
        }
        echo "</table>";
    }

    function displayExerciseRow($row, $selectedCard) {
        echo "<tr><td>" . $row->name . "</td><td>";
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
        echo "</td><td>" . (isset($row->Sets) ? $row->Sets : "4") . "</td></tr>";
    }
?>
