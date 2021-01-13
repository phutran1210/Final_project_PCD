<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/doan/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/doan/assets/css/style.css">
    <link rel="shortcut icon" href="/doan/assets/img/favicon_olc.ico" type="image/x-icon">

    <title>Đăng nhập vào trang doanadmin</title>
  </head>
  <body class="login-page">
    <?php
        session_start();
        require('../modules/config.php');
        $error = '';

        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username != '' && $password != ''){
                $sql_admin = "SELECT 
                                    * 
                                FROM 
                                    `admin` 
                                WHERE 
                                    `username` = '$username'";
                $row_admin = mysqli_query($conn, $sql_admin);
                $count_admin = mysqli_num_rows($row_admin);
                if($count_admin > 0){
                    if(strlen($password) >=8 && strlen($password) <=32){
                        $partten = "/^([A-Z]){1}([a-z0-9]){7,31}$/";
                        if(preg_match($partten, $password, $matches)){
                            $password_admin = mysqli_fetch_array($row_admin);
                            $passwordAdmin = $password_admin['password'];
                            if(password_verify( $password, $passwordAdmin)){
                                $_SESSION['login'] = $username;
                                header('location:index.php');
                            }else{
                                $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                            Tài khoản không đúng. Làm ơn đăng nhập lại.
                                        </div>';
                            }
                        }else{
                            $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                        Mật khẩu bao gồm chữ in hoa đầu tiên, chữ thường và số.
                                    </div>';
                        }
                    }else{
                        $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                    Mật khẩu phải lớn hơn 8 và nhỏ hơn 32 ký tự.
                                </div>';
                    }
                }else{
                    $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                Tài khoản không đúng. Làm ơn đăng nhập lại.
                            </div>';
                }
            }else{
                $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                            Tên đăng nhập và mật khẩu không được để trống.
                        </div>';
            }
            
        }
    ?>
    
    <div class="container mt-5 text-center">
        <div class="from-admin pb-3 border-login-admin">
            <form class="mb-3 pt-2 pb-5" action="login.php" method="post">
                <h2 class="text-white mb-4 pt-3">Đăng nhập</h2>
                <div class="form-group">
                    <input class="form-control col-md-9 d-inline" type="text" name="username" id="username" placeholder="Enter username...">
                </div>
                <div class="form-group">
                    <input class="form-control col-md-9 d-inline" type="password" name="password" id="password" placeholder="Enter password...">
                </div>
                <input class="btn btn-light mt-3" type="submit" name="login" value="Sign in">
            </form>
            <?php echo $error; ?>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/doan/assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="/doan/assets/js/popper.min.js"></script>
    <script src="/doan/assets/js/bootstrap.min.js"></script>
  </body>
</html>