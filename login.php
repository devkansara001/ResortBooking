<?php
// login.php - INSECURE LOGIN (Plain Text Password Check)
// WARNING: This code is INSECURE for password handling and SQL Injection.
// It is for a basic learning exercise only and should NOT be used in production.

// --- Database Configuration ---
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'devam'; // Your database name
$tableName = 'users'; // Your table name

// --- Establish Database Connection ---
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// --- Process Form Submission ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- Get User Input ---
    $username = trim(htmlspecialchars($_POST['username']));
    $password = $_POST['password']; // Get the password as is (plain text)

    // --- Basic Server-Side Validation ---
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please enter both username/email and password.'); window.location.href='index.php';</script>";
        exit();
    }

    // --- Check User Credentials in the Database ---
    // STILL VULNERABLE TO SQL INJECTION
    $sql = "SELECT id, username, email, password FROM " . $tableName . " WHERE username = '$username' OR email = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, now check password
        $user = $result->fetch_assoc();

        // --- Compare Passwords (Plain Text Comparison) ---
        // WARNING: This is INSECURE. This is where plain text passwords are directly compared.
        if ($password === $user['password']) {
            // Login successful!
            header('Location: resort.php'); // Redirect to dashboard
            exit();
        } else {
            // Password does not match
            echo "<script>alert('Invalid username/email or password. Please try again.'); window.location.href='index.php';</script>";
            header("Location: index.php");
        }
    } else {
        // User (username/email) not found
        echo "<script>alert('Invalid username/email or password. Please try again.'); window.location.href='index.php';</script>";
        header("Location: index.php");
    }

} else {
    // If accessed directly without POST request
    echo "<script>alert('Invalid request. Please use the login form.'); window.location.href='index.php';</script>";
}

// Close the database connection
$conn->close();
?>