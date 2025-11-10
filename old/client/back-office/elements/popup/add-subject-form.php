<!-- new-user-form.php -->
<div id="subject-popup" class="popup">
    <div class="popup-content w-50 p-5">
        <h2 class="">Add Subject</h2>
        <p class="mb-4">Create a new Subject Category</p>

        <form class="row g-3" action="././backend/add-subject-code.php" method="POST">
            <!-- Enter Email Input (Full Width) -->
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="First Name"
                    name="subjectName" required>
                    <label for="floatingInput">Subject Name</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                    name="subjectComment"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
            </div>

            <!-- Buttons (Right Side) -->
            <div class="d-flex flex-row-reverse form-group text-right">
                <button type="submit" name="save_subject" class="save-teach-btn mx-2">Save</button>
                <button type="button" class="btn btn-secondary mr-2" id="subject-close-popup">Close</button>
            </div>
        </form>
    </div>
</div>
