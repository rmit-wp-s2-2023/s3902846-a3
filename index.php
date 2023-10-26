<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="a3.css">
    <title>Staff Information</title>
</head>
<body>
    <header>
        <h1>Staff Information</h1>
    </header>
    <section class="staff-info-container">
        <h2>Staff Information</h2>
            <?php
            $webServiceURL = 'https://titan.csit.rmit.edu.au/~e103884/wp/.services/.staff/';
            $staffData = json_decode(file_get_contents($webServiceURL), true);

            if ($staffData) {
                echo '<ul class="no-bullets">';
                foreach ($staffData as $staff) {
                    echo '<li>';
                    echo '<br><span class="text-left">Staff ID: ' . $staff['staffID'] . '</span><br>';
                    echo '<span class="text-left">First Name: ' . $staff['firstName'] . '</span><br>';
                    echo '<span class="text-left">Last Name: ' . $staff['lastName'] . '</span><br>';
                    echo '<span class="text-left">Email: ' . $staff['email'] . '</span><br><br>';

                    $staffID = $staff['staffID'];
                    echo '<a href="details.php?staffID=' . $staffID . '" class="button view-courses-button">View Courses</a>';

                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo 'Failed to fetch staff information.';
            }
            ?>
    </section>
    <footer>
        <div class id="sitemap-buttons">
            <h2>Sitemap</h2>
            <ul class="no-bullets">
                <li><a href="index.php" class="button home-button">View All Staff</a></li>
                <li><a href="create.php" class="button create-button">Create Course</a></li>
                <li><a href="https://github.com/rmit-wp-s2-2023/s3902846-a3"  class="button github-repo-button" target="_blank">GitHub Repository</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
