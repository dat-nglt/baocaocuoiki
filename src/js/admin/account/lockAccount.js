$(document).ready(function () {
  $('.list__action-btn').on('click', function () {
    var id = $(this).data('id');
    $.ajax({
      url: './services/admin/lockAccount.php',
      type: 'POST',
      dataType: 'json',
      data: { id },
      success: function (result) {
        Swal.fire({
            title: "Thông báo",
            text: result.msg,
            icon: result.status,
            showConfirmButton: true,
          }).then(function () {
      window.location.assign(result.path);
  });
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Thông báo",
          text: "Khóa tài khoản không thành công.",
          icon: "error",
          showConfirmButton: true,
        }).then(function () {
            window.location.assign("index.php?page=listaccounts");
        });
      }
    });
  });
});