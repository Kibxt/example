document.addEventListener('DOMContentLoaded', () => {
    const signupForm = document.getElementById('signupForm');
    const loginForm = document.getElementById('loginForm');

    const validateEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const validatePassword = (password) => password.length >= 8;

    if (signupForm) {
        signupForm.addEventListener('submit', (e) => {
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            if (!validateEmail(email.value) || !validatePassword(password.value)) {
                e.preventDefault();
                alert('Invalid signup details. Ensure the password is at least 8 characters long.');
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            const email = document.getElementById('loginEmail');
            const password = document.getElementById('loginPassword');
            if (!validateEmail(email.value) || !validatePassword(password.value)) {
                e.preventDefault();
                alert('Invalid login details.');
            }
        });
    }
});
