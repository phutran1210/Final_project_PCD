<?php
    //require('../doanadmin/modules/config.php');
    $error = '';
    $success = '';

    if(isset($_POST['reg'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if($fullname != '' || $email != '' || $pass1 != '' || $pass2 != '' || $phone != '' || $address != ''){
            $sql_user = "SELECT 
                            * 
                        FROM 
                            `user` 
                        WHERE 
                            `email` = '$email'";
            $query_user = mysqli_query($conn, $sql_user);
            $numRow = mysqli_num_rows($query_user);
            if($numRow == 0){
                if(strlen($pass1) >=8 && strlen($pass1) <=32){
                    if($pass1 == $pass2){
                        $partten = "/^([A-Z]){1}([a-z0-9]){7,31}$/";
                        if(preg_match($partten, $pass1, $matches)){
                            $pass = password_hash($pass1, PASSWORD_BCRYPT);
                            //print_r($pass);
                            $sql_insert_user = "INSERT INTO `user`(
                                                    `name`, 
                                                    `email`, 
                                                    `password`, 
                                                    `phone`, 
                                                    `address`, 
                                                    `dateCreated`) 
                                                VALUES (
                                                    '$fullname',
                                                    '$email',
                                                    '$pass',
                                                    '$phone',
                                                    '$address',
                                                    '$time')";
                            $query_insert_user = mysqli_query($conn, $sql_insert_user);
                            $success = '<div class="alert alert-success col-md-9 mr-auto ml-auto d-block" role="alert">
                                        Đăng ký thành công.
                                    </div>';
                        }
                    }else{
                        $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                    Mật khẩu không giống nhau. Nhập lại mật khẩu.
                                </div>';
                    }
                }else{
                    $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                                Mật khẩu phải lớn hơn 8 và nhỏ hơn 32 ký tự.
                            </div>';
                }

            }else{
                $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                            Email đã tồn tại. nhập email khác.
                        </div>';
            }
        }else{
            $error = '<div class="alert alert-danger col-md-9 mr-auto ml-auto d-block" role="alert">
                        Thông tin không được để trống. Nhập lại thông tin.
                    </div>';
        }
    }
    
?>

<!--Registration-->
<section>
    <div class="container mt-2 mb-5">
        <div class="col-md-6 mr-auto ml-auto border-registration pt-3 pb-3">
            <h2 class="text-center">ĐĂNG KÝ</h2>
            <form action="../views/index.php?manage=registration" method="POST">
                <div class="form-group">
                    <label for="fullName">Họ và tên</label>
                    <input name="fullname" type="fullname" class="form-control col-md-5" id="fullName" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control col-md-7" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Mật khẩu</label>
                        <input name="pass1" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="exampleInputPassword2">Nhập lại mật khẩu</label>
                        <input name="pass2" type="password" class="form-control" id="exampleInputPassword2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Phone"">Số điện thoại</label>
                    <input name="phone" type="" class="form-control col-md-4" id="Phone" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="Address">Địa chỉ</label>
                    <input name="address" type="address" class="form-control" id="Address" aria-describedby="emailHelp">
                </div>
                <div class="d-flex mb-3">
                <button name="reg" type="btn-login" class="btn btn-danger ml-auto">Đăng ký</button>
                </div>
            </form>
            <?php echo $error;?>
            <?php echo $success;?>
        </div>
    </div>
</section>