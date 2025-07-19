</div>
    <div class="modal-overlay" id="loginModal">
        <div class="modal-content">
            <h4 class="modal-title">Hi friend!</h4>
            <p>You must be logged in to manage your carrier.</p>
            <a href="auth/login.php" class="btn btn-modal-purple">Continue to Login Page</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginModal = document.getElementById('loginModal');
        
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('login_required')) {
            loginModal.style.display = 'flex';
        }
    });
    </script>
</body>
</html>