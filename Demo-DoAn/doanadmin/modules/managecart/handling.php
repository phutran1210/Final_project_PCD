<?php
    require('../config.php');

    if(isset($_POST['update'])){
        $change = $_POST['change'];
        $sqlUpdate = "UPDATE 
                            `cart` 
                        SET 
                            `status`= '$change', 
                            `dateUpdate`='$time'
                        WHERE 
                            `id_cart` = '$_GET[id]'";
        mysqli_query($conn, $sqlUpdate);
        header('location:../../views/index.php?manage=bill&ac=list');
    }
?>