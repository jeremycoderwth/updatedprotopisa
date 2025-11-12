//References
let timeLeft = document.querySelector(".time-left");
let quizContainer = document.getElementById("container");
let nextBtn = document.getElementById("next-button");
let countOfQuestion = document.querySelector(".number-of-question");
let displayContainer = document.getElementById("display-container");
let scoreContainer = document.querySelector(".score-container");
let userScore = document.getElementById("user-score");
let startScreen = document.querySelector(".start-screen");
let startButton = document.getElementById("start-button");
let currentAssessment = [];
let questionCount;
let scoreCount = 0;
let count = 11;
let countdown;
let quizArray = [];
let userResponses = [];

/*function fetchQuestionsAndChoices(assessmentID) {
    // Make an AJAX request to fetch questions and choices based on the assessmentID
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `../public/backend/fetch_questions.php?assessment_id=${assessmentID}`, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            if (data && data.length > 0) {
                quizArray = data;
                initial();
            } else {
                console.log('No questions found for this assessment.');
            }
        } else {
            console.error('Failed to fetch questions and choices.');
        }
    };

    xhr.send();
}*/

function fetchQuestionsAndChoices(assessmentID) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `../public/backend/fetch_questions.php?assessment_id=${assessmentID}`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    const data = JSON.parse(xhr.responseText);
                    if (data && data.length > 0) {
                        quizArray = data;
                        initial();
                        resolve(data);
                    } else {
                        console.warn('No questions found for this assessment.');
                        resolve([]);
                    }
                } catch (err) {
                    console.error("Error parsing questions JSON:", err);
                    reject(err);
                }
            } else {
                reject('Failed to fetch questions and choices.');
            }
        };

        xhr.onerror = function () {
            reject('Network error while fetching questions.');
        };

        xhr.send();
    });
}

function fetchAssessmentImages(assessmentID) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `../public/backend/fetch_assessment_images.php?assessment_id=${assessmentID}`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    const data = JSON.parse(xhr.responseText);
                    if (data) {
                        currentAssessment = data;
                        resolve(data);
                    } else {
                        console.log('No assessment details found.');
                        resolve(null);
                    }
                } catch (err) {
                    reject(err);
                }
            } else {
                reject('Failed to fetch assessment details.');
            }
        };

        xhr.onerror = () => reject('Network error.');
        xhr.send();
    });
}

//Next Button
nextBtn.addEventListener(
    "click",
    (displayNext = () => {
        document.getElementById('rationale-box').style.display = 'none';
        //increment questionCount
        questionCount += 1;
        //if last question
        if (questionCount == quizArray.length) {
            // hide "Next" button and display "Finish" button
            nextBtn.style.display = 'none';
            document.getElementById('finish-button').style.display = 'block';
            
            // //hide question container and display score
            // displayContainer.classList.add("hide");
            scoreContainer.classList.remove("hide");
            //user score
            userScore.innerHTML =
                "Your score is " + scoreCount + " out of " + questionCount;
        } else {
            //display questionCount
            countOfQuestion.innerHTML =
                questionCount + 1 + " of " + quizArray.length + " Question";
            //display quiz
            quizDisplay(questionCount);
            count = 11;
            // clearInterval(countdown);
            // timerDisplay();
        }
    })
);

//Timer
// const timerDisplay = () => {
//     countdown = setInterval(() => {
//         count--;
//         timeLeft.innerHTML = `${count}s`;
//         if (count == 0) {
//             clearInterval(countdown);
//             displayNext();
//         }
//     }, 1000);
// };
// 

// Function to display a specific question
function quizDisplay(questionIndex) {
    const quizCards = document.querySelectorAll(".container-mid");

    if (quizCards.length <= questionIndex) {
        console.error("Invalid question index:", questionIndex);
        return;
    }

    // Hide all cards
    quizCards.forEach(card => card.classList.add("hide"));

    const card = quizCards[questionIndex];
    card.classList.remove("hide");

    // Remove previously added image if any
    const existingImage = card.querySelector(".question-image");
    if (existingImage) existingImage.remove();

    // Determine which image to display
    if (card.dataset.questionImage) {
        imageUrl = card.dataset.questionImage;
    } else if (currentAssessment.attach_file) {
        imageUrl = currentAssessment.attach_file;
    }

    // Create and append image
    const img = document.createElement("img");
    img.src = imageUrl;
    img.alt = "Question Image";
    img.classList.add("question-image");
    img.style.maxWidth = "100%";
    img.style.display = "block";
    img.style.margin = "10px 0";

    card.prepend(img);

    // Update question count display
    countOfQuestion.innerHTML = `${questionIndex + 1} of ${quizArray.length} Questions`;
}

