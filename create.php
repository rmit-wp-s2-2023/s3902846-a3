<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="a3.css">
    <title>Create Course</title>
</head>
<body>
    <header>
        <h1>Create Course</h1>
    </header>
    <section class="create-course-container">
        <h2>Create a Course</h2>
        <?php
        require_once 'functions.php';

        $courseID = $title = $creditPoints = $career = "";
        $courseIDErr = $titleErr = $creditPointsErr = $careerErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $courseID = $_POST["courseID"];
            $title = $_POST["title"];
            $creditPoints = $_POST["creditPoints"];
            $career = $_POST["career"];
            $courseIDErr = validateCourseID($courseID);
            $titleErr = validateTitle($title);
            $creditPointsErr = validateCreditPoints($creditPoints);
            $careerErr = validateCareer($career);

            if (empty($courseIDErr) && empty($titleErr) && empty($creditPointsErr) && empty($careerErr)) {
                header("Location: index.php");
                exit();
            }
        }
        ?>
        <form method="POST" action="create.php" class="create-course-container">
            <div class="form-group">
                <label for="courseID">Course ID:</label>
                <input type="text" id="courseID" name="courseID" value="<?php echo $courseID; ?>">
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>">
            </div>

            <div class="form-group">
                <label for="creditPoints">Credit Points:</label>
                <input type="text" id="creditPoints" name "creditPoints" value="<?php echo $creditPoints; ?>">
            </div>

            <div class="form-group">
                <label for="career">Career:</label>
                <input type="text" id="career" name="career" value="<?php echo $career; ?>">
            </div>

            <input type="submit" value="Create Course" class="button create-course-button">
        </form>
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
