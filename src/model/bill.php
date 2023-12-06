<?php
function getAll_Order($conn, $search, $sort, $startPage, $limit)
{
    $sql = "SELECT  *, DATE_FORMAT(DH.thoiGian, '%d/%m/%Y') AS ngayDatFormatted FROM donhang DH, nguoidung ND WHERE DH.maNguoiDung = ND.maNguoiDung";
    if ($search != "") {
        // Kiểm tra xem $search có đúng định dạng ngày tháng năm không
        $searchDate = DateTime::createFromFormat('d/m/Y', $search);
        if ($searchDate !== false) {
            $formattedSearch = $searchDate->format('Y-m-d');
            $sql .= " AND DH.thoiGian = '" . $formattedSearch . "'";
        } else {
            $sql .= " AND (LOWER(DH.maDonHang) LIKE '%" . $search . "%' 
            OR LOWER(DH.maNguoiDung) LIKE '%" . $search . "%'
            OR LOWER(DH.diaChi) LIKE '%" . $search . "%'
            OR LOWER(ND.tenNguoiDung) LIKE '%" . $search . "%')";
        }
    }
    if ($sort == 'asc' || $sort == 'desc') {
        $sql .= " order by DH.maDonHang " . $sort . "";
    }
    if ($sort == 'asc1' || $sort == 'desc1') {
        $sort = substr($sort, 0, -1);
        $sql .= " order by DH.thanhTien " . $sort . "";
    }
    if ($sort == 1 || $sort == 0) {
        $sql .= " AND DH.trangThai = ". $sort ."";
    }
    if ($startPage != '') {
        $sql .= " limit " . $startPage . ", " . $limit . "";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function delOne_Order($conn, $order_id)
{
    $sql = "DELETE FROM donhang WHERE maDonHang = '" . $order_id . "'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;


function getOneOrder($conn, $id)
{
    $sql = "select * FROM donhang WHERE maDonHang = '" . $id . "'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getDetailOrder($conn, $id)
{
    $sql = "select * FROM chitietdonhang WHERE maDonHang = '" . $id . "'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function addBill($conn,$iduser,$time,$tien,$diachi,$hoten,$tel,$note){
    $sql = "insert into donhang values ('','".$iduser."','".$time."','0','".$tien."','".$diachi."','".$hoten."','".$tel."','".$note."')";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function addDetailBill($conn,$mabill,$maSanPham,$quantity,$price,$totalPrice){
    $sql = "insert into chitietdonhang values ('','".$mabill."','".$maSanPham."','".$quantity."','".$price."','".$totalPrice."')";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function countSold($conn,$id){
    $sql = "select sum(soLuong) from chitietdonhang where maSanPham = '".$id."'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function countSoldAllProduct($conn){
    $sql = "select m.*, sum(c.soLuong) from chitietdonhang c,sanpham m where m.maSanPham = c.maSanPham GROUP by c.maSanPham ORDER by  sum(c.soLuong) asc";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getAllBillUser($conn,$id){
    $sql = "select * from donhang where maNguoiDung = '".$id."'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getBillSucces($conn){
    $sql = "select * from donhang where trangThai = 1";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

?>