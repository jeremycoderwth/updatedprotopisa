const quizData = [
  {
    question: "What are the three states of matter?",
    a: "Solids, Plasma and Foam",
    b: "Stone, Water and Air",
    c: "Solids, Liquids and Gas",
    d: "Stone, Liquids and Foam",
    correct: "c",
  },
  {
    question: "Charles Darwin discovered the Theory of …",
    a: "Magnetism",
    b: "Climate change",
    c: "Evolution",
    d: "Continental drift",
    correct: "c",
  },
  {
    question:
      "You can use the sentence ‘My Very Educated Mother Just Served Us Nachos’ to remember what?",
    a: "The order of the planets",
    b: "The parts of a plant",
    c: "The continents on Earth",
    d: "The organs in the human body",
    correct: "a",
  },
  {
    question: "Pollination helps a plant do what?",
    a: "Photosynthesise ",
    b: "Reproduce",
    c: "Attract bees",
    d: "Grow",
    correct: "b",
  },
  {
    question: "Which of the following animals is a primate?",
    a: " Whale",
    b: "Scorpion",
    c: "Eagle",
    d: "Gorilla",
    correct: "d",
  },
  {
    question: "When a lightbulb turns on, electrical energy is turned into …",
    a: "Light energy and kinetic energy",
    b: "Light energy and heat energy",
    c: "Heat energy and kinetic energy",
    d: " Sound energy and gravitational potential energy",
    correct: "b",
  },
  {
    question: "Approximately how many humans are there on Earth?",
    a: "800 thousand",
    b: "8 Million",
    c: "8 Billion",
    d: "18 Billion",
    correct: "c",
  },
  {
    question: "Which force keeps an aeroplane from falling out of the air?",
    a: "Lift",
    b: "Flight",
    c: "Gravity",
    d: "Drag",
    correct: "a",
  },
  {
    question:
      "If you put a glass over a lit candle, what would happen to the flame?",
    a: "It would get brighter",
    b: "It would go out",
    c: "It would set the glass on fire",
    d: "Nothing would happen",
    correct: "b",
  },
  {
    question: "Which of these mammals is a marsupial?",
    a: "Human",
    b: "Dolphin",
    c: "Hedgehog",
    d: "Kangaroo",
    correct: "d",
  },
];

const quiz = document.getElementById("quiz");
const resultEle = document.getElementById("result");
const answerEls = document.querySelectorAll(".answer");
const labelEls = document.querySelectorAll(".op_label");
const questionEle = document.getElementById("question");
const a_text = document.getElementById("a_text");
const b_text = document.getElementById("b_text");
const c_text = document.getElementById("c_text");
const d_text = document.getElementById("d_text");
const prevBtn = document.getElementById("prev");
const nextBtn = document.getElementById("next");
const submitBtn = document.getElementById("submit");
const scoreEle = document.getElementById("score");
const reloadBtn = document.getElementById("reload");

let currentQuestion = 0;
let answered = 0;

let submitted = false;

let userSelected = {};

loadQuiz();
function loadQuiz() {
  questionEle.innerText =   `${currentQuestion + 1}. ` + quizData[currentQuestion].question;
  a_text.innerText = quizData[currentQuestion].a;
  b_text.innerText = quizData[currentQuestion].b;
  c_text.innerText = quizData[currentQuestion].c;
  d_text.innerText = quizData[currentQuestion].d;
  deSelectAnswer();
  if (userSelected[currentQuestion]) {
    let selected = userSelected[currentQuestion];
    document.getElementById(selected).checked = true;
  }

  if (currentQuestion == quizData.length - 1) {
    nextBtn.style.display = "none";
    if(submitted){
      submitBtn.style.display = "none";
      reloadBtn.style.display="block"
    }else{
      submitBtn.style.display = "block";
      reloadBtn.style.display="none"
    }
  }

  if (submitted) {
    let actualAns = quizData[currentQuestion].correct;
    let userSelect= userSelected[currentQuestion];
    labelEls.forEach((labelEle) => {
      labelEle.classList.remove("correct");
      labelEle.classList.remove("wrong");
    });
    console.log(actualAns);
    console.log(userSelected);
    if (actualAns == userSelect) {
      let op = actualAns + "_text";
      document.getElementById(op).classList.add("correct");
    } else {
      let correct_op = actualAns + "_text";
      document.getElementById(correct_op).classList.add("correct");
      let user_op = userSelect + "_text";
      document.getElementById(user_op).classList.add("wrong");

      
    }
  }

}
function deSelectAnswer() {
  answerEls.forEach((answerEle) => {
    answerEle.checked = false;
  });
}

nextBtn.addEventListener("click", () => {
  let answer = getSelected();
  if (!submitted) {
    if (answer) {
      if (answer == quizData[currentQuestion].correct) {
        answered++;
      }

      currentQuestion++;
      if (currentQuestion < quizData.length) {
        loadQuiz();
      }
    }
  }else{
    currentQuestion++
    loadQuiz()
  }
});

prevBtn.addEventListener("click", () => {
  if (currentQuestion > 0) {
    currentQuestion--;
    loadQuiz();
  }
});

submitBtn.addEventListener("click", () => {
  let answer = getSelected();
  if (!submitted) {
    if (answer) {
      if (answer == quizData[currentQuestion].correct) {
        console.log(answer);
        answered++;
        console.log(answered);
      }

      currentQuestion++;
      if (currentQuestion < quizData.length) {
        loadQuiz();
      }
    }
  }


  quiz.style.display = "none";
  resultEle.style.display = "block";
  if (getSelected()) {
    submitted = true;
    scoreEle.innerText =
      answered + "/" + quizData.length + " Questions answered correctly";
  }
});

function getSelected() {
  let answer
  answerEls.forEach((answerEle) => {
    if (answerEle.checked) {
      answer = answerEle.id;
      userSelected[currentQuestion] = answer;
      
    }
  });
  return answer;
}
 

function loadAnswers() {
  currentQuestion = 0;
  quiz.style.display = "block";
  resultEle.style.display = "none";
  answerEls.forEach((answerEle) => {
    answerEle.disabled = true;
  });
  submitBtn.style.display = "none";
  nextBtn.style.display = "block";
  loadQuiz();
}
