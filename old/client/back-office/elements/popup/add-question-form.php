<!-- new-user-form.php -->
<div id="add-question-popup" class="popup">
    <div class="popup-content w-50 p-5">
    <div class="row">
        <div class="col-7">
            <h2 class="">Add Question</h2>
            <p class="mb-4">Add a question to the assessment</p>
        </div>
        <!-- <div class="col-5 text-end align-middle">
            <button type="button" class="btn btn-secondary add-image">
                <i class="fa-regular fa-file-image"></i>
            </button>
            <button type="button" class="btn btn-secondary add-video">
                <i class="fa-solid fa-file-video"></i>
            </button>
        </div> -->
    </div>
        

        <form class="row g-3" action="././backend/add-question-code.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="assessment_id" id="assessment_id">
            <!-- Enter Question Input (Full Width) -->
            <div class="col-md-12 mt-3">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingInput"
                    name="question" style="height: 100px"></textarea>
                    <label for="floatingInput">Type Question here...</label>
                </div>
            </div>

            <div style="margin-bottom: -1rem;">
                <p>Add Choices <i>(Select the textbox beside the correct answer)</i>:</p>
            </div>
            <!-- Choices -->
            <div class="col-md-6">
                <div class="input-group ">
                    <div class="input-group-text">
                        <input type="checkbox" name="is_correct_choice[0]" aria-label="Checkbox for following text input">
                    </div>
                        <input type="text" name="choice[0]" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group ">
                    <div class="input-group-text">
                        <input type="checkbox" name="is_correct_choice[1]" aria-label="Checkbox for following text input">
                    </div>
                        <input type="text" name="choice[1]" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group ">
                    <div class="input-group-text">
                        <input type="checkbox" name="is_correct_choice[2]" aria-label="Checkbox for following text input">
                    </div>
                        <input type="text" name="choice[2]" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group ">
                    <div class="input-group-text">
                        <input type="checkbox" name="is_correct_choice[3]" aria-label="Checkbox for following text input">
                    </div>
                        <input type="text" name="choice[3]" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <!-- Image input field (initially hidden) -->
            <div class="form-group mt-3" id="image-input" style="display: none;">
                <div class="row">
                    <label for="image">Image:</label>
                    <div class="col-11">
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png, .gif">
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger remove-input" data-target="image-input">
                            <i class="fa-regular fa-square-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Video input field (initially hidden) -->
            <div class="form-group mt-3" id="video-input" style="display: none;">
                <div class="row">
                    <label for="video">Video:</label>
                    <div class="col-11">
                        <input type="file" class="form-control" name="video" id="video" accept=".mp4, .avi, .mov">
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger remove-input" data-target="video-input">
                            <i class="fa-regular fa-square-minus"></i>
                        </button>
                    </div>
                </div>
            </div>


            <br>
            <!-- Buttons (Right Side) -->
            <div class="d-flex flex-row-reverse form-group text-right">
                <button type="submit" name="add_teacher" class="save-teach-btn mx-2">Save</button>
                <button type="button" class="btn btn-secondary mr-2" id="close-add-question-popup">Close</button>
            </div>
        </form>
    </div>
</div>