// Function to create quiz dynamically
function quizCreator() {
    // Shuffle questions
    quizArray.sort(() => Math.random() - 0.5);

    quizArray.forEach((q, index) => {
        // Shuffle options
        q.options.sort(() => Math.random() - 0.5);

        // Create card
        const div = document.createElement("div");
        div.classList.add("container-mid", "hide");
        div.dataset.questionImage = q.questionImage || ""; // Store question image in dataset

        // Question text
        const questionP = document.createElement("p");
        questionP.classList.add("question");
        questionP.textContent = q.question;
        div.appendChild(questionP);

        // Options
        const optionsContainer = document.createElement("div");
        optionsContainer.classList.add("options-container");

        q.options.forEach(option => {
            const btn = document.createElement("button");
            btn.classList.add("option-div");
            btn.textContent = option;
            btn.dataset.choiceId = q.choiceID;
            btn.onclick = () => checker(btn, q);
            optionsContainer.appendChild(btn);
        });
        div.appendChild(optionsContainer);

        // Explanation / Rationale container
        const explanationDiv = document.createElement("div");
        explanationDiv.classList.add("explanation", "hide");
        explanationDiv.textContent = q.rationale || "";
        div.appendChild(explanationDiv);

        // Append to quiz container
        quizContainer.appendChild(div);
    });

    // Show the first question
    quizDisplay(0);
}

// Example CSS for clean UI
const style = document.createElement("style");
style.textContent = `
.container-mid {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    background-color: #fff;
    margin-bottom: 20px;
}

.question {
    font-size: 1.2rem;
    font-weight: 500;
    margin-bottom: 15px;
}

.option-div {
    display: block;
    width: 100%;
    margin: 5px 0;
    padding: 10px;
    font-size: 1rem;
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    transition: all 0.2s ease;
}

.option-div:hover {
    background-color: #e3f2fd;
}

.option-div.correct {
    background-color: #d8f5dc !important;  /* soft mint green */
    border: 2px solid #5cb85c !important;  /* medium green border */
    color: #2e7d32 !important;
    box-shadow: 0 0 6px rgba(92, 184, 92, 0.3);
    transition: 0.3s ease;
}

.option-div.wrong {
    background-color: #fde2e1 !important;  /* light rose red */
    border: 2px solid #f16c6c !important;  /* medium red border */
    color: #a94442 !important;
    box-shadow: 0 0 6px rgba(241, 108, 108, 0.3);
    transition: 0.3s ease;
}

.option-div.correct::after {
    content: " ✓";
    color: #2e7d32;
    font-weight: bold;
    margin-left: 6px;
}

.option-div.wrong::after {
    content: " ✗";
    color: #a94442;
    font-weight: bold;
    margin-left: 6px;
}

.explanation {
    margin-top: 10px;
    font-size: 0.95rem;
    color: #555;
}

.question-image {
    border-radius: 10px;
}
`;
document.head.appendChild(style);

/*function quizDisplay(questionCount) {
    let quizCards = document.querySelectorAll(".container-mid");

    if (quizCards.length > questionCount) {
        // Hide all cards
        quizCards.forEach((card) => {
            card.classList.add("hide");
        });

        // Display the current question card
        quizCards[questionCount].classList.remove("hide");

        // Check if currentAssessment exists and has an attachedFile
        if (currentAssessment && currentAssessment.attachedFile) {
            let attachedFileElement;

            // Check if the attached file is an image
            if (currentAssessment.attachedFile.type === "image") {
                attachedFileElement = document.createElement("img");
                attachedFileElement.src = currentAssessment.attachedFile.url;
                attachedFileElement.alt = "Image"; // Optional: add an alt attribute

                // Log to check the image URL
                console.log("Image URL: ", attachedFileElement.src);

                // Ensure the image is visible and responsive
                attachedFileElement.style.display = "block";
                attachedFileElement.style.maxWidth = "100%";

                // Append the image element to the quiz card
                quizCards[questionCount].appendChild(attachedFileElement);
            } else {
                console.error("Attached file is not an image.");
            }
        } else {
            console.log("No attached file found for this assessment.");
        }
    } else {
        console.error('Invalid questionCount:', questionCount);
    }
}*/


