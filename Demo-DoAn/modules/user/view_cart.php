<?php
    $sqlCart = "SELECT 
                    * 
                FROM 
                    `cart`
                WHERE 
                    `cart`.`id_cart` = '$_GET[id]'";
    $rowSql = mysqli_query($conn, $sqlCart);
    $view = mysqli_fetch_array($rowSql);

    $sqlDetail = "SELECT
                        `product_name`, 
                        `cart_detail`.`amout` AS `detail_amount`, 
                        `total`, 
                        `img_1`
                    FROM
                        `cart_detail`,
                        `product`
                    WHERE
                        `cart_detail`.`id_product` = `product`.`id_product` 
                        AND `id_cart` = '$_GET[id]'";
    $rowDetail = mysqli_query($conn, $sqlDetail);
?>
<!--View Cart-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <h3>Thông tin đơn hàng</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header">Thông tin người nhận</div>
                    <div class="card-body text-info">
                        <p class="card-text">
                            <?php echo $view['name'];?>
                            <br>
                            <?php echo $view['phone'];?>
                            <br>
                            <?php echo $view['email'];?>
                            <br>
                            <?php echo $view['address'];?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h5>Giỏ hàng</h5>
                <table class="table table-sm table-bordered vertical-middle text-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($detail = mysqli_fetch_array($rowDetail)){
                        ?>
                        <tr>
                            <td class="text-left">
                                <img style="width: 50px;" class="mb-2" src="../doanadmin/modules/manageproduct/uploads/<?php echo $detail['img_1'];?>">
                                <?php echo $detail['product_name'];?>
                            </td>
                            <td>
                                <?php echo $detail['detail_amount'];?>
                            </td>
                            <td>
                                <?php echo number_format($detail['total']);?>đ
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td class="text-right" colspan="2">
                                <strong>
                                Phí ship:
                                </strong>
                            </td>
                            <td>
                                <?php
                                    $address = mb_strtolower($view['address']);
                                    if(strpos($address, 'hồ chí minh')){
                                        $ship = 30000;
                                    }else{
                                        $ship = 50000;
                                    }
                                    echo number_format($ship);
                                ?>đ
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="2">
                                <strong>
                                Tổng tiền:
                                </strong>
                            </td>
                            <td>
                                <?php echo number_format($view['totalPrice']);?>đ
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>