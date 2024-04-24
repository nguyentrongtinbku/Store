$(document).ready(function () {
  $("body").delegate("#product", "click", function (event) {
    var pid = $(this).attr("pid");
    event.preventDefault();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { addToCart: 1, proId: pid },
      success: function (data) {
        count_item();
        var popup = document.getElementById("popup");
        var popupContent = document.getElementById("popup-content");
        popupContent.innerText = data;
        if (data == "BẠN CẦN PHẢI ĐĂNG NHẬP")
          popup.style.backgroundColor = "red";
        else popup.style.backgroundColor = "#14e137";
        popup.style.display = "block";
        setTimeout(function () {
          popup.style.display = "none";
        }, 2000);
      },
    });
  });

  count_item();
  function count_item() {
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { count_item: 1 },
      success: function (data) {
        $(".badge").html(data);
      },
    });
  }

  $("#profile-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#profile-form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        if (data == 1) {
          var popup = document.getElementById("popup");
          var popupContent = document.getElementById("popup-content");
          popupContent.innerText = "CẬP NHẬT THÀNH CÔNG!";
          popup.style.backgroundColor = "#14e137";
          popup.style.display = "block";
          setTimeout(function () {
            popup.style.display = "none";
          }, 2000);
        } else {
          console.log("Update Fail!");
        }
      },
    });
  });
  $("#change-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#changepass-form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        var popup = document.getElementById("popup");
        var popupContent = document.getElementById("popup-content");
        popupContent.innerText = data;
        if (data == "MẬT KHẨU HIỆN TẠI KHÔNG ĐÚNG")
          popup.style.backgroundColor = "red";
        else popup.style.backgroundColor = "#14e137";
        popup.style.display = "block";
        setTimeout(function () {
          popup.style.display = "none";
        }, 2000);
      },
    });
  });

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
          window.location.href = "index.php";
        }
      },
    });
  });

  $("#register-btn").click(function (event) {
    event.preventDefault();
    var formData = $("#register_form").serialize();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        var popup = document.getElementById("popup");
        var popupContent = document.getElementById("popup-content");
        if (data == -1) {
          popupContent.innerText = "EMAIL ĐÃ ĐƯỢC SỬ DỤNG!";
          popup.style.backgroundColor = "red";
          popup.style.display = "block";
          setTimeout(function () {
            popup.style.display = "none";
          }, 2000);
        } else if (data == 0) {
          popupContent.innerText = "MẬT KHẨU XÁC NHẬN SAI!";
          popup.style.backgroundColor = "red";
          popup.style.display = "block";
          setTimeout(function () {
            popup.style.display = "none";
          }, 2000);
        } else if (data == 1) {
          window.location.href = "index.php";
        }
      },
    });
  });

  $(".delete-btn").click(function (event) {
    event.preventDefault();
    var pid = $(this).attr("p_id");
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { proId_delete: pid },
      success: function (data) {
        window.location.href = "cart.php";
      },
    });
  });
});
