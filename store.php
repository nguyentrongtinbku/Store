<?php
include 'header.php';
include 'db.php';
if ($_GET['id']) {
	$category_id = $_GET['id'];
} else {
	header('Location: index.php');
}
$sql = " SELECT * FROM products ";
$sql = " SELECT * FROM products WHERE product_cat = $category_id";
if (isset($_GET['brand'])) {
	$brand_id = $_GET['brand'];
	$brand = " SELECT * FROM brands WHERE brand_id = $brand_id";
	$result_brand_name = mysqli_query($con, $brand);
	$row_brand_name = mysqli_fetch_assoc($result_brand_name);
	$brand_name = $row_brand_name['brand_title'];
	$sql .= " AND product_brand = $brand_id";
}
if (isset($_GET['sort'])) {
	$sort_type = $_GET['sort'];
	if ($sort_type == 1) {
		$sql .= " ORDER BY product_price ASC";
	} else if ($sort_type == 2) {
		$sql .= " ORDER BY product_price DESC";
	}
}
$title = " SELECT * FROM categories WHERE cat_id = $category_id";
$sql_brand = "SELECT * FROM brands";
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($con, $sql);
$result_title = mysqli_query($con, $title);
$result_brands = mysqli_query($con, $sql_brand);
$row_title = mysqli_fetch_assoc($result_title);
$cat_name = $row_title['cat_title']
	?>
<div class="procate px-2 py-3">
	<div class="container-fluit py-3 store" id="store-desk" style="background-color: white;">
		<div class="row">
			<div class="col-sm-3 filter py-3 d-flex flex-column align-items-center">
				<h6 style="color:red">THƯƠNG HIỆU</h6>
				<a class=" ms-3" href="store.php?id=<?php echo $category_id ?>">TẤT CẢ</a><br>
				<?php
				while ($row_brand = mysqli_fetch_assoc($result_brands)) {
					echo '<a class = " ms-3" href="store.php?id=' . $category_id . '&brand=' . $row_brand['brand_id'] . '">' . $row_brand['brand_title'] . '</a><br>';
				}
				?>
			</div>
			<div class="col-sm-9">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<h4><?php echo $cat_name ?></h4>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-3 dropdown">
							<div class="dropdown">
								<a class="btn btn-outline-success dropdown-toggle" href="#" role="button"
									data-bs-toggle="dropdown" aria-expanded="false">
									Sắp xếp
								</a>

								<ul class="dropdown-menu">
									<li><a class="dropdown-item"
											href="store.php?id=<?php echo $category_id ?>&sort=1">Giá tăng dần</a></li>
									<li><a class="dropdown-item"
											href="store.php?id=<?php echo $category_id ?>&sort=2">Giá giảm dần</a></li>
									<li><a class="dropdown-item" href="store.php?id=<?php echo $category_id ?>">Mặc
											định</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<div class="row my-3">';
					for ($i = 1; $i <= 3; $i++) {
						$pro_id = $row['product_id'];
						$pro_cat = $row['product_cat'];
						$pro_brand = $row['product_brand'];
						$pro_title = $row['product_title'];
						$pro_price = $row['product_price'];
						$pro_image = $row['product_image'];
						echo '
						<div class="col-sm-4">
							<div class="card text-center py-2 cardcustom style="width: 18rem;">
							<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class="img-fluid card-img-top" alt="card"></a>
								<div class="card-body">
									<p class="product-category">' . $cat_name . '</p>
									<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><span class="truncate">' . $pro_title . '</span></a></h5>
									<h5 style="color: red;">' . $pro_price . '$</h5>
									<button pid="' . $pro_id . '" id="product" class="add-to-cart-btn btn btn-danger" href="#"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
								</div>
							</div>
						</div>
						';
						if ($i != 3) {
							if (!$row = mysqli_fetch_assoc($result))
								break;
						}
					}
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
	<div class="container py-3 store" id="store-mobile" style="background-color: white;">
		<div>
			<div class="dropdown text-center mb-2">
				<a class="dropdown-toggle" data-bs-toggle="dropdown"
					aria-expanded="false" style="color: #FF0000;">
					<?php
					if(isset($_GET['brand']))
						echo $brand_name;
					else echo 'THƯƠNG HIỆU';
					?>
				</a>
				<ul class="dropdown-menu">
					<li><a class=" ms-3" href="store.php?id=<?php echo $category_id ?>">TẤT CẢ</a></li><br>
					<?php
					$result_brands = mysqli_query($con, $sql_brand);
					while ($row_brand = mysqli_fetch_assoc($result_brands)) {
						echo '<li><a class = " ms-3" href="store.php?id=' . $category_id . '&brand=' . $row_brand['brand_id'] . '">' . $row_brand['brand_title'] . '</a></li><br>';
					}
					?>
				</ul>
			</div>
		</div>
		<div>
			<div class="container">
				<div class="row">
					<div class="col-6">
						<h4><?php echo $cat_name ?></h4>
					</div>
					<div class="col-2"></div>
					<div class="col-3 float-right dropdown">
						<div class="dropdown">
							<a class="btn btn-outline-success dropdown-toggle" href="#" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Sắp xếp
							</a>

							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="store.php?id=<?php echo $category_id ?>&sort=1">Giá
										tăng dần</a></li>
								<li><a class="dropdown-item" href="store.php?id=<?php echo $category_id ?>&sort=2">Giá
										giảm dần</a></li>
								<li><a class="dropdown-item" href="store.php?id=<?php echo $category_id ?>">Mặc định</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<?php
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div class="row my-3">';
				for ($i = 1; $i <= 3; $i++) {
					$pro_id = $row['product_id'];
					$pro_cat = $row['product_cat'];
					$pro_brand = $row['product_brand'];
					$pro_title = $row['product_title'];
					$pro_price = $row['product_price'];
					$pro_image = $row['product_image'];
					echo '
						<div class="col-md-4">
							<div class="card text-center py-2 cardcustom style="width: 18rem;">
							<a href="product.php?p=' . $pro_id . '"><img style="height: 180px; width: auto;" src="' . $pro_image . '" class="img-fluid card-img-top" alt="card"></a>
								<div class="card-body">
									<p class="product-category">' . $cat_name . '</p>
									<h5 class="card-title"><a href="product.php?p=' . $pro_id . '"><span class="truncate">' . $pro_title . '</span></a></h5>
									<h5 style="color: red;">' . $pro_price . '$</h5>
									<button pid="' . $pro_id . '" id="product" class="add-to-cart-btn btn btn-danger" href="#"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
								</div>
							</div>
						</div>
						';
					if ($i != 3) {
						if (!$row = mysqli_fetch_assoc($result))
							break;
					}
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>