const urlParams = new URLSearchParams(window.location.search);
const error = urlParams.get('error');
const errorMessage = document.getElementById('error-message');
const errorText = document.getElementById('error-text');

if (error) {
    if (error === 'user') {
        errorMessage.classList.add('show', 'user-error');
        errorText.textContent = 'User tidak ditemukan!';
    } else if (error === 'password') {
        errorMessage.classList.add('show', 'password-error');
        errorText.textContent = 'Password salah!';
    }
}