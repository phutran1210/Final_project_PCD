<?php
    $sql_product = mysqli_query($conn, "SELECT 
                                            * 
                                        FROM 
                                            `product` 
                                        WHERE 
                                            `id_product` = $_GET[id]");
    $product = mysqli_fetch_array($sql_product);
    $id = $_GET['id'];
?>

<!--List-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=product&ac=list">Quay lại</a>
            <a class="btn btn-danger mb-2 ml-auto" href="index.php?manage=gallery&ac=add&id=<?php echo $id;?>">Thêm ảnh mới</a>
        </div>
        <div>
            <table class="table table-hover vertical-middle text-center">
                <thead>
                    <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Danh sách ảnh sản phẩm</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $product['product_name']; ?></td>
                        <td>
                        <?php
                            $sql_gallery = mysqli_query($conn, "SELECT 
                                                                    * 
                                                                FROM 
                                                                    `gallery` 
                                                                WHERE 
                                                                    `id_product` = $_GET[id]");
                            $count = mysqli_num_rows($sql_gallery);
                            if($count > 0){
                                while($gallery = mysqli_fetch_array($sql_gallery)){
                        ?>
                            <img class=" w-25 ml-auto mr-auto mb-3" src="/doan/doanadmin/modules/managegallery/uploads/<?php echo $gallery['gallery_name']; ?>" alt="">
                        <?php
                                }
                            }else{
                                echo 'Chưa có hình ảnh sản phẩm. Hãy thêm ảnh.';
                            }
                        ?>
                        </td>
                        <td>
                        <a class="text-danger" href="../modules/managegallery/handling.php?manage=delete&id=<?php echo $product['id_product'];?>" data-toggle="tooltip" data-placement="bottom" title="Xóa ảnh"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>