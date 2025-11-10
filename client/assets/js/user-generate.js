function generateUserReport() {
    // Get the user data table
    const userTable = document.getElementById("example2");

    // Initialize an empty string to store the report table rows
    let reportTableRows = "";

    // Loop through the rows in the user data table
    for (let i = 1; i < userTable.rows.length; i++) {
        const cells = userTable.rows[i].cells;
        const teacherID = cells[0].textContent;
        const fullName = cells[1].textContent;
        const email = cells[2].textContent;
        const username = cells[3].textContent;
        const status = cells[4].textContent;

        // Add a row to the report table
        reportTableRows += `
            <tr>
                <td>${teacherID}</td>
                <td>${fullName}</td>
                <td>${email}</td>
                <td>${username}</td>
                <td>${status}</td>
            </tr>
        `;
    }

    // Replace the placeholder with the generated report table rows
    const reportTable = document.getElementById("report-table");
    reportTable.innerHTML = reportTableRows;

    // Print the report
    window.print();
}

// Add an event listener to the "Print" button
document.getElementById("print-table").addEventListener("click", generateUserReport);