//Quiz Creation
/*function quizCreator() {
    //randomly sort questions
    quizArray.sort(() => Math.random() - 0.5);
    //generate quiz
    for (let i of quizArray) {
        //randomly sort options
        i.options.sort(() => Math.random() - 0.5);
        //quiz card creation
        let div = document.createElement("div");
        div.classList.add("container-mid", "hide");
        
        //question number
        countOfQuestion.innerHTML = 1 + " of " + quizArray.length + " Question";
        //question
        let question_DIV = document.createElement("p");
        question_DIV.classList.add("question");
        question_DIV.innerHTML = i.question;
        div.appendChild(question_DIV);
        //options
        div.innerHTML += `
        <button class="option-div" onclick="checker(this)">${i.options[0]}</button>
        <button class="option-div" onclick="checker(this)">${i.options[1]}</button>
        <button class="option-div" onclick="checker(this)">${i.options[2]}</button>
        <button class="option-div" onclick="checker(this)">${i.options[3]}</button>
        `;
        quizContainer.appendChild(div);
    }
}*/

//Checker Function to check if option is correct or not
// function checker(userOption) {
//     let userSolution = userOption.innerText;
//     let question =
//         document.getElementsByClassName("container-mid")[questionCount];
//     let options = question.querySelectorAll(".option-div");

//     let response = {
//         questionID: quizArray[questionCount].id,
//         selectedChoice: userSolution,
//         isCorrect: userSolution === quizArray[questionCount].correct
//     };

//     userResponses.push(response);

//     //if user clicked answer == correct option stored in object
//     if (userSolution === quizArray[questionCount].correct) {
//         userOption.classList.add("correct");
//         scoreCount++;
//     } else {
//         userOption.classList.add("incorrect");
//         //For marking the correct option
//         options.forEach((element) => {
//             if (element.innerText == quizArray[questionCount].correct) {
//                 element.classList.add("correct");
//             }
//         });
//     }

//     //clear interval(stop timer)
//     // clearInterval(countdown);
//     // //disable all options
//     options.forEach((element) => {
//         element.disabled = true;
//     });

//     const rationaleBox = document.getElementById('rationale-box');
//     rationaleBox.style.display = 'block';
//     rationaleBox.textContent = quizArray[questionCount].rationale || "No explanation provided.";
// }
// function checker(userOption) {
//     let userSolution = userOption.innerText;
//     let question = document.getElementsByClassName("container-mid")[questionCount];
//     let options = question.querySelectorAll(".option-div");

//     // find the chosen choice from quizArray
//     let currentQuestion = quizArray[questionCount];
//     let selectedChoice = currentQuestion.options.find(opt => opt === userSolution);

//     // mark correct/incorrect
//     let isCorrect = userSolution === currentQuestion.correct;
//     if (isCorrect) {
//         userOption.classList.add("correct");
//         scoreCount++;
//     } else {
//         userOption.classList.add("incorrect");
//         options.forEach((element) => {
//             if (element.innerText == currentQuestion.correct) {
//                 element.classList.add("correct");
//             }
//         });
//     }

//     // disable all options
//     options.forEach((element) => {
//         element.disabled = true;
//     });

//     // show rationale
//     const rationaleBox = document.getElementById('rationale-box');
//     rationaleBox.style.display = 'block';
//     rationaleBox.textContent = currentQuestion.rationale || "No explanation provided.";

//     // --- Save answer via AJAX ---
//     const assessmentID = getQueryParameter("assessment_id");
//     const studentID = window.localStorage.getItem("studentID"); // or get this from session if logged in
//     const responseID = window.localStorage.getItem("responseID"); // we'll set this when quiz starts

//     const payload = {
//         response_id: responseID,
//         student_id: studentID,
//         assessment_id: assessmentID,
//         question_id: currentQuestion.id,
//         choice_text: userSolution,
//         is_correct: isCorrect ? 1 : 0
//     };

