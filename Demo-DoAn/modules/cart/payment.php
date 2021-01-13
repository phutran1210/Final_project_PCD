<?php
    @session_start();
    require('../../doanadmin/modules/config.php');

    if(isset($_POST['cart'])){
        if(isset($_SESSION['idUser'])){
            $idUser = $_SESSION['idUser'];
        }else{
            $idUser = 5;
        }
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $payment = $_POST['payment'];
        $content = $_POST['ghichu'];
        $sumTotal = $_POST['sumTotal'];

        echo $idUser.'</br>';
        echo $name.'</br>';
        echo $phone.'</br>';
        echo $email.'</br>';
        echo $address.'</br>';
        echo $payment.'</br>';
        echo $content.'</br>';
        echo $sumTotal.'</br>';
        echo $time.'</br>';

        $insertCart = "INSERT INTO `cart`(
            `id_user`,
            `name`,
            `phone`,
            `email`,
            `address`,
            `payments`,
            `totalPrice`,
            `content`,
            `status`,
            `dateCreated`,
            `dateUpdate`
        )
        VALUES(
            '$idUser',
            '$name',
            '$phone',
            '$email',
            '$address',
            '$payment',
            '$sumTotal',
            '$content',
            0,
            '$time',
            '$time'
        )";
        $sqlIns = mysqli_query($conn, $insertCart);
        if($sqlIns){
            $mathAmout = 0;
            for($i = 0; $i < count($_SESSION['product']); $i++){
                $max = "SELECT 
                            max(`id_cart`) 
                        FROM 
                            `cart`";
                $maxSql = mysqli_query($conn, $max);
                $row = mysqli_fetch_array($maxSql);

                $id_cart = $row[0];
                $idProduct = $_SESSION['product'][$i]['id'];
                $amount = $_SESSION['product'][$i]['soluong'];

                $sqlAmount = "SELECT 
                                    `amount` 
                                FROM 
                                    `product` 
                                WHERE 
                                    `id_product` = '$idProduct'";
                $maxAmount = mysqli_query($conn, $sqlAmount);
                $rowAmount = mysqli_fetch_array($maxAmount);

                $amountProduct = $rowAmount[0];
                $mathAmout = $amountProduct - $amount;
                $price = ($_SESSION['product'][$i]['price'] * $_SESSION['product'][$i]['soluong']);
                $insertCartDetail = "INSERT INTO `cart_detail`(
                                        `id_cart`, 
                                        `id_product`, 
                                        `amout`, 
                                        `total`) 
                                    VALUES (
                                        '$id_cart', 
                                        '$idProduct', 
                                        '$amount', 
                                        '$price')";
                $updateAmount = "UPDATE 
                                    `product` 
                                SET 
                                    `amount` = '$mathAmout' 
                                WHERE 
                                    `id_product` = '$idProduct'";
                $sqlInsDetail = mysqli_query($conn, $insertCartDetail);
                $sqlUpdAmount = mysqli_query($conn, $updateAmount);
            }
            unset($_SESSION['product']);
            header('location:../../views/index.php?manage=thankyou');
        }else{
            echo 'chưa';
        }
    }elseif(isset($_POST['update'])){
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
		header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>