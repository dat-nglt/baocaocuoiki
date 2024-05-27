<?php
function getAll_Order($conn, $search, $sort, $startPage, $limit)
{
    $sql = "SELECT d.*, n.tenTaiKhoan, sum(c.soLuong) AS count FROM donhang d JOIN nguoidung n ON d.maNguoiDung = n.maNguoiDung 
    JOIN chitietdonhang c ON d.maDonHang = c.maDonHang WHERE n.tenTaiKhoan LIKE '%$search%' GROUP BY c.maDonHang";

    if ($sort == 'asc' || $sort == 'desc') {
        $sql .= " order by d.maDonHang " . $sort . "";
    }
    if ($sort == 'asc1' || $sort == 'desc1') {
        $sort = substr($sort, 0, -1);
        $sql .= " order by d.thanhTien " . $sort . "";
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

function updateBillAdmin($conn, $id, $status)
{
    $sql = "UPDATE donhang SET trangThai = '$status' WHERE  maDonHang = '$id'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getOneOrderAdmin($conn, $id)
{
    $sql = "SELECT d.*, n.tenTaiKhoan, c.* FROM donhang d JOIN nguoidung n ON d.maNguoiDung = n.maNguoiDung 
    JOIN chitietdonhang c ON d.maDonHang = c.maDonHang WHERE d.maDonHang = '$id' GROUP BY c.maDonHang";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getDetailOrderAdmin($conn, $id)
{
    $sql = "SELECT d.*,s.tenSanPham, c.* FROM chitietdonhang c JOIN sanpham s ON c.maSanPham = s.maSanPham 
    JOIN donhang d ON d.maDonHang = c.maDonHang WHERE c.maDonHang = '$id'";
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
    $sql = "select * FROM chitietdonhang WHERE maDonHang = '$id'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function addBill($conn, $iduser, $time, $tien, $diachi, $hoten, $tel, $note)
{
    $sql = "insert into donhang values ('','" . $iduser . "','" . $time . "','0','" . $tien . "','" . $diachi . "','" . $hoten . "','" . $tel . "','" . $note . "')";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function addDetailBill($conn, $mabill, $maSanPham, $quantity, $price, $totalPrice)
{
    $sql = "insert into chitietdonhang values ('','" . $mabill . "','" . $maSanPham . "','" . $quantity . "','" . $price . "','" . $totalPrice . "')";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function countSold($conn, $id)
{
    $sql = "select sum(soLuong) from chitietdonhang where maSanPham = '" . $id . "'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function countSoldAllProduct($conn)
{
    $sql = "select m.*, sum(c.soLuong) from chitietdonhang c,sanpham m where m.maSanPham = c.maSanPham GROUP by c.maSanPham ORDER by  sum(c.soLuong) asc";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getAllBillUser($conn, $id)
{
    $sql = "select * from donhang where maNguoiDung = '" . $id . "'";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

function getBillSuccess($conn)
{
    $sql = "select * from donhang where trangThai = 1";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

?>