<?php
    $sqlDetailInfo = "SELECT 
                            * 
                        FROM 
                            `cart`
                        WHERE 
                            `cart`.`id_cart` = '$_GET[id]'";
    $rowDetailInfo = mysqli_query($conn, $sqlDetailInfo);
    $detailInfo = mysqli_fetch_array($rowDetailInfo);
    //print_r($detailInfo);

    $sqlDetailProduct = "SELECT  
                            `cart_detail`.`amout` as soluong, 
                            `product_name`, 
                            `price`, 
                            `img_1`, 
                            `total`
                        FROM 
                            `cart_detail`, `product`
                        WHERE 
                            (`cart_detail`.`id_product` = `product`.`id_product`) 
                            AND `cart_detail`.`id_cart` = '$_GET[id]'";
    $rowDetailProdct = mysqli_query($conn, $sqlDetailProduct);
    

?>

<!--Cart Detail-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=bill&ac=list">
                Quay lại
            </a>
        </div>
        <div class="mt-3">
            <form method="post" action="../modules/managecart/handling.php?id=<?php echo $detailInfo['id_cart'];?>">
                <h3>Thông tin đơn hàng</h3>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-md-3">Name</div>
                            <div class="col-md-9">
                                <?php echo $detailInfo['name'];?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">Email</div>
                            <div class="col-md-9">
                                <?php echo $detailInfo['email'];?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">Phone</div>
                            <div class="col-md-9">
                                <?php echo $detailInfo['phone'];?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">Address</div>
                            <div class="col-md-9">
                                <?php echo $detailInfo['address'];?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">Payments</div>
                            <div class="col-md-9">
                                <?php
                                    if($detailInfo['payments'] == 1){
                                        echo 'Thanh toán khi nhận hàng';
                                    }else{
                                        echo 'Chuyển khoản';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">Content</div>
                            <div class="col-md-9">
                                <?php echo $detailInfo['content'];?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">Change</div>
                            <div class="col-md-9">
                                <label class="mr-sm-2 sr-only" for="change">Change</label>
                                <select name="change" class="form-control" id="change">
                                    <option value="0">Chờ thanh toán</option>
                                    <option value="1">Đang giao hàng</option>
                                    <option value="2">Đã thanh toán</option>
                                    <option value="3">Hủy đơn</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <table class="table table-bordered vertical-middle">
                            <thead>
                                <tr class="text-center">
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">SL</th>
                                <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($detailProduct = mysqli_fetch_assoc($rowDetailProdct)){
                            ?>
                            <tr>
                                <td>
                                    <img class="ml-auto mr-auto" style="width: 50px;" src="../modules/manageproduct/uploads/<?php echo $detailProduct['img_1'];?>" alt="">
                                    <?php echo $detailProduct['product_name'];?>
                                </td>
                                <td class="text-center"><?php echo number_format($detailProduct['price']);?></td>
                                <td class="text-center"><?php echo $detailProduct['soluong'];?></td>
                                <td class="text-center"><?php echo number_format($detailProduct['total']);?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <th class="text-right" colspan="3">Phí ship</th>
                                <td class="text-center">
                                <?php
                                    if(isset($detailInfo['address'])){
                                        $address = mb_strtolower($detailInfo['address']);
                                        if(strpos($address, 'hồ chí minh')){
                                            $ship = 30000;
                                            echo number_format($ship);
                                        }else{
                                            $ship = 50000;
                                            echo number_format($ship);
                                        }
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="3">Tổng tiền</th>
                                <td class="text-center"><?php echo number_format($detailInfo['totalPrice'])?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex">
                <button type="submit" name="update" class="btn btn-danger mb-2 ml-auto">Xử lý</button>
                </div>
            </form>
        </div>
    </div>
</section>