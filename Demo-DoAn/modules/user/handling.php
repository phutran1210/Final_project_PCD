<?php
    require('../../doanadmin/modules/config.php');

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        //echo $id.'</br>'.$fullName.'</br>'.$email.'</br>'.$phone.'</br>'.$address.'</br>'.$time;
        $sql = "UPDATE
                    `user`
                SET
                    `name` = '$fullName',
                    `email` = '$email',
                    `phone` = '$phone',
                    `address` = '$address',
                    `dateUpdate` = '$time'
                WHERE
                    `id` = '$id'"; 
        mysqli_query($conn, $sql);
		header("Location:../../views/index.php?manage=user");
    }
?>