<?php
// db_connect.php - Simplified for Beginners (WITHOUT HASHING)
// WARNING: This code is INSECURE and should NEVER be used in a real application.
// It is for a basic learning exercise only.

// --- Database Configuration ---
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'devam'; // Your specified database name
$tableName = 'users'; // Your specified table name

// --- Establish Database Connection ---
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// --- Process Form Submission ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get User Input
    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = $_POST['password']; // Storing as is (plain text)
    $confirmPassword = $_POST['confirm-password'];

    // --- Basic Server-Side Validation ---
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('Error: All fields are required!'); window.location.href='register.html';</script>";
        exit();
    }

    if (strlen($password) < 6) {
        echo "<script>alert('Error: Password must be at least 6 characters long!'); window.location.href='register.html';</script>";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "<script>alert('Error: Passwords do not match!'); window.location.href='register.html';</script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Error: Invalid email format!'); window.location.href='register.html';</script>";
        exit();
    }

    // Check for existing user (username)
    $check_username_sql = "SELECT id FROM " . $tableName . " WHERE username = '$username'";
    $result_username = $conn->query($check_username_sql);
    if ($result_username->num_rows > 0) {
        echo "<script>alert('Error: Username already taken. Please choose another.'); window.location.href='register.html';</script>";
        exit();
    }

    // Check for existing user (email)
    $check_email_sql = "SELECT id FROM " . $tableName . " WHERE email = '$email'";
    $result_email = $conn->query($check_email_sql);
    if ($result_email->num_rows > 0) {
        echo "<script>alert('Error: Email address already registered. Please use another.'); window.location.href='register.html';</script>";
        exit();
    }

    // --- Insert Data into Database without hashing ---
    // This is the SQL query that inserts the user's data into the 'users' table.
    $sql = "INSERT INTO " . $tableName . " (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // If the data was successfully inserted
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='index.php';</script>";
    } else {
        // If there was an error during insertion
        echo "<script>alert('Error: Could not register user. Please try again later.'); window.location.href='register.html';</script>";
        // For debugging purposes, you could uncomment the line below to see the specific MySQL error:
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the script is accessed directly (not via a form POST submission)
    echo "<script>alert('Invalid request. Please use the registration form.'); window.location.href='register.html';</script>";
}

// Close the database connection to free up resources.
$conn->close();
?>