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
let currentAssessment = null;
let questionCount;
let scoreCount = 0;
let count = 11;
let countdown;
let quizArray = [];
let userResponses = [];

function fetchQuestionsAndChoices(assessmentID) {
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
}


//Next Button
nextBtn.addEventListener(
    "click",
    (displayNext = () => {
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
            clearInterval(countdown);
            timerDisplay();
        }
    })
);

//Timer
const timerDisplay = () => {
    countdown = setInterval(() => {
        count--;
        timeLeft.innerHTML = `${count}s`;
        if (count == 0) {
            clearInterval(countdown);
            displayNext();
        }
    }, 1000);
};



function quizDisplay(questionCount) {
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
}


//Quiz Creation
function quizCreator() {
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
}

//Checker Function to check if option is correct or not
function checker(userOption) {
    let userSolution = userOption.innerText;
    let question =
        document.getElementsByClassName("container-mid")[questionCount];
    let options = question.querySelectorAll(".option-div");

    let response = {
        questionID: quizArray[questionCount].id,
        selectedChoice: userSolution,
        isCorrect: userSolution === quizArray[questionCount].correct
    };

    userResponses.push(response);

    //if user clicked answer == correct option stored in object
    if (userSolution === quizArray[questionCount].correct) {
        userOption.classList.add("correct");
        scoreCount++;
    } else {
        userOption.classList.add("incorrect");
        //For marking the correct option
        options.forEach((element) => {
            if (element.innerText == quizArray[questionCount].correct) {
                element.classList.add("correct");
            }
        });
    }

    //clear interval(stop timer)
    clearInterval(countdown);
    //disable all options
    options.forEach((element) => {
        element.disabled = true;
    });
}

function submitQuiz() {
    const assessmentID = getQueryParameter("assessment_id");
    const questionIDs = userResponses.map(response => response.questionID);
    const totalScore = userResponses.filter(response => response.isCorrect).length;

    // Send the assessmentID, questionIDs, and totalScore to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../public/backend/record_response.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('Quiz submitted successfully.');
            console.log('Server response:', xhr.responseText);
        } else {
            console.error('Failed to submit quiz.');
            console.log('Server error:', xhr.status, xhr.statusText);
        }
    };

    xhr.send(JSON.stringify({ assessmentID, questionIDs, totalScore }));
    console.log('Data sent to server:', JSON.stringify({ assessmentID, questionIDs, totalScore }));
}


//initial setup
function initial() {
    quizContainer.innerHTML = "";
    questionCount = 0;
    scoreCount = 0;
    count = 11;
    clearInterval(countdown);
    timerDisplay();
    quizCreator();
    quizDisplay(questionCount);
}

// Function to extract query parameters from the URL
function getQueryParameter(parameterName) {
    const urlSearchParams = new URLSearchParams(window.location.search);
    return urlSearchParams.get(parameterName);
}

// Add an event listener to the "Start Assessment" button
startButton.addEventListener("click", () => {
    startScreen.classList.add("hide");
    displayContainer.classList.remove("hide");
    
    // Get the assessmentID from the URL
    const assessmentID = getQueryParameter("assessment_id");
    
    // Fetch questions and choices for the selected assessment
    fetchQuestionsAndChoices(assessmentID);
});

document.getElementById('finish-button').addEventListener("click", submitQuiz);

//hide quiz and display start screen
window.onload = () => {
    startScreen.classList.remove("hide");
    displayContainer.classList.add("hide");
};