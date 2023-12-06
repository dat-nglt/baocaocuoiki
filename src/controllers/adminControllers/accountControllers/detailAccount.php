<?php 
if(isset($_GET['id'])&&$_GET['id']>0) {
    if(isset($_POST['lock']) || isset($_POST['unLock'])){
        setRoleAccount($conn, $_GET['id'], $_POST['role']);
    }
    $detailUser = mysqli_fetch_assoc(getOneAccount($conn, $_GET['id']));
    include('../src/views/admin/account/detail-account.php');                 
}else{
    header('Location: index.php?page=listaccounts');
    exit();
}

?>