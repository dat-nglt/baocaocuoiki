$(document).ready(function() {
    $(".add-to-cart").click(function() {
        var productDiv = $(this).closest('.product');
        var nameProduct = productDiv.find('.name-product').text();
        var imgProduct = productDiv.find('.imgProduct').attr('src');
        var idProduct = $(this).data("id");
        var priceProduct = $(this).data("price");

        $.ajax({
            type: "POST",
            url: "./services/addToCart.php",
            dataType: "json",
            data: {
                maSanPham: idProduct,
                tenSanPham: nameProduct,
                hinhAnh: imgProduct,
                giaTien: priceProduct,
            },
            success: function (result) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.onmouseenter = Swal.stopTimer;
                      toast.onmouseleave = Swal.resumeTimer;
                    }
                  });
                  Toast.fire({
                    icon: "success",
                    title: "Thêm sản phẩm vào giỏ"
                  }).then(() => {
                    window.location.assign(window.location.href);
                });
            },
            error: function (xhr, error) {
              console.log(xhr);
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.onmouseenter = Swal.stopTimer;
                      toast.onmouseleave = Swal.resumeTimer;
                    }
                  });
                  Toast.fire({
                    icon: "error",
                    title: "Thêm sản phẩm thất bại"
                  });
                return;
            },

        });
    });
});