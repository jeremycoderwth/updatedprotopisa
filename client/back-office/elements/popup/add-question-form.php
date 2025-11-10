<style>
#add-question-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

#add-question-popup .popup-content {
    background: #fff;
    border-radius: 10px;
    max-height: 90vh; /* ✅ Limit height */
    overflow: hidden; /* prevent form overflow */
    display: flex;
    flex-direction: column;
}

/* Make the form scrollable vertically */
#add-question-popup .popup-body {
    overflow-y: auto;
    max-height: 80vh; /* ✅ Scroll area */
    padding-right: 1rem;
}

/* Optional: nicer scrollbar */
#add-question-popup .popup-body::-webkit-scrollbar {
    width: 8px;
}
#add-question-popup .popup-body::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 10px;
}

</style>

<!-- new-user-form.php -->
<div id="add-question-popup" class="popup">
    <div class="popup-content w-50 p-5">
        <!-- SCROLLABLE WRAPPER -->
        <div class="popup-body">
            <div class="row">
                <div class="col-7">
                    <h2 class="">Add Question</h2>
                    <p class="mb-4">Add a question to the assessment</p>
                </div>
            </div>

            <form class="row g-3" action="././backend/add-question-code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="assessment_id" id="assessment_id">

                <!-- Question input -->
                <div class="col-md-12 mt-3">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingInput" name="question" style="height: 100px"></textarea>
                        <label for="floatingInput">Type Question here...</label>
                    </div>
                </div>

                <div style="margin-bottom: -1rem;">
                    <p>Add Choices <i>(Select the textbox beside the correct answer)</i>:</p>
                </div>

                <!-- Choices -->
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input type="checkbox" name="is_correct_choice[0]">
                        </div>
                        <input type="text" name="choice[0]" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input type="checkbox" name="is_correct_choice[1]">
                        </div>
                        <input type="text" name="choice[1]" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input type="checkbox" name="is_correct_choice[2]">
                        </div>
                        <input type="text" name="choice[2]" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-text">
                            <input type="checkbox" name="is_correct_choice[3]">
                        </div>
                        <input type="text" name="choice[3]" class="form-control">
                    </div>
                </div>

                <div class="form-group mt-3" id="image-input">
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

                <div class="form-group">
                    <label for="explanation">Explanation / Rationale</label>
                    <textarea class="form-control" name="explanation" id="explanation" rows="3"></textarea>
                </div>

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

                <!-- Buttons -->
                <div class="d-flex flex-row-reverse form-group text-right">
                    <button type="submit" name="add_teacher" class="save-teach-btn mx-2">Save</button>
                    <button type="button" class="btn btn-secondary mr-2" id="close-add-question-popup">Close</button>
                </div>
            </form>
        </div>
        <!-- END SCROLL WRAPPER -->
    </div>
</div>