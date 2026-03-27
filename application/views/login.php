<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    height: 100vh;
}

.card {
    border-radius: 15px;
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {opacity: 0; transform: translateY(30px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

<div class="d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card p-4 shadow" style="width:350px;">

        <h4 class="text-center mb-3">Welcome Back</h4>

        <div id="errorMsg" class="text-danger text-center mb-2"></div>

        <form id="loginForm">

            <!-- EMAIL -->
            <div class="input-group mb-1">
    <div class="input-group-prepend">
        <span class="input-group-text bg-white">
            <i class="fas fa-user text-primary"></i>
        </span>
    </div>
    <input type="email" name="email" class="form-control" placeholder="Email" required>
</div>

<!-- ✅ ERROR BELOW -->
<div id="emailError" class="text-danger small mb-2"></div>

            <!-- PASSWORD -->
            <div class="input-group mb-1">
    <div class="input-group-prepend">
        <span class="input-group-text bg-white">
            <i class="fas fa-lock text-primary"></i>
        </span>
    </div>

    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

    <div class="input-group-append">
        <span class="input-group-text bg-white" onclick="togglePassword()" style="cursor:pointer;">
            <i class="fas fa-eye text-secondary" id="eyeIcon"></i>
        </span>
    </div>
</div>

<!-- ✅ ERROR BELOW -->
<div id="passwordError" class="text-danger small mb-2"></div>
            <button class="btn btn-primary btn-block">Login</button>

        </form>

        <p class="text-center mt-3">
            Don't have account? <a href="signup" class="text-warning">Signup</a>
        </p>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<<script>
// LOGIN
$('#loginForm').submit(function(e){
    e.preventDefault();

    let email = $('input[name="email"]').val();
    let password = $('#password').val();

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let valid = true;

    // RESET
    $('#emailError').text('');
    $('#passwordError').text('');
    $('#errorMsg').text('');

    // EMAIL VALIDATION
    if(!emailPattern.test(email)){
        $('#emailError').text('Enter valid email');
        valid = false;
    }

    // PASSWORD EMPTY CHECK
    if(password.trim() === ''){
        $('#passwordError').text('Enter password');
        valid = false;
    }

    if(!valid) return;

    // ✅ LOGIN API CALL (THIS WAS MISSING)
    $.post('<?php echo base_url("auth/login"); ?>', $(this).serialize(), function(res){
        let data = JSON.parse(res);

        if(data.status === 'success'){
            window.location = 'dashboard';
        } else {
            $('#errorMsg').text('Email and Password doesn’t match');
        }
    });
});


// PASSWORD TOGGLE (OUTSIDE)
function togglePassword() {
    let password = document.getElementById("password");
    let icon = document.getElementById("eyeIcon");

    if(password.type === "password"){
        password.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>