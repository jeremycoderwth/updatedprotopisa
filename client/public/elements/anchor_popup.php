<style>
    /* CSS to style the pop-up */
    #popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9999;
    }

    #popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        padding-bottom: 2rem;
        text-align: center;
        display: flex;
        align-items: center; /* Center vertically */
        width: 80%; /* Adjust the width as needed */
        max-width: 600px; /* Set a maximum width */
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .notice_img{
        width: 90%;
        margin-left: 50;
        margin-top: 2rem;
    }
</style>

<!-- HTML for the pop-up -->
<div id="popup-container">
    <div>
        <div id="popup-content" class="row">
            <div id="popup-left" class="col-md-6">
                <!-- Left column with image -->
                <h2>Welcome to Our Website!</h2>
                <p>This is only a prototype intended for educational and dissertation use.</p>
                <p>Please tap "OK" to acknowledge and proceed.</p>
            </div>
            <div id="popup-right" class="col-md-6">
                <!-- Right column with text -->
                <img src="../assets/images/notice_img.png" class="notice_img" alt="Image">
            </div>
            <div class="row">
            <div class="col-md-12">
                <button id="close-popup" class="btn btn-primary">Okay! Got it.</button>
            </div>
        </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
    var popupContainer = document.getElementById('popup-container');
    var closeButton = document.getElementById('close-popup');

    // Check if the user has already seen the pop-up
    if (!localStorage.getItem('popupShown')) {
        // Show the pop-up
        popupContainer.style.display = 'block';
    }

    // Close the pop-up when the close button is clicked
    closeButton.addEventListener('click', function () {
        popupContainer.style.display = 'none';
        // Set a flag in localStorage to prevent the pop-up from showing again
        localStorage.setItem('popupShown', 'true');
    });
});

</script>
