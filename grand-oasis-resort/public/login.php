<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Grand Oasis Resort</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login to Your Account</h2>
        <form action="login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary">Login</button>
            </div>
            <div class="form-group">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </form>
    </div>

    <script src="assets/js/main.js"></script>
</body>
</html>