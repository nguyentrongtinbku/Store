<div class="mainbody py-3">
	<div class="container">
		<section class="banner ms-4">
			<div id="banner" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="3000">
						<img style=" border-radius: 10px;" src="img/banner1.png" class="d-block w-100" alt="banner">
					</div>
					<div class="carousel-item" data-bs-interval="3000">
						<img style=" border-radius: 10px;" src="img/banner2.png" class="d-block w-100" alt="banner">
					</div>
					<div class="carousel-item" data-bs-interval="3000">
						<img style=" border-radius: 10px;" src="img/banner3.png" class="d-block w-100" alt="banner">
					</div>
					<div class="carousel-item" data-bs-interval="3000">
						<img style=" border-radius: 10px;" src="img/banner1.png" class="d-block w-100" alt="banner">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</section>
		<section class="newproduct mt-3">
			<h3 class="ms-4">Sản phẩm mới</h3>
			<div class="container my-3 mt-3" id="featureContainer">
				<div class="row mx-auto my-auto justify-content-center">
					<div id="newpt" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<?php
							include 'db.php';
							$product_ids = array(1, 35, 32, 30, 56);
							$product_ids_string = implode(', ', $product_ids);
							$product_query = "SELECT * FROM products,categories WHERE product_cat = cat_id AND product_id IN ($product_ids_string)";
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
												<div class="card card-slide text-center py-2">
												<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class="img-fluid card-img-top" alt="card"></a>
													<div class="card-body">
													<p class="product-category">' . $cat_name . '</p>
													<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><spand class="truncate">' . $pro_title . '</spand></a></h5>
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
												<div class="card card-slide text-center py-2">
												<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class=" img-fluid card-img-top" alt="card"></a>
													<div class="card-body">
													<p class="product-category">' . $cat_name . '</p>
													<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><spand class="truncate">' . $pro_title . '</spand></a></h5>
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
		</section>
		<section class="topsell mt-3">
			<h3 class="ms-4">Sản phẩm bán chạy</h3>
			<div class="container my-3 mt-3" id="featureContainer">
				<div class="row mx-auto my-auto justify-content-center">
					<div id="topsell" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<?php
							include 'db.php';
							$product_ids = array(57, 52, 28, 39, 59);
							$product_ids_string = implode(', ', $product_ids);
							$product_query = "SELECT * FROM products,categories WHERE product_cat = cat_id AND product_id IN ($product_ids_string)";
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
												<div class="card card-slide text-center py-2">
												<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class="img-fluid card-img-top" alt="card"></a>
													<div class="card-body">
													<p class="product-category">' . $cat_name . '</p>
													<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><spand class="truncate">' . $pro_title . '</spand></a></h5>
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
												<div class="card card-slide text-center py-2">
												<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class=" img-fluid card-img-top" alt="card"></a>
													<div class="card-body">
														<p class="product-category">' . $cat_name . '</p>
														<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><spand class="truncate">' . $pro_title . '</spand></a></h5>
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
						<button class="carousel-control-prev pbtn" type="button" data-bs-target="#topsell" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next nbtn" type="button" data-bs-target="#topsell" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<script>
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