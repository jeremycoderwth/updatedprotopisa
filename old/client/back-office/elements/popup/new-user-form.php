<!-- new-user-form.php -->
<div id="popup" class="popup">
    <div class="popup-content w-50 p-5">
        <h2 class="">Add Teacher</h2>
        <p class="mb-4">Create a new account for Teacher</p>
        

        <form class="row g-3" action="././backend/add-teacher-code.php" method="POST">
            <!-- Enter Email Input (Full Width) -->
            <div class="form-floating col-12">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                name="email" required>
                <label for="floatingInput">Email address <span style="color:red;">*</span></label>
            </div>

            <!-- First Name, Last Name, Suffix (3 Rows Side by Side) -->
            <div class="form-floating col-md-5">
                <input type="text" class="form-control" id="floatingInput" placeholder="First Name"
                name="fname" required>
                <label for="floatingInput">First Name <span style="color:red;">*</span></label>
            </div>
            <div class="form-floating col-md-5">
                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name"
                name="lname" required>
                <label for="floatingInput">Last Name <span style="color:red;">*</span></label>
            </div>
            <div class="form-floating col-md-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="e.g. Jr."
                name="suffix">
                <label for="floatingInput">Suffix</label>
            </div>

            <!-- Username and Password (2 Rows Side by Side) -->
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username"
                name="username" required>
                <label for="floatingInput">Username <span style="color:red;">*</span></label>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Generate Password" name="password" required>
                        <label for="floatingPassword">Generate Password <span style="color:red;">*</span></label>
                    </div>
                    <button id="generatePasswordBtn" class="btn btn-outline-secondary" onclick="generateTemporaryPassword(event)">Generate</button>
                </div>
            </div>

            <br>
            <!-- Buttons (Right Side) -->
            <div class="d-flex flex-row-reverse form-group text-right">
                <button type="submit" name="add_teacher" class="save-teach-btn mx-2">Save</button>
                <button type="button" class="btn btn-secondary mr-2" id="close-popup">Close</button>
            </div>
        </form>
    </div>
</div>
