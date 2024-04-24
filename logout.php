<?php
session_start();
if ($_SESSION["uid"] == 0) {
    unset($_SESSION["uid"]);
    unset($_SESSION["name"]);
    header('Location: admin/login.php');
} else {
    unset($_SESSION["uid"]);
    unset($_SESSION["name"]);
    header('Location: index.php');
}
