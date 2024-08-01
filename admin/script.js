// Function to fetch user data from user.json
const fetchUserData = async () => {
    try {
        const response = await fetch('user.json'); // Ensure the correct path
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching user data:", error);
        return [];
    }
};

const initializeApp = async () => {
    const users = await fetchUserData();

    function showAlert(message, type) {
        const alertContainer = document.getElementById('alert-container');
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.innerHTML = `<i class="${type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'}"></i> ${message}`;
        alertContainer.appendChild(alertDiv);
        setTimeout(() => alertDiv.remove(), 3000);
    }

    function login() {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const user = users.find(user => user.username === username && user.password === password);

        if (user) {
            showAlert('Successfully logged in!', 'success');
            document.getElementById('login-form').classList.replace('visible', 'hidden');
            document.getElementById('logout-section').classList.replace('hidden', 'visible');
            document.getElementById('user-name').textContent = user.name;
            sessionStorage.setItem('loggedIn', true);
        } else {
            showAlert('Invalid username or password!', 'danger');
        }
    }

    function logout() {
        document.getElementById('login-form').classList.replace('hidden', 'visible');
        document.getElementById('logout-section').classList.replace('visible', 'hidden');
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        sessionStorage.removeItem('loggedIn');
    }

    // Check if user is already logged in
    if (sessionStorage.getItem('loggedIn')) {
        document.getElementById('login-form').classList.replace('visible', 'hidden');
        document.getElementById('logout-section').classList.replace('hidden', 'visible');
    }

    // Attach functions to global scope (for use in HTML)
    window.login = login;
    window.logout = logout;
};

// Initialize the app
initializeApp();
// Protect Code
 document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'i' || e.key === 'j')) {
      e.preventDefault();
    }
  });