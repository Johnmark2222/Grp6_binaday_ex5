<?php
// Initialize an array to hold error messages
$errors = [];

// Assume the form has been submitted
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';

// Validate Name
if (empty($name)) {
    $errors['name'] = "Name is required.";
}

// Validate Email
if (empty($email)) {
    $errors['email'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
}

// Validate Password
if (strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters long.";
}

// Validate Gender
if (empty($gender)) {
    $errors['gender'] = "Gender is required.";
}

// Process data if no errors
if (empty($errors)) {
    echo "Form submitted successfully!";
    // Here you would typically save the data to a database
} else {
    // Redirect back to the form with errors
    include 'form.php'; // Assuming the HTML form is in form.php
}
?>
