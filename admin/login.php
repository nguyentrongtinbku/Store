<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login admin</title>
</head>

<body style="background-color: #f8f8f8;">
    <div id="popup" class="popup-notification px-2 py-2">
        <p id="popup-content"></p>
    </div>
    <div class="container login-div">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="img/login.jpg">
            </div>
            <div class="col-md-6">
                <h2>ADMIN LOGIN</h2>
                <form id="loginform">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="loginpassword" class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <input type="password" name="loginpassword" class="form-control" id="loginpassword" placeholder="Mật khẩu">
                            <button class="btn btn-outline-secondary" type="button" id="showPasswordTogglelogin">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" id="login-btn" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
        <a href="../index.php"><i class="fa-solid fa-circle-left"></i> Dành cho khách hàng</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="js/action.js"></script>

</body>

</html>
<script>
    document.getElementById('showPasswordTogglelogin').addEventListener('click', function() {
        var passwordInput = document.getElementById('loginpassword');
        var passwordFieldType = passwordInput.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordInput.setAttribute('type', 'text');
        } else {
            passwordInput.setAttribute('type', 'password');
        }
    });
</script>