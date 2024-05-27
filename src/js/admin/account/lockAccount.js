$(document).ready(function () {
  $('.list__action-btn').on('click', function () {
    Swal.fire({
      title: 'Xác nhận',
      text: 'Bạn có muốn thực hiện hành động này!',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      cancelButtonText: 'Huỷ',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Xác nhận',
  }).then((result) => {
      if (result.isConfirmed) {
        var id = $(this).data('id');
        $.ajax({
          url: '../src/services/admin/lockAccount.php',
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
              text: "Không thể thự hiện hành động",
              icon: "error",
              showConfirmButton: true,
            }).then(function () {
                window.location.assign("index.php?page=listaccounts");
            });
          }
        });
      }
  });
  });
});