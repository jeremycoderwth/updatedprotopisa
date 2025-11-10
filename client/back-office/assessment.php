<?php

include('./././security/authentication.php');

include('includes/header.php');
include('includes/topnav.php');
include('includes/script.php');
include('elements/popup/add-subject-form.php');
include('elements/popup/create-assessment.php');
?>

<head>
    <title>Assessment</title>
</head>

<section class="content">

    <div class="container mt-1 mb-1">
        <?php include('elements/message.php')?>
            <div class="ml-5">
                <p class="page-name">Manage Assessments</p>
            </div>
        </div>

        <div class="container mt-1 mb-1">
            <div class="row">
                <div class="ml-5 col-8">
                    <nav class="nav container">
                        <div class="nav custom-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item custom-tabs nav-link active" id="nav-student-tab" data-toggle="tab" href="#nav-student" role="tab" aria-controls="nav-student" aria-selected="true">Available Assessments</a>
                        </div>
                    </nav>
                </div>
            </div> <!--row-->
        </div> <!--container-->

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

        <!-- TABLE ASSESSMENTS -->
        <div class="container mt-3 table-responsive tab-pane fade show active" role="tabpanel" aria-labelledby="nav-student-tab" id="nav-student">
            <div class="card" style="margin-bottom: 8rem">

            <div class="card-header">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button class="text-light add-teach-btn" id="assessment-show-popup">Create Assessment</button>
                    <button class="text-light print-btn mx-2" id="subject-show-popup">Add Subject</button>
                </div>
            </div>

                <div class="card-body">
                <div class="card-body mb-5">
                <?php
                $query = "SELECT a.assessment_id, a.assessmentCode, a.assessment_name, s.subject_name, u.fname, u.lname, u.suffix, a.status FROM assessment a
                        LEFT JOIN subject s ON a.subjectID = s.subject_id
                        LEFT JOIN users u ON a.teacherID = u.user_id";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                ?>
                <table id="example1" class="table px-5" style="width:100%">
                    <thead>
                        <tr>
                            <th><center>Assessment Code</center></th>
                            <th><center>Title</center></th>
                            <th><center>Subject</center></th>
                            <th><center>Author</center></th>
                            <th><center>Status</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query_run as $row) {
                            $assessmentID = $row['assessment_id'];
                            $editLink = "assessment-question.php?assessment_id=" . $assessmentID;
                            $deleteLink = "elements/popup/delete-assessment.php?assessment_id=" . $assessmentID;
                            $infoLink = "elements/popup/get_answers_stat.php?assessment_id=" . $assessmentID;
                        ?>
                        <tr>
                            <td><?= $row['assessmentCode']; ?></td>
                            <td><?= $row['assessment_name']; ?></td>
                            <td><?= $row['subject_name']; ?></td>
                            <td><?= $row['fname'] . " " . $row['lname'] . " " . $row['suffix']; ?></td>
                            <td>
                            <?php
                            if ($row['status'] == 0) {
                                echo '<span style="color:GREEN;text-align:center;">Published</span>';
                            }
                            if ($row['status'] == 1) {
                                echo '<span style="color:BLUE;text-align:center;">Hidden</span>';
                            }
                            ?>
                            </td>
                            <td>
                                <a href="<?= $deleteLink; ?>" class="btn p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </a>
                                <a href="<?= $editLink; ?>" class="btn p-1"><img src="../assets/images/pencil.svg" alt="edit"></a>
                                <a href="<?= $infoLink ?>" class="p-1 info-btn" role="button" id="infoBtn" data-bs-toggle="modal" data-bs-target="questionStatsModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </a>
                                <button class="btn p-1" id="hideBtn"><img src="../assets/images/archive.svg" alt="archive"></button>
                            </td>
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

    <!-- MODAL FOR VIEWING STATS -->
    <div class="modal fade" id="questionStatsModal" tabindex="-1" aria-labelledby="viewStatsLabel">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Assessment Question Statistics</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="closeBtn"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover" id="questionStatsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Correct</th>
                                <th>Incorrect</th>
                                <th>Total</th>
                                <th>Average Correct</th>
                            </tr>
                        </thead>
                        <tbody id="questionStatsBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE TEACHER -->


    <!-- TABLE -->
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="./../assets/js/hide-assessment.js"></script>
<script src="./../assets/js/show-stats.js"></script>
<script>
    const myModal = document.getElementById('questionStatsModal');
    const modal = new bootstrap.Modal(myModal);
    
    document.getElementById('closeBtn').addEventListener('click', () => {
        modal.hide();
    });
</script>

</body>
</html> 