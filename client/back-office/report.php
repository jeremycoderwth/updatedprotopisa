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
                $query = "SELECT r.studentID, r.assessmentID, r.score, r.date_answered, r.response_id, a.assessment_name, u.fname, u.lname, u.suffix, u.userCode
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
                            <td>
                                <button class="btn btn-link view-btn" type="button" data-bs-toggle="modal" data-bs-target="#viewAnsModal" data-userid="<?= $row['studentID']; ?>" data-assessmentID="<?= $row['assessmentID']; ?>"
                                data-responseid="<?= $row['response_id']; ?>">
                                    <?= $row['assessment_name']; ?>
                                </button>
                            </td>
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

    <!-- MODAL FOR VIEW ANSWER -->
    <div class="modal fade" id="viewAnsModal" tabindex="-1" aria-labelledby="ViewAnsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewAnsLabel">Assessment Answers</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Student Answer</th>
                                <th>Correct Answer</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody id="answersTableBody">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

    <!-- TABLE TEACHER -->


    <!-- TABLE -->
</section>
<script src="./../assets/js/fetch-student-answers.js"></script>
</body>
</html>