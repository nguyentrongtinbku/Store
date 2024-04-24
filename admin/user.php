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
    <title>User</title>
</head>

<body>
    <div id="popup" class="popup-notification px-2 py-2">
        <p id="popup-content"></p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php include 'leftbar.php'; ?>
            <div class="col-md-10 py-5 px-5 user" style="min-height: 100vh;">
                <div class="container px-5 py-5" style="border-radius: 10px;background-color: rgb(197, 162, 98);">
                    <a href="" data-bs-toggle="modal" data-bs-target="#adduser" style="color: blue"><i class="fa-solid fa-user-plus"></i> Thêm khách hàng</a>
                    <div class="row cart-top mb-2 mt-3">
                        <div class="col-md-1">
                            <strong>ID</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Họ</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Tên</strong>
                        </div>
                        <div class="col-md-3">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Mật khẩu</strong>
                        </div>
                        <div class="col-md-2">
                            <strong>Số điện thoại</strong>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <?php
                    include '../db.php';
                    $user = "SELECT * FROM user_info";
                    $query = mysqli_query($con, $user);
                    while ($row = mysqli_fetch_array($query)) {
                        $uid = $row['user_id'];
                        $f_name = $row['first_name'];
                        $l_name = $row['last_name'];
                        $email = $row['email'];
                        $pass = $row['password'];
                        $phone = $row['mobile'];
                        echo '
                        <form action="change_user.php" method="POST">
                            <div class="row mb-2 cart-top">
                                <div class="col-md-1">
                                    <input type="text" name="uid" value="' . $uid . '" class="form-control" readonly>
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="fname" value="' . $f_name . '" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <input type="text" name="lname" value="' . $l_name . '" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="email" value="' . $email . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="password" value="' . $pass . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="phone" value="' . $phone . '" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i></button>
                                    <a uid=' . $uid . ' class="btn btn-danger delete-user"><i class="fa-solid fa-trash-can"></i></a>
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
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="adduserlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="adduserlabel">Thêm khách hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="adduser-form">
                            <div class="mb-3">
                                <label for="afirstname"=class="form-label">Họ</label>
                                <input type="text" name="afirstname" class="form-control" placeholder="Họ">
                            </div>
                            <div class="mb-3">
                                <label for="alastname" class="form-label">Tên</label>
                                <input type="text" name="alastname" class="form-control" placeholder="Tên">
                            </div>
                            <div class="mb-3">
                                <label for="aemail" class="form-label">Email</label>
                                <input type="email" name="aemail" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="apassword" class="form-label">Mật khẩu</label>
                                <input type="text" name="apassword" class="form-control" placeholder="Mật khẩu">
                            </div>
                            <div class="mb-3">
                                <label for="aphone" class="form-label">Số điện thoại</label>
                                <input type="text" name="aphone" class="form-control" placeholder="Số điện thoại">
                            </div>
                            <button type="submit" id="adduser-btn" class="btn btn-primary">Thêm</button>
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