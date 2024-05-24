<?php
    echo '<script>
        let iterations = 700;

        function test() {
            const strengthCard = document.querySelector(".card2");

            if (strengthCard) {
                strengthCard.click();

                const backButton = document.querySelector("#Back a");
                if (backButton) {
                    backButton.click();
                } else {
                    console.error("Back button not found");
                    window.location.href = "program.php";
                }
            } else {
                console.error("Strength card not found");
                window.location.href = "program.php";
            }
        }

        let cnt = parseInt(localStorage.getItem("Counter")) || 0;

        if (cnt >= iterations) {
            alert("Finished! " + cnt);
        } else {
            const measurement = performance.now();
            const old = parseFloat(localStorage.getItem("LastMeasurement")) || measurement;
            const delta = measurement - old;
            let str = localStorage.getItem("theData");

            if (!str || cnt === 0) {
                str = "data:text/csv;charset=utf-8,";
            }

            str += old + "," + measurement + "," + delta + "\\n";
            cnt++;
            localStorage.setItem("Counter", cnt);
            localStorage.setItem("LastMeasurement", measurement);
            localStorage.setItem("theData", str);

            const getRandomExercisesButton = document.getElementById("getRandomExercises");
            if (getRandomExercisesButton) {
                getRandomExercisesButton.click();
            } else {
                console.error("getRandomExercises button not found");
            }
            test();
        }

        function getData() {
            const str = localStorage.getItem("theData");
            const anchor = document.createElement("a");
            anchor.setAttribute("href", encodeURI(str));
            anchor.setAttribute("download", "my_data.csv");
            anchor.innerHTML = "Click Here to download";
            document.body.appendChild(anchor);
            anchor.click();
        }
    </script>';
?>
