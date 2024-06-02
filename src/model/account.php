<?php
function getAllAccount($conn, $search, $sort, $startPage, $limit)
{
    $sql = "SELECT * FROM nguoidung where quyenTruyCap IN (0, 1)";
    if ($search != '') {
        $sql .= " and email like '%$search%' or soDienThoai = '$search' or tenNguoiDung like '%$search%'";
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



function signIn($conn, $username, $email, $password, $date)
{
    $sql = "insert into nguoidung(tenTaiKhoan, email, matKhau, ngayThamGia) values ('" . $username . "','" . $email . "','" . $password . "','" . $date . "')";
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

function checkAccountWithUsername($conn, $id)
{
    $sql = "select * from nguoidung where maNguoiDung = '$id'";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function checkAccountWithEmail($conn, $email)
{
    $sql = "select * from nguoidung where email = '$email'";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}

function createAccount($conn, $username, $password, $name, $email, $tel, $male, $address, $dateOfBirth, $dateJoin)
{
    $sql = "insert into nguoidung values ('', '$username', '$password', '$name', '$address', '$tel', '$email', $male, '$dateOfBirth', '$dateJoin', 1)";
    $rs = mysqli_query($conn, $sql);
    return $rs;
}
