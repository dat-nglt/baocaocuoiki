function submitProduct() {
    $.cloudinary.config({
        cloud_name: "di37whq60",
        api_key: "287339152575881",
        api_secret: "0ghXMK9HlG7IFL3l3njbLKFQgXo",
    });

    var name = $("#input-name").val();
    var price = $("#input-price").val();
    var brand = $("#category-product-add").val();
    var file = $("#newImg")[0].files[0];

    var editor = CKEDITOR.instances['input-des'];
    var des = editor.getData();


    if (brand === "") {
        Swal.fire({
            title: "Thông báo",
            text: "Vui lòng thêm thương hiệu",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
    }

    if(file === undefined){
        Swal.fire({
            title: "Thông báo",
            text: "Vui lòng thêm ảnh sản phẩm",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
    }

    if (
        name.trim() === "" ||
        price.trim() === ""
    ) {
        Swal.fire({
            title: "Thông báo",
            text: "Vui lòng nhập các thông tin bắt buộc",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
    }

        var formData = new FormData();
        formData.append("file", file);
        formData.append("upload_preset", "quanlikhohang");
        $.ajax({
            url: "https://api.cloudinary.com/v1_1/di37whq60/image/upload",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var data = {
                    name,
                    price,
                    brand,
                    des,
                    image: response.secure_url,
                };
                $.ajax({
                    type: "POST",
                    url: "../src/services/admin/addProduct.php",
                    dataType: "json",
                    data: data,
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
                    error: function (xhr) {
                        console.log(xhr);
                        Swal.fire({
                            title: "Thông báo",
                            text: "Thêm sản phẩm không thành công",
                            icon: "error",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.assign(
                                "index.php?page=listproducts"
                            );
                        });
                    },
                });
            },
            error: function () {
                Swal.fire({
                    title: "Thông báo",
                    text: "Thêm ảnh sản phẩm thất bại",
                    icon: "error",
                    showConfirmButton: true,
                }).then(function () {
                    window.location.assign("index.php?page=listproducts");
                });
            },
        });
    }
