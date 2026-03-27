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

        <h4 class="text-center mb-3">Signup</h4>

        <div id="msg" class="text-center mb-2"></div>

        <form id="signupForm">

            <!-- NAME -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white">
                        <i class="fas fa-user text-primary"></i>
                    </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>

            <!-- EMAIL -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white">
                        <i class="fas fa-envelope text-primary"></i>
                    </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
                            <div id="emailError" class="text-danger small mb-2"></div>



            <!-- PASSWORD -->
            <div class="input-group mb-3">
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
                            <div id="passwordError" class="text-danger small mb-2"></div>


            <button class="btn btn-primary btn-block">Signup</button>

        </form>

        <p class="text-center mt-3">
            Already have account? <a href="auth" class="text-warning">Login</a>
        </p>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#signupForm').submit(function(e){
    e.preventDefault();

    let email = $('input[name="email"]').val().trim();
    let password = $('#password').val().trim();

    // Strict email (must include .com, .in etc)
    let emailPattern = /^[^\s@]+@[^\s@]+\.(com|in|org|net)$/i;

    // Password: min 8 chars
    let passwordPattern = /^.{8,}$/;

    let valid = true;

    // RESET
    $('#emailError').text('');
    $('#passwordError').text('');
    $('#msg').html('');

    // EMAIL VALIDATION
    if(!emailPattern.test(email)){
        $('#emailError').text('Enter valid email (example: name@gmail.com)');
        valid = false;
    }

    // PASSWORD VALIDATION
    if(!passwordPattern.test(password)){
        $('#passwordError').text('Password must be at least 8 characters');
        valid = false;
    }

    if(!valid) return;

    // API CALL
    $.post('auth/register', $(this).serialize(), function(res){
        let data = JSON.parse(res);

        if(data.status === 'success'){
            $('#msg').html('<div class="text-success">Registered successfully</div>');
            $('#signupForm')[0].reset();
        } else {
            $('#msg').html('<div class="text-danger">'+data.msg+'</div>');
        }
    });
});


// PASSWORD TOGGLE
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