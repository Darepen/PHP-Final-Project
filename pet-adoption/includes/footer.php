<div class="modal-overlay" id="loginModal">
    <div class="modal-content">
        <h4 class="modal-title">Hi friend!</h4>
        <p>You must be logged in to manage your carrier.</p>
        <a href="auth/login.php" class="btn btn-modal-purple">Continue to Login Page</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginModal = document.getElementById('loginModal');
    
    // Check if the URL has the 'login_required' parameter
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('login_required')) {
        // Show the modal if the parameter is found
        loginModal.style.display = 'flex';
    }
});
</script>