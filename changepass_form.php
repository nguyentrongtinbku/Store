<div class="container-fluid">
	<form id="changepass-form">
		<div class="mb-3">
			<label for="currentpassword" class="form-label">Mật khẩu hiện tại</label>
			<div class="input-group">
				<input type="password" name="currentpassword" class="form-control" id="currentpassword" placeholder="Mật khẩu">
				<button class="btn btn-outline-secondary" type="button" id="showPasswordTogglechange">
					<i class="fa-solid fa-eye"></i>
				</button>
			</div>
		</div>
		<div class="mb-3">
			<label for="newpassword" class="form-label">Mật khẩu mới</label>
			<div class="input-group">
				<input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Mật khẩu">
				<button class="btn btn-outline-secondary" type="button" id="showPasswordTogglenew">
					<i class="fa-solid fa-eye"></i>
				</button>
			</div>
		</div>
		<button type="submit" id="change-btn" class="btn btn-primary">Thay đổi</button>
	</form>
</div>
<script>
	document.getElementById('showPasswordTogglechange').addEventListener('click', function() {
		var passwordInput = document.getElementById('currentpassword');
		var passwordFieldType = passwordInput.getAttribute('type');

		if (passwordFieldType === 'password') {
			passwordInput.setAttribute('type', 'text');
		} else {
			passwordInput.setAttribute('type', 'password');
		}
	});
	document.getElementById('showPasswordTogglenew').addEventListener('click', function() {
		var passwordInput = document.getElementById('newpassword');
		var passwordFieldType = passwordInput.getAttribute('type');

		if (passwordFieldType === 'password') {
			passwordInput.setAttribute('type', 'text');
		} else {
			passwordInput.setAttribute('type', 'password');
		}
	});
</script>