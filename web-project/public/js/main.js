// filepath: /web-project/web-project/public/js/main.js
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            validateLogin();
        });
    }

    function validateLogin() {
        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();

        if (username === '' || password === '') {
            alert('Please fill in both fields.');
            return;
        }

        // Simulate a login request (replace with actual API call)
        console.log('Logging in with:', username, password);
        alert('Login successful!'); // Placeholder for successful login
        // Redirect to home page after successful login
        window.location.href = 'home.html';
    }
});