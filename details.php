<?php
require_once 'functions.php';

if (isset($_GET['staffID'])) {
    $staffID = $_GET['staffID'];
    $webServiceURL = 'https://titan.csit.rmit.edu.au/~e103884/wp/.services/.staff/?id=' . $staffID;
    $staffData = json_decode(file_get_contents($webServiceURL), true);
} else {
    echo 'Invalid request. Please provide a staffID.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="a3.css">
    <title>Courses</title>
</head>
<body>
    <header>
        <h1>Courses</h1>
    </header>
    <section class="course-info-container">
        <?php
        if ($staffData) {
            echo '<h2>Staff ' . $staffID . '</h2>';
            echo '<ul class="no-bullets">';
            foreach ($staffData['courses'] as $course) {
                echo '<li>';
                echo '<span class="text-left">Course ID: ' . $course['courseID'] . '</span><br>';
                echo '<span class="text-left">Title: ' . $course['title'] . '</span><br>';
                echo '<span class="text-left">Credit Points: ' . $course['creditPoints'] . '</span><br>';
                echo '<span class="text-left">Career: ' . $course['career'] . '</span><br>';
                echo '<span class="text-left">Coordinator: ' . $course['coordinator'] . '</span><br><br>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo 'Failed to fetch staff course information.';
        }
        ?>
    </section>
    <footer>
        <div class id="sitemap-buttons">
            <h2>Sitemap</h2>
            <ul>
                <li><a href="index.php" class="button home-button">View All Staff</a></li>
                <li><a href="create.php" class="button create-button">Create Course</a></li>
                <li><a href="https://github.com/rmit-wp-s2-2023/s3902846-a3" class="button github-repo-button" target="_blank">GitHub Repository</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
