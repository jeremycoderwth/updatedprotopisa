<?php

session_start();

include '../config/dbcon.php';
include 'includesClient/header.php';

$student_id = $_SESSION['auth_user']['user_id'];

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$imageFolder = '/clonepisa-main/client/back-office/assessment-files/';

$query = "
SELECT 
    a.assessment_id,
    a.assessment_name,
    a.comment,
    a.attach_file,
    s.subject_name,
    sa.response_id,
    sa.created_at AS date_submitted,
    ROW_NUMBER() OVER (PARTITION BY a.assessment_id ORDER BY sa.created_at ASC) AS attempt_number
FROM student_answers sa
INNER JOIN assessment a ON sa.assessmentID = a.assessment_id
LEFT JOIN subject s ON a.subjectID = s.subject_id
WHERE sa.studentID = ?
ORDER BY date_submitted DESC
";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$assessments = [];
while ($row = $result->fetch_assoc()) {
  if (empty($row['attach_file'])) {
      $row['attach_file'] = $protocol . $host . $imageFolder . 'FixingScienceLead.0.jpg';
  } else {
      $row['attach_file'] = $protocol . $host . $imageFolder . $row['attach_file'];
  }

  // Format the submission date nicely
  if (!empty($row['date_submitted'])) {
      $formattedDate = date("F j, Y • g:i A", strtotime($row['date_submitted']));
      $row['date_submitted'] = $formattedDate;
  } else {
      $row['date_submitted'] = 'N/A';
  }

  $assessments[] = $row;
}

$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous"
  />
</head>

<body class="gradient-background">
  <div class="container mt-4">
    <h4 class="text-white mt-4 mb-4">Your Completed Assessments</h4>
    <div class="row">
      <?php if (!empty($assessments)): ?>
        <?php foreach ($assessments as $a): ?>
          <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
              <img src="<?= htmlspecialchars($a['attach_file']) ?>"
                class="card-img-top"
                alt="Assessment Image"
                style="object-fit: cover; height: 180px;">

              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($a['assessment_name']) ?></h5>
                <p class="card-text"><strong>Subject:</strong> <?= htmlspecialchars($a['subject_name']) ?></p>
                <p class="card-text text-muted small">Submitted: <?= htmlspecialchars($a['date_submitted']) ?></p>
                <a href="backend/view_student_answers.php?assessment_id=<?= $a['assessment_id'] ?>"
                  class="btn btn-primary btn-sm w-100">View Answers</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-muted">You haven't completed any assessments yet.</p>
      <?php endif; ?>
    </div>
  </div>

</body>

</html>