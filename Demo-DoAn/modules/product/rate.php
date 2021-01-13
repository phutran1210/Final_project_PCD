<?php
    require('../../doanadmin/modules/config.php');

    if(isset($_POST['btnRate'])){
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $comment = $_POST['ghichu'];
        $id = $_GET['id'];

        /*echo $name.'</br>';
        echo $email.'</br>';
        echo $comment.'</br>';
        echo $id.'</br>';
        echo $time;*/

        $sqlRate = "INSERT INTO `rate`(
                        `id_product`,
                        `name_user`,
                        `email`,
                        `comment`,
                        `dateCreate`)
                    VALUES(
                        '$id',
                        '$name',
                        '$email',
                        '$comment',
                        '$time')";
        $insRate = mysqli_query($conn, $sqlRate);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }
?>