<?php
    require('../config.php');
    $title = $_POST['title'];
    $status = $_POST['status'];
    $content = $_POST['content'];
    $img = $_FILES['img']['name'];
    $imgtmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($imgtmp,'uploads/'.$img);

    if(isset($_POST['add'])){
        echo $img;
        $sqlAdd = "INSERT INTO `news`(
                        `title`, 
                        `img`, 
                        `content`, 
                        `status`, 
                        `datecreate`)
                    VALUES(
                        '$title', 
                        '$img', 
                        '$content', 
                        '$status', 
                        '$time')";
        mysqli_query($conn, $sqlAdd);
        header('location:../../views/index.php?manage=news&ac=list');
    }elseif(isset($_POST['update'])){
        $img = $_FILES['img']['name'];
        $imgtmp = $_FILES['img']['tmp_name'];
        move_uploaded_file($imgtmp,'uploads/'.$img);
        if($img != ''){
            $sqlUpdate = "UPDATE
                            `news`
                        SET
                            `title` = '$title',
                            `img` = '$img',
                            `content` = '$content',
                            `status` = '$status',
                            `dateUpdate` = '$time'
                        WHERE
                            `id_new` = '$_GET[id]'";
        }else{
            $sqlUpdate = "UPDATE
                            `news`
                        SET
                            `title` = '$title',
                            `content` = '$content',
                            `status` = '$status',
                            `dateUpdate` = '$time'
                        WHERE
                            `id_new` = '$_GET[id]'";
        }
        mysqli_query($conn, $sqlUpdate);
        header('location:../../views/index.php?manage=news&ac=list');
    }
?>