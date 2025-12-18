<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* Beautiful gradient background */
            background: url("https://wallpaperaccess.com/full/902489.jpg") no-repeat center center/cover;
            
            /* Fallback for browsers that don't support the shorthand or if the image fails to load */
            background-size: cover;
            background-position: center; 
        }
        
        /* Custom styles for the form container, inputs, and button, converted to Tailwind-like properties */
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            line-height: 1.5;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-sizing: border-box;
        }
        .input-field:focus {
            outline: none;
            border-color: #6a0572;
            box-shadow: 0 0 0 3px rgba(106, 5, 114, 0.25);
        }
        .btn-primary {
            width: 100%;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(45deg, #0d9488);
            color: #ffffff;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.1s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0d9488);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-primary:active {
            background: linear-gradient(45deg, #0d9488);
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .text-link {
            color: #0d9488;
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }
        .text-link:hover {
            color: #0d9488;
            text-decoration: underline;
        }
        .message-box {
            background-color: #fef3c7;
            color: #92400e;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: none;
            font-size: 0.875rem;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-900">
    <!-- Main container for the form, using responsive Tailwind classes -->
    <div class="w-11/12 sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-1/3 p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl backdrop-blur-md bg-white/30 text-gray-900">
        <h2 class="text-3xl sm:text-4xl font-bold text-center mb-8">Create Your Account</h2>

        <div id="messageBox" class="message-box"></div>

        <form id="registerForm" class="space-y-6" method="post" action="db_connect.php">
            <div>
                <label for="username" class="block text-sm font-medium mb-1">Username</label>
                <input type="text" id="username" name="username" class="input-field" placeholder="Enter your username" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                <input type="email" id="email" name="email" class="input-field" placeholder="you@example.com" required>
            </div>
            <div class="relative">
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input type="password" id="password" name="password" class="input-field pr-10" placeholder="••••••••" required>
                <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer top-8" onclick="togglePasswordVisibility('password')">
                    <svg id="eye-icon-password" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </span>
            </div>
            <div class="relative">
                <label for="confirm-password" class="block text-sm font-medium mb-1">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" class="input-field pr-10" placeholder="••••••••" required>
                <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer top-8" onclick="togglePasswordVisibility('confirm-password')">
                    <svg id="eye-icon-confirm-password" class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </span>
            </div>
            <button type="submit" class="btn-primary">Register</button>
        </form>

        <p class="text-center text-sm mt-6">
            Already have an account? <a href="index.php" class="text-link">Sign in here</a>
        </p>
    </div>

    <script>
        /**
         * Toggles the visibility of a password field and changes the eye icon.
         * @param {string} fieldId - The ID of the password input field.
         */
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById('eye-icon-' + fieldId);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                // Change icon to show "eye-slash" (closed eye)
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 .004 0 .008 0 .012 0m.789 7.789a3 3 0 10-4.243-4.243m4.243 4.243L21 21"></path>`;
            } else {
                passwordField.type = 'password';
                // Change icon to show "eye" (open eye)
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
            }
        }
    </script>
</body>
</html>
