<?php
    $sql_product = "SELECT 
                        * 
                    FROM 
                        `product` 
                    WHERE 
                        `id_product` = '$_GET[id]'";
    $row_product = mysqli_query($conn, $sql_product);
    $detail = mysqli_fetch_array($row_product);
    $sql_type_product = "SELECT 
                            * 
                        FROM 
                            `product` 
                        WHERE 
                            `id_type` = '$_GET[type]' 
                        ORDER BY `id_product` DESC 
                        LIMIT 0,4";
    $row_type_product = mysqli_query($conn, $sql_type_product);
    $count = mysqli_num_rows($row_type_product);

    $sql_gallery_1 = "SELECT 
                            * 
                        FROM 
                            `gallery` 
                        WHERE 
                            `id_product` = '$_GET[id]'";
    $row_gallery_1 = mysqli_query($conn, $sql_gallery_1);
    $gallery_1 = mysqli_num_rows($row_gallery_1);
    $sql_gallery_2 = "SELECT 
                            * 
                        FROM 
                            `gallery` 
                        WHERE 
                            `id_product` = '$_GET[id]'";
    $row_gallery_2 = mysqli_query($conn, $sql_gallery_2);
    $gallery_2 = mysqli_num_rows($row_gallery_2);

    $sql_rate = "SELECT 
                    * 
                FROM 
                    `rate` 
                WHERE 
                    `id_product` = '$_GET[id]'";
    $rate = mysqli_query($conn, $sql_rate);
?>

<!--Product-->
<section>
    <div class="container mt-3 font-roboto">
        <div class="row">
            <div class="col-md-4 br-left h-100">
                <?php
                ?>
                <!--Images-->
                <div class="mt-3 mb-3">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="row">
                            <div class="col-md-12 col-12 slider-for" id="">
                                    <?php
                                    $i = 1;
                                        while($img2 = mysqli_fetch_array($row_gallery_2)){
                                    ?>
                                            <div class="img-slide-<?php echo $i++;?>">
                                                <img class="w-75 m-auto wow fadeIn" data-wow-duration=".25s" src="../doanadmin/modules/managegallery/uploads/<?php echo $img2['gallery_name'];?>" alt="">
                                            </div>
                                    <?php
                                        }
                                    ?>
                            </div>
                            <div class="col-md-12 col-12 mt-3">
                                <div class="slider-nav">
                                    <?php
                                        $i =1;
                                        while($img1 = mysqli_fetch_array($row_gallery_1)){
                                    ?>
                                    <div class="mb-3 col-xl-12 col-lg-12 col-md-12">
                                        <img class="img-click-<?php echo $i++;?> w-100" src="../doanadmin/modules/managegallery/uploads/<?php echo $img1['gallery_name'];?>" alt="">
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form action="../modules/cart/update_cart.php?id=<?php echo $detail['id_product'];?>" method="post" enctype="multipart/form-data">
                    <!--Name-->
                    <div class="name">
                        <h2 class="name-product">
                            <span class="name-product nametitle">
                                <?php echo $detail['product_name'];?>
                            </span>
                            
                            <input class="d-none" type="number" name="soluong" value="1">
                        </h2>
                            <?php 
                                 echo $detail['content'];
                            ?>
                        <div>
                            <p>
                                <span class="font-price">
                                    <span class="numberPrice"><?php echo number_format($detail['price']) ;?></span>
                                    <span class="font-price unit-price">đ</span>
                                </span>
                            </p>
                        </div>
                        <button type="submit" name="add-to-cart" class="btn btn-orange">
                            <i class="fas fa-plus"></i>
                            THÊM VÀO GIỎ
                        </button>
                        <div class="danh-muc">
                            <span>
                                Danh mục:
                                <?php
                                    $sql_type = "SELECT * FROM `type_products`";
                                    $row_type = mysqli_query($conn, $sql_type);
                                    
                                    while($type = mysqli_fetch_array($row_type)){
                                ?>
                                <a href="index.php?manage=typeproduct&id=<?php echo $type['id_type'];?>"><?php echo $type['type_name'];?></a>,
                                <?php
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="share-post mt-3">
                            <h3>CHIA SẺ:</h3>
                            <div class="share-product">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>


        <div class="mt-5">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link text-dark active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h4>ĐÁNH GIÁ</h4></a>
                    <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h4>BÀI VIẾT</h4></a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form action="../modules/product/rate.php?id=<?php echo $detail['id_product'];?>" method="post">
                        <div class="form-group">
                            <p class="mt-5">
                                Email của bạn sẽ không được hiển thị công khai. 
                                Các trường bắt buộc được đánh dấu *
                            </p>
                            <textarea name="ghichu" style="background-color: #EEE;" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Nhận xét của bạn *"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <input name="fullname" style="background-color: #EEE;" type="text" class="form-control" id="staticEmail" placeholder="Tên *">
                            </div>
                            <div class="col-md-6 mb-3"">
                                <input name="email" style="background-color: #EEE;" type="email" class="form-control" id="staticEmail" placeholder="Email *">
                            </div>
                        </div>
                        <div class="d-flex">
                            <button name="btnRate" type="submit" class="btn btn-color-default ml-auto">Gửi</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <?php
                        while($rowRate = mysqli_fetch_array($rate)){
                    ?>
                    <div class="card mt-3 col-md-6">
                        <div class="card-body">
                            <div class="d-flex">
                            <strong class="card-title mr-auto"><?php echo $rowRate['name_user'];?></strong>
                            <span class="text-muted ml-auto"><?php echo $rowRate['dateCreate'];?></span>
                            </div>
                            <p class="card-text"><?php echo $rowRate['comment'];?></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>


        <div class="mt-5">
            <div class="d-flex mb-5">
                <span class="title-divider title-divider-d-none">
                    <span class="title-divider-l"></span>
                </span>
                <h4>
                    <span class="title-container">SẢN PHẨM CÙNG LOẠI</span>
                </h4>
                <span class="title-divider">
                    <span class="title-divider-r"></span>
                </span>
            </div>
            <div class="row">
                <?php
                    if($count > 0){
                        while($list_product = mysqli_fetch_array($row_type_product)){
                ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="img-product">
                                <a href="?manage=product_detail&type=<?php echo $list_product['id_type'];?>&id=<?php echo $list_product['id_product'];?>">
                                    <img style="height:inherit" id="img-product-b" src="../doanadmin/modules/manageproduct/uploads/<?php echo $list_product['img_1'];?>" alt="">
                                    <img style="height:inherit" id="img-product-h" src="../doanadmin/modules/managegallery/uploads/<?php echo $list_product['img_2'];?>" alt="">
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
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</section>
