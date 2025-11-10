<body>
<style>
    .nav-icon:hover, .nav-link:hover{
        color:#FF9635;
    }


</style>
    <header>
    <div class="custom-top border-bottom border-2">
        <div class="row">
            <!-- Left Column (Empty) -->
            <div class="col-lg-4">
                <!-- This column is intentionally left empty -->
            </div>
            
            <!-- Center Column for Logo -->
            <div class="col-lg-4 text-center logo-section">
                <div class="pt-3 pb-3">
                    <nav class="navbar navbar-expand-sm">
                        <div class="container">
                            <a class="navbar-brand" href="Homepage.php"><img class="logo-pisa" src="../assets/images/Logo_COLORED.png" alt=""></a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Right Column for Dropdown -->
            <div class="col-lg-4 dropdown-section">
                
            </div>
        </div><!-- End Row -->
    </div><!-- End Container -->


    <!-- Navigation Bar -->
    <div class="d-flex justify-content-center pt-3 pb-3 top-nav navbar-section" id="navbar-section">
        <nav class="navbar navbar-expand-sm">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-1 mb-lg-0">

                <li class="nav-item mx-5">
                    <div class="col text-center">
                        <div class="d-flex flex-column align-items-center nav-icon">
                        <i class="fa-solid fa-table-columns"></i>
                        <a class="nav-link active px-3" aria-current="page" href="dashboard.php">Dashboard</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item mx-5">
                    <div class="col text-center">
                        <div class="d-flex flex-column align-items-center nav-icon">
                        <i class="fa-solid fa-user"></i>
                        <a class="nav-link px-3" href="users.php">Users</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item mx-5">
                    <div class="col text-center">
                        <div class="d-flex flex-column align-items-center nav-icon">
                        <i class="fa-regular fa-lightbulb"></i>
                        <a class="nav-link px-3" href="assessment.php">Assessments</a>
                        </div>
                    </div>
                </li>

                <!-- <li class="nav-item mx-5">
                    <div class="col text-center">
                        <div class="d-flex flex-column align-items-center nav-icon">
                        <i class="fa-solid fa-book-open"></i>
                        <a class="nav-link px-3" href="AboutUs.php">Subject</a>
                        </div>
                    </div>
                </li> -->

                <li class="nav-item mx-5">
                    <div class="col text-center">
                        <div class="d-flex flex-column align-items-center nav-icon">
                        <i class="fa-solid fa-file-invoice"></i>
                        <a class="nav-link px-3" href="report.php">Reports</a>
                        </div>
                    </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
    <script>
    const navLinksEls = document.querySelectorAll('.nav-link');
    const windowPathname = window.location.pathname;

    const navIconEls = document.querySelectorAll('.nav-icon');

    navLinksEls.forEach(navlink => {
        if (windowPathname.includes('assessment.php') || windowPathname.includes('assessment-question.php')) {
            if (navlink.href.includes('assessment.php')) {
                navlink.style.color = "#FF9635";
            } else {
                navlink.style.color = ""; // Reset the color for other links
            }
        } else {
            if (navlink.href.includes(windowPathname)) {
                navlink.style.color = "#FF9635";
            }
        }
    });

    navIconEls.forEach(navIcon => {
        const navLink = navIcon.lastChild.previousElementSibling;
        if (windowPathname.includes('assessment.php') || windowPathname.includes('assessment-question.php')) {
            if (navLink.href.includes('assessment.php')) {
                navIcon.style.color = "#FF9635";
                navIcon.style.borderBottom = "3px solid #FF9635";
            } else {
                navIcon.style.color = ""; // Reset the color for other icons
                navIcon.style.borderBottom = "";
            }
        } else {
            if (navLink.href.includes(windowPathname)) {
                navIcon.style.color = "#FF9635";
                navIcon.style.borderBottom = "3px solid #FF9635";
            }
        }
    });
    </script>
    </header>