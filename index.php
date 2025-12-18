<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Inter font from Google Fonts for consistency -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            font-family: 'Inter', sans-serif; /* Use Inter font for consistency */
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to center content */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Make body at least full viewport height */
             /* Background image properties to make it fully visible */
            background: url("https://wallpaperaccess.com/full/902489.jpg") no-repeat center center/cover;
            
            /* Fallback for browsers that don't support the shorthand or if the image fails to load */
            background-size: cover;
            background-position: center; 
        }

        /* Login Container */
        .login-container {
            background-color: rgba(255, 255, 255, 0.2); 
            backdrop-filter: blur(10px);
            padding: 2.5rem; /* Consistent padding with register page */
            border-radius: 1.5rem; /* Consistent rounded corners */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
            width: 100%;
            max-width: 480px; /* Consistent max-width with register page */
            text-align: center;
            box-sizing: border-box; /* Include padding in element's total width and height */
        }

        /* Form Heading */
        .login-form h2 {
            margin-bottom: 2rem; /* Consistent margin */
            color: #333;
            font-size: 2.25em; /* Adjusted for larger heading */
            font-weight: 700; /* Bold */
        }

        /* Input Group Styling */
        .input-group {
            margin-bottom: 1.5rem; /* Consistent margin */
            text-align: left;
        }

        .input-group label {
            display: block; /* Make label take its own line */
            margin-bottom: 0.5rem; /* Consistent margin */
            font-weight: 600; /* Semi-bold label text */
            color: #555;
            font-size: 0.875rem; /* Smaller label text */
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem; /* Consistent padding */
            border: 1px solid #d1d5db;
            border-radius: 0.5rem; /* Consistent rounded corners */
            font-size: 1rem;
            box-sizing: border-box; /* Include padding and border in width */
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Smooth transition for focus */
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="password"]:focus {
            outline: none;
            border-color: #0d9488; 
        }

        /* Options Group (Remember Me & Forgot Password) */
        .options-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem; /* Consistent margin */
            font-size: 0.875rem; /* Consistent font size */
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 0.5rem; /* Consistent margin */
            accent-color: #0d9488; /* Consistent vibrant purple for checkbox */
            transform: scale(1.1); /* Slightly enlarge checkbox */
        }

        .forgot-password, .signup-link a {
            color: black; /* Vibrant purple link color, consistent */
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        .forgot-password:hover, .signup-link a:hover {
            color: black; /* Lighter purple on hover, consistent */
            text-decoration: underline;
        }

        /* Login Button */
        .login-button {
            width: 100%;
            padding: 0.75rem 1.5rem; /* Consistent padding */
            background: #0d9488;
            color: white;
            border: none;
            border-radius: 0.5rem; /* Consistent rounded corners */
            font-size: 1.125rem; /* Consistent font size */
            font-weight: 600; /* Semi-bold */
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-button:hover {
            background: #0d9488; /* Reverse gradient on hover, consistent */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px); /* Slight lift on hover, consistent */
        }

        .login-button:active {
            background: #0d9488; /* Even darker gradient on active, consistent */
            transform: translateY(0); /* Reset lift on active, consistent */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Sign Up Link */
        .signup-link {
            margin-top: 1.5rem; /* Consistent margin */
            font-size: 0.95em;
            color: #666;
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 640px) {
            .login-container {
                padding: 1.5rem; /* Reduce padding on small screens */
                border-radius: 1rem; /* Slightly smaller border-radius */
            }
            .login-button {
                font-size: 1rem; /* Smaller font size for button on small screens */
                padding: 0.625rem 1rem; /* Smaller padding for button */
            }
            .login-form h2 {
                font-size: 1.75rem; /* Adjust heading size */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="post" action="login.php"> <!-- Added method and action attributes -->
            <h2>Welcome</h2> <!-- Updated heading for login page -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="options-group">
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <label for="rememberMe">Remember Me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="login-button">Login</button>
            <p class="signup-link">Don't have an account? <a href="register.php ">Sign Up</a></p>
        </form>
    </div>
</body>
</html>
