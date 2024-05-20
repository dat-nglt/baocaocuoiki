<?php
function getAllProduct($conn, $search, $sort, $classify, $startPage, $limit)
{
    $sql = "SELECT * FROM sanpham where 1";
    if ($search != '') {
        $sql .= " and tenSanPham like '%" . $search . "%'";
    }
    if ($classify != 0) {
        $sql .= " and maLoai = '" . $classify . "'";
    }
    if ($sort == "asc" || $sort == "desc") {
        $sql .= " order by maSanPham " . $sort . "";
    }
    if ($sort == "0") {
        $sql .= " order by giaTien asc";
    }
    if ($sort == "1") {
        $sql .= " order by giaTien desc";
    }
    if ($startPage != '') {
        $sql .= " limit " . $startPage . ", " . $limit . "";
    }
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

function updateProduct($conn, $idProduct,$name,$price,$quantity,$classify,$describe,$image,$time,$discount)
{
    if($image != ''){
        $sql = "update sanpham set tenSanPham = '".$name."', giaTien = '".$price."', soLuong = '".$quantity."', maLoai = '".$classify."', moTa ='".$describe."', hinhAnh = '".$image."', ngayHetHanGiam = '".$time."', giaGiam = '".$discount."' where maSanPham = '" . $idProduct . "'";
    }else{
        $sql = "update sanpham set tenSanPham = '".$name."', giaTien = '".$price."', soLuong = '".$quantity."', maLoai = '".$classify."', moTa ='".$describe."', ngayHetHanGiam = '".$time."', giaGiam = '".$discount."' where maSanPham = '" . $idProduct . "'";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function addProduct($conn,$image,$name,$price,$quantity,$classify,$describe)
{   
    if($image ==''){
        $sql = "insert into sanpham values ('','".$name."','','".$price."','".$quantity."','".$describe."',0,'','".$classify."')";
    }else{
        $sql = "insert into sanpham values ('','".$name."','".$image."','".$price."','".$quantity."','".$describe."',0,'','".$classify."')";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getAllProductOfClassify($conn,$id){
    $sql = "select s.*,p.tenLoai from sanpham s,phanloai p where s.maLoai = p.maLoai and s.maLoai = '".$id."'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData; 
}

function getProductFlashSale($conn,$limit){
    $sql = "select * from sanpham where giaGiam > 0";
    if($limit!=""){
        $sql.= " limit 0,5";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function updateQuantityProduct($conn,$quantity,$id){
    $sql = "update sanpham set soLuong = soLuong - '".$quantity."' where maSanPham = '".$id."'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function updateQuantityProduct1($conn,$quantity,$id){
    $sql = "update sanpham set soLuong = soLuong + '".$quantity."' where maSanPham = '".$id."'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getCountProduct($conn){
    $sql = "SELECT sum(soLuong) from sanpham";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

?>