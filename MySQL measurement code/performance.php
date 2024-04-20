<?php
    echo '<script>
        let iterations = 10;

        function autofillForm() {
            const usernameInput = document.getElementById("user");
            const passwordInput = document.getElementById("pass");
    
            usernameInput.value = "Tilda";
            passwordInput.value = "admin";

            const loginButton = document.querySelector(".login-btn");
            loginButton.click();

            const logoutButton = document.querySelector(\'[href="FinalProject.php"]\');

            logoutButton.click();
        }

        let measurement=performance.now();

        cnt = parseInt(localStorage.getItem("Counter"));

        if(cnt > iterations) {
            alert("Finished! " + cnt);
        } else {
            if(isNaN(cnt)) cnt = 0;

            let old = performance.now();

            var delta = measurement - old;
            var str = localStorage.getItem("theData");
            str += old + "," + measurement + "," + delta + "\\n";
        
            if(cnt == 0) {
                str = "data:text/csv;charset=utf-8,";
            }
        
            cnt++;
            localStorage.setItem("Counter", cnt);
            localStorage.setItem("theData", str);

            location.reload(); 
        }

        function getData() {
            var str = localStorage.getItem("theData");

            var anchor = document.createElement("a");
            anchor.setAttribute("href", encodeURI(str));
            anchor.setAttribute("download", "my_data.csv");
            anchor.innerHTML = "Click Here to download";
            document.body.appendChild(anchor);
            anchor.click();
        }

    </script>';
?>
