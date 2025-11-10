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
                                <a href="<?= $editLink; ?>" class="btn"><img src="../assets/images/pencil.svg" alt="edit"></a>
                                <button class="btn"><img src="../assets/images/archive.svg" alt="archive"></button>
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

    <!-- TABLE TEACHER -->


    <!-- TABLE -->
</section>

</body>
</html>