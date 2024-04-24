<?php
session_start();
if (!isset($_SESSION["uid"]) || $_SESSION["uid"] != 0)
    header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Brand</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'leftbar.php'; ?>
            <div class="col-md-10 py-5 px-5 user" style="min-height: 100vh;">
                <div class="container px-5 py-5" style="border-radius: 10px;background-color: rgb(197, 162, 98);">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addbrand" style="color: blue"><i class="fa-solid fa-circle-plus"></i> Thêm thương hiệu</a>
                    <div class="row cart-top mb-2 mt-3">
                        <div class="col-md-2">
                            <strong>ID</strong>
                        </div>
                        <div class="col-md-3">
                            <strong>Tên</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Số lượng sản phẩm</strong>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <?php
                    include '../db.php';
                    $brand = "SELECT * FROM brands";
                    $query = mysqli_query($con, $brand);
                    while ($row = mysqli_fetch_array($query)) {
                        $brandid = $row['brand_id'];
                        $name = $row['brand_title'];
                        $products = "SELECT COUNT(*) AS count_products FROM products WHERE product_brand = '$brandid'";
                        $query_products = mysqli_query($con, $products);
                        $row_count = mysqli_fetch_array($query_products);
                        echo '
                            <form action="change_brand.php" method="POST">
                            <div class="row mb-2 cart-top">
                                <div class="col-md-2">
                                    <input class="form-control" type = "text" name="brandid" value="' . $brandid . '" readonly>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="brandname" value="' . $name . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="count" value="' . $row_count["count_products"] . '" class="form-control" readonly>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i></button>
                                    <a brandid=' . $brandid . ' class="btn btn-danger delete-brand"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </form>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addbrand" tabindex="-1" aria-labelledby="addbrandlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addbrandlabel">Thêm thương hiệu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="addbrand-form">
                            <div class="mb-3">
                                <label for="brandname"=class="form-label">Tên thương hiệu</label>
                                <input type="text" name="brandname" class="form-control">
                            </div>
                            <button type="submit" id="addbrand-btn" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="js/action.js"></script>
</body>

</html>