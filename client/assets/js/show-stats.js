document.querySelectorAll('.info-btn').forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();
        const assessmentID = new URL(button.href).searchParams.get('assessment_id');
        viewQuestionStats(assessmentID);
    });
});

function viewQuestionStats(assessmentID) {
    const modal = new bootstrap.Modal(document.getElementById('questionStatsModal'));
    modal.show();

    const tbody = document.getElementById('questionStatsBody');
    tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted">Loading...</td></tr>';

    fetch(`../back-office/elements/popup/get_answers_stat.php?assessmentID=${assessmentID}`)
        .then(res => res.json())
        .then(data => {
            tbody.innerHTML = '';

            if (!data || data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center">No responses yet.</td></tr>';
                return;
            }

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.question}</td>
                    <td><span class="text-success fw-bold">${item.correct_count}</span></td>
                    <td><span class="text-danger fw-bold">${item.incorrect_count}</span></td>
                    <td>${item.total_answers}</td>
                    <td>${item.percent_correct}%</td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(err => {
            console.error(err);
            tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading data.</td></tr>';
        });
}
