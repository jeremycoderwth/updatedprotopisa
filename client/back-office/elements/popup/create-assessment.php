<div id="assessment-popup" class="popup">
    <div class="popup-content popup-content-assessment w-50 p-5">
        <form action="././backend/add-assessment-code.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h2 class="">Create New Assessment</h2>
                <p class="mb-4">Update Teacher account details</p>

                <!-- Assessment Name -->
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Assessment Name"
                            name="assessmentName" required>
                        <label for="floatingInput"><i>Assessment Name</i><span style="color:red;">*</span></label>
                    </div>
                </div>

                <!-- Subject -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <select name="subject" required class="form-control" id="floatingInput" required>
                            <option value="">--Select Subject--</option>
                            <?php
                            $sql = "SELECT subject_id, subject_name FROM subject";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $subjectID = $row['subject_id'];
                                    $subjectName = $row['subject_name'];

                                    // Step 2: Generate options for the dropdown
                                    echo "<option value='$subjectID'>$subjectName</option>";
                                }
                            }
                            ?>
                        </select>
                        <label for="floatingInput"><i>Subject</i> <span style="color:red;">*</span></label>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingInput"
                            name="comment" style="height: 100px"></textarea>
                        <label for="floatingInput"><i>Add Assessment Objcetives here...</i></label>
                    </div>
                </div>

                <!-- File Upload -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="fileInput" name="fileToUpload">
                        <label for="fileInput"><i>Attach File</i></label>
                    </div>
                </div>

                <div class="col-md-12 mt-3 text-center">
                    <hr>
                    <button type="submit" name="save_assessment" class="save-teach-btn mx-2">Save</button>
                    <button type="button" class="btn btn-secondary mx-2" id="assessment-close-popup">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
