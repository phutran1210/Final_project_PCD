<?php
    require('../config.php');
    $name_product = $_POST['name-product'];
    $type_product = $_POST['type-product'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $content = $_POST['content'];

    $img1 = $_FILES['img-1']['name'];
    $img1tmp = $_FILES['img-1']['tmp_name'];
    move_uploaded_file($img1tmp,'uploads/'.$img1);

    $img2 = $_FILES['img-2']['name'];
    $img2tmp = $_FILES['img-2']['tmp_name'];
    move_uploaded_file($img2tmp,'uploads/'.$img2);

    $page = $_GET['page'];

    if(isset($_POST['add'])){
        $sql_add = "INSERT INTO `product`(
                        `id_type`, 
                        `product_name`, 
                        `img_1`, 
                        `img_2`, 
                        `price`, 
                        `amount`, 
                        `content`, 
                        `dateCreated`, 
                        `dateUpdate`) 
                    VALUES (
                        '$type_product', 
                        '$name_product', 
                        '$img1', 
                        '$img2', 
                        '$price', 
                        '$amount', 
                        '$content', 
                        '$time', 
                        '$time')";
        mysqli_query($conn, $sql_add);
        header('location:../../views/index.php?manage=product&ac=list');
    }elseif(isset($_POST['update'])){
        $name_product = $_POST['name-product'];
        $type_product = $_POST['type-product'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];
        $content = $_POST['content'];
    
        $img1 = $_FILES['img-1']['name'];
        $img1tmp = $_FILES['img-1']['tmp_name'];
        move_uploaded_file($img1tmp,'uploads/'.$img1);
    
        $img2 = $_FILES['img-2']['name'];
        $img2tmp = $_FILES['img-2']['tmp_name'];
        move_uploaded_file($img2tmp,'uploads/'.$img2);

        if($img1 !='' && $img2 != ''){
            $sql_update = "UPDATE 
                                `product` 
                            SET 
                                `id_type` = '$type_product', 
                                `product_name` = '$name_product', 
                                `img_1` = '$img1', 
                                `img_2` = '$img2', 
                                `price` = '$price', 
                                `amount` = '$amount', 
                                `content` = '$content', 
                                `dateUpdate` = '$time' 
                            WHERE 
                                `id_product` = '$_GET[id]'";
            mysqli_query($conn, $sql_update);
            header('location:../../views/index.php?manage=product&ac=list');
        }elseif($img1 !='' && $img2 = ''){
            $sql_update = "UPDATE 
                                `product` 
                            SET 
                                `id_type` = '$type_product', 
                                `product_name` = '$name_product', 
                                `img_2` = '$img2', 
                                `price` = '$price', 
                                `amount` = '$amount', 
                                `content` = '$content', 
                                `dateUpdate` = '$time' 
                            WHERE 
                                `id_product` = '$_GET[id]'";
            mysqli_query($conn, $sql_update);
            header('location:../../views/index.php?manage=product&ac=list');
        }elseif($img1 ='' && $img2 != ''){
            $sql_update = "UPDATE 
                                `product` 
                            SET 
                                `id_type` = '$type_product', 
                                `product_name` = '$name_product', 
                                `img_1` = '$img1', 
                                `img_2` = '$img2', 
                                `price` = '$price', 
                                `amount` = '$amount', 
                                `content` = '$content', 
                                `dateUpdate` = '$time' 
                            WHERE 
                                `id_product` = '$_GET[id]'";
            mysqli_query($conn, $sql_update);
            header('location:../../views/index.php?manage=product&ac=list');
        }else{
            $sql_update = "UPDATE 
                                `product` 
                            SET 
                                `id_type` = '$type_product', 
                                `product_name` = '$name_product', 
                                `price` = '$price', 
                                `amount` = '$amount', 
                                `content` = '$content', 
                                `dateUpdate` = '$time' 
                            WHERE 
                                `id_product` = '$_GET[id]'";
            mysqli_query($conn, $sql_update);
            header('location:../../views/index.php?manage=product&ac=list');
        }
        
        /*if(mysqli_query($conn, $sql_update)){
            echo "thành công";
        }else{
            echo "thất bại". mysqli_error($conn);
        }*/
        //mysqli_query($conn, $sql_update);
        //header('location:../../views/index.php?manage=product&ac=list');
    }else{
        $sql_delete = "DELETE 
                        FROM 
                            `product` 
                        WHERE 
                            `id_product` = '$_GET[id]'";
        mysqli_query($conn, $sql_delete);
        header('location:../../views/index.php?manage=product&ac=list');
    }
?>