<?php
include 'header.php';
include 'db.php';
$product_id = $_GET['p'];
$sql = " SELECT * FROM products ";
$sql = " SELECT * FROM products WHERE product_id = $product_id";
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result)
?>

<div class="mainproduct">
	<div class="container px-4 py-5" style="background-color: white;">
		<div class="row">
			<div class="col-sm-6">
				<div class="text-center mb-3">
					<img id="main-image" class="img-thumbnail" style="width: 70%; height: auto;" src="<?php echo $row['product_image'] ?>" />
				</div>
				<div class="thumbnail text-center preview">
					<img onclick="change_image(this)" class="img-thumbnail" src="<?php echo $row['product_image'] ?>" width="70">
					<img onclick="change_image(this)" class="img-thumbnail" src="<?php echo $row['product_image'] ?>" width="70">
					<img onclick="change_image(this)" class="img-thumbnail" src="<?php echo $row['product_image'] ?>" width="70">
				</div>
			</div>
			<div class="col-sm-6">
				<h2><?php echo $row['product_title'] ?></h2>
				<div class="my-2" style="color: #D10024;">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<h3 style="color: #D10024;">$<?php echo $row['product_price'] ?></h3>
				<p>Một chiếc laptop gaming mà mình tin rằng các game thủ có thể dễ dàng bị chinh phục nhờ sở hữu mức giá lý tưởng nhưng lại trang bị những thông số kỹ thuật ấn tượng.</p>
				<div class="product-options">
					<div class="my-3">
						DUNG LƯỢNG
						<div class="btn-group ms-3" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-outline-secondary" onclick="selectStorage(this)">256GB</button>
							<button type="button" class="btn btn-outline-secondary" onclick="selectStorage(this)">512Gb</button>
							<button type="button" class="btn btn-outline-secondary" onclick="selectStorage(this)">1TB</button>
						</div>
					</div>

					<div>
						MÀU SẮC
						<div class="btn-group ms-3" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-outline-secondary" onclick="selectColor(this)">Đen</button>
							<button type="button" class="btn btn-outline-secondary" onclick="selectColor(this)">Vàng</button>
							<button type="button" class="btn btn-outline-secondary" onclick="selectColor(this)">Trắng</button>
						</div>
					</div>
				</div>
				<button pid="<?php echo $row['product_id'] ?>" id="product" class="add-to-cart-btn btn btn-danger mt-3" href="#"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
				<div class="mt-3 row">
					<div class="col-md-2">
						<p>CHIA SẺ:</p>
					</div>
					<div class="col-md-6">
						<ul class="footer-payments" style="list-style-type: none;">
							<li><a href="#"><i style="color: black;" class="fa-brands fa-facebook"></i></a></li>
							<li><a href="#"><i style="color: black;" class="fa-brands fa-twitter"></i></a></li>
							<li><a href="#"><i style="color: black;" class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5 ms-1 px-3 py-3" style="background-color: #fef6f5; border-radius: 10px;">
			<h3>Bình luận</h3>
			<div class="col-sm-7 mt-3">
				<div class="row mb-2" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-4">
						<h6>An</h6>
						<span style="color: #ccc;">30/04/2024</span>
					</div>
					<div class="col-md-6">
						<p>Sản phẩm vượt mong đợi</p>
					</div>
				</div>
				<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-4">
						<h6>Bình</h6>
						<span style="color: #ccc;">01/05/2024</span>
					</div>
					<div class="col-md-6">
						<p>Sản phẩm tốt đúng mô tả</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<label for="ques" class="form-label">Câu hỏi của bạn</label>
				<textarea class="form-control" id="ques" rows="3"></textarea>
				<button class="btn btn-primary mt-2">Gửi</button>
			</div>
		</div>
		<div class="row mt-5 py-3 related" style="text-align: center;">
			<h3>SẢN PHẨM LIÊN QUAN</h3>
			<div class="container my-3 mt-3" id="featureContainer">
				<div class="row mx-auto my-auto justify-content-center">
					<div id="newpt" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<?php
							include 'db.php';
							$product_query = "SELECT * FROM products,categories WHERE product_cat = cat_id AND product_id BETWEEN 10 AND 15";
							$run_query = mysqli_query($con, $product_query);
							$row = mysqli_fetch_array($run_query);
							$pro_id = $row['product_id'];
							$pro_cat   = $row['product_cat'];
							$pro_brand = $row['product_brand'];
							$pro_title = $row['product_title'];
							$pro_price = $row['product_price'];
							$pro_image = $row['product_image'];
							$cat_name = $row["cat_title"];
							echo '
										<div class="carousel-item active" data-bs-interval="4000">
											<div class="col-md-2">
												<div class=" card card-slide text-center py-2">
												<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class=" img-fluid card-img-top" alt="card"></a>
													<div class="card-body">
													<p class="product-category">' . $cat_name . '</p>
													<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><span class="truncate">' . $pro_title . '</span></a></h5>
													<h5 style="color: red;">' . $pro_price . '$</h5>
														<button pid="' . $pro_id . '" id="product" class="add-to-cart-btn btn btn-danger" href="#"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
													</div>
												</div>
											</div>
										</div>';
							if (mysqli_num_rows($run_query) > 0) {
								while ($row = mysqli_fetch_array($run_query)) {
									$pro_id    = $row['product_id'];
									$pro_cat   = $row['product_cat'];
									$pro_brand = $row['product_brand'];
									$pro_title = $row['product_title'];
									$pro_price = $row['product_price'];
									$pro_image = $row['product_image'];
									$cat_name = $row["cat_title"];
									echo '
										<div class="carousel-item" data-bs-interval="4000">
											<div class="col-md-2">
												<div class=" card card-slide text-center py-2">
												<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class=" img-fluid card-img-top" alt="card"></a>
													<div class="card-body">
													<p class="product-category">' . $cat_name . '</p>
													<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><span class="truncate">' . $pro_title . '</span></a></h5>
													<h5 style="color: red;">' . $pro_price . '$</h5>
														<button pid="' . $pro_id . '" id="product" class="add-to-cart-btn btn btn-danger" href="#"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
													</div>
												</div>
											</div>
										</div>';
								}
							}
							?>
						</div>
						<button class="carousel-control-prev pbtn" type="button" data-bs-target="#newpt" data-bs-slide="prev">
							<span class="carousel-control-prev-icon"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next nbtn" type="button" data-bs-target="#newpt" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function change_image(image) {
		var container = document.getElementById("main-image");
		container.src = image.src;
	}
	document.addEventListener("DOMContentLoaded", function(event) {});
	let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
	myCarousel.forEach((el) => {
		const minPerSlide = 4
		let next = el.nextElementSibling
		for (var i = 1; i < minPerSlide; i++) {
			if (!next) {
				next = myCarousel[0]
			}
			let cloneChild = next.cloneNode(true)
			el.appendChild(cloneChild.children[0])
			next = next.nextElementSibling
		}
	})
</script>
<script>
	var selectedButton = null;

	function selectStorage(button) {
		if (selectedButton === button) {
			selectedButton.classList.remove('selected');
			selectedButton = null;
		} else {
			if (selectedButton !== null) {
				selectedButton.classList.remove('selected');
			}
			selectedButton = button;
			selectedButton.classList.add('selected');
		}
	}
	var selectedColorBtn = null;

	function selectColor(button) {
		if (selectedColorBtn === button) {
			selectedButselectedColorBtnton.classList.remove('selected');
			selectedColorBtn = null;
		} else {
			if (selectedColorBtn !== null) {
				selectedColorBtn.classList.remove('selected');
			}
			selectedColorBtn = button;
			selectedColorBtn.classList.add('selected');
		}
	}
</script>
<script>
	const ratings = document.getElementById('rating1');
	const rating1 = new CDB.Rating(ratings);
	rating1.getRating;
</script>
<?php
include 'footer.php';
?>