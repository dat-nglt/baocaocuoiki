<?php
function getAllAccount($conn, $search, $sort, $startPage, $limit)
{
    $sql = "SELECT * FROM nguoidung where quyenTruyCap IN (0, 1)";
    if ($search != '') {
        $sql .= " and maNguoiDung = '" . $search . "'";
    }
    if ($sort == "asc" || $sort == "desc") {
        $sql .= " order by maNguoiDung " . $sort . "";
    }
    if ($sort == "0" || $sort == "1") {
        $sql .= " and quyenTruyCap = '" . $sort . "'";
    }
    if ($startPage != '') {
        $sql .= " limit " . $startPage . ", " . $limit . "";
    }
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function getOneAccount($conn, $idUser)
{
    $sql = "SELECT * FROM nguoidung where maNguoiDung = '" . $idUser . "' and quyenTruyCap IN (0, 1)";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}
;

function signIn($conn, $username, $password,$date)
{
    $sql = "insert into nguoidung(tenTaiKhoan,matKhau,ngayThamGia) values ('" . $username . "','" . $password . "','".$date."')";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function checkAccount($conn, $username, $password, $check)
{
    if ($check == 'login') {
        $sql = "select * from nguoidung where tenTaiKhoan = '" . $username . "' and matKhau = '" . $password . "'";
    } else if ($check == 'signIn') {
        $sql = "select * from nguoidung where tenTaiKhoan = '" . $username . "'";
    }
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function setRoleAccount($conn, $id, $role)
{
    $sql = "update nguoidung set quyenTruyCap = '" . $role . "' where maNguoiDung = '" . $id . "'";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function updatePassword($conn, $id, $pass)
{
    $sql = "update nguoidung set matKhau = '" . $pass . "' where maNguoiDung = '" . $id . "'";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function updateAccount($conn, $id, $username, $name, $email, $tel, $male, $address, $date)
{
    $sql = "update nguoidung set tenTaiKhoan = '" . $username . "', tenNguoiDung = '" . $name . "',email='" . $email . "',soDienThoai='" . $tel . "',gioiTinh='" . $male . "',diaChi ='" . $address . "',ngaySinh='" . $date . "' where maNguoiDung = '" . $id . "'";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}
?>