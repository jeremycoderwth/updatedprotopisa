<style>
    #question-details-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background: #fff;
        border-radius: 10px;
        width: 90%;
        max-width: 800px;
        max-height: 90vh;
        /* <== Important for scroll */
        display: flex;
        flex-direction: column;
        overflow: hidden;
        /* Hide scrollbar overflow */
    }

    .popup-body {
        overflow-y: auto;
        /* <== Enables vertical scroll */
        padding-right: 1rem;
        max-height: 80vh;
        /* <== Prevent content overflow */
    }

    .popup-body::-webkit-scrollbar {
        width: 8px;
    }

    .popup-body::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 10px;
    }

    .display-attachments-button.active-button {
        background-color: #f9900e;
        color: #fff;
        border: none;
        padding: 5px;
    }

    .display-attachments-button {
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

<!-- question details popup -->
<div id="question-details-popup" class="popup">
    <div class="popup-content">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="d-flex flex-row-reverse form-group text-right m-2">
                <button type="button" class="btn close-button mr-2  rounded-circle" id="question-details-close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- question details (should be scrollable) -->
            <div class="px-5 popup-body" style="margin-bottom: 1rem;">
                <h2 class="">Question Details</h2>
                <p class="mb-4">View and Manage question details</p>
                <div class="row g-3">
                    <input type="hidden" name="question_id" id="question_id">
                    <!-- Enter Question Input (Full Width) -->
                    <div class="col-md-12 mt-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="question"
                                name="question"></textarea>
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
                    <div class="form-group mt-3">
                        <span>Question Image:</span>
                        <div class="row">
                            <div class="container img-container">
                                <img src="" alt="question image" id="questionImage" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Change Image</label>
                        <input type="file" class="form-control" name="question_image" id="question_image">
                    </div>
                </div>
                <hr>
                <!-- Rationale/Explanation Section -->
                <div class="form-group mt-3 mb-5">
                    <label for="explanation"><strong>Rationale / Explanation:</strong></label>
                    <textarea class="form-control" placeholder="Explanation/rationale goes here" id="edit-explanation"
                        name="explanation"></textarea>
                </div>
                <div class="d-flex justify-content-center align-items-end">
                    <button class="btn btn-primary" style="width:100px;margin-right: 0.5rem;">Edit</button>
                    <button class="btn btn-danger" style="width:100px">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script>

</script>