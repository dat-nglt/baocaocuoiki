function submitProductEdit() {
    $.cloudinary.config({
        cloud_name: "di37whq60",
        api_key: "287339152575881",
        api_secret: "0ghXMK9HlG7IFL3l3njbLKFQgXo",
    });

    var id = $("#id_product").val();
    var name = $("#input-name").val();
    var count = $("#input-count").val();
    var category = $("#category-product").val();
    var sale = $("#input-sale").val();
    var dateSale = $("#input-date-sale").val();
    var editor = CKEDITOR.instances['input-des'];
    var des = editor.getData();

    if (category.trim() === "") {
        Swal.fire({
            title: "Thông báo",
            text: "Vui lòng thương hiệu sản phẩm",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
    }

    if(dateSale === undefined){
        dateSale = '';
    }

    if (
        name.trim() === "" ||
        count.trim() === ""
    ) {
        Swal.fire({
            title: "Thông báo",
            text: "Vui lòng nhập các thông tin bắt buộc.",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
    }

    var file = $("#newImg")[0].files[0];
    if (file === undefined) {
        var image = $('#oldimg').attr('src');;
        var data = {
            name,
            count,
            category,
            sale,
            dateSale,
            des,
            id,
            image
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "../src/services/admin/editProduct.php",
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
            error: function () {
                Swal.fire({
                    title: "Thông báo",
                    text: "Chỉnh sửa không thành công",
                    icon: "error",
                    showConfirmButton: true,
                }).then(function () {
                    window.location.assign("index.php?page=listproducts");
                });
            },
        });
    } else {
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
                    count,
                    category,
                    sale,
                    dateSale,
                    des,
                    id,
                    image: response.secure_url,
                };
                $.ajax({
                    type: "POST",
                    url: "../src/services/admin/editProduct.php",
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
                            text: "Chỉnh sửa không thành công",
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
                    text: "Chỉnh sửa thông tin thất bại",
                    icon: "error",
                    showConfirmButton: true,
                }).then(function () {
                    window.location.assign("index.php?page=listproducts");
                });
            },
        });
    }
}
