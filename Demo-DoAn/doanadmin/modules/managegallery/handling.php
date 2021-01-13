<?php
    require('../config.php');

    if(isset($_GET['manage']) && $_GET['manage'] == 'delete'){
        $id = $_GET['id'];
        $sql_delete = mysqli_query($conn, "DELETE 
                                            FROM 
                                                `gallery` 
                                            WHERE 
                                                `id_product` = '$id'");
        header('location:../../views/index.php?manage=gallery&ac=list$id='.$id);
    }

    if(isset($_POST['add'])){
        $id = $_GET['id'];
        
        foreach ($_FILES['image-name']['name'] as $key => $value) {
            $name = $_FILES['image-name']['name'][$key];
            $type = $_FILES['image-name']['type'][$key];
            $size = $_FILES['image-name']['size'][$key];
            $tmp = $_FILES['image-name']['tmp_name'][$key];

            $explode = explode('.',$name);
            $ext = end($explode);
            $path = 'uploads/';
            $path = $path.basename($explode[0].'.'.$ext);
            $img_name = basename($explode[0].'.'.$ext);
            $notification = array();
            if(empty($tmp)){
                echo $notification[]='Làm ơn chọn ít nhất 1 file ảnh';
            }else{
                $chophep = array('jpeg','jpg','png','gif','bmp');
                $max_size=4000000;
                if(in_array($ext,$chophep)===false){
                    echo $notification[]='File <strong>'.$name.'<strong> không hợp lệ<br>';
                }if($size>$max_size){
                    echo $notification[] = 'File <strong>'.$name.'<strong> quá lớn<br>';
                }
            }
            if(empty($notification)){
                if(!file_exists('uploads')){
                    mkdir('uploads',0777);
                    
                }if(move_uploaded_file($tmp,$path)){
                    $sql = "INSERT INTO `gallery`(
                                `id_product`, 
                                `gallery_name`) 
                            VALUES (
                                '$id',
                                '$img_name')";
                    $sql_query = mysqli_query($conn, $sql);
                    header('location:../../views/index.php?manage=product&ac=list');
                }else{
                    echo $thongbao[]='Upload file thất bại';
                }
            }
        }
    }
?>