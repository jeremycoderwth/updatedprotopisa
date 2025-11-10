<div id="edit-assessment-popup" class="popup">
    <div class="popup-content popup-content-assessment w-50 p-5">
        <form action="././backend/edit-assessment-code.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h2 class="">Edit Assessment</h2>
                <p class="mb-4">Update assessment details</p>

                <!-- Hidden input field to store the assessment_id -->
                <input type="hidden" name="assessmentId" id="assessmentId">

                <!-- Assessment Name -->
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="assessmentName" placeholder="Assessment Name"
                            name="assessmentName">
                        <label for="assessmentName"><i>Assessment Name</i><span style="color:red;">*</span></label>
                    </div>
                </div>

                <!-- Subject -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <select name="subject" class="form-control" id="subject">
                            <option value="">--Select Subject--</option>
                            <?php
                            $sql = "SELECT subject_id, subject_name FROM subject";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $subjectID = $row['subject_id'];
                                    $subjectName = $row['subject_name'];

                                    // Check if this subject matches the assessment's subjectID and set the selected attribute
                                    $selected = ($subjectID == $assessment['subjectID']) ? "selected" : "";

                                    echo "<option value='$subjectID' $selected>$subjectName</option>";
                                }
                            }
                            ?>
                        </select>
                        <label for="subject"><i>Subject</i> <span style="color:red;">*</span></label>
                    </div>
                </div>

                <!-- Comments -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="comment"
                            name="comment" style="height: 100px"></textarea>
                        <label for="comment"><i>Comments</i></label>
                    </div>
                </div>

                <!-- File Upload -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="fileInput" name="fileToUpload">
                        <label for="fileInput"><i>Modify Attached File</i></label>
                    </div>
                </div>

                <!-- Status -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <select name="status" class="form-control" id="status">
                            <option value="0">Published</option>
                            <option value="1">Hidden</option>
                        </select>
                        <label for="status"><i>Status</i> <span style="color:red;">*</span></label>
                    </div>
                </div>

                <div class="col-md-12 mt-3 text-center">
                    <hr>
                    <button type="submit" name="update_assessment" class="save-teach-btn mx-2">Update</button>
                    <button type="button" class="btn btn-secondary mx-2" id="edit-assessment-close-popup">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
