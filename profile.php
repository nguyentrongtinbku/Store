<?php
include 'header.php';
include "db.php";
$uid = $_SESSION["uid"];
$sql = "SELECT * FROM user_info WHERE user_id = '$uid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$f_name = $row['first_name'];
$l_name = $row['last_name'];
$email = $row['email'];
$phone = $row['mobile'];
?>
<div class="profile">
	<div class="container py-3 px-3 ">
		<div class="col-md-6 mx-auto px-4 py-4" style="border-radius: 10px; background-color: white;">
			<div class="text-center">
				<h2>Thông tin cá nhân</h2>
			</div>
			<div class="text-center">
				<h2><i class="fa-solid fa-user-tie fa-2x"></i></h2>
			</div>
			<form id="profile-form">
				<div class="mb-3">
					<label for="pfirstname" class="form-label">Họ</label>
					<input type="text" name="pfirstname" value="<?php echo $f_name ?>" class="form-control" placeholder="Họ">
				</div>
				<div class="mb-3">
					<label for="plastname" class="form-label">Tên</label>
					<input type="text" name="plastname" value="<?php echo $l_name ?>" class="form-control" placeholder="Tên">
				</div>
				<div class="mb-3">
					<label for="pemail" class="form-label">Email</label>
					<input type="email" name="pemail" value="<?php echo $email ?>" class="form-control" placeholder="Email" readonly>
				</div>
				<div class="mb-3">
					<label for="pphone" class="form-label">Số điện thoại</label>
					<input type="text" name="pphone" value="<?php echo $phone ?>" class="form-control" placeholder="Số điện thoại">
				</div>
				<div class="text-center"><button type="submit" id="profile-btn" class="updatebtn btn btn-primary">Cập nhật</button></div>
			</form>
			<a style="color: red" href="" data-bs-toggle="modal" data-bs-target="#changepassmodal"> Thay đổi mật khẩu?</a>
		</div>

	</div>
</div>
<div class="modal fade" id="changepassmodal" tabindex="-1" aria-labelledby="changepassmodal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="changepassmodal">Đổi mật khẩu</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php
				include "changepass_form.php";
				?>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>