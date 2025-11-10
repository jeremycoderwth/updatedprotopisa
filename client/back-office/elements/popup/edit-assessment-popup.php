<style>
    .popup-content {
        max-height: 80vh;
        overflow-y: auto !important;
    }

    .popup-content-assessment {
        scrollbar-width: thin; /* Firefox */
        scrollbar-color: #aaa #f1f1f1; /* Firefox scrollbar colors */
    }

    /* Optional: style for scrollbar (for Chrome/Edge/Safari) */
    .popup-content-assessment::-webkit-scrollbar {
        width: 8px;
    }
    .popup-content-assessment::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .popup-content-assessment::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
    .popup-content-assessment::-webkit-scrollbar-thumb:hover {
        background: #999;
    }
</style>

<!-- ✅ Scrollable Edit Assessment Popup -->
<div id="edit-assessment-popup" class="popup">
    <div class="popup-content popup-content-assessment w-50 p-5">
        <form action="././backend/edit-assessment-code.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h2>Edit Assessment</h2>
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
                <!-- displaying the existing image -->
                <label for="currentImage"><strong>Current Image:</strong></label>
                <div class="mb-2">
                    <img id="currentImage" src="" alt="Current Image" class="img-fluid rounded" style="max-height: 200px; border: 1px solid #ccc; padding: 5px;">
                </div>
                <!-- File Upload -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="fileInput" name="fileToUpload">
                        <label for="fileInput"><i>Modify Attached File</i></label>
                    </div>
                </div>
                <!-- existing image -->
                <input type="hidden" name="existingImage" id="existingImage">
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

                <!-- Buttons -->
                <div class="col-md-12 mt-3 text-center">
                    <hr>
                    <button type="submit" name="update_assessment" class="save-teach-btn mx-2">Update</button>
                    <button type="button" class="btn btn-secondary mx-2" id="edit-assessment-close-popup">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
