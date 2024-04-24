<div class="container-fluid">
    <form id="register_form">
        <div class="mb-3">
            <label for="rfirstname"=class="form-label">Họ</label>
            <input type="text" name="rfirstname" class="form-control" id="firstname" placeholder="Họ">
        </div>
        <div class="mb-3">
            <label for="rlastname" class="form-label">Tên</label>
            <input type="text" name="rlastname" class="form-control" placeholder="Tên">
        </div>
        <div class="mb-3">
            <label for="remail" class="form-label">Email</label>
            <input type="email" name="remail" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="rpassword" class="form-label">Mật khẩu</label>
            <div class="input-group">
                <input type="password" name="rpassword" class="form-control" id="registerpassword" placeholder="Mật khẩu">
                <button class="btn btn-outline-secondary" type="button" id="showPasswordToggleregister">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
            <div class="input-group">
                <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu">
                <button class="btn btn-outline-secondary" type="button" id="showRePasswordToggle">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="rphone" class="form-label">Số điện thoại</label>
            <input type="text" name="rphone" class="form-control" placeholder="Số điện thoại">
        </div>
        <button type="submit" id="register-btn" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
<script>
    document.getElementById('showPasswordToggleregister').addEventListener('click', function() {
        togglePasswordVisibility('registerpassword');
    });

    document.getElementById('showRePasswordToggle').addEventListener('click', function() {
        togglePasswordVisibility('repassword');
    });

    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var passwordFieldType = passwordInput.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordInput.setAttribute('type', 'text');
        } else {
            passwordInput.setAttribute('type', 'password');
        }
    }
</script>