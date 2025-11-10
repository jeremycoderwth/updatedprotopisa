<?php
include('./././security/authentication.php');

include('includes/header.php');
include('includes/topnav.php');
include('includes/script.php');
?>

<head>
    <title>Reports</title>
</head>

<section class="content">
    <div class="container mt-1 mb-1">
        <?php include('elements/message.php')?>
            <div class="ml-5">
                <p class="page-name">Student Reports</p>
            </div>
    </div>

    <style>
            .dataTables_wrapper .dataTables_length {
                margin-left: 3rem !important;
                margin-top: 2rem !important;
            }
            div.dataTables_wrapper 
            div.dataTables_length select {
                width: 5rem !important;
            }

            div.dt-buttons>.dt-button{
                background-color: white !important;
                margin-bottom: 2rem !important;
            }

            div.dataTables_wrapper div.dataTables_info {
                margin-left: 3rem !important;
            }
        </style>

    <div class="container mt-3 table-responsive tab-pane fade show active" role="tabpanel" aria-labelledby="nav-student-tab" id="nav-student">
    <div class="card" style="margin-bottom: 10rem">
            <div class="card-body m-5 pt-4 px-3">
            <?php
                $query = "SELECT r.studentID, r.assessmentID, r.score, r.date_answered, a.assessment_name, u.fname, u.lname, u.suffix, u.userCode
                FROM studentresponse r
                LEFT JOIN assessment a ON r.assessmentID = a.assessment_id
                LEFT JOIN users u ON r.studentID = u.user_id WHERE role_as='2'";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                ?>
                <table id="example1" class="table pt-3 px-5" style="width:100%">
                    <thead>
                        <tr>
                            <th><center>Student Code</center></th>
                            <th><center>Name</center></th>
                            <th><center>Assessment Name</center></th>
                            <th><center>Score</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($query_run as $row) {
                        ?>
                        <tr>
                            <td><?= $row['userCode']; ?></td>
                            <td><?= $row['fname'] . " " . $row['lname'] . " " . $row['suffix']; ?></td>
                            <td><?= $row['assessment_name']; ?></td>
                            <td><?= $row['score']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                } else {
                ?>
                <div class="text-center">
                    No Record Found
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- TABLE TEACHER -->


    <!-- TABLE -->
</section>

</body>
</html>