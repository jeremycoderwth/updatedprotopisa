// Counter to keep track of the number of added forms
let formCounter = 0;

// Function to clone the template, update names, and append to the container
function addQuestionForm() {
    formCounter++;
    const template = document.getElementById('question-fields-template');
    const clone = template.cloneNode(true);
    clone.style.display = 'block';

    // Clear input fields in the cloned card
    const inputs = clone.querySelectorAll('input[type="text"], textarea');
    inputs.forEach(input => {
        input.value = ''; // Clear input values
    });

    // Update input names with unique identifiers
    const inputsToUpdate = clone.querySelectorAll('input[type="radio"], input[type="text"], textarea');
    inputsToUpdate.forEach(input => {
        const name = input.getAttribute('name');
        if (name) {
            // Update names for radio buttons
            if (input.type === 'radio' && name.includes('correct-choice')) {
                input.setAttribute('name', name.replace(/\[\d+\]/, `[${formCounter}]`));
            } else {
                // Update names for text inputs and textarea
                input.setAttribute('name', name.replace('[]', `[${formCounter}]`));
            }
        }
    });

    // Add event listeners for image, video, and comment buttons
    const addImageBtn = clone.querySelector('.add-image');
    const addVideoBtn = clone.querySelector('.add-video');
    const addCommentBtn = clone.querySelector('.add-comment');
    const imageInput = clone.querySelector('.form-group#image-input');
    const videoInput = clone.querySelector('.form-group#video-input');
    const commentInput = clone.querySelector('.form-group#comment-input');

    addImageBtn.addEventListener('click', () => toggleInputVisibility(imageInput));
    addVideoBtn.addEventListener('click', () => toggleInputVisibility(videoInput));
    addCommentBtn.addEventListener('click', () => toggleInputVisibility(commentInput));

    // Attach the click event listener to the delete button
    const deleteButton = clone.querySelector('.delete-question');
    deleteButton.addEventListener('click', () => {
        // Remove the associated question box (clone) when the delete button is clicked
        document.getElementById('form-container').removeChild(clone);
    });

    document.getElementById('form-container').appendChild(clone);
}

// Function to toggle input field visibility
function toggleInputVisibility(inputField) {
    if (inputField.style.display === 'none' || inputField.style.display === '') {
        inputField.style.display = 'block';
    } else {
        inputField.style.display = 'none';
    }
}

// Attach the click event listener to the "Add Another Question" button
document.getElementById('add-question').addEventListener('click', addQuestionForm);
