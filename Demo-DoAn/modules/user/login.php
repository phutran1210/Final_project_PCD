<?php
    //require('../doanadmin/modules/config.php');
    $error = '';
    $success = '';
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email != '' || $password != ''){
            $sql_user = "SELECT 
                            * 
                        FROM 
                            `user` 
                        WHERE 
                            `email` = '$email'";
            $query_user = mysqli_query($conn, $sql_user);
            $count_user = mysqli_num_rows($query_user);
            if($count_user > 0){
                if(strlen($password) >=8 && strlen($password) <= 32){
                    $partten = "/^([A-Z]){1}([a-z0-9]){7,31}$/";
                    $password_user = mysqli_fetch_array($query_user);
                    $passUser = $password_user['password'];
                    if(password_verify($password, $passUser)){
                        $idUser = $password_user['id'];
                        $name = $password_user['name'];
                        $phone = $password_user['phone'];
                        $address = $password_user['address'];
                        $_SESSION['idUser'] = $idUser;
                        $_SESSION['name'] = $name;
                        $_SESSION['fullname'] = $name;
                        $_SESSION['email'] = $email;
                        $_SESSION['phone'] = $phone;
                        $_SESSION['address'] = $address;
                        header('location:index.php');
                        //$success = '<div class="alert alert-success col-md-9 mr-auto ml-auto d-block" role="alert">
                        //                Đăng nhập thành công.
                        //            </div>';
                    }else{
                        $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                    Tài khoản không đúng. Làm ơn đăng nhập lại.
                                </div>';
                    }
                }else{
                    $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                        Mật khẩu lớn hơn 8 và nhỏ hơn 32 ký tự.
                    </div>';
                }
            }else{
                $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                        Email này chưa được đăng ký.
                    </div>';
            }
        }else{
            $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                        Email và mật khẩu không được để trống.
                    </div>';
        }
    }
?>
<!--Log in-->
<section>
    <div class="container mt-2 mb-5">
        <div class="col-md-6 mr-auto ml-auto border-login pt-3 pb-3">
            <h2 class="text-center">ĐĂNG NHẬP</h2>
            <form action="../views/index.php?manage=login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex mb-3">
                    <button name="login" type="btn-login"" class="btn btn-danger ml-auto">Đăng nhập</button>
                </div>
            </form>
            <?php echo $error;?>
            <?php echo $success;?>
        </div>
    </div>
</section>
<?php ob_end_flush();?>