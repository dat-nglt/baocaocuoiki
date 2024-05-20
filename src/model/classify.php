<?php

function getNameClassify($conn){
    $sql = "select * from phanloai";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}

function getAllClassify($conn){
    $sql = "SELECT p.* FROM phanloai p,sanpham s where p.maLoai = s.maLoai GROUP by p.maLoai ORDER BY COUNT(s.maSanPham) desc";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}

function getClassify($conn,$name,$sort){
    $sql = "select * from phanloai where 1";
    if($name!=''){
        $sql.= " and tenLoai like '%".$name."%'";
    }
    if($sort=="asc"){
        $sql.= " order by maLoai asc";
    }
    if($sort=="desc"){
        $sql.= " order by maLoai desc";
    }
    $rs = mysqli_query($conn,$sql);
    return $rs;
}

function addClassfity($conn,$name,$img){
    $sql = "insert into phanloai values('','".$name."','".$img."')";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}

function getOneClassify($conn,$id){
    $sql = "select * from phanloai where maLoai = '".$id."'";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}

function delOneClassify($conn,$id){
    $sql = "DELETE FROM phanloai WHERE maLoai = '" . $id . "'";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}
?>