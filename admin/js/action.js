$(document).ready(function () {
  $("#login-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#loginform").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        var popup = document.getElementById("popup");
        var popupContent = document.getElementById("popup-content");
        if (data == 0) {
          popupContent.innerText = "EMAIL/MẬT KHẨU KHÔNG ĐÚNG!";
          popup.style.backgroundColor = "red";
          popup.style.display = "block";
          setTimeout(function () {
            popup.style.display = "none";
          }, 2000);
        } else if (data == 1) {
          window.location.href = "user.php";
        }
      },
    });
  });
  $(".delete-user").click(function (event) {
    event.preventDefault();
    var uid = $(this).attr("uid");
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { user_delete: uid },
      success: function (data) {
        window.location.href = "user.php";
      },
    });
  });
  $("#adduser-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#adduser-form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        var popup = document.getElementById("popup");
        var popupContent = document.getElementById("popup-content");
        if (data == 0) {
          popupContent.innerText = "EMAIL ĐÃ ĐƯỢC SỬ DỤNG!";
          popup.style.backgroundColor = "red";
          popup.style.display = "block";
          setTimeout(function () {
            popup.style.display = "none";
          }, 2000);
        } else {
          window.location.href = "user.php";
        }
      },
    });
  });
  $(".delete-brand").click(function (event) {
    event.preventDefault();
    var brandid = $(this).attr("brandid");
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { brand_delete: brandid },
      success: function (data) {
        window.location.href = "brand.php";
      },
    });
  });

  $("#addbrand-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#addbrand-form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        window.location.href = "brand.php";
      },
    });
  });

  $(".delete-cate").click(function (event) {
    event.preventDefault();
    var cateid = $(this).attr("cateid");
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { cate_delete: cateid },
      success: function (data) {
        window.location.href = "category.php";
      },
    });
  });

  $("#addcate-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#addcate-form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        window.location.href = "category.php";
      },
    });
  });

  $(".delete-product").click(function (event) {
    event.preventDefault();
    var pid = $(this).attr("pid");
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { delete_product: pid },
      success: function (data) {
        window.location.href = "product.php";
      },
    });
  });

  $("#addproduct-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#addproduct-form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        window.location.href = "product.php";
      },
    });
  });
});
