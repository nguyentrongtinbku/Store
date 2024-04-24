<div class="container-fluid">
	<form id="loginform">
		<div class="mb-3">
			<label for="lemail" class="form-label">Email</label>
			<input type="email" name="lemail" class="form-control" placeholder="Email">
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