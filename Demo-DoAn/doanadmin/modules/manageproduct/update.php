<?php
    $sql_product = "SELECT * FROM `product` WHERE `id_product` = '$_GET[id]'";
    $row_product = mysqli_query($conn, $sql_product);
    $product = mysqli_fetch_array($row_product);

    
    $sql_type = "SELECT * FROM `type_products`";
    $row_type = mysqli_query($conn, $sql_type);
?>

<!--Add-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=product&ac=list">Quay lại</a>
        </div>
        <div class="mt-3">
            <form class="" action="../modules/manageproduct/handling.php?id=<?php echo $product['id_product'];?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name-product">Tên sản phẩm</label>
                            <input type="text" name="name-product" class="form-control" id="name-product" value="<?php echo $product['product_name'];?>">
                        </div>
                        <div class="form-group">
                            <label for="name-type">Loại sản phẩm</label>
                            <select name="type-product" id="name-type" class="form-control">
                                <?php
                                    while($type = mysqli_fetch_array($row_type)){
                                        if($product['id_type'] == $type['id_type']){
                                ?>
                                <option selected="selected" value="<?php echo $type['id_type']; ?>">
                                    <?php echo $type['type_name'];?>
                                </option>
                                <?php
                                        }else{
                                ?>
                                <option value="<?php echo $type['id_type']; ?>">
                                    <?php echo $type['type_name'];?>
                                </option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name-type">Ảnh sản phẩm</label>
                            <div class="custom-file mb-3">
                                <input name="img-1" type="file" class="custom-file-input" id="img-1">
                                <label class="custom-file-label" for="img-1" data-browse="Thư mục"></label>
                            </div>
                            <div class="custom-file">
                                <input name="img-2" type="file" class="custom-file-input" id="img-2">
                                <label class="custom-file-label" for="img-2" data-browse="Thư mục"></label>
                            </div>
                        </div>
                        <div class="form-row mb-3 text-center">
                            <div class="col-md-6">
                                <img class="w-75 mt-2" src="../modules/manageproduct/uploads/<?php echo $product['img_1'];?>" alt="">
                            </div>
                            <div class="col-md-6">
                                <img class="w-75 mt-2" src="../modules/manageproduct/uploads/<?php echo $product['img_2'];?>" alt="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="price">Giá tiền</label>
                                <input type="text" name="price" class="form-control" id="price" value="<?php echo $product['price'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Số lượng</label>
                                <input type="text" name="amount" class="form-control" id="amount" value="<?php echo $product['amount'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea type="text" name="content" class="form-control" id="content" rows="5"><?php echo $product['content'];?></textarea>
                        </div>
                        <div class="d-flex">
                            <input class="btn btn-danger ml-auto" type="submit" name="update" value="Sửa sản phẩm">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>