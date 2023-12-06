<?php
                if (isset($_POST['signIn'])) { //Nếu yêu cầu đăng kí được gửi lên thì tiến hành các xử lí sau
                    $username = $_POST['name-signin']; //Gán giá trị cho biến là tên đăng nhập
                    $password = password_hash($_POST['repassword-signin'], PASSWORD_DEFAULT); // tiến hành băm mật khẩu được gửi lên từ người dùng
                    if (mysqli_num_rows((checkAccount($conn, $username, $password, 'signIn'))) == 0) { // Kiểm tra nếu không tồn tại tài khoản trong database thì tiến hàng các bước tiếp theo
                        $time = date('Y-m-d'); 
                        var_dump($time);
                        signIn($conn, $username, $password, $time);
                        $_SESSION["test1"] = 1;
                        echo "<script>";
                        echo "window.location.href = 'index.php?page=login';";
                        echo "</script>";
                        echo "<script src='js/message-frame.js'> ";
                        echo "</script>";
                        include("./views/login/login.php");
                        return;
                    } else {
                        echo "<scrip>alert('Tên đăng nhập đã tồn tại!')</scrip>";
                    }
                }
                if (isset($_POST['login'])) { // Kiểm tra có yêu cầu đăng nhập được gửi lên
                    $username = $_POST['name-login']; 
                    $password = $_POST['password-login'];
                    $hash = mysqli_fetch_assoc(checkAccount($conn, $_POST['name-login'], '', 'signIn'));
                    if (password_verify($_POST['password-login'], $hash['matKhau'])) {
                        $_SESSION['user'] = mysqli_fetch_assoc(checkAccount($conn, $username, $hash['matKhau'], 'login'));
                        if($_SESSION['user']['quyenTruyCap']==2){
                            header("Location: http://localhost/baocaocuoiki/admin/");
                        }else{
                            $_SESSION['test'] = 1;
                            echo "<script>";
                            echo "window.location.href = 'index.php';";
                            echo "</script>";
                            echo "<script src='./js/message-frame.js'>";
                            echo "</script>";
                        }
                    } else {
                        echo "<script>alert('Tên đăng nhập hoặc tài khoản không tồn tại!')</script>";
                    }
                }
                if (!isset($_SESSION['test1'])) {
                    $_SESSION['test1'] = '0';
                }
                if ($_SESSION['test1'] == 1) {
                    echo "</script>";
                    echo "<script src='./js/message-frame.js'>";
                    echo "</script>";
                }
                $_SESSION["test1"] = 0;
                include("./views/login/login.php");
                return;
?>