//     fetch("../back-office/backend/save_answer.php", {
//         method: "POST",
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify(payload)
//     })
//     .then(res => res.json())
//     .then(data => console.log("Answer saved:", data))
//     .catch(err => console.error("Error saving answer:", err));
// }
function checker(userOption) {
    let userSolution = userOption.innerText.trim();
    let question = document.getElementsByClassName("container-mid")[questionCount];
    let options = question.querySelectorAll(".option-div");
    
    let currentQuestion = quizArray[questionCount];
    let correctChoiceText = currentQuestion.correct.trim();

    // Compare user’s answer to correct one
    let isCorrect = userSolution === correctChoiceText;

    // UI update if answer is correct or not
    if (isCorrect) {
        userOption.classList.add("correct");
        userResponses.push(isCorrect);
        scoreCount++;
    } else {
        userOption.classList.add("wrong");
        options.forEach((element) => {
            if (element.innerText.trim() === correctChoiceText) {
                element.classList.add("correct");
            }
        });
    }

    // Disable options
    options.forEach((element) => (element.disabled = true));

    // Show rationale
    const rationaleBox = document.getElementById("rationale-box");
    rationaleBox.style.display = "block";
    rationaleBox.textContent = currentQuestion.rationale || "No explanation provided.";

    // Prepare data to save
    const assessmentID = getQueryParameter("assessment_id");
    const studentID = window.localStorage.getItem("studentID");
    const responseID = window.localStorage.getItem("responseID");

    const payload = {
        response_id: responseID,
        student_id: studentID,
        assessment_id: assessmentID,
        question_id: currentQuestion.id,
        choice_id: userOption.dataset.choiceId,
        choice_text: userSolution,
        is_correct: isCorrect ? 1 : 0
    };

    fetch("../back-office/backend/save_answer.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
    })
    .then((res) => res.json())
    .then((data) => {
        if (data.success) {
            showToast("Answer submitted successfully!", "success");
        } else {
            showToast("Something went wrong saving your answer.", "warning");
        }
    })
    .catch((err) => {
        showToast("Error saving answer. Please try again", "danger");
        console.error("Error occured:", err);
    });
}

function showToast(message, type = "primary") {
    const toastContainer = document.getElementById("toastContainer");

    const toastEl = document.createElement("div");
    toastEl.className = `toast align-items-center text-white bg-${type} border-0 shadow`;
    toastEl.setAttribute("role", "alert");
    toastEl.setAttribute("aria-live", "assertive");
    toastEl.setAttribute("aria-atomic", "true");

    toastEl.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;

    toastContainer.appendChild(toastEl);

    const toast = new bootstrap.Toast(toastEl, { delay: 2000 });
    toast.show();

    toastEl.addEventListener('hidden.bs.toast', () => {
        toastEl.remove();
    });
}


function submitQuiz() {
    const assessmentID = getQueryParameter("assessment_id");
    const totalScore = userResponses.filter(response => response).length;
    const responseID = window.localStorage.getItem("responseID");

    fetch("../back-office/backend/update_score.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ response_id: responseID, total_score: totalScore })
    });
    // const assessmentID = getQueryParameter("assessment_id");
    // const questionIDs = userResponses.map(response => response.questionID);
    // const totalScore = userResponses.filter(response => response.isCorrect).length;

    // // Send the assessmentID, questionIDs, and totalScore to the server
    // const xhr = new XMLHttpRequest();
    // xhr.open('POST', '../public/backend/record_response.php', true);
    // xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    // xhr.onload = function () {
    //     if (xhr.status === 200) {
    //         console.log('Quiz submitted successfully.');
    //         console.log('Server response:', xhr.responseText);
    //     } else {
    //         console.error('Failed to submit quiz.');
    //         console.log('Server error:', xhr.status, xhr.statusText);
    //     }
    // };

    // xhr.send(JSON.stringify({ assessmentID, questionIDs, totalScore }));
    // console.log('Data sent to server:', JSON.stringify({ assessmentID, questionIDs, totalScore }));
}


//initial setup
function initial() {
    quizContainer.innerHTML = "";
    questionCount = 0;
    scoreCount = 0;
    count = 11;
    // clearInterval(countdown);
    // timerDisplay();
    quizDisplay(questionCount);
}

// Function to extract query parameters from the URL
function getQueryParameter(parameterName) {
    const urlSearchParams = new URLSearchParams(window.location.search);
    return urlSearchParams.get(parameterName);
}

// Add an event listener to the "Start Assessment" button
startButton.addEventListener("click", async() => {
    startScreen.classList.add("hide");
    displayContainer.classList.remove("hide");
    
    // Get the assessmentID from the URL
    const assessmentID = getQueryParameter("assessment_id");
    
    // Fetch questions and choices for the selected assessment
    try {
        await Promise.all([
            fetchQuestionsAndChoices(assessmentID),
            fetchAssessmentImages(assessmentID)
        ]);

        //console.log("Assessment data:", assessmentData);
        //console.log("Questions data:", questions);

        quizCreator();
    } catch (err) {
        console.error("Error initializing assessment:", err);
    }

    fetch("../back-office/backend/create_response.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            assessment_id: assessmentID,
            student_id: window.localStorage.getItem("studentID")
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.localStorage.setItem("responseID", data.response_id);
        }
    });
});

document.getElementById('finish-button').addEventListener("click", submitQuiz);

//hide quiz and display start screen
window.onload = () => {
    startScreen.classList.remove("hide");
    displayContainer.classList.add("hide");
};