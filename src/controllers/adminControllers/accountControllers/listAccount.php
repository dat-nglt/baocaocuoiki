<?php
if (isset($_POST['search-account'])) {
    $_SESSION['search-account'] = $_POST['search-account'];
}
if (isset($_POST['sort-account'])) {
    $_SESSION['sort-account'] = $_POST['sort-account'];
}

$_SESSION['search-account'] = isset($_SESSION['search-account']) ? $_SESSION['search-account'] : '';
$_SESSION['sort-account'] = isset($_SESSION['sort-account']) ? $_SESSION['sort-account'] : 'desc';

$countAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], '', '');
$total_page = ceil(mysqli_num_rows($countAccount) / $limitPage);

if ($total_page == 0) {
    $total_page = 1;
}
$current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : '1';
if ($current_page < 1) {
    $current_page = 1;
}
if ($current_page > $total_page) {
    $current_page = $total_page;
}
$start = ($current_page - 1) * $limitPage;
// if (isset($_POST['add_account'])) {
//     $username = $_POST['user-name_user'];
//     $fullName = $_POST['full-name_user'];
//     if($_POST['date-of-birth_user'] === ''){
//         $dateOfBirth = date('Y/m/d');
//     }
//     $address = $_POST['address_user'];
//     $phoneNumber = $_POST['phone-number_user'];
//     $email = $_POST['email_user'];
//     $male = $_POST['male_user'];
//     $dateJoin = date('Y/m/d');
//     $password = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
//     if (mysqli_num_rows(checkAccountWithUsername($conn, $username)) < 1) {
//         if (checkAccountWithEmail($conn, $email)) {
//             $add = createAccount($conn, $username, $password, $fullName, $email, $phoneNumber, $male, $address, $dateOfBirth, $dateJoin);
//             if ($add) {
//                 $dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage);
//                 include ('../src/views/admin/account/list-account.php');
//                 success('Thêm tài khoản thành công!', 'index.php?page=listaccounts&pageNumber=' . $current_page);
//             } else {
//                 $dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage);
//                 include ('../src/views/admin/account/list-account.php');
//                 error('Thêm tài khoản thất bại!', 'index.php?page=listaccounts&pageNumber=' . $current_page);
//             }
//         } else {
//             $dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage);
//             include ('../src/views/admin/account/list-account.php');
//             warning('Email đã tồn tại!', 'index.php?page=listaccounts&pageNumber=' . $current_page);
//         }
//     } else {
//         $dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage);
//         include ('../src/views/admin/account/list-account.php');
//         warning('Tên đăng nhập đã tồn tại!', 'index.php?page=listaccounts&pageNumber=' . $current_page);
//     }
//     exit();
// }
$dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage);
include ('../src/views/admin/account/list-account.php');
