<?php
function validateCourseID($courseID) {
    if (!preg_match("/^COSC\d{4}$/", $courseID)) {
        return "Course ID must start with COSC and be followed by 4 digits.";
    }
    return "";
}

function validateTitle($title) {
    if (!preg_match("/^[A-Z][A-Za-z0-9 ]+$/", $title)) {
        return "Title must start with an upper-case letter and only contain letters, numbers, and spaces.";
    }
    return "";
}

function validateCreditPoints($creditPoints) {
    if (!is_numeric($creditPoints) || $creditPoints < 1 || $creditPoints > 12 || floor($creditPoints) != $creditPoints) {
        return "Credit Points must be a positive whole number between 1 and 12 inclusive.";
    }
    return "";
}

function validateCareer($career) {
    if ($career !== "Undergraduate" && $career !== "Postgraduate") {
        return "Career must be 'Undergraduate' or 'Postgraduate'.";
    }
    return "";
}
?>

<?php
function formatErrorMessages($courseIDErr, $titleErr, $creditPointsErr, $careerErr) {
    $errors = array();

    if (!empty($courseIDErr)) {
        $errors[] = "- Course ID must start with COSC and be followed by 4 digits.";
    }
    if (!empty($titleErr)) {
        $errors[] = "- Title must start with an upper-case letter and only contain letters, numbers, and spaces.";
    }
    if (!empty($creditPointsErr)) {
        $errors[] = "- Credit Points must be a positive whole number between 1 and 12 inclusive.";
    }
    if (!empty($careerErr)) {
        $errors[] = "- Career must be 'Undergraduate' or 'Postgraduate'.";
    }

    if (!empty($errors)) {
        return "Error:<br>" . implode("<br>", $errors) . "<br>Please try again.";
    }

    return "";
}
?>
