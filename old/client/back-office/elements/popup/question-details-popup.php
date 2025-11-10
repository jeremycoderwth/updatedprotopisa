<style>
    .display-attachments-button.active-button {
        background-color: #f9900e;
        color: #fff;
        border: none;
        padding: 5px;
    }

    .display-attachments-button{
        width: 100%;
        height: 100%;
        border: none;
        background-color: white;
        padding: 5px;
        transition: .5s all;   
    }

    .display-attachments-button:hover {
        background-color: #f9900e;
        color: #fff;
    }

    .close-button:hover {
        background-color: red;
        color: white;
    }
</style>

<!-- new-user-form.php -->
<div id="question-details-popup" class="popup">
    <div class="popup-content">

        <div class="d-flex flex-row-reverse form-group text-right m-2">
            <button type="button" class="btn close-button mr-2  rounded-circle" id="question-details-close-popup">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="px-5" style="margin-bottom: 1rem;">
            
                    <h2 class="">Question Details</h2>
                    <p class="mb-4">View and Manage question details</p>

                
                    <div class="row g-3">
                        <input type="hidden" name="question_id" id="question_id">
                        <!-- Enter Question Input (Full Width) -->
                        <div class="col-md-12 mt-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="question"
                                name="question" readonly></textarea>
                                <label for="question">Question</label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Choices:</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="choices-container" id="column1">
                                        <!-- Choices for the first column will be dynamically added here -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="choices-container" id="column2">
                                        <!-- Choices for the second column will be dynamically added here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-center align-items-end">
                        <!-- <button class="btn btn-primary" style="width:100px;margin-right: 0.5rem;">Edit</button> -->
                        <button class="btn btn-danger" style="width:100px">Delete</button>
                    </div>

            </div>
            
        </div>
    </div>
</div>
