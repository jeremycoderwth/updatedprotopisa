<?php

include('./././security/authentication.php');

include('includes/header.php');
include('includes/topnav.php');
include('includes/script.php');
include('elements/popup/new-user-form.php');
include('elements/popup/edit-user-form.php');

?>

<head>
    <title>Users</title>
</head>

<section class="content">

    <div class="container mt-1 mb-1">
    <?php include('elements/message.php')?>
    <div id="archive-success-alert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
        <strong>Hey!</strong> The User was archived successfully. This message will close in <span id="countdown">3</span> seconds.
    </div>

        <div class="ml-5">
            <p class="page-name">Manage Users</p>
        </div>
    </div>

    <div class="container mt-1 mb-1">
        <div class="row">
            <div class="ml-5 col-8">
                <nav class="nav container">
                    <div class="nav custom-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item custom-tabs nav-link active" id="nav-student-tab" data-toggle="tab" href="#nav-student" role="tab" aria-controls="nav-student" aria-selected="true">Student</a>
                        <?php if ($_SESSION['auth_role'] == '0') :?>
                            <a class="nav-item custom-tabs nav-link" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                        <?php endif; ?>                    
                    </div>
                </nav>
            </div>
        </div> <!--row-->
    </div> <!--container-->

    <!-- TABLE STUDENT -->
    <div class="container mt-3 table-responsive tab-pane fade show active" role="tabpanel" aria-labelledby="nav-student-tab" id="nav-student">
        <div class="card" style="margin-bottom: 10rem">
            <div class="card-header">
                <div class="d-flex flex-row-reverse bd-highlight p-3">
                </div>
            </div>

            <div class="card-body mx-5 mb-5 pb-5 px-3">
                <?php
                $query = "SELECT * FROM users WHERE role_as='2' AND status='1' OR status='2'";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                ?>
                <table id="example1" class="table px-5" style="width:100%">
                    <thead>
                        <tr>
                            <th><center>Student Code</center></th>
                            <th><center>Full Name</center></th>
                            <th><center>Email</center></th>
                            <th><center>Username</center></th>
                            <th><center>Status</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($query_run as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['userCode']; ?></td>
                                    <td><?= $row['fname'] . " " . $row['lname'] . " " . $row['suffix']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td>
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo '<span style="color:GREEN;text-align:center;">Active</span>';
                                        } elseif ($row['status'] == 2) {
                                            echo '<span style="color:BLUE;text-align:center;">Inactive</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="elements/popup/delete-user.php?id=<?= $row['user_id'] ?>" class="btn p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </a>
                                        <button type="button" class="btn show-edit-popup p-1" data-userid="<?=$row['user_id'];?>"><img src="../assets/images/pencil.svg" alt="edit"></button>
                                        <button class="btn archive-btn p-1" data-userid="<?= $row['user_id']; ?>"><img src="../assets/images/archive.svg" alt="archive"></button>
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

    <!-- TABLE TEACHER -->
    <?php
    // Check if the user is an admin (role_as = 0)
    if ($_SESSION['auth_role'] == '0') :
    ?>
    <div class="container mt-3 table-responsive tab-pane fade" role="tabpanel" aria-labelledby="nav-teacher-tab" id="nav-teacher">
    <div class="card" style="margin-bottom: 10rem">
        <div class="card-header">
            <div class="d-flex flex-row-reverse bd-highlight">
                <button class="text-light add-teach-btn" id="show-popup">Add Teacher</button>
            </div>
        </div>

        <div class="card-body mx-5 mb-5">
            <?php
            $query = "SELECT * FROM users WHERE role_as='1' AND status='1' OR status='2'"; // role_as 1 is to retrieve Teacher data from the database
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
            ?>
            <table id="example2" class="table table px-5" style="width:100%">
                <thead>
                    <tr>
                        <th><center>Teacher ID</center></th>
                        <th><center>Full Name</center></th>
                        <th><center>Email</center></th>
                        <th><center>Username</center></th>
                        <th><center>Status</center></th>
                        <th><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($query_run as $row) {
                    ?>
                    <tr>
                        <td><?= $row['userCode']; ?></td>
                        <td><?= $row['fname'] . " " . $row['lname'] . " " . $row['suffix']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td>
                            <?php
                            if ($row['status'] == 1) {
                                echo '<span style="color:GREEN;text-align:center;">Active</span>';
                            }
                            if ($row['status'] == 2) {
                                echo '<span style="color:BLUE;text-align:center;">Inactive</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <button type="button" class="btn show-edit-popup" data-userid="<?=$row['user_id'];?>"><img src="../assets/images/pencil.svg" alt="edit"></button>
                            <button class="btn archive-btn" data-userid="<?= $row['user_id']; ?>"><img src="../assets/images/archive.svg" alt="archive"></button>
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
<?php endif; ?>
    <!-- TABLE -->
</section>
</body>
</html>