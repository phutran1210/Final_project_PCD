<?php
    //doanhh thu
    $time = date("d/m/Y");
    $day = date('d');
    $month = date('m');
    $dates = date('Y-m-d');
    while (date('w', strtotime($dates)) != 1) {
        $tmp = strtotime('-1 day', strtotime($dates));
        $dates = date('Y-m-d', $tmp);
    }
    $week = date('W', strtotime($dates));
    //echo $week;

    //product
    $sql_product_total = "SELECT 
                                COUNT(`id_product`) AS `total` 
                            FROM 
                                `product`";
    $query_product_total  = mysqli_query($conn, $sql_product_total);
    $sql_product_much = "SELECT 
                                COUNT(`id_product`) AS `much`
                            FROM 
                                `product` 
                            WHERE 
                                (`amount` > 5 AND `amount` <= 100)";
    $query_product_much  = mysqli_query($conn, $sql_product_much);
    $sql_product_little = "SELECT 
                                *
                            FROM 
                                `product` 
                            WHERE 
                                (`amount` > 0 AND `amount` <= 5)";
    $query_product_little = mysqli_query($conn, $sql_product_little);
    $sql_product_over = "SELECT 
                                *
                            FROM 
                                `product` 
                            WHERE 
                                `amount` <= 0";
    $query_product_over = mysqli_query($conn, $sql_product_over);

    //cart
    $sql_total_cart = "SELECT 
                            COUNT(`id_cart`) AS `total` 
                        FROM 
                            `cart` 
                        WHERE 
                            `status` = 0 
                            AND MONTH(`dateCreated`) = '$month'";
    $query_total_cart = mysqli_query($conn, $sql_total_cart);
    $sql_load_cart = "SELECT 
                            COUNT(`id_cart`) AS `total` 
                        FROM 
                            `cart` 
                        WHERE 
                            `status` = 1 
                            AND MONTH(`dateCreated`) = '$month'";
    $query_load_cart = mysqli_query($conn, $sql_load_cart);

    //price
    $sql_total_day = "SELECT 
                            SUM(`totalPrice`) AS `total` 
                        FROM 
                            `cart` 
                        WHERE 
                            `status` = 2 
                            AND DAY(`dateUpdate`) = '$day'
                            AND MONTH(`dateUpdate`) = '$month'";
    $query_total_day = mysqli_query($conn, $sql_total_day);
    $sql_total_month = "SELECT 
                            SUM(`totalPrice`) AS `total` 
                        FROM 
                            `cart` 
                        WHERE 
                            `status` = 2 
                            AND MONTH(`dateUpdate`) = '$month'";
    $query_total_month = mysqli_query($conn, $sql_total_month);
    $sql_total_week = "SELECT 
                            SUM(`totalPrice`) AS `total` 
                        FROM 
                            `cart` 
                        WHERE 
                            `status` = 2 
                            AND WEEK(`dateUpdate`, 1) = '$week'";
    $query_total_week = mysqli_query($conn, $sql_total_week);

    //news
    $sql_news = "SELECT 
                        COUNT(`id_new`) AS `count-new` 
                    FROM 
                        `news` 
                    WHERE 
                        `status` = 0";
    $query_news = mysqli_query($conn, $sql_news);

    //news
    $sql_users = "SELECT
                    COUNT(`id`) AS `count-user`
                FROM
                    `user`";
    $query_users = mysqli_query($conn, $sql_users);
?>

