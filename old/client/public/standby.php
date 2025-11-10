<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['auth_user']['user_id'])) {
    $_SESSION['message'] = "You have to Login to access this page!";
    header('Location: Login.php');
    exit();
}

include('includesClient/header.php');
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Hub</title>

    <style src="https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css"></style>
</head>
  
  <style>
        .imgContainer {
            width: 100%;
            height: auto;
            position: relative;
            margin-left: none !important;
            margin-right: none !important;
        }

        .imgContainer img {
            width: 80%;
            height: auto;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* Dropdown */

        .dropdown-toggle::after {
            display: flex !important;
            margin-left: 0 !important;
            vertical-align: 0 !important;
            content: "";
            border-top: none !important;
            border-right: none !important;
            border-bottom: none !important;
            border-left: none !important;
        }

        .profile-image{
            width: 2rem;
            margin-left: 0.5rem;
            margin-bottom: -0.3rem;
        }

        .ag-courses_box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: 50px 0;
        }
        .ag-courses_item {
            -ms-flex-preferred-size: calc(33.33333% - 30px);
        flex-basis: calc(50% - 10px); /* 50% width for each item with some spacing */

        margin: 5px; /* Adjust margin for spacing between items */

        overflow: hidden;

        border-radius: 28px;
        }
        .ag-courses-item_link {
        display: block;
        padding: 30px 20px;
        background-color: #121212;

        overflow: hidden;

        position: relative;
        }
        .ag-courses-item_link:hover,
        .ag-courses-item_link:hover .ag-courses-item_date {
        text-decoration: none;
        color: #FFF;
        }
        .ag-courses-item_link:hover .ag-courses-item_bg {
        -webkit-transform: scale(10);
        -ms-transform: scale(10);
        transform: scale(10);
        }
        .ag-courses-item_title {
        min-height: 87px;
        margin: 0 0 25px;

        overflow: hidden;

        font-weight: bold;
        font-size: 30px;
        color: #FFF;

        z-index: 2;
        position: relative;
        }
        .ag-courses-item_date-box {
        font-size: 18px;
        color: #FFF;

        z-index: 2;
        position: relative;
        }
        .ag-courses-item_date {
        font-weight: bold;
        color: #f9b234;

        -webkit-transition: color .5s ease;
        -o-transition: color .5s ease;
        transition: color .5s ease
        }
        .ag-courses-item_bg {
        height: 128px;
        width: 128px;
        background-color: #f9b234;

        z-index: 1;
        position: absolute;
        top: -75px;
        right: -75px;

        border-radius: 50%;

        -webkit-transition: all .5s ease;
        -o-transition: all .5s ease;
        transition: all .5s ease;
        }
        .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
        background-color: #3ecd5e;
        }
        .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
        background-color: #e44002;
        }
        .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
        background-color: #952aff;
        }
        .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
        background-color: #cd3e94;
        }
        .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
        background-color: #4c49ea;
        }



        @media only screen and (max-width: 979px) {
        .ag-courses_item {
            -ms-flex-preferred-size: calc(50% - 30px);
            flex-basis: calc(50% - 30px);
        }
        .ag-courses-item_title {
            font-size: 24px;
        }
        }

        @media only screen and (max-width: 767px) {
        .ag-format-container {
            width: 96%;
        }

        }
        @media only screen and (max-width: 639px) {
        .ag-courses_item {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
        }
        .ag-courses-item_title {
            min-height: 72px;
            line-height: 1;

            font-size: 24px;
        }
        .ag-courses-item_link {
            padding: 22px 40px;
        }
        .ag-courses-item_date-box {
            font-size: 16px;
        }
        }
    </style>


    <section class="gradient-background scroll-hidden">
    <div class="container mt-5">
        <div class="row g-lg-1 py-3">
            <!-- LEFT SIDE -->
            <div class="col-lg-5 text-center text-lg-start">
                <h3 class="LoginSignup display-4 fw-bold lh-1 text-white mb-3">
                    Hello <?= $_SESSION['auth_user']['fname']; ?>!
                </h3>
                <p class="col-lg-10 fs-4 text-white">
                    Ready to test your abilities?
                </p>

                <div class="imgContainer mt-5">
                    <img src="../assets/images/PS1.png" alt="Photo 1">
                    <img src="../assets/images/PS2.png" alt="Photo 2">
                    <img src="../assets/images/PS3.png" alt="Photo 3">
                </div>
                
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-md-10 mx-auto col-lg-5">
            <div class="ag-format-container">
                <div class="ag-courses_box">
                    <div class="ag-courses_item">
                    <a href="testAssessment.php" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                            Take test assessment now!
                        </div>
                    </a>
                    </div>

                    <div class="ag-courses_item">
                    <a href="faqs.php" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                        Learn More about PISA
                        </div>
                    </a>
                    </div>

                    <div class="ag-courses_item">
                    <a href="ContactUs.php" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>

                        <div class="ag-courses-item_title">
                        Got some questions?
                        </div>
                    </a>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </section>


    <script>
    const imgContainer = document.querySelector(".imgContainer");
        const images = imgContainer.querySelectorAll("img");
        let currentImageIndex = 0;

        function changeImage() {
            images[currentImageIndex].style.opacity = 0;
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images[currentImageIndex].style.opacity = 1;
        }

        // Show only the first image initially
        images[0].style.opacity = 1;

        // Change image every 1.5 seconds
        setInterval(changeImage, 1500);
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
