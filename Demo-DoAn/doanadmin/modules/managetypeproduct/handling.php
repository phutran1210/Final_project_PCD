<?php
    require('../config.php');
    $name_type = $_POST['name-type'];
    $status = $_POST['status'];

    if(isset($_POST['add'])){
        $sql_add = "INSERT INTO `type_products`(
                        `type_name`, 
                        `status`) 
                    VALUES (
                        '$name_type', 
                        '$status')";
        mysqli_query($conn, $sql_add);
        header('location:../../views/index.php?manage=typeproduct&ac=list');
    }elseif (isset($_POST['update'])) {
        $sql_update = "UPDATE 
                            `type_products` 
                        SET 
                            `type_name` = '$name_type',
                            `status` = '$status' 
                        WHERE 
                            `id_type` = '$_GET[id]'";
        mysqli_query($conn, $sql_update);
        header('location:../../views/index.php?manage=typeproduct&ac=list');
    }else{
        $sql_delete = "DELETE 
                        FROM 
                            `type_products` 
                        WHERE 
                            `id_type` = '$_GET[id]'";
        mysqli_query($conn, $sql_delete);
        header('location:../../views/index.php?manage=typeproduct&ac=list');

    }
?>