<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="row">
            <div class="col-md-8 p-0">
                <div class="row">
                    <!--Doanh thu-->
                    <div class="col-md-6 mb-4">
                        <div class="card alert-success">
                            <div class="card-header">DOANH THU</div>
                            <div class="card-body">
                                <p class="card-text">
                                    Hôm nay: 
                                    <strong>
                                        <?php 
                                            while($total_day = mysqli_fetch_assoc($query_total_day)){ 
                                                echo number_format($total_day['total']).'đ';
                                            }
                                        ?>
                                    </strong>
                                </p>
                                <p class="card-text">
                                    Tuần:
                                    <strong>
                                        <?php 
                                            while($total_week = mysqli_fetch_assoc($query_total_week)){ 
                                                echo number_format($total_week['total']).'đ';
                                            }
                                        ?>
                                    </strong>
                                </p>
                                <p class="card-text">
                                    Tháng:
                                    <strong>
                                        <?php 
                                            while($total_month = mysqli_fetch_assoc($query_total_month)){ 
                                                echo number_format($total_month['total']).'đ';
                                            }
                                        ?>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--Đơn hàng-->
                    <div class="col-md-6 mb-4">
                        <div class="card alert-primary ">
                            <div class="card-header">ĐƠN HÀNG THÁNG <?php echo $month;?></div>
                            <div class="card-body">
                                <p class="card-text">
                                    Có 
                                    <strong>
                                        <?php 
                                            while($total_cart = mysqli_fetch_assoc($query_total_cart)){ 
                                                    echo $total_cart['total'];
                                            }
                                        ?> 
                                    </strong>
                                    đơn hàng cần thanh toán.
                                </p>
                                <p class="card-text">
                                    Có 
                                    <strong>
                                        <?php 
                                            while($load_cart = mysqli_fetch_assoc($query_load_cart)){ 
                                                    echo $load_cart['total'];
                                            }
                                        ?> 
                                    </strong>
                                    đơn hàng đang giao.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--Bài viết-->
                    <div class="col-md-6 mb-4">
                        <div class="card alert-warning ">
                            <div class="card-header">BÀI VIẾT</div>
                            <div class="card-body">
                                <p class="card-text">
                                    Có 
                                    <strong>
                                        <?php 
                                            while($news = mysqli_fetch_array($query_news)){
                                                echo $news['count-new'];
                                            }
                                        ?> 
                                    </strong>
                                    bài viết được kích hoạt.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--Thành viên-->
                    <div class="col-md-6 mb-4">
                        <div class="card alert-info ">
                            <div class="card-header">THÀNH VIÊN</div>
                            <div class="card-body">
                                <p class="card-text">
                                    Có 
                                    <strong>
                                        <?php 
                                            while($users = mysqli_fetch_array($query_users)){
                                                echo $users['count-user'];
                                            }
                                        ?> 
                                    </strong>
                                    thành viên.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <!--Kho-->
                <div class="mb-4">
                    <div class="card alert-danger">
                        <div class="card-header">
                            <span>
                                KHO 
                                (
                                    <?php 
                                    while($amount_product_total = mysqli_fetch_assoc($query_product_total)){ 
                                            echo $amount_product_total['total'];
                                        }
                                    ?> sản phẩm
                                )
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Còn hàng: 
                                <strong>
                                    <?php 
                                        while($amount_product_much = mysqli_fetch_assoc($query_product_much)){ 
                                                echo $amount_product_much['much'];
                                        }
                                    ?> 
                                </strong>
                            </p>
                            <p class="card-text">
                                Sắp hết hàng: 
                                <strong>
                                    <?php 
                                        $little = mysqli_num_rows($query_product_little);
                                        echo $little;
                                    ?>
                                </strong>
                                <ul>
                                    <?php
                                        while($amount_product_little = mysqli_fetch_assoc($query_product_little)){ 
                                    ?>
                                    <li><?php echo $amount_product_little['product_name'];?></li>
                                    <?php     
                                        }
                                    ?>
                                </ul>
                            </p>
                            <p class="card-text">
                                Hết hàng: 
                                <strong>
                                    <?php 
                                        $over = mysqli_num_rows($query_product_over);
                                        echo $over;
                                    ?>
                                    </br>
                                </strong>
                                <ul>
                                    <?php
                                        while($amount_product_over = mysqli_fetch_assoc($query_product_over)){
                                    ?>
                                    <li><?php echo $amount_product_over['product_name'];?></li>
                                    <?php       
                                        }
                                    ?> 
                                
                                    
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>