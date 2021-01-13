<?php
    if(isset($_POST['search'])){
        $search = $_POST['search_name'];
        $sql_search = "SELECT 
                            * 
                        FROM 
                            `product` 
                        WHERE 
                            `product_name` LIKE '%$search%'";
        $row_search = mysqli_query($conn, $sql_search);
        $count = mysqli_num_rows($row_search);
?>
<!--Search-->
<section>
    <div class="container font-roboto mt-5 mb-5">
<?php
        if($count > 0){
?>
        <h1 style="font-size: 32px;">Tìm thấy <?php echo $count;?> kết quả</h1>
<?php
        }else{
?>
        <h1 style="font-size: 32px;">Không tìm thấy kết quả</h1>
<?php
        }
?>
        <div class="row mt-3">
<?php
        $i = 1;
        while($list_product = mysqli_fetch_array($row_search)){
?>
            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="img-product">
                            <a href="?manage=product_detail&type=<?php echo $list_product['id_type'];?>&id=<?php echo $list_product['id_product'];?>">
                                <img id="img-product-b" src="../doanadmin/modules/manageproduct/uploads/<?php echo $list_product['img_1'];?>" alt="">
                                <img id="img-product-h" src="../doanadmin/modules/manageproduct/uploads/<?php echo $list_product['img_2'];?>" alt="">
                            </a>
                        </div>
                        <div class="body-product">
                            <h3>
                                <a class="title-product" href="?manage=product_detail&type=<?php echo $list_product['id_type'];?>&id=<?php echo $products['id_product'];?>">
                                <?php echo $list_product['product_name'];?>
                                </a>
                            </h3>
                            <h3>
                            <form action="update_cart.php?id=<?php echo $list_product['id_product'];?>" method="post" enctype="multipart/form-data">
                                <div class="d-none">
                                    <img src="../assets/img_products/<?php echo $list_product['img_1'];?>" alt="">
                                    <p><?php echo $list_product['product_name'];?></p>
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
            $i++;
        }
    }
?>
        </div>
    </div>
</section>

