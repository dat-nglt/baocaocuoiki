<?php
function getAllProduct($conn, $search, $sort, $classify, $startPage, $limit)
{
    $sql = "SELECT s.*, p.tenLoai FROM sanpham AS s JOIN phanloai AS p ON s.maLoai = p.maloai where 1";
    if ($search != '') {
        $sql .= " and s.tenSanPham like '%$search%'";
    }
    if ($classify != 0) {
        $sql .= " and s.maLoai = '$classify'";
    }
    if ($sort == "asc" || $sort == "desc") {
        $sql .= " order by s.maSanPham $sort";
    }
    if ($sort == "0") {
        $sql .= " order by s.giaTien asc";
    }
    if ($sort == "1") {
        $sql .= " order by s.giaTien desc";
    }
    if ($sort === "") {
        $sql .= " order by s.soLuong desc";
    }
    if ($startPage != '') {
        $sql .= " limit $startPage, $limit";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getAllProductHome($conn,$search, $startPage, $limit)
{
    $sql = "SELECT s.*, count(chitietdonhang.maSanPham) as soLuongBan FROM sanpham s LEFT JOIN
     chitietdonhang ON s.maSanPham = chitietdonhang.maSanPham WHERE s.tenSanPham like '%$search%' GROUP BY s.maSanPham order by s.maSanPham desc 
     limit $startPage, $limit";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getOneProduct($conn, $idProduct)
{
    $sql = "SELECT s.*, p.tenLoai FROM sanpham s,phanloai p where s.maLoai = p.maLoai and maSanPham = '" . $idProduct . "'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getAllProductOfClassify($conn, $id, $start = '', $limit = '')
{
    $sql = "SELECT s.*,p.tenLoai 
    FROM sanpham s,phanloai p 
    WHERE s.maLoai = p.maLoai 
    AND s.maLoai = '" . $id . "' ";
    if ($start != '') {
        $sql .= "LIMIT $start, $limit";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getCountProductWithClassify($conn, $classify)
{
    $sql = "select count(maLoai) from sanpham where maLoai = '$classify'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getProductFlashSale($conn, $start = '', $limit = '')
{
    $sql = "SELECT sanpham.*, count(chitietdonhang.maSanPham) as soLuongBan FROM sanpham LEFT JOIN
     chitietdonhang ON sanpham.maSanPham = chitietdonhang.maSanPham 
     WHERE sanpham.giaGiam > 0 AND (DATE(NOW()) < sanpham.ngayHetHanGiam) GROUP BY sanpham.maSanPham ORDER by count(chitietdonhang.maSanPham) DESC";
    if ($start != '') {
        $sql .= " LIMIT $start, $limit";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function updateQuantityProduct($conn, $quantity, $id, $condition)
{
    if ($condition === 'success') {
        $sql = "update sanpham set soLuong = soLuong - '" . $quantity . "' where maSanPham = '" . $id . "'";
    } else {
        $sql = "update sanpham set soLuong = soLuong + '" . $quantity . "' where maSanPham = '" . $id . "'";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getCountProduct($conn)
{
    $sql = "SELECT sum(soLuong) from sanpham";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function formatTimeRemaining($seconds)
{
    $days = floor($seconds / 86400);
    $hours = floor(($seconds % 86400) / 3600);

    $timeRemaining = "";
    if ($days > 0) {
        $timeRemaining .= $days . "d";
    }
    if ($hours > 0) {
        $timeRemaining .= $hours . "h";
    }

    return $timeRemaining;
}