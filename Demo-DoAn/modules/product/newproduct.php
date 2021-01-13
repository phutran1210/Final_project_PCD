<?php
    $sql_products = "SELECT 
                        * 
                    FROM 
                        `product` 
                    WHERE 
                        `amount` > 0 
                    ORDER BY id_product DESC 
                    LIMIT 0,12";
    $row_products = mysqli_query($conn, $sql_products);
?>
<!--Slide-->
<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade slide-img font-roboto" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item slide-img">
                <img src="../assets/img/luxy.png" class="d-block w-100" alt="...">
                <div class="d-block text-slide-collec text-center">
                    <img src="../assets/img/collec.png" class="d-block mb-md-5 mb-3 img-slide-text wow fadeInRight" data-wow-delay="0.5s" alt="...">
                    <a class="btn btn-outline-light btn-shop-now wow fadeInRight" data-wow-delay="1s" href="index.php?manage=allproduct">SHOP
                        NOW</a>
                </div>
            </div>
            <div class="carousel-item active slide-img">
                <div class="d-block" style="background-color: #F3F3F3;">
                    <div class="row p-0">
                        <div class="col-6">
                            <div class="text-slide-op-lung">
                                <h4 class="wow fadeIn" data-wow-delay="0.5s" data-wow-duration="0.75s">BỘ SƯU TẬP
                                </h4>
                                <h1 class="wow fadeIn" data-wow-delay="0.75s" data-wow-duration="0.75s">ỐP LƯNG ĐẸP
                                </h1>
                            </div>
                        </div>
                        <div class="col-6">
                            <img src="../assets/img/bo-suu-tap-op-lung-iphone-7.png" class="d-block w-100 wow fadeInRight" data-wow-delay="0.5s" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!--Style-->
<section>
    <div class="container mt-5 font-roboto mb-5">
        <div class="row">
            <div class="col-md-4 ">
                <div class="href-style-img">
                    <a class="" href="index.php">
                        <img class="style-img " src="../assets/img/ca-tinh.png" alt="">
                        <div class="text-style-img">
                            <strong>CÁ TÍNH</strong>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="href-style-img">
                    <a class="" href="index.php">
                        <img class="style-img d-block" src="../assets/img/summer.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="href-style-img">
                    <a class="" href="index.php">
                        <img class="style-img d-block" src="../assets/img/shine.png" alt="">
                        <div class="text-style-img">
                            <strong>PHONG CÁCH</strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Slide products-->
<section>
    <div class="container font-roboto mb-5">
        <div class="d-flex mb-5">
            <span class="title-divider title-divider-d-none">
                <span class="title-divider-l"></span>
            </span>
            <h4>
                <span class="title-container">ỐP LƯNG MỚI</span>
            </h4>
            <span class="title-divider">
                <span class="title-divider-r"></span>
            </span>
        </div>
        <div class="owl-carousel owl-theme mb-3" id="slide-products">
            <!--Products-->
            <?php
                while($products = mysqli_fetch_array($row_products)){
            ?>
                    <div class="item">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="img-product">
                                    <a href="?manage=product_detail&type=<?php echo $products['id_type'];?>&id=<?php echo $products['id_product'];?>">
                                        <img style="height:inherit" id="img-product-b" src="../doanadmin/modules/manageproduct/uploads/<?php echo $products['img_1'];?>" alt="">
                                        <img style="height:inherit" class=" p-0" id="img-product-h" src="../doanadmin/modules/manageproduct/uploads/<?php echo $products['img_2'];?>" alt="">
                                    </a>
                                </div>
                                <div class="body-product mt-2">
                                    <h3>
                                        <a class="title-product" href="?manage=product_detail&type=<?php echo $products['id_type'];?>&id=<?php echo $products['id_product'];?>">
                                        <?php echo $products['product_name'];?>
                                        </a>
                                    </h3>
                                    <h3>
                                    <form action="../modules/cart/update_cart.php?id=<?php echo $products['id_product'];?>" method="post" enctype="multipart/form-data">
                                        <div class="d-none">
                                            <img src="../doanadmin/modules/manageproduct/uploads/<?php echo $products['img_1'];?>" alt="">
                                            <p><?php echo $products['product_name'];?></p>
                                            <input type="number" name="soluong" value="1">
                                            <span class="number-price"><?php echo number_format($products['price']);?></span>
                                        </div>

                                        <button class="btn btn-link add-to-cart" name="add-to-cart" type="submit" data-toggle="tooltip" data-placement="left" title="THÊM VÀO GIỎ">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                    
                                    </h3>
                                    <h3 class="price">
                                        <span class="number-price"><?php echo number_format($products['price']);?></span>
                                        <span class="unit-price">đ</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <div class="text-center">
            <a class="btn btn-outline-dark btn-lg btn-color-default" href="index.php?manage=allproduct">
                XEM TẤT CẢ
            </a>
        </div>
    </div>
</section>