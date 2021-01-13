<?php
    $sql_type = "SELECT 
                    * 
                FROM 
                    `type_products` 
                WHERE 
                    `id_type` = '$_GET[id]'";
    $row_type = mysqli_query($conn, $sql_type);
    $type = mysqli_fetch_array($row_type);
    if(isset($_GET['sort'])){
        if($_GET['sort'] == 'new'){
            $name_sort = 'Mới nhất';
            $order_by = 'ORDER BY `id_product` DESC';
        }elseif ($_GET['sort'] == 'asc') {
            $name_sort = 'Thứ tự theo giá: thấp đến cao';
            $order_by = 'ORDER BY `price` ASC';
        }elseif ($_GET['sort'] == 'desc') {
            $name_sort = 'Thứ tự theo giá: cao đến thấp';
            $order_by = 'ORDER BY `price` DESC';
        }
    }else{
        $name_sort = 'Thứ tự chữ cái';
        $order_by = 'ORDER BY `product_name` ASC';
    }
    $sql_type_products = "SELECT 
                                * 
                            FROM 
                                `product` 
                            WHERE 
                                `id_type` = '$_GET[id]'".$order_by;
    $row_type_products = mysqli_query($conn, $sql_type_products);
    $count = mysqli_num_rows($row_type_products);
?>

<!--Products list by type-->
<section>
    <div class="container font-roboto mt-5 mb-5">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <h1 style="font-size: 32px;"><?php echo mb_strtoupper($type['type_name']);?></h1>
                <?php
                    if($count > 0){
                ?>
                <small class="text-uppercase" style="font-size: 16px;">Có tất cả <?php echo $count;?> sản phẩm</small>
                <?php
                    }else{
                ?>
                <small class="text-uppercase" style="font-size: 16px;">Không tìm thấy sản phẩm</small>
                <?php
                    }
                ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 d-flex">
                <div class="mt-auto ml-auto droplef">
                    <a class="text-dark dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $name_sort;?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php?manage=typeproduct&sort=new&id=<?php echo $type['id_type'];?>">Mới nhất</a>
                        <a class="dropdown-item" href="index.php?manage=typeproduct&sort=asc&id=<?php echo $type['id_type'];?>">Thứ tự theo giá: thấp đến cao</a>
                        <a class="dropdown-item" href="index.php?manage=typeproduct&sort=desc&id=<?php echo $type['id_type'];?>">Thứ tự theo giá: cao đến thấp</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <?php
                if($count > 0){
                    while($list_product = mysqli_fetch_array($row_type_products)){
            ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3 mb-3">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="img-product">
                            <a href="?manage=product_detail&type=<?php echo $list_product['id_type'];?>&id=<?php echo $list_product['id_product'];?>">
                                <img style="height:inherit" id="img-product-b" src="../doanadmin/modules/manageproduct/uploads/<?php echo $list_product['img_1'];?>" alt="">
                                <img style="height:inherit" class=" p-0" id="img-product-h" src="../doanadmin/modules/manageproduct/uploads/<?php echo $list_product['img_2'];?>" alt="">
                            </a>
                        </div>
                        <div class="body-product mt-2">
                            <h3>
                                <a class="title-product" href="?manage=product_detail&type=<?php echo $list_product['id_type'];?>&id=<?php echo $products['id_product'];?>">
                                <?php echo $list_product['product_name'];?>
                                </a>
                            </h3>
                            <h3>
                            <form action="../modules/cart/update_cart.php?id=<?php echo $list_product['id_product'];?>" method="post" enctype="multipart/form-data">
                                <div class="d-none">
                                    <img src="../doanadmin/modules/manageproduct/uploads/<?php echo $list_product['img_1'];?>" alt="">
                                    <p><?php echo $list_product['product_name'];?></p>
                                    <input type="number" name="soluong" value="1">
                                    <span class="number-price"><?php echo number_format($list_product['price']);?></span>
                                </div>

                                <button class="btn btn-link add-to-cart" name="add-to-cart" type="submit" data-toggle="tooltip" data-placement="left" title="THÊM VÀO GIỎ">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </form>
                            
                            </h3>
                            <h3 class="price">
                                <span class="number-price"><?php echo number_format($list_product['price']);?></span>
                                <span class="unit-price">đ</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</section>