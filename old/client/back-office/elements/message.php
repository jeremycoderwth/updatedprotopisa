<?php
if(isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
    <div id="auto-close-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $message; ?>
        <i>This message will close in</i> <span id="countdown">3</span>
    </div>
    <script>
        var countdown = 3;

        function updateCountdown() {
            countdown--;
            document.getElementById("countdown").innerText = countdown;
            if (countdown <= 0) {
                clearInterval(timerInterval);
                var autoCloseAlert = document.getElementById("auto-close-alert");
                autoCloseAlert.classList.remove("show");
                autoCloseAlert.classList.add("hide");
            }
        }

        var timerInterval = setInterval(updateCountdown, 1000);

        setTimeout(function () {
            clearInterval(timerInterval);
            var autoCloseAlert = document.getElementById("auto-close-alert");
            autoCloseAlert.classList.remove("show");
            autoCloseAlert.classList.add("hide");
        }, countdown * 1000);
    </script>
    <?php
}
?>
