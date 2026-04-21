$(document).ready(function() {
    // Check if user is logged in
    const userId = localStorage.getItem('user_id');
    if (userId && window.location.pathname.includes('index.html')) {
        window.location.href = 'dashboard.html';
    }
});

// Login form submission
$('#loginForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'api/login.php',
        method: 'POST',
        data: {
            email: $('#loginEmail').val(),
            password: $('#loginPassword').val()
        },
        success: function(response) {
            if (response.success) {
                localStorage.setItem('user_id', response.user_id);
                localStorage.setItem('user_name', response.user_name);
                localStorage.setItem('user_role', response.user_role);
                window.location.href = 'dashboard.html';
            } else {
                $('#loginMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
            }
        },
        error: function() {
            $('#loginMessage').html('<div class="alert alert-danger">Login failed. Please try again.</div>');
        }
    });
});

// Register form submission
$('#registerForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'api/register.php',
        method: 'POST',
        data: {
            name: $('#regName').val(),
            email: $('#regEmail').val(),
            password: $('#regPassword').val(),
            department: $('#regDepartment').val(),
            semester: $('#regSemester').val()
        },
        success: function(response) {
            if (response.success) {
                $('#registerMessage').html('<div class="alert alert-success">Registration successful! Please login.</div>');
                $('#registerForm')[0].reset();
                $('#registerModal').modal('hide');
                $('#loginModal').modal('show');
            } else {
                $('#registerMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
            }
        }
    });
});

function showLoginModal() {
    $('#loginModal').modal('show');
}

function showRegisterModal() {
    $('#registerModal').modal('show');
}

function logout() {
    $.ajax({
        url: 'api/logout.php',
        method: 'POST',
        success: function() {
            localStorage.clear();
            window.location.href = 'index.html';
        }
    });
}