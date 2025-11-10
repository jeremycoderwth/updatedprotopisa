<!-- edit-user-form.php -->
<div id="edit-user" class="popup">
    <div class="popup-content w-50 p-5">
        <h2 class="">Edit User Information</h2>
        <p class="mb-4">Update Teacher account details</p>

        <div id="edit-user-message" class="alert" style="display:none;"></div>


        <form id="edit-user-form" class="row g-3">

        <input type="hidden" name="user_id">

            <!-- Enter Email Input (Full Width) -->
            <div class="col-12">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="email" required>
                    <label for="floatingInput">Email address <span style="color:red;">*</span></label>
                </div>
            </div>

            <!-- First Name, Last Name, Suffix (3 Rows Side by Side) -->
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="First Name"
                    name="fname" required>
                    <label for="floatingInput">First Name <span style="color:red;">*</span></label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Last Name"
                    name="lname" required>
                    <label for="floatingInput">Last Name <span style="color:red;">*</span></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="e.g. Jr."
                    name="suffix" >
                    <label for="floatingInput">Suffix</label>
                </div>
            </div>

            <!-- Username and Password (2 Rows Side by Side) -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username"
                    name="username" required>
                    <label for="floatingInput">Username <span style="color:red;">*</span></label>
                </div>
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

            <div class="col-md-12 mb-3">
                <label for="status">Account Status</label>
                <select name="status" required class="form-control" id="status">
                    <option value="">--Set Account Status--</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>


            <br>
            <!-- Buttons (Right Side) -->
            <div class="d-flex flex-row-reverse form-group text-right">
                <button type="submit" name="update_user_info" class="save-teach-btn mx-2">Save</button>
                <button type="button" class="btn btn-secondary mr-2" id="close-edit-popup">Close</button>
            </div>
        </form>
    </div>
</div>


