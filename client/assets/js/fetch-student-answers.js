document.querySelectorAll('.view-btn').forEach((button) => {
    button.addEventListener("click", () => {
        const assessmentID = button.dataset.assessmentid;
        const studentID = button.dataset.userid;
        const responseID = button.dataset.responseid;
        console.log(responseID);
        viewStudentAnswers(assessmentID, studentID, responseID);
    });
});

function viewStudentAnswers(assessmentID, studentID, responseID) {
    // clear old data
    const tbody = document.getElementById('answersTableBody');
    tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">Loading...</td></tr>';

    // fetch answers
    fetch(`../back-office/backend/get_answers.php?assessment_id=${assessmentID}&student_id=${studentID}&response_id=${responseID}`)
        .then(res => res.json())
        .then(data => {
            tbody.innerHTML = '';

            if (!data || data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="text-center">No answers found.</td></tr>';
                return;
            }

            console.log(data);
            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.question}</td>
                    <td>${item.student_answer}</td>
                    <td>${item.correct_answer}</td>
                    <td>
                        ${item.isCorrect == 1 
                            ? '<span class="badge bg-success">Correct</span>' 
                            : '<span class="badge bg-danger">Incorrect</span>'}
                    </td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(err => {
            console.error(err);
            tbody.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Error loading data.</td></tr>';
        });
}