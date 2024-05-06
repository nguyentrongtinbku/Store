<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<div id="popup" class="popup-notification px-2 py-2">
		<p id="popup-content"></p>
	</div>
	<div class="myheader" id="header-desk">
		<div id="header">
			<div class="container px-5">
				<div class="row">
					<div class="col-3 col-sm-3 ps-5 mt-3 header-logo">
						<a href="index.php" class="logo">
							<i style="color: red;" class="fa-solid fa-globe fa-3x"></i>
						</a>
					</div>
					<div class="col-5 col-sm-5 mt-4">
						<form action="search.php" method="GET" class="d-flex">
							<input type="text" name="search_query" class="form-control search-input mr-2" placeholder="Tìm kiếm sản phẩm">
							<button type="submit" class="btn btn-outline-danger search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
						</form>
					</div>
					<div class="col-4 col-sm-4 py-4">
						<div class="row">
							<div class="col-2 col-sm-2 cart mt-1">
								<a href="cart.php">
									<i class="fa-solid fa-cart-shopping fa-2x"></i>
									<?php
									if (isset($_SESSION["uid"]))
										echo '<div class="badge qty">0</div>';
									?>
								</a>
							</div>
							<div class="col-8 col-sm-8 ms-4 account">
								<div class="btn-group mt-2">
									<?php
									include "db.php";
									if (isset($_SESSION["uid"])) {
										$sql = "SELECT last_name FROM user_info WHERE user_id='$_SESSION[uid]'";
										$query = mysqli_query($con, $sql);
										$row = mysqli_fetch_array($query);
										echo '
												<a id="dropdownToggle" class="dropdown-toggle" style="color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
													<i style="color: red;" class="fa-solid fa-user"></i><span class="hello">  Xin chào  ' . $row["last_name"] . '</span></a>
												<ul class="dropdown-menu ul-account px-2" aria-labelledby="dropdownToggle">
													<li><a href="profile.php"><i style="color: red;" class="fa fa-user-circle" aria-hidden="true" ></i> Thông tin cá nhân</a></li>
													<li><a href="logout.php"  ><i style="color: red;" class="fa fa-sign-in" aria-hidden="true"></i> Đăng xuất</a></li>
												</ul>';
									} else {
										echo '
												<a id="dropdownToggle"  class=" dropdown-toggle" style="color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
													<i style="color: red;" class="fa-solid fa-user"></i><span class="hello">  Tài khoản</span></a>
												<ul class="dropdown-menu ul-account px-2" aria-labelledby="dropdownToggle">
													<li><a href="admin/login.php" ><i style="color: red;" class="fa fa-user" aria-hidden="true" ></i> Admin</a></li>
													<li><a href="" data-bs-toggle="modal" data-bs-target="#loginmodal"><i style="color: red;" class="fa fa-sign-in" aria-hidden="true" ></i> Đăng nhập</a></li>
													<a href="" data-bs-toggle="modal" data-bs-target="#registermodal"><i style="color: red;" class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>
												</ul>';
									}
									?>
									<script>
										document.getElementById("dropdownToggle").addEventListener("mouseenter", function() {
											var dropdownMenu = this.nextElementSibling;
											dropdownMenu.classList.add("show");
										});

										document.querySelector(".dropdown-menu").addEventListener("mouseleave", function() {
											this.classList.remove("show");
										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navi">
			<div class="container px-5">
				<nav class="nav">
					<a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
					<?php
					include "db.php";
					$sql = "SELECT * FROM categories";
					$categorie_query = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_assoc($categorie_query)) {
						$category_id = $row['cat_id'];
						$category_title = $row['cat_title'];
						echo "<a class='nav-link' href='store.php?id=$category_id'>$category_title</a><br>";
					}
					?>
				</nav>
			</div>
		</div>
	</div>
	<div class="myheader" id="header-mobile">
		<div id="header">
			<div class="container px-3 py-3">
				<div class="row">
					<div class="col-5">
						<div class="dropdown">
							<a class="dropdown-toggle menu-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa-solid fa-bars fa-2x" style="color: white;"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-dark px-3">
								<li><a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a></li><br>
								<?php
								include "db.php";
								$sql = "SELECT * FROM categories";
								$categorie_query = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_assoc($categorie_query)) {
									$category_id = $row['cat_id'];
									$category_title = $row['cat_title'];
									echo "<li><a class='nav-link' href='store.php?id=$category_id'>$category_title</a></li><br>";
								}
								?>
							</ul>
						</div>
					</div>
					<div class="col-2 text-center">
						<a href="index.php" class="logo">
							<i style="color: red;" class="fa-solid fa-globe fa-2x"></i>
						</a>
					</div>
					<div class="col-1">

					</div>
					<div class="col-1 mt-1">
						<a href="" data-bs-toggle="modal" data-bs-target="#searchmodal"><i class="fa-solid fa-magnifying-glass" style="color: white;" ;></i></a>
					</div>
					<div class="col-1 cart mt-1">
						<a href="cart.php">
							<i class="fa-solid fa-cart-shopping	" style="color: white;"></i>
							<?php
							if (isset($_SESSION["uid"]))
								echo '<div class="badge qty">0</div>';
							?>
						</a>
					</div>
					<div class="col-1">
						<div class="btn-group mt-1">
							<?php
							include "db.php";
							if (isset($_SESSION["uid"])) {
								$sql = "SELECT last_name FROM user_info WHERE user_id='$_SESSION[uid]'";
								$query = mysqli_query($con, $sql);
								$row = mysqli_fetch_array($query);
								echo '
												<a id="dropdownToggle" class="dropdown-toggle" style="color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
													<i style="color: white;" class="fa-solid fa-user"></i></a>
												<ul class="dropdown-menu ul-account px-2" aria-labelledby="dropdownToggle">
													<li><a href="profile.php"><i style="color: red;" class="fa fa-user-circle" aria-hidden="true" ></i> Thông tin cá nhân</a></li>
													<li><a href="logout.php"  ><i style="color: red;" class="fa fa-sign-in" aria-hidden="true"></i> Đăng xuất</a></li>
												</ul>';
							} else {
								echo '
												<a id="dropdownToggle"  class=" dropdown-toggle" style="color: white;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
													<i style="color: white;" class="fa-solid fa-user"></i></a>
												<ul class="dropdown-menu ul-account px-2" aria-labelledby="dropdownToggle">
													<li><a href="admin/login.php" ><i style="color: red;" class="fa fa-user" aria-hidden="true" ></i> Admin</a></li>
													<li><a href="" data-bs-toggle="modal" data-bs-target="#loginmodal"><i style="color: red;" class="fa fa-sign-in" aria-hidden="true" ></i> Đăng nhập</a></li>
													<a href="" data-bs-toggle="modal" data-bs-target="#registermodal"><i style="color: red;" class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>
												</ul>';
							}
							?>
							<script>
								document.getElementById("dropdownToggle").addEventListener("mouseenter", function() {
									var dropdownMenu = this.nextElementSibling;
									dropdownMenu.classList.add("show");
								});

								document.querySelector(".dropdown-menu").addEventListener("mouseleave", function() {
									this.classList.remove("show");
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginlabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="loginlabel">Đăng nhập</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					include "login_form.php";
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="searchmodal" tabindex="-1" aria-labelledby="searchlabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="searchlabel">Tìm kiếm</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="search.php" method="GET" class="d-flex">
						<input type="text" name="search_query" class="form-control search-input mr-2" placeholder="Tìm kiếm sản phẩm">
						<button type="submit" class="btn btn-outline-danger search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="registerlabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="registerlabel">Đăng ký</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					include "register_form.php";
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>